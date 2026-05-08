<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedAiAmpBlockchainProcurementProfessionalAcAibppPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'American Certified AI & Blockchain Procurement Professional (AC-AIBPP)®';

        $pageData = [
            'hero' => [
                'heading' => 'Transforming Procurement with AI & Blockchain for Efficiency, Transparency, and Security',
                'paragraphs' => [
                    'The Certified AI & Blockchain Procurement Professional (AC-AIBPP)® certification, offered by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®), is a cutting-edge credential designed for professionals seeking to leverage Artificial Intelligence (AI) and Blockchain to revolutionize procurement processes. With AI enhancing procurement automation, predictive analytics, and supplier management and blockchain ensuring secure, transparent, and tamper-proof transactions, procurement professionals must adopt these transformative technologies to optimize efficiency and reduce fraud risks. The AC-AIBPP® certification provides professionals with AI-driven procurement automation skills, smart contract development expertise, and blockchain-powered risk mitigation strategies to lead the future of digital procurement.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-93.png'),
            ],

            'why_choose' => [
                'heading' => 'Why Choose CAIBPP®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/evaluation-1.png'), 'title' => 'AI & Blockchain-Driven Procurement Expertise', 'text' => 'Gain hands-on skills in AI-based procurement automation and blockchain-based contract management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/learning.png'), 'title' => 'Hands-On Learning', 'text' => 'Work with real-world AI-powered procurement simulations and blockchain smart contract applications.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/infrastructure.png'), 'title' => 'High Industry Demand', 'text' => 'Organizations are rapidly adopting AI and blockchain for procurement security, transparency, and efficiency.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/internet.png'), 'title' => 'Global Recognition', 'text' => 'The AC-AIBPP® certification is internationally respected across procurement, supply chain, and fintech industries.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/advance.png'), 'title' => 'Career Growth', 'text' => 'Strengthen your expertise in AI-driven supplier selection, blockchain-enabled procurement security, and contract automation.'],
                ],
            ],

            'why_aapscm' => [
                'heading' => 'Why Get Certified Through AAPSCM®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/global-network.png'), 'title' => 'Globally Recognized & Industry-Aligned Certification', 'text' => 'AAPSCM® is a globally respected certification body, ensuring that the AC-AIBPP® certification aligns with AI-powered procurement trends, blockchain innovations, and risk mitigation strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/self-learning.png'), 'title' => 'Flexible & Practical Learning Experience', 'text' => 'AAPSCM® offers instructor-led training, self-paced learning, and blockchain-based procurement simulations, providing hands-on experience in AI-powered procurement automation and blockchain security.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/ai.png'), 'title' => 'AI & Blockchain-Focused Procurement Training', 'text' => 'Unlike traditional procurement certifications, CAIBPP® integrates AI-driven predictive analytics, blockchain-based contract automation, and fraud-resistant procurement models, ensuring professionals remain ahead of industry disruptions.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/career-promotion.png'), 'title' => 'Exclusive Networking & Career Advancement', 'text' => 'Certified professionals gain access to an elite network of procurement, blockchain, and AI professionals, along with mentorship programs, industry conferences, and leadership development opportunities.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/curriculum-2.png'), 'title' => 'Industry-Validated Curriculum', 'text' => 'The AC-AIBPP® certification is developed in collaboration with procurement technology experts, AI specialists, and blockchain innovators, ensuring practical applications of AI and blockchain in procurement.'],
                ],
            ],

            'objectives' => [
                'heading' => 'Objectives of the Certification',
                'intro' => 'Upon completion of the Certified AI & Blockchain Procurement Professional (AC-AIBPP)®, professionals will be able to:',
                'items' => [
                    'Leverage AI and machine learning to automate procurement processes and optimize sourcing decisions.',
                    'Develop and implement blockchain-powered smart contracts for secure and transparent procurement transactions',
                    'Use AI-driven predictive analytics for supplier evaluation and procurement risk assessment.',
                    'Integrate blockchain technology to enhance procurement security, traceability, and fraud prevention.',
                    'Apply AI-powered contract automation tools for efficiency and accuracy in procurement operations.',
                    'Enhance supplier compliance and auditing using AI-powered blockchain verification systems.',
                    'Implement decentralized procurement ledgers to improve trust and accountability in supplier transactions.',
                ],
            ],

            'who_should_enroll' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-95.png'),
                'heading' => 'Who Should Enroll?',
                'intro' => 'The CAIBPP® certification is ideal for:',
                'items' => [
                    'Procurement & Sourcing Professionals',
                    'AI & Blockchain Specialists in Procurement',
                    'Digital Transformation Leaders in Supply Chain',
                    'Fintech & Smart Contract Developers in Procurement',
                    'Vendor Risk Management & Compliance Officers',
                    'Procurement Automation & AI Data Analysts',
                    'Cybersecurity & Blockchain Security Experts in Procurement',
                ],
            ],

            'careers' => [
                'heading' => 'Career Path & Opportunities',
                'intro' => 'Graduates of the CAIBPP® certification can pursue careers in:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'AI-Powered Procurement Analyst', 'text' => 'Optimize procurement decisions using AI-driven data models.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Blockchain Procurement Consultant', 'text' => 'Implement blockchain smart contracts for secure procurement operations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Digital Procurement Transformation Manager', 'text' => 'Lead AI and blockchain adoption for procurement automation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-63.png'), 'title' => 'Supplier Risk & Compliance Officer', 'text' => 'Ensure blockchain-based fraud prevention and AI-powered supplier assessments.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Smart Contract Developer for Procurement', 'text' => 'Design and deploy blockchain-based procurement contracts.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-64.png'), 'title' => 'AI & Blockchain-Enabled Procurement Strategist', 'text' => 'Develop futuristic procurement frameworks powered by AI and blockchain.'],
                ],
                'salary' => [
                    'title' => 'Average Salary Expectations',
                    'text' => 'Certified AI & Blockchain Procurement Professionals earn between $100,000 – $180,000 annually, depending on experience, industry, and region.',
                ],
            ],

            'modules' => [
                'heading' => 'Key Certification Modules',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/technology.png'), 'title' => 'AI in Procurement Automation & Sourcing Optimization', 'text' => 'Understanding AI’s role in procurement decision-making'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/deep-learning-1.png'), 'title' => 'Blockchain Fundamentals & Applications in Procurement', 'text' => 'Exploring blockchain’s role in procurement transparency.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'Machine Learning for Supplier Risk Assessment', 'text' => 'AI-powered fraud detection and supplier performance evaluation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/risk.png'), 'title' => 'Smart Contracts for Procurement Transactions', 'text' => 'Developing and deploying blockchain-powered contracts.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'AI-Powered Procurement Analytics & Forecasting', 'text' => 'Enhancing sourcing strategies using predictive analytics.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Blockchain-Based Supplier Verification & Compliance', 'text' => 'Ensuring procurement integrity with blockchain audits.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'Cybersecurity in Blockchain & AI-Powered Procurement', 'text' => 'Securing digital procurement transactions from fraud and breaches.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Capstone Project', 'text' => 'Implementing AI & blockchain solutions for procurement automation.'],
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
                            'Pre-requisites: Basic understanding of procurement, AI, blockchain, or digital transformation.',
                            'Certification Validity: 3 Years (Renewable with Continuing Education Credits)',
                        ],
                    ],
                ],
            ],

            'why_ai' => [
                'heading' => 'Why AI & Blockchain in Procurement?',
                'items' => [
                    '50% Cost Reduction in Procurement Operations: AI & blockchain optimize spending and eliminate fraud.',
                    '40% Increase in Transparency & Supplier Trust: Blockchain ensures tamper-proof procurement records.',
                    '60% Efficiency Gains in Procurement Workflows: AI automation streamlines supplier management.',
                    'Future-Proof Your Career: AI and blockchain are transforming procurement—be at the forefront with AC-AIBPP®.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-96.png'),
            ],

            'enroll' => [
                'heading' => 'Enroll Today!',
                'items' => [
                    'Secure your expertise in AI & blockchain-powered procurement automation and fraud prevention.',
                    'Globally Recognized – Career-Enhancing – Practical Learning',
                ],
                'contact' => 'Register Now or Contact Us at [email protected]',
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-AIBPP.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=42642'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-ai-blockchain-procurement-professional-ac-aibpp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-ai-amp-blockchain-procurement-professional-ac-aibpp'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The American Certified AI & Blockchain Procurement Professional (AC-AIBPP)® certification equips professionals with AI-driven procurement automation, smart contract development, and blockchain-powered risk mitigation strategies.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'AC-AIBPP® empowers procurement professionals with AI automation, blockchain smart contracts, and fraud-resistant digital procurement strategies.',
                'show_in_nav' => false,
            ],
        );
    }
}
