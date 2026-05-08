<?php

$projectRoot = dirname(__DIR__);
$outputPath = $projectRoot . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'docs' . DIRECTORY_SEPARATOR . 'wp-product-slug-map.csv';
$productsPath = $projectRoot . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'import' . DIRECTORY_SEPARATOR . 'wordpress' . DIRECTORY_SEPARATOR . 'products.csv';
$mappingPath = $projectRoot . DIRECTORY_SEPARATOR . 'database' . DIRECTORY_SEPARATOR . 'docs' . DIRECTORY_SEPARATOR . 'wp-commerce-mapping' . DIRECTORY_SEPARATOR . 'products.csv';
$sqlProductsPath = dirname($projectRoot) . DIRECTORY_SEPARATOR . 'Sitemap Analysis' . DIRECTORY_SEPARATOR . 'sql_products.csv';

$confirmedSlugs = [
    '4233' => 'corporate-membership',
    '4234' => 'professional-membership',
    '37207' => 'professional-membership-renewal',
];

function read_csv_assoc(string $path): array
{
    if (! is_file($path)) {
        return [];
    }

    $handle = fopen($path, 'rb');
    if ($handle === false) {
        throw new RuntimeException("Unable to read {$path}");
    }

    $header = fgetcsv($handle);
    if ($header === false) {
        fclose($handle);
        return [];
    }

    if (isset($header[0])) {
        $header[0] = str_replace("\xEF\xBB\xBF", '', $header[0]);
    }

    $header = array_map(
        static fn ($column): string => trim((string) $column, "\" \t\n\r\0\x0B"),
        $header,
    );

    $rows = [];

    while (($row = fgetcsv($handle)) !== false) {
        if ($row === [null] || $row === false) {
            continue;
        }

        $assoc = [];
        foreach ($header as $index => $column) {
            $assoc[$column] = $row[$index] ?? '';
        }
        $rows[] = $assoc;
    }

    fclose($handle);

    return $rows;
}

function write_csv_row($handle, array $row): void
{
    if (fputcsv($handle, $row) === false) {
        throw new RuntimeException('Unable to write CSV row.');
    }
}

$mappingRows = read_csv_assoc($mappingPath);
$productMappings = [];
foreach ($mappingRows as $row) {
    $id = trim((string) ($row['wp_post_id'] ?? ''));
    if ($id === '') {
        continue;
    }

    $productMappings[$id] = [
        'wp_slug' => trim((string) ($row['wp_slug'] ?? '')),
        'laravel_slug' => trim((string) ($row['laravel_slug'] ?? '')),
        'status' => trim((string) ($row['status'] ?? '')),
    ];
}

$sqlRows = read_csv_assoc($sqlProductsPath);
$sqlSlugs = [];
foreach ($sqlRows as $row) {
    $id = trim((string) ($row['ID'] ?? ''));
    $slug = trim((string) ($row['slug'] ?? ''));
    if ($id !== '' && $slug !== '') {
        $sqlSlugs[$id] = $slug;
    }
}

$productRows = read_csv_assoc($productsPath);
if (count($productRows) !== 398) {
    throw new RuntimeException('Expected 398 product rows, found ' . count($productRows) . '.');
}

$output = fopen($outputPath, 'wb');
if ($output === false) {
    throw new RuntimeException("Unable to write {$outputPath}");
}

write_csv_row($output, [
    'wp_product_id',
    'wp_product_name',
    'proposed_slug',
    'source_of_slug',
    'confidence',
    'status',
    'notes',
]);

$counts = [
    'total' => 0,
    'confirmed' => 0,
    'needs_review' => 0,
    'candidate_needs_review' => 0,
    'blank_needs_review' => 0,
];
$blankRows = [];

foreach ($productRows as $productRow) {
    $id = trim((string) ($productRow['ID'] ?? ''));
    $name = trim((string) ($productRow['Name'] ?? ''));

    $proposedSlug = '';
    $sourceOfSlug = '';
    $confidence = 'low';
    $status = 'needs_review';
    $notes = 'No existing product slug source found for this WooCommerce export row; requires manual SEO review before import.';

    if (isset($confirmedSlugs[$id])) {
        $proposedSlug = $confirmedSlugs[$id];
        $sourceOfSlug = 'database/seeders/CommerceConfirmedProductsSeeder.php:source_id';
        $confidence = 'high';
        $status = 'confirmed';
        $notes = 'Confirmed implemented Laravel product slug; source_id preserved in CommerceConfirmedProductsSeeder.';
    } elseif (isset($productMappings[$id]) && $productMappings[$id]['status'] === 'matched' && $productMappings[$id]['laravel_slug'] !== '') {
        $proposedSlug = $productMappings[$id]['laravel_slug'];
        $sourceOfSlug = 'database/docs/wp-commerce-mapping/products.csv:laravel_slug';
        $confidence = 'high';
        $status = 'confirmed';
        $notes = 'Confirmed matched Laravel product slug from commerce mapping; source_id must be preserved before import.';
    } elseif (isset($productMappings[$id]) && $productMappings[$id]['wp_slug'] !== '') {
        $proposedSlug = $productMappings[$id]['wp_slug'];
        $sourceOfSlug = 'database/docs/wp-commerce-mapping/products.csv:wp_slug';
        $confidence = 'medium';
        $status = 'needs_review';
        $notes = 'Existing WordPress product slug candidate only; not confirmed as Laravel canonical slug.';
    } elseif (isset($sqlSlugs[$id])) {
        $proposedSlug = $sqlSlugs[$id];
        $sourceOfSlug = 'Sitemap Analysis/sql_products.csv:slug';
        $confidence = 'medium';
        $status = 'needs_review';
        $notes = 'SQL-derived WordPress product slug candidate only; not confirmed as Laravel canonical slug.';
    }

    write_csv_row($output, [$id, $name, $proposedSlug, $sourceOfSlug, $confidence, $status, $notes]);

    $counts['total']++;
    if ($status === 'confirmed') {
        $counts['confirmed']++;
    } else {
        $counts['needs_review']++;
        if ($proposedSlug === '') {
            $counts['blank_needs_review']++;
            if (count($blankRows) < 10) {
                $blankRows[] = [$id, $name];
            }
        } else {
            $counts['candidate_needs_review']++;
        }
    }
}

fclose($output);

foreach ($counts as $label => $count) {
    echo $label . ': ' . $count . PHP_EOL;
}

if ($blankRows !== []) {
    echo 'top_blank_needs_review:' . PHP_EOL;
    foreach ($blankRows as [$id, $name]) {
        echo '- ' . $id . ': ' . $name . PHP_EOL;
    }
}
