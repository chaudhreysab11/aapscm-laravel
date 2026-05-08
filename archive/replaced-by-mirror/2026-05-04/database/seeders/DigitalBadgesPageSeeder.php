<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/digital-badges/ for WordPress parity.
 * A showcase page: intro about Acclaim (Credly) open badges followed by
 * 5 category grids of badge images (Procurement, Supply Chain, Tourism,
 * E-Commerce, and Combined certifications).
 */
class DigitalBadgesPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Digital Badges',
            ],
            'intro' => [
                'heading'  => 'Yes, you do need a badge',
                'body_1'   => 'An AAPSCM® open badge is a real-time, verifiable visual representation of your AAPSCM® certification. It\'s a quick, easy way to display your achievement on social media, professional networking sites, emails or your personal web site to help peers and potential employers learn more about your credentials. After all, you\'ve worked hard to earn your certification, so why not share this accomplishment with your colleagues?',
                'body_2'   => 'AAPSCM® digital badges are managed by Acclaim (Credly)—an enterprise-class badging platform, providing security and protection to your credentials. Once you achieve certification status, you can display your abilities securely online, share your verifiable achievement with peers and prospective employers, and export them for display on other platforms and social media.',
            ],
            'categories' => [
                [
                    'heading' => 'Procurement Management',
                    'badges'  => [
                        '/storage/cms-images/2025/02/CPM.png',
                        '/storage/cms-images/2025/02/acpp.png',
                        '/storage/cms-images/2025/02/3-1.png',
                        '/storage/cms-images/2025/02/4-1.png',
                        '/storage/cms-images/2025/02/5.png',
                        '/storage/cms-images/2025/02/6-1.png',
                        '/storage/cms-images/2025/02/7-1.png',
                        '/storage/cms-images/2025/02/8-1.png',
                        '/storage/cms-images/2025/02/9-1.png',
                        '/storage/cms-images/2025/02/10.png',
                        '/storage/cms-images/2025/02/11-1.png',
                        '/storage/cms-images/2025/02/12-1.png',
                        '/storage/cms-images/2025/02/13-1.png',
                        '/storage/cms-images/2025/02/14-1.png',
                        '/storage/cms-images/2025/02/15-1.png',
                    ],
                ],
                [
                    'heading' => 'Supply Chain Managment',
                    'badges'  => [
                        '/storage/cms-images/2025/02/1-1.png',
                        '/storage/cms-images/2025/02/2-1.png',
                        '/storage/cms-images/2025/02/3-2.png',
                        '/storage/cms-images/2025/02/4-2.png',
                        '/storage/cms-images/2025/02/5-1.png',
                        '/storage/cms-images/2025/02/6-2.png',
                        '/storage/cms-images/2025/02/7-2.png',
                        '/storage/cms-images/2025/02/8-2.png',
                        '/storage/cms-images/2025/02/9-2.png',
                        '/storage/cms-images/2025/02/10-1.png',
                        '/storage/cms-images/2025/02/11-2.png',
                        '/storage/cms-images/2025/02/12-2.png',
                    ],
                ],
                [
                    'heading' => 'Tourism Management',
                    'badges'  => [
                        '/storage/cms-images/2025/02/1-2.png',
                        '/storage/cms-images/2025/02/2-2.png',
                        '/storage/cms-images/2025/02/3-3.png',
                    ],
                ],
                [
                    'heading' => 'E-Commerce Management & Administration',
                    'badges'  => [
                        '/storage/cms-images/2025/02/1-3.png',
                        '/storage/cms-images/2025/02/2-3.png',
                        '/storage/cms-images/2025/02/3-4.png',
                        '/storage/cms-images/2025/02/4-3.png',
                        '/storage/cms-images/2025/02/5-3.png',
                    ],
                ],
                [
                    'heading' => 'Combined Procurement, Logistics, and Supply Chain Certifications',
                    'badges'  => [
                        '/storage/cms-images/2025/04/1.png',
                        '/storage/cms-images/2025/04/2.jpg',
                        '/storage/cms-images/2025/04/3.png',
                        '/storage/cms-images/2025/04/4.png',
                        '/storage/cms-images/2025/04/5.jpg',
                        '/storage/cms-images/2025/04/6.png',
                        '/storage/cms-images/2025/04/7.png',
                        '/storage/cms-images/2025/04/8.png',
                        '/storage/cms-images/2025/04/9.png',
                        '/storage/cms-images/2025/04/10.jpg',
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'digital-badges'],
            [
                'title'            => 'Digital Badges',
                'content'          => null,
                'excerpt'          => 'AAPSCM® Credly-verified digital badges — showcase your Procurement, Supply Chain, Tourism, and E-Commerce certifications.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Digital Badges | AAPSCM',
                'meta_description' => 'Verifiable, Credly-backed AAPSCM® digital badges for your Procurement, Supply Chain, Tourism, E-Commerce, and combined certifications.',
                'show_in_nav'      => true,
            ],
        );
    }
}
