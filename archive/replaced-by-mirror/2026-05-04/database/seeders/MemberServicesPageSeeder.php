<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/member-services/ for WP parity.
 * Landing hub of four membership service cards — Professional Development,
 * Career Center, USA Chapters Registration, and Learning and Development Hub —
 * each with an icon, short copy, and Read-more button.
 */
class MemberServicesPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Membership services',
            ],

            'cards' => [
                [
                    'icon'     => '/storage/cms-images/2023/10/1icon.png',
                    'title'    => 'Professional Development',
                    'body'     => 'At AAPSCM® we offer a variety of useful materials including online training for purchasing agents and procurement training books to help you become the best purchasing agent you can be.',
                    'cta_url'  => '/professional-development/',
                    'cta_label'=> 'Read more',
                ],
                [
                    'icon'     => '/storage/cms-images/2023/10/icon-3.png',
                    'title'    => 'Career Center',
                    'body'     => 'Job hunters can easily send their resume to employer job postings for careers in purchasing with a single click of a button!',
                    'cta_url'  => '/career-center/',
                    'cta_label'=> 'Read more',
                ],
                [
                    'icon'     => '/storage/cms-images/2023/10/icon-2.png',
                    'title'    => 'USA Chapters Registration',
                    'body'     => "As a AAPSCM\u{00ae} member, you\u{2019}ll gain exclusive access to AAPSCM\u{00ae} publications and global standards. In addition, leverage thousands of tools, templates, articles, guides and other resources to keep you informed and remain efficient.",
                    'cta_url'  => '/us-charters/',
                    'cta_label'=> 'Read more',
                ],
                [
                    'icon'     => '/storage/cms-images/2023/10/icon-4-2.png',
                    'title'    => 'Learning and Development Hub',
                    'body'     => "Over 56% of employers request AAPSCM\u{00ae} or studying towards it when recruiting \u{2013} AAPSCM\u{00ae} Procurement Salary Guide 2023",
                    'cta_url'  => '/learning-and-development-hub/',
                    'cta_label'=> 'Read more',
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'member-services'],
            [
                'title'            => 'Membership Services',
                'content'          => null,
                'excerpt'          => 'AAPSCM® membership services — Professional Development, Career Center, USA Chapters Registration, and the Learning and Development Hub.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Membership Services | AAPSCM',
                'meta_description' => 'Discover AAPSCM® membership services: professional development resources, career center, USA chapter registration, and learning & development hub.',
                'show_in_nav'      => true,
            ],
        );
    }
}
