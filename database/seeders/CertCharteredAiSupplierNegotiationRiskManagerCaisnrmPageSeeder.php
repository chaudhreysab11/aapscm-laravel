<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredAiSupplierNegotiationRiskManagerCaisnrmPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'Chartered AI Supplier Negotiation & Risk Manager (CAISNRM)®';

        $pageData = [
            'hero' => [
                'heading' => 'Enhancing Supplier Negotiation & Risk Management with AI',
                'paragraphs' => [
                    'The Chartered AI Supply Chain Analyst (CAISCA)® certification, offered by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®), is a premier professional credential designed to equip supply chain professionals with cutting-edge AI and analytics expertise. With AI and machine learning transforming global supply chains, businesses are leveraging predictive analytics, automation, and intelligent forecasting to optimize operations and reduce risks. The CAISCA® certification empowers professionals with the skills to apply AI-driven decision-making, improve supply chain resilience, and drive efficiency in logistics, procurement, and inventory management.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-77.png'),
            ],

            'why_choose' => [
                'heading' => 'Why Choose CAISNRM®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/evaluation-1.png'), 'title' => 'AI-Powered Negotiation & Risk Management', 'text' => 'Gain expertise in AI-driven supplier negotiations, predictive analytics, and risk mitigation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/learning.png'), 'title' => 'Hands-On Learning', 'text' => 'Work on real-world case studies using AI tools for supplier management and risk analysis.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/infrastructure.png'), 'title' => 'High Industry Demand', 'text' => 'Businesses increasingly rely on AI for strategic supplier relations and risk management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/internet.png'), 'title' => 'Global Recognition', 'text' => 'CAISNRM® is an internationally recognized certification in procurement, supplier management, and risk analysis.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/advance.png'), 'title' => 'Career Growth', 'text' => 'Master AI-driven supplier negotiations and risk management to elevate your career.'],
                ],
            ],

            'why_aapscm' => [
                'heading' => 'Why Get Certified Through AAPSCM®?',
                'subheading' => 'Globally Recognized & Industry-Aligned Certification',
                'paragraph' => 'AAPSCM® is a globally respected body specializing in procurement, supply chain, and supplier management, ensuring that the CAISNRM® certification is aligned with current industry demands and future innovations.',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/ai.png'), 'title' => 'AI & Data-Driven Negotiation Training', 'text' => 'Unlike traditional negotiation certifications, CAISNRM® integrates AI-driven contract optimization, risk assessment, supplier behavior analytics, and predictive modeling, ensuring professionals stay ahead of industry trends.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/self-learning.png'), 'title' => 'Exclusive Networking & Career Opportunities', 'text' => 'Certified professionals gain access to an elite network of procurement, AI, and risk management professionals, along with mentorship programs, industry conferences, and career growth opportunities.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/career-promotion.png'), 'title' => 'Flexible & Practical Learning Experience', 'text' => 'AAPSCM® offers instructor-led training, self-paced learning, and AI-powered supplier negotiation simulations, providing practical, real-world training.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/curriculum-2.png'), 'title' => 'Industry-Validated Curriculum', 'text' => 'The CAISNRM® certification is designed in collaboration with procurement strategists, AI specialists, and risk management experts, ensuring practical applications of AI in supplier negotiations and procurement risk management.'],
                ],
            ],

            'objectives' => [
                'heading' => 'Objectives of the Certification',
                'intro' => 'Upon completion of the Chartered AI Supplier Negotiation & Risk Manager (CAISNRM)®, professionals will be able to:',
                'items' => [
                    'Leverage AI and data analytics to enhance supplier negotiations and contract management.',
                    'Use machine learning algorithms for supplier performance evaluation and risk mitigation.',
                    'Apply predictive analytics to assess supplier financial, operational, and compliance risks.',
                    'Optimize contract terms through AI-driven negotiation strategies and automated contract analysis.',
                    'Implement AI-powered risk mitigation frameworks for procurement resilience.',
                    'Utilize AI chatbots and digital assistants for real-time supplier communication and dispute resolution.',
                    'Develop AI-enhanced contingency planning models for supply chain risk management.',
                ],
            ],

            'who_should_enroll' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-78.png'),
                'heading' => 'Who Should Enroll?',
                'intro' => 'The CAISNRM® certification is ideal for:',
                'items' => [
                    'Procurement & Supplier Relationship Managers',
                    'AI & Data Science Professionals in Procurement',
                    'Risk Management & Compliance Officers',
                    'Sourcing & Contract Negotiation Specialists',
                    'Vendor Risk Analysts & Supplier Auditors',
                    'Business Intelligence & Predictive Analytics Professionals',
                    'Corporate & Strategic Negotiation Experts',
                ],
            ],

            'careers' => [
                'heading' => 'Career Path & Opportunities',
                'intro' => 'Graduates of the CAISNRM®certification can pursue careers in :',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'AI Supplier Negotiation Strategist', 'text' => 'Use AI tools for supplier contract negotiations and cost optimization.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Procurement Risk & Compliance Manager', 'text' => 'Implement AI-driven risk assessment frameworks.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Supplier Risk Analyst', 'text' => 'Leverage predictive analytics to assess supplier risk and compliance.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-63.png'), 'title' => 'Contract & Vendor Relationship Manager', 'text' => 'Use AI to automate and optimize contract management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Strategic Sourcing & AI Procurement Consultant', 'text' => 'Advise companies on AI-driven supplier negotiation and risk management strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-64.png'), 'title' => 'AI Procurement Transformation Leader', 'text' => 'Drive AI-powered supplier engagement and strategic risk planning.'],
                ],
                'salary' => [
                    'title' => 'Average Salary Expectations',
                    'text' => 'Certified AI Supplier Negotiation & Risk Managers earn between $95,000 – $180,000 annually, depending on expertise, industry, and location.',
                ],
            ],

            'modules' => [
                'heading' => 'Key Certification Modules',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/technology.png'), 'title' => 'AI in Supplier Negotiation & Contract Optimization', 'text' => 'Understanding AI’s role in ESG-driven procurement.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/deep-learning-1.png'), 'title' => 'Predictive Analytics for Supplier Risk Assessment', 'text' => 'Leveraging AI for supplier performance and risk evaluation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'Machine Learning for Contract Management', 'text' => 'Automating contract analysis and negotiations using AI.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/risk.png'), 'title' => 'AI-Powered Supplier Performance Monitoring', 'text' => 'Using AI to track supplier reliability and compliance.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'Risk Mitigation & AI-Driven Contingency Planning', 'text' => 'AI strategies for reducing supplier and procurement risks.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'AI & Blockchain in Supplier Agreements', 'text' => 'Enhancing contract transparency and security using blockchain and AI.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'Intelligent Dispute Resolution & AI Chatbots', 'text' => 'Automating supplier communication and conflict resolution.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Capstone Project', 'text' => 'Practical implementation of AI in supplier negotiations and risk management.'],
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
                    '40% Faster Supplier Negotiations: AI-driven contract analysis and negotiation insights.',
                    '35% Cost Savings:AI-powered contract optimization and automated risk detection.',
                    '50% More Efficient Risk Management: AI-enhanced supplier risk analytics and predictive modeling.',
                    'Future-Proof Your Career:AI-driven supplier management and risk mitigation are key trends in procurement strategy.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-79.png'),
            ],

            'enroll' => [
                'heading' => 'Enroll Today!',
                'items' => [
                    'Take the next step in your career and become a leader in AI-powered supplier negotiation & risk management.',
                    'Globally Recognized – Career-Enhancing – Practical Learning',
                ],
                'contact' => 'Register Now or Contact Us at [email protected]',
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CAISNRM.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees : Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=42607%20'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-ai-supplier-negotiation-risk-manager-caisnrm/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-ai-supplier-negotiation-risk-manager-caisnrm'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The Chartered AI Supplier Negotiation & Risk Manager (CAISNRM)® certification equips procurement professionals with AI-driven supplier negotiation, predictive analytics, and risk mitigation expertise.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'CAISNRM® empowers professionals to leverage AI for supplier negotiations, contract optimization, and procurement risk management.',
                'show_in_nav' => false,
            ],
        );
    }
}
