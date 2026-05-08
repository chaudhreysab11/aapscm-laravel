<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Support\Migration\WordPressUserCustomerImporter;
use Illuminate\Console\Command;

class WpImportUsersCustomersCommand extends Command
{
    protected $signature = 'wp:import-users-customers
                            {--file=database/import/wordpress/users-customer.csv : WordPress users/customers CSV export}
                            {--guest-map=database/docs/wp-guest-customers-map.csv : Reviewable guest customer preservation map}
                            {--clear-existing-flags : Clear unresolved flags for this importer before writing new flags}';

    protected $description = 'Import registered WordPress users and preserve guest customers without creating guest login accounts';

    public function handle(WordPressUserCustomerImporter $importer): int
    {
        $result = $importer->import(
            (string) $this->option('file'),
            (string) $this->option('guest-map'),
            (bool) $this->option('clear-existing-flags'),
        );

        foreach ($result as $label => $value) {
            if ($label === 'flagged_issues') {
                continue;
            }

            $this->line("{$label}: {$value}");
        }

        $this->newLine();
        $this->line('flagged_issue_counts:');

        if ($result['flagged_issues'] === []) {
            $this->line('  none');
        } else {
            foreach ($result['flagged_issues'] as $reason => $count) {
                $this->line("  {$reason}: {$count}");
            }
        }

        return self::SUCCESS;
    }
}
