<?php

declare(strict_types=1);

namespace App\Support\Migration;

use App\Models\MigrationFlag;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use SplFileObject;

class WordPressUserCustomerImporter
{
    private const IMPORTER = 'WpImportUsersCustomers';

    private const GUEST_MAP_HEADERS = [
        'source_row_number',
        'guest_key',
        'user_email',
        'billing_email',
        'billing_first_name',
        'billing_last_name',
        'billing_name',
        'billing_company',
        'billing_phone',
        'billing_address_1',
        'billing_address_2',
        'billing_postcode',
        'billing_city',
        'billing_state',
        'billing_country',
        'shipping_first_name',
        'shipping_last_name',
        'shipping_company',
        'shipping_phone',
        'shipping_address_1',
        'shipping_address_2',
        'shipping_postcode',
        'shipping_city',
        'shipping_state',
        'shipping_country',
        'orders',
        'total_spent',
        'aov',
        'wc_last_active',
        'source_note',
        'raw_payload_json',
    ];

    private const ROLE_MAP = [
        'administrator' => 'admin',
        'subscriber' => 'subscriber',
        'customer' => 'subscriber',
    ];

    /**
     * @return array{
     *     source_rows: int,
     *     registered_source_rows: int,
     *     guest_source_rows: int,
     *     registered_created: int,
     *     registered_updated: int,
     *     registered_skipped: int,
     *     guest_rows_preserved: int,
     *     invalid_email_rows: int,
     *     duplicate_email_rows: int,
     *     source_conflict_rows: int,
     *     unsupported_role_flags: int,
     *     flags_written: int,
     *     guest_map_path: string,
     *     flagged_issues: array<string, int>
     * }
     */
    public function import(string $usersPath, string $guestMapPath, bool $clearExistingFlags = false): array
    {
        $usersPath = $this->resolvePath($usersPath);
        $guestMapPath = $this->resolvePath($guestMapPath);
        $rows = $this->readCsv($usersPath);
        $registeredRows = [];
        $guestRows = [];

        foreach ($rows as $row) {
            if ($this->isGuestRow($row)) {
                $guestRows[] = $row;
            } else {
                $registeredRows[] = $row;
            }
        }

        $duplicateEmails = $this->duplicateRegisteredEmails($registeredRows);
        $duplicateSourceIds = $this->duplicateRegisteredSourceIds($registeredRows);
        $issues = [];
        $registeredCreated = 0;
        $registeredUpdated = 0;
        $registeredSkipped = 0;
        $invalidEmailRows = 0;
        $duplicateEmailRows = 0;
        $sourceConflictRows = 0;
        $unsupportedRoleFlags = 0;

        if ($clearExistingFlags) {
            MigrationFlag::query()
                ->where('importer', self::IMPORTER)
                ->where('resolved', false)
                ->delete();
        }

        DB::transaction(function () use ($registeredRows, $usersPath, $duplicateEmails, $duplicateSourceIds, &$issues, &$registeredCreated, &$registeredUpdated, &$registeredSkipped, &$invalidEmailRows, &$duplicateEmailRows, &$sourceConflictRows, &$unsupportedRoleFlags): void {
            foreach ($registeredRows as $row) {
                $sourceId = $this->sourceId($row['ID'] ?? null);
                $email = $this->normalizedEmail($row['user_email'] ?? '');

                if (! $this->isValidEmail($email)) {
                    $invalidEmailRows++;
                    $registeredSkipped++;
                    $issues[] = $this->issue($usersPath, 'wp_users', $row, $sourceId, 'user_email', 'invalid_registered_email', 'blocking', 'Registered WordPress user has a missing or invalid user_email and was not imported.');

                    continue;
                }

                if (($duplicateEmails[$email] ?? 0) > 1) {
                    $duplicateEmailRows++;
                    $registeredSkipped++;
                    $issues[] = $this->issue($usersPath, 'wp_users', $row, $sourceId, 'user_email', 'duplicate_registered_email', 'blocking', "Registered WordPress user email '{$email}' appears more than once and was not imported.");

                    continue;
                }

                if (($duplicateSourceIds[$sourceId] ?? 0) > 1) {
                    $sourceConflictRows++;
                    $registeredSkipped++;
                    $issues[] = $this->issue($usersPath, 'wp_users', $row, $sourceId, 'ID', 'duplicate_registered_source_id', 'blocking', "Registered WordPress user source ID '{$sourceId}' appears more than once and was not imported.");

                    continue;
                }

                $sourceUser = User::query()->where('source_id', $sourceId)->first();
                $emailUser = User::query()->where('email', $email)->first();
                $user = $sourceUser ?? $emailUser;

                if ($sourceUser !== null && $emailUser !== null && $sourceUser->id !== $emailUser->id) {
                    $sourceConflictRows++;
                    $registeredSkipped++;
                    $issues[] = $this->issue($usersPath, 'wp_users', $row, $sourceId, 'user_email', 'source_email_conflict', 'blocking', "WordPress source ID '{$sourceId}' and email '{$email}' already belong to different Laravel users.");

                    continue;
                }

                if ($user !== null && $user->source_id !== null && (int) $user->source_id !== $sourceId) {
                    $sourceConflictRows++;
                    $registeredSkipped++;
                    $issues[] = $this->issue($usersPath, 'wp_users', $row, $sourceId, 'source_id', 'existing_email_source_conflict', 'blocking', "Email '{$email}' already belongs to Laravel user ID {$user->id} with a different source_id.");

                    continue;
                }

                $attributes = $this->registeredAttributes($row, $email, $sourceId);

                if ($user === null) {
                    $user = User::create($attributes + ['password' => Str::password(40)]);
                    $registeredCreated++;
                } else {
                    $user->fill($attributes);
                    $user->save();
                    $registeredUpdated++;
                }

                foreach ($this->mappedRoles($row, $usersPath, $issues, $unsupportedRoleFlags) as $roleName) {
                    Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
                    $user->assignRole($roleName);
                }
            }
        });

        foreach ($guestRows as $row) {
            $email = $this->normalizedEmail($row['billing_email'] ?? $row['user_email'] ?? '');

            if (! $this->isValidEmail($email)) {
                $invalidEmailRows++;
                $issues[] = $this->issue($usersPath, 'wp_guest_customers', $row, 0, 'billing_email', 'invalid_guest_email', 'warning', 'Guest customer email is missing or invalid; row was preserved in the guest map for manual review.');
            }
        }

        $this->writeGuestMap($guestMapPath, $guestRows);
        $flagsWritten = $this->writeFlags($issues);
        $flaggedIssues = collect($issues)
            ->map(fn (array $issue): string => $this->reasonFromFlag((string) $issue['flag_reason']))
            ->countBy()
            ->all();

        return [
            'source_rows' => count($rows),
            'registered_source_rows' => count($registeredRows),
            'guest_source_rows' => count($guestRows),
            'registered_created' => $registeredCreated,
            'registered_updated' => $registeredUpdated,
            'registered_skipped' => $registeredSkipped,
            'guest_rows_preserved' => count($guestRows),
            'invalid_email_rows' => $invalidEmailRows,
            'duplicate_email_rows' => $duplicateEmailRows,
            'source_conflict_rows' => $sourceConflictRows,
            'unsupported_role_flags' => $unsupportedRoleFlags,
            'flags_written' => $flagsWritten,
            'guest_map_path' => $this->relativePath($guestMapPath),
            'flagged_issues' => $flaggedIssues,
        ];
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
    private function isGuestRow(array $row): bool
    {
        $sourceId = $this->sourceId($row['ID'] ?? null);
        $customerId = $this->sourceId($row['customer_id'] ?? null);

        return trim((string) ($row['is_guest_user'] ?? '')) === '1'
            || $sourceId === 0
            || $customerId === 0;
    }

    /** @param list<array<string, mixed>> $rows @return array<string, int> */
    private function duplicateRegisteredEmails(array $rows): array
    {
        $counts = [];

        foreach ($rows as $row) {
            $email = $this->normalizedEmail($row['user_email'] ?? '');

            if ($email !== '') {
                $counts[$email] = ($counts[$email] ?? 0) + 1;
            }
        }

        return array_filter($counts, fn (int $count): bool => $count > 1);
    }

    /** @param list<array<string, mixed>> $rows @return array<int, int> */
    private function duplicateRegisteredSourceIds(array $rows): array
    {
        $counts = [];

        foreach ($rows as $row) {
            $sourceId = $this->sourceId($row['ID'] ?? null);

            if ($sourceId !== 0) {
                $counts[$sourceId] = ($counts[$sourceId] ?? 0) + 1;
            }
        }

        return array_filter($counts, fn (int $count): bool => $count > 1);
    }

    /** @param array<string, mixed> $row @return array<string, mixed> */
    private function registeredAttributes(array $row, string $email, int $sourceId): array
    {
        return [
            'name' => $this->registeredName($row, $email),
            'email' => $email,
            'phone' => $this->nullableString($row['billing_phone'] ?? null),
            'job_title' => null,
            'company' => $this->nullableString($row['billing_company'] ?? null),
            'country' => $this->nullableString($row['billing_country'] ?? null),
            'is_active' => trim((string) ($row['user_status'] ?? '0')) === '0',
            'source_id' => $sourceId,
            'profile_payload' => [
                'wordpress' => [
                    'customer_id' => $this->nullableString($row['customer_id'] ?? null),
                    'user_login' => $this->nullableString($row['user_login'] ?? null),
                    'user_nicename' => $this->nullableString($row['user_nicename'] ?? null),
                    'user_registered' => $this->nullableString($row['user_registered'] ?? null),
                    'display_name' => $this->nullableString($row['display_name'] ?? null),
                    'roles' => $this->roles($row),
                    'user_pass_omitted' => true,
                ],
                'billing' => $this->addressPayload($row, 'billing'),
                'shipping' => $this->addressPayload($row, 'shipping'),
                'commerce' => [
                    'orders' => $this->nullableString($row['orders'] ?? null),
                    'total_spent' => $this->nullableString($row['total_spent'] ?? null),
                    'aov' => $this->nullableString($row['aov'] ?? null),
                    'wc_last_active' => $this->nullableString($row['wc_last_active'] ?? null),
                ],
                'migration' => [
                    'source_file' => 'database/import/wordpress/users-customer.csv',
                    'source_row_number' => (int) ($row['_source_row_number'] ?? 0),
                    'password_reset_required' => true,
                    'wordpress_password_reused' => false,
                ],
            ],
        ];
    }

    /** @param array<string, mixed> $row */
    private function registeredName(array $row, string $email): string
    {
        foreach (['display_name', 'nickname', 'user_login'] as $field) {
            $value = $this->nullableString($row[$field] ?? null);

            if ($value !== null) {
                return $value;
            }
        }

        $name = trim((string) ($row['first_name'] ?? '') . ' ' . (string) ($row['last_name'] ?? ''));

        if ($name !== '') {
            return $name;
        }

        $billingName = trim((string) ($row['billing_first_name'] ?? '') . ' ' . (string) ($row['billing_last_name'] ?? ''));

        if ($billingName !== '') {
            return $billingName;
        }

        return Str::before($email, '@') ?: $email;
    }

    /** @param array<string, mixed> $row @return list<string> */
    private function roles(array $row): array
    {
        return array_values(array_filter(array_map(
            fn (string $role): string => strtolower(trim($role)),
            explode(',', (string) ($row['roles'] ?? '')),
        )));
    }

    /** @param array<string, mixed> $row @param list<array<string, mixed>> $issues */
    private function mappedRoles(array $row, string $usersPath, array &$issues, int &$unsupportedRoleFlags): array
    {
        $mapped = [];
        $sourceId = $this->sourceId($row['ID'] ?? null);

        foreach ($this->roles($row) as $role) {
            if (array_key_exists($role, self::ROLE_MAP)) {
                $mapped[] = self::ROLE_MAP[$role];

                continue;
            }

            $unsupportedRoleFlags++;
            $issues[] = $this->issue($usersPath, 'wp_users', $row, $sourceId, 'roles', 'unsupported_wordpress_role', 'warning', "WordPress role '{$role}' has no Laravel role mapping and was not assigned.");
        }

        if ($mapped === []) {
            $mapped[] = 'subscriber';
        }

        return array_values(array_unique($mapped));
    }

    /** @param array<string, mixed> $row @return array<string, string|null> */
    private function addressPayload(array $row, string $prefix): array
    {
        return [
            'first_name' => $this->nullableString($row[$prefix . '_first_name'] ?? null),
            'last_name' => $this->nullableString($row[$prefix . '_last_name'] ?? null),
            'company' => $this->nullableString($row[$prefix . '_company'] ?? null),
            'email' => $this->nullableString($row[$prefix . '_email'] ?? null),
            'phone' => $this->nullableString($row[$prefix . '_phone'] ?? null),
            'address_1' => $this->nullableString($row[$prefix . '_address_1'] ?? null),
            'address_2' => $this->nullableString($row[$prefix . '_address_2'] ?? null),
            'postcode' => $this->nullableString($row[$prefix . '_postcode'] ?? null),
            'city' => $this->nullableString($row[$prefix . '_city'] ?? null),
            'state' => $this->nullableString($row[$prefix . '_state'] ?? null),
            'country' => $this->nullableString($row[$prefix . '_country'] ?? null),
        ];
    }

    /** @param list<array<string, mixed>> $guestRows */
    private function writeGuestMap(string $guestMapPath, array $guestRows): void
    {
        $directory = dirname($guestMapPath);

        if (! is_dir($directory)) {
            mkdir($directory, 0777, true);
        }

        $handle = fopen($guestMapPath, 'w');

        if ($handle === false) {
            throw new \RuntimeException("Unable to write guest customer map at {$guestMapPath}");
        }

        fputcsv($handle, self::GUEST_MAP_HEADERS);

        foreach ($guestRows as $row) {
            $billingFirst = (string) ($row['billing_first_name'] ?? '');
            $billingLast = (string) ($row['billing_last_name'] ?? '');
            $billingName = trim($billingFirst . ' ' . $billingLast);
            $guestKey = $this->guestKey($row);
            $rawPayload = $row;
            unset($rawPayload['_source_row_number']);

            fputcsv($handle, [
                (string) ($row['_source_row_number'] ?? ''),
                $guestKey,
                $this->normalizedEmail($row['user_email'] ?? ''),
                $this->normalizedEmail($row['billing_email'] ?? ''),
                (string) ($row['billing_first_name'] ?? ''),
                (string) ($row['billing_last_name'] ?? ''),
                $billingName,
                (string) ($row['billing_company'] ?? ''),
                (string) ($row['billing_phone'] ?? ''),
                (string) ($row['billing_address_1'] ?? ''),
                (string) ($row['billing_address_2'] ?? ''),
                (string) ($row['billing_postcode'] ?? ''),
                (string) ($row['billing_city'] ?? ''),
                (string) ($row['billing_state'] ?? ''),
                (string) ($row['billing_country'] ?? ''),
                (string) ($row['shipping_first_name'] ?? ''),
                (string) ($row['shipping_last_name'] ?? ''),
                (string) ($row['shipping_company'] ?? ''),
                (string) ($row['shipping_phone'] ?? ''),
                (string) ($row['shipping_address_1'] ?? ''),
                (string) ($row['shipping_address_2'] ?? ''),
                (string) ($row['shipping_postcode'] ?? ''),
                (string) ($row['shipping_city'] ?? ''),
                (string) ($row['shipping_state'] ?? ''),
                (string) ($row['shipping_country'] ?? ''),
                (string) ($row['orders'] ?? ''),
                (string) ($row['total_spent'] ?? ''),
                (string) ($row['aov'] ?? ''),
                (string) ($row['wc_last_active'] ?? ''),
                'guest customer preserved without Laravel login account',
                json_encode($rawPayload, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?: '{}',
            ]);
        }

        fclose($handle);
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

    /** @param array<string, mixed> $row @return array<string, mixed> */
    private function issue(string $path, string $sourceTable, array $row, int $sourceId, string $fieldName, string $reason, string $severity, string $message): array
    {
        return [
            'source_table' => $sourceTable,
            'source_file' => $this->relativePath($path),
            'source_id' => $sourceId,
            'source_row_number' => (int) ($row['_source_row_number'] ?? 1),
            'source_key' => $this->sourceKey($row),
            'severity' => $severity,
            'field_name' => $fieldName,
            'original_value' => isset($row[$fieldName]) ? (string) $row[$fieldName] : null,
            'flag_reason' => $reason . ': ' . $message,
            'raw_payload' => $row,
        ];
    }

    /** @param array<string, mixed> $row */
    private function sourceKey(array $row): string
    {
        foreach (['ID', 'customer_id', 'user_email', 'billing_email', 'user_login'] as $field) {
            $value = trim((string) ($row[$field] ?? ''));

            if ($value !== '') {
                return $value;
            }
        }

        return 'row-' . (string) ($row['_source_row_number'] ?? 'unknown');
    }

    /** @param array<string, mixed> $row */
    private function guestKey(array $row): string
    {
        $parts = [
            $this->normalizedEmail($row['billing_email'] ?? $row['user_email'] ?? ''),
            strtolower(trim((string) ($row['billing_first_name'] ?? '') . ' ' . (string) ($row['billing_last_name'] ?? ''))),
            strtolower(trim((string) ($row['billing_phone'] ?? ''))),
            strtolower(trim((string) ($row['billing_address_1'] ?? ''))),
            (string) ($row['_source_row_number'] ?? ''),
        ];

        return 'guest-' . substr(sha1(implode('|', $parts)), 0, 16);
    }

    private function sourceId(mixed $value): int
    {
        $value = trim((string) $value);

        return ctype_digit($value) ? (int) $value : 0;
    }

    private function normalizedEmail(mixed $value): string
    {
        return strtolower(trim((string) $value));
    }

    private function isValidEmail(string $email): bool
    {
        return $email !== '' && filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    private function nullableString(mixed $value): ?string
    {
        $value = trim((string) $value);

        return $value === '' ? null : $value;
    }

    private function reasonFromFlag(string $flagReason): string
    {
        return Str::before($flagReason, ':');
    }

    private function resolvePath(string $path): string
    {
        if (str_starts_with($path, '/') || preg_match('#^[A-Za-z]:#', $path) === 1) {
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
