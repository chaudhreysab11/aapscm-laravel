<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredGlobalCrossBorderECommerceManagerCgcbePageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'eyebrow' => 'Internationally Recognized Certification Offered by the',
                'heading' => 'American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)',
                'paragraphs' => [
                    'The Chartered Global Cross-Border E-Commerce Manager (CGCBE)® certification is a world-class credential designed for professionals who want to lead and thrive in the increasingly globalized world of e-commerce. As businesses expand their reach across borders, there is a critical need for leaders with the expertise to navigate international markets, manage global supply chains, and ensure compliance with diverse regulations. This certification is for professionals and managers in e-commerce management and equips you with the skills to manage and grow cross-border e-commerce operations while addressing the complexities of global trade.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-20.jpg'),
            ],

            'why_pursue' => [
                'heading' => 'Why Pursue the CGCBE® Certification?',
                'intro' => 'Cross-border e-commerce is a growing opportunity for businesses worldwide but comes with unique challenges. The CGCBE® certification empowers you to:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-86.png'), 'title' => 'Master International Trade Dynamics', 'text' => 'Gain insights into global trade regulations, tax policies, and market entry strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-87.png'), 'title' => 'Optimize Cross-Border Supply Chains', 'text' => 'Learn to streamline logistics, manage inventory, and reduce costs for international operations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-88.png'), 'title' => 'Enhance Customer Experiences Globally', 'text' => 'Understand cultural differences and preferences to create localized and engaging shopping experiences.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-89.png'), 'title' => 'Ensure Compliance', 'text' => 'Navigate legal requirements, customs regulations, and data privacy laws across multiple jurisdictions.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-86.png'), 'title' => 'Drive Global Business Growth', 'text' => 'Develop strategies to expand market presence and boost revenue through international e-commerce.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-90.png'), 'title' => 'Elevate Your Career', 'text' => 'Earn a prestigious credential that demonstrates your expertise in managing complex global e-commerce operations.'],
                ],
            ],

            'who_should_pursue' => [
                'heading' => 'Who Should Pursue This Certification?',
                'intro' => 'The CGCBE® certification is ideal for:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/logistics.png'), 'title' => 'Supply Chain and Logistics Managers', 'text' => 'Individuals overseeing the movement of goods across borders.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/logistics.png'), 'title' => 'E-Commerce Professionals', 'text' => 'Those managing or aspiring to manage global online retail operations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-location.png'), 'title' => 'International Trade Specialists', 'text' => 'Professionals looking to deepen their expertise in global e-commerce markets.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/boss.png'), 'title' => 'Entrepreneurs and Business Owners', 'text' => 'Those seeking to expand their e-commerce businesses into international markets.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/boss.png'), 'title' => 'Marketing and Sales Leaders', 'text' => 'Professionals aiming to tailor strategies for cross-border customer engagement.'],
                ],
            ],

            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro' => 'By earning the CGCBE® certification, you will:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Master Global Market Entry', 'text' => 'Develop strategies to identify, assess, and penetrate new international markets.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/service.png'), 'title' => 'Streamline Cross-Border Operations', 'text' => 'Optimize logistics, customs clearance, and inventory management for efficiency and cost reduction.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/lifelong-learning.png'), 'title' => 'Understand Regulatory Compliance', 'text' => 'Stay compliant with international trade laws, customs requirements, and data protection standards.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Foster Localization', 'text' => 'Tailor products, services, and customer experiences to meet the unique demands of local markets.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Leverage Global E-Commerce Trends', 'text' => 'Use emerging technologies and practices like AI and blockchain to enhance global operations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/reliability.png'), 'title' => 'Drive Revenue Growth', 'text' => 'Implement data-driven strategies to maximize profitability in international markets.'],
                ],
            ],

            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Comprehensive Curriculum', 'text' => 'Covers market entry strategies, cross-border logistics, regulatory compliance, and localization techniques.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/resume-1.png'), 'title' => 'Real-World Applications', 'text' => 'Engage with case studies and projects to solve challenges in global e-commerce operations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/expert.png'), 'title' => 'Expert Faculty', 'text' => 'Learn from international trade professionals and e-commerce leaders with extensive global experience.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Globally Respected Certification', 'text' => 'A credential recognized by top organizations as a standard for excellence in global e-commerce management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/network.png'), 'title' => 'Networking Opportunities', 'text' => 'Access a global community of certified professionals and industry experts.'],
                ],
            ],

            'benefits' => [
                'heading' => 'Certification Benefits',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-82.png'),
                'items' => [
                    'Build confidence in managing complex global operations and navigating international challenges.',
                    'Gain a competitive edge with specialized knowledge in cross-border e-commerce management.',
                    'Enhance your professional network with access to AAPSCM®®\'s global community.',
                    'Position yourself as a leader in the rapidly expanding world of cross-border e-commerce.',
                ],
            ],

            'eligibility' => [
                'heading' => 'Eligibility Criteria',
                'items' => [
                    ['text' => 'No prior certification is required, making it suitable for newcomers and experienced professionals.'],
                    ['text' => 'Open to professionals from diverse industries, including e-commerce, international trade, supply chain, and logistics.'],
                ],
            ],

            'enrollment' => [
                'heading' => 'Enrollment Details',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-62.png'),
                'items' => [
                    ['title' => 'Flexible Learning Options', 'text' => 'Online, hybrid, or in-person formats to accommodate working professionals.'],
                    ['title' => 'Certification Exam', 'text' => 'A rigorous assessment to validate your knowledge and skills in cross-border e-commerce management.'],
                    ['title' => 'Test Cost: $399.99', 'text' => 'Competitive pricing with transfer equivalency credits for US College students with eligible College Partners.'],
                ],
            ],

            'closing' => [
                'heading' => 'Lead the Future of Global E-Commerce',
                'paragraphs' => [
                    'The Chartered Global Cross-Border E-Commerce Manager (CGCBE)® certification positions you at the forefront of international e-commerce innovation. With businesses increasingly operating globally, this certification equips you with the knowledge and tools to navigate complexities, unlock opportunities, and drive sustainable growth. Whether you’re managing logistics, crafting global strategies, or ensuring compliance, the CGCBE® certification is your pathway to success.',
                    'Enroll Today and join a global network of leaders shaping the future of cross-border e-commerce!',
                ],
            ],

            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => ''],
                    ['label' => 'Launch Date', 'value' => '2025'],
                    ['label' => 'Exam Details', 'value' => 'The CGCBE® certification exam evaluates your expertise in managing cross-border e-commerce operations, including global market entry strategies, regulatory compliance, logistics optimization, and localization for diverse international markets.'],
                    ['label' => 'Number of Questions', 'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions', 'value' => 'Multiple choice'],
                    ['label' => 'Length of Test', 'value' => '120 Minutes'],
                    ['label' => 'Passing Score', 'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => ''],
                    ['label' => 'Languages', 'value' => 'English'],
                    ['label' => 'Retirement', 'value' => 'None'],
                    ['label' => 'Testing Provider', 'value' => 'Affiliate Partner Testing Centers'],
                    ['label' => 'Online Testing', 'value' => ''],
                    ['label' => 'Price', 'value' => '$399.99 USD'],
                ],
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CGCBE.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=34767'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-global-cross-border-e-commerce-manager-cgcbe/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-global-cross-border-e-commerce-manager-cgcbe'],
            [
                'title' => 'Chartered Global Cross-Border E-Commerce Manager (CGCBE)®',
                'content' => null,
                'excerpt' => 'The Chartered Global Cross-Border E-Commerce Manager (CGCBE)® certification is a world-class credential designed for professionals who want to lead and thrive in the increasingly globalized world of e-commerce.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered Global Cross-Border E-Commerce Manager (CGCBE)®',
                'meta_description' => 'The Chartered Global Cross-Border E-Commerce Manager (CGCBE)® certification equips you to navigate international markets, manage global supply chains, and ensure cross-border compliance.',
                'show_in_nav' => false,
            ],
        );
    }
}
