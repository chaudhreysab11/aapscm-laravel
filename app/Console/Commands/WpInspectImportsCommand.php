<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Support\Migration\WordPressCsvValidationService;
use Illuminate\Console\Command;

class WpInspectImportsCommand extends Command
{
    protected $signature = 'wp:inspect-imports
                            {--path=database/import/wordpress : Folder containing WordPress CSV exports}
                            {--write-flags : Persist inspection issues to migration_flags}
                            {--clear-existing : Clear unresolved flags for this importer before writing}';

    protected $description = 'Inspect WordPress CSV import files without importing target data';

    public function handle(WordPressCsvValidationService $validator): int
    {
        $path = rtrim((string) $this->option('path'), '/\\');
        $issues = [];

        $this->info('Inspecting WordPress import CSV files');
        $this->newLine();

        foreach (WordPressCsvValidationService::FILES as $dataset => $fileName) {
            $inspection = $validator->inspect($dataset, $path . '/' . $fileName);

            $this->line('<comment>' . $fileName . '</comment>');
            $this->line('  exists: ' . ($inspection['exists'] ? 'yes' : 'no'));
            $this->line('  rows: ' . $inspection['rows'] . ' / expected ' . WordPressCsvValidationService::EXPECTED_ROWS[$dataset]);
            $this->line('  columns: ' . $inspection['columns']);

            if ($inspection['missing_headers'] !== []) {
                $this->error('  missing headers: ' . implode(', ', $inspection['missing_headers']));
            }

            if ($inspection['extra_headers'] !== []) {
                $this->warn('  extra headers: ' . implode(', ', $inspection['extra_headers']));
            }

            if (! $inspection['exists']) {
                $issues[] = [
                    'importer' => 'WpInspectImports',
                    'source_table' => 'csv_file',
                    'source_file' => $path . '/' . $fileName,
                    'source_id' => 0,
                    'source_row_number' => 1,
                    'source_key' => $dataset,
                    'severity' => 'blocking',
                    'field_name' => 'file',
                    'original_value' => null,
                    'flag_reason' => 'missing_import_file: Expected CSV file was not found.',
                    'raw_payload' => ['dataset' => $dataset, 'path' => $path . '/' . $fileName],
                ];
            }

            $this->newLine();
        }

        if ((bool) $this->option('write-flags')) {
            $written = $validator->writeFlags($issues, (bool) $this->option('clear-existing'), 'WpInspectImports');
            $this->info("migration_flags written: {$written}");
        } else {
            $this->line('Dry run only. Add --write-flags to persist inspection issues.');
        }

        return self::SUCCESS;
    }
}
