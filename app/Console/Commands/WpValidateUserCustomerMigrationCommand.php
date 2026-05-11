<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\MigrationFlag;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use SplFileObject;

class WpValidateUserCustomerMigrationCommand extends Command
{
    protected $signature = 'wp:validate-user-customer-migration
                            {--file=database/import/wordpress/users-customer.csv : WordPress users/customers CSV export}
                            {--guest-map=database/docs/wp-guest-customers-map.csv : Reviewable guest customer preservation map}';

    protected $description = 'Validate registered WordPress user import and guest customer preservation results';

    public function handle(): int
    {
        $usersPath = $this->resolvePath((string) $this->option('file'));
        $guestMapPath = $this->resolvePath((string) $this->option('guest-map'));
        $rows = $this->readCsv($usersPath);
        $guestMapRows = $this->readCsv($guestMapPath);
        $registeredRows = array_values(array_filter($rows, fn (array $row): bool => ! $this->isGuestRow($row)));
        $guestRows = array_values(array_filter($rows, fn (array $row): bool => $this->isGuestRow($row)));
        $registeredSourceIds = array_values(array_filter(array_map(
            fn (array $row): int => $this->sourceId($row['ID'] ?? null),
            $registeredRows,
        )));
        $registeredEmails = array_values(array_filter(array_map(
            fn (array $row): string => strtolower(trim((string) ($row['user_email'] ?? ''))),
            $registeredRows,
        )));
        $duplicateSourceIds = User::query()
            ->select('source_id', DB::raw('count(*) as aggregate'))
            ->whereNotNull('source_id')
            ->groupBy('source_id')
            ->having('aggregate', '>', 1)
            ->count();
        $importedRegisteredUsers = User::query()
            ->whereIn('source_id', $registeredSourceIds)
            ->count();
        $registeredEmailUsers = User::query()
            ->whereIn('email', $registeredEmails)
            ->count();
        $guestMapDuplicateKeys = collect($guestMapRows)
            ->pluck('guest_key')
            ->filter()
            ->countBy()
            ->filter(fn (int $count): bool => $count > 1)
            ->count();
        $guestMapUsersCreated = User::query()
            ->whereIn('email', collect($guestMapRows)->pluck('billing_email')->filter()->all())
            ->whereNull('source_id')
            ->count();
        $flags = MigrationFlag::query()
            ->where('importer', 'WpImportUsersCustomers')
            ->where('resolved', false)
            ->get();

        $summary = [
            'source_rows' => count($rows),
            'registered_source_rows' => count($registeredRows),
            'guest_source_rows' => count($guestRows),
            'registered_users_with_source_id' => $importedRegisteredUsers,
            'registered_email_matches' => $registeredEmailUsers,
            'guest_map_rows' => count($guestMapRows),
            'guest_rows_missing_from_map' => max(0, count($guestRows) - count($guestMapRows)),
            'duplicate_laravel_source_ids' => $duplicateSourceIds,
            'duplicate_guest_keys' => $guestMapDuplicateKeys,
            'possible_guest_login_accounts_without_source_id' => $guestMapUsersCreated,
            'unresolved_user_customer_flags' => $flags->count(),
            'blocking_flags' => $flags->where('severity', 'blocking')->count(),
            'warning_flags' => $flags->where('severity', 'warning')->count(),
        ];

        foreach ($summary as $label => $value) {
            $this->line("{$label}: {$value}");
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
    private function isGuestRow(array $row): bool
    {
        $sourceId = $this->sourceId($row['ID'] ?? null);
        $customerId = $this->sourceId($row['customer_id'] ?? null);

        return trim((string) ($row['is_guest_user'] ?? '')) === '1'
            || $sourceId === 0
            || $customerId === 0;
    }

    private function sourceId(mixed $value): int
    {
        $value = trim((string) $value);

        return ctype_digit($value) ? (int) $value : 0;
    }

    private function resolvePath(string $path): string
    {
        if (str_starts_with($path, '/') || preg_match('#^[A-Za-z]:[\\/]#', $path) === 1) {
            return $path;
        }

        return base_path($path);
    }
}
