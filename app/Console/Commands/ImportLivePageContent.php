<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\Models\Page;
use DOMDocument;
use DOMXPath;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

/**
 * Fetches page body content from the live aapscm.org WordPress site and
 * imports it into the local pages.content column.
 *
 * Idempotent by default: skips pages that already have content.
 * Use --force to overwrite existing content.
 *
 * Usage:
 *   php artisan cms:import-live-content
 *   php artisan cms:import-live-content --force
 *   php artisan cms:import-live-content --slug=about-us
 */
class ImportLivePageContent extends Command
{
    protected $signature = 'cms:import-live-content
                            {--force : Overwrite pages that already have content}
                            {--slug= : Only import a single page by slug}';

    protected $description = 'Fetch page content from live aapscm.org and store in the pages table';

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

        $query = Page::query()->whereNotNull('seo_canonical');

        if ($onlySlug !== null && $onlySlug !== '') {
            $query->where('slug', $onlySlug);
        } elseif (! $force) {
            $query->where(function ($q): void {
                $q->whereNull('content')->orWhere('content', '');
            });
        }

        $pages = $query->orderBy('slug')->get();

        if ($pages->isEmpty()) {
            $this->info('No pages to import (all already have content). Use --force to re-import.');

            return self::SUCCESS;
        }

        $this->info("Importing content for {$pages->count()} page(s)…");

        $updated = 0;
        $failed  = 0;

        foreach ($pages as $page) {
            $url = rtrim((string) $page->seo_canonical, '/') . '/';

            $this->line("  Fetching: <comment>{$url}</comment>");

            try {
                $response = Http::timeout(15)
                    ->withoutVerifying() // local dev: PHP CA bundle not configured
                    ->withHeaders(['Accept' => 'text/html'])
                    ->get($url);

                if (! $response->successful()) {
                    $this->warn("    HTTP {$response->status()} — skipped.");
                    $failed++;

                    continue;
                }

                $content = $this->extractContent($response->body());

                if ($content === '') {
                    $this->warn('    Could not extract content — skipped.');
                    $failed++;

                    continue;
                }

                $page->content = $content;
                $page->save();
                $updated++;

                $this->line('    <info>✓ Saved</info> (' . strlen($content) . ' bytes)');

            } catch (\Throwable $e) {
                $this->error("    Error: {$e->getMessage()}");
                $failed++;
            }

            usleep(300_000); // 300 ms polite delay
        }

        $this->newLine();
        $this->info("Done. Updated: {$updated} | Failed/skipped: {$failed}");

        return self::SUCCESS;
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

        // Strip data-* attributes (WP JSON blobs — not needed for display)
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
        // Strip WP block comments
        $html = preg_replace('/<!--.*?-->/s', '', $html) ?? $html;

        // Rewrite internal URLs to relative paths so images + links work locally
        $html = str_replace('https://aapscm.org', '', $html);

        // Collapse excessive blank lines
        $html = preg_replace('/(\n\s*){3,}/', "\n\n", $html) ?? $html;

        return trim($html);
        // NOTE: class=, style=, id= are intentionally preserved for anchor navigation.
        //       data-* attributes are stripped earlier via DOM in extractContent().
    }
}
