<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredSustainableProcurementEsgAiManagerCspeaiPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'Chartered Sustainable Procurement & ESG AI Manager (CSPEAI)®';

        $pageData = [
            'hero' => [
                'heading' => 'Leading Sustainable Procurement with AI & ESG Innovation',
                'paragraphs' => [
                    'The Chartered Sustainable Procurement & ESG AI Manager (CSPEAI)® certification, offered by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®), is a premier credential for professionals integrating Artificial Intelligence (AI), Environmental, Social, and Governance (ESG) principles, and sustainable procurement strategies into modern supply chains. As organizations shift towards ethical, sustainable, and transparent procurement, AI is playing a critical role in automating ESG compliance, optimizing sustainable sourcing, and enhancing risk mitigation. The CSPEAI® certification empowers professionals with the expertise to leverage AI-driven analytics, ethical sourcing models, and ESG-driven procurement strategies to create responsible and sustainable supply chains.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-68.png'),
            ],

            'why_choose' => [
                'heading' => 'Why Choose CSPEAI®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/curriculum-1.png'), 'title' => 'Future-Ready Skills', 'text' => 'Gain expertise in AI-powered ESG analytics, sustainability-driven procurement, and ethical sourcing.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/learning.png'), 'title' => 'Hands-On Learning', 'text' => 'Apply AI and ESG tools in real-world sustainable procurement scenarios.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/infrastructure.png'), 'title' => 'High Industry Demand', 'text' => 'Organizations worldwide prioritize sustainable and ESG-compliant procurement, driving demand for certified professionals.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/internet.png'), 'title' => 'Global Recognition', 'text' => 'The CSPEAI® certification is internationally recognized, ensuring career mobility and leadership in responsible procurement.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/advance.png'), 'title' => 'Career Growth', 'text' => 'Enhance your credentials with in-demand skills in AI-driven ESG reporting, sustainable sourcing, and compliance automation.'],
                ],
            ],

            'why_aapscm' => [
                'heading' => 'Why Get Certified Through AAPSCM®?',
                'subheading' => 'Globally Recognized & Industry-Aligned Certification',
                'paragraph' => 'AAPSCM® is a leading global body in procurement, supply chain, and logistics, ensuring certifications that align with evolving sustainability, ESG, and AI-driven procurement trends.',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/presentation.png'), 'title' => 'AI & ESG-Focused Procurement Training', 'text' => 'Unlike traditional procurement certifications, CSPEAI® integrates AI-driven sustainability insights, ESG compliance automation, and responsible supply chain management strategies, ensuring professionals remain ahead of industry trends.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/career-promotion.png'), 'title' => 'Exclusive Networking & Career Advancement', 'text' => 'Certified professionals gain access to an elite network of procurement, ESG, and AI professionals, along with mentorship programs, industry events, and career growth opportunities.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/flexibility.png'), 'title' => 'Flexible & Practical Learning Experience', 'text' => 'AAPSCM® offers instructor-led training, self-paced courses, and hands-on case studies, providing practical, real-world experience in AI-driven ESG procurement.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/curriculum-2.png'), 'title' => 'Industry-Validated Curriculum', 'text' => 'The CSPEAI® certification is designed in collaboration with sustainability experts, AI procurement specialists, and industry leaders, ensuring practical applications and AI-powered ESG case studies.'],
                ],
            ],

            'objectives' => [
                'heading' => 'Objectives of the Certification',
                'intro' => 'Upon completion of the Chartered Sustainable Procurement & ESG AI Manager (CSPEAI)®, professionals will be able to:',
                'items' => [
                    'Implement AI and machine learning for ESG-driven procurement optimization.',
                    'Develop sustainable sourcing strategies aligned with global ESG regulations.',
                    'Automate ESG compliance monitoring using AI-driven analytics.',
                    'Integrate carbon footprint tracking and supply chain risk assessment using AI tools.',
                    'Optimize ethical procurement practices through AI-powered supplier audits.',
                    'Leverage AI-based sustainability forecasting models for ESG reporting.',
                    'Drive corporate social responsibility (CSR) initiatives using AI-enhanced procurement insights.',
                ],
            ],

            'who_should_enroll' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-69.png'),
                'heading' => 'Who Should Enroll?',
                'intro' => 'The CSPEAI® certification is ideal for:',
                'items' => [
                    'Sustainability & ESG Procurement Leaders',
                    'AI & Data Science Professionals in Supply Chain',
                    'Compliance & Corporate Social Responsibility (CSR) Experts',
                    'Supply Chain & Procurement Managers',
                    'Digital Transformation Leaders in ESG',
                    'AI-Powered Sustainable Sourcing Specialists',
                    'Environmental & Ethical Supply Chain Analysts',
                ],
            ],

            'careers' => [
                'heading' => 'Career Path & Opportunities',
                'intro' => 'Graduates of the CSPEAI® certification can pursue careers in :',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'Sustainable Procurement & ESG AI Manager', 'text' => 'Lead AI-driven sustainable procurement strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'AI & ESG Compliance Specialist', 'text' => 'Use AI tools to track and ensure ESG regulatory compliance.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Ethical & Responsible Sourcing Consultant', 'text' => 'Develop AI-based supplier evaluation frameworks.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-63.png'), 'title' => 'AI-Powered Sustainable Supply Chain Analyst', 'text' => 'Leverage AI for carbon footprint reduction and sustainability monitoring.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Corporate Social Responsibility (CSR) & ESG Strategy Lead', 'text' => 'Implement AI-driven reporting and ethical procurement policies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-64.png'), 'title' => 'AI-Enhanced Environmental & Supply Chain Risk Manager', 'text' => 'Automate ESG and sustainability risk assessment.'],
                ],
                'salary' => [
                    'title' => 'Average Salary Expectations',
                    'text' => 'Certified Sustainable Procurement & ESG AI Managers earn between $95,000 – $170,000 annually, depending on experience, location, and industry sector.',
                ],
            ],

            'modules' => [
                'heading' => 'Key Certification Modules',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/save-the-world.png'), 'title' => 'AI in Sustainable Procurement & ESG Compliance', 'text' => 'Understanding AI’s role in ESG-driven procurement.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/performance.png'), 'title' => 'AI-Powered Carbon Footprint Tracking', 'text' => 'Leveraging AI for sustainability and environmental impact monitoring.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/evaluation.png'), 'title' => 'Automated ESG Compliance & Risk Assessment', 'text' => 'AI-driven monitoring of ESG regulations and ethical sourcing.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/save-the-world.png'), 'title' => 'AI in Sustainable Supplier Evaluation', 'text' => 'Using AI to ensure supplier transparency and compliance.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/blockchain.png'), 'title' => 'Blockchain & AI for Sustainable Sourcing', 'text' => 'Enhancing procurement integrity through AI and blockchain.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/social.png'), 'title' => 'Ethical AI & Procurement Responsibility', 'text' => 'Ensuring ethical AI applications in supply chain management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'Predictive Analytics for ESG Procurement Forecasting', 'text' => 'AI-powered risk and demand planning.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Capstone Project', 'text' => 'Developing AI-powered sustainability strategies in procurement.'],
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
                    '65% Efficiency Gains: AI-driven ESG procurement automation reduces manual processes.',
                    '50% Risk Reduction: AI improves ESG compliance and sustainable supply chain resilience.',
                    '40% Cost Savings in Procurement: AI-powered analytics optimize sustainable sourcing decisions.',
                    'Future-Proof Your Career:ESG and AI are reshaping procurement—be at the forefront with CSPEAI®.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-72.png'),
            ],

            'enroll' => [
                'heading' => 'Enroll Today!',
                'items' => [
                    'Join the next cohort and become a leader in AI-powered sustainable procurement.',
                    'Globally Recognized – Career-Enhancing – Practical Learning',
                ],
                'contact' => 'Register Now or Contact Us at [email protected]',
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CSPEAI.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=42596'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-sustainable-procurement-esg-ai-manager-cspeai/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-sustainable-procurement-esg-ai-manager-cspeai'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The Chartered Sustainable Procurement & ESG AI Manager (CSPEAI)® certification is a premier AAPSCM® credential for professionals integrating AI, ESG principles, and sustainable procurement strategies into modern supply chains.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'CSPEAI® empowers professionals with expertise to leverage AI-driven analytics, ethical sourcing models, and ESG-driven procurement strategies to create responsible and sustainable supply chains.',
                'show_in_nav' => false,
            ],
        );
    }
}
