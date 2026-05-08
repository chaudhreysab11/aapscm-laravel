<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/online-courses/ for WP parity.
 *
 * Page anatomy: hero banner, "Buy Exams & Course Materials" intro, "Learn,
 * Earn and Advance" subheading, then a 3-column grid of 35 certification
 * exam products. Each product shows abbreviation, full title, member/
 * non-member pricing, and two CTA buttons.
 *
 * All product data stored in page_data JSON for admin editability.
 */
class OnlineCoursesPageSeeder extends Seeder
{
    public function run(): void
    {
        $cards = $this->loadCards();

        $pageData = [
            'hero' => [
                'heading' => 'Online Courses',
                'lead'    => 'We offer online courses in every area of procurement, supply chain and tourism program management skill development.',
            ],
            'buy_exams' => [
                'heading' => "Buy Exams & Course Materials",
                'lead'    => "We offer online courses in every area of procurement, supply chain and tourism program management skill development. Maintain your AAPSCM\u{00ae} certification status. Or, prepare for the AAPSCM\u{00ae} with our online courses anytime, anywhere on your schedule.",
            ],
            'learn_advance' => [
                'heading' => "Learn, Earn and Advance with Our Online AAPSCM\u{00ae} Programs",
                'lead'    => "All courses are industry-leading quality\u{2014}and all count for Professional Development or Continuing Education for recertifications",
            ],
            'cards' => $cards,
        ];

        Page::updateOrCreate(
            ['slug' => 'online-courses'],
            [
                'title'            => 'Online Courses',
                'content'          => null,
                'excerpt'          => "Browse AAPSCM\u{00ae} online certification exams and course materials \u{2014} 35 programs covering procurement, supply chain, tourism, e-commerce and AI.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Online Courses \u{2013} AAPSCM\u{00ae}",
                'meta_description' => "Buy AAPSCM\u{00ae} certification exam prep and course materials online. 35 programs at $399 each covering procurement, supply chain, cybersecurity, AI, tourism and e-commerce.",
                'show_in_nav'      => false,
            ],
        );
    }

    /**
     * Loads the parsed product card catalog.
     * Rewrites member/non-member hrefs to local paths.
     */
    private function loadCards(): array
    {
        $path = database_path('seeders/data/online_courses_cards.php');
        $raw = require $path;

        $cards = [];
        foreach ($raw as $card) {
            $cards[] = [
                'abbrev'           => (string) ($card['abbrev'] ?? ''),
                'title'            => (string) ($card['title'] ?? ''),
                'member_price'     => (string) ($card['member_price'] ?? '399.00'),
                'non_member_price' => (string) ($card['non_member_price'] ?? '399.00'),
                'member_href'      => UrlRewriter::local((string) ($card['member_href'] ?? '#')),
                'non_member_href'  => UrlRewriter::local((string) ($card['non_member_href'] ?? '#')),
            ];
        }

        return $cards;
    }
}