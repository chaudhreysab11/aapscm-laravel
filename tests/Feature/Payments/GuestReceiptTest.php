<?php

declare(strict_types=1);

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;

uses(RefreshDatabase::class);

function makePaidGuestOrder(string $email = 'guest@example.com'): Order
{
    $product = Product::factory()->create(['type' => 'digital']);
    ProductPrice::factory()->create([
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'price' => '49.99',
        'currency' => 'USD',
        'is_active' => true,
    ]);

    $order = Order::create([
        'user_id' => null,
        'billing_email' => $email,
        'billing_name' => 'Guest Buyer',
        'order_number' => 'AAPSCM-RCPT-' . uniqid(),
        'status' => 'completed',
        'payment_method' => 'stripe',
        'payment_status' => 'paid',
        'currency' => 'USD',
        'subtotal' => '49.99',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '49.99',
    ]);

    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => 1,
        'unit_price' => '49.99',
        'total_price' => '49.99',
        'item_type' => 'digital',
    ]);

    return $order->fresh('items.product');
}

it('grants access to the receipt via a valid signed URL', function (): void {
    $order = makePaidGuestOrder();
    $signed = URL::temporarySignedRoute('order.receipt', now()->addDays(7), ['order' => $order->id]);

    $this->get($signed)
        ->assertOk()
        ->assertSee($order->order_number)
        ->assertSee($order->billing_email);
});

it('denies an unsigned guest with no session match', function (): void {
    $order = makePaidGuestOrder();

    $this->get("/order/{$order->id}/receipt")->assertForbidden();
});

it('grants access to a guest whose session holds the matching billing email', function (): void {
    $order = makePaidGuestOrder('matched@example.com');

    $this->withSession(['checkout.guest_email' => 'matched@example.com'])
        ->get("/order/{$order->id}/receipt")
        ->assertOk();
});

it('denies a guest whose session email does not match', function (): void {
    $order = makePaidGuestOrder('matched@example.com');

    $this->withSession(['checkout.guest_email' => 'someone.else@example.com'])
        ->get("/order/{$order->id}/receipt")
        ->assertForbidden();
});

it('grants access to the authenticated owner', function (): void {
    $owner = User::factory()->create();
    $order = makePaidGuestOrder('owner@example.com');
    $order->update(['user_id' => $owner->id]);

    $this->actingAs($owner)
        ->get("/order/{$order->id}/receipt")
        ->assertOk();
});

it('denies an authenticated user who is not the owner', function (): void {
    $other = User::factory()->create();
    $order = makePaidGuestOrder('owner@example.com');

    $this->actingAs($other)
        ->get("/order/{$order->id}/receipt")
        ->assertForbidden();
});
