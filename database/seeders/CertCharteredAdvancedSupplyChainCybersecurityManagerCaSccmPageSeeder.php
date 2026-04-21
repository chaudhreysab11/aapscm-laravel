<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredAdvancedSupplyChainCybersecurityManagerCaSccmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-44.png'),
                'heading' => 'Safeguard Your Supply Chain Against Cyber Threats',
                'paragraphs' => [
                    'The Advanced Supply Chain Cybersecurity Manager Certification (CA-SCCM)® equips professionals with the expertise to protect supply chain networks from evolving cyber threats. As digital transformation accelerates, securing supply chain operations has become critical for businesses worldwide. This program is your pathway to mastering cutting-edge cybersecurity techniques tailored for supply chain systems.',
                ],
            ],
            'why_choose' => [
                'heading' => 'Why Choose CA-SCCM® ?',
                'intro' => 'Cybersecurity breaches in supply chains can lead to severe financial and reputational damage. The CA-SCCS® certification prepares you to:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1.png'),
                        'title' => 'Protect Critical Data',
                        'text' => 'Secure sensitive supply chain information against unauthorized access.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-115-1.png'),
                        'title' => 'Identify and Mitigate Risks',
                        'text' => 'Use advanced tools to detect vulnerabilities and prevent attacks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-116-1.png'),
                        'title' => 'Integrate Cybersecurity with AI and Blockchain',
                        'text' => 'Leverage innovative technologies to build robust security frameworks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-117.png'),
                        'title' => 'Ensure Compliance',
                        'text' => 'Align supply chain operations with global cybersecurity standards and regulations.',
                    ],
                ],
            ],
            'what_youll_learn' => [
                'heading' => 'What You’ll Learn',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'Supply Chain Cyber Threats',
                        'text' => 'Understand the vulnerabilities and attack vectors unique to supply chains.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2.png'),
                        'title' => 'AI-Driven Cybersecurity Solutions',
                        'text' => 'Use AI tools for real-time threat detection and response.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Blockchain Security Integration',
                        'text' => 'Implement blockchain for secure data sharing and tamper-proof transactions.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Incident Response Frameworks',
                        'text' => 'Develop strategies for mitigating and recovering from cyberattacks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Compliance Standards',
                        'text' => 'Master global cybersecurity regulations like GDPR, CCPA, and ISO 27001.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/2-9.png'),
                        'title' => 'Cyber Risk Assessment',
                        'text' => 'Learn how to evaluate and fortify weak points in your supply chain network.',
                    ],
                ],
            ],
            'who_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro' => 'This certification is perfect for:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/businessman.png'),
                        'title' => 'Supply Chain Professionals',
                        'text' => 'Seeking to enhance the security of their operations.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/supply-chain-management-1.png'),
                        'title' => 'Cybersecurity Experts',
                        'text' => 'Wanting to specialize in the supply chain domain.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/information-technology.png'),
                        'title' => 'IT Managers',
                        'text' => 'Looking to integrate robust security measures into supply chain systems.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/graduate.png'),
                        'title' => 'Students and Graduates',
                        'text' => 'Aspiring to build a career in supply chain cybersecurity.',
                    ],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Comprehensive Cybersecurity Training',
                        'text' => 'Covering all aspects of supply chain security, from risk assessment to incident response.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Real-World Applications',
                        'text' => 'Work on live projects to simulate and resolve supply chain cyberattacks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Expert-Led Sessions',
                        'text' => 'Learn from top cybersecurity specialists and industry leaders.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Cutting-Edge Tools',
                        'text' => 'Gain hands-on experience with AI-powered threat detection software and blockchain platforms.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Flexible Learning',
                        'text' => 'Online courses designed to fit your schedule.',
                    ],
                ],
            ],
            'why_right' => [
                'heading' => 'Why CA-SCCM® is Essential for Today’s Professionals',
                'paragraphs' => [
                    'The digital era has revolutionized supply chains but also introduced significant cybersecurity risks. The CA-SCCM® certification provides the skills and tools to secure operations, protect sensitive data, and ensure compliance in a rapidly evolving landscape.',
                ],
                'features_heading' => 'Key Benefits',
                'items' => [
                    [
                        'title' => 'Stay Ahead of Threats',
                        'text' => 'Proactively manage and mitigate cybersecurity risks.',
                    ],
                    [
                        'title' => 'Build Resilience',
                        'text' => 'Strengthen your organization’s defenses against cyberattacks.',
                    ],
                    [
                        'title' => 'Earn Industry Recognition',
                        'text' => 'Showcase your expertise with a globally recognized certification.',
                    ],
                    [
                        'title' => 'Future-Proof Your Career',
                        'text' => 'Equip yourself with in-demand skills in supply chain cybersecurity.',
                    ],
                ],
            ],
            'how_to_start' => [
                'heading' => 'How to Get Started',
                'items' => [
                    [
                        'title' => 'Enroll Now',
                        'text' => 'Sign up for the ASCCS program via our easy registration process.',
                    ],
                    [
                        'title' => 'Learn from the Best',
                        'text' => 'Access expert-led modules and interactive lessons.',
                    ],
                    [
                        'title' => 'Get Certified',
                        'text' => 'Complete the program and earn your ASCCS credential to validate your skills.',
                    ],
                ],
            ],
            'closing' => [
                'heading' => 'Secure the Future of Your Supply Chain Today!',
                'paragraph' => 'Cybersecurity breaches are not a question of “if” but “when.” With the CharteredAdvanced Supply Chain Cybersecurity Specialist Certification (CA-SCCM)®, you’ll gain the expertise to safeguard your supply chain against evolving threats and drive business continuity with confidence.',
                'heading2' => 'Take Action Now!',
                'paragraph2' => 'Register Now to become a Certified Advanced Supply Chain Cybersecurity Specialist. Protect your supply chain and elevate your career today.',
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam (CA-SCCM)®'],
                    ['label' => 'Exam Details', 'value' => 'The Supply Chain Cybersecurity Professional Certification (CA-SCCM)®exam assesses your proficiency in safeguarding supply chain networks and data against cyber threats through practical, scenario-based evaluations.'],
                    ['label' => 'Number of Questions', 'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions', 'value' => 'Multiple choice'],
                    ['label' => 'Length of Test', 'value' => '120 Minutes'],
                    ['label' => 'Passing Score', 'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages', 'value' => 'English'],
                    ['label' => 'Retirement', 'value' => 'None'],
                    ['label' => 'Testing Provider', 'value' => 'Affiliate Partners Testing CentersOnline Testing'],
                    ['label' => 'Price', 'value' => '$399.99 USD'],
                ],
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CA-SCCM.pdf'),
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm'],
            [
                'title' => 'Chartered Advanced Supply Chain Cybersecurity Manager (CA-SCCM)®',
                'content' => null,
                'excerpt' => 'Safeguard Your Supply Chain Against Cyber Threats',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered Advanced Supply Chain Cybersecurity Manager (CA-SCCM)® - AAPSCM®',
                'meta_description' => 'The Advanced Supply Chain Cybersecurity Manager Certification (CA-SCCM) equips professionals with the expertise to protect ..',
                'show_in_nav' => false,
            ],
        );
    }
}
