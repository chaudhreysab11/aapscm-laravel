<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/training-school-affiliated/ for WordPress parity.
 * Grid of 12 training-school affiliates (each linking to the AAPSCM testing
 * platform with program + affiliation query params), one non-linked school,
 * a "Non-Affiliate" tile, and an "Individual Registration" CTA.
 */
class TrainingSchoolAffiliatedPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading'    => 'Training School Affiliated',
                'subheading' => 'Click on the Training School Affiliated',
            ],

            'schools' => [
                [
                    'name'  => 'University of Maryland Eastern Shores',
                    'image' => '/storage/cms-images/2023/10/1-6.png',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=actp&affiliation=univ_of_maryland.png',
                ],
                [
                    'name'  => 'University of South Carolina Upstate',
                    'image' => '/storage/cms-images/2023/10/2-4.png',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=actp&affiliation=univ_of_south_carolina_upstate.png',
                ],
                [
                    'name'      => 'University of Texas, Austin',
                    'name_html' => 'University of Texas,<br> Austin',
                    'image'     => '/storage/cms-images/2023/10/3-4.png',
                    'url'       => 'https://testingplatform.aapscm.org/signin/index?program=acpm&affiliation=univ_of_texas_dallas.jpg',
                ],
                [
                    'name'  => 'University of Texas, Dallas',
                    'image' => '/storage/cms-images/2023/10/4.jpg',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=acpm&affiliation=univ_of_texas_dallas.jpg',
                ],
                [
                    'name'  => 'Northwestern University, Evanston IL',
                    'image' => '/storage/cms-images/2023/10/5-4.png',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=actp&affiliation=northwestern_univ.png',
                ],
                [
                    'name'  => 'University of Chicago',
                    'image' => '/storage/cms-images/2023/10/6-4.png',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=acscp&affiliation=univ_of_chicago.png',
                ],
                [
                    'name'  => 'Lewis University, IL',
                    'image' => '/storage/cms-images/2023/10/7-3.png',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=actp&affiliation=lewis_univ.png',
                ],
                [
                    'name'  => 'Harvard Business School',
                    'image' => '/storage/cms-images/2023/10/8-2.png',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=acpm&affiliation=harvard_business_school.png',
                ],
                [
                    'name'  => 'London Business School, UK',
                    'image' => '/storage/cms-images/2023/10/9-2.png',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=acscp&affiliation=london_business_school.png',
                ],
                [
                    'name'  => 'New York University',
                    'image' => '/storage/cms-images/2023/10/10.jpg',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=acpm&affiliation=new_york_univ.jpg',
                ],
                [
                    'name'  => 'University of California, Davis',
                    'image' => '/storage/cms-images/2023/10/11-2.jpg',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=actp&affiliation=univ_of_california_davis.jpg',
                ],
                [
                    'name'  => 'Kafaat Competencies Skills Training Company',
                    'image' => '/storage/cms-images/2025/07/Image.png',
                    'url'   => 'https://testingplatform.aapscm.org/signin/index?program=actm&affiliation=silver_ivory.png',
                ],
                [
                    'name'  => 'United Education, Sharjah, UAE',
                    'image' => '/storage/cms-images/2023/12/1-1.png',
                    'url'   => null,
                ],
            ],

            'footer' => [
                'non_affiliate_url'   => '/my-account/',
                'non_affiliate_label' => 'Non-Affiliate',
                'cta_label'           => 'Individual Registration',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'training-school-affiliated'],
            [
                'title'            => 'Training School Affiliated',
                'content'          => null,
                'excerpt'          => 'AAPSCM® training-school affiliates — click on a partner institution to sign in to the testing platform.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Training School Affiliated | AAPSCM',
                'meta_description' => 'AAPSCM® testing platform affiliates — University of Maryland, UT Austin/Dallas, Northwestern, Chicago, Harvard, NYU, UC Davis, and more.',
                'show_in_nav'      => true,
            ],
        );
    }
}
