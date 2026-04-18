<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/professional-member-criteria/ for WordPress
 * parity. Outlines eligibility (experience, work, qualifications) for the
 * Professional member (MBCS) tier plus the US higher education awards that
 * qualify and a CTA to apply.
 */
class ProfessionalMemberCriteriaPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero_heading' => 'Professional Member Criteria',
            'overview'     => [
                'kicker' => 'Experience / Qualifications',
                'lead'   => 'To become an AAPSCM® Professional member (MBCS), you\'ll need to be working or teaching in computing and tech or have relevant qualifications.',
            ],
            'work_experience' => [
                'heading' => 'Work Experience',
                'body'    => 'By working or teaching in computing and tech, we mean being professionally engaged in any aspect of building, maintaining, managing or operating IT — or the teaching / training of these activities. To validate your application you can upload an up-to-date CV and/or LinkedIn URL.',
            ],
            'qualifications' => [
                'heading'  => 'Relevant Qualifications',
                'subheading' => 'United States Higher Education Qualifications',
                'awards'   => [
                    ['name' => 'Honours Degree',                                        'detail' => 'e.g. BSc Hons, MEng Hons'],
                    ['name' => 'Ordinary Degree',                                       'detail' => 'e.g. BSc, BA'],
                    ['name' => 'Masters',                                               'detail' => 'e.g. MSc'],
                    ['name' => 'Doctorate – PhD',                                       'detail' => ''],
                    ['name' => 'Diplomas of higher education, foundation degrees',     'detail' => 'e.g. HNC/HND'],
                    ['name' => 'Higher Education Qualification not gained in the United States', 'detail' => ''],
                ],
                'footer_note' => 'Each case will be considered individually. Guidance on equivalence of the award will be sought through the National Recognition Information Centre for the United States.',
            ],
            'cta' => [
                'heading' => 'Ready to apply?',
                'label'   => 'Become a Professional Member',
                'url'     => '/membership/',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'professional-member-criteria'],
            [
                'title'            => 'Professional Member Criteria',
                'content'          => null,
                'excerpt'          => 'Eligibility criteria — experience, work, and qualifications — for AAPSCM® Professional membership.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Professional Member Criteria | AAPSCM',
                'meta_description' => 'Criteria to join AAPSCM® as a Professional Member — experience, qualifications, and degree equivalents accepted.',
                'show_in_nav'      => true,
            ],
        );
    }
}
