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
        // Architect directive (2026-04-20): board member records moved to the
        // board_members table (single source of truth). See BoardMembersSeeder.
        // This seeder now only owns the page shell (headings + meta).
        $pageData = [
            'page_heading' => "AAPSCM\u{00ae} Board and Executives",
            'section_heading' => 'Council Board & Administration',
        ];

        Page::updateOrCreate(
            ['slug' => 'board-of-directors'],
            [
                'title' => 'Board of Directors',
                'content' => null,
                'excerpt' => "AAPSCM\u{00ae} Council Board and Administration \u{2014} executives, advisors, and regional directors leading the Society.",
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Board of Directors | AAPSCM',
                'meta_description' => "Meet the AAPSCM\u{00ae} Council Board and Administration \u{2014} chair, legal, certifications, training, finance, and regional leadership.",
                'show_in_nav' => true,
            ],
        );
    }
}
