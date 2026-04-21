<?php

declare(strict_types=1);

use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function seedPricedProduct(string $price = '49.99'): Product
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

it('shows an empty cart on first visit', function (): void {
    $this->get('/cart/')
        ->assertOk()
        ->assertSee('Your cart is currently empty');
});

it('adds a product to the cart and redirects to the cart page by default', function (): void {
    $product = seedPricedProduct();

    $this->post(route('cart.add', $product->id), ['quantity' => 2])
        ->assertRedirect(route('cart.show'));

    $this->get('/cart/')
        ->assertOk()
        ->assertSee($product->name)
        ->assertSee('USD 99.98'); // 2 x 49.99
});

it('updates the quantity of a cart line', function (): void {
    $product = seedPricedProduct('20.00');

    $this->post(route('cart.add', $product->id))->assertRedirect();

    $this->patch(route('cart.update', $product->id), ['quantity' => 5])
        ->assertRedirect(route('cart.show'));

    $this->get('/cart/')->assertSee('USD 100.00'); // 5 x 20.00
});

it('removes a line when quantity update is set to 0', function (): void {
    $product = seedPricedProduct('20.00');

    $this->post(route('cart.add', $product->id))->assertRedirect();

    $this->patch(route('cart.update', $product->id), ['quantity' => 0])
        ->assertRedirect(route('cart.show'));

    $this->get('/cart/')->assertSee('Your cart is currently empty');
});

it('removes a line via DELETE /cart/{product}', function (): void {
    $product = seedPricedProduct();

    $this->post(route('cart.add', $product->id))->assertRedirect();
    $this->delete(route('cart.remove', $product->id))->assertRedirect(route('cart.show'));

    $this->get('/cart/')->assertSee('Your cart is currently empty');
});

it('rejects negative quantity on update', function (): void {
    $product = seedPricedProduct();

    $this->post(route('cart.add', $product->id))->assertRedirect();

    $this->patch(route('cart.update', $product->id), ['quantity' => -1])
        ->assertSessionHasErrors('quantity');
});

it('redirects GET /checkout/ to the cart page (not the homepage) when the cart is empty', function (): void {
    $this->get(route('checkout.show'))
        ->assertRedirect(route('cart.show'))
        ->assertSessionHas('error', 'Your cart is currently empty. Add a product before checking out.');
});
