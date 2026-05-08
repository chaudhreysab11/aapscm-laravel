<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;
use DOMDocument;
use DOMXPath;
use Illuminate\Database\Seeder;

class CareerCenterMirrorPagesSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->slugs() as $slug) {
            $seeder = new class($slug) extends ExactMirrorPageSeeder {
                public function __construct(private readonly string $mirrorSlug)
                {
                }

                protected function transformPageData(array $pageData): array
                {
                    if (! in_array($this->mirrorSlug, ['job-listing', 'view-job-seekers'], true)) {
                        return $pageData;
                    }

                    $bodyHtml = $pageData['body_html'] ?? null;

                    if (! is_string($bodyHtml) || ! str_contains($bodyHtml, '[wpjobportal_job_search]')) {
                        return $pageData;
                    }

                    $pageData['body_html'] = $this->stripJobPortalShortcodes($bodyHtml);

                    return $pageData;
                }

                protected function slug(): string
                {
                    return $this->mirrorSlug;
                }

                protected function payloadFile(): string
                {
                    return $this->mirrorSlug . '_data.php';
                }

                private function stripJobPortalShortcodes(string $html): string
                {
                    $document = new DOMDocument();
                    $previousUseInternalErrors = libxml_use_internal_errors(true);

                    $document->loadHTML('<?xml encoding="utf-8" ?>' . $html, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
                    libxml_clear_errors();
                    libxml_use_internal_errors($previousUseInternalErrors);

                    $xpath = new DOMXPath($document);

                    foreach ($xpath->query('//div[contains(@class, "elementor-widget-shortcode")]') ?: [] as $widget) {
                        if (! str_contains($widget->textContent ?? '', '[wpjobportal_job_search]')) {
                            continue;
                        }

                        $widget->parentNode?->removeChild($widget);
                    }

                    $output = $document->saveHTML();

                    return is_string($output) ? trim($output) : $html;
                }
            };

            $seeder->run();
        }
    }

    /**
     * @return string[]
     */
    private function slugs(): array
    {
        return [
            'career-center',
            'job-listing',
            'post-job-opportunities',
            'post-resume',
            'resume-evaluation',
            'view-job-seekers',
        ];
    }
}
