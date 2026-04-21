<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/chartered-strategic-procurement-supplier-relationship-specialist/
 * for WP parity (Chartered Strategic Procurement & Supplier Relationship Manager, CSP-SRM).
 *
 * Mirrors visible Elementor sections in source order. Trailing hidden
 * Elementor section is skipped. The "Click here -> #" placeholder buttons
 * inside technology cards are intentionally not transcribed.
 */
class CertCharteredStrategicProcurementSupplierRelationshipSpecialistPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-30.png'),
                'heading'   => 'Advanced Strategic Procurement & Supplier Relationship Management',
                'paragraph' => "Strategic Procurement and Supplier Relationship Management (CSP-SRM)\u{00ae} is a critical aspect of modern supply chain management that focuses on optimizing supplier partnerships to achieve cost efficiency, quality assurance, innovation, and long-term business sustainability. Advanced CSP-SRM\u{00ae} professionals leverage technology, data analytics, and strategic frameworks to drive value across procurement operations.",
            ],
            'core_components' => [
                'heading' => "The Core Components of CSP-SRM\u{00ae}",
                'cards' => [
                    [
                        'image'       => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-27.png'),
                        'title'       => 'Strategic Procurement',
                        'definition'  => "Definition: A proactive approach to sourcing and procurement that aligns with an organization\u{2019}s broader goals.",
                        'key_label'   => 'Key Elements:',
                        'key_items'   => [
                            'Identifying and prioritizing procurement categories based on business needs.',
                            'Balancing cost, quality, and sustainability in supplier selection',
                            'Ensuring compliance with regulatory and ethical standards.',
                        ],
                    ],
                    [
                        'image'       => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-28.png'),
                        'title'       => " Supplier Relationship Management (SRM)\u{00ae}",
                        'definition'  => 'Definition: The systematic approach to evaluating and improving supplier partnerships.',
                        'key_label'   => 'Key Elements:',
                        'key_items'   => [
                            'Building trust and collaboration with key suppliers.',
                            'Monitoring supplier performance and implementing improvement plans.',
                            'Encouraging innovation and co-creation in product and service development.',
                        ],
                    ],
                ],
            ],
            'importance' => [
                'heading' => "Importance of Advanced CSP-SRM\u{00ae}",
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Cost Optimization',
                        'text'  => 'Strategic procurement reduces overall procurement costs by identifying cost-saving opportunities and leveraging economies of scale.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Risk Mitigation',
                        'text'  => 'Proactively addressing supply chain risks, such as disruptions, compliance violations, and supplier failures, ensures business continuity.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Innovation and Collaboration',
                        'text'  => 'Strong supplier relationships foster collaboration in product development, enhancing competitiveness.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Sustainability and Ethics',
                        'text'  => "CSP-SRM\u{00ae} ensures suppliers adhere to ethical practices and sustainability goals, enhancing brand reputation and compliance.",
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Improved Decision-Making',
                        'text'  => 'Advanced analytics and technology enable data-driven procurement strategies for better decision-making.',
                    ],
                ],
            ],
            'key_functions' => [
                'heading' => "Key Functions of a CSP-SRM\u{00ae}  Manager",
                'groups' => [
                    [
                        'title' => 'Supplier Selection and Evaluation',
                        'items' => [
                            'Conducting thorough assessments of suppliers based on cost, quality, reliability, and compliance.',
                            'Utilizing supplier scorecards and performance metrics for continuous evaluation.',
                        ],
                    ],
                    [
                        'title' => 'Contract Management',
                        'items' => [
                            'Negotiating and managing supplier contracts to ensure favorable terms and compliance.',
                            'Automating contract workflows using AI-powered tools.',
                            'Implement risk management strategies to mitigate global supply chain disruptions.',
                        ],
                    ],
                    [
                        'title' => 'Performance Monitoring and Improvement',
                        'items' => [
                            'Establishing KPIs to track supplier performance.',
                            'Implementing corrective actions for underperforming suppliers.',
                        ],
                    ],
                    [
                        'title' => 'Risk Assessment and Mitigation',
                        'items' => [
                            'Identifying potential supply chain risks and developing mitigation plans.',
                            'Diversifying supplier bases to reduce dependency on critical suppliers.',
                        ],
                    ],
                    [
                        'title' => 'Collaboration and Innovation',
                        'items' => [
                            'Engaging suppliers in collaborative planning, forecasting, and innovation.',
                            'Co-developing products and solutions that align with business objectives.',
                        ],
                    ],
                ],
            ],
            'technologies' => [
                'heading' => "Technologies Driving CSP-SRM\u{00ae}",
                'cards' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/9370543.png'),
                        'title' => 'Artificial Intelligence (AI) and Machine Learning (ML)',
                        'items' => [
                            'Automates supplier evaluation, spend analysis, and predictive analytics.',
                            'Enhances decision-making by identifying trends and risks.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12503540.png'),
                        'title' => 'Blockchain for Procurement',
                        'items' => [
                            'Automates supplier evaluation, spend analysis, and predictive analytics.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1358555.png'),
                        'title' => 'Supplier Relationship Management (SRM) Software',
                        'items' => [
                            'Centralizes supplier data and automates workflows.',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/15587154.png'),
                        'title' => 'Cloud-Based Procurement Platforms',
                        'items' => [
                            'Facilitates real-time collaboration and data sharing with suppliers',
                        ],
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/technology.png'),
                        'title' => 'Predictive Analytics',
                        'items' => [
                            'Identifies risks, forecasts market trends, and optimizes sourcing strategies',
                        ],
                    ],
                ],
            ],
            'frameworks' => [
                'heading' => "Strategic Frameworks for CSP-SRM\u{00ae}",
                'cards' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Untitled-5-1.png'),
                        'title' => 'Category Management',
                        'text'  => 'Groups similar goods and services into categories for strategic sourcing and supplier management.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-12.png'),
                        'title' => 'Total Cost of Ownership (TCO)',
                        'text'  => 'Evaluates the complete cost of acquiring, using, and disposing of a product.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-8.png'),
                        'title' => 'Supplier Segmentation',
                        'text'  => 'Categorizes suppliers based on criticality, spend, and performance to allocate resources effectively',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/4-6.png'),
                        'title' => 'Value-Based Procurement',
                        'text'  => 'Prioritizes value creation over cost savings, focusing on innovation and quality',
                    ],
                ],
            ],
            'challenges' => [
                'heading' => "Challenges in CSP-SRM\u{00ae}",
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/complexity.png'),
                        'title' => 'Data Complexity',
                        'text'  => 'Managing and analyzing large volumes of supplier data',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/warning.png'),
                        'title' => 'Supplier Risks',
                        'text'  => 'Ensuring suppliers meet compliance, ethical, and performance standards.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/technology-1.png'),
                        'title' => 'Technology Integration',
                        'text'  => 'Incorporating advanced tools into traditional procurement systems.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/dynamic.png'),
                        'title' => 'Changing Market Dynamics',
                        'text'  => 'Adapting procurement strategies to fluctuating markets and global disruptions.',
                    ],
                ],
            ],
            'skills' => [
                'heading' => "Advanced Skills for CSP-SRM\u{00ae} Professionals",
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/skill-development.png'),
                        'title' => 'Analytical Skills',
                        'text'  => 'Ability to interpret complex data for informed decision-making.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/negotiation-skills.png'),
                        'title' => 'Negotiation Skills',
                        'text'  => 'Strong negotiation capabilities to secure favorable supplier contracts.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/relationship.png'),
                        'title' => 'Relationship Management',
                        'text'  => 'Building and maintaining positive supplier relationships.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/technology-1.png'),
                        'title' => 'Technology Proficiency',
                        'text'  => 'Familiarity with AI tools, procurement software, and analytics platforms.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/strategic.png'),
                        'title' => 'Strategic Thinking',
                        'text'  => 'Aligning procurement and supplier management with organizational goals.',
                    ],
                ],
            ],
            'trends' => [
                'heading' => "Trends in CSP-SRM\u{00ae}",
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/ecology.png'),
                        'title' => 'Sustainable Procurement',
                        'text'  => 'Emphasis on eco-friendly and ethical sourcing practices.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12503540.png'),
                        'title' => 'Digital Transformation',
                        'text'  => 'Adoption of AI, blockchain, and cloud platforms for streamlined processes.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/resilience.png'),
                        'title' => 'Resilience Building',
                        'text'  => 'Preparing supply chains to handle disruptions through agile strategies.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/together.png'),
                        'title' => 'Diversity in Supplier Bases',
                        'text'  => 'Encouraging partnerships with diverse and inclusive suppliers.',
                    ],
                ],
            ],
            'kpis' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-29.png'),
                'heading' => "KPIs to Measure CSP-SRM\u{00ae} Success",
                'items' => [
                    ['title' => 'Supplier Defect Rate',           'text' => 'Measures the quality of goods or services delivered by suppliers.'],
                    ['title' => 'Cost Savings Achieved',          'text' => 'Tracks the savings from strategic procurement initiatives.'],
                    ['title' => 'Supplier On-Time Delivery Rate', 'text' => 'Ensures reliability in meeting production and distribution schedules'],
                    ['title' => ' Supplier Satisfaction Index',   'text' => 'Evaluates the strength of supplier relationships.'],
                    ['title' => ' Procurement Cycle Time',        'text' => 'Monitors the efficiency of the procurement process.'],
                ],
            ],
            'future' => [
                'heading' => "The Future of CSP-SRM\u{00ae}",
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/9370543.png'),
                        'title' => 'AI and Predictive Procurement',
                        'text'  => 'Greater reliance on AI to anticipate market changes and optimize supplier relationships.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12503540.png'),
                        'title' => 'Focus on Sustainability',
                        'text'  => 'Increased adoption of green procurement practices.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1358555.png'),
                        'title' => 'Global Collaboration',
                        'text'  => 'Enhanced partnerships with global suppliers using digital tools.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1358555.png'),
                        'title' => 'Risk-Resilient Strategies',
                        'text'  => 'Advanced tools to predict and mitigate supply chain risks.',
                    ],
                ],
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (CSP-SRM)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => 'The exam focuses on developing strategic procurement strategies, optimizing supplier relationships, and enhancing collaboration to drive value, mitigate risks, and ensure long-term supply chain efficiency.'],
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
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22298'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-strategic-procurement-supplier-relationship-specialist-csp-srm/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-strategic-procurement-supplier-relationship-specialist'],
            [
                'title'            => "Chartered Strategic Procurement & Supplier Relationship Manager  (CSP-SRM)\u{00ae}",
                'content'          => null,
                'excerpt'          => "Strategic Procurement and Supplier Relationship Management (CSP-SRM)\u{00ae} is a critical aspect of modern supply chain management that focuses on optimizing supplier partnerships to achieve cost efficiency, quality assurance, innovation, and long-term business sustainability.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Chartered Strategic Procurement & Supplier Relationship Manager (CSP-SRM)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "Chartered Strategic Procurement & Supplier Relationship Manager (CSP-SRM)\u{00ae} Advanced Strategic Procurement & Supplier Relationship Management Strategic Procurement and Supplier Relationship Management (CSP-SRM)\u{00ae} is a critical aspect of modern supply chain management that focuses on optimizing supplier partnerships to achieve cost efficiency, quality assurance, innovation, and long-term business sustainability. Advanced CSP-SRM\u{00ae} professionals leverage technology, data analytics, and […]",
                'show_in_nav'      => false,
            ],
        );
    }
}
