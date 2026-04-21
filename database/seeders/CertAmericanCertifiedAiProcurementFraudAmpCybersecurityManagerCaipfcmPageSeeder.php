<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedAiProcurementFraudAmpCybersecurityManagerCaipfcmPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'American Certified AI Procurement Fraud & Cybersecurity Manager (CAIPFCM)®';

        $pageData = [
            'hero' => [
                'heading' => 'Securing Procurement Operations with AI & Cybersecurity Strategies',
                'paragraphs' => [
                    'The Certified AI Procurement Fraud & Cybersecurity Manager (CAIPFCM)® certification, offered by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®), is a cutting-edge credential designed to equip professionals with AI-driven fraud detection, cybersecurity strategies, and digital risk management expertise in procurement. With the rise of procurement fraud, cyber threats, and data breaches, organizations must integrate AI-powered risk analytics and cybersecurity protocols to protect procurement operations. The CAIPFCM® certification provides professionals with the skills to identify fraudulent procurement activities, implement AI-driven security controls, and enhance supply chain cybersecurity resilience.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-73.png'),
            ],

            'why_choose' => [
                'heading' => 'Why Choose CAIPFCM®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/detection.png'), 'title' => 'AI-Powered Fraud Detection', 'text' => 'Learn how AI-driven analytics can detect and prevent procurement fraud.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/cyber-security.png'), 'title' => 'Cybersecurity in Procurement', 'text' => 'Gain expertise in securing procurement processes against cyber threats and data breaches.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/need.png'), 'title' => 'High Industry Demand', 'text' => 'Organizations worldwide require cybersecurity and fraud prevention professionals in procurement.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/internet.png'), 'title' => 'Global Recognition', 'text' => 'CAIPFCM® is an internationally respected certification in procurement fraud detection and cybersecurity management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'Career Advancement', 'text' => 'Strengthen your expertise in AI-driven fraud risk assessment, supplier cybersecurity compliance, and procurement data protection.'],
                ],
            ],

            'why_aapscm' => [
                'heading' => 'Why Get Certified Through AAPSCM®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/worldwide.png'), 'title' => 'Globally Recognized & Industry-Aligned Certification', 'text' => 'AAPSCM® is a globally recognized leader in procurement, supply chain, and cybersecurity certifications. The CAIPFCM® certification is aligned with international fraud prevention standards, cybersecurity frameworks, and AI-driven procurement security strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/presentation.png'), 'title' => 'AI & Cybersecurity-Integrated Procurement Training', 'text' => 'Unlike traditional procurement security certifications, CAIPFCM® focuses on AI-powered fraud detection, risk intelligence, and cybersecurity automation, ensuring professionals are equipped with the latest security strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/flexibility.png'), 'title' => 'Flexible & Practical Learning Experience', 'text' => 'AAPSCM® offers instructor-led training, self-paced learning, and AI-driven procurement fraud simulations, providing hands-on experience in cybersecurity and procurement risk management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/neural.png'), 'title' => 'Exclusive Networking & Career Growth', 'text' => 'Certified professionals gain access to a global network of procurement security experts, AI fraud analysts, and cybersecurity specialists, along with mentorship programs, industry conferences, and job placement opportunities.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/profile.png'), 'title' => 'Industry-Validated Curriculum', 'text' => 'The CAIPFCM® certification is developed in collaboration with fraud prevention experts, cybersecurity analysts, and AI procurement specialists, ensuring practical applications of AI-driven fraud detection and procurement security.'],
                ],
            ],

            'objectives' => [
                'heading' => 'Objectives of the Certification',
                'intro' => 'Upon completion of the Certified AI Procurement Fraud & Cybersecurity Manager (CAIPFCM)®, professionals will be able to:',
                'items' => [
                    'Detect and prevent procurement fraud using AI-driven risk analytics and anomaly detection.',
                    'Implement cybersecurity frameworks to secure procurement operations from data breaches and cyberattacks.',
                    'Utilize machine learning algorithms to analyze supplier risk, transaction anomalies, and procurement fraud patterns.',
                    'Integrate AI-powered fraud detection tools to monitor and audit procurement activities.',
                    'Strengthen supplier cybersecurity compliance using AI-based monitoring and risk mitigation strategies.',
                    'Develop AI-driven cyber risk models to enhance procurement security resilience.',
                    'Implement blockchain technology for secure and tamper-proof procurement transactions.',
                ],
            ],

            'who_should_enroll' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/2-6.png'),
                'heading' => 'Who Should Enroll?',
                'intro' => 'The CAIPFCM® certification is ideal for:',
                'items' => [
                    'Procurement & Supply Chain Security Professionals',
                    'Cybersecurity Risk & Compliance Officers',
                    'AI & Data Science Professionals in Procurement Security',
                    'Fraud Detection & Financial Crime Analysts',
                    'Vendor Risk Management & Supplier Cybersecurity Specialists',
                    'IT Security & Cyber Risk Professionals in Supply Chain',
                    'Procurement Compliance & Audit Officers',
                ],
            ],

            'careers' => [
                'heading' => 'Career Path & Opportunities',
                'intro' => 'Graduates of the CAIPFCM® certification can pursue careers in:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'AI Procurement Fraud Analyst', 'text' => 'Use AI-powered analytics to identify fraudulent procurement activities.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Cybersecurity & Procurement Risk Manager', 'text' => 'Implement cybersecurity measures to protect procurement data.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'AI & Cyber Fraud Detection Specialist', 'text' => 'Use AI-driven models to detect and mitigate procurement fraud risks.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'Supplier Cybersecurity Compliance Officer', 'text' => 'Ensure suppliers adhere to security and fraud prevention standards.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'AI-Powered Procurement Security Consultant', 'text' => 'Advise organizations on AI-driven fraud prevention and cybersecurity strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Blockchain Procurement Security Expert', 'text' => 'Implement blockchain for tamper-proof procurement transactions.'],
                ],
                'salary' => [
                    'title' => 'Average Salary Expectations',
                    'text' => 'Certified AI Procurement Fraud & Cybersecurity Managers earn between $100,000 – $180,000 annually, depending on experience, industry, and region.',
                ],
            ],

            'modules' => [
                'heading' => 'Key Certification Modules',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/technology.png'), 'title' => 'AI in Procurement Fraud Detection', 'text' => 'Understanding AI applications in fraud prevention.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/operation.png'), 'title' => 'Cybersecurity Risk Management in Procurement', 'text' => 'Mitigating cyber threats in supplier relationships.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'Machine Learning for Fraud & Anomaly Detection', 'text' => 'Identifying fraudulent procurement patterns using AI.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/robotics.png'), 'title' => 'AI-Powered Risk Intelligence & Predictive Analytics', 'text' => 'Leveraging AI for fraud risk forecasting.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'Supplier Cybersecurity & Compliance Audits', 'text' => 'Ensuring vendor security standards through AI automation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/blockchain.png'), 'title' => 'Blockchain for Secure Procurement Transactions', 'text' => 'Enhancing transparency and security in procurement contracts.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'AI & Cyber Fraud Investigations', 'text' => 'Conducting forensic analysis using AI-driven fraud detection models.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Capstone Project', 'text' => 'Implementing AI-driven fraud and cybersecurity strategies in procurement.'],
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
                            'Pre-requisites: Basic understanding of procurement, fraud risk, cybersecurity, or AI fundamentals.',
                            'Certification Validity: 3 Years (Renewable with Continuing Education Credits)',
                        ],
                    ],
                ],
            ],

            'why_ai' => [
                'heading' => 'Why AI in Procurement Fraud & Cybersecurity?',
                'items' => [
                    '50% Reduction in Procurement Fraud Cases: AI-driven fraud detection models improve security.',
                    '40% Faster Cybersecurity Threat Detection: AI analytics enhance risk identification and mitigation.',
                    '60% More Efficient Supplier Security Compliance Monitoring: AI automation ensures supplier transparency.',
                    'Future-Proof Your Career: AI and cybersecurity are critical components of modern procurement security.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-76.png'),
            ],

            'enroll' => [
                'heading' => 'Enroll Today!',
                'items' => [
                    'Secure your procurement career and become an AI-powered fraud prevention and cybersecurity expert.',
                    'Globally Recognized – Career-Enhancing – Practical Learning',
                ],
                'contact' => 'Register Now or Contact Us at [email protected]',
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CAIPFCM.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees:Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=42618'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-ai-procurement-fraud-cybersecurity-manager-caipfcm/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-ai-procurement-fraud-amp-cybersecurity-manager-caipfcm'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The American Certified AI Procurement Fraud & Cybersecurity Manager (CAIPFCM)® certification equips procurement professionals with AI-driven fraud detection, cybersecurity strategies, and digital risk management expertise.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'CAIPFCM® empowers professionals to detect procurement fraud using AI, secure procurement operations against cyber threats, and implement AI-driven risk intelligence.',
                'show_in_nav' => false,
            ],
        );
    }
}
