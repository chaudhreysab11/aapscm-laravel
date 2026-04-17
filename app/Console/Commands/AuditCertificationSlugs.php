<?php

namespace App\Console\Commands;

use App\Models\CertificationCatalog;
use Illuminate\Console\Command;

class AuditCertificationSlugs extends Command
{
    protected $signature = 'certifications:audit-slugs';

    protected $description = 'Diff certification slugs hardcoded in the header against the database. Exits 1 if any header slugs are missing from the DB.';

    public function handle(): int
    {
        $headerPath = resource_path('views/components/cms/header.blade.php');

        if (! file_exists($headerPath)) {
            $this->error("Header file not found: {$headerPath}");
            return self::FAILURE;
        }

        $contents = file_get_contents($headerPath);

        // Extract all href values matching /certification/{slug} patterns.
        // Matches both single and double-quoted href attributes.
        preg_match_all(
            '#href=["\'](?:https?://[^"\']*)?/certification/([a-z0-9\-]+)["\']#i',
            $contents,
            $matches
        );

        $headerSlugs = collect($matches[1])->unique()->sort()->values();

        if ($headerSlugs->isEmpty()) {
            $this->warn('No /certification/{slug} hrefs found in the header file. Check the regex or the header markup.');
            return self::FAILURE;
        }

        $dbSlugs = CertificationCatalog::withTrashed()->pluck('slug')->sort()->values();

        $missingFromDb = $headerSlugs->diff($dbSlugs)->values();
        $notInHeader   = $dbSlugs->diff($headerSlugs)->values();
        $matchCount    = $headerSlugs->intersect($dbSlugs)->count();

        $this->info("Header slugs found : {$headerSlugs->count()}");
        $this->info("DB slugs found     : {$dbSlugs->count()}");
        $this->info("Matching           : {$matchCount}");
        $this->newLine();

        if ($missingFromDb->isNotEmpty()) {
            $this->error("MISSING FROM DB ({$missingFromDb->count()}) — these header links will 404:");
            foreach ($missingFromDb as $slug) {
                $this->line("  ✗ /certification/{$slug}");
            }
            $this->newLine();
        } else {
            $this->info('All header slugs exist in the database. ✓');
            $this->newLine();
        }

        if ($notInHeader->isNotEmpty()) {
            $this->warn("NOT IN HEADER ({$notInHeader->count()}) — orphaned DB entries (may be intentional):");
            foreach ($notInHeader as $slug) {
                $this->line("  · /certification/{$slug}");
            }
            $this->newLine();
        }

        return $missingFromDb->isNotEmpty() ? self::FAILURE : self::SUCCESS;
    }
}
