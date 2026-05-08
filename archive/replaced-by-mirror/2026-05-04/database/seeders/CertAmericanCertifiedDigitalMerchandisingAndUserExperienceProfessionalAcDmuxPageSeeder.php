<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedDigitalMerchandisingAndUserExperienceProfessionalAcDmuxPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'eyebrow' => 'Internationally Recognized Certification Offered by the',
                'heading' => 'American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-63.png'),
                'paragraphs' => [
                    'Overview: The AC-DMUX® Certification is a premier credential designed to empower professionals with advanced Digital merchandising and user experience (UX) optimization. Skills Tailored for the dynamic e-commerce landscape, this certification combines the art of crafting compelling digital storefronts with the science of enhancing customer journeys. This certification is for professionals in the field of e-commerce administration. If you aspire to excel in the competitive world of online retail, the AC-DMUX® certification is your gateway to success.',
                ],
            ],

            'why_choose' => [
                'heading' => 'Why Choose AC-DMUX®?',
                'intro' => 'The future of e-commerce depends on creating seamless, engaging, and impactful digital experiences. The AC-DMUX® certification prepares you to:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Group-37387.png'), 'title' => 'Design Exceptional Experiences', 'text' => 'Master the principles of user experience (UX) design to create intuitive, user-friendly platforms.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Group-37388.png'), 'title' => 'Optimize Merchandising Strategies', 'text' => 'Learn how to present products effectively using advanced data analytics and insights.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Group-37389.png'), 'title' => 'Drive Customer Engagement:', 'text' => 'Harness digital tools to enhance customer interaction and satisfaction.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Group-37390.png'), 'title' => 'Stay Competitive', 'text' => 'Gain expertise in cutting-edge e-commerce trends, sustainable practices, and innovative digital strategies.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Group-37391.png'), 'title' => 'Elevate Your Career', 'text' => 'Stand out as a certified professional with a credential recognized by leading global e-commerce organizations.'],
                ],
            ],

            'who_should_enroll' => [
                'heading' => 'Who Should Enroll?',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Group-37392.png'), 'title' => 'E-commerce Professionals', 'text' => 'Enhance your skills to drive more sales and optimize digital platforms.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Group-37393.png'), 'title' => 'Digital Marketing Specialists', 'text' => 'Deepen your understanding of merchandising strategies to better align with user behavior.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Group-37394.png'), 'title' => 'Retail Managers', 'text' => 'Transition into the digital space by mastering the latest e-commerce tools and techniques.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Group-37395.png'), 'title' => 'Entrepreneurs', 'text' => 'Build thriving online stores by understanding the essentials of UX and merchandising.'],
                ],
            ],

            'learning_outcomes' => [
                'heading' => 'Learning Outcomes',
                'intro' => 'By earning the AC-DMUX® certification, you will:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Mask-group.png'), 'title' => 'Master Digital Merchandising:', 'text' => 'Develop and implement merchandising strategies that drive conversions and boost revenue.', 'reverse' => false],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Mask-groupwesf.png'), 'title' => 'Enhance User Experience:', 'text' => 'Design intuitive, engaging, and accessible digital environments that improve customer satisfaction and retention.', 'reverse' => true],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Mask-groupzscbdf.png'), 'title' => 'Leverage Data and Analytics:', 'text' => 'Use data-driven insights to tailor merchandising and UX strategies to meet customer expectations.', 'reverse' => false],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Mask-groupadsf-1.png'), 'title' => 'Promote Ethical and Sustainable Practices:', 'text' => 'Implement responsible and sustainable e-commerce practices in line with global standards.', 'reverse' => true],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/Mask-groupsadfare.png'), 'title' => 'Adapt to Emerging Trends:', 'text' => 'Stay ahead in the fast-evolving e-commerce landscape with a focus on innovation and digital transformation.', 'reverse' => false],
                ],
            ],

            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Comprehensive Curriculum', 'text' => 'Covering digital merchandising, UX design principles, and data-driven decision-making.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/learning.png'), 'title' => 'Interactive Learning', 'text' => 'Case studies, hands-on projects, and real-world examples to ensure practical application of knowledge.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/expert.png'), 'title' => 'Industry Expert Faculty', 'text' => 'Learn from seasoned professionals and thought leaders in e-commerce and UX design.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Globally Recognized Certification', 'text' => 'A mark of excellence in the field of digital merchandising and user experience.'],
                ],
            ],

            'benefits' => [
                'heading' => 'Certification Benefits',
                'items' => [
                    'Boost your employability with a highly sought-after credential in the digital commerce sector.',
                    'Gain exclusive access to AAPSCM®®\'s professional network of e-commerce leaders and practitioners.',
                    'Enhance your ability to create exceptional online shopping experiences that drive measurable business results.',
                ],
            ],

            'eligibility' => [
                'heading' => 'Eligibility Criteria',
                'paragraphs' => [
                    'Open to professionals with a background in e-commerce, digital marketing, retail management, or related fields.',
                    'No prior certification is required, making it accessible for individuals at all career stages.',
                ],
            ],

            'enrollment' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/image-32.jpg'),
                'heading' => 'How to Enroll',
                'paragraph' => 'Today, take the first step toward becoming an American Certified Digital Merchandising and User Experience Professional (AC-DMUX)®.',
                'items' => [
                    'Duration: Flexible learning options (online or hybrid) to fit your schedule.',
                    'Certification Exam: AAPSCM®®-administered final assessment to validate your expertise.',
                    'Cost: Competitive pricing with transfer equivalency credits for US College students with eligible College Partners.',
                ],
            ],

            'closing' => [
                'heading' => 'Join the Future of Digital Commerce',
                'paragraphs' => [
                    'The AC-DMUX® certification by AAPSCM®® is your key to unlocking success in the rapidly growing e-commerce industry. Elevate your career, transform your skills, and become a leader in digital merchandising and user experience.',
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
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-DMUX.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=34214'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-digital-merchandising-and-user-experience-professional-ac-dmux/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-digital-merchandising-and-user-experience-professional-ac-dmux'],
            [
                'title' => 'American Certified Digital Merchandising and User Experience Professional (AC-DMUX)®',
                'content' => null,
                'excerpt' => 'The AC-DMUX® Certification is a premier credential designed to empower professionals with advanced Digital merchandising and user experience (UX) optimization.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'American Certified Digital Merchandising and User Experience Professional (AC-DMUX)®',
                'meta_description' => 'The AC-DMUX® Certification is a premier credential designed to empower professionals with advanced Digital merchandising and user experience (UX) optimization.',
                'show_in_nav' => false,
            ],
        );
    }
}
