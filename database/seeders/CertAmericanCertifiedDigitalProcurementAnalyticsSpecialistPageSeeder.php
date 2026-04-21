<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-digital-procurement-analytics-specialist/
 * for WP parity (American Certified Digital Procurement & Analytics Professional, AC-DPA).
 *
 * Mirrors visible Elementor sections in source order. The hidden section
 * (elementor-hidden between exam-details and training options) is skipped.
 *
 * Section keys:
 *   intro                — heading + 3 paragraphs (Overview / Key Topics / Ideal For)
 *   lead                 — single paragraph
 *   who_should_enroll    — heading + intro + 4 check-cards
 *   program_highlights   — heading + 5 image+title+text cards
 *   learning_outcomes    — heading + intro + 5 check-cards
 *   modules              — heading + 8 image+title+text cards
 *   certification_pathway— image + heading + paragraph + 4 role bullets + Enroll Now CTA
 *   exam_details         — key/value table (no CTA buttons on WP page after table)
 *   training_options     — 2 cards with check + Purchase and Pay
 */
class CertAmericanCertifiedDigitalProcurementAnalyticsSpecialistPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-37-1.png'),
                'heading'    => 'Digital Procurement and Supply Chain Analytics',
                'paragraphs' => [
                    'Overview: This program would focus on the intersection of procurement and digital transformation. It would cover digital procurement tools, AI-driven analytics, blockchain applications in supply chain transparency, and data analysis for procurement decision-making.',
                    'Key Topics: Data analytics, digital tools in procurement, blockchain for supply chain, AI applications, and predictive analytics.',
                    'Ideal For : Professionals interested in leveraging technology for strategic procurement and supply chain efficiency.',
                ],
            ],
            'lead' => [
                'paragraph' => "In today\u{2019}s data-driven world, procurement professionals must stay ahead with digital tools and analytics to make informed, strategic decisions. The Digital Procurement and Supply Chain Analytics program equips professionals with the skills to leverage advanced digital tools and data analytics, driving efficiency and informed decision-making across supply chain functions.",
            ],
            'who_should_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro'   => 'This program is designed for:',
                'items' => [
                    ['icon' => $check, 'text' => 'Procurement managers and analysts seeking to integrate digital tools into procurement.'],
                    ['icon' => $check, 'text' => 'Supply chain professionals looking to enhance decision-making through analytics.'],
                    ['icon' => $check, 'text' => 'Business analysts and data science professionals working in procurement or logistics.'],
                    ['icon' => $check, 'text' => 'Professionals aiming to future-proof their careers with skills in digital transformation.'],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Digital Transformation in Procurement',
                        'text'  => 'Understand how digital tools reshape procurement processes, enabling companies to optimize cost, time, and resources.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Data Analytics in Procurement',
                        'text'  => 'Learn to analyze procurement data to extract actionable insights, supporting strategic decision-making and process improvements.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'AI and Machine Learning',
                        'text'  => 'Explore AI and ML applications in procurement, from demand forecasting to supplier risk assessment.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Blockchain in Supply Chain',
                        'text'  => "Study blockchain\u{2019}s role in ensuring supply chain transparency, traceability, and security.",
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Predictive and Prescriptive Analytics',
                        'text'  => 'Develop skills in predictive analytics to anticipate supply chain trends and prescriptive analytics for proactive decision-making.',
                    ],
                ],
            ],
            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro'   => 'Upon completion of this program, participants will be able to:',
                'items' => [
                    ['icon' => $check, 'text' => 'Utilize digital procurement tools to streamline and enhance procurement processes.'],
                    ['icon' => $check, 'text' => 'Perform advanced data analysis to extract insights that improve procurement strategies.'],
                    ['icon' => $check, 'text' => 'Apply AI and machine learning techniques for demand forecasting, trend analysis, and supplier evaluation.'],
                    ['icon' => $check, 'text' => 'Implement blockchain solutions for enhanced transparency and security within the supply chain.'],
                    ['icon' => $check, 'text' => 'Use predictive analytics to anticipate future supply chain needs and prescriptive analytics for decision optimization.'],
                ],
            ],
            'modules' => [
                'heading' => 'Program Structure and Modules',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/digital.png'),
                        'title' => 'Introduction to Digital Procurement',
                        'text'  => 'Understand the essentials of digital procurement, current trends, and the transformative potential of digital tools.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/data-collection.png'),
                        'title' => 'Data Collection and Management',
                        'text'  => 'Dive into data management, focusing on data collection, cleansing, and preparation for accurate analysis in procurement. .',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/analysis.png'),
                        'title' => 'Analytics in Procurement',
                        'text'  => 'Learn techniques in data analysis, including data mining, dashboard creation, and KPI tracking for effective procurement.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/communication-skills.png'),
                        'title' => 'AI and Machine Learning in Supply Chain',
                        'text'  => 'Explore practical applications of AI and ML, such as demand forecasting, anomaly detection, and automated supplier selection.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/transparency.png'),
                        'title' => 'Blockchain and Transparency',
                        'text'  => 'Discover how blockchain enhances supply chain transparency and security, improving trust across partners and stakeholders.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/predictive-analysis.png'),
                        'title' => 'Predictive and Prescriptive Analytics',
                        'text'  => 'Develop skills in advanced analytics to forecast supply chain needs, optimize decision-making, and improve procurement performance.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/6.png'),
                        'title' => 'Digital Tools and Platforms',
                        'text'  => 'Gain hands-on experience with top digital procurement platforms and tools like SAP Ariba, Oracle Procurement Cloud, and Coupa.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/8.png'),
                        'title' => 'Capstone Project',
                        'text'  => 'Apply your new skills in a real-world scenario, analyzing data and developing a strategy for digital procurement optimization.',
                    ],
                ],
            ],
            'certification_pathway' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1-3-1024x585.jpg'),
                'heading'   => 'Certification and Career Pathways',
                'paragraph' => "Graduates will earn the \u{201C}American Certified Digital Procurement & Analytics Professional (AC-DPA)\u{00ae}\u{201D} certification. This program opens doors to careers such as:",
                'roles' => [
                    'Digital Procurement Analyst',
                    'Supply Chain Data Analyst',
                    'Procurement Technology Specialist',
                    'Digital Transformation Lead in Supply Chain',
                ],
                'cta_label' => 'Enroll Now',
                'cta_href'  => UrlRewriter::local('https://aapscm.org/course/american-certified-digital-procurement-analytics-specialist/'),
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-DPA)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => 'This program would focus on the intersection of procurement and digital transformation. It would cover digital procurement tools, AI-driven analytics, blockchain applications in supply chain transparency, and data analysis for procurement decision-making.'],
                    ['label' => 'Number of Questions',    'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions',      'value' => 'Multiple choice'],
                    ['label' => 'Length of Test',         'value' => '120 Minutes'],
                    ['label' => 'Passing Score',          'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages',              'value' => 'English'],
                    ['label' => 'Retirement',             'value' => 'None'],
                    ['label' => 'Testing Provider',       'value' => 'Affiliate Partners Testing Centers Online Testing'],
                    ['label' => 'Price',                  'value' => '$399.99 USD'],
                ],
            ],
            'training_options' => [
                'check_icon' => $check,
                'options' => [
                    [
                        'text'      => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22195'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-digital-procurement-analytics-specialist-acdpas/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-digital-procurement-analytics-specialist'],
            [
                'title'            => "American Certified Digital Procurement & Analytics Professional (AC-DPA)\u{00ae}",
                'content'          => null,
                'excerpt'          => 'This program would focus on the intersection of procurement and digital transformation. It would cover digital procurement tools, AI-driven analytics, blockchain applications in supply chain transparency, and data analysis for procurement decision-making.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Digital Procurement & Analytics Professional (AC-DPAS)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "American Certified Digital Procurement & Analytics Professional (AC-DPA)\u{00ae} \u{2014} Digital Procurement and Supply Chain Analytics. Overview: This program would focus on the intersection of procurement and digital transformation. It would cover digital procurement tools, AI-driven analytics, blockchain applications in supply chain transparency, and data analysis for procurement decision-making. Key Topics: Data analytics, digital tools in procurement, blockchain for supply chain, AI applications, and predictive analytics.",
                'show_in_nav'      => false,
            ],
        );
    }
}
