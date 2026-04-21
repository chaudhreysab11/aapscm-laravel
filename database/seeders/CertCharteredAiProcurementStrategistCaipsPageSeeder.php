<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredAiProcurementStrategistCaipsPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'Chartered AI Procurement Strategist (CAIPS)®';

        $pageData = [
            'hero' => [
                'heading' => 'Transforming Procurement through AI-Powered Innovation',
                'paragraphs' => [
                    'The Chartered AI Procurement Strategist (CAIPS)® certification is a premier credential offered by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®), designed for professionals who want to integrate artificial intelligence (AI) into procurement and supply chain strategies. In today’s fast-paced business environment, leveraging AI-driven insights and automation in procurement can enhance efficiency, reduce costs, and drive data-driven decision-making. This certification equips professionals with the knowledge and expertise to apply AI, machine learning, and predictive analytics to procurement operations, ensuring sustainable, ethical, and intelligent sourcing strategies.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/hero.png'),
            ],

            'why_choose' => [
                'heading' => 'Why Choose CAIPS®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/02/operation.png'), 'title' => 'Industry-Relevant Curriculum', 'text' => 'Focused on AI-driven procurement models, smart contract automation, supplier risk assessment, and ethical AI applications.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/02/automation.png'), 'title' => 'Career Growth & Competitive Edge', 'text' => 'Equips professionals with sought-after skills in AI-driven procurement strategy, enhancing employability and career progression.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/02/machine-learning.png'), 'title' => 'Real-World Applications', 'text' => 'Case studies, simulations, and AI tools provide hands-on experience in procurement innovation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/02/cyber-security.png'), 'title' => 'Global Recognition', 'text' => 'Earn a prestigious credential recognized by top organizations worldwide.'],
                ],
            ],

            'objectives' => [
                'heading' => 'Objectives of the Certification',
                'intro' => 'Upon completion of the Chartered AI Procurement Strategist (CAIPS)®, professionals will be able to:',
                'items' => [
                    'Understand and implement AI technologies in procurement and supplier management.',
                    'Leverage AI-driven analytics for procurement forecasting, risk mitigation, and decision-making.',
                    'Apply machine learning models to optimize supply chain sourcing and contract negotiations.',
                    'Develop and manage AI-powered procurement automation systems to improve efficiency.',
                    'Ensure compliance with ethical AI procurement practices and governance.',
                    'Utilize data science methodologies to streamline procurement operations.',
                ],
            ],

            'who_should_enroll' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-57.png'),
                'heading' => 'Who Should Enroll?',
                'intro' => 'The CAIPS® certification is ideal for:',
                'items' => [
                    'Procurement Managers & Executives',
                    'Supply Chain & Logistics Professionals',
                    'AI & Data Science Enthusiasts in Procurement',
                    'Sourcing & Vendor Management Experts',
                    'Digital Transformation Leaders',
                    'Business Intelligence & Analytics Professionals',
                    'IT & AI Professionals focusing on Procurement Tech',
                ],
            ],

            'careers' => [
                'heading' => 'Career Path & Opportunities',
                'intro' => 'Graduates of the CAIPS® certification can pursue careers in the following roles:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'AI Procurement Strategist', 'text' => 'Drive AI integration in procurement for cost-saving and efficiency.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Supply Chain Data Analyst', 'text' => 'Use AI tools for procurement forecasting and data-driven decision-making.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Procurement Innovation Manager', 'text' => 'Implement AI-powered automation and smart contract systems.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'Vendor Risk & Compliance Analyst', 'text' => 'Assess AI-driven risk analysis for ethical procurement.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'AI Sourcing Consultant', 'text' => 'Advise companies on AI-powered procurement strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Digital Procurement Specialist', 'text' => 'Leverage AI for digital procurement transformation.'],
                ],
                'salary' => [
                    'title' => 'Average Salary Expectations',
                    'text' => 'Certified AI Procurement Strategists with AAPSCM® can expect an average annual salary between $85,000 and $150,000, depending on experience, industry, and region.',
                ],
            ],

            'modules' => [
                'heading' => 'Key Certification Modules',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/technology.png'), 'title' => 'Advanced AI in Procurement', 'text' => 'Understanding AI techniques and applications in procurement.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/deep-learning-1.png'), 'title' => 'Machine Learning for Supplier Management', 'text' => 'AI-driven supplier evaluation and performance prediction.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'Procurement Data Analytics & Forecasting', 'text' => 'Leveraging big data and AI for procurement decisions.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/risk.png'), 'title' => 'AI-Powered Contract & Risk Management', 'text' => 'Using AI to mitigate risks and streamline contract negotiations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'Ethical & Responsible AI in Procurement', 'text' => 'Ensuring compliance and governance in AI adoption.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Automation in Procurement Operations', 'text' => 'Implementing AI-powered procurement automation tools.'],
                ],
            ],

            'why_aapscm' => [
                'heading' => 'Why Get Certified Through AAPSCM®?',
                'subheading' => 'Globally Recognized & Industry-Aligned Certification',
                'paragraph' => 'AAPSCM® is a globally recognized professional body in procurement, supply chain, and logistics management. Our certifications align with the latest industry advancements and global procurement trends.',
                'items' => [
                    ['title' => 'Cutting-Edge AI & Procurement Integration', 'text' => 'Unlike traditional procurement certifications, CAIPS® focuses on AI-driven decision-making, automation, and data analytics, ensuring professionals are equipped with future-ready skills.'],
                    ['title' => 'Flexible & Practical Learning Experience', 'text' => 'AAPSCM® offers instructor-led training, self-paced learning, and real-world procurement case studies, allowing professionals to gain hands-on AI procurement experience.'],
                    ['title' => 'Professional Networking & Career Advancement', 'text' => 'AAPSCM® provides access to an exclusive network of AI procurement experts, top industry professionals, and career-enhancing opportunities.'],
                    ['title' => 'Practical, Industry-Validated Curriculum', 'text' => 'The CAIPS® certification is designed with industry input, ensuring real-world applications, AI-powered procurement case studies, and hands-on tools for procurement success.'],
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
                            'Passing Score: 60%',
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
                    '50% Faster Decision-Making: AI tools enhance data-driven procurement strategies.',
                    '30% Reduction in Procurement Costs: AI-powered automation and predictive analytics optimize sourcing.',
                    '40% More Supplier Transparency: AI improves supplier evaluation, compliance, and sustainability tracking.',
                    'Future-Proof Your Career: AI is revolutionizing procurement, and this certification keeps you ahead of the curve.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/pf.png'),
            ],

            'enroll' => [
                'heading' => 'Enroll Today!',
                'items' => [
                    'Join the next cohort and become a leader in AI-driven procurement strategy.',
                    'Global Recognition – Career Advancement – Practical Learning',
                ],
                'contact' => 'Register Now or Contact Us at [email protected]',
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CAIPS.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=42562'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-ai-procurement-strategist-caips/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-ai-procurement-strategist-caips'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The Chartered AI Procurement Strategist (CAIPS)® certification is a premier credential offered by AAPSCM® for professionals who want to integrate artificial intelligence into procurement and supply chain strategies.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'CAIPS® equips professionals with AI, machine learning, and predictive analytics skills for sustainable, ethical, and intelligent procurement and sourcing strategies.',
                'show_in_nav' => false,
            ],
        );
    }
}
