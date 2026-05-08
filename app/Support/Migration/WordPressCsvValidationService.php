<?php

declare(strict_types=1);

namespace App\Support\Migration;

use App\Models\MigrationFlag;
use Illuminate\Support\Facades\DB;
use SplFileObject;

class WordPressCsvValidationService
{
    public const DEFAULT_PATH = 'database/import/wordpress';

    public const FILES = [
        'users' => 'users-customer.csv',
        'products' => 'products.csv',
        'orders' => 'orders.csv',
    ];

    public const EXPECTED_ROWS = [
        'users' => 104,
        'products' => 398,
        'orders' => 129,
    ];

    public const EXPECTED_HEADERS = [
        'users' => [
            'ID', 'customer_id', 'user_login', 'user_pass', 'user_nicename', 'user_email', 'user_url',
            'user_registered', 'display_name', 'first_name', 'last_name', 'user_status', 'roles', 'nickname',
            'description', 'rich_editing', 'syntax_highlighting', 'admin_color', 'use_ssl', 'show_admin_bar_front',
            'locale', 'wp9f_user_level', 'dismissed_wp_pointers', 'show_welcome_panel', 'session_tokens',
            'last_update', 'is_guest_user', 'orders', 'billing_first_name', 'billing_last_name', 'billing_company',
            'billing_email', 'billing_phone', 'billing_address_1', 'billing_address_2', 'billing_postcode',
            'billing_city', 'billing_state', 'billing_country', 'shipping_first_name', 'shipping_last_name',
            'shipping_company', 'shipping_phone', 'shipping_address_1', 'shipping_address_2', 'shipping_postcode',
            'shipping_city', 'shipping_state', 'shipping_country', 'wc_last_active', 'total_spent', 'aov',
        ],
        'products' => [
            'ID', 'Type', 'SKU', 'GTIN, UPC, EAN, or ISBN', 'Name', 'Published', 'Is featured?',
            'Visibility in catalog', 'Short description', 'Description', 'Date sale price starts',
            'Date sale price ends', 'Tax status', 'Tax class', 'In stock?', 'Stock', 'Low stock amount',
            'Backorders allowed?', 'Sold individually?', 'Weight (kg)', 'Length (cm)', 'Width (cm)', 'Height (cm)',
            'Allow customer reviews?', 'Purchase note', 'Sale price', 'Regular price', 'Categories', 'Tags',
            'Shipping class', 'Images', 'Download limit', 'Download expiry days', 'Parent', 'Grouped products',
            'Upsells', 'Cross-sells', 'External URL', 'Button text', 'Position', 'Brands', 'Attribute 1 name',
            'Attribute 1 value(s)', 'Attribute 1 visible', 'Attribute 1 global',
        ],
        'orders' => [
            'order_id', 'order_number', 'order_date', 'paid_date', 'status', 'shipping_total', 'shipping_tax_total',
            'fee_total', 'fee_tax_total', 'tax_total', 'cart_discount', 'order_discount', 'discount_total',
            'order_total', 'order_subtotal', 'order_key', 'order_currency', 'payment_method', 'payment_method_title',
            'transaction_id', 'customer_ip_address', 'customer_user_agent', 'shipping_method', 'customer_id',
            'customer_user', 'customer_email', 'billing_first_name', 'billing_last_name', 'billing_company',
            'billing_email', 'billing_phone', 'billing_address_1', 'billing_address_2', 'billing_postcode',
            'billing_city', 'billing_state', 'billing_country', 'shipping_first_name', 'shipping_last_name',
            'shipping_company', 'shipping_phone', 'shipping_address_1', 'shipping_address_2', 'shipping_postcode',
            'shipping_city', 'shipping_state', 'shipping_country', 'customer_note', 'wt_import_key', 'tax_items',
            'shipping_items', 'fee_items', 'coupon_items', 'refund_items', 'order_notes', 'download_permissions',
            'meta:_wc_order_attribution_device_type', 'meta:_wc_order_attribution_referrer',
            'meta:_wc_order_attribution_session_count', 'meta:_wc_order_attribution_session_entry',
            'meta:_wc_order_attribution_session_pages', 'meta:_wc_order_attribution_session_start_time',
            'meta:_wc_order_attribution_source_type', 'meta:_wc_order_attribution_user_agent',
            'meta:_wc_order_attribution_utm_source', 'meta:_ppcp_paypal_fees', 'meta:_stripe_currency',
            'meta:_stripe_fee', 'meta:_stripe_net', 'item_product_id', 'item_name', 'item_sku', 'item_quantity',
            'item_subtotal', 'item_subtotal_tax', 'item_total', 'item_total_tax', 'item_refunded',
            'item_refunded_qty', 'item_meta',
        ],
    ];

    /** @return array{path: string, exists: bool, rows: int, columns: int, headers: list<string>, missing_headers: list<string>, extra_headers: list<string>} */
    public function inspect(string $dataset, ?string $file = null): array
    {
        $path = $this->resolvePath($file ?? self::DEFAULT_PATH . '/' . self::FILES[$dataset]);

        if (! is_file($path)) {
            return [
                'path' => $path,
                'exists' => false,
                'rows' => 0,
                'columns' => 0,
                'headers' => [],
                'missing_headers' => self::EXPECTED_HEADERS[$dataset],
                'extra_headers' => [],
            ];
        }

        $csv = $this->readCsv($path);
        $missingHeaders = array_values(array_diff(self::EXPECTED_HEADERS[$dataset], $csv['headers']));
        $extraHeaders = array_values(array_diff($csv['headers'], self::EXPECTED_HEADERS[$dataset]));

        return [
            'path' => $path,
            'exists' => true,
            'rows' => count($csv['rows']),
            'columns' => count($csv['headers']),
            'headers' => $csv['headers'],
            'missing_headers' => $missingHeaders,
            'extra_headers' => $extraHeaders,
        ];
    }

    /** @return array{summary: array<string, int>, issues: list<array<string, mixed>>} */
    public function validateUsers(?string $file = null): array
    {
        $path = $this->resolvePath($file ?? self::DEFAULT_PATH . '/' . self::FILES['users']);
        $csv = $this->readCsv($path);
        $issues = $this->baseIssues('users', $path, $csv);
        $emails = [];
        $guestRows = 0;

        foreach ($csv['rows'] as $row) {
            $email = $this->normalizeEmail($row['user_email'] ?? '');
            $sourceId = $this->sourceId($row['ID'] ?? null);
            $isGuest = $this->isBlank($row['ID'] ?? null)
                || $this->isBlank($row['customer_id'] ?? null)
                || trim((string) ($row['is_guest_user'] ?? '')) === '1';

            if ($email !== '') {
                $emails[$email][] = $row;
            } else {
                $issues[] = $this->issue('WpValidateUsers', 'wp_users', $path, $row, 'user_email', 'missing_user_email', 'blocking', 'User row has no user_email.');
            }

            if ($isGuest) {
                $guestRows++;
                $issues[] = $this->issue('WpValidateUsers', 'wp_users', $path, $row, 'ID', 'guest_customer_without_wp_user_id', 'warning', 'Customer export row has no stable WordPress user ID and should not create a Laravel user automatically.', $sourceId);
            }
        }

        foreach ($emails as $email => $rows) {
            if (count($rows) <= 1) {
                continue;
            }

            foreach ($rows as $row) {
                $issues[] = $this->issue('WpValidateUsers', 'wp_users', $path, $row, 'user_email', 'duplicate_user_email', 'blocking', "Duplicate user_email '{$email}' found in users export.");
            }
        }

        return [
            'summary' => [
                'rows' => count($csv['rows']),
                'expected_rows' => self::EXPECTED_ROWS['users'],
                'guest_rows' => $guestRows,
                'duplicate_emails' => collect($emails)->filter(fn (array $rows): bool => count($rows) > 1)->count(),
            ],
            'issues' => $issues,
        ];
    }

    /** @return array{summary: array<string, int>, issues: list<array<string, mixed>>} */
    public function validateProducts(?string $file = null): array
    {
        $path = $this->resolvePath($file ?? self::DEFAULT_PATH . '/' . self::FILES['products']);
        $csv = $this->readCsv($path);
        $issues = $this->baseIssues('products', $path, $csv);
        $ids = [];
        $blankPrices = 0;
        $missingSlugs = 0;

        foreach ($csv['rows'] as $row) {
            $id = trim((string) ($row['ID'] ?? ''));

            if ($id !== '') {
                $ids[$id][] = $row;
            } else {
                $issues[] = $this->issue('WpValidateProducts', 'wp_products', $path, $row, 'ID', 'missing_product_source_id', 'blocking', 'Product row has no WordPress product ID.');
            }

            if (! array_key_exists('Slug', $row) || $this->isBlank($row['Slug'] ?? null)) {
                $missingSlugs++;
                $issues[] = $this->issue('WpValidateProducts', 'wp_products', $path, $row, 'Slug', 'missing_product_slug', 'blocking', 'Product export has no approved slug for Laravel product mapping.');
            }

            if ($this->isBlank($row['Regular price'] ?? null) && $this->isBlank($row['Sale price'] ?? null)) {
                $blankPrices++;
                $issues[] = $this->issue('WpValidateProducts', 'wp_products', $path, $row, 'Regular price', 'missing_product_price', 'blocking', 'Product row has neither regular price nor sale price.');
            }

            foreach (['Regular price', 'Sale price'] as $field) {
                $value = trim((string) ($row[$field] ?? ''));

                if ($value !== '' && ! is_numeric($value)) {
                    $issues[] = $this->issue('WpValidateProducts', 'wp_products', $path, $row, $field, 'non_numeric_product_price', 'blocking', "Product {$field} is not numeric.");
                }
            }
        }

        foreach ($ids as $id => $rows) {
            if (count($rows) <= 1) {
                continue;
            }

            foreach ($rows as $row) {
                $issues[] = $this->issue('WpValidateProducts', 'wp_products', $path, $row, 'ID', 'duplicate_product_source_id', 'blocking', "Duplicate product source ID '{$id}' found in products export.");
            }
        }

        return [
            'summary' => [
                'rows' => count($csv['rows']),
                'expected_rows' => self::EXPECTED_ROWS['products'],
                'missing_product_slugs' => $missingSlugs,
                'blank_prices' => $blankPrices,
                'duplicate_product_ids' => collect($ids)->filter(fn (array $rows): bool => count($rows) > 1)->count(),
            ],
            'issues' => $issues,
        ];
    }

    /** @return array{summary: array<string, int>, issues: list<array<string, mixed>>} */
    public function validateOrders(?string $ordersFile = null, ?string $usersFile = null, ?string $productsFile = null): array
    {
        $ordersPath = $this->resolvePath($ordersFile ?? self::DEFAULT_PATH . '/' . self::FILES['orders']);
        $usersPath = $this->resolvePath($usersFile ?? self::DEFAULT_PATH . '/' . self::FILES['users']);
        $productsPath = $this->resolvePath($productsFile ?? self::DEFAULT_PATH . '/' . self::FILES['products']);
        $orders = $this->readCsv($ordersPath);
        $users = $this->readCsv($usersPath);
        $products = $this->readCsv($productsPath);
        $issues = $this->baseIssues('orders', $ordersPath, $orders);
        $customerIds = collect($users['rows'])
            ->map(fn (array $row): string => trim((string) ($row['customer_id'] ?? '')))
            ->filter(fn (string $value): bool => $value !== '')
            ->flip();
        $productIds = collect($products['rows'])
            ->map(fn (array $row): string => trim((string) ($row['ID'] ?? '')))
            ->filter(fn (string $value): bool => $value !== '')
            ->flip();
        $unsupportedPayments = 0;
        $guestOrders = 0;
        $missingCustomerRefs = 0;
        $missingProductRefs = 0;
        $blankProductRefs = 0;

        foreach ($orders['rows'] as $row) {
            $paymentMethod = strtolower(trim((string) ($row['payment_method'] ?? '')));
            $customerId = trim((string) ($row['customer_id'] ?? ''));
            $itemProductId = trim((string) ($row['item_product_id'] ?? ''));

            if (! in_array($paymentMethod, ['stripe', 'paypal', 'ppcp-gateway'], true)) {
                $unsupportedPayments++;
                $issues[] = $this->issue('WpValidateOrders', 'wp_orders', $ordersPath, $row, 'payment_method', 'unsupported_payment_method', 'blocking', "Payment method '{$paymentMethod}' is not supported for migration.");
            }

            if ($customerId === '0' || $customerId === '') {
                $guestOrders++;
                $issues[] = $this->issue('WpValidateOrders', 'wp_orders', $ordersPath, $row, 'customer_id', 'guest_order_without_wp_user', 'warning', 'Order row belongs to a guest checkout and should remain detached from users unless later resolved.');
            } elseif (! $customerIds->has($customerId)) {
                $missingCustomerRefs++;
                $issues[] = $this->issue('WpValidateOrders', 'wp_orders', $ordersPath, $row, 'customer_id', 'missing_order_customer_reference', 'blocking', "Order customer_id '{$customerId}' is not present in users export.");
            }

            if ($itemProductId === '') {
                $blankProductRefs++;
                $issues[] = $this->issue('WpValidateOrders', 'wp_order_items', $ordersPath, $row, 'item_product_id', 'missing_order_item_product_id', 'blocking', 'Order line has no item_product_id and cannot be attached to a product.');
            } elseif (! $productIds->has($itemProductId)) {
                $missingProductRefs++;
                $issues[] = $this->issue('WpValidateOrders', 'wp_order_items', $ordersPath, $row, 'item_product_id', 'missing_order_item_product_reference', 'blocking', "Order line item_product_id '{$itemProductId}' is not present in products export.");
            }
        }

        return [
            'summary' => [
                'rows' => count($orders['rows']),
                'expected_rows' => self::EXPECTED_ROWS['orders'],
                'unique_orders' => collect($orders['rows'])->pluck('order_id')->unique()->count(),
                'guest_order_rows' => $guestOrders,
                'unsupported_payment_methods' => $unsupportedPayments,
                'missing_customer_references' => $missingCustomerRefs,
                'blank_product_references' => $blankProductRefs,
                'missing_product_references' => $missingProductRefs,
            ],
            'issues' => $issues,
        ];
    }

    /** @param list<array<string, mixed>> $issues */
    public function writeFlags(array $issues, bool $clearExisting = false, ?string $importer = null): int
    {
        if ($clearExisting && $importer !== null) {
            MigrationFlag::query()
                ->where('importer', $importer)
                ->where('resolved', false)
                ->delete();
        }

        $written = 0;

        DB::transaction(function () use ($issues, &$written): void {
            foreach ($issues as $issue) {
                MigrationFlag::updateOrCreate(
                    [
                        'importer' => $issue['importer'],
                        'source_file' => $issue['source_file'],
                        'source_row_number' => $issue['source_row_number'],
                        'source_key' => $issue['source_key'],
                        'field_name' => $issue['field_name'],
                        'flag_reason' => $issue['flag_reason'],
                    ],
                    [
                        'source_table' => $issue['source_table'],
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

    /** @return array{headers: list<string>, rows: list<array<string, mixed>>} */
    private function readCsv(string $path): array
    {
        if (! is_file($path)) {
            return ['headers' => [], 'rows' => []];
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

        return ['headers' => $headers, 'rows' => $rows];
    }

    /** @param array{headers: list<string>, rows: list<array<string, mixed>>} $csv @return list<array<string, mixed>> */
    private function baseIssues(string $dataset, string $path, array $csv): array
    {
        $issues = [];
        $importer = 'WpValidate' . ucfirst($dataset);

        foreach (array_values(array_diff(self::EXPECTED_HEADERS[$dataset], $csv['headers'])) as $header) {
            $issues[] = $this->issue($importer, 'csv_headers', $path, ['_source_row_number' => 1, 'dataset' => $dataset], $header, 'missing_expected_header', 'blocking', "Expected header '{$header}' is missing from {$dataset} export.");
        }

        if (count($csv['rows']) !== self::EXPECTED_ROWS[$dataset]) {
            $issues[] = $this->issue($importer, 'csv_file', $path, ['_source_row_number' => 1, 'dataset' => $dataset, 'actual_rows' => count($csv['rows'])], 'row_count', 'unexpected_row_count', 'warning', 'Expected ' . self::EXPECTED_ROWS[$dataset] . " {$dataset} rows; found " . count($csv['rows']) . '.');
        }

        return $issues;
    }

    /** @param array<string, mixed> $row @return array<string, mixed> */
    private function issue(string $importer, string $sourceTable, string $path, array $row, string $fieldName, string $reason, string $severity, string $message, ?int $sourceId = null): array
    {
        $sourceId ??= $this->sourceId($row['ID'] ?? $row['order_id'] ?? null);
        $sourceKey = $this->sourceKey($row);

        return [
            'importer' => $importer,
            'source_table' => $sourceTable,
            'source_file' => $this->relativePath($path),
            'source_id' => $sourceId,
            'source_row_number' => (int) ($row['_source_row_number'] ?? 1),
            'source_key' => $sourceKey,
            'severity' => $severity,
            'field_name' => $fieldName,
            'original_value' => isset($row[$fieldName]) ? (string) $row[$fieldName] : null,
            'flag_reason' => $reason . ': ' . $message,
            'raw_payload' => $row,
        ];
    }

    private function sourceId(mixed $value): int
    {
        $value = trim((string) $value);

        return ctype_digit($value) ? (int) $value : 0;
    }

    /** @param array<string, mixed> $row */
    private function sourceKey(array $row): string
    {
        foreach (['ID', 'order_id', 'user_email', 'billing_email', 'Name', 'item_name'] as $field) {
            $value = trim((string) ($row[$field] ?? ''));

            if ($value !== '') {
                return $value;
            }
        }

        return 'row-' . (string) ($row['_source_row_number'] ?? 'unknown');
    }

    private function normalizeEmail(mixed $value): string
    {
        return strtolower(trim((string) $value));
    }

    private function isBlank(mixed $value): bool
    {
        return trim((string) $value) === '';
    }

    private function resolvePath(string $path): string
    {
        if ($this->isAbsolutePath($path)) {
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

    private function isAbsolutePath(string $path): bool
    {
        return str_starts_with($path, '/') || preg_match('#^[A-Za-z]:[\\\\/]#', $path) === 1;
    }
}
