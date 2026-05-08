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

it('adds a product to the cart by WordPress source id', function (): void {
    $product = seedPricedProduct();
    $product->update(['source_id' => 987654]);

    $this->post(route('cart.add', $product->source_id), ['quantity' => 1])
        ->assertRedirect(route('cart.show'));

    $this->get('/cart/')
        ->assertOk()
        ->assertSee($product->name)
        ->assertSee('USD 49.99');
});

it('adds a product to the cart via legacy GET /cart/add/{product}', function (): void {
    $product = seedPricedProduct();
    $product->update(['source_id' => 101367]);

    $this->get('/cart/add/101367')
        ->assertRedirect(route('cart.show'));

    $this->get('/cart/')
        ->assertOk()
        ->assertSee($product->name)
        ->assertSee('USD 49.99');
});

it('adds a product to the cart from a WooCommerce checkout add-to-cart query', function (): void {
    $product = seedPricedProduct();
    $product->update(['source_id' => 4234]);

    $this->get('/checkout/?add-to-cart=4234')
        ->assertRedirect(route('checkout.show'));

    expect(session('cart.items.' . $product->id . '.quantity'))->toBe(1);

    $this->get(route('checkout.show'))
        ->assertOk()
        ->assertSee($product->name)
        ->assertSee('USD 49.99');
});

it('does not duplicate a WooCommerce checkout add-to-cart item after the query is removed', function (): void {
    $product = seedPricedProduct();
    $product->update(['source_id' => 4234]);

    $this->get('/checkout/?add-to-cart=4234')
        ->assertRedirect(route('checkout.show'));

    expect(session('cart.items.' . $product->id . '.quantity'))->toBe(1);

    $this->get(route('checkout.show'))->assertOk();
    $this->get(route('checkout.show'))->assertOk();

    expect(session('cart.items.' . $product->id . '.quantity'))->toBe(1);
});

it('redirects an invalid WooCommerce checkout add-to-cart source id to the cart with an error', function (): void {
    $this->get('/checkout/?add-to-cart=999999')
        ->assertRedirect(route('cart.show'))
        ->assertSessionHas('error', 'The requested product is not available.');
});

it('redirects an inactive WooCommerce checkout add-to-cart product to the cart with an error', function (): void {
    $product = seedPricedProduct();
    $product->update([
        'is_active' => false,
        'source_id' => 4234,
    ]);

    $this->get('/checkout/?add-to-cart=4234')
        ->assertRedirect(route('cart.show'))
        ->assertSessionHas('error', 'The requested product is not available.');

    expect(session('cart.items'))->toBeNull();
});

it('prefers Laravel product id over WordPress source id when identifiers collide', function (): void {
    $productById = seedPricedProduct('10.00');
    $productById->update(['name' => 'Laravel ID Product']);

    $productBySourceId = seedPricedProduct('20.00');
    $productBySourceId->update([
        'name' => 'WordPress Source ID Product',
        'source_id' => $productById->id,
    ]);

    $this->post(route('cart.add', $productById->id), ['quantity' => 1])
        ->assertRedirect(route('cart.show'));

    $this->get('/cart/')
        ->assertOk()
        ->assertSee($productById->name)
        ->assertDontSee($productBySourceId->name)
        ->assertSee('USD 10.00');
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
