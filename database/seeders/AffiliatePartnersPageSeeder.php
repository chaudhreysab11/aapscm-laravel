<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/affiliate-partners/ for WP parity.
 * Hero with Authorized-Training-Partner PDF button, 2-col block with
 * "Our Affiliate Partners" + Become-An-Affiliate-Partner button and a
 * YouTube video, then an 18-card flip-style grid of partner institutions
 * (front: logo, back: URL).
 */
class AffiliatePartnersPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading'        => 'Affiliate Partners',
                'brochure_url'   => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2025/03/Authorized-Training-Partner-Program-Benefits.pdf'),
                'brochure_label' => "Authorized training partner\u{2019} pdf",
            ],

            'intro' => [
                'heading'     => 'Our Affiliate Partners',
                'cta_url'     => '#become-partner',
                'cta_label'   => 'Become An Affiliate Partner',
                'youtube_id'  => 'XcOM0CQxK2Q',
                'youtube_url' => 'https://youtu.be/XcOM0CQxK2Q?si=FuLyU_kNnhMAVp9s',
            ],

            'partners' => [
                [
                    'name'  => 'University of Maryland Eastern Shore',
                    'image' => '/storage/cms-images/2023/10/1-6.png',
                    'url'   => 'https://www.usmd.edu/',
                ],
                [
                    'name'  => 'University of South Carolonia Upstate',
                    'image' => '/storage/cms-images/2023/10/2-4.png',
                    'url'   => 'https://www.uscupstate.edu/',
                ],
                [
                    'name'  => 'University of Texas Austin',
                    'image' => '/storage/cms-images/2023/10/3-4-600x171.png',
                    'url'   => 'https://www.utexas.edu/',
                ],
                [
                    'name'  => 'University of Texas Dallas',
                    'image' => '/storage/cms-images/2023/10/4.jpg',
                    'url'   => 'https://www.utdallas.edu/',
                ],
                [
                    'name'  => 'University of Chicago',
                    'image' => '/storage/cms-images/2023/10/6-4.png',
                    'url'   => 'https://www.uchicago.edu/',
                ],
                [
                    'name'  => 'Northwestern University, Evanston IL',
                    'image' => '/storage/cms-images/2023/10/5-4.png',
                    'url'   => 'https://www.ctd.northwestern.edu/',
                ],
                [
                    'name'  => 'Lewis University',
                    'image' => '/storage/cms-images/2023/10/7-3.png',
                    'url'   => 'https://www.lewisu.edu/',
                ],
                [
                    'name'  => 'New York University',
                    'image' => '/storage/cms-images/2023/10/10-600x222.jpg',
                    'url'   => 'https://www.nyu.edu/',
                ],
                [
                    'name'  => 'University of California, Davis',
                    'image' => '/storage/cms-images/2023/10/11-2.jpg',
                    'url'   => 'https://www.ucdavis.edu/',
                ],
                [
                    'name'  => 'Harvard Business School',
                    'image' => '/storage/cms-images/2023/10/8-2.png',
                    'url'   => 'https://www.hbs.edu/Pages/default.aspx',
                ],
                [
                    'name'  => 'Aldiyar Consultancy & Training',
                    'image' => '/storage/cms-images/2025/11/1.png',
                    'url'   => 'https://aldiyartraining.com/',
                ],
                [
                    'name'      => 'Ivory Training & Consulting',
                    'name_html' => 'Ivory <br>Training &amp; Consulting',
                    'image'     => '/storage/cms-images/2025/11/Ivory-For-Training.jpg',
                    'url'       => 'https://ivorytraining.com/',
                ],
                [
                    'name'      => 'Palm Veach State College Florida',
                    'name_html' => 'Palm Veach State College<br>Florida',
                    'image'     => '/storage/cms-images/2025/04/image.png',
                    'url'       => 'https://www.pbsc.edu/',
                ],
                [
                    'name'  => 'United Education',
                    'image' => '/storage/cms-images/2025/08/1.jpg',
                    'url'   => 'https://www.united-education.com/',
                ],
                [
                    'name'  => 'London Business School',
                    'image' => '/storage/cms-images/2023/10/9-2.png',
                    'url'   => 'https://www.london.edu/',
                ],
                [
                    'name'  => 'Kafaat Competencies Skills Training Company',
                    'image' => '/storage/cms-images/2025/07/Image.png',
                    'url'   => 'https://kafaat.edu.sa/',
                ],
                [
                    'name'  => 'LEAP Training',
                    'image' => '/storage/cms-images/2026/03/LEAP-Logo-scaled.png',
                    'url'   => 'https://www.leap-globe.training/',
                ],
                [
                    'name'      => 'WingsWay Training',
                    'name_html' => 'WingsWay <span>Training</span>',
                    'image'     => '/storage/cms-images/2026/03/WingsWay-LOGO-ai-1.png',
                    'url'       => 'https://wingswaytraining.com/',
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'affiliate-partners'],
            [
                'title'            => 'Affiliate Partners',
                'content'          => null,
                'excerpt'          => 'AAPSCM® Affiliate Partners — accredited universities, colleges, and training institutions worldwide delivering AAPSCM® certifications.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => 'Affiliate Partners | AAPSCM',
                'meta_description' => 'Meet AAPSCM® Affiliate Partners delivering certified procurement, supply chain, and tourism management training across the globe.',
                'show_in_nav'      => true,
            ],
        );
    }
}
