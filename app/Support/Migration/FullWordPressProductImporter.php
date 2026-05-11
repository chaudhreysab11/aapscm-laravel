<?php

declare(strict_types=1);

namespace App\Support\Migration;

use App\Models\MigrationFlag;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Support\Facades\DB;
use SplFileObject;

class FullWordPressProductImporter
{
    private const IMPORTER = 'WpImportAllProducts';

    /**
     * @return array{
     *     products_csv_rows: int,
     *     slug_map_rows: int,
     *     valid_product_rows: int,
     *     imported_products: int,
     *     imported_prices: int,
     *     missing_or_invalid_price_rows: int,
     *     temporary_slug_products: int,
     *     needs_review_products: int,
     *     variation_products: int,
     *     external_products: int,
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
        $slugMapBySourceId = $this->slugMapBySourceId($slugMapRows);
        $duplicateCandidateSlugs = $this->duplicateSlugCounts($slugMapRows);
        $seenSourceIds = [];
        $usedSlugs = [];
        $issues = [];
        $importedProducts = 0;
        $importedPrices = 0;
        $missingOrInvalidPriceRows = 0;
        $temporarySlugProducts = 0;
        $needsReviewProducts = 0;
        $variationProducts = 0;
        $externalProducts = 0;
        $skippedRows = 0;

        if ($clearExistingFlags) {
            MigrationFlag::query()
                ->where('importer', self::IMPORTER)
                ->where('resolved', false)
                ->delete();
        }

        foreach ($productRows as $productRow) {
            $sourceId = $this->sourceId($productRow['ID'] ?? null);
            $name = trim((string) ($productRow['Name'] ?? ''));

            if ($sourceId === 0 || $name === '') {
                $issues[] = $this->issue(
                    $productsPath,
                    $productRow,
                    $sourceId,
                    $sourceId === 0 ? 'ID' : 'Name',
                    $sourceId === 0 ? 'missing_source_id' : 'missing_product_name',
                    'blocking',
                    'Product row does not have both a stable WordPress product ID and name, so it was not imported.',
                );
                $skippedRows++;

                continue;
            }

            if (isset($seenSourceIds[$sourceId])) {
                $issues[] = $this->issue(
                    $productsPath,
                    $productRow,
                    $sourceId,
                    'ID',
                    'duplicate_source_id',
                    'blocking',
                    "WordPress product ID {$sourceId} appears more than once in products.csv; later duplicate row was not imported.",
                );
                $skippedRows++;

                continue;
            }

            $seenSourceIds[$sourceId] = true;
            $mapRow = $slugMapBySourceId[$sourceId] ?? null;
            $slugDecision = $this->slug($sourceId, $productRow, $mapRow, $duplicateCandidateSlugs, $usedSlugs, $productsPath, $issues);
            $typeDecision = $this->type($productRow, $slugDecision['slug'], $productsPath, $sourceId, $issues);
            $price = $this->price($productRow);
            $priceIssue = $this->priceIssue($productRow, $productsPath, $sourceId);

            if ($price === null) {
                $missingOrInvalidPriceRows++;

                if ($priceIssue !== null) {
                    $issues[] = $priceIssue;
                }
            }

            if ($slugDecision['temporary']) {
                $temporarySlugProducts++;
            }

            if ($slugDecision['review_status'] === 'needs_review') {
                $needsReviewProducts++;
            }

            if ($typeDecision['type'] === 'variation') {
                $variationProducts++;
            }

            if ($typeDecision['type'] === 'external') {
                $externalProducts++;
            }

            DB::transaction(function () use ($sourceId, $name, $productRow, $mapRow, $slugDecision, $typeDecision, $price, &$importedProducts, &$importedPrices): void {
                $product = Product::updateOrCreate(
                    ['source_id' => $sourceId],
                    [
                        'name' => $name,
                        'slug' => $slugDecision['slug'],
                        'description' => $this->description($productRow),
                        'stock' => $this->stock($productRow),
                        'sku' => $this->nullableString($productRow['SKU'] ?? null),
                        'category' => $this->nullableString($productRow['Categories'] ?? null),
                        'type' => $typeDecision['type'],
                        'is_active' => trim((string) ($productRow['Published'] ?? '')) === '1',
                        'image' => $this->firstImage($productRow['Images'] ?? null),
                        'migration_review_status' => $slugDecision['review_status'],
                        'migration_notes' => $this->migrationNotes($slugDecision, $typeDecision, $price),
                        'migration_payload' => $this->migrationPayload($productRow, $mapRow, $slugDecision, $typeDecision),
                    ],
                );

                $importedProducts++;

                if ($price === null) {
                    ProductPrice::query()
                        ->where('product_id', $product->id)
                        ->whereNull('membership_tier_id')
                        ->delete();

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
            'valid_product_rows' => count($productRows) - $skippedRows,
            'imported_products' => $importedProducts,
            'imported_prices' => $importedPrices,
            'missing_or_invalid_price_rows' => $missingOrInvalidPriceRows,
            'temporary_slug_products' => $temporarySlugProducts,
            'needs_review_products' => $needsReviewProducts,
            'variation_products' => $variationProducts,
            'external_products' => $externalProducts,
            'skipped_rows' => $skippedRows,
            'flags_written' => $flagsWritten,
            'flagged_issues' => $flaggedIssues,
        ];
    }

    /** @param list<array<string, mixed>> $rows @return array<int, array<string, mixed>> */
    private function slugMapBySourceId(array $rows): array
    {
        $mapped = [];

        foreach ($rows as $row) {
            $sourceId = $this->sourceId($row['wp_product_id'] ?? null);

            if ($sourceId !== 0) {
                $mapped[$sourceId] = $row;
            }
        }

        return $mapped;
    }

    /** @param list<array<string, mixed>> $rows @return array<string, int> */
    private function duplicateSlugCounts(array $rows): array
    {
        $counts = [];

        foreach ($rows as $row) {
            $slug = trim((string) ($row['proposed_slug'] ?? ''));

            if ($slug !== '') {
                $counts[$slug] = ($counts[$slug] ?? 0) + 1;
            }
        }

        return array_filter($counts, fn (int $count): bool => $count > 1);
    }

    /** @param array<string, mixed> $productRow @param array<string, mixed>|null $mapRow @param array<string, int> $duplicateCandidateSlugs @param array<string, int> $usedSlugs @param list<array<string, mixed>> $issues @return array{slug:string, review_status:string, temporary:bool, source_status:string, candidate_slug:string|null, notes:list<string>} */
    private function slug(int $sourceId, array $productRow, ?array $mapRow, array $duplicateCandidateSlugs, array &$usedSlugs, string $productsPath, array &$issues): array
    {
        $sourceStatus = strtolower(trim((string) ($mapRow['status'] ?? 'needs_review')));
        $isApproved = in_array($sourceStatus, ['approved', 'confirmed'], true);
        $candidateSlug = $this->nullableString($mapRow['proposed_slug'] ?? null);
        $slug = $candidateSlug;
        $temporary = false;
        $notes = [];

        if ($slug === null) {
            $slug = "wp-product-{$sourceId}";
            $temporary = true;
            $notes[] = 'Temporary internal slug generated because no reviewed product slug exists.';
            $issues[] = $this->issue(
                $productsPath,
                $productRow,
                $sourceId,
                'Name',
                'temporary_slug',
                'warning',
                "Product imported with temporary internal slug {$slug}; this is not a final SEO/public slug.",
            );
        } elseif (! $isApproved) {
            $notes[] = 'Candidate slug imported from unresolved slug map row and still requires SEO review.';
            $issues[] = $this->issue(
                $productsPath,
                $productRow,
                $sourceId,
                'Name',
                'needs_review_slug_mapping',
                'warning',
                'Product imported with an unresolved candidate slug that still requires review.',
            );
        }

        if (($duplicateCandidateSlugs[$slug] ?? 0) > 1 || isset($usedSlugs[$slug])) {
            $replacementSlug = "wp-product-{$sourceId}";
            $issues[] = $this->issue(
                $productsPath,
                $productRow,
                $sourceId,
                'Name',
                'duplicate_slug_replaced_with_temporary',
                'warning',
                "Candidate slug {$slug} was not unique during import; product used temporary slug {$replacementSlug} instead.",
            );
            $slug = $replacementSlug;
            $temporary = true;
            $notes[] = 'Candidate slug conflicted with another imported row and was replaced with a temporary internal slug.';
        }

        $existingSlugOwner = Product::query()
            ->where('slug', $slug)
            ->where(function ($query) use ($sourceId): void {
                $query->whereNull('source_id')
                    ->orWhere('source_id', '!=', $sourceId);
            })
            ->first();

        if ($existingSlugOwner instanceof Product) {
            $replacementSlug = "wp-product-{$sourceId}";
            $issues[] = $this->issue(
                $productsPath,
                $productRow,
                $sourceId,
                'Name',
                'existing_slug_conflict_replaced_with_temporary',
                'warning',
                "Candidate slug {$slug} already belongs to Laravel product ID {$existingSlugOwner->id}; product used temporary slug {$replacementSlug} instead.",
            );
            $slug = $replacementSlug;
            $temporary = true;
            $notes[] = 'Candidate slug conflicted with an existing Laravel product and was replaced with a temporary internal slug.';
        }

        $usedSlugs[$slug] = $sourceId;

        return [
            'slug' => $slug,
            'review_status' => $isApproved && ! $temporary ? 'approved' : 'needs_review',
            'temporary' => $temporary,
            'source_status' => $sourceStatus === '' ? 'needs_review' : $sourceStatus,
            'candidate_slug' => $candidateSlug,
            'notes' => $notes,
        ];
    }

    /** @param array<string, mixed> $row @param list<array<string, mixed>> $issues @return array{type:string, notes:list<string>} */
    private function type(array $row, string $slug, string $productsPath, int $sourceId, array &$issues): array
    {
        $type = strtolower((string) ($row['Type'] ?? ''));
        $haystack = strtolower(implode(' ', [
            $type,
            (string) ($row['Categories'] ?? ''),
            (string) ($row['Tags'] ?? ''),
            (string) ($row['Name'] ?? ''),
            $slug,
        ]));
        $notes = [];

        if (str_contains($type, 'variation') || $this->nullableString($row['Parent'] ?? null) !== null) {
            $notes[] = 'WooCommerce variation imported as standalone product because no variant-parent product schema is available.';
            $issues[] = $this->issue($productsPath, $row, $sourceId, 'Parent', 'variation_parent_preserved_in_metadata', 'warning', 'Variation parent information was preserved in migration_payload for later catalog modeling.');

            return ['type' => 'variation', 'notes' => $notes];
        }

        if (str_contains($type, 'external') || $this->nullableString($row['External URL'] ?? null) !== null) {
            return ['type' => 'external', 'notes' => $notes];
        }

        if (str_contains($haystack, 'membership')) {
            return ['type' => 'membership', 'notes' => $notes];
        }

        if (str_contains($haystack, 'training') || str_contains($haystack, 'workshop') || str_contains($haystack, 'course') || str_contains($haystack, 'learning') || str_contains($haystack, 'instructor-led') || str_contains($haystack, 'self-paced') || str_contains($haystack, 'on-demand')) {
            return ['type' => 'training', 'notes' => $notes];
        }

        if (str_contains($haystack, 'exam') || str_contains($haystack, 'voucher') || str_contains($haystack, 'certificate fee')) {
            return ['type' => 'exam_voucher', 'notes' => $notes];
        }

        if (str_contains($haystack, 'book') || str_contains($haystack, 'warehousing') || str_contains($haystack, 'inventory') || str_contains($haystack, 'purchasing') || str_contains($haystack, 'logistics')) {
            return ['type' => 'physical', 'notes' => $notes];
        }

        if (str_contains($type, 'virtual') || str_contains($type, 'downloadable')) {
            return ['type' => 'digital', 'notes' => $notes];
        }

        $notes[] = 'Product type was unclear and defaulted to digital for import safety.';
        $issues[] = $this->issue($productsPath, $row, $sourceId, 'Type', 'unclear_product_type', 'warning', 'Product type could not be inferred confidently and defaulted to digital.');

        return ['type' => 'digital', 'notes' => $notes];
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
        $raw = $this->priceRaw($row);

        if ($raw === null) {
            return null;
        }

        $normalized = str_replace([',', '$'], '', trim($raw));

        if (! is_numeric($normalized) || (float) $normalized < 0) {
            return null;
        }

        return number_format((float) $normalized, 2, '.', '');
    }

    /** @param array<string, mixed> $row */
    private function priceRaw(array $row): ?string
    {
        return $this->nullableString($row['Sale price'] ?? null)
            ?? $this->nullableString($row['Regular price'] ?? null);
    }

    /** @param array<string, mixed> $row @return array<string, mixed>|null */
    private function priceIssue(array $row, string $productsPath, int $sourceId): ?array
    {
        $salePrice = $this->nullableString($row['Sale price'] ?? null);
        $regularPrice = $this->nullableString($row['Regular price'] ?? null);
        $raw = $salePrice ?? $regularPrice;

        if ($raw === null) {
            return $this->issue($productsPath, $row, $sourceId, 'Regular price', 'missing_price', 'warning', 'Product has neither sale price nor regular price; it was imported without a product_prices row.');
        }

        $normalized = str_replace([',', '$'], '', trim($raw));

        if (! is_numeric($normalized) || (float) $normalized < 0) {
            return $this->issue($productsPath, $row, $sourceId, $salePrice !== null ? 'Sale price' : 'Regular price', 'invalid_price', 'warning', 'Product price is not a non-negative numeric value; it was imported without a product_prices row.');
        }

        return null;
    }

    /** @param array<string, mixed> $row */
    private function stock(array $row): int
    {
        $stock = trim((string) ($row['Stock'] ?? ''));

        return ctype_digit($stock) ? (int) $stock : 0;
    }

    private function firstImage(mixed $value): ?string
    {
        $images = $this->nullableString($value);

        if ($images === null) {
            return null;
        }

        return trim(explode(',', $images)[0]) ?: null;
    }

    /** @param array<string, mixed> $slugDecision @param array<string, mixed> $typeDecision */
    private function migrationNotes(array $slugDecision, array $typeDecision, ?string $price): ?string
    {
        $notes = [
            ...$slugDecision['notes'],
            ...$typeDecision['notes'],
        ];

        if ($price === null) {
            $notes[] = 'Product has no valid public price row and cannot be added to cart until reviewed.';
        }

        return $notes === [] ? null : implode(' ', $notes);
    }

    /** @param array<string, mixed> $row @param array<string, mixed>|null $mapRow @param array<string, mixed> $slugDecision @param array<string, mixed> $typeDecision @return array<string, mixed> */
    private function migrationPayload(array $row, ?array $mapRow, array $slugDecision, array $typeDecision): array
    {
        return [
            'source' => [
                'wordpress_product_id' => $this->sourceId($row['ID'] ?? null),
                'woocommerce_type' => $this->nullableString($row['Type'] ?? null),
                'published' => $this->nullableString($row['Published'] ?? null),
                'visibility' => $this->nullableString($row['Visibility in catalog'] ?? null),
            ],
            'slug' => [
                'imported_slug' => $slugDecision['slug'],
                'candidate_slug' => $slugDecision['candidate_slug'],
                'source_status' => $slugDecision['source_status'],
                'temporary' => $slugDecision['temporary'],
                'source_of_slug' => $this->nullableString($mapRow['source_of_slug'] ?? null),
                'confidence' => $this->nullableString($mapRow['confidence'] ?? null),
                'notes' => $this->nullableString($mapRow['notes'] ?? null),
            ],
            'type' => [
                'inferred_type' => $typeDecision['type'],
                'parent' => $this->nullableString($row['Parent'] ?? null),
                'external_url' => $this->nullableString($row['External URL'] ?? null),
                'button_text' => $this->nullableString($row['Button text'] ?? null),
            ],
            'attributes' => [
                'attribute_1_name' => $this->nullableString($row['Attribute 1 name'] ?? null),
                'attribute_1_values' => $this->nullableString($row['Attribute 1 value(s)'] ?? null),
            ],
            'pricing' => [
                'sale_price' => $this->nullableString($row['Sale price'] ?? null),
                'regular_price' => $this->nullableString($row['Regular price'] ?? null),
            ],
        ];
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
        foreach (['ID', 'Name', 'wp_product_id', 'wp_product_name'] as $field) {
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
