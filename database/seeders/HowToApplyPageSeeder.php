<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/how-to-apply/ for WordPress parity.
 * Live page is a two-column Elementor section: hero image on the left, "How to
 * Apply" heading + WPCF7 application form on the right (name, email, phone,
 * upload CV, message, captcha, Submit Now).
 */
class HowToApplyPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero_image'    => '/storage/cms-images/2024/12/Untitled-2-4.png',
            'hero_heading'  => 'How to <span class="font-semibold">Apply</span>',
            'intro'         => 'Interested in becoming an AAPSCM® certified professional? Complete the form below and attach your CV — our team will follow up with application details and eligibility requirements.',
            'form'          => [
                'submit_label' => 'Submit Now',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'how-to-apply'],
            [
                'title'            => 'How to Apply',
                'content'          => null,
                'excerpt'          => 'Apply for AAPSCM® certification. Submit your details and CV to get started.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'How to Apply | AAPSCM',
                'meta_description' => 'Apply for AAPSCM® certification. Submit your details and CV to begin the application process.',
                'show_in_nav'      => true,
            ],
        );
    }
}
