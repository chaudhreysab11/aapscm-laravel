<?php

declare(strict_types=1);

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function placeGuestStripeOrder(string $email, string $name): Order
{
    $product = Product::factory()->create(['type' => 'digital']);
    ProductPrice::factory()->create([
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'price' => '49.99',
        'currency' => 'USD',
        'is_active' => true,
    ]);

    $cartSession = [
        $product->id => [
            'quantity' => 1,
            'unit_price' => '49.99',
            'currency' => 'USD',
            'membership_tier_id' => null,
        ],
    ];

    test()
        ->withSession(['cart.items' => $cartSession])
        ->post('/checkout/', [
            'billing_name' => $name,
            'billing_email' => $email,
            'billing_address' => '1 Test Street',
            'billing_city' => 'Columbia',
            'billing_country' => 'USA',
            'gateway' => 'stripe',
        ])
        ->assertRedirect();

    return Order::query()->latest('id')->firstOrFail();
}

it('persists billing_email and billing_name as real columns on guest checkout', function (): void {
    $order = placeGuestStripeOrder('guest@example.com', 'Guest Buyer');

    expect($order->user_id)->toBeNull()
        ->and($order->billing_email)->toBe('guest@example.com')
        ->and($order->billing_name)->toBe('Guest Buyer');

    // Identity columns must NOT also be duplicated into notes JSON.
    $notes = json_decode((string) $order->notes, true) ?? [];
    expect($notes)->not->toHaveKey('billing_email')
        ->and($notes)->not->toHaveKey('billing_name')
        // Address fields stay in notes JSON (Task 2 scope is identity only).
        ->and($notes)->toHaveKey('billing_address')
        ->and($notes)->toHaveKey('billing_city')
        ->and($notes)->toHaveKey('billing_country');
});

it('attaches prior guest orders to a user when they later register with the same email', function (): void {
    $email = 'late.signup@example.com';

    // Two guest orders with the same email (simulating two visits).
    $orderA = placeGuestStripeOrder($email, 'Late Signup');
    $orderB = placeGuestStripeOrder($email, 'Late Signup');

    // An unrelated guest order with a different email \u2014 must NOT be attached.
    $other = placeGuestStripeOrder('someone.else@example.com', 'Other Buyer');

    expect($orderA->user_id)->toBeNull()
        ->and($orderB->user_id)->toBeNull()
        ->and($other->user_id)->toBeNull();

    $user = User::factory()->create(['email' => $email]);

    expect($orderA->fresh()->user_id)->toBe($user->id)
        ->and($orderB->fresh()->user_id)->toBe($user->id)
        ->and($other->fresh()->user_id)->toBeNull();
});

it('does not overwrite the user_id of orders already linked to a different user', function (): void {
    $email = 'shared@example.com';

    $existingOwner = User::factory()->create(['email' => 'owner@example.com']);

    $linkedOrder = Order::create([
        'user_id' => $existingOwner->id,
        'billing_email' => $email,
        'billing_name' => 'Linked Already',
        'order_number' => 'AAPSCM-LINK-' . uniqid(),
        'status' => 'completed',
        'payment_method' => 'stripe',
        'payment_status' => 'paid',
        'currency' => 'USD',
        'subtotal' => '10.00',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '10.00',
    ]);

    // New user registers with the same billing_email \u2014 must NOT steal $linkedOrder.
    User::factory()->create(['email' => $email]);

    expect($linkedOrder->fresh()->user_id)->toBe($existingOwner->id);
});
