<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Seeds the US Charters page. Routed by CmsPageController::SLUG_VIEWS
 * to resources/views/cms/page/us-charters.blade.php.
 *
 * Chapter data lives in database/seeders/data/us_charters_data.php.
 */
class UsChartersPageSeeder extends Seeder
{
    public function run(): void
    {
        $extracted = require database_path('seeders/data/us_charters_data.php');

        $pageData = [
            'hero_heading' => 'US Chapters',
            'join_chapter_cta' => [
                'label' => 'Join A Chapter',
                'url'   => '/checkout/?add-to-cart=38096',
            ],
            'intro_heading' => 'American Association of Procurement, Supply Chain & Tourism Management (AAPSCM®) Chapter Descriptions, Objectives, and Functionalities',
            'chapters'           => $extracted['chapters'],
            'short_descriptions' => $extracted['short_descriptions'],
        ];

        Page::updateOrCreate(
            ['slug' => 'us-charters'],
            [
                'title'            => 'US Charters',
                'content'          => null,
                'excerpt'          => 'AAPSCM® chapters across the United States — descriptions, objectives, and functionalities.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'US Charters | AAPSCM',
                'meta_description' => 'Overview of AAPSCM® US chapters — Chicago, Atlanta, Baltimore, Columbia SC, Spartanburg SC, Dallas TX, Rockford IL, Boston MA, and New York City.',
                'show_in_nav'      => true,
            ],
        );
    }
}
