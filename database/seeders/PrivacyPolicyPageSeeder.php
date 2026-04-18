<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/privacy-policy-legal/ for WordPress parity.
 * Long-form legal page with tables — body HTML lives in database/seeders/data/privacy_policy_body.php.
 */
class PrivacyPolicyPageSeeder extends Seeder
{
    public function run(): void
    {
        $bodyHtml = require database_path('seeders/data/privacy_policy_body.php');

        $pageData = [
            'hero_heading' => 'Privacy Policy / Legal Terms',
            'intro'        => 'This policy describes how The American Association of Procurement, Supply Chain and Tourism Management Professionals — otherwise known as the American Association of Procurement and Supply Chain Management ("AAPSCM®") — collects, uses, and shares personal information.',
            'toc'          => [
                ['label' => 'Types of Information We Collect',    'anchor' => 'types-of-information'],
                ['label' => 'Use and Processing of Information',  'anchor' => 'use-and-processing'],
                ['label' => 'Sharing of Information',             'anchor' => 'sharing-of-information'],
                ['label' => 'Your Choices',                       'anchor' => 'your-choices'],
                ['label' => 'How We Protect Personal Information','anchor' => 'how-we-protect'],
                ['label' => 'Miscellaneous',                      'anchor' => 'miscellaneous'],
                ['label' => 'Contact Information',                'anchor' => 'contact-information'],
            ],
            'body_html'    => $bodyHtml,
        ];

        Page::updateOrCreate(
            ['slug' => 'privacy-policy-legal'],
            [
                'title'            => 'Privacy Policy / Legal',
                'content'          => null,
                'excerpt'          => 'How AAPSCM® collects, uses, shares, and protects your personal information.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'legal_full_width',
                'page_data'        => $pageData,
                'meta_title'       => 'Privacy Policy & Legal Terms | AAPSCM',
                'meta_description' => 'How AAPSCM® collects, uses, shares, and protects your personal information.',
                'show_in_nav'      => true,
            ],
        );
    }
}
