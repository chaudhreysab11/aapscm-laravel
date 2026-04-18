<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Page;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * Downloads all WordPress images referenced in CMS sources and stores them
 * in storage/app/public/cms-images/ (web-accessible at /storage/cms-images/).
 *
 * Sources scanned (in order):
 *   1. Raw HTML files in ../Live Pages HTML/*.html
 *   2. pages.content column in the database
 *
 * Updates pages.content to swap WP URLs for /storage/cms-images/ URLs
 * (only for URLs actually present in DB rows).
 *
 * Safe to re-run — already-downloaded files are skipped.
 *
 * Usage:
 *   php artisan cms:download-images
 *   php artisan cms:download-images --dry-run
 *   php artisan cms:download-images --slug=about-us
 *   php artisan cms:download-images --skip-html-folder
 *   php artisan cms:download-images --skip-db
 */
class DownloadCmsImages extends Command
{
    protected $signature = 'cms:download-images
                            {--dry-run : List images that would be downloaded without saving}
                            {--slug= : Only process a single page by slug (DB only)}
                            {--skip-html-folder : Do not scan the Live Pages HTML/ folder}
                            {--skip-db : Do not scan the pages.content column}';

    protected $description = 'Download WP images from aapscm.org into local storage';

    private const WP_HOST        = 'aapscm.org';
    private const WP_BASE_URL    = 'https://aapscm.org';
    private const WP_UPLOADS_DIR = '/wp-content/uploads/';
    private const STORAGE_DISK   = 'public';
    private const STORAGE_DIR    = 'cms-images';
    private const PUBLIC_URL_DIR = '/storage/cms-images';

    public function handle(): int
    {
        $dryRun          = (bool) $this->option('dry-run');
        $onlySlug        = $this->option('slug');
        $skipHtmlFolder  = (bool) $this->option('skip-html-folder');
        $skipDb          = (bool) $this->option('skip-db');

        if (! is_link(public_path('storage'))) {
            $this->warn('Storage symlink missing — running storage:link…');
            $this->call('storage:link');
        }

        $pages = collect();
        if (! $skipDb) {
            $query = Page::whereNotNull('content')->where('content', '!=', '');
            if ($onlySlug !== null && $onlySlug !== '') {
                $query->where('slug', $onlySlug);
            }
            $pages = $query->orderBy('slug')->get(['id', 'slug', 'content']);
        }

        $relativeUrls = [];

        if (! $skipHtmlFolder) {
            $fromHtml = $this->collectFromHtmlFolder();
            $this->info(count($fromHtml) . ' URL(s) found in Live Pages HTML/ folder.');
            $relativeUrls += $fromHtml;
        }

        if (! $skipDb) {
            $fromDb = $this->collectFromPages($pages);
            $this->info(count($fromDb) . ' URL(s) found in pages.content.');
            $relativeUrls += $fromDb;
        }

        $relativeUrls = array_keys($relativeUrls);
        $total        = count($relativeUrls);

        if ($total === 0) {
            $this->info('No WP upload images found. Nothing to download.');

            return self::SUCCESS;
        }

        $this->info("{$total} unique image(s) to process.");

        if ($dryRun) {
            foreach ($relativeUrls as $url) {
                $this->line("  Would download: <comment>{$url}</comment>");
            }

            return self::SUCCESS;
        }

        ['urlMap' => $urlMap, 'downloaded' => $downloaded, 'skipped' => $skipped, 'failed' => $failed]
            = $this->downloadImages($relativeUrls);

        if (! $skipDb && ! empty($urlMap) && $pages->isNotEmpty()) {
            $this->newLine();
            $this->info('Updating page content URLs…');
            $updatedPages = 0;

            foreach ($pages as $page) {
                $updated = strtr((string) $page->content, $urlMap);
                if ($updated !== $page->content) {
                    $page->content = $updated;
                    $page->save();
                    $updatedPages++;
                    $this->line("  <info>✓</info> {$page->slug}");
                }
            }
            $this->info("{$updatedPages} page(s) updated.");
        }

        $this->newLine();
        $this->info("Done. Downloaded: {$downloaded} | Already existed: {$skipped} | Failed: {$failed}");

        return self::SUCCESS;
    }

    private function htmlDir(): string
    {
        return dirname(base_path()) . DIRECTORY_SEPARATOR . 'Live Pages HTML';
    }

    /**
     * Scan all .html files in the Live Pages HTML/ folder.
     *
     * @return array<string, true>  keyed by relative URL for dedup
     */
    private function collectFromHtmlFolder(): array
    {
        $dir = $this->htmlDir();
        if (! is_dir($dir)) {
            return [];
        }

        $seen = [];
        foreach ((array) glob($dir . DIRECTORY_SEPARATOR . '*.html') as $file) {
            $html = (string) file_get_contents($file);
            foreach ($this->extractImageUrls($html) as $url) {
                $seen[$url] = true;
            }
        }

        return $seen;
    }

    /**
     * @param  \Illuminate\Support\Collection<int, Page>  $pages
     * @return array<string, true>
     */
    private function collectFromPages(iterable $pages): array
    {
        $seen = [];
        foreach ($pages as $page) {
            foreach ($this->extractImageUrls((string) $page->content) as $url) {
                $seen[$url] = true;
            }
        }

        return $seen;
    }

    /**
     * Extract /wp-content/uploads/... image paths from HTML.
     * Normalizes absolute aapscm.org URLs down to relative paths, so the
     * same URL appearing as both absolute (raw HTML) and relative (DB
     * content rewritten by the importer) dedups to one entry.
     *
     * @return array<int, string>
     */
    private function extractImageUrls(string $html): array
    {
        $found = [];

        // Absolute URLs on aapscm.org
        preg_match_all(
            '#https?://(?:www\.)?' . preg_quote(self::WP_HOST, '#') . '(/wp-content/uploads/[^\s"\')\]\?]+\.(?:png|jpe?g|gif|webp|svg|ico|avif|bmp))(?:\?[^\s"\')\]\?]*)?#i',
            $html,
            $absMatches
        );
        foreach ($absMatches[1] as $u) {
            $found[$u] = true;
        }

        // Relative /wp-content/uploads/ paths
        preg_match_all(
            '#(?<![a-zA-Z0-9])(/wp-content/uploads/[^\s"\')\]\?]+\.(?:png|jpe?g|gif|webp|svg|ico|avif|bmp))(?:\?[^\s"\')\]\?]*)?#i',
            $html,
            $relMatches
        );
        foreach ($relMatches[1] as $u) {
            $found[$u] = true;
        }

        return array_keys($found);
    }

    /**
     * @param  array<int, string>  $relativeUrls
     * @return array{urlMap: array<string, string>, downloaded: int, skipped: int, failed: int}
     */
    private function downloadImages(array $relativeUrls): array
    {
        $urlMap     = [];
        $downloaded = 0;
        $skipped    = 0;
        $failed     = 0;

        foreach ($relativeUrls as $relUrl) {
            $subPath     = ltrim(str_replace(self::WP_UPLOADS_DIR, '', $relUrl), '/');
            $storagePath = self::STORAGE_DIR . '/' . $subPath;
            $localUrl    = self::PUBLIC_URL_DIR . '/' . $subPath;

            if (Storage::disk(self::STORAGE_DISK)->exists($storagePath)) {
                // Map both the relative and the absolute variants so strtr
                // on DB content handles either form.
                $urlMap[$relUrl]                      = $localUrl;
                $urlMap[self::WP_BASE_URL . $relUrl]  = $localUrl;
                $skipped++;

                continue;
            }

            $remoteUrl = self::WP_BASE_URL . $relUrl;
            $this->line("  Downloading: <comment>{$remoteUrl}</comment>");

            try {
                $response = Http::timeout(30)
                    ->withoutVerifying()
                    ->withHeaders(['User-Agent' => 'Mozilla/5.0 (compatible; AAPSCM-Migrator/1.0)'])
                    ->get($remoteUrl);

                if (! $response->successful()) {
                    $this->warn("    HTTP {$response->status()} — skipped.");
                    $failed++;

                    continue;
                }

                Storage::disk(self::STORAGE_DISK)->put($storagePath, $response->body());
                $urlMap[$relUrl]                      = $localUrl;
                $urlMap[self::WP_BASE_URL . $relUrl]  = $localUrl;
                $downloaded++;

                $size = number_format(strlen($response->body()) / 1024, 1);
                $this->line("    <info>✓ Saved</info> ({$size} KB)");
            } catch (\Throwable $e) {
                $this->error("    Error: {$e->getMessage()}");
                $failed++;
            }

            usleep(100_000); // 100 ms polite delay
        }

        return compact('urlMap', 'downloaded', 'skipped', 'failed');
    }
}
