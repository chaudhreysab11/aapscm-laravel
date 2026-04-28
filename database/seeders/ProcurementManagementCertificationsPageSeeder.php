<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.com/procurement-management-certifications/
 * for WP parity.
 *
 * Page anatomy: hero heading, two-column intro ("For Professionals" + image),
 * "Why Choose Us?" headline with three feature boxes, a CTA line, a two-column
 * "For Managers" block, a "Why It's Perfect for Managers" headline with three
 * feature boxes, a closing paragraph + "Start your journey Today" headline,
 * and 14 certification cards (image + title + short description + Learn More
 * + badge image).
 *
 * All aapscm.com wp-content URLs are rewritten to /storage/cms-images, and
 * internal page links are converted to local relative slugs.
 */
class ProcurementManagementCertificationsPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $raw */
        $raw = require database_path('seeders/data/procurement_management_certifications_data.php');

        $pageData = [
            'hero_heading' => (string) ($raw['hero_heading'] ?? ''),
            'intro' => [
                'heading_html'  => UrlRewriter::rewriteHtml((string) ($raw['intro']['heading_html'] ?? '')),
                'for_prof_html' => UrlRewriter::rewriteHtml((string) ($raw['intro']['for_prof_html'] ?? '')),
                'text'          => (string) ($raw['intro']['text'] ?? ''),
                'image'         => UrlRewriter::image((string) ($raw['intro']['image'] ?? '')),
            ],
            'why_choose_us' => [
                'heading_html' => UrlRewriter::rewriteHtml((string) ($raw['why_choose_us_heading'] ?? '')),
                'boxes'        => $this->rewriteBoxes((array) ($raw['why_choose_us_boxes'] ?? [])),
            ],
            'next_step_text' => (string) ($raw['next_step_text'] ?? ''),
            'for_managers' => [
                'image'        => UrlRewriter::image((string) ($raw['for_managers']['image'] ?? '')),
                'heading_html' => UrlRewriter::rewriteHtml((string) ($raw['for_managers']['heading_html'] ?? '')),
                'text'         => (string) ($raw['for_managers']['text'] ?? ''),
            ],
            'why_perfect' => [
                'heading_html' => UrlRewriter::rewriteHtml((string) ($raw['why_perfect_heading'] ?? '')),
                'boxes'        => $this->rewriteBoxes((array) ($raw['why_perfect_boxes'] ?? [])),
            ],
            'transform_text'        => (string) ($raw['transform_text'] ?? ''),
            'start_journey_heading' => (string) ($raw['start_journey_heading'] ?? ''),
            'cards'                 => $this->rewriteCards((array) ($raw['cards'] ?? [])),
        ];

        Page::updateOrCreate(
            ['slug' => 'procurement-management-certifications'],
            [
                'title'            => 'Procurement Management Certifications',
                'content'          => null,
                'excerpt'          => 'Globally recognised AAPSCM® procurement management certifications for professionals and managers — 14 credentials covering digital procurement, risk management, sustainability, AI, supplier relationships and more.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Procurement Management Certifications \u{2013} AAPSCM\u{00ae}",
                'meta_description' => 'Advance your career with AAPSCM® Procurement Management Certifications — 14 globally recognised credentials for professionals and managers across digital procurement, risk, sustainability, AI, leadership and more.',
                'show_in_nav'      => false,
            ],
        );
    }

    /**
     * @param  array<int, array<string, string>>  $boxes
     * @return array<int, array<string, string>>
     */
    private function rewriteBoxes(array $boxes): array
    {
        $out = [];
        foreach ($boxes as $b) {
            $out[] = [
                'image' => UrlRewriter::image((string) ($b['image'] ?? '')),
                'text'  => (string) ($b['text'] ?? ''),
            ];
        }

        return $out;
    }

    /**
     * @param  array<int, array<string, string>>  $cards
     * @return array<int, array<string, string>>
     */
    private function rewriteCards(array $cards): array
    {
        $out = [];
        foreach ($cards as $c) {
            $out[] = [
                'image_top'    => UrlRewriter::image((string) ($c['image_top'] ?? '')),
                'title'        => (string) ($c['title'] ?? ''),
                'description'  => (string) ($c['description'] ?? ''),
                'href'         => UrlRewriter::local(trim((string) ($c['href'] ?? '#'))),
                'image_bottom' => UrlRewriter::image((string) ($c['image_bottom'] ?? '')),
            ];
        }

        return $out;
    }
}
