<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredAiSupplyChainAnalystCaiscaPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'Chartered AI Supply Chain Analyst (CAISCA)®';

        $pageData = [
            'hero' => [
                'heading' => 'Master AI-Driven Supply Chain Optimization for the Future',
                'paragraphs' => [
                    'The Chartered AI Supply Chain Analyst (CAISCA)® certification, offered by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®), is a premier professional credential designed to equip supply chain professionals with cutting-edge AI and analytics expertise. With AI and machine learning transforming global supply chains, businesses are leveraging predictive analytics, automation, and intelligent forecasting to optimize operations and reduce risks. The CAISCA® certification empowers professionals with the skills to apply AI-driven decision-making, improve supply chain resilience, and drive efficiency in logistics, procurement, and inventory management.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/img_152.webp'),
            ],

            'why_choose' => [
                'heading' => 'Why Choose CAISCA®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/curriculum-1.png'), 'title' => 'AI-Integrated Curriculum', 'text' => 'Gain expertise in AI-powered supply chain analytics, predictive forecasting, and digital automation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/learning.png'), 'title' => 'Hands-On Learning', 'text' => 'Work on real-world AI-driven supply chain simulations, case studies, and projects.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/infrastructure.png'), 'title' => 'Industry Demand', 'text' => 'AI-powered supply chain professionals are in high demand, with companies seeking experts in automation and data-driven logistics.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/internet.png'), 'title' => 'Global Recognition', 'text' => 'The CAISCA® certification is recognized worldwide as a mark of excellence in AI-driven supply chain analytics.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/advance.png'), 'title' => 'Career Advancement', 'text' => 'Enhance your employability and career trajectory in AI-powered logistics and supply chain management.'],
                ],
            ],

            'why_aapscm' => [
                'heading' => 'Why Get Certified Through AAPSCM®?',
                'subheading' => 'Globally Recognized & Industry-Driven Certification',
                'paragraph' => 'AAPSCM® is a globally recognized professional body in procurement, supply chain, and logistics management, offering certifications aligned with current industry needs.',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/ai.png'), 'title' => 'AI & Digital Transformation Focus', 'text' => 'Unlike traditional supply chain certifications, CAISCA® is specifically tailored to integrate AI, big data, and automation into supply chain strategies. This ensures professionals remain competitive and ahead of industry trends.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/self-learning.png'), 'title' => 'Comprehensive Learning Experience', 'text' => 'AAPSCM® offers multiple learning formats, including instructor-led training, self-paced courses, and real-world case studies, providing flexibility and hands-on experience.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/career-promotion.png'), 'title' => 'Networking & Career Growth', 'text' => 'As an AAPSCM® certified professional, you gain access to an exclusive network of supply chain leaders, AI experts, and global procurement professionals, opening doors to new career opportunities.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/curriculum-2.png'), 'title' => 'Practical & Industry-Validated Curriculum', 'text' => 'Our certification modules are designed with input from top industry experts, ensuring real-world application, AI case studies, and hands-on tools to boost your expertise in AI-driven supply chain analytics.'],
                ],
            ],

            'objectives' => [
                'heading' => 'Objectives of the Certification',
                'intro' => 'Upon completing the CAISCA® certification, professionals will be able to:',
                'items' => [
                    'Apply AI and machine learning to supply chain analytics and demand forecasting.',
                    'Utilize predictive modeling to optimize inventory management and reduce costs.',
                    'Analyze and mitigate supply chain risks using AI-powered insights.',
                    'Leverage big data analytics for supplier performance and procurement decisions.',
                    'Automate supply chain operations for improved efficiency and sustainability.',
                    'Develop strategic AI applications to enhance supply chain resilience and agility.',
                ],
            ],

            'who_should_enroll' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-62.png'),
                'heading' => 'Who Should Enroll?',
                'intro' => 'The CAISCA® certification is ideal for professionals in:',
                'items' => [
                    'Supply Chain Management & Logistics',
                    'Procurement & Sourcing',
                    'Data Science & AI in Supply Chain',
                    'Operations & Inventory Management',
                    'Business Intelligence & Analytics',
                    'Transportation & Distribution Management',
                    'Manufacturing & Retail Supply Chains',
                ],
            ],

            'careers' => [
                'heading' => 'Career Path & Opportunities',
                'intro' => 'Graduates of the CAISCA® certification can pursue careers in roles such as:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'AI Supply Chain Analyst', 'text' => 'Drive AI-powered insights for supply chain optimization'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Drive AI-powered insights for supply chain optimization', 'text' => 'Drive AI-powered insights for supply chain optimization'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Inventory Optimization Manager', 'text' => 'Inventory Optimization Manager'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-63.png'), 'title' => 'Digital Logistics Specialist', 'text' => 'Implement AI-based transportation and distribution automation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Supply Chain AI Consultant', 'text' => 'Help organizations transition to AI-powered supply chains.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-64.png'), 'title' => 'Predictive Analytics Manager', 'text' => 'Use AI to forecast market demands and supply chain disruptions.'],
                ],
                'salary' => [
                    'title' => 'Average Salary Expectations',
                    'text' => 'Certified AI Supply Chain Analysts earn between $90,000 and $160,000 annually, depending on expertise, location, and industry.',
                ],
            ],

            'modules' => [
                'heading' => 'Key Certification Modules',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/technology.png'), 'title' => 'Introduction to AI in Supply Chain Management', 'text' => 'Understanding AI-driven transformations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/deep-learning-1.png'), 'title' => 'Predictive Analytics for Supply Chain Optimization', 'text' => 'AI-powered demand forecasting.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'AI in Inventory & Warehouse Management', 'text' => 'Smart storage and real-time inventory tracking.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/risk.png'), 'title' => 'Machine Learning for Logistics & Transportation', 'text' => 'AI-driven routing, scheduling, and automation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'Risk Mitigation with AI in Supply Chains', 'text' => 'AI tools for risk detection and prevention.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Supply Chain Digital Twins & IoT Integration', 'text' => 'Using AI for real-time supply chain simulations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'AI-Powered Supplier & Procurement Analytics', 'text' => 'Data-driven supplier evaluation and sourcing strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Capstone Project', 'text' => 'AI implementation in a real-world supply chain scenario.'],
                ],
            ],

            'exam_details' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/business-work-assessment-certificate-concept-600nw-2370422129.webp'),
                'heading' => 'Exam & Certification Details',
                'groups' => [
                    [
                        'items' => [
                            'Exam Format: 100 Multiple-Choice Questions (MCQs)',
                            'Duration: 2.5 hours',
                            'Passing Score: 70%',
                            'Training Mode:',
                        ],
                    ],
                    [
                        'items' => [
                            '• Instructor-Led Online Classes (4 weeks)',
                            '• Self-Paced Online Learning',
                            '• On-Demand Webinars & Case Studies',
                            'Pre-requisites: Basic understanding of supply chain, logistics, or AI.',
                            'Certification Validity: 3 Years (Renewable with Continuing Education Credits)',
                        ],
                    ],
                ],
            ],

            'why_ai' => [
                'heading' => 'Why AI in Supply Chain?',
                'items' => [
                    '20% Faster Response Time: AI-powered predictive analytics helps supply chains respond quickly to disruptions.',
                    '30% Reduction in Operational Costs: AI-driven automation reduces inefficiencies and optimizes logistics.',
                    '45% Improvement in Inventory Accuracy: AI forecasting minimizes stock shortages and overages.',
                    'Future-Proof Your Career: AI is reshaping supply chain management—stay ahead with CAISCA®',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-16.jpg'),
            ],

            'enroll' => [
                'heading' => 'Enroll Today!',
                'items' => [
                    'Take your supply chain career to the next level with AI-driven expertise.',
                    'Globally Recognized – Career-Enhancing – Practical Learning',
                ],
                'contact' => 'Register Now or Contact Us at [email protected]',
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CAISCA.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=42573'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-ai-supply-chain-analyst-caisca/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-ai-supply-chain-analyst-caisca'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The Chartered AI Supply Chain Analyst (CAISCA)® certification is a premier credential offered by AAPSCM® that equips supply chain professionals with cutting-edge AI and analytics expertise.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'CAISCA® empowers professionals with AI-driven decision-making skills, improving supply chain resilience and driving efficiency in logistics, procurement, and inventory management.',
                'show_in_nav' => false,
            ],
        );
    }
}
