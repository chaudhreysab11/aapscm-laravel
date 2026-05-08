<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\MigrationFlag;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use SplFileObject;

class WpValidateProductMigrationCommand extends Command
{
    protected $signature = 'wp:validate-product-migration
                            {--products=database/import/wordpress/products.csv : WordPress products CSV export}
                            {--slug-map=database/docs/wp-product-slug-map.csv : WordPress product slug map}';

    protected $description = 'Validate the controlled WordPress product migration results';

    public function handle(): int
    {
        $productsPath = $this->resolvePath((string) $this->option('products'));
        $productRows = $this->readCsv($productsPath);

        $eligibleSourceIds = array_values(array_filter(array_map(
            fn (array $row): int => $this->sourceId($row['ID'] ?? null),
            $productRows,
        )));

        $importedProducts = Product::query()
            ->whereIn('source_id', $eligibleSourceIds)
            ->get();
        $importedProductIds = $importedProducts->pluck('id')->all();
        $publicPrices = ProductPrice::query()
            ->whereIn('product_id', $importedProductIds)
            ->whereNull('membership_tier_id')
            ->get();

        $missingOrInvalidPriceRows = 0;

        foreach ($productRows as $row) {
            if ($this->sourceId($row['ID'] ?? null) !== 0 && trim((string) ($row['Name'] ?? '')) !== '' && $this->price($row) === null) {
                $missingOrInvalidPriceRows++;
            }
        }

        $duplicateSlugs = Product::query()
            ->select('slug', DB::raw('count(*) as aggregate'))
            ->whereNotNull('source_id')
            ->groupBy('slug')
            ->having('aggregate', '>', 1)
            ->count();
        $duplicateSourceIds = Product::query()
            ->select('source_id', DB::raw('count(*) as aggregate'))
            ->whereNotNull('source_id')
            ->groupBy('source_id')
            ->having('aggregate', '>', 1)
            ->count();
        $productsWithoutPublicPrice = $importedProducts
            ->filter(fn (Product $product): bool => ! $publicPrices->contains('product_id', $product->id))
            ->count();
        $inactiveImportedProducts = $importedProducts
            ->filter(fn (Product $product): bool => ! (bool) $product->is_active)
            ->count();
        $activeImportedProducts = $importedProducts->count() - $inactiveImportedProducts;
        $temporarySlugProducts = $importedProducts
            ->filter(fn (Product $product): bool => str_starts_with((string) $product->slug, 'wp-product-'))
            ->count();
        $needsReviewProducts = $importedProducts
            ->filter(fn (Product $product): bool => $product->migration_review_status === 'needs_review')
            ->count();
        $variationProducts = $importedProducts
            ->filter(fn (Product $product): bool => $product->type === 'variation')
            ->count();
        $externalProducts = $importedProducts
            ->filter(fn (Product $product): bool => $product->type === 'external')
            ->count();
        $missingPriceFlags = MigrationFlag::query()
            ->where('importer', 'WpImportAllProducts')
            ->where('resolved', false)
            ->where(function ($query): void {
                $query->where('flag_reason', 'like', 'missing_price:%')
                    ->orWhere('flag_reason', 'like', 'invalid_price:%');
            })
            ->count();
        $flaggedRows = MigrationFlag::query()
            ->where('importer', 'WpImportAllProducts')
            ->where('resolved', false)
            ->count();
        $typeSummary = $importedProducts
            ->countBy('type')
            ->sortKeys()
            ->all();

        $summary = [
            'total_woocommerce_product_rows' => count($productRows),
            'total_products_imported' => $importedProducts->count(),
            'total_public_product_prices' => $publicPrices->count(),
            'active_products' => $activeImportedProducts,
            'inactive_products' => $inactiveImportedProducts,
            'temporary_slug_products' => $temporarySlugProducts,
            'products_without_public_price' => $productsWithoutPublicPrice,
            'products_missing_price' => $missingOrInvalidPriceRows,
            'missing_price_flags' => $missingPriceFlags,
            'variation_products' => $variationProducts,
            'external_products' => $externalProducts,
            'duplicate_slugs' => $duplicateSlugs,
            'duplicate_source_id' => $duplicateSourceIds,
            'needs_review_products' => $needsReviewProducts,
            'unresolved_product_migration_flags' => $flaggedRows,
        ];

        foreach ($summary as $label => $value) {
            $this->line("{$label}: {$value}");
        }

        $this->newLine();
        $this->line('product_type_summary:');

        if ($typeSummary === []) {
            $this->line('  none');
        } else {
            foreach ($typeSummary as $type => $count) {
                $this->line("  {$type}: {$count}");
            }
        }

        return self::SUCCESS;
    }

    /** @return list<array<string, mixed>> */
    private function readCsv(string $path): array
    {
        if (! is_file($path)) {
            return [];
        }

        $file = new SplFileObject($path, 'r');
        $file->setFlags(SplFileObject::READ_CSV | SplFileObject::SKIP_EMPTY);
        $headers = [];
        $rows = [];

        foreach ($file as $index => $row) {
            if (! is_array($row) || $row === [null]) {
                continue;
            }

            $values = array_map(fn (mixed $value): string => trim((string) $value), $row);

            if ($headers === []) {
                if (isset($values[0])) {
                    $values[0] = preg_replace('/^\xEF\xBB\xBF/', '', $values[0]) ?? $values[0];
                }

                $headers = $values;

                continue;
            }

            $values = array_pad($values, count($headers), '');
            $combined = array_combine($headers, array_slice($values, 0, count($headers)));

            if ($combined === false) {
                continue;
            }

            $combined['_source_row_number'] = $index + 1;
            $rows[] = $combined;
        }

        return $rows;
    }

    /** @param array<string, mixed> $row */
    private function price(array $row): ?string
    {
        $salePrice = trim((string) ($row['Sale price'] ?? ''));
        $regularPrice = trim((string) ($row['Regular price'] ?? ''));
        $raw = $salePrice !== '' ? $salePrice : $regularPrice;
        $normalized = str_replace([',', '$'], '', $raw);

        if ($raw === '' || ! is_numeric($normalized) || (float) $normalized < 0) {
            return null;
        }

        return number_format((float) $normalized, 2, '.', '');
    }

    private function sourceId(mixed $value): int
    {
        $value = trim((string) $value);

        return ctype_digit($value) ? (int) $value : 0;
    }

    private function resolvePath(string $path): string
    {
        if (preg_match('/^(?:[A-Za-z]:[\\\\\/]|\/|\\\\)/', $path) === 1) {
            return $path;
        }

        return base_path($path);
    }
}
