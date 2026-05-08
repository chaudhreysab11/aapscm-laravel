<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertAmericanCertifiedECommerceStrategyAndGrowthProfessionalAcEsgpPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-70.png'),
                'eyebrow' => 'Internationally Recognized Certification Offered by the',
                'heading' => 'American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)',
                'paragraphs' => [
                    'The American Certified E-Commerce Strategy and Growth Professional (AC-ESGP)® certification is a comprehensive program designed to prepare professionals for leadership in the ever-evolving world of e-commerce. This globally recognized credential equips individuals with the expertise to develop transformative strategies, scale businesses, and implement innovative solutions in digital commerce. This certification is for professionals and managers in the e-commerce management field. As e-commerce continues to shape the global economy, organizations need forward-thinking professionals who can drive growth, enhance customer engagement, and deliver measurable results. The AC-ESGP® certification empowers you to be that leader.',
                ],
            ],
            'why_pursue' => [
                'heading' => 'Why Pursue the AC-ESGP® Certification?',
                'intro' => 'In Today’s competitive digital marketplace, a strong strategy and growth management foundation is essential. The AC-ESGP® certification helps you:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'), 'title' => 'Master E-Commerce Strategy', 'text' => 'Learn to develop holistic, forward-thinking strategies that align with business goals and market trends.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'), 'title' => 'Accelerate Business Growth', 'text' => 'Drive revenue and customer retention using proven techniques and tools tailored for the digital economy.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'), 'title' => 'Harness Cutting-Edge Technology', 'text' => 'Leverage advancements like AI, machine learning, and automation to optimize operations and enhance customer experiences.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'), 'title' => 'Expand Market Reach', 'text' => 'Build scalable, globally-focused strategies, including cross-border commerce and international growth initiatives.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'), 'title' => 'Stay Ahead of Trends', 'text' => 'Gain insights into emerging industry trends, including ethical business practices and sustainability, to maintain competitive advantage.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-69.png'), 'title' => 'Advance Your Career', 'text' => 'Elevate your professional profile with a globally respected credential that positions you as an industry leader in e-commerce strategy and growth.'],
                ],
            ],
            'who_should_pursue' => [
                'heading' => 'Who Should Pursue This Certification?',
                'intro' => 'The AC-ESGP® certification is ideal for:',
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'items' => [
                    'E-Commerce Professionals: Individuals responsible for driving digital sales, operations, and performance.',
                    'Digital Marketing Specialists: Professionals looking to align marketing strategies with overarching business growth objectives.',
                    'Entrepreneurs: Business owners aiming to establish and scale thriving e-commerce platforms.',
                    'Business Leaders and Executives: Decision-makers focused on transforming their organizations through strategic digital commerce initiatives.',
                    'Technology Enthusiasts: Professionals interested in integrating cutting-edge technologies into e-commerce solutions.',
                ],
            ],
            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro' => 'The AC-ESGP® certification will empower you to:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Develop Comprehensive Growth Strategies', 'text' => 'Design and execute end-to-end plans that drive e-commerce success.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/reliability.png'), 'title' => 'Optimize Customer Experiences', 'text' => 'Leverage analytics and insights to enhance user journeys and satisfaction.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/lifelong-learning.png'), 'title' => 'Integrate Advanced Technologies', 'text' => 'Use tools like AI, predictive analytics, and automation to create efficient, innovative systems.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Lead Global E-Commerce Operations', 'text' => 'Navigate the complexities of international markets, including compliance, logistics, and cultural nuances.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/reliability.png'), 'title' => 'Foster Ethical and Sustainable Growth', 'text' => 'Build e-commerce strategies aligned with global sustainability standards and ethical practices.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/service.png'), 'title' => 'Adapt to Market Disruptions', 'text' => 'Stay agile and innovative in response to consumer behavior and technology changes.'],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Holistic Curriculum', 'text' => 'Covering strategy development, market growth tactics, technology integration, and ethical business practices.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/learning.png'), 'title' => 'Practical, Real-World Applications', 'text' => 'Engage with case studies, interactive projects, and hands-on exercises for actionable learning.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/expert.png'), 'title' => 'Expert Instruction', 'text' => 'Learn from e-commerce leaders, strategists, and industry innovators with years of experience.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Global Recognition', 'text' => 'Earn a certification that validates your expertise and is respected by top organizations worldwide.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Networking Opportunities', 'text' => 'Access a professional network of peers, mentors, and thought leaders in e-commerce.'],
                ],
            ],
            'benefits' => [
                'heading' => 'Benefits of Certification',
                'items' => [
                    'Enhance your career prospects with a credential that demonstrates your expertise in e-commerce strategy and growth.',
                    "Build strategic partnerships and collaborations through the AAPSCM®®'s extensive professional network.",
                    'Position yourself as a leader capable of driving digital transformation and innovation.',
                    'Gain the tools and confidence to tackle challenges and seize opportunities in the dynamic e-commerce landscape.',
                ],
            ],
            'eligibility' => [
                'heading' => 'Eligibility Criteria',
                'paragraphs' => [
                    'Open to professionals and individuals from diverse backgrounds, including e-commerce, business strategy, technology, and digital marketing.',
                    'No prior certification is required, making it accessible to both newcomers and seasoned professionals.',
                ],
            ],
            'enrollment' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-62.png'),
                'heading' => 'Enrollment Details',
                'paragraph' => 'Take your first step toward becoming an American Certified Ethical Practices & Sustainable E-Commerce Professional (AC-SEEP)® today.',
                'items' => [
                    'Flexible Learning Options: Choose between instructor-led, self-paced, or in-person learning to suit your schedule.',
                    'Certification Exam: A rigorous assessment designed to validate your knowledge and expertise in e-commerce strategy and growth.',
                    'Test Cost: $399.99: Affordable pricing with scholarships or transfer equivalency credits for US College students at eligible colleges and Universities.',
                ],
            ],
            'closing' => [
                'heading' => 'Lead the Future of E-Commerce',
                'paragraphs' => [
                    'The American Certified E-Commerce Strategy and Growth Professional (AC-ESGP)® certification is your pathway to becoming a key driver of innovation and growth in the digital commerce industry. Whether you’re looking to scale a business, drive customer engagement, or lead cross-border operations, this certification gives you the tools and knowledge to excel.',
                    'join a global network of e-commerce leaders redefining the future of digital commerce. Let your career soar with the AC-ESGP® certification!',
                ],
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => ''],
                    ['label' => 'Launch Date', 'value' => '2025'],
                    ['label' => 'Exam Details', 'value' => 'The AC-ESGP® certification examevaluates your expertise in developing and implementing e-commerce strategies, driving business growth, leveraging emerging technologies, and optimizing operations to achieve measurable success in the digital marketplace.'],
                    ['label' => 'Number of Questions', 'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions', 'value' => 'Multiple choice'],
                    ['label' => 'Length of Test', 'value' => '120 Minutes'],
                    ['label' => 'Passing Score', 'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => ''],
                    ['label' => 'Languages', 'value' => 'English'],
                    ['label' => 'Retirement', 'value' => 'None'],
                    ['label' => 'Testing Provider', 'value' => 'Affiliate Partner Testing Centers Online Testing'],
                    ['label' => 'Price', 'value' => '$399.99 USD'],
                ],
                'flyer_label' => 'Download Flyer',
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/AC-ESGP.pdf'),
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=34435'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-e-commerce-strategy-and-growth-professional-ac-esgp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-e-commerce-strategy-and-growth-professional-ac-esgp'],
            [
                'title' => 'American Certified E-Commerce Strategy and Growth Professional (AC-ESGP)®',
                'content' => null,
                'excerpt' => 'American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'American Certified E-Commerce Strategy and Growth Professional (AC-ESGP) - AAPSCM®',
                'meta_description' => 'The American Certified E-Commerce Strategy and Growth Professional (AC-ESGP)® certification is a comprehensive program designed to prepare professionals for leadership in the ever-evolving world of e-commerce.',
                'show_in_nav' => false,
            ],
        );
    }
}
