<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Support\Migration\WordPressProductSlugReviewer;
use Illuminate\Console\Command;

class WpReviewProductSlugsCommand extends Command
{
    protected $signature = 'wp:review-product-slugs
                            {--products=database/import/wordpress/products.csv : WordPress products CSV export}
                            {--slug-map=database/docs/wp-product-slug-map.csv : WordPress product slug map}
                            {--review=database/docs/wp-product-final-review.md : Review summary document}
                            {--dry-run : Generate the review document without updating the slug map}';

    protected $description = 'Review remaining WordPress product slug-map rows and approve only safe rows';

    public function handle(WordPressProductSlugReviewer $reviewer): int
    {
        $result = $reviewer->review(
            (string) $this->option('products'),
            (string) $this->option('slug-map'),
            (string) $this->option('review'),
            ! (bool) $this->option('dry-run'),
        );

        foreach ($result as $label => $value) {
            if (is_array($value)) {
                continue;
            }

            $this->line("{$label}: {$value}");
        }

        $this->newLine();
        $this->line('skipped_reasons:');

        if ($result['skipped_reasons'] === []) {
            $this->line('  none');
        } else {
            foreach ($result['skipped_reasons'] as $reason => $count) {
                $this->line("  {$reason}: {$count}");
            }
        }

        return self::SUCCESS;
    }
}
