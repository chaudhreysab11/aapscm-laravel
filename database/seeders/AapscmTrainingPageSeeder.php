<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/aapscm-training/ for WP parity.
 *
 * Page anatomy: hero intro, why-choose + key features, upcoming opportunities
 * (advocate + earn PDCs), save-the-date 2025/2026, contact CTA, and a
 * 2-column training-schedule grid with 35 cards.
 *
 * All section text is stored in page_data JSON for admin editability.
 */
class AapscmTrainingPageSeeder extends Seeder
{
    public function run(): void
    {
        $cards = $this->loadCards();

        $pageData = [
            'hero' => [
                'heading' => "AAPSCM\u{00ae} Training",
                'lead'    => "AAPSCM\u{00ae} Training provides a wide range of courses that are customized to meet your specific training needs. These courses are available in both in-person and virtual formats. Our main focus is on nurturing your professional development in project management and cultivating your AAPSCM Talent, which encompasses proficiency in Ways of Working, Power Skills, Business Acumen, and digital skills. As the landscape continues to evolve, AAPSCM\u{00ae} Training consistently expands its learning offerings to meet the demands of our dynamic environment.",
            ],
            'why_choose' => [
                'heading' => "Why Choose AAPSCM\u{00ae} Training",
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Untitled-2-2.png'),
                'lead'    => "Whether you\u{2019}re looking to enhance leadership abilities, master project execution, or adopt agile methodologies, AAPSCM\u{00ae} Training provides an exceptional learning experience. Designed by industry experts, our sessions foster interactive engagement in small groups, offering both in-person and live virtual instructor-led options.",
                'features_heading' => 'Key Features',
                'features' => [
                    'Over 100 courses spanning various disciplines.',
                    'Flexible learning formats, including live virtual training scheduled at your convenience.',
                    'Virtual sessions run over four days, with two hours per day, ensuring a manageable and effective learning experience.',
                    'Courses delivered in English unless otherwise specified.',
                ],
            ],
            'upcoming' => [
                'heading' => 'Upcoming Opportunities:',
                'lead'    => "Explore the AAPSCM\u{00ae} Training Catalog to discover programs aligned with your professional goals. Our offerings are continuously updated, so be sure to check back regularly for the latest options.",
                'boxes'   => [
                    [
                        'heading' => 'Advocate for Your Attendance',
                        'text'    => 'Engage in real-time, interactive training sessions and earn up to 24 PDCs, contributing directly to your professional growth and certification maintenance.',
                    ],
                    [
                        'heading' => 'Earn Professional Development Chapters (PDCs)',
                        'text'    => 'We are excited to announce the release of training schedules for 2024 and 2025! Choose from live virtual training sessions or attend in-person events to suit your schedule and preferences.',
                    ],
                ],
            ],
            'save_the_date' => [
                'heading' => 'Save the Date for 2025 and 2026',
                'lead'    => 'We are excited to announce the release of training schedules for 2024 and 2025! Choose from live virtual training sessions or attend in-person events to suit your schedule and preferences.',
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/home-about.jpg'),
                'highlights_heading' => 'Exciting Highlights for 2025:',
                'highlights' => [
                    'Live Virtual Instructor-Led Training: Flexible, engaging, and scheduled to accommodate your availability.',
                    'Expanded courses in fields like digital transformation, AI integration, and sustainable practices.',
                    'Enhanced virtual platforms for seamless online learning.',
                    'Global in-person events with unparalleled networking opportunities.',
                ],
            ],
            'contact_cta' => [
                'text'  => "For additional details or inquiries, please contact us at info@aapscm.org. Join us at AAPSCM\u{00ae} Training and take the next step in your professional journey. Together, let\u{2019}s shape the future of procurement, supply chain, and tourism management!",
                'email' => 'info@aapscm.org',
            ],
            'schedule_heading' => 'We are pleased to announce the dates for 2025 are now listed below.',
            'cards' => $cards,
        ];

        Page::updateOrCreate(
            ['slug' => 'aapscm-training'],
            [
                'title'            => "AAPSCM\u{00ae} Training",
                'content'          => null,
                'excerpt'          => "Browse upcoming AAPSCM\u{00ae} instructor-led virtual training sessions for 2025 \u{2014} procurement, supply chain, tourism, e-commerce and AI credentials.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "AAPSCM\u{00ae} Training \u{2013} Instructor-Led Virtual & In-Person Sessions",
                'meta_description' => "Explore AAPSCM\u{00ae}\u{2019}s 2025 training schedule \u{2014} 35 instructor-led virtual courses covering procurement, supply chain, cybersecurity, AI, tourism and e-commerce certifications.",
                'show_in_nav'      => false,
            ],
        );
    }

    /**
     * Loads the parsed training card catalog.
     *
     * All remote URLs are rewritten to local /storage/cms-images paths.
     * Training-page hrefs are kept as-is after UrlRewriter::local().
     */
    private function loadCards(): array
    {
        $path = database_path('seeders/data/aapscm_training_cards.php');
        /** @var array<int, array<string, string>> $raw */
        $raw = require $path;

        $cards = [];
        foreach ($raw as $card) {
            $cards[] = [
                'title' => (string) ($card['title'] ?? ''),
                'image' => UrlRewriter::image((string) ($card['image'] ?? '')),
                'href'  => UrlRewriter::local((string) ($card['href'] ?? '#')),
            ];
        }

        return $cards;
    }
}
