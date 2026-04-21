<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Seeds https://aapscm.org/fellow-membership-form/
 *
 * Multi-section application form for all 7 Fellow membership tiers. The form
 * is rendered by FellowMembershipApplicationController + a dedicated Blade
 * template; this Page record provides SEO metadata and CMS integration.
 */
class FellowMembershipFormPageSeeder extends Seeder
{
    public function run(): void
    {
        Page::updateOrCreate(
            ['slug' => 'fellow-membership-form'],
            [
                'title'            => 'Membership Application Form',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Apply for AAPSCM® Fellow Membership across all seven tiers — Grand, Specialist, Professional, Academic, Corporate, Emerging Leader, and International.',
                'page_data'        => [],
                'meta_title'       => "Membership Application Form - AAPSCM\u{00ae}",
                'meta_description' => 'Apply for AAPSCM® Fellow Membership. Complete the multi-section application form covering personal, professional, qualifications, and payment details.',
                'show_in_nav'      => false,
            ],
        );
    }
}
