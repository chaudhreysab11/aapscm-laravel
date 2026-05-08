<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Support\Migration\ApprovedWordPressProductImporter;
use Illuminate\Console\Command;

class WpImportApprovedProductsCommand extends Command
{
    protected $signature = 'wp:import-approved-products
                            {--products=database/import/wordpress/products.csv : WordPress products CSV export}
                            {--slug-map=database/docs/wp-product-slug-map.csv : Reviewed WordPress product slug map}
                            {--clear-existing-flags : Clear unresolved flags for this importer before writing new flags}';

    protected $description = 'Import only approved or confirmed WordPress products and public prices into Laravel';

    public function handle(ApprovedWordPressProductImporter $importer): int
    {
        $result = $importer->import(
            (string) $this->option('products'),
            (string) $this->option('slug-map'),
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
