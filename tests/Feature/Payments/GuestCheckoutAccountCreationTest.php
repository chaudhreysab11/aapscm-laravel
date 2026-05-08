<?php

declare(strict_types=1);

use App\Events\OrderPaid;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use App\Services\Payment\OrderPaymentService;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;

uses(RefreshDatabase::class);

const GUEST_CREATE_EMAIL = 'guest.create@example.com';
const DUPLICATE_EVENT_EMAIL = 'duplicate.event@example.com';

function guestCheckoutCart(): array
{
    $product = Product::factory()->create(['type' => 'digital']);

    ProductPrice::factory()->create([
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'price' => '49.99',
        'currency' => 'USD',
        'is_active' => true,
    ]);

    return [
        $product->id => [
            'quantity' => 1,
            'unit_price' => '49.99',
            'currency' => 'USD',
            'membership_tier_id' => null,
        ],
    ];
}

function guestCheckoutPayload(array $overrides = []): array
{
    return $overrides + [
        'billing_name' => 'Guest Buyer',
        'billing_email' => 'guest@example.com',
        'billing_address' => '1 Test Street',
        'billing_city' => 'Columbia',
        'billing_state' => 'Maryland',
        'billing_postcode' => '21044',
        'billing_country' => 'USA',
        'billing_phone' => '+1 555 0100',
    ];
}

function placeGuestCheckoutOrder(array $payload = []): Order
{
    test()
        ->withSession(['cart.items' => guestCheckoutCart()])
        ->post('/checkout/', guestCheckoutPayload($payload))
        ->assertRedirect();

    return Order::query()->latest('id')->firstOrFail();
}

it('creates a user only after a guest checkout with create-account is paid', function (): void {
    Notification::fake();

    $order = placeGuestCheckoutOrder([
        'billing_email' => GUEST_CREATE_EMAIL,
        'create_account' => '1',
    ]);

    expect(User::query()->where('email', GUEST_CREATE_EMAIL)->exists())->toBeFalse()
        ->and($order->user_id)->toBeNull();

    app(OrderPaymentService::class)->markPaid($order, ['status' => 'succeeded']);

    $user = User::query()->where('email', GUEST_CREATE_EMAIL)->firstOrFail();

    expect($order->fresh()->user_id)->toBe($user->id)
        ->and($user->name)->toBe('Guest Buyer')
        ->and($user->password_initialized_at)->toBeNull()
        ->and(data_get($user->profile_payload, 'auth.password_setup_required'))->toBeTrue();

    $notes = json_decode((string) $order->fresh()->notes, true, 512, JSON_THROW_ON_ERROR);

    expect(data_get($notes, 'account_resolution.status'))->toBe('created_new_user')
        ->and(data_get($notes, 'account_resolution.password_setup_dispatched'))->toBeTrue();

    Notification::assertSentTo($user, ResetPassword::class);
    Notification::assertSentToTimes($user, ResetPassword::class, 1);

    $this->assertDatabaseHas('activity_log', [
        'log_name' => 'guest-checkout-accounts',
        'subject_type' => App\Models\Order::class,
        'subject_id' => $order->id,
        'description' => 'guest checkout account created after payment',
    ]);
});

it('does not create a user when a guest checkout is paid without create-account selected', function (): void {
    Notification::fake();

    $order = placeGuestCheckoutOrder([
        'billing_email' => 'guest.noaccount@example.com',
    ]);

    app(OrderPaymentService::class)->markPaid($order, ['status' => 'succeeded']);

    expect(User::query()->where('email', 'guest.noaccount@example.com')->exists())->toBeFalse()
        ->and($order->fresh()->user_id)->toBeNull();

    Notification::assertNothingSent();
});

it('ignores forged create-account input for authenticated checkout after payment', function (): void {
    Notification::fake();

    $user = User::factory()->create(['email' => 'member.checkout@example.com']);

    $this->actingAs($user)
        ->withSession(['cart.items' => guestCheckoutCart()])
        ->post('/checkout/', guestCheckoutPayload([
            'billing_email' => 'member.checkout@example.com',
            'create_account' => '1',
        ]))
        ->assertRedirect();

    $order = Order::query()->latest('id')->firstOrFail();

    app(OrderPaymentService::class)->markPaid($order, ['status' => 'succeeded']);

    expect(User::query()->count())->toBe(1)
        ->and($order->fresh()->user_id)->toBe($user->id);

    Notification::assertNothingSent();
});

it('links a paid guest checkout to an existing user instead of creating a duplicate account', function (): void {
    Notification::fake();

    $existingUser = User::factory()->create(['email' => 'known.buyer@example.com']);

    $order = placeGuestCheckoutOrder([
        'billing_email' => 'known.buyer@example.com',
        'create_account' => '1',
    ]);

    app(OrderPaymentService::class)->markPaid($order, ['status' => 'succeeded']);

    expect(User::query()->count())->toBe(1)
        ->and($order->fresh()->user_id)->toBe($existingUser->id);

    Notification::assertNothingSent();

    $this->assertDatabaseHas('activity_log', [
        'log_name' => 'guest-checkout-accounts',
        'subject_type' => App\Models\Order::class,
        'subject_id' => $order->id,
        'description' => 'guest checkout order linked to existing account after payment',
    ]);
});

it('remains idempotent when a paid event is delivered more than once', function (): void {
    Notification::fake();

    $order = placeGuestCheckoutOrder([
        'billing_email' => DUPLICATE_EVENT_EMAIL,
        'create_account' => '1',
    ]);

    app(OrderPaymentService::class)->markPaid($order, ['status' => 'succeeded']);
    OrderPaid::dispatch($order->fresh());

    $user = User::query()->where('email', DUPLICATE_EVENT_EMAIL)->firstOrFail();

    expect(User::query()->where('email', DUPLICATE_EVENT_EMAIL)->count())->toBe(1)
        ->and($order->fresh()->user_id)->toBe($user->id);

    Notification::assertSentToTimes($user, ResetPassword::class, 1);
});

it('allows the resolved user to access the paid order as the owner after linking', function (): void {
    Notification::fake();

    $order = placeGuestCheckoutOrder([
        'billing_email' => 'owner.access@example.com',
        'create_account' => '1',
    ]);

    app(OrderPaymentService::class)->markPaid($order, ['status' => 'succeeded']);

    $user = User::query()->where('email', 'owner.access@example.com')->firstOrFail();

    $this->actingAs($user)
        ->get("/order/{$order->id}/receipt")
        ->assertOk()
        ->assertSee('Account Setup')
        ->assertSee('Check owner.access@example.com for the password setup link.');
});
