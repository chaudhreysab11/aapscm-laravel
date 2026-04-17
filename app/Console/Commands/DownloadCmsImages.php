<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Page;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * Downloads all WordPress images referenced in CMS page content and stores
 * them in storage/app/public/cms-images/ (web-accessible at /storage/cms-images/).
 * Updates the pages.content column so all image URLs point to local copies.
 *
 * Safe to re-run — already-downloaded files are skipped.
 *
 * Usage:
 *   php artisan cms:download-images
 *   php artisan cms:download-images --dry-run
 *   php artisan cms:download-images --slug=about-us
 */
class DownloadCmsImages extends Command
{
    protected $signature = 'cms:download-images
                            {--dry-run : List images that would be downloaded without saving}
                            {--slug= : Only process a single page by slug}';

    protected $description = 'Download WP images from aapscm.org into local storage and update page content URLs';

    private const WP_BASE_URL    = 'https://aapscm.org';
    private const WP_UPLOADS_DIR = '/wp-content/uploads/';
    private const STORAGE_DISK   = 'public';
    private const STORAGE_DIR    = 'cms-images';     // storage/app/public/cms-images/
    private const PUBLIC_URL_DIR = '/storage/cms-images'; // web-visible path

    public function handle(): int
    {
        $dryRun   = (bool) $this->option('dry-run');
        $onlySlug = $this->option('slug');

        // Ensure Laravel's public storage symlink is in place
        if (! is_link(public_path('storage'))) {
            $this->warn('Storage symlink missing — running storage:link…');
            $this->call('storage:link');
        }

        $query = Page::whereNotNull('content')->where('content', '!=', '');
        if ($onlySlug !== null && $onlySlug !== '') {
            $query->where('slug', $onlySlug);
        }
        $pages = $query->orderBy('slug')->get(['id', 'slug', 'content']);

        if ($pages->isEmpty()) {
            $this->info('No pages with content. Run cms:import-live-content first.');

            return self::SUCCESS;
        }

        // Collect every unique WP uploads URL mentioned across all pages
        $allRelUrls = $this->collectAllImageUrls($pages);
        $total      = count($allRelUrls);

        if ($total === 0) {
            $this->info('No WP upload images found in page content. Nothing to download.');

            return self::SUCCESS;
        }

        $this->info("{$total} unique image(s) found across {$pages->count()} page(s).");

        if ($dryRun) {
            foreach ($allRelUrls as $url) {
                $this->line("  Would download: <comment>{$url}</comment>");
            }

            return self::SUCCESS;
        }

        // Download each image, building an old→new URL map
        ['urlMap' => $urlMap, 'downloaded' => $downloaded, 'skipped' => $skipped, 'failed' => $failed]
            = $this->downloadImages($allRelUrls);

        // Update DB content to replace WP URLs with local storage URLs
        if (! empty($urlMap)) {
            $this->newLine();
            $this->info('Updating page content URLs…');
            $updatedPages = 0;

            foreach ($pages as $page) {
                $updated = strtr($page->content, $urlMap);
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

    /**
     * Collect all unique relative WP uploads URLs from all pages.
     * Returns a de-duplicated array of paths like /wp-content/uploads/2024/12/img.png
     *
     * @param  \Illuminate\Database\Eloquent\Collection<int, Page>  $pages
     * @return array<int, string>
     */
    private function collectAllImageUrls(iterable $pages): array
    {
        $seen = [];
        foreach ($pages as $page) {
            foreach ($this->extractImageUrls((string) $page->content) as $url) {
                $seen[$url] = true;
            }
        }

        return array_keys($seen);
    }

    /**
     * Extract /wp-content/uploads/... image paths from HTML.
     * Handles src=, srcset=, inline style url(), and any other occurrence.
     *
     * @return array<int, string>
     */
    private function extractImageUrls(string $html): array
    {
        $found = [];

        // Catch-all: any /wp-content/uploads/ path that looks like an image file.
        // This covers src=, srcset=, style="background-image: url(...)", data-src=, etc.
        preg_match_all(
            '/(\/wp-content\/uploads\/[^\s"\')\]\?]+\.(?:png|jpe?g|gif|webp|svg|ico|avif|bmp))(?:\?[^\s"\')\]\?]*)?/i',
            $html,
            $matches
        );

        foreach ($matches[1] as $u) {
            $found[$u] = true;
        }

        return array_keys($found);
    }

    /**
     * Download each image, skipping ones already stored.
     * Returns statistics and a URL replacement map.
     *
     * @param  array<int, string>  $relativeUrls
     * @return array{map: array<string, string>, downloaded: int, skipped: int, failed: int}
     */
    private function downloadImages(array $relativeUrls): array
    {
        $urlMap     = [];
        $downloaded = 0;
        $skipped    = 0;
        $failed     = 0;

        foreach ($relativeUrls as $relUrl) {
            // Strip /wp-content/uploads/ prefix → e.g. 2024/12/img.png
            $subPath     = ltrim(str_replace(self::WP_UPLOADS_DIR, '', $relUrl), '/');
            $storagePath = self::STORAGE_DIR . '/' . $subPath;
            $localUrl    = self::PUBLIC_URL_DIR . '/' . $subPath;

            // Already present on disk — just update the map
            if (Storage::disk(self::STORAGE_DISK)->exists($storagePath)) {
                $urlMap[$relUrl] = $localUrl;
                $skipped++;

                continue;
            }

            $remoteUrl = self::WP_BASE_URL . $relUrl;
            $this->line("  Downloading: <comment>{$remoteUrl}</comment>");

            try {
                $response = Http::timeout(30)
                    ->withoutVerifying() // local dev: PHP CA bundle not configured
                    ->get($remoteUrl);

                if (! $response->successful()) {
                    $this->warn("    HTTP {$response->status()} — skipped.");
                    $failed++;

                    continue;
                }

                Storage::disk(self::STORAGE_DISK)->put($storagePath, $response->body());
                $urlMap[$relUrl] = $localUrl;
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
