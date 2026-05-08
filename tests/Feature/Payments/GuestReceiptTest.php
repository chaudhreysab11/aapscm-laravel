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
        ->assertSee('Order Receipt')
        ->assertSee($order->order_number)
        ->assertSee($order->billing_email)
        ->assertSee('Payment Confirmation')
        ->assertSee('Payment Summary')
        ->assertSee('Total Paid')
        ->assertDontSee('Invoice Administration')
        ->assertDontSee('What This View Means');
});

it('grants access to the invoice via a valid signed URL', function (): void {
    $order = makePaidGuestOrder();
    $signed = URL::temporarySignedRoute('order.invoice', now()->addDays(7), ['order' => $order->id]);

    $this->get($signed)
        ->assertOk()
        ->assertSee('Invoice-Style Order Document')
        ->assertSee($order->order_number)
        ->assertSee('Invoice Administration')
        ->assertSee('Payment Terms')
        ->assertSee('Order Total')
        ->assertDontSee('Payment Confirmation')
        ->assertDontSee('What This View Means');
});

it('denies an unsigned guest with no session match', function (): void {
    $order = makePaidGuestOrder();

    $this->get("/order/{$order->id}/receipt")->assertForbidden();
    $this->get("/order/{$order->id}/invoice")->assertForbidden();
});

it('grants access to a guest whose session holds the matching billing email', function (): void {
    $order = makePaidGuestOrder('matched@example.com');

    $this->withSession(['checkout.guest_email' => 'matched@example.com'])
        ->get("/order/{$order->id}/receipt")
        ->assertOk();

    $this->withSession(['checkout.guest_email' => 'matched@example.com'])
        ->get("/order/{$order->id}/invoice")
        ->assertOk();
});

it('denies a guest whose session email does not match', function (): void {
    $order = makePaidGuestOrder('matched@example.com');

    $this->withSession(['checkout.guest_email' => 'someone.else@example.com'])
        ->get("/order/{$order->id}/receipt")
        ->assertForbidden();

    $this->withSession(['checkout.guest_email' => 'someone.else@example.com'])
        ->get("/order/{$order->id}/invoice")
        ->assertForbidden();
});

it('grants access to the authenticated owner', function (): void {
    $owner = User::factory()->create();
    $order = makePaidGuestOrder('owner@example.com');
    $order->update(['user_id' => $owner->id]);

    $this->actingAs($owner)
        ->get("/order/{$order->id}/receipt")
        ->assertOk();

    $this->actingAs($owner)
        ->get("/order/{$order->id}/invoice")
        ->assertOk();
});

it('denies an authenticated user who is not the owner', function (): void {
    $other = User::factory()->create();
    $order = makePaidGuestOrder('owner@example.com');

    $this->actingAs($other)
        ->get("/order/{$order->id}/receipt")
        ->assertForbidden();

    $this->actingAs($other)
        ->get("/order/{$order->id}/invoice")
        ->assertForbidden();
});

it('renders expected invoice and receipt content for the owner', function (): void {
    $owner = User::factory()->create();
    $order = makePaidGuestOrder('owner@example.com');
    $order->update([
        'user_id' => $owner->id,
        'payment_intent_id' => 'pi_receipt_content_123',
        'notes' => json_encode([
            'billing_address' => '1 Test Street',
            'billing_city' => 'Columbia',
            'billing_state' => 'Maryland',
            'billing_postcode' => '21044',
            'billing_country' => 'USA',
            'billing_phone' => '+1 555 0100',
            'billing_company' => 'AAPSCM Buyer Co',
            'customer_note' => 'Please confirm my order.',
        ]),
    ]);

    $this->actingAs($owner)
        ->get("/order/{$order->id}/receipt")
        ->assertOk()
        ->assertSee('Order Receipt')
        ->assertSee('Document Views')
        ->assertSee('Payment Confirmation')
        ->assertSee('Total Paid')
        ->assertSee('Payment Record')
        ->assertSee('pi_receipt_content_123');

    $this->actingAs($owner)
        ->get("/order/{$order->id}/invoice")
        ->assertOk()
        ->assertSee('Invoice-Style Order Document')
        ->assertSee('Invoice Administration')
        ->assertSee('Payment Terms')
        ->assertSee('Order Total')
        ->assertSee('AAPSCM Buyer Co')
        ->assertSee('Please confirm my order.');
});
