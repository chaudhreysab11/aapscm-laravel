<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-procurement-automation-rpa-specialist-ac-paras-2/
 * for WP parity (American Certified Procurement Automation & RPA Professional,
 * AC-PARP).
 */
class CertAmericanCertifiedProcurementAutomationRpaSpecialistAcParas2PageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'hero' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1-2-1024x802.jpg'),
                'heading'   => "Embrace the Future of Procurement with the AC-PARP\u{00ae} Certification \u{2013} Automation and RPA Redefining Excellence!",
                'paragraph' => "Welcome to the era of automated procurement excellence with the American Certified Procurement Automation & RPA Professional (AC-PARP\u{00ae} ) certification. This designation equips professionals with the skills to streamline procurement processes using advanced automation and Robotic Process Automation (RPA), reducing costs, improving efficiency, and enhancing accuracy across procurement operations.",
            ],
            'what_is' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1-3-1024x585.jpg'),
                'heading'   => "What is AC-PARP\u{00ae} ?",
                'paragraph' => "The AC-PARP\u{00ae} Certification focuses on leveraging automation and RPA technologies to transform traditional procurement practices. It is designed for professionals who aim to reduce manual tasks, accelerate workflows, and create agile procurement systems that deliver significant operational value.",
            ],
            'key_features' => [
                'heading' => "Key Features of AC-PARP\u{00ae}",
                'groups' => [
                    [
                        'subheading' => '1. Procurement Automation',
                        'cards' => [
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-16.png'),
                                'title' => 'Workflow Optimization',
                                'text'  => 'Automating repetitive procurement tasks such as purchase order creation, invoice processing, and vendor communication.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-10.png'),
                                'title' => 'Data Entry Automation',
                                'text'  => 'Ensuring accurate and fast input of procurement data.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-7.png'),
                                'title' => 'Approval Process Simplification',
                                'text'  => 'Speeding up multi-level approval processes using automation tools.',
                            ],
                        ],
                    ],
                    [
                        'subheading' => '2. Robotic Process Automation (RPA) in Procurement',
                        'cards' => [
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-18.png'),
                                'title' => 'Automated Contract Management',
                                'text'  => 'Using RPA bots to manage contract lifecycles, from creation to renewal.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-19.png'),
                                'title' => 'Supplier Performance Tracking',
                                'text'  => 'Automating the collection and analysis of supplier performance data.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-20.png'),
                                'title' => 'Order and Payment Processing',
                                'text'  => 'Ensuring seamless and accurate transactions with minimal human intervention.',
                            ],
                        ],
                    ],
                    [
                        'subheading' => '3. Efficiency and Compliance',
                        'cards' => [
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-16.png'),
                                'title' => 'Standardization of Processes',
                                'text'  => 'Maintaining consistent and compliant procurement workflows across the organization.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-10.png'),
                                'title' => 'Audit Readiness',
                                'text'  => 'Ensuring procurement records are automated, accurate, and audit-ready.',
                            ],
                            [
                                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-7.png'),
                                'title' => 'Real-Time Insights',
                                'text'  => 'Providing instant updates and analytics on procurement operations.',
                            ],
                        ],
                    ],
                ],
            ],
            'why_choose' => [
                'heading' => "Why Choose AC-PARP\u{00ae} ?",
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'Enhanced Productivity',
                        'text'  => 'Free up resources by automating repetitive, time-consuming tasks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2.png'),
                        'title' => 'Cost Reduction',
                        'text'  => 'Lower operational costs by streamlining processes and minimizing errors.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Improved Accuracy',
                        'text'  => 'Ensure consistent data integrity across procurement operations.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Faster Turnaround',
                        'text'  => 'Accelerate procurement workflows, reducing delays in order fulfillment and supplier communication.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Scalability',
                        'text'  => 'Build agile procurement systems that grow with your organization.',
                    ],
                ],
            ],
            'technologies' => [
                'heading' => "Technologies Driving AC-PARP\u{00ae}",
                'intro'   => 'Learn to harness the latest tools and technologies in procurement automation:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Robotic Process Automation (RPA)',
                        'text'  => 'Automate repetitive tasks like data entry, invoicing, and supplier communications.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/2.png'),
                        'title' => 'Procurement Automation Platforms',
                        'text'  => 'Centralize and streamline procurement workflows.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/3.png'),
                        'title' => 'AI-Powered Process Optimization',
                        'text'  => 'Enhance decision-making by integrating AI with automated systems.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Smart Contracts',
                        'text'  => 'Leverage blockchain technology for automated and secure contract management.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/2.png'),
                        'title' => 'Cloud-Based Procurement Solutions',
                        'text'  => 'Access procurement systems anytime, anywhere, for real-time collaboration.',
                    ],
                ],
            ],
            'future_trends' => [
                'heading' => 'Future Trends in Procurement Automation',
                'intro'   => 'Stay competitive by embracing these emerging trends:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/digital.png'),
                        'title' => 'Hyperautomation',
                        'text'  => 'Combining RPA, AI, and machine learning for end-to-end process automation.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/data-collection.png'),
                        'title' => 'Intelligent RPA Bots',
                        'text'  => 'Bots capable of learning and adapting to complex procurement scenarios.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/analysis.png'),
                        'title' => 'Digital Procurement Marketplaces',
                        'text'  => 'Automated matching of suppliers with buyers based on real-time data.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/communication-skills.png'),
                        'title' => 'Sustainability Automation',
                        'text'  => 'Automating sustainability metrics to track environmental and ethical procurement practices.',
                    ],
                ],
            ],
            'challenges' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1-3-1024x585.jpg'),
                'heading' => 'Challenges in Procurement Automation',
                'intro'   => 'While procurement automation offers immense benefits, there are challenges to address',
                'items' => [
                    'Implementation Costs: Initial investment in automation technologies.',
                    'System Integration: Aligning automation tools with legacy procurement systems',
                    'Change Management : Training teams to adopt new automated workflows.',
                ],
            ],
            'core_competencies' => [
                'heading' => "Core Competencies of an AC-PARP\u{00ae} Professional",
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'RPA Proficiency',
                        'text'  => 'Deploy and manage RPA bots to automate procurement tasks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2.png'),
                        'title' => 'Process Mapping Expertise',
                        'text'  => 'Identify opportunities for automation within procurement workflows.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Data Management Skills',
                        'text'  => 'Ensure accurate and seamless data entry and integration across platforms.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Compliance Automation Knowledge',
                        'text'  => 'Automate adherence to procurement regulations and standards.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Vendor Management Automation',
                        'text'  => 'Use RPA tools to monitor and manage supplier relationships effectively.',
                    ],
                ],
            ],
            'kpis' => [
                'heading' => "KPIs to Measure AC-PARP\u{00ae} Success",
                'intro'   => 'Evaluate the effectiveness of your procurement automation efforts using these metrics:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-14.png'),
                        'title' => 'Process Efficiency Gains',
                        'text'  => 'Measure time saved through automated workflows.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-6.png'),
                        'title' => 'Error Reduction Rate',
                        'text'  => 'Track the decrease in manual errors.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/cycle.png'),
                        'title' => 'Cycle Time',
                        'text'  => 'Monitor the time required to complete procurement processes.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-5.png'),
                        'title' => 'Cost Savings from Automation',
                        'text'  => 'Quantify operational savings achieved through RPA implementation.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/4-3.png'),
                        'title' => 'Supplier Turnaround Time',
                        'text'  => 'Assess the speed of supplier communication and transactions.',
                    ],
                ],
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-PARP)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => "The American Certified Procurement Automation & RPA (AC-PARP)\u{00ae} exam will focus on leveraging automation and robotic process automation (RPA) in procurement processes, covering workflow optimization, intelligent contract management, data integration, supplier onboarding, compliance monitoring, and the implementation of scalable, automated solutions to enhance efficiency and accuracy in procurement operations."],
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
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22325'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-procurement-automation-rpa-specialist-ac-paras/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-procurement-automation-rpa-specialist-ac-paras-2'],
            [
                'title'            => "American Certified Procurement Automation & RPA Professional (AC-PARP )\u{00ae}",
                'content'          => null,
                'excerpt'          => "Welcome to the era of automated procurement excellence with the American Certified Procurement Automation & RPA Professional (AC-PARP\u{00ae} ) certification. This designation equips professionals with the skills to streamline procurement processes using advanced automation and Robotic Process Automation (RPA), reducing costs, improving efficiency, and enhancing accuracy across procurement operations.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Procurement Automation & RPA Professional (AC-PARP)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "American Certified Procurement Automation & RPA Professional (AC-PARP )\u{00ae} Embrace the Future of Procurement with the AC-PARP\u{00ae} Certification \u{2013} Automation and RPA Redefining Excellence! Welcome to the era of automated procurement excellence with the American Certified Procurement Automation & RPA Professional (AC-PARP\u{00ae} ) certification. This designation equips professionals with the skills to streamline procurement processes using […]",
                'show_in_nav'      => false,
            ],
        );
    }
}
