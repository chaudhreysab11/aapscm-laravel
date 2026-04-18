<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/professional-development/ for WP parity.
 * Split hero with grad-cap artwork and istock photo, three alternating
 * image-and-copy rows (At AAPSCM, library, significant discount) separated
 * by pattern dividers, and a 2-up banner linking to Books and Seminars/Courses.
 */
class ProfessionalDevelopmentPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image_left'  => '/storage/cms-images/2023/04/png-transparent-square-academic-cap-graduation-ceremony-graduation-cap-blue-angle-hat-2.png',
                'image_right' => '/storage/cms-images/2023/04/istockphoto-1353046641-170667a-2.jpg',
                'heading'     => 'Professional Development',
                'cta_label'   => 'Join Today',
                'cta_url'     => '/membership-plans/',
            ],

            'badge_band' => [
                'image'     => '/storage/cms-images/2023/04/png-transparent-square-academic-cap-graduation-ceremony-graduation-cap-blue-angle-hat-2.png',
                'cta_label' => 'Register Now',
                'cta_url'   => '/membership-plans/',
            ],

            'rows' => [
                [
                    'heading'   => 'At AAPSCM®',
                    'body'      => 'At AAPSCM® we offer a variety of useful materials including online training for purchasing agents and procurement training books to help you become the best purchasing agent you can be.',
                    'image'     => '/storage/cms-images/2023/04/pexels-andrea-piacquadio-3769021-scaled-2-1024x683.jpg',
                    'cta_label' => 'Join Now',
                    'cta_url'   => '/membership-plans/',
                ],
                [
                    'heading'   => 'library of procurement training books',
                    'body'      => 'Our extensive library of procurement training books cover a number of topics that will be helpful for anyone in the business. Our purchasing agent training seminars and courses can also be purchased through our website.',
                    'image'     => '/storage/cms-images/2023/04/pretty-teen-girl-sitting-table-with-laptopstudying-1.jpg',
                    'cta_label' => 'Join Now',
                    'cta_url'   => '/book/',
                ],
                [
                    'heading'   => 'significant discount',
                    'body'      => "Members receive a significant discount on our training for buyers and purchasing agents. So, if you are a member, please log in to see member prices. If you aren't a member and are seeking to advance your career in procurement, sign up today to access our member discount as well as the numerous resources available for members only.",
                    'image'     => '/storage/cms-images/2023/04/pexels-andrea-piacquadio-3769021-scaled-1-1-1024x683.jpg',
                    'cta_label' => 'Process now',
                    'cta_url'   => '/membership-plans/',
                ],
            ],

            'banner' => [
                [
                    'title'    => 'Books',
                    'subtitle' => 'We have a large library of books to help you excel',
                    'cta_url'  => '/book/',
                ],
                [
                    'title'    => 'Seminars/Courses',
                    'subtitle' => 'Continue learning with our large selection of e-courses',
                    'cta_url'  => '/seminars-courses/',
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'professional-development'],
            [
                'title'            => 'Professional Development',
                'content'          => null,
                'excerpt'          => 'AAPSCM® Professional Development — training materials, procurement books, seminars, and member discounts to advance your career.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Professional Development | AAPSCM',
                'meta_description' => 'Grow your procurement and supply-chain career with AAPSCM® professional development: online training, books, seminars, and exclusive member pricing.',
                'show_in_nav'      => true,
            ],
        );
    }
}
