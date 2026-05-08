<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Support\Migration\FullWordPressProductImporter;
use Illuminate\Console\Command;

class WpImportAllProductsCommand extends Command
{
    protected $signature = 'wp:import-all-products
                            {--products=database/import/wordpress/products.csv : WordPress products CSV export}
                            {--slug-map=database/docs/wp-product-slug-map.csv : WordPress product slug map}
                            {--clear-existing-flags : Clear unresolved flags for this full importer before writing new flags}';

    protected $description = 'Import all valid WooCommerce products and public prices into Laravel for cart/checkout testing';

    public function handle(FullWordPressProductImporter $importer): int
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
