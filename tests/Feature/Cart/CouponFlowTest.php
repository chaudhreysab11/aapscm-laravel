<?php

declare(strict_types=1);

use App\Models\Coupon;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function pricedProduct(string $price = '100.00'): Product
{
    $product = Product::factory()->create(['type' => 'digital']);

    ProductPrice::factory()->create([
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'price' => $price,
        'currency' => 'USD',
        'is_active' => true,
    ]);

    return $product;
}

function checkoutPayload(array $overrides = []): array
{
    return $overrides + [
        'billing_name' => 'Coupon Buyer',
        'billing_email' => 'coupon@example.com',
        'billing_address' => '1 Test Street',
        'billing_city' => 'Columbia',
        'billing_state' => 'Maryland',
        'billing_postcode' => '21044',
        'billing_country' => 'USA',
        'billing_phone' => '+1 555 0100',
        'gateway' => 'stripe',
    ];
}

it('applies a valid coupon and recalculates cart totals', function (): void {
    $product = pricedProduct('100.00');
    Coupon::factory()->percentage('10.00')->create([
        'code' => 'SAVE10',
    ]);

    $this->post(route('cart.add', $product->id))->assertRedirect(route('cart.show'));

    $this->post(route('cart.coupon.apply'), ['coupon_code' => 'save10'])
        ->assertRedirect(route('cart.show'));

    expect(session('cart.coupon_code'))->toBe('SAVE10');

    $this->get(route('cart.show'))
        ->assertOk()
        ->assertSee('Coupon SAVE10 applied')
        ->assertSee('-USD 10.00')
        ->assertSee('USD 90.00');
});

it('rejects an expired coupon', function (): void {
    $product = pricedProduct('100.00');
    Coupon::factory()->expired()->create([
        'code' => 'OLD10',
        'type' => 'fixed',
        'value' => '10.00',
    ]);

    $this->post(route('cart.add', $product->id))->assertRedirect(route('cart.show'));

    $this->post(route('cart.coupon.apply'), ['coupon_code' => 'OLD10'])
        ->assertRedirect(route('cart.show'))
        ->assertSessionHas('error', 'That coupon has expired.');

    expect(session('cart.coupon_code'))->toBeNull();
});

it('persists coupon snapshot and recalculated order totals at checkout', function (): void {
    $user = User::factory()->create();
    $product = pricedProduct('100.00');
    Coupon::factory()->create([
        'code' => 'LESS15',
        'type' => 'fixed',
        'value' => '15.00',
    ]);

    $cartSession = [
        $product->id => [
            'quantity' => 1,
            'unit_price' => '100.00',
            'currency' => 'USD',
            'membership_tier_id' => null,
        ],
    ];

    $this->actingAs($user)
        ->withSession([
            'cart.items' => $cartSession,
            'cart.coupon_code' => 'LESS15',
        ])
        ->post(route('checkout.store'), checkoutPayload())
        ->assertRedirect();

    $order = Order::query()->latest('id')->first();

    expect($order)->not->toBeNull()
        ->and((string) $order->subtotal)->toBe('100.00')
        ->and((string) $order->discount)->toBe('15.00')
        ->and((string) $order->total)->toBe('85.00')
        ->and($order->coupon_code)->toBe('LESS15')
        ->and($order->coupon_type)->toBe('fixed')
        ->and((string) $order->coupon_value)->toBe('15.00');
});

it('enforces the coupon usage limit', function (): void {
    $product = pricedProduct('100.00');
    $coupon = Coupon::factory()->create([
        'code' => 'ONCEONLY',
        'usage_limit' => 1,
    ]);
    $user = User::factory()->create();

    Order::create([
        'user_id' => $user->id,
        'billing_email' => 'buyer@example.com',
        'billing_name' => 'Buyer',
        'order_number' => 'AAPSCM-COUPON-' . uniqid(),
        'status' => 'completed',
        'payment_method' => 'stripe',
        'payment_status' => 'paid',
        'currency' => 'USD',
        'subtotal' => '100.00',
        'tax' => '0.00',
        'discount' => '10.00',
        'coupon_id' => $coupon->id,
        'coupon_code' => $coupon->code,
        'coupon_type' => $coupon->type,
        'coupon_value' => $coupon->value,
        'total' => '90.00',
    ]);

    $this->post(route('cart.add', $product->id))->assertRedirect(route('cart.show'));

    $this->post(route('cart.coupon.apply'), ['coupon_code' => 'ONCEONLY'])
        ->assertRedirect(route('cart.show'))
        ->assertSessionHas('error', 'That coupon has reached its usage limit.');
});