<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/the-american-certified-supply-chain-professional-acscp/
 * for WP parity.
 *
 * Mirrors the 13 Elementor top-level sections in source order:
 *   0  hero               (heading + intro + image)
 *   1  why_different      (image + heading + paragraph)
 *   2  why_cert           (heading + 3 paragraphs)  ← no CTA on this cert
 *   3  about_exam         (image + caption + heading + intro + bullets)
 *   4+5+6 ai_applications (intro paragraph + 4 image-box cards + closing)
 *   7  ai_intro           (heading + paragraph) Foundational AI in Supply Chain Management
 *   8  who_benefits       (image + heading + paragraph)
 *   9  why_benefit        (heading + paragraph + image)
 *   10 exam_details       (key/value table from shortcode)
 *   11 flyer              (Download Flyer PDF CTA — standalone flex-con)
 *   12 training_options   (2 image-box cards with check + Purchase and Pay CTAs)
 */
class CertTheAmericanCertifiedSupplyChainProfessionalAcscpPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Master the Essentials with Foundational Supply Chain Management Certification',
                'body'    => "Are you ready to build a strong foundation in one of the world\u{2019}s most in-demand industries? The Foundational Supply Chain Management Certification equips you with the essential skills and knowledge to navigate the complexities of global supply chains. Designed for aspiring professionals and those new to the field, this certification covers key principles, from logistics and procurement to inventory management and supply chain analytics. Gain practical insights into streamlining operations, optimizing resources, and driving organizational success. Take the first step toward becoming a supply chain leader\u{2014}because a well-managed supply chain is the backbone of every thriving business.",
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-57.png'),
            ],
            'why_different' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-58.png'),
                'heading' => 'Why is it Different?',
                'body'    => "The American Certified Supply Chain Professional (ACSCP\u{00ae}) certification sets itself apart by demonstrating to future employers that you possess the practical knowledge, strategic insights, and professional expertise needed to excel in the competitive world of supply chain management. Unlike general certifications, the ACSCP\u{00ae} focuses on the critical connection between logistics, integrated supply chain operations, and firm competitiveness, equipping you to drive efficiency, innovation, and value creation. This certification highlights your ability to align supply chain processes with organizational goals, making you an indispensable asset in today\u{2019}s dynamic business landscape.",
            ],
            'why_cert' => [
                'heading'    => "Why Go for ACSCP\u{00ae} Certification?",
                'paragraphs' => [
                    "The American Certified Supply Chain Professional (ACSCP\u{00ae}) certification is an essential credential for professionals looking to build foundational expertise as supply chain specialists. This certification equips candidates with the basic knowledge and skills needed to understand and manage critical supply chain processes effectively.",
                    "The ACSCP\u{00ae} test/exam assumes familiarity with supply chain management processes, providing an in-depth exploration of how to integrate key business functions\u{2014}from end users to original suppliers\u{2014}to create value for the organization and its stakeholders, including customers. This certification demonstrates your ability to synthesize and leverage logistics and supply chain capabilities to drive an organization\u{2019}s superior performance and competitive advantage.",
                    "The ACSCP\u{00ae} serves as the pre-requisite for the Certified Supply Chain Manager (CSCM\u{00ae}) certification, the gold standard for supply chain managers. By earning the ACSCP\u{00ae}, you take the first step toward advanced leadership roles while assuring employers of your professional skills and expertise.",
                ],
            ],
            'about_exam' => [
                'image'         => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-5.jpg'),
                'image_caption' => "American Certified Supply Chain Professional Certification\u{00ae}",
                'heading'       => 'About the Exam',
                'paragraph'     => "The American Certified Supply Chain Professional (ACSCP\u{00ae}) exam tests your understanding of the fundamental concepts of supply chain management. It provides an integrated view of all functional areas, including procurement, manufacturing and operations management, transportation and logistics, inventory and warehousing, demand planning, and scheduling.",
                'intro'         => 'The exam is designed to assess your knowledge of key supply chain processes and ensure that you are equipped to apply them effectively in real-world scenarios. The test covers introductory areas of how to:',
                'items' => [
                    'Develop and implement procurement strategies to enhance supply chain efficiency.',
                    'Manage inventory and warehousing to balance cost and availability.',
                    'Optimize transportation and logistics to ensure timely delivery of goods.',
                    'Plan and schedule demand to align with production and supply capabilities.',
                    'Coordinate manufacturing and operations management to achieve organizational goals.',
                ],
            ],
            'ai_applications' => [
                'intro'   => "By mastering these areas, the ACSCP\u{00ae} certification validates your foundational expertise and positions you as a capable professional in the dynamic field of supply chain management. Additionally, the exam introduces the role of Artificial Intelligence (AI) in modern supply chains, focusing on its applications in:",
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/analysis-1.png'),
                        'title' => 'Predictive Analytics',
                        'text'  => 'Using AI to forecast demand, optimize inventory levels, and improve procurement strategies',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/settings.png'),
                        'title' => 'Automation and Optimization',
                        'text'  => 'Leveraging AI to streamline transportation, logistics, and warehouse operations.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/risks.png'),
                        'title' => 'Risk Management',
                        'text'  => 'Employing AI tools to identify and mitigate supply chain disruptions.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/monitoring.png'),
                        'title' => 'Real-Time Monitoring',
                        'text'  => 'Utilizing AI for live tracking and decision-making in supply chain operations.',
                    ],
                ],
                'closing' => "By covering these key areas, the ACSCP\u{00ae} exam ensures that candidates are not only proficient in traditional supply chain functions but also prepared to integrate cutting-edge AI technologies to drive efficiency, innovation, and competitiveness.",
            ],
            'ai_intro' => [
                'heading' => 'Foundational AI in Supply Chain Management',
                'body'    => 'Artificial Intelligence (AI) plays a transformative role in modern supply chains by enhancing efficiency and decision-making across various functions. Through predictive analytics, AI forecasts demand, optimizes inventory levels, and refines procurement strategies to align with organizational goals. It streamlines transportation, logistics, and warehouse operations by automating repetitive tasks and optimizing workflows. AI-powered tools are also integral to risk management, enabling the identification and mitigation of potential supply chain disruptions before they escalate. Additionally, real-time monitoring capabilities provide live tracking and facilitate informed decision-making, ensuring seamless and adaptive supply chain operations.',
            ],
            'who_benefits' => [
                'image'       => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-2.jpg'),
                'heading'     => "Who Would Benefit from ACSCP\u{00ae} Certification?",
                'description' => "The American Certified Supply Chain Professional (ACSCP\u{00ae}) certification is designed to benefit a wide range of individuals seeking to enhance their knowledge and career prospects in supply chain management. Students considering a career in supply chain management will gain a solid foundation to excel in this dynamic field. Professionals working in roles requiring a comprehensive understanding of supply chain processes, such as logistics, procurement, and operations, will find this certification invaluable. Additionally, marketing, sales, and operations staff involved in purchases and supply will benefit from the insights and skills provided by ACSCP\u{00ae}, enabling them to contribute more effectively to their organization\u{2019}s supply chain strategies.",
            ],
            'why_benefit' => [
                'heading' => "Why Would You Benefit from ACSCP\u{00ae}?",
                'body'    => "The American Certified Supply Chain Professional (ACSCP\u{00ae}) certification positions you for success in one of the fastest-growing industries. According to the U.S. Bureau of Labor Statistics, supply chain jobs are projected to grow 11% between 2019 and 2029, adding over 531,200 new positions. By earning the ACSCP\u{00ae}, you gain the expertise to help your organization build a resilient and sustainable supply chain, ready to navigate disruptions and seize new opportunities. This certification not only enhances your career prospects but also equips you to drive innovation and operational excellence in a rapidly evolving business environment.",
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-2-1024x609.jpg'),
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (ACSCP)\u{00ae}"],
                    ['label' => 'Launch Date',            'value' => 'March 4, 2020'],
                    ['label' => 'Exam Details',           'value' => "The ACSCP\u{00ae} Certification tests fundamental concepts of supply chain management. All functional areas of supply chain management are explored in an integrated view of procurement, manufacturing and operations management, transportation and logistics, inventory and warehousing, demand planning, and scheduling."],
                    ['label' => 'Number of Questions',    'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions',      'value' => 'Multiple choice'],
                    ['label' => 'Length of Test',         'value' => '120 Minutes'],
                    ['label' => 'Passing Score',          'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages',              'value' => 'English'],
                    ['label' => 'Retirement',             'value' => 'None'],
                    ['label' => 'Testing Provider',       'value' => 'Affiliate Partner Testing Centers Online Testing'],
                    ['label' => 'Price',                  'value' => '$399.99 USD'],
                ],
                'flyer' => [
                    'label' => 'Download Flyer',
                    'href'  => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/ACSCP.pdf'),
                ],
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text'      => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=5591'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-supplychain-professional-acscp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'the-american-certified-supply-chain-professional-acscp'],
            [
                'title'            => "The American Certified Supply Chain Professional (ACSCP)\u{00ae}",
                'content'          => null,
                'excerpt'          => "Master the Essentials with Foundational Supply Chain Management Certification \u{2014} the ACSCP\u{00ae} validates foundational expertise in procurement, logistics, inventory, demand planning and AI applications across the supply chain.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "The American Certified Supply Chain Professional (ACSCP)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "ACSCP\u{00ae} is AAPSCM's foundational supply chain certification \u{2014} covering procurement, manufacturing, logistics, inventory, demand planning, and AI applications. A pre-requisite for the Certified Supply Chain Manager (CSCM\u{00ae}).",
                'show_in_nav'      => false,
            ],
        );
    }
}
