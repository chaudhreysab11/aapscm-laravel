<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedGlobalSupplyChainRiskAndResilienceProfessionalacGsrpPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-35.png'),
                'heading' => 'Build Resilient and Risk-Free Supply Chains',
                'paragraphs' => [
                    'The Global Supply Chain Risk and Resilience Professional Certification (GSRP)® empowers professionals to identify, assess, and mitigate risks while building resilient supply chain networks. In today’s volatile global market, this certification equips you with the strategies and tools to ensure uninterrupted supply chain operations and long-term stability.',
                ],
            ],
            'why_choose' => [
                'heading' => 'Why Choose AC-GSRP® ?',
                'intro' => 'Supply chain disruptions—caused by geopolitical tensions, natural disasters, cyberattacks, or economic instability—can be devastating. The GSRP® certification prepares you to:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1.png'),
                        'title' => 'Identify Risks',
                        'text' => 'Use advanced tools to detect potential vulnerabilities in global supply chains.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-115-1.png'),
                        'title' => 'Mitigate Disruptions',
                        'text' => 'Develop proactive strategies to address disruptions effectively.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-116-1.png'),
                        'title' => 'Ensure Business Continuity',
                        'text' => 'Implement robust frameworks to keep operations running smoothly in any situation.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-117.png'),
                        'title' => 'Boost Sustainability',
                        'text' => 'Monitor and verify eco-friendly practices across the supply chain.',
                    ],
                ],
            ],
            'what_youll_learn' => [
                'heading' => 'What You’ll Learn',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'Risk Identification and Assessment',
                        'text' => 'Learn to map supply chain vulnerabilities and assess the impact of potential disruptions.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2.png'),
                        'title' => 'Predictive Analytics for Risk Management',
                        'text' => 'Use AI and big data to forecast risks and prepare mitigation plans.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Crisis Management Frameworks',
                        'text' => 'Develop actionable strategies for handling natural disasters, geopolitical conflicts, and cyber threats.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Supply Chain Resilience Models',
                        'text' => 'Explore methods for creating adaptable supply chain networks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Compliance and Regulation Management',
                        'text' => 'Ensure supply chain operations meet global regulatory standards.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Scenario Planning',
                        'text' => 'Master simulation techniques to test resilience and risk strategies under various conditions.',
                    ],
                ],
            ],
            'who_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro' => 'The GSRP® certification is ideal for:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/businessman.png'),
                        'title' => 'Supply Chain Managers',
                        'text' => 'Looking to strengthen their organization’s risk management and resilience capabilities.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/supply-chain-management-1.png'),
                        'title' => 'Risk Management Professionals',
                        'text' => 'Wanting to specialize in supply chain-specific risk strategies.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/ecology.png'),
                        'title' => 'Business Leaders',
                        'text' => 'Seeking insights to ensure continuity and stability in global operations.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/graduate.png'),
                        'title' => 'Students and Graduates',
                        'text' => 'Aspiring to build a career in supply chain risk management and resilience.',
                    ],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Comprehensive Training',
                        'text' => 'Cover all facets of risk and resilience, from identification to recovery.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Hands-On Projects',
                        'text' => 'Work on real-world scenarios to develop and test resilience strategies.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Expert Guidance',
                        'text' => 'Learn from global leaders in supply chain risk management.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Advanced Tools',
                        'text' => 'Gain experience with predictive analytics software, risk assessment frameworks, and resilience modeling tools.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Flexible Learning',
                        'text' => 'Online modules designed to fit your schedule and pace.',
                    ],
                ],
            ],
            'why_right' => [
                'heading' => 'Why GSRP® is Critical for Today’s Supply Chains',
                'paragraphs' => [
                    'Disruptions are inevitable in modern supply chains, but their impact can be minimized with the right preparation. The AC-GSRP® certification provides the knowledge and tools you need to ensure stability, protect assets, and drive business continuity.',
                ],
                'features_heading' => 'Key Benefits',
                'items' => [
                    [
                        'title' => 'Proactively Manage Risks',
                        'text' => 'Stay ahead of potential disruptions with predictive analytics and scenario planning.',
                    ],
                    [
                        'title' => 'Strengthen Resilience',
                        'text' => 'Develop adaptive supply chains that thrive in uncertain conditions.',
                    ],
                    [
                        'title' => 'Gain Global Recognition',
                        'text' => 'Earn a certification that highlights your expertise in managing global supply chain risks.',
                    ],
                    [
                        'title' => 'Ensure Operational Continuity',
                        'text' => 'Build robust frameworks to maintain supply chain flow during crises.',
                    ],
                ],
            ],
            'how_to_start' => [
                'heading' => 'How to Get Started',
                'items' => [
                    [
                        'title' => 'Register Now',
                        'text' => 'Sign up for the AC-GSRP® certification program through our simple enrollment process.',
                    ],
                    [
                        'title' => 'Learn from Experts',
                        'text' => 'Access modules led by global risk management professionals.',
                    ],
                    [
                        'title' => 'Earn Your Certification',
                        'text' => 'Complete the program and receive your AC-GSRP® credential to showcase your skills.',
                    ],
                ],
            ],
            'closing' => [
                'heading' => 'Secure Your Supply Chain’s Future Today!',
                'paragraph' => 'The global supply chain landscape is fraught with risks, but with the Global Supply Chain Risk and Resilience Professional Certification (GSRP)®, you’ll be equipped to navigate these challenges confidently and build resilient, future-proof operations.',
                'heading2' => 'Take the First Step Toward Resilient Supply Chains!',
                'paragraph2' => 'Register Now and become a Certified Global Supply Chain Risk and Resilience Professional. Protect your supply chain, safeguard your organization, and lead with confidence in today’s uncertain world.',
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam (AC-GSRP)®'],
                    ['label' => 'Exam Details', 'value' => 'The American Certified Global Supply Chain Risk and Resilience Professional Certification (AC-GSRP)® exam assesses your expertise in identifying, mitigating, and managing supply chain risks while building resilient and adaptive supply chain strategies through real-world, scenario-based evaluations.'],
                    ['label' => 'Number of Questions', 'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions', 'value' => 'Multiple choice'],
                    ['label' => 'Length of Test', 'value' => '120 Minutes'],
                    ['label' => 'Passing Score', 'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages', 'value' => 'English'],
                    ['label' => 'Retirement', 'value' => 'None'],
                    ['label' => 'Testing Provider', 'value' => 'Affiliate Partners Testing Centers Online Testing'],
                    ['label' => 'Price', 'value' => '$399.99 USD'],
                ],
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-GSRP.pdf'),
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=23961'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp'],
            [
                'title' => 'American Certified Global Supply Chain Risk and Resilience Professional(AC- GSRP)®',
                'content' => null,
                'excerpt' => 'Build Resilient and Risk-Free Supply Chains',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'American Certified Global Supply Chain Risk and Resilience Professional(AC- GSRP) - AAPSCM®',
                'meta_description' => 'The Global Supply Chain Risk and Resilience Professional Certification (GSRP)® empowers professionals to identify, assess, and mitigate risks while building resilient supply chain networks.',
                'show_in_nav' => false,
            ],
        );
    }
}
