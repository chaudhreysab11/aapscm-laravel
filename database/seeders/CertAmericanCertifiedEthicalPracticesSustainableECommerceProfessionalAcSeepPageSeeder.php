<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedEthicalPracticesSustainableECommerceProfessionalAcSeepPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'hero' => [
                'eyebrow' => 'Internationally Recognized Certification Offered by the',
                'heading' => 'American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-68.png'),
                'paragraphs' => [
                    'Overview: The AC-SEEP® Certification is the industry-leading credential for professionals committed to building ethical, sustainable, and impactful e-commerce ecosystems. As e-commerce transforms global markets, businesses and consumers increasingly prioritize transparency, sustainability, and ethical practices. This certification equips you with the skills and knowledge to lead in this critical space, ensuring compliance, innovation, and long-term value in your digital operations. This certification is also in the field of e-commerce administration.',
                ],
            ],

            'why_choose' => [
                'heading' => 'Why Choose AC-SEEP®?',
                'intro' => 'Ethical and sustainable practices are no longer optional but essential for success in Today’s e-commerce landscape. The AC-SEEP® certification empowers you to:',
                'items' => [
                    ['title' => 'Drive Ethical Practices', 'text' => 'Master the principles of fairness, transparency, and corporate social responsibility in e-commerce.'],
                    ['title' => 'Champion Sustainability', 'text' => 'Implement strategies that align with global sustainability goals, including eco-friendly logistics, ethical sourcing, and carbon-neutral operations.'],
                    ['title' => 'Ensure Compliance', 'text' => 'Stay updated with evolving regulations and ethical and sustainable digital business practices standards.'],
                    ['title' => 'Enhance Brand Trust', 'text' => 'Build a reputation for integrity and sustainability, driving customer loyalty and competitive advantage.'],
                    ['title' => 'Advance Your Career', 'text' => 'Gain a globally recognized certification that sets you apart as an ethical and sustainable e-commerce leader.'],
                ],
            ],

            'who_should_enroll' => [
                'heading' => 'Who Should Enroll?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-64.png'), 'title' => 'E-commerce Professionals', 'text' => 'Strengthen your ethical practices and sustainability expertise to meet industry demands.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-65.png'), 'title' => 'Business Leaders', 'text' => 'Build responsible e-commerce operations that align with corporate values and customer expectations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-66.png'), 'title' => 'Sustainability Advocates', 'text' => 'Enhance your impact by integrating ethical practices into digital commerce ecosystems.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-67.png'), 'title' => 'Compliance Officers', 'text' => 'Ensure alignment with regulatory requirements for ethical sourcing and sustainability in e-commerce.'],
                ],
            ],

            'learning_outcomes' => [
                'heading' => 'Learning Outcomes',
                'intro' => 'By earning the AC-SEEP® certification, you will:',
                'check_icon' => $check,
                'items' => [
                    'Master Ethical E-commerce Practices: Develop strategies for fair trade, transparent supply chains, and customer-centric operations.',
                    'Integrate Sustainability: Learn to reduce environmental impact through sustainable logistics, packaging, and digital tools.',
                    'Enhance Governance and Compliance: Understand and implement global standards and policies for ethical business conduct.',
                    'Promote Responsible Innovation: Lead the adoption of technologies that support ethical and sustainable e-commerce growth.',
                    'Build Brand Equity: Align your business with customer values by prioritizing sustainability and ethical practices.',
                ],
            ],

            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Comprehensive Curriculum', 'text' => 'Covers key areas like ethical practices, sustainable logistics, regulatory compliance, and eco-friendly e-commerce solutions.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/learning.png'), 'title' => 'Practical Applications', 'text' => 'Hands-on projects and real-world case studies to ensure actionable insights.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Global Perspective', 'text' => 'Learn from examples and trends shaping e-commerce sustainability worldwide.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/expert.png'), 'title' => 'Expert Faculty', 'text' => 'Led by industry thought leaders with expertise in ethical and sustainable digital commerce.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Globally Recognized Certification', 'text' => 'Validate your skills with a credential trusted by top employers and organizations.'],
                ],
            ],

            'benefits' => [
                'heading' => 'Certification Benefits',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Ecommerce-website-developers.png'),
                'items' => [
                    'Differentiate yourself in the growing field of sustainable and ethical e-commerce.',
                    'Gain exclusive access to AAPSCM®®\'s professional network of leaders in ethical business practices.',
                    'Enhance your ability to create responsible, impactful, and profitable e-commerce solutions.',
                ],
            ],

            'eligibility' => [
                'heading' => 'Eligibility Criteria',
                'paragraphs' => [
                    'Open to professionals in e-commerce, sustainability, compliance, and related fields.',
                    'No prior certification is required, making it ideal for individuals at all career stages.',
                ],
            ],

            'enrollment' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-62.png'),
                'heading' => 'How to Enroll',
                'paragraph' => 'Take your first step toward becoming an American Certified Ethical Practices & Sustainable E-Commerce Professional (AC-SEEP)® today.',
                'items' => [
                    'Duration: Flexible learning options to accommodate working professionals.',
                    'Certification Exam: A rigorous assessment to validate your ethical and sustainable e-commerce expertise.',
                    'Cost: Competitive pricing with transfer equivalency credits for US College students with eligible College Partners.',
                ],
            ],

            'closing' => [
                'heading' => 'Be the Leader of Responsible E-commerce',
                'paragraphs' => [
                    'The AC-SEEP® certification by AAPSCM®® positions you as a forward-thinking leader in ethical and sustainable e-commerce. Stand out in the market, enhance your skills, and make a lasting impact on the industry and the planet.',
                ],
            ],

            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => ''],
                    ['label' => 'Launch Date', 'value' => '2025'],
                    ['label' => 'Exam Details', 'value' => 'The AC-DMUX® certification exam focuses on assessing your expertise in digital merchandising strategies, user experience optimization, data-driven decision-making, and the application of innovative and sustainable e-commerce practices.'],
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
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-SEEP.pdf'),
            ],

            'training_options' => [
                'check_icon' => $check,
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=34303'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-ethical-practices-amp-sustainable-e-commerce-professional-ac-seep/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-ethical-practices-sustainable-e-commerce-professional-ac-seep'],
            [
                'title' => 'American Certified Ethical Practices & Sustainable E-Commerce Professional (AC-SEEP)®',
                'content' => null,
                'excerpt' => 'The AC-SEEP® Certification is the industry-leading credential for professionals committed to building ethical, sustainable, and impactful e-commerce ecosystems.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'American Certified Ethical Practices & Sustainable E-Commerce Professional (AC-SEEP)®',
                'meta_description' => 'The AC-SEEP® Certification is the industry-leading credential for professionals committed to building ethical, sustainable, and impactful e-commerce ecosystems.',
                'show_in_nav' => false,
            ],
        );
    }
}
