<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Support\Migration\WordPressCsvValidationService;
use Illuminate\Console\Command;

class WpValidateProductsCommand extends Command
{
    protected $signature = 'wp:validate-products
                            {--file=database/import/wordpress/products.csv : WordPress products CSV export}
                            {--write-flags : Persist validation issues to migration_flags}
                            {--clear-existing : Clear unresolved flags for this importer before writing}
                            {--fail-on-blocking : Return a failure exit code when blocking issues are found}';

    protected $description = 'Validate WordPress products CSV without importing products or prices';

    public function handle(WordPressCsvValidationService $validator): int
    {
        $result = $validator->validateProducts((string) $this->option('file'));

        foreach ($result['summary'] as $label => $value) {
            $this->line("{$label}: {$value}");
        }

        $this->newLine();
        $this->issueSummary($result['issues']);

        if ((bool) $this->option('write-flags')) {
            $written = $validator->writeFlags($result['issues'], (bool) $this->option('clear-existing'), 'WpValidateProducts');
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
