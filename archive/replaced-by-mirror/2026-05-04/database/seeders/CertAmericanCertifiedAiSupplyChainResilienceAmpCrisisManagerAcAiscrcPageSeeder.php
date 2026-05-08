<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedAiSupplyChainResilienceAmpCrisisManagerAcAiscrcPageSeeder extends Seeder
{
    public function run(): void
    {
        $title = 'American Certified AI Supply Chain Resilience & Crisis Manager (AC-AISCRC)®';

        $pageData = [
            'hero' => [
                'heading' => 'Building AI-Driven Resilient and Crisis-Ready Supply Chains',
                'paragraphs' => [
                    'The Certified AI Supply Chain Resilience & Crisis Manager (AC-AISCRC)® certification, offered by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®), is a premier credential designed for professionals who want to integrate Artificial Intelligence (AI), predictive analytics, and crisis management frameworks into supply chain resilience strategies. In an era of global disruptions, geopolitical uncertainties, pandemics, cyber threats, and climate-related risks, supply chains must be proactive, resilient, and AI-powered to ensure operational continuity. The AC-AISCRC® certification provides professionals with AI-driven risk intelligence, real-time crisis response strategies, and predictive supply chain resilience frameworks to anticipate and mitigate disruptions effectively.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-81.png'),
            ],

            'why_choose' => [
                'heading' => 'Why Choose AC-AISCRC®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/02/operation.png'), 'title' => 'AI-Driven Resilience Strategies', 'text' => 'Gain expertise in predictive analytics, risk intelligence, and AI-powered supply chain planning.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/learning.png'), 'title' => 'Hands-On Learning', 'text' => 'Apply AI and crisis response tools in real-world supply chain risk scenarios.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/02/machine-learning.png'), 'title' => 'High Industry Demand', 'text' => 'Organizations worldwide need supply chain resilience experts to prevent and mitigate crises.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/internet.png'), 'title' => 'Global Recognition', 'text' => 'AC-AISCRC® is an internationally respected certification in AI-driven supply chain risk management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'Career Advancement', 'text' => 'Strengthen your expertise in supply chain crisis management, AI-driven risk mitigation, and business continuity planning.'],
                ],
            ],

            'why_aapscm' => [
                'heading' => 'Why Get Certified Through AAPSCM®?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/worldwide.png'), 'title' => 'Globally Recognized & Industry-Aligned Certification', 'text' => 'AAPSCM® is a globally recognized body specializing in supply chain risk management and crisis preparedness, ensuring that the AC-AISCRC® certification aligns with AI-driven supply chain resilience trends and crisis response strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/presentation.png'), 'title' => 'AI & Predictive Analytics-Focused Resilience Training', 'text' => 'Unlike traditional crisis management certifications, AC-AISCRC® integrates AI-powered risk prediction models, real-time AI monitoring systems, and digital twin simulations to ensure supply chains remain adaptable, robust, and disruption-proof.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/flexibility.png'), 'title' => 'Flexible & Practical Learning Experience', 'text' => 'AAPSCM® offers instructor-led training, self-paced courses, and AI-driven risk management simulations, providing practical, real-world experience in supply chain resilience.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/neural.png'), 'title' => 'Exclusive Networking & Career Growth', 'text' => 'Certified professionals gain access to an elite network of procurement, AI, and crisis management professionals, along with mentorship programs, industry conferences, and leadership development opportunities.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/profile.png'), 'title' => 'Industry-Validated Curriculum', 'text' => 'The AC-AISCRC® certification is developed with input from global supply chain experts, AI specialists, and crisis management leaders, ensuring practical applications of AI in supply chain risk preparedness and resilience strategies.'],
                ],
            ],

            'objectives' => [
                'heading' => 'Objectives of the Certification',
                'intro' => 'Upon completion of the Certified AI Supply Chain Resilience & Crisis Manager (AC-AISCRC)®, professionals will be able to:',
                'items' => [
                    'Implement AI-driven predictive analytics to anticipate and mitigate supply chain disruptions.',
                    'Leverage machine learning models for risk intelligence and real-time decision-making.',
                    'Develop crisis response frameworks using AI-enhanced risk assessment models.',
                    'Automate risk monitoring systems to detect, evaluate, and respond to supply chain threats',
                    'Integrate AI-powered scenario planning for crisis preparedness and resilience.',
                    'Use digital twins and AI simulations for stress-testing supply chain contingency plans.',
                    'Enhance supply chain agility through AI-driven adaptive logistics and supplier risk management',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/robote5-02.png'),
            ],

            'who_should_enroll' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-83.png'),
                'heading' => 'Who Should Enroll?',
                'intro' => 'The CAISCRC® certification is ideal for:',
                'items' => [
                    'Supply Chain & Risk Management Leaders',
                    'Procurement & Logistics Professionals',
                    'AI & Data Science Professionals in Supply Chain',
                    'Business Continuity & Crisis Management Experts',
                    'Digital Transformation Leaders in Supply Chain',
                    'AI-Powered Disaster Recovery Specialists',
                    'Operational Resilience & Supply Chain Strategy Executives',
                ],
            ],

            'careers' => [
                'heading' => 'Career Path & Opportunities',
                'intro' => 'Graduates of the AC-AISCRC® certification can pursue careers in:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-58.png'), 'title' => 'AI Supply Chain Resilience Strategist', 'text' => 'Develop AI-powered risk mitigation strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Business Continuity & Crisis Manager', 'text' => 'Ensure crisis preparedness through AI-driven decision models.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Supply Chain Risk & Compliance Officer', 'text' => 'Implement AI-based supplier risk frameworks.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'AI-Powered Disaster Recovery & Logistics Lead', 'text' => 'Optimize disaster response strategies using predictive AI.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-59.png'), 'title' => 'Predictive Analytics Supply Chain Consultant', 'text' => 'Advise companies on AI-driven risk management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1-60.png'), 'title' => 'Supply Chain Digital Twin Simulation Specialist', 'text' => 'Use AI simulations to stress-test and enhance resilience.'],
                ],
                'salary' => [
                    'title' => 'Average Salary Expectations',
                    'text' => 'Certified AI Supply Chain Resilience & Crisis Managers earn between $100,000 – $190,000 annually, depending on expertise, industry, and location.',
                ],
            ],

            'modules' => [
                'heading' => 'Key Certification Modules',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/technology.png'), 'title' => 'AI in Supply Chain Risk Intelligence & Predictive Analytics', 'text' => 'AI in Supply Chain Risk Intelligence & Predictive Analytics'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/operation.png'), 'title' => 'AI-Powered Crisis Management & Disaster Recovery', 'text' => 'Automating supply chain resilience responses.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/analysis.png'), 'title' => 'Digital Twin Simulations for Risk Preparedness', 'text' => 'Stress-testing supply chains using AI-powered digital twins.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/robotics.png'), 'title' => 'Supplier Risk & Disruption Management', 'text' => 'AI-driven supplier performance monitoring and mitigation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'Blockchain & Cybersecurity for Resilient Supply Chains', 'text' => 'Enhancing transparency and security.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/blockchain.png'), 'title' => 'AI-Enhanced Business Continuity Planning', 'text' => 'Building crisis-ready supply chain frameworks.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/responsible.png'), 'title' => 'Adaptive AI Supply Chain Networks', 'text' => 'Using AI to optimize supply chain agility during disruptions.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/automation.png'), 'title' => 'Capstone Project', 'text' => 'Implementing AI-powered supply chain resilience solutions.'],
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
                            'Pre-requisites: Basic understanding of supply chain operations, crisis management, or AI fundamentals.',
                            'Certification Validity: 3 Years (Renewable with Continuing Education Credits)',
                        ],
                    ],
                ],
            ],

            'why_ai' => [
                'heading' => 'Why AI in Procurement?',
                'items' => [
                    '50% Faster Response Time: AI-powered crisis detection systems provide early warnings.',
                    '35% Cost Reduction in Crisis Recovery: AI-driven predictive analytics optimize recovery plans.',
                    '60% More Accurate Supply Chain Risk Predictions: AI enhances risk intelligence and mitigation.',
                    'Future-Proof Your Career: AI and crisis management are key priorities in modern supply chain resilience.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/03/1715532301487.jpg'),
            ],

            'enroll' => [
                'heading' => 'Enroll Today!',
                'items' => [
                    'Become a leader in AI-powered supply chain resilience and crisis management',
                    'Globally Recognized – Career-Enhancing – Practical Learning',
                ],
                'contact' => 'Register Now or Contact Us at [email protected]',
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-AISCRC.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=42634%20'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-ai-supply-chain-resilience-crisis-manager-ac-aiscrc/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-ai-supply-chain-resilience-amp-crisis-manager-ac-aiscrc'],
            [
                'title' => $title,
                'content' => null,
                'excerpt' => 'The American Certified AI Supply Chain Resilience & Crisis Manager (AC-AISCRC)® certification equips professionals to integrate AI, predictive analytics, and crisis management into supply chain resilience.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $title,
                'meta_description' => 'AC-AISCRC® provides AI-driven risk intelligence, real-time crisis response strategies, and predictive supply chain resilience frameworks.',
                'show_in_nav' => false,
            ],
        );
    }
}
