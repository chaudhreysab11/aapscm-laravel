<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCertifiedAiAmpRpaProcurementProfessionalCairppPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'Certified AI & RPA Procurement Professional (CAIRPP)®';

        $pageData = [
            'hero' => [
                'heading' => 'Harness AI & Robotic Process Automation (RPA) to Revolutionize Procurement',
                'paragraphs' => [
                    'The Certified AI & RPA Procurement Professional (CAIRPP)® certification, offered by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®), is a cutting-edge credential designed for professionals seeking to integrate Artificial Intelligence (AI) and Robotic Process Automation (RPA) into procurement processes. AI and RPA are transforming procurement by enhancing efficiency, reducing manual tasks, automating workflows, and optimizing decision-making. The CAIRPP® certification equips professionals with the skills to leverage AI-driven analytics, automate procurement operations, and implement intelligent sourcing strategies, making them indispensable in the future of procurement.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-65.png'),
            ],

            'why_choose' => [
                'heading' => 'Why Choose CAIRPP®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/02/operation.png'), 'title' => 'Future-Ready Skills', 'text' => 'Gain expertise in AI-powered procurement automation, intelligent supplier management, and RPA-driven efficiencies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/learning.png'), 'title' => 'Hands-On Learning', 'text' => 'Engage in real-world AI & RPA procurement simulations and case studies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/02/machine-learning.png'), 'title' => 'High Industry Demand', 'text' => 'Businesses are rapidly adopting AI and RPA to streamline procurement, creating demand for certified professionals.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/internet.png'), 'title' => 'Global Recognition', 'text' => 'CAIRPP® is a globally respected credential, highly valued in procurement, supply chain, and AI sectors.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'Career Growth', 'text' => 'Stay ahead of the competition with in-demand skills in AI-driven procurement automation and digital transformation.'],
                ],
            ],

            'why_aapscm' => [
                'heading' => 'Why Get Certified Through AAPSCM®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/worldwide.png'), 'title' => 'Globally Recognized & Industry-Aligned Certification', 'text' => 'AAPSCM® is a globally recognized authority in procurement, supply chain, and logistics management. Our certifications are aligned with the latest AI and RPA procurement trends, ensuring professionals are equipped with future-proof skills.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/presentation.png'), 'title' => 'AI & RPA-Focused Procurement Training', 'text' => 'Unlike traditional procurement certifications, CAIRPP® emphasizes AI, machine learning, and RPA to automate workflows, enhance supplier insights, and optimize sourcing strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/flexibility.png'), 'title' => 'Flexible & Practical Learning Experience', 'text' => 'AAPSCM® offers multiple learning formats, including instructor-led training, self-paced courses, and case-based projects, ensuring a comprehensive, real-world learning experience.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/neural.png'), 'title' => 'Exclusive Networking & Career Advancement', 'text' => 'Certified professionals gain access to an elite network of procurement, AI, and RPA professionals, along with industry events, mentorship programs, and career growth opportunities.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/profile.png'), 'title' => 'Practical, Industry-Validated Curriculum', 'text' => 'The CAIRPP® certification is designed with input from top procurement and AI experts, ensuring real-world applications, AI-driven procurement case studies, and hands-on tools for procurement automation.'],
                ],
            ],

            'objectives' => [
                'heading' => 'Objectives of the Certification',
                'intro' => 'Upon completion of the American Certified AI & RPA Procurement Professional (CAIRPP)®, professionals will be able to:',
                'items' => [
                    'Implement AI and RPA to automate procurement processes and optimize efficiency.',
                    'Utilize machine learning for supplier evaluation, contract management, and cost reduction.',
                    'Leverage predictive analytics for strategic sourcing and procurement forecasting.',
                    'Design and implement AI-powered procurement chatbots and digital assistants.',
                    'Optimize procurement workflows using robotic process automation.',
                    'Ensure compliance and governance in AI-driven procurement strategies.',
                    'Mitigate risks through AI-powered decision-making and fraud detection.',
                ],
            ],

            'who_should_enroll' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-67.png'),
                'heading' => 'Who Should Enroll?',
                'intro' => 'The CAIRPP® certification is ideal for:',
                'items' => [
                    'Procurement & Sourcing Professionals',
                    'Supply Chain & Logistics Managers',
                    'AI & Data Science Enthusiasts in Procurement',
                    'Digital Transformation Leaders in Supply Chain',
                    'RPA & Automation Specialists in Procurement',
                    'Vendor Risk & Contract Management Experts',
                    'Business Intelligence & Analytics Professionals',
                ],
            ],

            'careers' => [
                'heading' => 'Career Path & Opportunities',
                'intro' => 'Graduates of the CAIRPP® certification can pursue careers in:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'AI & RPA Procurement Specialist', 'text' => 'Implement AI-driven automation in procurement operations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Procurement Digital Transformation Manager', 'text' => 'Lead AI and RPA adoption for smart procurement.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Strategic Sourcing & AI Procurement Consultant', 'text' => 'Develop AI-based sourcing strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'Vendor Risk & Compliance Analyst', 'text' => 'Use AI and RPA to assess and mitigate procurement risks.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Procurement Data & Automation Analyst', 'text' => 'Leverage AI-powered analytics for procurement insights.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'AI Contract & Supplier Relationship Manager', 'text' => 'AI Contract & Supplier Relationship Manager'],
                ],
                'salary' => [
                    'title' => 'Average Salary Expectations',
                    'text' => 'Certified AI & RPA Procurement Professionals can expect an average annual salary of $90,000 – $160,000, depending on experience, industry, and region.',
                ],
            ],

            'modules' => [
                'heading' => 'Key Certification Modules',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/technology.png'), 'title' => 'Introduction to AI & RPA in Procurement', 'text' => 'Understanding AI and RPA fundamentals in procurement.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/operation.png'), 'title' => 'Machine Learning for Procurement Optimization', 'text' => 'AI-driven supplier selection and contract automation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'AI & RPA-Enabled Strategic Sourcing', 'text' => 'Automating sourcing decisions using AI analytics.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/robotics.png'), 'title' => 'Robotic Process Automation in Procurement', 'text' => 'Automating procurement workflows and transactions.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'AI-Driven Risk Management & Fraud Detection', 'text' => 'Using AI for procurement compliance and security.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/blockchain.png'), 'title' => 'Smart Procurement Contracts & Blockchain', 'text' => 'Leveraging AI and blockchain for secure contract automation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'AI-Powered Procurement Dashboards & Analytics', 'text' => 'Implementing AI-powered decision-making tools.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Capstone Project', 'text' => 'Applying AI & RPA automation strategies in procurement.'],
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
                            'Pre-requisites: Basic understanding of procurement, supply chain, or AI fundamentals.',
                            'Certification Validity: 3 Years (Renewable with Continuing Education Credits)',
                        ],
                    ],
                ],
            ],

            'why_ai' => [
                'heading' => 'Why AI in Procurement?',
                'items' => [
                    '60% Time Savings: RPA reduces procurement cycle time by automating repetitive tasks.',
                    '40% Cost Reduction: AI-driven analytics and automation optimize procurement spending.',
                    '35% Higher Supplier Efficiency: AI improves supplier selection, monitoring, and compliance.',
                    'Future-Proof Your Career: AI and RPA are reshaping procurement—be at the forefront with CAIRPP®.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1715532301487.jpg'),
            ],

            'enroll' => [
                'heading' => 'Enroll Today!',
                'items' => [
                    'Join the next cohort and become a leader in AI & RPA-driven procurement transformation.',
                    'Globally Recognized – Career-Enhancing – Practical Learning',
                ],
                'contact' => 'Register Now or Contact Us at [email protected]',
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CAIRPP.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees : Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=42584'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-certified-ai-rpa-procurement-professional-cairpp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'certified-ai-amp-rpa-procurement-professional-cairpp'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The Certified AI & RPA Procurement Professional (CAIRPP)® certification is a cutting-edge AAPSCM® credential for professionals integrating AI and Robotic Process Automation into procurement processes.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'CAIRPP® equips professionals with skills to leverage AI-driven analytics, automate procurement operations, and implement intelligent sourcing strategies for the future of procurement.',
                'show_in_nav' => false,
            ],
        );
    }
}
