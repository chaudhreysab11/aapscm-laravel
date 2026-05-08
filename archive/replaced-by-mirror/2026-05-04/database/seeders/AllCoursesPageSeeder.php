<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/all-courses/ for WP parity.
 *
 * Sections: intro (H3 + H5 lead), 5 certification category sections
 * (Procurement 15, Supply Chain 12, Tourism 3, E-Commerce 5, AI 13),
 * each in a 4-column card grid. No stats/recap/target sections.
 */
class AllCoursesPageSeeder extends Seeder
{
    private const SECTION_ORDER = [
        'Procurement Certifications',
        'Supply Chain certifications',
        'Tourism Management',
        'E-Commerce Management & Administration',
        'AI courses',
    ];

    public function run(): void
    {
        $sections = $this->loadSections();

        $pageData = [
            'intro' => [
                'heading' => 'Certifications',
                'lead'    => "We offer various certifications that recognize knowledge and competency for our Procurement, Supply Chain and Tourism Management Professionals representing both professionals and managers skills \u{201c}(AAPSCM)\u{00ae} certifications\u{201d}, Salaries and career opportunities for AAPSCM\u{00ae} members show that employers recognize the value delivered by trained practitioners.",
            ],
            'sections' => $sections,
        ];

        Page::updateOrCreate(
            ['slug' => 'all-courses'],
            [
                'title'            => 'All Courses',
                'content'          => null,
                'excerpt'          => "Browse all AAPSCM\u{00ae} certification courses \u{2014} procurement, supply chain, tourism, e-commerce and AI credentials.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "All Courses - AAPSCM\u{00ae}",
                'meta_description' => 'Explore the full catalog of AAPSCM\u{00ae} certification courses across procurement, supply chain, tourism, e-commerce and AI \u{2014} globally recognised credentials developed by industry experts.',
                'show_in_nav'      => false,
            ],
        );
    }

    /**
     * Loads the parsed card catalog and groups it into display sections.
     *
     * Source: database/seeders/data/all_courses_cards.php
     *
     * All remote URLs are rewritten to local /storage/cms-images paths.
     * /course/{slug}/ links are stripped to /{slug}/ per migration rules.
     */
    private function loadSections(): array
    {
        $path = database_path('seeders/data/all_courses_cards.php');
        /** @var array<int, array<string, string>> $raw */
        $raw = require $path;

        $grouped = [];
        foreach ($raw as $card) {
            $section = $card['section'] ?? 'Unknown';
            $grouped[$section][] = [
                'title' => (string) ($card['title'] ?? ''),
                'image' => UrlRewriter::image((string) ($card['image'] ?? '')),
                'href'  => $this->rewriteHref((string) ($card['href'] ?? '#')),
            ];
        }

        // Maintain consistent section order.
        $sections = [];
        foreach (self::SECTION_ORDER as $name) {
            if (isset($grouped[$name])) {
                $sections[] = [
                    'heading' => $name,
                    'cards'   => $grouped[$name],
                ];
            }
        }

        return $sections;
    }

    /**
     * Rewrites card hrefs: strips /course/ prefix and normalises to local path.
     */
    private function rewriteHref(string $url): string
    {
        // Strip the /course/ prefix from WP LMS-style URLs.
        $url = (string) preg_replace(
            '#^https?://(?:www\.)?aapscm\.org/course/#',
            'https://aapscm.org/',
            $url,
        );

        return UrlRewriter::local($url);
    }
}
