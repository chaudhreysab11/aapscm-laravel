<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedSupplyChainDigitalTransformationManagerAcScdtmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'eyebrow' => 'Internationally Recognized Certification Offered by the',
                'heading' => 'American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)',
                'paragraphs' => [
                    'The American Certified Supply Chain Digital Transformation Manager (AC-SCDTM)® certification is a groundbreaking program designed by the American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)to equip professionals with the skills to lead supply chain modernization through cutting-edge technology. With rapid advancements in AI, blockchain, IoT, and robotics, supply chain management is evolving into a highly interconnected digital ecosystem. This certification empowers professionals to leverage these technologies to enhance efficiency, resilience, and sustainability in global supply chains.',
                ],
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-23.jpg'),
            ],

            'why_pursue' => [
                'heading' => 'Why Choose the AC-SCDTM® Certification?',
                'intro' => 'In a world driven by digital innovation, organizations need leaders who can successfully navigate the complexities of modern supply chains. The AC-SCDTM® certification offers you the opportunity to:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'), 'title' => 'Transform Supply Chains', 'text' => 'Drive digital transformation initiatives to streamline workflows and reduce costs.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'), 'title' => 'Leverage Emerging Technologies', 'text' => 'Implement AI, IoT, blockchain, and advanced analytics for enhanced decision-making and visibility.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'), 'title' => 'Enhance Global Operations', 'text' => 'Optimize international logistics and improve supply chain agility.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'), 'title' => 'Promote Sustainability', 'text' => 'Integrate green technologies and digital tools to reduce environmental impact.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'), 'title' => 'Advance Your Career', 'text' => 'Earn a prestigious credential recognized by global organizations, positioning you as a leader in supply chain innovation.'],
                ],
            ],

            'who_should_pursue' => [
                'heading' => 'Who Should Pursue This Certification?',
                'intro' => 'The AC-SCDTM® certification is ideal for:',
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'items' => [
                    'Supply Chain Professionals: Those managing digital projects and operations within supply chains.',
                    'IT and Technology Specialists: Individuals focused on implementing technologies in logistics and procurement systems.',
                    'Business Executives and Managers: Leaders driving innovation and strategic decision-making in supply chain processes.',
                    'Consultants and Advisors: Professionals helping businesses modernize and optimize supply chain operations.',
                ],
            ],

            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro' => 'By earning the AC-SCDTM® certification, you will:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Master Digital Supply Chain Strategies', 'text' => 'Learn to plan, execute, and scale digital transformation initiatives.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/engineering.png'), 'title' => 'Utilize Advanced Technologies', 'text' => 'Leverage tools like predictive analytics, robotics, and automation to optimize supply chains.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/reliability.png'), 'title' => 'Enhance Resilience and Agility', 'text' => 'Develop systems that adapt to disruptions and changing market demands.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/lifelong-learning.png'), 'title' => 'Foster Collaboration and Connectivity', 'text' => 'Build digitally integrated supply chains for real-time collaboration and communication.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/service.png'), 'title' => 'Drive Sustainability with Technology', 'text' => 'Align digital strategies with eco-friendly practices for long-term impact.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/reliability.png'), 'title' => 'Lead Organizational Change', 'text' => 'Manage cross-functional teams and drive buy-in for digital transformation projects.'],
                ],
            ],

            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Comprehensive Curriculum', 'text' => 'Covering digital transformation strategies, emerging technologies, data-driven decision-making, and sustainable practices.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/learning.png'), 'title' => 'Real-World Applications', 'text' => 'Practical exercises, simulations, and case studies to ensure hands-on learning.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/expert.png'), 'title' => 'Expert Faculty', 'text' => 'Learn from industry leaders with experience in supply chain technology and innovation.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Globally Recognized Certification', 'text' => 'A trusted credential for professionals driving digital transformation in supply chain management.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/long-term.png'), 'title' => 'Future-Focused Content', 'text' => 'Stay ahead of trends and innovations shaping the future of supply chains.'],
                ],
            ],

            'benefits' => [
                'heading' => 'Certification Benefits',
                'items' => [
                    'Differentiate yourself as a leader in supply chain digital transformation.',
                    'Gain exclusive access to AAPSCM®®\'s global network of professionals and resources.',
                    'Equip your organization with strategies to remain competitive in a technology-driven marketplace.',
                    'Enhance your ability to adapt to industry disruptions and position yourself as a change leader.',
                ],
            ],

            'eligibility' => [
                'heading' => 'Eligibility Criteria',
                'items' => [
                    ['text' => 'Open to professionals across industries, including supply chain, IT, procurement, and logistics.'],
                ],
            ],

            'enrollment' => [
                'heading' => 'Enrollment Details',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-62.png'),
                'items' => [
                    ['title' => 'Flexible Learning Options', 'text' => 'Online, hybrid, or in-person formats to accommodate your schedule.'],
                    ['title' => 'Certification Exam', 'text' => 'A rigorous assessment validating your expertise in digital transformation for supply chains.'],
                    ['title' => 'Exam Cost: $399.99', 'text' => 'Competitive pricing with transfer equivalency credits for US College students with eligible College Partners'],
                ],
            ],

            'closing' => [
                'heading' => 'Lead the Digital Transformation of Supply Chains',
                'paragraphs' => [
                    'The Certified Supply Chain Digital Transformation Manager (AC-SCDTM)® certification by AAPSCM® prepares you to shape the future of supply chains in a digitally connected world. As businesses increasingly adopt advanced technologies to enhance efficiency and sustainability, this certification equips you with the expertise and recognition needed to lead these transformations successfully.',
                    'Enroll Today and join the ranks of global leaders driving digital innovation in supply chain management!',
                ],
            ],

            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => ''],
                    ['label' => 'Launch Date', 'value' => '2025'],
                    ['label' => 'Exam Details', 'value' => 'The AC-SCDTM® certification exam evaluates your ability to design and implement digital transformation strategies, integrate advanced technologies, and drive efficiency, visibility, and sustainability in global supply chain operations.'],
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
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-SCDTM.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training,Exam Fees : Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=35070'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-supply-chain-digital-transformation-manager-ac-scdtm/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-supply-chain-digital-transformation-manager-ac-scdtm'],
            [
                'title' => 'American Certified Supply Chain Digital Transformation Manager (AC-SCDTM)®',
                'content' => null,
                'excerpt' => 'The American Certified Supply Chain Digital Transformation Manager (AC-SCDTM)® certification is a groundbreaking program designed by AAPSCM® to equip professionals with the skills to lead supply chain modernization through cutting-edge technology.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'American Certified Supply Chain Digital Transformation Manager (AC-SCDTM)®',
                'meta_description' => 'The AC-SCDTM® certification by AAPSCM® equips professionals to lead supply chain modernization through AI, blockchain, IoT, and robotics for greater efficiency, resilience, and sustainability.',
                'show_in_nav' => false,
            ],
        );
    }
}
