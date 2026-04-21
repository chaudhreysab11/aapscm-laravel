<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredSupplyChainArtificialIntelligenceManagerCsaiMPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'Chartered Supply Chain Artificial Intelligence Manager (CSAI-M®)';

        $pageData = [
            'hero' => [
                'heading' => $title,
                'paragraphs' => [
                    'The Chartered Supply Chain Artificial Intelligence Manager (CSAI-M®) is AAPSCM’s flagship advanced credential for professionals who lead digital transformation in supply-chain intelligence. This program develops executive-level competence in AI, machine learning, predictive analytics, RPA, blockchain integration, and ethical AI governance—equipping managers to architect intelligent, autonomous, and sustainable supply networks. Through real-world simulations, case-based strategy labs, and AI-driven decision dashboards, learners master how to translate complex data into competitive advantage.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/hero.png'),
            ],

            'audience' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2026/01/1-11.png'),
                'blocks' => [
                    [
                        'heading' => 'Who Should Enroll?',
                        'intro' => 'The CSAI-M® certification is ideal for:',
                        'items' => [
                            'Senior managers, transformation leads, data-driven supply-chain strategists, and executives preparing for leadership in AI-enabled logistics, procurement, and operations.',
                        ],
                    ],
                ],
            ],

            'objectives' => [
                'heading' => 'Certification Testing Objectives',
                'intro' => 'The CSAI-M® assessment evaluates strategic, analytical, and leadership mastery across eight AI domains.',
                'items' => [
                    'Strategic AI Integration: Design and deploy AI-driven supply-chain architectures aligned with corporate strategy.',
                    'Predictive & Cognitive Analytics: Apply ML and DL models for forecasting, optimization, and decision intelligence.',
                    'Intelligent Automation & RPA: Integrate RPA and cognitive bots to reduce process latency and cost.',
                    'Blockchain–AI Convergence: Leverage decentralized systems for end-to-end transparency and smart-contract execution.',
                    'Ethical & Secure AI Governance: Implement ISO-aligned data protection, cybersecurity, and AI fairness protocols.',
                    'Sustainability & ESG Analytics: Employ AI to monitor carbon footprint, ethical sourcing, and circular-economy metrics.',
                    'Leadership & Innovation Management: Drive AI adoption, talent transformation, and cultural agility within organizations.',
                    'Global Compliance & Risk Intelligence: Use AI to ensure conformance with global trade, regulatory, and data standards.',
                ],
            ],

            'outcomes' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2026/01/1-11.png'),
                'heading' => 'Certification Learning Outcomes',
                'intro' => 'Graduates of the CSAI-M® program will be able to:',
                'items' => [
                    'Design AI transformation roadmaps for multinational supply chains.',
                    'Integrate predictive, prescriptive, and cognitive analytics for real-time decisions.',
                    'Implement intelligent automation (RPA) to streamline operations.',
                    'Establish ethical governance and compliance for AI systems.',
                    'Drive sustainable and circular-economy strategies using AI insights.',
                    'Combine blockchain and AI for transparent, fraud-resistant supply networks.',
                    'Lead diverse teams through AI-enabled change and digital maturity.',
                ],
            ],

            'modules' => [
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-23.png'), 'title' => 'Robotics Process Automation (RPA) in Supply Chains', 'bullets' => [
                        'Automating procurement, logistics, and warehouse workflows.',
                        'Integrating RPA and AI for adaptive, self-learning processes.',
                        'Measuring ROI, productivity, and efficiency from automation initiatives.',
                    ]],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-13.png'), 'title' => 'AI-Enabled Customer Relationship & Demand Sensing', 'bullets' => [
                        'Predictive analytics for customer behavior and demand forecasting.',
                        'AI personalization and service optimization.',
                        'Conversational AI for customer engagement and support.',
                    ]],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-9.png'), 'title' => 'Developing Executive AI Strategies for Supply Chain Leaders', 'bullets' => [
                        'Strategic roadmapping for intelligent transformation.',
                        'AI investment planning and financial modeling.',
                        'Building organizational AI literacy and change-management capacity.',
                    ]],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/4-7.png'), 'title' => 'Legal, Ethical, and Security Implications of AI', 'bullets' => [
                        'Governance frameworks for fair and transparent AI.',
                        'Cybersecurity protocols and regulatory compliance (GDPR, ISO 27001).',
                        'Managing AI risk and digital ethics in global supply networks.',
                    ]],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-5.png'), 'title' => 'Predictive Analytics and Cognitive Forecasting', 'bullets' => [
                        'Advanced ML/DL forecasting for demand, capacity, and risk.',
                        'Decision intelligence dashboards for scenario visualization.',
                        'AI-based modeling for uncertainty and resilience planning.',
                    ]],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/6-4.png'), 'title' => 'AI-Driven Logistics, Smart Warehousing, and Autonomous Delivery', 'bullets' => [
                        'Predictive fleet routing and cost optimization.',
                        'AI robotics and CV in smart warehouse management.',
                        'Drone and autonomous-vehicle delivery frameworks.',
                    ]],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-23.png'), 'title' => 'AI for Sustainable and Ethical Supply Chains', 'bullets' => [
                        'AI in carbon-emission tracking and energy optimization.',
                        'Responsible sourcing and ESG compliance automation.',
                        'Circular-economy modeling using AI data insights.',
                    ]],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-13.png'), 'title' => 'Blockchain and AI Integration for Secure Networks', 'bullets' => [
                        'Blockchain–AI convergence for material traceability.',
                        'Smart contracts for automated procurement execution.',
                        'Decentralized analytics and predictive trust modeling.',
                    ]],
                ],
            ],

            'exam_details' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/business-work-assessment-certificate-concept-600nw-2370422129.webp'),
                'heading' => 'Exam Details',
                'groups' => [
                    [
                        'items' => [
                            'Format: 100 Multiple-Choice Questions (MCQs)',
                            'Duration: 90 Minutes',
                            'Passing Score: 70%',
                            'Mode: Online (Proctored)',
                            'Retake Policy: One retake permitted after 3 months',
                            'Prerequisite: Completion of AC-SCAI® or equivalent AI/Supply-Chain experience',
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

            'differentiators' => [
                'heading' => 'Why Get Certified With AAPSCM®?',
                'intro' => 'Choosing AAPSCM® means partnering with one of the world’s most trusted certifying bodies in procurement and supply-chain excellence.',
                'subheading' => 'What sets us apart:',
                'items' => [
                    ['title' => 'Global Recognition:', 'text' => 'Trusted in 60+ countries by top corporations and universities.'],
                    ['title' => 'Accredited Standards:', 'text' => 'Fully aligned with ISO 17024, ANSI–ANAB, and NCCA frameworks.'],
                    ['title' => 'Elite Faculty & Industry Mentors:', 'text' => 'Learn directly from global AI and logistics leaders.'],
                    ['title' => 'Career Mobility:', 'text' => '92 % of graduates report career advancement within 12 months.'],
                    ['title' => 'Verified Credentials:', 'text' => 'Blockchain-secured digital badges for instant online verification'],
                    ['title' => 'Sustainability Commitment:', 'text' => 'Programs integrate ESG, circular-economy, and ethical AI principles.'],
                ],
                'closing' => 'Join 4,000+ professionals worldwide advancing the future of digital supply chains with AAPSCM®.',
                'closing2' => 'Join a global community of certified AI leaders driving the digital transformation of supply networks worldwide.',
            ],

            'careers' => [
                'heading' => 'Career Paths',
                'intro' => 'Graduates of the CSAI-M® program advance into roles such as:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'Chief AI & Supply-Chain Officer'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'AI Strategy & Transformation Lead'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Digital Supply-Chain Director'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'AI and Automation Program Manager'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Predictive Analytics & Forecasting Specialist'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Blockchain & AI Supply-Network Consultant'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Global Operations Data Scientist'],
                ],
            ],

            'stats' => [
                'items' => [
                    ['text' => 'AI-driven supply-chain roles will expand by 35–40 % through 2035.'],
                    ['text' => 'Enterprises using AI in logistics achieve 40 % cost efficiency and 45 % higher resiliency.'],
                    ['text' => 'Demand is surging across manufacturing, defense, healthcare, energy, retail, and government sectors.'],
                ],
            ],

            'credential' => [
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/6-3.png'), 'title' => 'Designation Earned:', 'text' => 'Chartered Supply Chain Artificial Intelligence Manager (CSAI-M®)'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-3.png'), 'title' => 'Awarded By:', 'text' => 'American Association of Procurement, Supply Chain & Tourism Management (AAPSCM®)'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/7-2.png'), 'title' => 'Credential Type:', 'text' => 'Official Digital Certificate + Blockchain-Verified Badge'],
                ],
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=45217'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-supply-chain-artificial-intelligence-manager-csai-m/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-supply-chain-artificial-intelligence-manager-csai-m'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The Chartered Supply Chain Artificial Intelligence Manager (CSAI-M®) is AAPSCM’s flagship advanced credential for professionals who lead digital transformation in supply-chain intelligence.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'CSAI-M® is AAPSCM’s flagship advanced credential developing executive-level competence in AI, machine learning, predictive analytics, RPA, blockchain integration, and ethical AI governance for intelligent supply networks.',
                'show_in_nav' => false,
            ],
        );
    }
}
