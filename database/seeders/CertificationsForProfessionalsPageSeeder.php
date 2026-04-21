<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/certifications-for-professionals/ for WP parity.
 *
 * Sections: theme title bar, intro (4 icon-bullets), portfolio heading,
 * 35 main certification cards + AI Courses sub-heading + 14 AI cards
 * (continuous 2-col grid), portfolio recap, 3-col stats, "Target your Skills"
 * 2-col block (3 check-bullets), Affiliate Partners carousel.
 */
class CertificationsForProfessionalsPageSeeder extends Seeder
{
    public function run(): void
    {
        [$mainCards, $aiCards] = $this->loadCards();

        $pageData = [
            'intro' => [
                'heading' => 'Certifications for Supply Chain, Procurement, Logistics and Tourism Professional',
                'lead'    => "Develop your skills and competencies in Supply Chain, Procurement and Tourism management skills with any of AAPSCM\u{00ae} qualification; improve and validate your competence and the value you bring to your organization and the Industry.",
                'icon'    => '/storage/cms-images/2023/10/icon.png',
                'bullets' => [
                    "Designed by industry experts, highly relevant in today\u{2019}s supply chain marketplace",
                    "Globally recognized \u{2013} certification delivered in over 15+ countries and still growing",
                    'Aligned with the leading industry skills framework and with ISO standardization requirement.',
                    'Built on our non-commercialized reputation for exam quality, integrity and impartiality',
                ],
            ],
            'portfolio_heading' => 'Our professional certifications portfolio',
            'main_cards'        => $mainCards,
            'ai_heading'        => 'AI Courses',
            'ai_cards'          => $aiCards,
            'recap' => [
                'heading' => 'Our professional certifications portfolio',
                'lead'    => "You\u{2019}ll find our qualifications delivered and recognized in more countries around the world so you really can go further when you are AAPSCM\u{00ae} certified!",
            ],
            'stats' => [
                [
                    'big'     => '15+',
                    'small'   => 'Certifications',
                    'sub_big' => '15+',
                    'sub'     => 'Certifications in different program areas relating to Procurement, Supply Chain and Tourism Management',
                ],
                [
                    'big'     => '3,000',
                    'small'   => 'Exams delivered in last 3 years',
                    'sub_big' => 'Developed by Experts and Professors in the Field',
                    'sub'     => "Take your Supply Chain career to the next level with AAPSCM\u{00ae} professional certification. Developed in collaboration with leading experts, Professors and employers, our training programs with our affiliate partners help you to sharpen your supply chain skills focus and apply your",
                ],
                [
                    'big'     => '150+',
                    'small'   => 'Professional Members: Earn your degree with our certifications',
                    'sub_big' => 'Earn your degree with our certifications',
                    'sub'     => 'From AI-based manufacturing and distribution to real-time tracking and data analytics, the 21st century supply chain is driven by technological innovations—and transformational change.',
                ],
            ],
            'target_skills' => [
                'image'   => '/storage/cms-images/2023/09/HERO-Data-Analyst-Career-Path.webp',
                'heading' => 'Target your Procurement, Supply Chain, Tourism, Healthcare/Medical Procurement Management Skills',
                'lead'    => 'Transformational change calls for transformational leaders. Prepare yourself to maximize productivity and performance within your organization and lead the supply chain of the future and allowing you to:',
                'bullets' => [
                    'Target the skill sets and knowledge you want to gain',
                    'Focus on the areas that best align with your goals',
                    'Choose the programs that meet your professional need',
                ],
            ],
            'partners' => [
                'heading' => 'Our Affiliate Partners',
                // Same 13-logo set as the homepage footer carousel.
                'logos'   => [
                    '/storage/cms-images/2023/10/1-1-150x150.png',
                    '/storage/cms-images/2023/10/2-1-150x150.png',
                    '/storage/cms-images/2023/10/3-1-150x150.png',
                    '/storage/cms-images/2023/10/4-1-150x150.png',
                    '/storage/cms-images/2023/10/5-150x150.png',
                    '/storage/cms-images/2023/10/6-150x150.png',
                    '/storage/cms-images/2023/10/7-150x150.png',
                    '/storage/cms-images/2023/10/8-150x150.png',
                    '/storage/cms-images/2023/10/9-150x150.png',
                    '/storage/cms-images/2023/10/10-150x150.png',
                    '/storage/cms-images/2023/10/11-150x150.png',
                    '/storage/cms-images/2025/07/5-150x150-1.png',
                    '/storage/cms-images/2025/08/1-1-150x150.png',
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'certifications-for-professionals'],
            [
                'title'            => 'Certifications for Professionals',
                'content'          => null,
                'excerpt'          => "AAPSCM\u{00ae} certifications for procurement, supply chain, logistics and tourism professionals \u{2014} including AI-focused credentials.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Certifications for Professionals - AAPSCM\u{00ae}",
                'meta_description' => 'Explore the full AAPSCM® certifications portfolio across procurement, supply chain, logistics, tourism, e-commerce and AI — globally recognized credentials developed by industry experts.',
                'show_in_nav'      => false,
            ],
        );
    }

    /**
     * Loads the parsed card catalog and splits it into the two display groups.
     *
     * Source: database/seeders/data/certifications_for_professionals_cards.php
     * (generated by extract_certifications_for_professionals.php).
     *
     * - Card 0 ("Testing Overview") is a sidebar leftover → filtered out.
     * - Cards 1–35 = main portfolio.
     * - Cards 36–49 = AI Courses sub-section (continuous grid, separate heading).
     *
     * All remote URLs are rewritten to local /storage/cms-images paths.
     * Broken source links (/hyperlink-1/, #) are preserved so visual parity is
     * maintained; they are annotated in the data file but not filtered here.
     */
    private function loadCards(): array
    {
        $path = database_path('seeders/data/certifications_for_professionals_cards.php');
        /** @var array<int, array<string, string|null>> $raw */
        $raw = require $path;

        // Drop the "Testing Overview" noise card (sidebar leftover).
        $raw = array_values(array_filter(
            $raw,
            static fn (array $c): bool => ($c['title'] ?? '') !== 'Testing Overview',
        ));

        $main = [];
        $ai   = [];

        // After removing card 0, indices 0–34 map to main, 35–48 to AI Courses.
        foreach ($raw as $i => $c) {
            $normalized = [
                'title' => (string) ($c['title'] ?? ''),
                'desc'  => (string) ($c['desc']  ?? ''),
                'href'  => UrlRewriter::local((string) ($c['href']  ?? '#')),
                'image' => UrlRewriter::image((string) ($c['top_image']   ?? '')),
                'badge' => UrlRewriter::image((string) ($c['badge_image'] ?? '')),
            ];

            if ($i < 35) {
                $main[] = $normalized;
            } else {
                $ai[] = $normalized;
            }
        }

        return [$main, $ai];
    }
}
