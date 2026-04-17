<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Page;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

/**
 * Downloads all Elementor CSS files referenced in each live WP page's <head>,
 * stores them locally, and saves a per-page CSS manifest so the Blade template
 * can load the correct files without talking to the live site.
 *
 * The manifest is saved at:  storage/app/public/cms-assets/elementor/manifest.json
 * Web path:                  /storage/cms-assets/elementor/manifest.json
 *
 * Local CSS files:           storage/app/public/cms-assets/elementor/{hash}.css
 *
 * Usage:
 *   php artisan cms:download-elementor-css
 *   php artisan cms:download-elementor-css --slug=about-us
 *   php artisan cms:download-elementor-css --dry-run
 */
class DownloadElementorCss extends Command
{
    protected $signature = 'cms:download-elementor-css
                            {--slug= : Only process a single page by slug}
                            {--dry-run : List what would be downloaded without saving}';

    protected $description = 'Scrape and download Elementor CSS from each live aapscm.org page';

    private const WP_BASE_URL  = 'https://aapscm.org';
    private const STORAGE_DISK = 'public';
    private const STORAGE_DIR  = 'cms-assets/elementor';
    private const MANIFEST     = 'cms-assets/elementor/manifest.json';

    public function handle(): int
    {
        $dryRun   = (bool) $this->option('dry-run');
        $onlySlug = $this->option('slug');

        $query = Page::whereNotNull('source_id')->orderBy('slug');
        if ($onlySlug) {
            $query->where('slug', $onlySlug);
        }
        $pages = $query->get(['id', 'slug', 'source_id']);

        if ($pages->isEmpty()) {
            $this->warn('No pages with source_id found.');
            return self::SUCCESS;
        }

        // Load existing manifest
        $manifest = [];
        if (Storage::disk(self::STORAGE_DISK)->exists(self::MANIFEST)) {
            $manifest = json_decode(
                Storage::disk(self::STORAGE_DISK)->get(self::MANIFEST) ?? '{}',
                true
            ) ?? [];
        }

        $downloaded = 0;
        $skipped    = 0;
        $failed     = 0;

        foreach ($pages as $page) {
            $liveUrl = self::WP_BASE_URL . '/' . $page->slug . '/';
            $this->info("Processing: <comment>{$liveUrl}</comment>");

            // Fetch the live page HTML
            try {
                $response = Http::timeout(30)->withoutVerifying()->get($liveUrl);
                if (! $response->successful()) {
                    $this->warn("  HTTP {$response->status()} — skipped.");
                    $failed++;
                    continue;
                }
                $html = $response->body();
            } catch (\Throwable $e) {
                $this->error("  Error fetching page: {$e->getMessage()}");
                $failed++;
                continue;
            }

            // Extract all elementor-related CSS <link> hrefs from the <head>
            $cssUrls = $this->extractCssUrls($html);

            if (empty($cssUrls)) {
                $this->line("  No Elementor CSS links found.");
                continue;
            }

            $this->line("  Found " . count($cssUrls) . " CSS file(s).");

            $pageLocalFiles = [];

            foreach ($cssUrls as $cssUrl) {
                // Derive a stable local filename from a hash of the URL (strip query version)
                $urlWithoutQuery = strtok($cssUrl, '?');
                $localName       = md5($urlWithoutQuery) . '.css';
                $storagePath     = self::STORAGE_DIR . '/' . $localName;

                if ($dryRun) {
                    $this->line("  Would download: <comment>{$cssUrl}</comment>");
                    $pageLocalFiles[] = '/storage/' . $storagePath;
                    continue;
                }

                if (! Storage::disk(self::STORAGE_DISK)->exists($storagePath)) {
                    $result = $this->downloadCss($cssUrl, $storagePath);
                    if ($result === 'downloaded') {
                        $downloaded++;
                    } elseif ($result === 'skipped') {
                        $skipped++;
                    } else {
                        $failed++;
                        // Still record the live URL as a fallback
                        $pageLocalFiles[] = $cssUrl;
                        continue;
                    }
                } else {
                    $skipped++;
                }

                $pageLocalFiles[] = '/storage/' . $storagePath;
            }

            // Store in manifest keyed by slug
            $manifest[$page->slug] = $pageLocalFiles;
        }

        if (! $dryRun) {
            Storage::disk(self::STORAGE_DISK)->put(
                self::MANIFEST,
                json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES)
            );
            $this->newLine();
            $this->info('Manifest saved to /storage/cms-assets/elementor/manifest.json');
        }

        $this->newLine();
        $this->info("Done. Downloaded: {$downloaded} | Already existed: {$skipped} | Failed: {$failed}");

        return self::SUCCESS;
    }

    /**
     * Extract all Elementor-related CSS href values from a page's <head> HTML.
     * Returns absolute URLs.
     *
     * @return array<int, string>
     */
    private function extractCssUrls(string $html): array
    {
        // Grab everything in <head>
        if (! preg_match('/<head[^>]*>(.*?)<\/head>/is', $html, $headMatch)) {
            return [];
        }
        $head = $headMatch[1];

        // Find all <link rel="stylesheet" href="..."> tags
        preg_match_all(
            '/<link[^>]+rel=[\'"]stylesheet[\'"][^>]+href=[\'"]([^\'"]+)[\'"][^>]*>/i',
            $head,
            $matches
        );

        $urls = [];
        foreach ($matches[1] as $href) {
            // We only want CSS served from aapscm.org (skip Google Fonts, CDN, etc.)
            if (str_contains($href, 'aapscm.org') || str_starts_with($href, '/')) {
                // Make absolute
                if (str_starts_with($href, '/')) {
                    $href = self::WP_BASE_URL . $href;
                }
                $urls[] = $href;
            }
        }

        return array_unique($urls);
    }

    /**
     * Download a single CSS URL, rewrite internal url() refs, store locally.
     * Returns: 'downloaded' | 'skipped' | 'failed'
     */
    private function downloadCss(string $url, string $storagePath): string
    {
        $this->line("  <fg=gray>↓</> <comment>{$url}</comment>");

        try {
            $response = Http::timeout(20)->withoutVerifying()->get($url);

            if (! $response->successful()) {
                $this->warn("    HTTP {$response->status()} — skipped.");
                return 'failed';
            }

            $css = $this->rewriteCssUrls($response->body());
            Storage::disk(self::STORAGE_DISK)->put($storagePath, $css);

            $size = number_format(strlen($css) / 1024, 1);
            $this->line("    <info>✓</info> ({$size} KB)");
            return 'downloaded';

        } catch (\Throwable $e) {
            $this->error("    Error: {$e->getMessage()}");
            return 'failed';
        }
    }

    /**
     * Rewrite url() references inside CSS from WP absolute paths to local storage paths.
     */
    private function rewriteCssUrls(string $css): string
    {
        $css = preg_replace(
            '#https://aapscm\.org/wp-content/uploads/#',
            '/storage/cms-images/',
            $css
        ) ?? $css;

        $css = preg_replace(
            '#//aapscm\.org/wp-content/uploads/#',
            '/storage/cms-images/',
            $css
        ) ?? $css;

        return $css;
    }
}
