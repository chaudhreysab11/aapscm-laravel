<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/board-of-directors/ for WP parity.
 * Two heading bands ("AAPSCM® Board and Executives" + "Council Board & Administration")
 * followed by a 3-column grid of profile cards (image → name → role → affiliation).
 */
class BoardOfDirectorsPageSeeder extends Seeder
{
    public function run(): void
    {
        $members = [
            [
                'name'        => 'Dr. Sandra Grouse',
                'href'        => '/board-of-directors-dr-sandra-grouse/',
                'image'       => '/storage/cms-images/2023/10/1-4.png',
                'role'        => 'Executive Board Chair',
                'affiliation' => "Chief Executive Vice President, Chicago Solutions Inc.\nSchaumburg, IL USA",
            ],
            [
                'name'        => 'Tracy McKinnis',
                'href'        => '/board-of-directors-tracy-mckinnis/',
                'image'       => '/storage/cms-images/2023/10/8-1.png',
                'role'        => 'Chief Legal Officer',
                'affiliation' => "President and CEO,\nMinimax Distribution, LLC\nNew York, USA",
            ],
            [
                'name'        => 'Dr. Richmond Adebiaye',
                'href'        => '/board-of-directors-dr-richmond-adebiaye/',
                'image'       => '/storage/cms-images/2023/10/7-1.png',
                'role'        => 'Chairman, Advisory Board',
                'affiliation' => "Professor\nUniversity of South Carolina Upstate\nSpartanburg, SC USA",
            ],
            [
                'name'        => 'Dr. Mark Pieffer',
                'href'        => '/board-of-directors-dr-mark-pieffer/',
                'image'       => '/storage/cms-images/2023/10/6-2.png',
                'role'        => 'Executive Director, Certifications',
                'affiliation' => "Associate Dean, School of Business\nJones International University, CO USA",
            ],
            [
                'name'        => 'Dr. Theophilus Owusu',
                'href'        => '/board-of-directors-dr-theophilus-owusu/',
                'image'       => '/storage/cms-images/2023/10/5-2.png',
                'role'        => 'Board Executive Director, Affiliate Partners Unit',
                'affiliation' => "Professor,\nKeiser University, FL USA",
            ],
            [
                'name'        => 'Dr. Ronald Kisega',
                'href'        => '/board-of-directors-dr-ronald-kisega/',
                'image'       => '/storage/cms-images/2023/10/4-3.png',
                'role'        => 'Director of Operations, Testing',
                'affiliation' => "Professor,\nNorthwestern University, IL USA",
            ],
            [
                'name'        => 'Dr. Haroun Alryalat',
                'href'        => '/board-of-directors-dr-haroun-alrylat/',
                'image'       => '/storage/cms-images/2023/10/33.png',
                'role'        => 'Global Advisory Council Member',
                'affiliation' => "Associate Professor\nUniversity of Bahrain",
            ],
            [
                'name'        => 'Dr. Jason Matyus',
                'href'        => '/board-of-directors-dr-jason-matyus/',
                'image'       => '/storage/cms-images/2023/10/22-1.png',
                'role'        => 'Advisory Board Executive Director, Training, Course Development, and Examination',
                'affiliation' => null,
            ],
            [
                'name'        => 'Jonathan Akisanmi',
                'href'        => '/board-of-directors-jonathan-akisanmi/',
                'image'       => '/storage/cms-images/2023/10/33.jpg',
                'role'        => 'Director of Finance & Chief Financial Officer (CFO)',
                'affiliation' => null,
            ],
            [
                'name'        => 'James Raussen',
                'href'        => '/james-raussen/',
                'image'       => '/storage/cms-images/2025/04/trainer-img-1.png',
                'role'        => "AAPSCM\u{00ae} Executive Trainer, Key Speaker & Strategic Advisor",
                'affiliation' => null,
            ],
            [
                'name'        => 'Gleb Mikulich',
                'href'        => '/gleb-mikulich/',
                'image'       => '/storage/cms-images/2024/12/22-1.png',
                'role'        => 'Expertise in supply chain, procurement, logistics, and digital transformation.',
                'affiliation' => null,
            ],
            [
                'name'        => 'Mohamed Aboelela',
                'href'        => '/mohamed-aboelela/',
                'image'       => '/storage/cms-images/2026/04/31f9d6eb-c108-439c-8097-cdb3149edab6-200x300.jpeg',
                'role'        => "Director of Strategic Operations \u{2013} MENA at AAPSCM\u{00ae}",
                'affiliation' => null,
            ],
            [
                'name'        => 'Mohammed Zul Jamal',
                'href'        => '/mohammed-zul-jamal/',
                'image'       => '/storage/cms-images/2026/04/WhatsApp-Image-2026-04-16-at-22.13.01-233x300.jpeg',
                'role'        => 'REGIONAL PR MANAGER (MENA Region)',
                'affiliation' => null,
            ],
        ];

        $pageData = [
            'page_heading'    => "AAPSCM\u{00ae} Board and Executives",
            'section_heading' => 'Council Board & Administration',
            'members'         => $members,
        ];

        Page::updateOrCreate(
            ['slug' => 'board-of-directors'],
            [
                'title'            => 'Board of Directors',
                'content'          => null,
                'excerpt'          => "AAPSCM\u{00ae} Council Board and Administration \u{2014} executives, advisors, and regional directors leading the Society.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Board of Directors | AAPSCM',
                'meta_description' => "Meet the AAPSCM\u{00ae} Council Board and Administration \u{2014} chair, legal, certifications, training, finance, and regional leadership.",
                'show_in_nav'      => true,
            ],
        );
    }
}
