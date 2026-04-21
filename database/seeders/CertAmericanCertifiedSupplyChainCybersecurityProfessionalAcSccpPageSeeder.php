<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedSupplyChainCybersecurityProfessionalAcSccpPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-36.png'),
                'heading' => 'Secure Your Supply Chain Against Cyber Threats',
                'paragraphs' => [
                    'The Supply Chain Cybersecurity Professional Certification (AC-SCCP)® is designed for professionals seeking practical, foundational knowledge in protecting supply chains from cyber risks. With supply chains increasingly relying on digital technologies, ensuring security has become essential for businesses of all sizes. This program equips you with the tools to understand, identify, and address cybersecurity challenges in supply chain operations.',
                ],
            ],
            'why_choose' => [
                'heading' => 'Why Choose SCCP® ?',
                'intro' => 'Cyber threats are on the rise, and supply chains are vulnerable to disruptions that can cost businesses time and money. The AC-SCCP® certification provides the skills to:',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1.png'),
                        'title' => 'Understand Cybersecurity Basics',
                        'text' => 'Learn how cyber threats impact supply chains and how to counteract them.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-115-1.png'),
                        'title' => 'Identify Risks',
                        'text' => 'Use simple tools to pinpoint vulnerabilities in your supply chain.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-116-1.png'),
                        'title' => 'Enhance Data Security',
                        'text' => 'Protect sensitive information from unauthorized access.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-117.png'),
                        'title' => 'Comply with Standards',
                        'text' => 'Understand the basics of global cybersecurity regulations and their importance for your operations.',
                    ],
                ],
            ],
            'what_youll_learn' => [
                'heading' => 'What You’ll Learn',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1.png'),
                        'title' => 'Introduction to Cybersecurity in Supply Chains',
                        'text' => 'Get familiar with common cybersecurity risks and why supply chains are a prime target.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2.png'),
                        'title' => 'Basic Risk Assessment',
                        'text' => 'Learn how to spot weak points in your supply chain and take steps to address them.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3.png'),
                        'title' => 'Data Protection Essentials',
                        'text' => 'Understand how to secure data across supply chain networks.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4.png'),
                        'title' => 'Cybersecurity Tools for Beginners',
                        'text' => 'Discover simple tools and methods to improve security.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/5.png'),
                        'title' => 'Incident Response Basics',
                        'text' => 'Learn how to respond to a cyberattack and minimize its impact.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/5-6.png'),
                        'title' => 'Understanding Compliance',
                        'text' => 'Gain a basic understanding of key global regulations like GDPR and ISO standards.',
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
                        'text' => 'Looking to strengthen their cybersecurity knowledge.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/store.png'),
                        'title' => 'Small Business Owners',
                        'text' => 'Seeking to secure their supply chains on a budget.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/software-application.png'),
                        'title' => 'IT Generalists',
                        'text' => 'Interested in applying cybersecurity concepts to supply chain operations.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/graduate.png'),
                        'title' => 'Students and New Professionals',
                        'text' => 'Starting a career in supply chain management or cybersecurity.',
                    ],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Beginner-Friendly Training',
                        'text' => 'No prior cybersecurity experience needed.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Hands-On Practice',
                        'text' => 'Centralize and streamline procurement workflows.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Expert Guidance',
                        'text' => 'Learn from professionals with experience in supply chain cybersecurity.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Practical Tools',
                        'text' => 'Explore accessible tools that are easy to use and effective for improving security.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Flexible Learning',
                        'text' => 'Online, self-paced courses that fit into your schedule.',
                    ],
                ],
            ],
            'why_right' => [
                'heading' => 'Why AC-SCCP® is Right for You',
                'paragraphs' => [
                    'The SCCC certification focuses on giving you the foundational skills to improve security in your supply chain. Whether you’re new to cybersecurity or looking to strengthen your basic knowledge, this program will help you build confidence and capability.',
                ],
                'features_heading' => 'Key Benefits',
                'items' => [
                    [
                        'title' => 'Protect Your Operations',
                        'text' => 'Safeguard your supply chain from common cyber risks.',
                    ],
                    [
                        'title' => 'Improve Efficiency',
                        'text' => 'Learn how cybersecurity supports smoother operations.',
                    ],
                    [
                        'title' => 'Earn Industry Recognition',
                        'text' => 'Add a respected certification to your resume.',
                    ],
                    [
                        'title' => 'Gain Practical Knowledge',
                        'text' => 'Take immediate action to secure your supply chain.',
                    ],
                ],
            ],
            'how_to_start' => [
                'heading' => 'How to Get Started',
                'items' => [
                    [
                        'title' => 'Register Today',
                        'text' => 'Sign up for the AC-SCCP® certification program through our easy enrollment portal.',
                    ],
                    [
                        'title' => 'Start Learning',
                        'text' => 'Access beginner-friendly lessons and interactive exercises.',
                    ],
                    [
                        'title' => 'Earn Your Certification',
                        'text' => 'Complete the program and add AC-SCCP® to your professional credentials.',
                    ],
                ],
            ],
            'closing' => [
                'heading' => 'Secure Your Supply Chain, Step by Step',
                'paragraph' => 'You don’t need to be an expert to protect your supply chain. With the Supply Chain Cybersecurity Professional Certification (AC-SCCP)®, you’ll learn the basics to make a real difference in securing your operations and keeping your business safe.',
                'heading2' => 'Ready to Begin Your Cybersecurity Journey?',
                'paragraph2' => 'Register Now and take the first step toward building a safer, more secure supply chain today!',
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => 'Exam (AC-SCCP)®'],
                    ['label' => 'Exam Details', 'value' => 'The Supply Chain Cybersecurity Professional Certification exam tests your ability to secure supply chain systems against cyber threats through comprehensive, real-world scenario assessments.'],
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
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-supply-chain-cybersecurity-professional-ac-sccp'],
            [
                'title' => 'American Certified Supply Chain Cybersecurity Professional (AC-SCCP)®',
                'content' => null,
                'excerpt' => 'Secure Your Supply Chain Against Cyber Threats',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'American Certified Supply Chain Cybersecurity Professional (AC-SCCP)® - AAPSCM®',
                'meta_description' => 'The Supply Chain Cybersecurity Professional Certification (AC-SCCP) is designed for professionals seeking practical, foundational….',
                'show_in_nav' => false,
            ],
        );
    }
}
