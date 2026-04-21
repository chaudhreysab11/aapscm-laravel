<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedSupplyChainArtificialIntelligenceAiProfessionalAcScaiPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'American Certified Supply Chain Artificial Intelligence (AI) Professional – AC-SCAI®';

        $pageData = [
            'hero' => [
                'heading' => $title,
                'paragraphs' => [
                    'The American Certified Supply Chain Artificial Intelligence (AI) Professional – AC-SCAI® is a globally recognized credential designed for professionals who want to lead the next wave of digital transformation in supply chains. This advanced program blends machine learning, predictive analytics, automation, blockchain, and data ethics to help organizations build resilient, efficient, and sustainable AI-driven ecosystems.',
                    'Participants gain the expertise to leverage AI across demand forecasting, procurement, logistics, and sustainability, translating analytics into real-world strategic impact. Through hands-on projects, case simulations, and global best-practice models, learners graduate ready to deliver measurable results in any industry.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/hero.png'),
            ],

            'audience' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2026/01/1.png'),
                'blocks' => [
                    [
                        'heading' => 'Who Should Enroll?',
                        'items' => [
                            'Supply chain managers, analysts, data scientists, procurement professionals, and digital-transformation leaders seeking an accredited, internationally portable AI certification.',
                        ],
                    ],
                    [
                        'heading' => 'Ideal For',
                        'items' => [
                            'Supply chain professionals, procurement specialists, data analysts, and technology leaders seeking to transform digital operations with AI intelligence',
                        ],
                    ],
                ],
            ],

            'objectives' => [
                'heading' => 'Program Objectives',
                'intro' => 'By the end of this certification, participants will be able to:',
                'items' => [
                    'Explain the core technologies and business applications of AI in supply-chain management.',
                    'Integrate AI-based predictive models for forecasting, inventory optimization, and supplier evaluation.',
                    'Apply big-data analytics and machine learning to improve decision-making and operational agility.',
                    'Implement AI-driven automation in procurement, logistics, and sustainability initiatives.',
                    'Design AI-enhanced risk-management frameworks for disruption and crisis response.',
                    'Evaluate blockchain-AI synergies for secure, transparent, and ethical sourcing.',
                    'Demonstrate compliance with data-governance and sustainability standards in AI-enabled operations.',
                ],
            ],

            'outcomes' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2026/01/1.png'),
                'heading' => 'Learning Outcomes',
                'intro' => 'Graduates of the AC-SCAI® program will be able to:',
                'items' => [
                    'Deploy AI-powered forecasting tools to improve demand accuracy and reduce waste.',
                    'Analyze structured and unstructured data using advanced analytics and visualization tools.',
                    'Use AI for supplier discovery, risk assessment, and performance scoring.',
                    'Implement real-time logistics optimization using IoT and route-intelligence platforms.',
                    'Design carbon-aware and ethical supply-chain models using sustainability analytics.',
                    'Combine AI with blockchain for enhanced transparency, traceability, and cyber resilience.',
                ],
            ],

            'modules' => [
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-23.png'), 'title' => '1. AI Fundamentals', 'text' => 'Understanding of AI, ML, DL, and NLP frameworks in supply-chain settings.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-13.png'), 'title' => '2. Data Analytics and Interpretation', 'text' => 'Application of big-data models, forecasting algorithms, and decision optimization.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/3-9.png'), 'title' => '3. Intelligent Procurement & Automation', 'text' => 'Competence in using AI-powered tools for sourcing, risk evaluation, and process automation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/4-7.png'), 'title' => '4. Blockchain Integration', 'text' => 'Ability to design secure, transparent traceability systems with AI verification.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-5.png'), 'title' => '5. Sustainability and ESG Analytics', 'text' => 'Knowledge of AI for carbon tracking, circular-economy modeling, and ethical sourcing.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/6-4.png'), 'title' => '6. Risk & Resilience Modeling', 'text' => 'Application of predictive analytics for crisis management and scenario simulation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-23.png'), 'title' => '7. Strategic Leadership in AI Transformation', 'text' => 'Strategic alignment of AI adoption with organizational performance and global standards.'],
                ],
            ],

            'exam_details' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/business-work-assessment-certificate-concept-600nw-2370422129.webp'),
                'heading' => 'Exam Details Assessment & Certification',
                'items' => [
                    'Format: 100 Multiple-Choice Questions (MCQs)',
                    'Duration: 90 Minutes',
                    'Passing Score: 70%',
                    'Mode: Online / Proctored / On-site',
                    'Retake Policy: One retake allowed within 3 months',
                    'Prerequisite: Must be in the Procurement and Supply Chain Field',
                ],
            ],

            'differentiators' => [
                'heading' => 'Here’s what makes us different:',
                'items' => [
                    ['title' => 'Globally Benchmarked Programs-', 'text' => 'Aligned with ANSI/ANAB, NCCA, and I.C.E. quality frameworks.'],
                    ['title' => 'Industry-Endorsed Content –', 'text' => 'Designed by top faculty, corporate practitioners, and data-science experts.'],
                    ['title' => 'Professional Recognition –', 'text' => 'AAPSCM® credentials are valued across Fortune 500 companies, consulting firms, and government organizations.'],
                    ['title' => 'Flexible Learning Pathways –', 'text' => 'Learn at your own pace, online or with guided mentorship.'],
                    ['title' => 'Verified Certification –', 'text' => 'Digital badge and blockchain-secured certificate verifiable via the AAPSCM® Certificate Portal.'],
                    ['title' => 'Commitment to Excellence –', 'text' => 'We uphold continuous quality improvement and accreditation compliance with ISO 9001 and UN SDG 9 & 12 goals.'],
                ],
                'closing' => 'Over 4,000 professionals certified globally through AAPSCM® programs across 60+ countries and still growing.',
            ],

            'careers' => [
                'heading' => 'Career Paths',
                'intro' => 'AC-SCAI® graduates are equipped for strategic and leadership positions such as:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'AI Supply-Chain Analyst / Manager'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Data-Driven Procurement Specialist'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Machine-Learning Operations (MLOps) Coordinator'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'Digital-Transformation Consultant'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Sustainability & Ethical-Sourcing Officer'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Logistics Data Scientist / AI Automation Lead'],
                ],
            ],

            'stats' => [
                'items' => [
                    ['text' => 'AI-driven supply-chain roles are projected to grow 22–25 % by 2032.'],
                    ['text' => 'Organizations investing in AI report 35 % higher efficiency and 40 % improved resilience.'],
                    ['text' => 'Demand is increasing across manufacturing, retail, logistics, healthcare, and public-sector supply-chain modernization.'],
                ],
            ],

            'credential' => [
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/6-3.png'), 'title' => 'Credential Earned:', 'text' => 'American Certified Supply Chain Artificial Intelligence (AI) Professional – AC-SCAI®'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-3.png'), 'title' => 'Issued By:', 'text' => 'American Association of Procurement, Supply Chain & Tourism Management (AAPSCM®)'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/7-2.png'), 'title' => 'Digital Badge & Hard-Copy Certificate:', 'text' => 'Globally verifiable via the AAPSCM® Certificate Verification Portal'],
                ],
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=45226%20'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-supply-chain-artificial-intelligence-ai-professional-ac-scai/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-supply-chain-artificial-intelligence-ai-professional-ac-scai'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The American Certified Supply Chain Artificial Intelligence (AI) Professional – AC-SCAI® is a globally recognized credential designed for professionals who want to lead the next wave of digital transformation in supply chains.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'The American Certified Supply Chain Artificial Intelligence (AI) Professional – AC-SCAI® is a globally recognized credential blending machine learning, predictive analytics, automation, blockchain, and data ethics for AI-driven supply chains.',
                'show_in_nav' => false,
            ],
        );
    }
}
