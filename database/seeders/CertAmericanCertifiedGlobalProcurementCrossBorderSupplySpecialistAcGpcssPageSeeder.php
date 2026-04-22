<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss/
 * for WP parity (American Certified Global Procurement & Cross-Border Supply Professional, AC-GPCS).
 *
 * Mirrors visible Elementor sections in source order. The trailing hidden
 * Elementor section is skipped.
 */
class CertAmericanCertifiedGlobalProcurementCrossBorderSupplySpecialistAcGpcssPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image'      => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-54.png'),
                'heading'    => 'Global Procurement and Cross-Border Supply Chain Management',
                'paragraphs' => [
                    'Overview: Global procurement introduces unique challenges and opportunities. As companies expand internationally, procurement professionals must navigate cross-border regulations, cultural differences, and complex logistics. The Global Procurement and Cross-Border Supply Chain Management program provides participants with the knowledge and skills to manage international procurement effectively, optimize global supply chains, and foster cross-border relationships that support organizational goals.',
                ],
            ],
            'who_should_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro'   => 'This program is ideal for:',
                'items' => [
                    ['icon' => $check, 'text' => 'Procurement and supply chain professionals managing international suppliers.'],
                    ['icon' => $check, 'text' => 'Business leaders involved in global sourcing and logistics.'],
                    ['icon' => $check, 'text' => 'Professionals aiming to deepen their expertise in cross-border procurement.'],
                    ['icon' => $check, 'text' => 'Individuals seeking to develop skills for multinational or global roles in procurement.'],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'International Procurement and Trade Regulations',
                        'text'  => 'Understand the regulations and compliance requirements for international sourcing, including tariffs, trade agreements, and import/export laws.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Cross-Cultural Communication and Negotiation',
                        'text'  => 'Develop skills to navigate cultural differences in communication and negotiation, ensuring smooth supplier relations across borders.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Logistics and Transportation Management',
                        'text'  => 'Learn best practices for managing the logistics of cross-border supply chains, including transportation options, customs clearance, and freight forwarding.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Global Supplier Evaluation and Selection',
                        'text'  => 'Establish criteria for evaluating international suppliers, focusing on reliability, compliance, and alignment with organizational standards.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Risk Management in Global Procurement',
                        'text'  => 'Identify and mitigate risks associated with global supply chains, including geopolitical, economic, and currency risks.',
                    ],
                ],
            ],
            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro'   => 'Upon completion of this program, participants will be able to:',
                'items' => [
                    ['icon' => $check, 'text' => 'Navigate international trade regulations and compliance requirements effectively.'],
                    ['icon' => $check, 'text' => 'Establish and manage supplier relationships across diverse cultural contexts.'],
                    ['icon' => $check, 'text' => 'Oversee logistics for cross-border transactions, ensuring efficiency and cost-effectiveness.'],
                    ['icon' => $check, 'text' => 'Evaluate global suppliers based on compliance, reliability, and strategic value.'],
                    ['icon' => $check, 'text' => 'Implement risk management strategies to mitigate global supply chain disruptions.'],
                ],
            ],
            'modules' => [
                'heading' => 'Program Structure and Modules',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/9370543.png'),
                        'title' => 'Introduction to Global Procurement and Cross-Border Supply Chains',
                        'text'  => 'Explore the complexities and benefits of international procurement and global supply chains.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12503540.png'),
                        'title' => 'International Trade Regulations and Compliance',
                        'text'  => 'Learn about trade regulations, tariffs, import/export laws, and trade agreements that affect global sourcing.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1358555.png'),
                        'title' => 'Cross-Cultural Communication and Negotiation',
                        'text'  => 'Develop skills for effective communication and negotiation across different cultural environments, focusing on collaboration and mutual understanding',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/15587154.png'),
                        'title' => 'Logistics and Transportation Management',
                        'text'  => 'Understand the logistics of cross-border procurement, including freight options, customs processes, and inventory management for global operations.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/13943750.png'),
                        'title' => 'Global Supplier Evaluation and Risk Assessment',
                        'text'  => 'Establish criteria for selecting and evaluating international suppliers, focusing on compliance, reliability, and risk mitigation.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2110655.png'),
                        'title' => 'Customs and Duty Management',
                        'text'  => 'Gain expertise in managing customs processes and duties, understanding their impact on global procurement costs and delivery times.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/16398490.png'),
                        'title' => 'Managing Currency and Economic Risks',
                        'text'  => 'Learn how to navigate currency fluctuations, economic instability, and their impact on cross-border procurement.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12608592.png'),
                        'title' => 'Sustainable and Ethical Sourcing in Global Supply Chains',
                        'text'  => 'Explore the importance of sustainable and ethical sourcing practices when managing international suppliers, ensuring alignment with ESG principles.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/16138030-1.png'),
                        'title' => 'Capstone Project: Designing a Global Procurement Strategy',
                        'text'  => 'Apply your knowledge by developing a global procurement strategy for a multinational organization, addressing key aspects such as supplier selection, compliance, risk management, and logistics.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1654190-1.png'),
                        'title' => 'Case Studies in Global Procurement',
                        'text'  => 'Analyze real-world examples of successful and challenging global procurement projects to gain insights into best practices and lessons learned.',
                    ],
                ],
            ],
            'certification_pathway' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-11.jpg'),
                'heading'   => 'Certification and Career Pathways',
                'paragraph' => "Candidates who passed the test will earn the American Certified Global Procurement & Cross-Border Supply Professional (AC-GPCS)\u{00ae} designation, preparing them for roles such as:",
                'roles' => [
                    'Global Procurement Manager',
                    'International Supply Chain Coordinator',
                    'Cross-Border Sourcing Specialist',
                    'Import/Export Compliance Officer',
                ],
                // CTA hidden: links to legacy /course/ URL (commented out for review).
                // 'cta_label' => 'Enroll Now',
                // 'cta_href'  => UrlRewriter::local('https://aapscm.org/course/american-certified-global-procurement-cross-border-supply-specialist/'),
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-GPCS)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => "The Global Procurement & Cross-Border Supply (GPCS)\u{00ae} exam will focus on international procurement strategies, cross-border supply chain management, global trade compliance, risk mitigation, supplier relationship management, ethical sourcing, and the application of procurement best practices in a globalized and regulatory-diverse environment."],
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
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22306'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss'],
            [
                'title'            => "American Certified Global Procurement & Cross-Border Supply Specialist (AC-GPCS)\u{00ae}",
                'content'          => null,
                'excerpt'          => 'Global procurement introduces unique challenges and opportunities. As companies expand internationally, procurement professionals must navigate cross-border regulations, cultural differences, and complex logistics.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Global Procurement & Cross-Border Supply Specialist (AC-GPCS)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "American Certified Global Procurement & Cross-Border Supply Professional (AC-GPCS)\u{00ae} Global Procurement and Cross-Border Supply Chain Management Overview: Global procurement introduces unique challenges and opportunities. As companies expand internationally, procurement professionals must navigate cross-border regulations, cultural differences, and complex logistics. The Global Procurement and Cross-Border Supply Chain Management program provides participants with the knowledge and skills to […]",
                'show_in_nav'      => false,
            ],
        );
    }
}
