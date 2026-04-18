<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/certifications-faq/ for WordPress parity.
 * Elementor page with six FAQ accordion sections (General Questions,
 * Application and Registration, Training and Preparation, Exam Information,
 * Certification and Maintenance, Support and Resources) plus a closing CTA.
 * Body content lives in database/seeders/data/certifications_faq_data.php.
 */
class CertificationsFaqPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = require database_path('seeders/data/certifications_faq_data.php');

        Page::updateOrCreate(
            ['slug' => 'certifications-faq'],
            [
                'title'            => 'Certifications FAQ',
                'content'          => null,
                'excerpt'          => 'Frequently asked questions about AAPSCM® certifications, applications, training, exams, and renewals.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Certifications FAQ | AAPSCM',
                'meta_description' => 'Answers to common questions about AAPSCM® certifications — eligibility, application, training, exams, renewal, and support.',
                'show_in_nav'      => true,
            ],
        );
    }
}
