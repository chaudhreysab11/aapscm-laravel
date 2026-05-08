<?php

declare(strict_types=1);

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\URL;
use Spatie\Permission\Models\Role;

uses(RefreshDatabase::class);

function makePdfEligibleOrder(string $email = 'guest@example.com'): Order
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
        'billing_name' => 'Invoice Buyer',
        'order_number' => 'AAPSCM-INV-' . uniqid(),
        'status' => 'completed',
        'payment_method' => 'stripe',
        'payment_status' => 'paid',
        'currency' => 'USD',
        'subtotal' => '49.99',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '49.99',
        'notes' => json_encode([
            'billing_address' => '1 Test Street',
            'billing_city' => 'Columbia',
            'billing_state' => 'Maryland',
            'billing_postcode' => '21044',
            'billing_country' => 'USA',
            'billing_phone' => '+1 555 0100',
        ]),
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

it('returns a pdf invoice for a signed guest request', function (): void {
    $order = makePdfEligibleOrder();
    $signed = URL::temporarySignedRoute('order.invoice.pdf', now()->addDays(7), ['order' => $order->id]);

    $response = $this->get($signed);

    $response->assertOk();
    expect($response->headers->get('content-type'))->toContain('application/pdf');
    expect($response->headers->get('content-disposition'))->toContain('.pdf');
});

it('returns a pdf invoice for the authenticated owner', function (): void {
    $owner = User::factory()->create();
    $order = makePdfEligibleOrder('owner@example.com');
    $order->update(['user_id' => $owner->id]);

    $response = $this->actingAs($owner)->get(route('order.invoice.pdf', ['order' => $order->id]));

    $response->assertOk();
    expect($response->headers->get('content-type'))->toContain('application/pdf');
});

it('returns a pdf invoice for an admin reviewer', function (): void {
    Role::findOrCreate('admin', 'web');

    $admin = User::factory()->create();
    $admin->assignRole('admin');
    $order = makePdfEligibleOrder();

    $response = $this->actingAs($admin)->get(route('order.invoice.pdf', ['order' => $order->id]));

    $response->assertOk();
    expect($response->headers->get('content-type'))->toContain('application/pdf');
});

it('denies an unauthorized user from downloading an invoice pdf', function (): void {
    $other = User::factory()->create();
    $order = makePdfEligibleOrder('owner@example.com');

    $this->actingAs($other)
        ->get(route('order.invoice.pdf', ['order' => $order->id]))
        ->assertForbidden();
});

it('does not generate an invoice pdf for an unpaid or incomplete order', function (): void {
    $owner = User::factory()->create();
    $order = makePdfEligibleOrder('owner@example.com');
    $order->update([
        'user_id' => $owner->id,
        'status' => 'processing',
        'payment_status' => 'unpaid',
    ]);

    $this->actingAs($owner)
        ->get(route('order.invoice.pdf', ['order' => $order->id]))
        ->assertNotFound();
});