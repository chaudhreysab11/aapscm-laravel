<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-procurement-data-science-ai-specialist-ac-pdss/
 * for WP parity (American Certified Procurement Data Science & AI Professional, AC-PDS).
 *
 * This page uses a unique Elementor layout distinct from the AC-DPA template,
 * so it gets a bespoke blade view and page_data shape.
 */
class CertAmericanCertifiedProcurementDataScienceAiSpecialistAcPdssPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image'         => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-22.png'),
                'title_heading' => "American Certified Procurement Data Science & AI Professional (AC-PDS)\u{00ae}",
                'what_heading'  => "What is AC-PDS\u{00ae} ?",
                'paragraphs' => [
                    "Welcome to the forefront of procurement transformation with the American Certified Procurement Data Science & AI Professional (AC-PDS)\u{00ae} designation. This certification equips professionals with the skills to harness the power of data science and artificial intelligence (AI) to revolutionize procurement strategies, drive efficiency, and deliver unparalleled value in a competitive global landscape.",
                    "The AC-PDS\u{00ae} Certification is designed for procurement professionals who want to leverage advanced data science and AI technologies. It focuses on integrating cutting-edge analytics, automation, and predictive capabilities into procurement processes to enhance decision-making, optimize supply chains, and achieve sustainable business outcomes.",
                ],
            ],
            'key_features' => [
                'heading' => "Key Features of AC-PDS\u{00ae}",
                'groups' => [
                    [
                        'subheading' => '1. Procurement Data Science Expertise',
                        'cards' => [
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15.png'),
                                'title' => 'Advanced Analytics',
                                'text'  => 'Master the art of using data to uncover procurement trends and patterns.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-9.png'),
                                'title' => 'Predictive Modeling',
                                'text'  => 'Forecast demand, supplier performance, and market risks with accuracy.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-11.png'),
                                'title' => 'Data Visualization',
                                'text'  => 'Present complex procurement data in actionable formats for stakeholders.',
                            ],
                        ],
                    ],
                    [
                        'subheading' => '2. AI-Driven Procurement',
                        'cards' => [
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-1.png'),
                                'title' => 'Automation of Processes',
                                'text'  => 'Streamline procurement workflows such as supplier evaluations and contract management.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15-1.png'),
                                'title' => 'AI-Enhanced Negotiations',
                                'text'  => 'Use AI insights to identify optimal pricing and negotiation strategies.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-9.png'),
                                'title' => 'Risk Mitigation',
                                'text'  => 'Predict and prevent supply chain disruptions with AI-powered tools.',
                            ],
                        ],
                    ],
                    [
                        'subheading' => '3. Strategic Decision-Making',
                        'cards' => [
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15-2.png'),
                                'title' => 'Data-Driven Insights',
                                'text'  => 'Turn raw procurement data into actionable strategies.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15-3.png'),
                                'title' => 'Dynamic Sourcing',
                                'text'  => 'Adjust sourcing strategies in real-time based on AI-generated recommendations.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15-4.png'),
                                'title' => 'Sustainability',
                                'text'  => 'Support green procurement initiatives by tracking and minimizing environmental impact.',
                            ],
                        ],
                    ],
                ],
            ],
            'why_choose' => [
                'heading' => "Why Choose AC-PDS\u{00ae}?",
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'Efficiency and Speed',
                        'text'  => 'Reduce manual procurement tasks and increase operational efficiency.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2.png'),
                        'title' => 'Cost Optimization:',
                        'text'  => 'Identify cost-saving opportunities with advanced spend analysis tools.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Risk Reduction',
                        'text'  => 'Minimize vulnerabilities by proactively addressing supplier and market risks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Sustainability Goals',
                        'text'  => 'Use AI and data analytics to meet ethical and eco-friendly procurement objectives.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Future-Proofing',
                        'text'  => 'Stay ahead with the latest innovations in data science and AI.',
                    ],
                ],
            ],
            'technologies' => [
                'heading' => "Technologies Driving AC-PDS\u{00ae}",
                'intro'   => 'Master the tools and technologies that define modern procurement:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Machine Learning (ML)',
                        'text'  => 'Build models to predict demand, identify risks, and optimize sourcing.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/2.png'),
                        'title' => 'Natural Language Processing (NLP)',
                        'text'  => 'Automate contract review and analyze supplier communications.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/3.png'),
                        'title' => 'Blockchain Technology',
                        'text'  => 'Ensure transparency and security in procurement transactions.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Robotic Process Automation (RPA)',
                        'text'  => 'Automate repetitive procurement tasks for greater efficiency.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/2.png'),
                        'title' => 'Cloud-Based Analytics Platforms',
                        'text'  => 'Enable real-time data access and collaboration across teams.',
                    ],
                ],
            ],
            'future_trends' => [
                'heading' => 'Future Trends in Procurement Data Science & AI',
                'intro'   => 'Stay competitive with these emerging trends:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/digital.png'),
                        'title' => 'Predictive Procurement Orchestration:',
                        'text'  => 'AI-driven platforms that unify procurement activities and automate decision-making.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/data-collection.png'),
                        'title' => 'Sustainability Analytics:',
                        'text'  => 'Tools that measure and optimize environmental impact in procurement.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/analysis.png'),
                        'title' => 'Digital Twins in Procurement:',
                        'text'  => 'Simulate sourcing scenarios and test strategies in a virtual environment.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/communication-skills.png'),
                        'title' => 'AI-Powered Collaboration:',
                        'text'  => 'Enhance supplier relationships through intelligent data sharing and communication tools.',
                    ],
                ],
            ],
            'challenges' => [
                'heading' => 'Challenges in AI-Driven Procurement',
                'intro'   => 'While AI and data science bring incredible potential, they also come with challenges:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Data Quality',
                        'text'  => 'Ensuring clean, accurate, and comprehensive procurement data.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/2.png'),
                        'title' => 'Technology Integration',
                        'text'  => 'Incorporating AI tools with legacy systems.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/3.png'),
                        'title' => 'Skill Gaps',
                        'text'  => 'Training procurement teams to interpret and use AI-driven insights effectively.',
                    ],
                ],
            ],
            'kpis' => [
                'heading' => "KPIs to Measure AC-PDS\u{00ae} Success",
                'intro'   => 'Evaluate the impact of your AI and data science strategies using these key metrics:',
                'items' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15.png'),
                        'title' => 'Cost Savings from Automation',
                        'text'  => 'Measure the reduction in procurement costs.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15-2.png'),
                        'title' => 'Supplier Performance Metrics',
                        'text'  => 'Track reliability, quality, and responsiveness.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15.png'),
                        'title' => 'Procurement Cycle Time',
                        'text'  => 'Assess the efficiency of end-to-end procurement processes.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-11.png'),
                        'title' => 'Spend Visibility',
                        'text'  => 'Evaluate how well procurement spend is tracked and managed.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-15-4.png'),
                        'title' => 'Sustainability Impact',
                        'text'  => 'Monitor reductions in carbon footprint and ethical compliance rates.',
                    ],
                ],
            ],
            'core_competencies' => [
                'heading' => "Core Competencies of an AC-PDS\u{00ae} Professional",
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'Procurement Analytics Proficiency:',
                        'text'  => 'Extract actionable insights from complex datasets.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2.png'),
                        'title' => 'AI Integration Expertise:',
                        'text'  => 'Deploy AI tools to automate and enhance procurement processes.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Risk Management Skills:',
                        'text'  => 'Use predictive models to anticipate and mitigate supply chain risks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Sustainability Leadership:',
                        'text'  => 'Drive ethical and eco-friendly procurement practices using AI tools',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Strategic Sourcing Mastery:',
                        'text'  => 'Optimize supplier selection and negotiation using AI-driven insights.',
                    ],
                ],
            ],
            'transform' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1-3-1024x585.jpg'),
                'heading' => "Transform Procurement with AC-PDS\u{00ae}",
                'paragraphs' => [
                    "The American Certified Procurement Data Science & AI Professional (AC-PDS\u{00ae}) certification empowers professionals to lead the future of procurement. By mastering data science and AI, you\u{2019}ll unlock new opportunities for efficiency, cost savings, and sustainability.",
                    "Take the next step in your career and redefine procurement excellence with AC-PDS\u{00ae} Certification today!",
                ],
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-PDS)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => "The Procurement Data Science & AI (PDS-AI)\u{00ae} exam will focus on leveraging data analytics and artificial intelligence in procurement, covering topics such as predictive analytics, spend analysis, supplier performance modeling, contract optimization, risk assessment, AI-driven decision-making, and the integration of emerging technologies to enhance procurement strategies and outcomes."],
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
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22312'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-procurement-data-science-ai-specialist-ac-pdss/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-procurement-data-science-ai-specialist-ac-pdss'],
            [
                'title'            => "American Certified Procurement Data Science & AI Professional (AC-PDS)\u{00ae}",
                'content'          => null,
                'excerpt'          => "Welcome to the forefront of procurement transformation with the American Certified Procurement Data Science & AI Professional (AC-PDS)\u{00ae} designation. This certification equips professionals with the skills to harness the power of data science and artificial intelligence (AI) to revolutionize procurement strategies, drive efficiency, and deliver unparalleled value in a competitive global landscape.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Procurement Data Science & AI Professional (AC-PDS)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "American Certified Procurement Data Science & AI Professional (AC-PDS)\u{00ae} American Certified Procurement Data Science & AI Professional (AC-PDS)\u{00ae} What is AC-PDS\u{00ae} ? Welcome to the forefront of procurement transformation with the American Certified Procurement Data Science & AI Professional (AC-PDS)\u{00ae} designation. This certification equips professionals with the skills to harness the power of data science and […]",
                'show_in_nav'      => false,
            ],
        );
    }
}
