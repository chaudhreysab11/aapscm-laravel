<?php

declare(strict_types=1);

use App\Models\Product;
use App\Models\ProductPrice;
use Database\Seeders\CommerceConfirmedPricesSeeder;
use Database\Seeders\CommerceConfirmedProductsSeeder;
use Database\Seeders\MembershipTiersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/**
 * End-to-end verification for the confirmed commerce subset (Task D).
 *
 * Confirmed subset:
 *  - professional-membership          (WP id 4234,  $150 USD)
 *  - corporate-membership             (WP id 4233,  $3,000 USD)
 *  - professional-membership-renewal  (WP id 37207, $160 USD)
 *
 * Goal: prove that running ONLY the confirmed seeders produces a working
 * add-to-cart -> cart -> checkout flow for each of the three products,
 * end-to-end, without depending on any other product seeder.
 */
beforeEach(function (): void {
    $this->seed(MembershipTiersSeeder::class);
    $this->seed(CommerceConfirmedProductsSeeder::class);
    $this->seed(CommerceConfirmedPricesSeeder::class);
});

dataset('confirmed_products', [
    'professional-membership' => ['professional-membership', 4234, '150.00', 'USD 150.00'],
    'corporate-membership' => ['corporate-membership', 4233, '3000.00', 'USD 3000.00'],
    'professional-membership-renewal' => ['professional-membership-renewal', 37207, '160.00', 'USD 160.00'],
]);

it('seeds exactly the 3 confirmed products and 3 NULL-tier prices, no extras', function (): void {
    expect(Product::count())->toBe(3)
        ->and(ProductPrice::count())->toBe(3)
        ->and(ProductPrice::whereNull('membership_tier_id')->count())->toBe(3);
});

it('completes add-to-cart -> cart -> checkout for each confirmed product', function (
    string $slug,
    int $sourceId,
    string $price,
    string $expectedDisplay,
): void {
    $product = Product::where('slug', $slug)->firstOrFail();

    expect((int) $product->source_id)->toBe($sourceId);
    expect(
        ProductPrice::where('product_id', $product->id)
            ->whereNull('membership_tier_id')
            ->value('price')
    )->toBe($price);

    // Add to cart.
    $this->post(route('cart.add', $product->id), ['quantity' => 1])
        ->assertRedirect(route('cart.show'));

    // Cart shows the product + correct line total at the public price.
    $this->get(route('cart.show'))
        ->assertOk()
        ->assertSee($product->name)
        ->assertSee($expectedDisplay);

    // Checkout shows the same product + total (cart not empty -> renders form).
    $this->get(route('checkout.show'))
        ->assertOk()
        ->assertSee($product->name)
        ->assertSee($expectedDisplay);
})->with('confirmed_products');
