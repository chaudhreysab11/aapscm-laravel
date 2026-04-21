<?php

declare(strict_types=1);

use App\Models\Product;
use App\Models\ProductPrice;
use App\Services\PricingService;
use Database\Seeders\CommerceConfirmedPricesSeeder;
use Database\Seeders\CommerceConfirmedProductsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/**
 * @return array<int, array{slug: string, price: string}>
 */
function confirmedSubset(): array
{
    return [
        ['slug' => 'professional-membership', 'price' => '150.00'],
        ['slug' => 'corporate-membership', 'price' => '3000.00'],
        ['slug' => 'professional-membership-renewal', 'price' => '160.00'],
    ];
}

it('seeds the 3 confirmed products with the right slugs, type, and source_id', function (): void {
    (new CommerceConfirmedProductsSeeder)->run();

    expect(Product::count())->toBe(3);

    foreach (confirmedSubset() as $row) {
        $product = Product::where('slug', $row['slug'])->first();

        expect($product)->not->toBeNull()
            ->and($product->type)->toBe('membership')
            ->and((bool) $product->is_active)->toBeTrue()
            ->and($product->source_id)->not->toBeNull();
    }
});

it('seeds the public NULL-tier price for each confirmed product', function (): void {
    (new CommerceConfirmedProductsSeeder)->run();
    (new CommerceConfirmedPricesSeeder)->run();

    expect(ProductPrice::count())->toBe(3);

    foreach (confirmedSubset() as $row) {
        $product = Product::where('slug', $row['slug'])->firstOrFail();

        $price = ProductPrice::where('product_id', $product->id)
            ->whereNull('membership_tier_id')
            ->first();

        expect($price)->not->toBeNull()
            ->and($price->currency)->toBe('USD')
            ->and((bool) $price->is_active)->toBeTrue()
            ->and(number_format((float) $price->price, 2, '.', ''))->toBe($row['price']);
    }
});

it('is idempotent — running both seeders twice does not create duplicates', function (): void {
    (new CommerceConfirmedProductsSeeder)->run();
    (new CommerceConfirmedPricesSeeder)->run();

    (new CommerceConfirmedProductsSeeder)->run();
    (new CommerceConfirmedPricesSeeder)->run();

    expect(Product::count())->toBe(3)
        ->and(ProductPrice::count())->toBe(3);
});

it('resolves the correct guest price for each confirmed product via PricingService', function (): void {
    (new CommerceConfirmedProductsSeeder)->run();
    (new CommerceConfirmedPricesSeeder)->run();

    $service = new PricingService;

    foreach (confirmedSubset() as $row) {
        $product = Product::where('slug', $row['slug'])->firstOrFail();

        $resolved = $service->resolvePrice($product, null);

        expect($resolved['price'])->toBe($row['price'])
            ->and($resolved['currency'])->toBe('USD')
            ->and($resolved['membership_tier_id'])->toBeNull();
    }
});

it('exposes a page-product map covering exactly the confirmed subset', function (): void {
    /** @var array<string, string> $map */
    $map = require database_path('seeders/data/page-product-map.php');

    expect($map)->toBeArray()
        ->and(array_keys($map))->toEqualCanonicalizing([
            'professional-membership',
            'corporate-membership',
            'professional-membership-renewal',
        ]);

    (new CommerceConfirmedProductsSeeder)->run();

    foreach ($map as $productSlug) {
        expect(Product::where('slug', $productSlug)->exists())->toBeTrue();
    }
});
