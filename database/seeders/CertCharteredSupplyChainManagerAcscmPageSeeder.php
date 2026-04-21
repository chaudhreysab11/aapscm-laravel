<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/chartered-supply-chain-manager-acscm/ for WP parity.
 *
 * Mirrors the Elementor sections in source order:
 *   0  hero               (heading + paragraph + image)
 *   1  why_different      (image + heading + paragraph)
 *   2  why_cert           (heading + 2 paragraphs)  no CTA
 *   3  about_exam         (image-stack: top + caption + bottom + heading + paragraph + intro + bullets)
 *   4  about_exam_closing (one paragraph closing about_exam)
 *   5  skills_header      (heading "What Skills Will You Learn?")
 *   6+7+8+9 skills_cards  (8 image-box cards spread across 4 rows of 2)
 *   10 who_benefits       (image + heading + paragraph)
 *   11 why_benefit        (image + heading + paragraph)
 *   12 exam_details       (key/value table from shortcode) + flyer (root-child 13)
 *   14 training_options   (2 image-box cards with check + Purchase and Pay CTAs)
 */
class CertCharteredSupplyChainManagerAcscmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Elevate Your Expertise with Advanced Supply Chain Management Certification',
                'body'    => "Stay ahead in the ever-evolving world of supply chain management with our Advanced Supply Chain Management Certification known as ACSCM\u{00ae} This program is designed for professionals ready to tackle complex global challenges and drive logistics, procurement, and operations innovation. With a focus on cutting-edge strategies, digital transformation, and sustainability, this certification equips you with the tools to optimize processes, reduce risks, and enhance organizational resilience. Whether managing global suppliers, implementing AI-driven analytics, or streamlining operations, this certification positions you as a leader in a high-demand field. Take the next career step\u{2014} advanced skills create exceptional opportunities!",
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-7.png'),
            ],
            'why_different' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-7.jpg'),
                'heading' => 'Why Is It Different?',
                'body'    => "The American Certified Supply Chain Manager (ACSCM\u{00ae}) certification sets itself apart by demonstrating to future employers that you possess the advanced knowledge, insights, and professional expertise to excel in the competitive world of supply chain management. This certification focuses on equipping professionals with the ability to conceptualize, design, and implement supply chains that align seamlessly with product, market, and customer characteristics. Unlike traditional certifications, ACSCM\u{00ae} emphasizes the strategic role of integrated logistics and supply chain management in driving firm competitiveness. In today\u{2019}s landscape, business success often hinges on supply networks rather than individual corporations, making this certification essential for those aiming to lead and innovate in supply chain operations.",
            ],
            'why_cert' => [
                'heading'    => "Why Go for ACSCM\u{00ae} Certification?",
                'paragraphs' => [
                    "The American Certified Supply Chain Manager (ACSCM\u{00ae}) certification is designed for managers and experienced professionals looking to deepen their expertise and enhance their strategic skills in supply chain management. This certification equips candidates with advanced knowledge of supply chain processes and administration, ensuring they are well-prepared to address real-world challenges.",
                    "The ACSCM\u{00ae} exam evaluates your ability to manage the flow of products, information, and revenue across complex supply networks. It emphasizes managerial competencies that differentiate supply networks in their ability to meet customer needs effectively and efficiently. By earning the ACSCM\u{00ae} certification, you position yourself as a leader with the expertise to optimize supply chain operations, drive innovation, and enhance organizational competitiveness in a rapidly evolving global market.",
                ],
            ],
            'about_exam' => [
                'image_top'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-3-4.jpg'),
                'image_caption' => "American Certified Supply Chain Manager Certification\u{00ae}",
                'image_bottom'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/world-class-supply-chain.png'),
                'heading'       => 'About the Exam',
                'paragraph'     => "The American Certified Supply Chain Manager (ACSCM)\u{00ae} examination is a comprehensive assessment designed to test your advanced managerial capabilities in critical areas of supply chain management. The exam evaluates your proficiency in logistics, digital coordination for supply chain integration, inventory management, risk pooling, procurement, product and process design, and international supply chain operations. Additionally, it incorporates the role of Artificial Intelligence (AI) in modern supply chain practices, emphasizing its transformative impact on efficiency and decision-making.",
                'intro'         => 'The objective is to assess your ability to',
                'items' => [
                    'Strategically coordinate supply chain decisions using digital tools and AI-driven solutions for seamless integration.',
                    'Optimize inventory management with AI-powered predictive analytics to balance cost and availability.',
                    'Mitigate risks using AI-based risk assessment and proactive pooling strategies.',
                    'Implement efficient procurement processes supported by AI tools for supplier evaluation and contract negotiation.',
                    'Design products and processes that align with AI-optimized supply chain capabilities.',
                    'Enhance revenue and performance management using AI insights to forecast demand and improve customer satisfaction.',
                    'Leverage AI for real-time monitoring and decision-making across global supply chain operations.',
                ],
                'closing' => 'This examination ensures that certified professionals possess not only the foundational and advanced skills but also the ability to integrate emerging technologies like AI, positioning them as leaders in the rapidly evolving field of supply chain management(AI) in modern supply chain practices, emphasizing its transformative impact on efficiency and decision-making.',
            ],
            'skills' => [
                'heading' => 'What Skills Will You Learn?',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15.png'),
                        'title' => 'E-Procurement Strategies',
                        'text'  => 'Comprehend E-Procurement strategies and designs to drive cost savings and reliability by consolidating the supply base. Also learn to optimize spending by reducing maverick purchases and seize discounts by combining orders and purchasing in volume',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-9.png'),
                        'title' => 'Supply Chain Risk Pooling',
                        'text'  => 'Comprehend risk pooling reduces variability by aggregating demand across customer locations thereby reducing safety stock and inventory across the enterprise.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-6.png'),
                        'title' => 'Pricing & Revenue Management in Supply Chain',
                        'text'  => 'Comprehend the strategic revenue management and understand how to distinguish between two segments and design their pricing to make one segment pay more than the other. Or how to control the demand so that the lower price segment does not use the complete asset that is available.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/4-4.png'),
                        'title' => 'Logistics in Supply Chain',
                        'text'  => 'Comprehend three major building blocks of logistics networks: transportation, warehousing, and inventory.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-9.png'),
                        'title' => 'Inventory & Risk Management',
                        'text'  => 'Comprehend how to mitigate against supply chain disruptions, which comprise of major breakdowns of supply, inventory and schedules and delays. This may even include operational risks such as failures or breakdowns of operations, changes in technology, variations in demand and security risks such as theft, counterfeiting, terrorism, piracy and infrastructure breakdowns.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-1.png'),
                        'title' => 'Supply Chain Integration & Technology',
                        'text'  => 'Comprehend how to integrate, connect and control the entire distribution network through software platform and be able to collect and analyze supply chain data using the latest technology',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/6-1.png'),
                        'title' => 'Real Time Tracking',
                        'text'  => 'Real-time tracking and supply chain visibility enable proactive adjustments to disruptions, and AI-powered tools aid in risk management by identifying vulnerabilities and suggesting mitigation strategies. Machine learning improves supplier performance monitoring, route optimization, and energy efficiency, promoting sustainability across the supply chain. Additionally, AI automates repetitive tasks, enabling human resources to focus on strategic activities, while providing actionable insights to improve overall supply chain strategies. With these capabilities, AI transforms supply chains into adaptive, customer-centric networks that offer a competitive edge in the global market.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/7-1.png'),
                        'title' => 'How AI Enhances Supply Chains',
                        'text'  => 'Artificial Intelligence (AI) significantly enhances supply chains by improving efficiency, decision-making, and resilience through advanced capabilities. AI-driven predictive analytics and demand forecasting optimize inventory levels, while automation streamlines warehouse operations and logistics, reducing costs and delays.',
                    ],
                ],
            ],
            'who_benefits' => [
                'image'       => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-1.jpg'),
                'heading'     => "Who Would Benefit from ACSCM\u{00ae} Certification?",
                'description' => "The American Certified Supply Chain Manager (ACSCM\u{00ae}) certification is designed to benefit a wide range of professionals and aspiring leaders in the supply chain industry. Managers, experienced professionals, and graduate students in supply chain fields will gain advanced skills and strategic insights to drive efficiency and innovation. Professionals working in roles requiring a comprehensive understanding of supply chain management, including logistics, procurement, and global operations, will find the certification invaluable. Additionally, marketing, sales, and operations staff involved in supply chain processes can enhance their expertise, align their activities with supply chain goals, and contribute more effectively to organizational success.",
            ],
            'why_benefit' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-2.jpg'),
                'heading' => "Why Would You Benefit from ACSCM\u{00ae} Certification?",
                'body'    => "The positions you to excel in one of the fastest-growing industries, with supply chain management jobs projected to grow by 41%, adding 4.1 million new roles between 2020 and 2030 (Source: U.S. Bureau of Labor Statistics). This certification equips you with advanced skills to lead in sourcing, logistics, and procurement while embracing sustainability to drive value and innovation for businesses. By mastering the purchasing process, you can help organizations source innovative goods and services, secure a competitive advantage, and foster exclusive supplier partnerships. The ACSCM\u{00ae} certification is your pathway to becoming a leader in a dynamic and evolving industry.",
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (ACSCM)\u{00ae}"],
                    ['label' => 'Launch Date',            'value' => 'April 30, 2020'],
                    ['label' => 'Exam Details',           'value' => "ACSCM\u{00ae} examination tests your managerial capabilities in logistics, digital coordination for supply chain integration, inventory management, risk pooling, procurement, product and process design, and international supply chain management, including logistics, digital coordination of decisions and resources, inventory and risk management, procurement and supply contracting, product and process design, and revenue management."],
                    ['label' => 'Number of Questions',    'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions',      'value' => 'Multiple choice'],
                    ['label' => 'Length of Test',         'value' => '120 Minutes'],
                    ['label' => 'Passing Score',          'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => "Must have obtained the ACSCP\u{00ae} or have 3+ years experience as a Supply chain professional, or in management positions"],
                    ['label' => 'Languages',              'value' => 'English'],
                    ['label' => 'Retirement',             'value' => 'None'],
                    ['label' => 'Testing Provider',       'value' => 'Affiliate Partner Testing Centers Online Testing'],
                    ['label' => 'Price',                  'value' => '$399.99 USD'],
                ],
                'flyer' => [
                    'label' => 'Download Flyer',
                    'href'  => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CSCM-1.pdf'),
                ],
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text'      => 'Self-Paced Training, Exam Fees : Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=5593'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-supply-chain-manager-acscm/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-supply-chain-manager-acscm'],
            [
                'title'            => "American Certified Supply Chain Manager (ACSCM)\u{00ae}",
                'content'          => null,
                'excerpt'          => "Elevate Your Expertise with Advanced Supply Chain Management Certification \u{2014} the ACSCM\u{00ae} equips managers and experienced professionals with advanced strategic skills in logistics, procurement, risk pooling, and AI-driven supply chain operations.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Supply Chain Manager (ACSCM)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "ACSCM\u{00ae} is AAPSCM's advanced supply chain management certification \u{2014} covering logistics, digital coordination, inventory management, risk pooling, procurement, product and process design, international operations, and AI in modern supply chains.",
                'show_in_nav'      => false,
            ],
        );
    }
}
