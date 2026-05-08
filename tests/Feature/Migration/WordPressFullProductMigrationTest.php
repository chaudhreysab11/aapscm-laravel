<?php

declare(strict_types=1);

use App\Models\MigrationFlag;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Services\PricingService;
use App\Support\Migration\FullWordPressProductImporter;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function writeFullWordPressProductMigrationCsv(string $path, array $headers, array $rows): void
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

function makeFullWordPressProductMigrationFixtures(array $products, array $slugRows): array
{
    $directory = sys_get_temp_dir() . DIRECTORY_SEPARATOR . 'aapscm-full-product-migration-' . uniqid('', true);
    mkdir($directory, 0777, true);

    $productsPath = $directory . DIRECTORY_SEPARATOR . 'products.csv';
    $slugMapPath = $directory . DIRECTORY_SEPARATOR . 'wp-product-slug-map.csv';

    writeFullWordPressProductMigrationCsv($productsPath, [
        'ID',
        'Type',
        'SKU',
        'Name',
        'Published',
        'Visibility in catalog',
        'Short description',
        'Description',
        'Sale price',
        'Regular price',
        'Categories',
        'Tags',
        'Images',
        'Stock',
        'Parent',
        'External URL',
        'Button text',
        'Attribute 1 name',
        'Attribute 1 value(s)',
    ], $products);

    writeFullWordPressProductMigrationCsv($slugMapPath, [
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

it('imports the full product set idempotently while preserving approved slugs and public prices', function (): void {
    [$productsPath, $slugMapPath] = makeFullWordPressProductMigrationFixtures([
        [
            'ID' => '3001',
            'Type' => 'simple, virtual',
            'Name' => 'Approved Training Product',
            'Published' => '1',
            'Description' => 'Approved product description.',
            'Sale price' => '49.5',
            'Regular price' => '60',
            'Categories' => 'Online Course/Exam Payment',
        ],
        [
            'ID' => '3002',
            'Type' => 'simple, virtual',
            'Name' => 'Unresolved Missing Slug Product',
            'Published' => '1',
            'Regular price' => '25',
            'Categories' => 'Digital',
        ],
    ], [
        [
            'wp_product_id' => '3001',
            'wp_product_name' => 'Approved Training Product',
            'proposed_slug' => 'approved-training-product',
            'status' => 'approved',
        ],
        [
            'wp_product_id' => '3002',
            'wp_product_name' => 'Unresolved Missing Slug Product',
            'proposed_slug' => '',
            'status' => 'needs_review',
        ],
    ]);

    $importer = app(FullWordPressProductImporter::class);
    $firstRun = $importer->import($productsPath, $slugMapPath, clearExistingFlags: true);
    $secondRun = $importer->import($productsPath, $slugMapPath, clearExistingFlags: true);

    $approved = Product::where('source_id', 3001)->firstOrFail();
    $temporary = Product::where('source_id', 3002)->firstOrFail();

    expect($firstRun['imported_products'])->toBe(2)
        ->and($secondRun['imported_products'])->toBe(2)
        ->and(Product::whereIn('source_id', [3001, 3002])->count())->toBe(2)
        ->and(ProductPrice::whereIn('product_id', [$approved->id, $temporary->id])->whereNull('membership_tier_id')->count())->toBe(2)
        ->and($approved->slug)->toBe('approved-training-product')
        ->and($approved->migration_review_status)->toBe('approved')
        ->and($temporary->slug)->toBe('wp-product-3002')
        ->and($temporary->migration_review_status)->toBe('needs_review')
        ->and($temporary->id)->not->toBe(3002);

    expect(MigrationFlag::where('importer', 'WpImportAllProducts')->where('source_id', 3002)->where('flag_reason', 'like', 'temporary_slug:%')->exists())->toBeTrue();

    $resolved = app(PricingService::class)->resolvePrice($approved, null);

    expect($resolved['price'])->toBe('49.50')
        ->and($resolved['currency'])->toBe('USD')
        ->and($resolved['membership_tier_id'])->toBeNull();
});

it('imports unresolved candidate slugs but marks them for review', function (): void {
    [$productsPath, $slugMapPath] = makeFullWordPressProductMigrationFixtures([
        [
            'ID' => '3003',
            'Type' => 'simple, virtual',
            'Name' => 'Needs Review Candidate Product',
            'Published' => '1',
            'Regular price' => '80',
        ],
    ], [
        [
            'wp_product_id' => '3003',
            'wp_product_name' => 'Needs Review Candidate Product',
            'proposed_slug' => 'needs-review-candidate-product',
            'status' => 'needs_review',
        ],
    ]);

    app(FullWordPressProductImporter::class)->import($productsPath, $slugMapPath, clearExistingFlags: true);

    $product = Product::where('source_id', 3003)->firstOrFail();

    expect($product->slug)->toBe('needs-review-candidate-product')
        ->and($product->migration_review_status)->toBe('needs_review')
        ->and($product->migration_payload['slug']['temporary'])->toBeFalse();

    expect(MigrationFlag::where('importer', 'WpImportAllProducts')->where('source_id', 3003)->where('flag_reason', 'like', 'needs_review_slug_mapping:%')->exists())->toBeTrue();
});

it('imports missing price products without creating zero price rows and creates flags', function (): void {
    [$productsPath, $slugMapPath] = makeFullWordPressProductMigrationFixtures([
        [
            'ID' => '3004',
            'Type' => 'simple, virtual',
            'Name' => 'Missing Price Product',
            'Published' => '1',
            'Categories' => 'Digital',
        ],
    ], [
        [
            'wp_product_id' => '3004',
            'wp_product_name' => 'Missing Price Product',
            'proposed_slug' => 'missing-price-product',
            'status' => 'approved',
        ],
    ]);

    app(FullWordPressProductImporter::class)->import($productsPath, $slugMapPath, clearExistingFlags: true);
    $product = Product::where('source_id', 3004)->firstOrFail();

    expect($product->prices()->whereNull('membership_tier_id')->count())->toBe(0)
        ->and(ProductPrice::where('product_id', $product->id)->count())->toBe(0)
        ->and(MigrationFlag::where('importer', 'WpImportAllProducts')->where('source_id', 3004)->where('flag_reason', 'like', 'missing_price:%')->exists())->toBeTrue();
});

it('imports variations and preserves parent metadata', function (): void {
    [$productsPath, $slugMapPath] = makeFullWordPressProductMigrationFixtures([
        [
            'ID' => '3005',
            'Type' => 'variation, virtual',
            'Name' => 'Workshop Variation - April',
            'Published' => '1',
            'Regular price' => '120',
            'Parent' => 'id:3001',
            'Attribute 1 name' => 'Date',
            'Attribute 1 value(s)' => 'April',
        ],
    ], [
        [
            'wp_product_id' => '3005',
            'wp_product_name' => 'Workshop Variation - April',
            'proposed_slug' => '',
            'status' => 'needs_review',
        ],
    ]);

    app(FullWordPressProductImporter::class)->import($productsPath, $slugMapPath, clearExistingFlags: true);
    $product = Product::where('source_id', 3005)->firstOrFail();

    expect($product->type)->toBe('variation')
        ->and($product->migration_payload['type']['parent'])->toBe('id:3001')
        ->and(MigrationFlag::where('importer', 'WpImportAllProducts')->where('source_id', 3005)->where('flag_reason', 'like', 'variation_parent_preserved_in_metadata:%')->exists())->toBeTrue();
});

it('supports WooCommerce checkout add-to-cart URLs for fully imported products', function (): void {
    [$productsPath, $slugMapPath] = makeFullWordPressProductMigrationFixtures([
        [
            'ID' => '3006',
            'Type' => 'simple, virtual',
            'Name' => 'Checkout Full Imported Product',
            'Published' => '1',
            'Regular price' => '75',
        ],
    ], [
        [
            'wp_product_id' => '3006',
            'wp_product_name' => 'Checkout Full Imported Product',
            'proposed_slug' => 'checkout-full-imported-product',
            'status' => 'approved',
        ],
    ]);

    app(FullWordPressProductImporter::class)->import($productsPath, $slugMapPath, clearExistingFlags: true);
    $product = Product::where('source_id', 3006)->firstOrFail();

    $this->get('/checkout/?add-to-cart=3006')
        ->assertRedirect(route('checkout.show'));

    expect(session('cart.items.' . $product->id . '.quantity'))->toBe(1);
});
