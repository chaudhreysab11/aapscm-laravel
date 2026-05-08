<?php

declare(strict_types=1);

use App\Filament\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

it('resolves the public price from the null membership tier product price', function (): void {
    $product = Product::factory()->create();

    ProductPrice::factory()->create([
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'price' => '49.99',
        'currency' => 'USD',
    ]);

    expect($product->fresh()->publicPrice?->price)->toBe('49.99');
});

it('creates and updates the public product price through the product resource helper', function (): void {
    $product = Product::factory()->create();

    ProductResource::persistPublicPrice($product, '25');

    expect($product->prices()->whereNull('membership_tier_id')->count())->toBe(1)
        ->and($product->fresh()->publicPrice?->price)->toBe('25.00');

    ProductResource::persistPublicPrice($product, '30.5');

    expect($product->prices()->whereNull('membership_tier_id')->count())->toBe(1)
        ->and($product->fresh()->publicPrice?->price)->toBe('30.50');
});
