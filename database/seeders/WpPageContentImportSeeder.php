<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Imports page body content from wp_pages.csv (content_text column) into the
 * pages.content column.
 *
 * The content_text field is plain text scraped from the live site. It is
 * converted to simple HTML paragraphs so it renders in the RichEditor and on
 * the public page templates.
 *
 * Idempotent: only updates pages whose content is currently empty/null.
 * Run with --force to overwrite existing content.
 *
 * Usage:
 *   php artisan db:seed --class=WpPageContentImportSeeder
 *   php artisan db:seed --class=WpPageContentImportSeeder -- --force
 */
class WpPageContentImportSeeder extends Seeder
{
    public function run(): void
    {
        $force = in_array('--force', $_SERVER['argv'] ?? [], true);

        $csvPath = base_path('../Sitemap Analysis/wp_pages.csv');

        if (! file_exists($csvPath)) {
            $this->command->error("wp_pages.csv not found at: {$csvPath}");

            return;
        }

        $handle = fopen($csvPath, 'r');

        if ($handle === false) {
            $this->command->error('Could not open wp_pages.csv');

            return;
        }

        /** @var list<string>|false $header */
        $header = fgetcsv($handle);

        if ($header === false || $header === null) {
            $this->command->error('wp_pages.csv is empty or unreadable.');
            fclose($handle);

            return;
        }

        $updated  = 0;
        $skipped  = 0;
        $notFound = 0;

        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) < count($header)) {
                continue;
            }

            /** @var array<string,string> $data */
            $data = array_combine($header, $row);

            if ($data === false) {
                continue;
            }

            $slug        = trim($data['slug'] ?? '');
            $contentText = trim($data['content_text'] ?? '');

            if ($slug === '' || $contentText === '') {
                continue;
            }

            $page = Page::where('slug', $slug)->first();

            if ($page === null) {
                $notFound++;
                continue;
            }

            // Skip if already has content and not forcing
            if (! $force && $page->content !== null && $page->content !== '') {
                $skipped++;
                continue;
            }

            $page->content = self::toHtml($contentText);
            $page->save();
            $updated++;

            $this->command->line("  ✔ {$slug}");
        }

        fclose($handle);

        $this->command->info("Done. Updated: {$updated} | Skipped (already has content): {$skipped} | Not in DB: {$notFound}");
    }

    /**
     * Convert plain scraped text to simple HTML paragraphs.
     *
     * Splits on double newlines first; if no newlines exist (single-block CSV
     * text), splits on sentence boundaries every ~500 chars to create readable
     * paragraphs rather than one wall of text.
     */
    private static function toHtml(string $text): string
    {
        $text = html_entity_decode($text, ENT_QUOTES | ENT_HTML5, 'UTF-8');
        $text = trim($text);

        // If there are natural paragraph breaks, use them
        $parts = preg_split('/\n{2,}/', $text) ?: [$text];
        $parts = array_filter(array_map('trim', $parts));

        // If the whole text came through as one block (common in CSV scrapes),
        // split into ~400-char chunks at sentence endings for readability
        if (count($parts) === 1) {
            $parts = self::splitIntoSentenceChunks($text, 400);
        }

        $html = '';
        foreach ($parts as $part) {
            $part = trim($part);
            if ($part === '') {
                continue;
            }
            $html .= '<p>' . nl2br(htmlspecialchars($part, ENT_QUOTES, 'UTF-8')) . '</p>' . "\n";
        }

        return $html;
    }

    /**
     * Split a long plain-text block into chunks at sentence boundaries,
     * aiming for $targetLen chars per chunk.
     *
     * @return list<string>
     */
    private static function splitIntoSentenceChunks(string $text, int $targetLen): array
    {
        $sentences = preg_split('/(?<=[.!?])\s+/', $text) ?: [$text];
        $chunks    = [];
        $current   = '';

        foreach ($sentences as $sentence) {
            if ($current !== '' && (strlen($current) + strlen($sentence)) > $targetLen) {
                $chunks[] = trim($current);
                $current  = $sentence;
            } else {
                $current .= ($current !== '' ? ' ' : '') . $sentence;
            }
        }

        if ($current !== '') {
            $chunks[] = trim($current);
        }

        return $chunks ?: [$text];
    }
}
