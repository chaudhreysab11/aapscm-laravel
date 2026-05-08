<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Support\Migration\WordPressCsvValidationService;
use Illuminate\Console\Command;

class WpValidateUsersCommand extends Command
{
    protected $signature = 'wp:validate-users
                            {--file=database/import/wordpress/users-customer.csv : WordPress users/customers CSV export}
                            {--write-flags : Persist validation issues to migration_flags}
                            {--clear-existing : Clear unresolved flags for this importer before writing}
                            {--fail-on-blocking : Return a failure exit code when blocking issues are found}';

    protected $description = 'Validate WordPress users/customers CSV without importing users';

    public function handle(WordPressCsvValidationService $validator): int
    {
        $result = $validator->validateUsers((string) $this->option('file'));

        return $this->report($validator, $result, 'WpValidateUsers');
    }

    /** @param array{summary: array<string, int>, issues: list<array<string, mixed>>} $result */
    private function report(WordPressCsvValidationService $validator, array $result, string $importer): int
    {
        foreach ($result['summary'] as $label => $value) {
            $this->line("{$label}: {$value}");
        }

        $this->newLine();
        $this->issueSummary($result['issues']);

        if ((bool) $this->option('write-flags')) {
            $written = $validator->writeFlags($result['issues'], (bool) $this->option('clear-existing'), $importer);
            $this->info("migration_flags written: {$written}");
        } else {
            $this->line('Dry run only. Add --write-flags to persist validation issues.');
        }

        return (bool) $this->option('fail-on-blocking') && $this->blockingCount($result['issues']) > 0
            ? self::FAILURE
            : self::SUCCESS;
    }

    /** @param list<array<string, mixed>> $issues */
    private function issueSummary(array $issues): void
    {
        $counts = collect($issues)->groupBy('severity')->map->count();
        $this->line('issues: ' . count($issues));
        $this->line('blocking: ' . (int) ($counts['blocking'] ?? 0));
        $this->line('warning: ' . (int) ($counts['warning'] ?? 0));

        foreach (array_slice($issues, 0, 10) as $issue) {
            $this->line("  [{$issue['severity']}] row {$issue['source_row_number']} {$issue['field_name']}: {$issue['flag_reason']}");
        }
    }

    /** @param list<array<string, mixed>> $issues */
    private function blockingCount(array $issues): int
    {
        return collect($issues)->where('severity', 'blocking')->count();
    }
}
