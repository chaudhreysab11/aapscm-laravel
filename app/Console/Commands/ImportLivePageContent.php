<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Page;
use DOMDocument;
use DOMXPath;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

/**
 * Fetches page HTML from live aapscm.org and saves it locally.
 *
 * Two outputs per page:
 *   1. Raw HTML file saved to ../Live Pages HTML/<slug>.html (always,
 *      unless already present and --force not given). This is the
 *      reference file used when rebuilding templates.
 *   2. Extracted/cleaned body content written to pages.content (only
 *      when --save-to-db is passed).
 *
 * Usage:
 *   php artisan cms:import-live-content
 *   php artisan cms:import-live-content --force
 *   php artisan cms:import-live-content --slug=about-us
 *   php artisan cms:import-live-content --save-to-db
 */
class ImportLivePageContent extends Command
{
    protected $signature = 'cms:import-live-content
                            {--force : Re-download HTML files that already exist locally}
                            {--slug= : Only import a single page by slug}
                            {--save-to-db : Also extract & store cleaned content in pages.content}';

    protected $description = 'Download live aapscm.org page HTML into Live Pages HTML/ folder';

    /** XPath selectors tried in order to locate main content */
    private const CONTENT_SELECTORS = [
        '//*[contains(@class,"entry-content")]',
        '//*[contains(@class,"wp-block-group")]',
        '//*[contains(@class,"page-content")]',
        '//*[@id="content"]',
        '//*[contains(@class,"site-content")]',
        '//body',
    ];

    /** Tags to strip completely (tag + children) */
    private const STRIP_TAGS = [
        'script', 'style', 'nav', 'header', 'footer',
        'noscript', 'iframe', 'svg', 'form',
    ];

    /** Class fragments that indicate navigation / chrome nodes */
    private const STRIP_CLASS_FRAGMENTS = [
        'site-header', 'site-footer',
        'main-navigation', 'widget_nav_menu', 'wp-block-navigation',
        'breadcrumb', 'related-posts', 'post-navigation',
    ];

    public function handle(): int
    {
        $force    = (bool) $this->option('force');
        $onlySlug = $this->option('slug');
        $saveToDb = (bool) $this->option('save-to-db');

        $htmlDir = $this->htmlDir();
        if (! is_dir($htmlDir) && ! mkdir($htmlDir, 0755, true) && ! is_dir($htmlDir)) {
            $this->error("Could not create HTML directory: {$htmlDir}");

            return self::FAILURE;
        }

        $query = Page::query()->whereNotNull('seo_canonical');
        if ($onlySlug !== null && $onlySlug !== '') {
            $query->where('slug', $onlySlug);
        }
        $pages = $query->orderBy('slug')->get();

        if ($pages->isEmpty()) {
            $this->info('No pages found with a seo_canonical URL.');

            return self::SUCCESS;
        }

        $this->info("Target folder: {$htmlDir}");
        $this->info("Processing {$pages->count()} page(s)…");

        $downloaded = 0;
        $skipped    = 0;
        $failed     = 0;
        $dbUpdated  = 0;

        foreach ($pages as $page) {
            $url      = rtrim((string) $page->seo_canonical, '/') . '/';
            $htmlPath = $htmlDir . DIRECTORY_SEPARATOR . $page->slug . '.html';

            if (! $force && is_file($htmlPath)) {
                $this->line("  <info>•</info> {$page->slug}.html already exists — skipped.");
                $skipped++;

                if ($saveToDb && ($page->content === null || $page->content === '')) {
                    $dbUpdated += $this->saveExtractedContent($page, (string) file_get_contents($htmlPath));
                }

                continue;
            }

            $this->line("  Fetching: <comment>{$url}</comment>");

            try {
                $response = Http::timeout(30)
                    ->withoutVerifying()
                    ->withHeaders([
                        'Accept'     => 'text/html',
                        'User-Agent' => 'Mozilla/5.0 (compatible; AAPSCM-Migrator/1.0)',
                    ])
                    ->get($url);

                if (! $response->successful()) {
                    $this->warn("    HTTP {$response->status()} — skipped.");
                    $failed++;

                    continue;
                }

                $rawHtml = $response->body();
                file_put_contents($htmlPath, $rawHtml);
                $downloaded++;

                $size = number_format(strlen($rawHtml) / 1024, 1);
                $this->line("    <info>✓ Saved</info> {$page->slug}.html ({$size} KB)");

                if ($saveToDb) {
                    $dbUpdated += $this->saveExtractedContent($page, $rawHtml);
                }
            } catch (\Throwable $e) {
                $this->error("    Error: {$e->getMessage()}");
                $failed++;
            }

            usleep(300_000); // 300 ms polite delay
        }

        $this->newLine();
        $this->info("Done. Downloaded: {$downloaded} | Already existed: {$skipped} | Failed: {$failed}");
        if ($saveToDb) {
            $this->info("pages.content updated: {$dbUpdated}");
        }

        return self::SUCCESS;
    }

    /**
     * Resolve the target folder as a sibling of the Laravel project root,
     * e.g. D:/Personal Work/AAPSCM-LARAVEL → D:/Personal Work/Live Pages HTML.
     */
    private function htmlDir(): string
    {
        return dirname(base_path()) . DIRECTORY_SEPARATOR . 'Live Pages HTML';
    }

    private function saveExtractedContent(Page $page, string $rawHtml): int
    {
        $content = $this->extractContent($rawHtml);
        if ($content === '') {
            $this->warn("    Could not extract content for {$page->slug}.");

            return 0;
        }

        $page->content = $content;
        $page->save();

        return 1;
    }

    private function extractContent(string $html): string
    {
        $dom = new DOMDocument('1.0', 'UTF-8');
        libxml_use_internal_errors(true);
        $dom->loadHTML(mb_convert_encoding($html, 'HTML-ENTITIES', 'UTF-8'));
        libxml_clear_errors();

        $xpath = new DOMXPath($dom);

        foreach (self::STRIP_TAGS as $tag) {
            foreach (iterator_to_array($xpath->query("//{$tag}") ?: []) as $node) {
                $node->parentNode?->removeChild($node);
            }
        }

        foreach (self::STRIP_CLASS_FRAGMENTS as $fragment) {
            foreach (iterator_to_array($xpath->query("//*[contains(@class,'{$fragment}')]") ?: []) as $node) {
                $node->parentNode?->removeChild($node);
            }
        }

        foreach (iterator_to_array($xpath->query('//*[@*]') ?: []) as $el) {
            $toRemove = [];
            foreach ($el->attributes as $attr) {
                if (str_starts_with($attr->name, 'data-')) {
                    $toRemove[] = $attr->name;
                }
            }
            foreach ($toRemove as $attrName) {
                $el->removeAttribute($attrName);
            }
        }

        $contentNode = null;
        foreach (self::CONTENT_SELECTORS as $selector) {
            $nodes = $xpath->query($selector);
            if ($nodes !== false && $nodes->length > 0) {
                $contentNode = $nodes->item(0);
                break;
            }
        }

        if ($contentNode === null) {
            return '';
        }

        $inner = '';
        foreach ($contentNode->childNodes as $child) {
            $inner .= $dom->saveHTML($child);
        }

        return $this->cleanHtml($inner);
    }

    private function cleanHtml(string $html): string
    {
        $html = preg_replace('/<!--.*?-->/s', '', $html) ?? $html;
        $html = str_replace('https://aapscm.org', '', $html);
        $html = preg_replace('/(\n\s*){3,}/', "\n\n", $html) ?? $html;

        return trim($html);
    }
}
