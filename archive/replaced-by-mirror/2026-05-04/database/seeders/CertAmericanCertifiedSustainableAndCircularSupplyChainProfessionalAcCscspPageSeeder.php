<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedSustainableAndCircularSupplyChainProfessionalAcCscspPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'eyebrow' => 'Internationally Recognized Certification Offered by the',
                'heading' => 'American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)',
                'paragraphs' => [
                    'The American Certified Sustainable and Circular Supply Chain Professional (AC-CSCSP)® certification is a pioneering program created by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®) to equip professionals with the knowledge and tools to design, implement, and lead sustainable and circular supply chains. With global focus shifting towards eco-friendly practices, circular economies, and resource optimization, this certification empowers you to meet the growing demands of environmentally conscious consumers and businesses.This program prepares professionals to build supply chains that are efficient and aligned with global sustainability goals, ethical sourcing practices, and the principles of the circular economy.sure compliance with diverse regulations. This certification is for professionals and managers in e-commerce management and equips you with the skills to manage and grow cross-border e-commerce operations while addressing the complexities of global trade.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-76.png'),
            ],

            'why_pursue' => [
                'heading' => 'Why Choose the AC-CSCSP® Certification?',
                'intro' => 'The future of supply chain management revolves around sustainability and circularity. The AC-SCSP® certification offers you the opportunity to:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'), 'title' => 'Drive Sustainability', 'text' => 'Lead the transformation of supply chains by integrating sustainable practices and reducing environmental impact.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'), 'title' => 'Implement Circular Economy Models', 'text' => 'Transition from traditional linear supply chains to circular systems prioritizing recycling, reuse, and regeneration.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'), 'title' => 'Enhance Global Competitiveness', 'text' => 'Position your organization as a leader in sustainability, attracting socially conscious partners and consumers.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'), 'title' => 'Ensure Regulatory Compliance', 'text' => 'Stay updated on international sustainability standards, such as ISO 14001 and the United Nations SDGs.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'), 'title' => 'Advance Your Career', 'text' => 'Gain a prestigious credential highlighting your sustainable and circular supply chain management expertise.'],
                ],
            ],

            'who_should_pursue' => [
                'heading' => 'Who Should Pursue This Certification?',
                'intro' => 'The CSCSCP certification is ideal for:',
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'items' => [
                    'Supply Chain Professionals: Individuals seeking to enhance their expertise in green logistics, sustainable practices, and ethical sourcing.',
                    'Sustainability Officers: Professionals responsible for integrating sustainability initiatives into organizational operations.',
                    'Business Leaders and Executives: Decision-makers aiming to align supply chain strategies with sustainability and circularity goals.',
                    'Consultants and Advisors: Experts guiding businesses on sustainable supply chain practices and compliance.',
                ],
            ],

            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro' => 'By earning the AC-SCSP® certification, you will:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/supply-chain-management.png'), 'title' => 'Design Sustainable Supply Chains', 'text' => 'Develop strategies to reduce emissions, minimize waste, and optimize resource use.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/service.png'), 'title' => 'Implement Circular Economy Principles', 'text' => 'Transition to supply chain systems that emphasize material reuse, remanufacturing, and recycling.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/lifelong-learning.png'), 'title' => 'Navigate Compliance and Reporting', 'text' => 'Understand international regulations and frameworks for sustainability, including GHG protocols and ESG metrics.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Leverage Green Technologies', 'text' => 'Utilize AI, IoT, and blockchain to enhance supply chain transparency and sustainability.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/promotion.png'), 'title' => 'Promote Ethical Sourcing', 'text' => 'Ensure supplier accountability and align practices with fair trade and ethical standards.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/reliability.png'), 'title' => 'Drive Organizational Change', 'text' => 'Build a culture of sustainability and circularity across all supply chain functions.'],
                ],
            ],

            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Comprehensive Curriculum', 'text' => 'Covering sustainability principles, circular economy frameworks, ethical sourcing, and green technologies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/resume-1.png'), 'title' => 'Real-World Applications', 'text' => 'Hands-on projects, case studies, and simulations to ensure practical, actionable skills.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/expert.png'), 'title' => 'Expert Faculty', 'text' => 'Learn from sustainability and supply chain leaders with global expertise.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Globally Recognized Credential', 'text' => 'A trusted certification for sustainable and circular supply chain management professionals.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/long-term.png'), 'title' => 'Future-Ready Content', 'text' => 'Explore trends and innovations shaping the future of green and circular supply chains.'],
                ],
            ],

            'benefits' => [
                'heading' => 'Certification Benefits',
                'items' => [
                    'Differentiate yourself as a certified leader in sustainable and circular supply chains.',
                    'Enhance your organization\'s reputation and market position by driving sustainable practices.',
                    'Access AAPSCM®®\'s global network of supply chain and sustainability professionals.',
                    'Equip yourself with tools to address challenges and create long-term value through circular and eco-friendly operations.',
                ],
            ],

            'eligibility' => [
                'heading' => 'Eligibility Criteria',
                'items' => [
                    ['text' => 'Open to professionals across industries, including supply chain, logistics, procurement, and sustainability.'],
                    ['text' => 'No prior certification is required, making it suitable for both newcomers and experienced professionals.'],
                ],
            ],

            'enrollment' => [
                'heading' => 'Enrollment Details',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-62.png'),
                'items' => [
                    ['title' => 'Flexible Learning Options', 'text' => 'Choose from online, hybrid, or in-person formats to suit your schedule.'],
                    ['title' => 'Certification Exam', 'text' => 'A rigorous assessment validating your sustainable and circular supply chain expertise.'],
                    ['title' => 'Exam Cost: $399.99', 'text' => 'Competitive pricing with transfer equivalency credits for US College students with eligible College Partners.'],
                ],
            ],

            'closing' => [
                'heading' => 'Lead the Sustainable Transformation of Supply Chains',
                'paragraphs' => [
                    'The American Certified Sustainable and Circular Supply Chain Professional (AC-SCSP)® certification by AAPSCM®® empowers you to shape the future of supply chain management. As organizations face increasing pressure to align with environmental standards, this certification prepares you to drive innovation, implement sustainability initiatives, and create a lasting impact on global supply chain systems.',
                    'Enroll Today and become a leader in building sustainable and circular supply chains for a better tomorrow!',
                ],
            ],

            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => ''],
                    ['label' => 'Launch Date', 'value' => '2025'],
                    ['label' => 'Exam Details', 'value' => 'The AC-CSCSP® certification exam focuses on assessing your expertise in designing, implementing, and managing sustainable and circular supply chains, including principles of sustainability, circular economy models, regulatory compliance, and green technologies.'],
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
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-CSCSP.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=34922'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp/'),
                    ],
                ],
            ],

            'final_note' => [
                'text' => 'Ready to lead and transform procurement in your organization? Enroll today and start building your leadership future!',
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp'],
            [
                'title' => 'American Certified Sustainable and Circular Supply Chain Professional (AC-CSCSP)®',
                'content' => null,
                'excerpt' => 'The American Certified Sustainable and Circular Supply Chain Professional (AC-CSCSP)® certification is a pioneering program created by AAPSCM® to equip professionals to design, implement, and lead sustainable and circular supply chains.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'American Certified Sustainable and Circular Supply Chain Professional (AC-CSCSP)®',
                'meta_description' => 'The AC-CSCSP® certification by AAPSCM® equips professionals to design, implement, and lead sustainable and circular supply chains aligned with global sustainability goals.',
                'show_in_nav' => false,
            ],
        );
    }
}
