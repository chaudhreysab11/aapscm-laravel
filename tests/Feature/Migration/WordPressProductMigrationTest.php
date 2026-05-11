<?php

declare(strict_types=1);

use App\Models\MigrationFlag;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Services\PricingService;
use App\Support\Migration\ApprovedWordPressProductImporter;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function writeWordPressProductMigrationCsv(string $path, array $headers, array $rows): void
{
    $handle = fopen($path, 'w');

    if ($handle === false) {
        throw new RuntimeException("Unable to write test CSV at {$path}");
    }

    fputcsv($handle, $headers);

    foreach ($rows as $row) {
        fputcsv($handle, array_map(fn (string $header): string => (string) ($row[$header] ?? ''), $headers));
    }

    fclose($handle);
}

function makeWordPressProductMigrationFixtures(array $products, array $slugRows): array
{
    $directory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'aapscm-product-migration-' . uniqid('', true);
    mkdir($directory, 0777, true);

    $productsPath = $directory . DIRECTORY_SEPARATOR . 'products.csv';
    $slugMapPath = $directory . DIRECTORY_SEPARATOR . 'wp-product-slug-map.csv';

    writeWordPressProductMigrationCsv($productsPath, [
        'ID',
        'Type',
        'SKU',
        'Name',
        'Published',
        'Short description',
        'Description',
        'Sale price',
        'Regular price',
        'Categories',
        'Images',
        'Stock',
    ], $products);

    writeWordPressProductMigrationCsv($slugMapPath, [
        'wp_product_id',
        'wp_product_name',
        'proposed_slug',
        'source_of_slug',
        'confidence',
        'status',
        'notes',
    ], $slugRows);

    return [$productsPath, $slugMapPath];
}

it('imports approved products and public prices idempotently by WordPress source id', function (): void {
    [$productsPath, $slugMapPath] = makeWordPressProductMigrationFixtures([
        [
            'ID' => '2001',
            'Type' => 'simple, virtual',
            'Name' => 'Final Approved Product',
            'Published' => '1',
            'Description' => 'Long description wins.',
            'Short description' => 'Short description.',
            'Sale price' => '49.5',
            'Regular price' => '60',
            'Categories' => 'Training',
        ],
    ], [
        [
            'wp_product_id' => '2001',
            'wp_product_name' => 'Final Approved Product',
            'proposed_slug' => 'final-approved-product',
            'status' => 'approved',
        ],
    ]);

    $importer = app(ApprovedWordPressProductImporter::class);

    $firstRun = $importer->import($productsPath, $slugMapPath, clearExistingFlags: true);
    $secondRun = $importer->import($productsPath, $slugMapPath, clearExistingFlags: true);

    $product = Product::where('source_id', 2001)->firstOrFail();

    expect($firstRun['imported_products'])->toBe(1)
        ->and($secondRun['imported_products'])->toBe(1)
        ->and(Product::where('source_id', 2001)->count())->toBe(1)
        ->and($product->id)->not->toBe(2001)
        ->and($product->slug)->toBe('final-approved-product')
        ->and($product->name)->toBe('Final Approved Product')
        ->and($product->type)->toBe('training')
        ->and($product->description)->toBe('Long description wins.');

    expect(ProductPrice::where('product_id', $product->id)->whereNull('membership_tier_id')->count())->toBe(1)
        ->and($product->prices()->whereNull('membership_tier_id')->first()?->price)->toBe('49.50');

    $resolved = app(PricingService::class)->resolvePrice($product, null);

    expect($resolved['price'])->toBe('49.50')
        ->and($resolved['currency'])->toBe('USD')
        ->and($resolved['membership_tier_id'])->toBeNull();
});

it('skips unresolved rows and flags missing prices without creating zero-price rows', function (): void {
    [$productsPath, $slugMapPath] = makeWordPressProductMigrationFixtures([
        [
            'ID' => '2002',
            'Type' => 'simple, virtual',
            'Name' => 'Needs Review Product',
            'Published' => '1',
            'Regular price' => '99',
        ],
        [
            'ID' => '2003',
            'Type' => 'simple, virtual',
            'Name' => 'Missing Price Product',
            'Published' => '1',
        ],
    ], [
        [
            'wp_product_id' => '2002',
            'wp_product_name' => 'Needs Review Product',
            'proposed_slug' => 'needs-review-product',
            'status' => 'needs_review',
        ],
        [
            'wp_product_id' => '2003',
            'wp_product_name' => 'Missing Price Product',
            'proposed_slug' => 'missing-price-product',
            'status' => 'approved',
        ],
    ]);

    $result = app(ApprovedWordPressProductImporter::class)->import($productsPath, $slugMapPath, clearExistingFlags: true);

    expect(Product::where('source_id', 2002)->exists())->toBeFalse()
        ->and(Product::where('source_id', 2003)->exists())->toBeTrue()
        ->and(ProductPrice::count())->toBe(0)
        ->and($result['flagged_issues']['missing_price'] ?? 0)->toBe(1);

    $flag = MigrationFlag::where('importer', 'WpImportApprovedProducts')
        ->where('source_id', 2003)
        ->first();

    expect($flag)->not->toBeNull()
        ->and($flag->field_name)->toBe('Regular price')
        ->and($flag->flag_reason)->toContain('missing_price');
});

it('supports WooCommerce checkout add-to-cart URLs for imported products', function (): void {
    [$productsPath, $slugMapPath] = makeWordPressProductMigrationFixtures([
        [
            'ID' => '2004',
            'Type' => 'simple, virtual',
            'Name' => 'Checkout Imported Product',
            'Published' => '1',
            'Regular price' => '75',
        ],
    ], [
        [
            'wp_product_id' => '2004',
            'wp_product_name' => 'Checkout Imported Product',
            'proposed_slug' => 'checkout-imported-product',
            'status' => 'approved',
        ],
    ]);

    app(ApprovedWordPressProductImporter::class)->import($productsPath, $slugMapPath, clearExistingFlags: true);
    $product = Product::where('source_id', 2004)->firstOrFail();

    $this->get('/checkout/?add-to-cart=2004')
        ->assertRedirect(route('cart.show'));

    expect(session('cart.items.' . $product->id . '.quantity'))->toBe(1);
});
