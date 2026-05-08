<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/ for WP parity.
 *
 * Sections: hero welcome, intro ("Advancing Excellence…"), 49 certification
 * cards, AAPSCM Training (2 cards + Read More CTA), Test Online CTA band,
 * Certifications Overview (4 cards), Certification Process (5 steps),
 * Our Affiliate Partners (13-logo carousel).
 */
class HomePageSeeder extends Seeder
{
    private const READ_MORE_LABEL = 'Read More';

    private const CERTIFICATIONS_URL = 'https://aapscm.org/certifications/';

    public function run(): void
    {
        $certs = $this->loadCerts();
        $pageData = $this->buildPageData($certs);

        Page::updateOrCreate(
            ['slug' => 'home'],
            [
                'title'            => 'Home',
                'content'          => null,
                'excerpt'          => "AAPSCM\u{00ae} \u{2014} certifications, training, and global networking in procurement, supply chain, and tourism management.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'seo_title'        => 'American Association for Supply Chain Management | Chain Management',
                'meta_title'       => 'American Association for Supply Chain Management | Chain Management',
                'meta_description' => "AAPSCM\u{00ae} empowers procurement, supply chain, and tourism professionals with internationally recognized certifications, training, and global networking.",
                'show_in_nav'      => false,
            ],
        );
    }

    /**
     * Loads the 49-entry certification catalog from database/seeders/data/
     * and rewrites all remote URLs to their local equivalents.
     */
    private function loadCerts(): array
    {
        $path = database_path('seeders/data/home_certs.json');
        $raw  = json_decode((string) file_get_contents($path), true) ?? [];
        $out  = [];

        foreach ($raw as $c) {
            $out[] = [
                'title' => $c['title'] ?? '',
                'desc'  => $c['desc']  ?? '',
                'href'  => UrlRewriter::local($c['href'] ?? '#'),
                'image' => UrlRewriter::image($c['image'] ?? ''),
                'badge' => UrlRewriter::image($c['badge'] ?? ''),
            ];
        }

        return $out;
    }

    private function sliderSlides(): array
    {
        return [
            [
                'title' => 'Become an AAPSCM® Member Today',
                'body_html' => 'Strategy, innovation, and implementation @ AAPSCM® <span aria-hidden="true">—</span> these are building blocks of success - Be part of the future!!!',
                'cta_label' => 'JOIN NOW',
                'cta_href' => UrlRewriter::local('https://aapscm.org/membership/'),
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/12/S2.jpg'),
            ],
            [
                'title' => 'Upgrade Your Future with AAPSCM®',
                'body_html' => '1st Internationally Recognized Certification Body in Procurement, Supply Chain Management and Tourism Management <strong>Get a Govt-Recognized Certification!!</strong>',
                'cta_label' => self::READ_MORE_LABEL,
                'cta_href' => UrlRewriter::local(self::CERTIFICATIONS_URL),
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/12/S1-1.jpg'),
            ],
            [
                'title' => 'Improve Your Skills',
                'body_html' => 'Be Chartered!! We are Vendor-Neutral. We are Chartered in USA! Join our “Spartanburg, South Carolina Charter today”!!',
                'cta_label' => self::READ_MORE_LABEL,
                'cta_href' => UrlRewriter::local('https://aapscm.org/us-charters/#aapscm-spartanburg-sc-chapter'),
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/12/s3.jpg'),
            ],
            [
                'title' => 'New Knowledge',
                'body_html' => 'Ready to Learn and become an Expert? Find a Perfect Certification and join us today @ AAPSCM®',
                'cta_label' => self::READ_MORE_LABEL,
                'cta_href' => UrlRewriter::local(self::CERTIFICATIONS_URL),
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/12/s44.jpg'),
            ],
            [
                'title' => 'Transform Your Organization With AAPSCM® Certification',
                'body_html' => 'Upskill and Reskilling are Keys to Internal Mobility Be part of Your Organizational Transformation',
                'cta_label' => self::READ_MORE_LABEL,
                'cta_href' => UrlRewriter::local(self::CERTIFICATIONS_URL),
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/12/s5.jpg'),
            ],
            [
                'title' => 'Insights Learning Expertise.',
                'body_html' => 'Strategy, innovation, and implementation @ AAPSCM® <span aria-hidden="true">—</span> these are building blocks of success - Be part of the future!!!',
                'cta_label' => self::READ_MORE_LABEL,
                'cta_href' => UrlRewriter::local(self::CERTIFICATIONS_URL),
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/12/Untitled-2.jpg'),
            ],
        ];
    }

    private function buildPageData(array $certs): array
    {
        return [
            'slider' => $this->sliderSlides(),
            'hero' => [
                'heading' => "Welcome to AAPSCM\u{00ae} \u{2013} Your Gateway to Excellence in Procurement, Supply Chain, and Tourism Management",
                'paragraphs' => [
                    "In today's fast-evolving global economy, organizations demand leaders who can navigate the complexities of procurement, streamline supply chain operations, and innovate in the dynamic tourism industry. At the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM\u{00ae}), we empower professionals and organizations to excel in these critical areas.",
                    "As a premier association, AAPSCM\u{00ae} offers a blend of cutting-edge certifications, transformative training, and global networking opportunities designed to sharpen your competitive edge. Whether you're driving cost efficiencies in procurement, optimizing supply chains for resilience, or reimagining tourism strategies, we provide the tools, resources, and expertise to help you lead with confidence.",
                    "By joining AAPSCM\u{00ae}, you become part of a global community committed to advancing sustainable practices, leveraging innovative technologies, and fostering professional growth. From exclusive access to industry insights and thought leadership to certifications that validate your expertise, our membership ensures you stay ahead in an ever-changing landscape.",
                    "Step into a world of possibilities. With AAPSCM\u{00ae}, you don't just adapt\u{2014}you lead. Let's redefine the future of procurement, supply chain, and tourism management together.",
                ],
            ],
            'intro' => [
                'heading'    => 'Advancing Excellence in Procurement and Supply Chain Management',
                'paragraphs' => [
                    "The American Association of Procurement, Supply Chain & Tourism Management (AAPSCM\u{00ae}), Headquartered in Spartanburg, South Carolina, with its Library and Conference Center in Frisco, Texas, is a leading professional body dedicated to advancing global excellence in procurement and supply chain management. Through professional development, certification, and networking opportunities, AAPSCM\u{00ae} equips students, professionals, and enterprises with the tools to thrive in today's competitive environment",
                    "Responding to evolving industry needs, AAPSCM\u{00ae} offers internationally recognized and industry-relevant programs such as the American Certified Procurement Professional (ACPP)\u{00ae}, American Certified Supply Chain Professional (ACSCP)\u{00ae}, Chartered Supply Chain Manager (CSCM)\u{00ae}, and Chartered Supply Chain Artificial Intelligence Expert (CSAI)\u{00ae}, among others, providing resources, training, and accreditation that support career growth and operational excellence.",
                    "Whether you are a student aspiring to build your career, a professional seeking advancement, or an enterprise aiming for operational excellence, AAPSCM\u{00ae} provides resources, training, and accreditation to support and accelerate your success",
                ],
                'image' => '/storage/cms-images/2025/10/1-12.jpg',
            ],
            'certifications' => $certs,
            'training'       => [
                'heading' => "AAPSCM\u{00ae} Training",
                'cards'   => [
                    [
                        'href'  => '/aapscm-training-virtual-american-certified-procurement-professional-acpp/',
                        'image' => '/storage/cms-images/2023/11/2-2.jpg',
                        'title' => "Instructor-led virtual training - American Certified Procurement Professional (ACPP)\u{00ae}",
                        'dates' => ['JAN 2 – 6, 2025', 'JAN 8 -12,2025'],
                    ],
                    [
                        'href'  => '/aapscm-training-virtual-chartered-procurement-manager-acpm/',
                        'image' => '/storage/cms-images/2023/11/3-2.jpg',
                        'title' => "Instructor-led virtual training- Chartered Procurement Manager (CPM)\u{00ae}",
                        'dates' => ['JAN 15-19, 2025', 'JAN 21-25, 2025'],
                    ],
                ],
                'cta_href'  => '/aapscm-training/',
                'cta_label' => self::READ_MORE_LABEL,
            ],
            'test_cta' => [
                'icon'        => '/storage/cms-images/2023/10/cta_2_shape3.png',
                'eyebrow'     => 'Get Your Certifications',
                'heading'     => 'Test Online – Get Your <span class="text-yellow-300">Certifications</span> by Registering <br>and Taking Your Test Online.',
                'description' => 'Certifications validate your expertise in a particular field. They prove that you have undergone rigorous training and have the necessary skills to excel in your profession.',
                'button_href' => '/aapscm-training/',
                'button_text' => 'Start Virtual Exam Registration',
            ],
            'overview' => [
                'heading' => "AAPSCM\u{00ae} Certifications Overview",
                'cards'   => [
                    [
                        'icon'  => '/storage/cms-images/2023/10/1.png',
                        'title' => 'Our Certifications',
                        'text'  => "We offer various certifications that recognize knowledge and competency for our Management Professionals in 3 distinct areas representing both professional and managerial skills for..",
                        'href'  => '/certifications-for-professionals/',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/2.png',
                        'title' => 'Become A Professional Member',
                        'text'  => "As a registered user, you receive complimentary access to select AAPSCM\u{00ae} research reports, training, Exam, and invitation to join..",
                        'href'  => '/membership/',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/3.png',
                        'title' => 'Register for Test',
                        'text'  => 'You may complete registration online or through our affilliate partners in your country. Once registration is completed and membership ID issued, you may then buy exams online.',
                        'href'  => '/all-courses/',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/4.png',
                        'title' => 'Corporate Solutions',
                        'text'  => "AAPSCM\u{00ae} Corporate membership is the hub for all businesses driving the innovation and adoption of procurement, supply chain and tourism business solutions.",
                        'href'  => '/affiliate-partners/',
                    ],
                ],
            ],
            'process' => [
                'heading' => "AAPSCM\u{00ae} Certification Process",
                'steps'   => [
                    [
                        'icon'  => '/storage/cms-images/2023/10/criteriaiocn.png',
                        'title' => 'Fulfill Eligibility Criteria',
                        'text'  => "All AAPSCM\u{00ae} certifications require you to meet domain experience levels, educational levels or both before you apply.",
                        'href'  => '/fulfill-eligibility-criteria/',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/quality.png',
                        'title' => 'Application Review',
                        'text'  => "Once we receive your application, we'll verify that you meet the eligibility criteria",
                        'href'  => '/application-review/',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/hand-1.png',
                        'title' => 'Payment',
                        'text'  => "After we notify you that your application is approved, it's time to provide payment so you can move to the final stage.",
                        'href'  => '/payment/',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/accept.png',
                        'title' => 'Complete Application',
                        'text'  => "Once you've determined you meet the eligibility criteria, it's time to apply.",
                        'href'  => '/complete-application/',
                    ],
                    [
                        'icon'  => '/storage/cms-images/2023/10/calendar.png',
                        'title' => 'Schedule Exam Appointment',
                        'text'  => "Once you've determined you meet the eligibility criteria, it's time to apply. Collect the following information and then use our online certification ...",
                        'href'  => '/schedule-exam-appointment/',
                    ],
                ],
            ],
            'partners' => [
                'heading' => 'Our Affiliate Partners',
                'logos'   => [
                    '/storage/cms-images/2023/10/1-1-150x150.png',
                    '/storage/cms-images/2023/10/2-1-150x150.png',
                    '/storage/cms-images/2023/10/3-1-150x150.png',
                    '/storage/cms-images/2023/10/4-1-150x150.png',
                    '/storage/cms-images/2023/10/5-150x150.png',
                    '/storage/cms-images/2023/10/6-150x150.png',
                    '/storage/cms-images/2023/10/7-150x150.png',
                    '/storage/cms-images/2023/10/8-150x150.png',
                    '/storage/cms-images/2023/10/9-150x150.png',
                    '/storage/cms-images/2023/10/10-150x150.png',
                    '/storage/cms-images/2023/10/11-150x150.png',
                    '/storage/cms-images/2025/07/5-150x150-1.png',
                    '/storage/cms-images/2025/08/1-1-150x150.png',
                ],
            ],
        ];
    }
}
