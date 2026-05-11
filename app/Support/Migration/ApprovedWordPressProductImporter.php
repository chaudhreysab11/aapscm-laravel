<?php

declare(strict_types=1);

namespace App\Support\Migration;

use App\Models\MigrationFlag;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\DB;
use SplFileObject;

class ApprovedWordPressProductImporter
{
    private const IMPORTER = 'WpImportApprovedProducts';

    /**
     * @return array{
     *     products_csv_rows: int,
     *     slug_map_rows: int,
     *     eligible_rows: int,
     *     imported_products: int,
     *     imported_prices: int,
     *     skipped_rows: int,
     *     flags_written: int,
     *     flagged_issues: array<string, int>
     * }
     */
    public function import(string $productsPath, string $slugMapPath, bool $clearExistingFlags = false): array
    {
        $productsPath = $this->resolvePath($productsPath);
        $slugMapPath = $this->resolvePath($slugMapPath);

        $productRows = $this->readCsv($productsPath);
        $slugMapRows = $this->readCsv($slugMapPath);
        $productsBySourceId = [];

        foreach ($productRows as $row) {
            $sourceId = $this->sourceId($row['ID'] ?? null);

            if ($sourceId !== 0) {
                $productsBySourceId[$sourceId] = $row;
            }
        }

        $eligibleRows = array_values(array_filter(
            $slugMapRows,
            fn (array $row): bool => in_array(strtolower(trim((string) ($row['status'] ?? ''))), ['approved', 'confirmed'], true),
        ));

        $issues = [];
        $duplicateSlugCounts = $this->duplicateSlugCounts($eligibleRows);
        $importedProducts = 0;
        $importedPrices = 0;
        $skippedRows = count($slugMapRows) - count($eligibleRows);

        if ($clearExistingFlags) {
            MigrationFlag::query()
                ->where('importer', self::IMPORTER)
                ->where('resolved', false)
                ->delete();
        }

        foreach ($eligibleRows as $mapRow) {
            $sourceId = $this->sourceId($mapRow['wp_product_id'] ?? null);
            $slug = trim((string) ($mapRow['proposed_slug'] ?? ''));
            $productRow = $productsBySourceId[$sourceId] ?? null;

            $rowIssues = $this->validateRow($mapRow, $productRow, $duplicateSlugCounts, $slugMapPath);

            if ($rowIssues !== []) {
                array_push($issues, ...$rowIssues);
                $skippedRows++;
                continue;
            }

            $price = $this->price($productRow ?? []);
            $priceIssue = $this->priceIssue($productRow ?? [], $productsPath, $sourceId);
            $type = $this->type($productRow ?? [], $mapRow);

            DB::transaction(function () use ($sourceId, $slug, $mapRow, $productRow, $price, $priceIssue, $type, &$importedProducts, &$importedPrices, &$issues): void {
                $product = Product::updateOrCreate(
                    ['source_id' => $sourceId],
                    [
                        'name' => trim((string) ($productRow['Name'] ?? $mapRow['wp_product_name'] ?? '')),
                        'slug' => $slug,
                        'description' => $this->description($productRow ?? []),
                        'stock' => $this->stock($productRow ?? []),
                        'sku' => $this->nullableString($productRow['SKU'] ?? null),
                        'category' => $this->nullableString($productRow['Categories'] ?? null),
                        'type' => $type,
                        'is_active' => trim((string) ($productRow['Published'] ?? '1')) === '1',
                        'image' => $this->firstImage($productRow['Images'] ?? null),
                    ],
                );

                $importedProducts++;

                if ($price === null) {
                    if ($priceIssue !== null) {
                        $issues[] = $priceIssue;
                    }

                    return;
                }

                ProductPrice::updateOrCreate(
                    [
                        'product_id' => $product->id,
                        'membership_tier_id' => null,
                    ],
                    [
                        'price' => $price,
                        'currency' => 'USD',
                        'is_active' => true,
                    ],
                );

                $importedPrices++;
            });
        }

        $flagsWritten = $this->writeFlags($issues);
        $flaggedIssues = collect($issues)
            ->map(fn (array $issue): string => (string) ($issue['reason'] ?? 'unknown'))
            ->countBy()
            ->all();

        return [
            'products_csv_rows' => count($productRows),
            'slug_map_rows' => count($slugMapRows),
            'eligible_rows' => count($eligibleRows),
            'imported_products' => $importedProducts,
            'imported_prices' => $importedPrices,
            'skipped_rows' => $skippedRows,
            'flags_written' => $flagsWritten,
            'flagged_issues' => $flaggedIssues,
        ];
    }

    /** @param list<array<string, mixed>> $rows @return array<string, int> */
    private function duplicateSlugCounts(array $rows): array
    {
        $counts = [];

        foreach ($rows as $row) {
            $slug = trim((string) ($row['proposed_slug'] ?? ''));

            if ($slug === '') {
                continue;
            }

            $counts[$slug] = ($counts[$slug] ?? 0) + 1;
        }

        return array_filter($counts, fn (int $count): bool => $count > 1);
    }

    /** @param array<string, mixed> $mapRow @param array<string, mixed>|null $productRow @param array<string, int> $duplicateSlugCounts @return list<array<string, mixed>> */
    private function validateRow(array $mapRow, ?array $productRow, array $duplicateSlugCounts, string $slugMapPath): array
    {
        $issues = [];
        $sourceId = $this->sourceId($mapRow['wp_product_id'] ?? null);
        $slug = trim((string) ($mapRow['proposed_slug'] ?? ''));

        if ($sourceId === 0) {
            $issues[] = $this->issue($slugMapPath, $mapRow, 0, 'wp_product_id', 'missing_source_id', 'blocking', 'Slug map row has no stable WordPress product ID.');
        }

        if ($slug === '') {
            $issues[] = $this->issue($slugMapPath, $mapRow, $sourceId, 'proposed_slug', 'missing_slug', 'blocking', 'Approved product has no proposed slug.');
        } elseif (! preg_match('/^[a-z0-9]+(?:-[a-z0-9]+)*$/', $slug)) {
            $issues[] = $this->issue($slugMapPath, $mapRow, $sourceId, 'proposed_slug', 'invalid_slug', 'blocking', 'Approved product slug contains characters outside lowercase letters, numbers, and hyphens.');
        }

        if (($duplicateSlugCounts[$slug] ?? 0) > 1) {
            $issues[] = $this->issue($slugMapPath, $mapRow, $sourceId, 'proposed_slug', 'duplicate_slug', 'blocking', "Approved product slug '{$slug}' appears more than once in the eligible slug map.");
        }

        $existingProduct = $slug === '' ? null : Product::query()
            ->where('slug', $slug)
            ->where(function ($query) use ($sourceId): void {
                $query->whereNull('source_id')
                    ->orWhere('source_id', '!=', $sourceId);
            })
            ->first();

        if ($existingProduct !== null) {
            $issues[] = $this->issue($slugMapPath, $mapRow, $sourceId, 'proposed_slug', 'duplicate_slug', 'blocking', "Approved product slug '{$slug}' is already used by Laravel product ID {$existingProduct->id} with a different source_id.");
        }

        if ($productRow === null) {
            $issues[] = $this->issue($slugMapPath, $mapRow, $sourceId, 'wp_product_id', 'missing_product_csv_row', 'blocking', 'Approved product ID is not present in products.csv.');

            return $issues;
        }

        if (trim((string) ($productRow['Name'] ?? '')) === '') {
            $issues[] = $this->issue($this->resolvePath('database/import/wordpress/products.csv'), $productRow, $sourceId, 'Name', 'missing_product_name', 'blocking', 'Approved product row has no product name.');
        }

        return $issues;
    }

    /** @param array<string, mixed> $row @return array<string, mixed>|null */
    private function priceIssue(array $row, string $productsPath, int $sourceId): ?array
    {
        $salePrice = trim((string) ($row['Sale price'] ?? ''));
        $regularPrice = trim((string) ($row['Regular price'] ?? ''));

        if ($salePrice === '' && $regularPrice === '') {
            return $this->issue(
                $productsPath,
                $row,
                $sourceId,
                'Regular price',
                'missing_price',
                'warning',
                'Approved product has neither sale price nor regular price; product was imported without a product_prices row.',
            );
        }

        foreach (['Sale price' => $salePrice, 'Regular price' => $regularPrice] as $field => $value) {
            if ($value !== '' && (! is_numeric($value) || (float) $value < 0)) {
                return $this->issue(
                    $productsPath,
                    $row,
                    $sourceId,
                    $field,
                    'invalid_price',
                    'warning',
                    "Approved product {$field} is not a non-negative numeric value; product was imported without a product_prices row.",
                );
            }
        }

        return null;
    }

    /** @param list<array<string, mixed>> $issues */
    private function writeFlags(array $issues): int
    {
        $written = 0;

        DB::transaction(function () use ($issues, &$written): void {
            foreach ($issues as $issue) {
                MigrationFlag::updateOrCreate(
                    [
                        'importer' => self::IMPORTER,
                        'source_file' => $issue['source_file'],
                        'source_row_number' => $issue['source_row_number'],
                        'source_key' => $issue['source_key'],
                        'field_name' => $issue['field_name'],
                        'flag_reason' => $issue['flag_reason'],
                    ],
                    [
                        'source_table' => 'wp_products',
                        'source_id' => $issue['source_id'],
                        'severity' => $issue['severity'],
                        'original_value' => $issue['original_value'],
                        'raw_payload' => $issue['raw_payload'],
                        'resolved' => false,
                    ],
                );

                $written++;
            }
        });

        return $written;
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
    private function description(array $row): ?string
    {
        return $this->nullableString($row['Description'] ?? null)
            ?? $this->nullableString($row['Short description'] ?? null);
    }

    /** @param array<string, mixed> $row */
    private function price(array $row): ?string
    {
        $raw = $this->nullableString($row['Sale price'] ?? null)
            ?? $this->nullableString($row['Regular price'] ?? null);

        if ($raw === null || ! is_numeric($raw)) {
            return null;
        }

        return number_format((float) $raw, 2, '.', '');
    }

    /** @param array<string, mixed> $row */
    private function stock(array $row): int
    {
        $stock = trim((string) ($row['Stock'] ?? ''));

        return ctype_digit($stock) ? (int) $stock : 0;
    }

    /** @param array<string, mixed> $productRow @param array<string, mixed> $mapRow */
    private function type(array $productRow, array $mapRow): string
    {
        $haystack = strtolower((string) ($productRow['Categories'] ?? '') . ' ' . (string) ($productRow['Name'] ?? '') . ' ' . (string) ($mapRow['proposed_slug'] ?? ''));

        if (str_contains($haystack, 'membership')) {
            return 'membership';
        }

        if (str_contains($haystack, 'workshop') || str_contains($haystack, 'training')) {
            return 'training';
        }

        if (str_contains($haystack, 'exam')) {
            return 'exam_voucher';
        }

        if (str_contains($haystack, 'book') || str_contains($haystack, 'warehousing') || str_contains($haystack, 'inventory') || str_contains($haystack, 'purchasing')) {
            return 'physical';
        }

        return 'digital';
    }

    private function firstImage(mixed $value): ?string
    {
        $images = $this->nullableString($value);

        if ($images === null) {
            return null;
        }

        return trim(explode(',', $images)[0]) ?: null;
    }

    private function nullableString(mixed $value): ?string
    {
        $value = trim((string) $value);

        return $value === '' ? null : $value;
    }

    private function sourceId(mixed $value): int
    {
        $value = trim((string) $value);

        return ctype_digit($value) ? (int) $value : 0;
    }

    /** @param array<string, mixed> $row @return array<string, mixed> */
    private function issue(string $path, array $row, int $sourceId, string $fieldName, string $reason, string $severity, string $message): array
    {
        return [
            'source_file' => $this->relativePath($path),
            'source_id' => $sourceId,
            'source_row_number' => (int) ($row['_source_row_number'] ?? 1),
            'source_key' => $this->sourceKey($row),
            'severity' => $severity,
            'field_name' => $fieldName,
            'original_value' => isset($row[$fieldName]) ? (string) $row[$fieldName] : null,
            'reason' => $reason,
            'flag_reason' => $reason . ': ' . $message,
            'raw_payload' => $row,
        ];
    }

    /** @param array<string, mixed> $row */
    private function sourceKey(array $row): string
    {
        foreach (['wp_product_id', 'ID', 'Name', 'wp_product_name'] as $field) {
            $value = trim((string) ($row[$field] ?? ''));

            if ($value !== '') {
                return $value;
            }
        }

        return 'row-' . (string) ($row['_source_row_number'] ?? 'unknown');
    }

    private function resolvePath(string $path): string
    {
        if (str_starts_with($path, '/') || preg_match('#^[A-Za-z]:[\\/]#', $path) === 1) {
            return $path;
        }

        return base_path($path);
    }

    private function relativePath(string $path): string
    {
        $basePath = str_replace('\\', '/', base_path()) . '/';
        $path = str_replace('\\', '/', $path);

        return str_starts_with($path, $basePath) ? substr($path, strlen($basePath)) : $path;
    }
}
