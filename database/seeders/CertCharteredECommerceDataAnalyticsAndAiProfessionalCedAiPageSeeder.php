<?php

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredECommerceDataAnalyticsAndAiProfessionalCedAiPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'eyebrow' => 'Internationally Recognized Certification Offered by the',
                'heading' => 'American Association of Procurement, Supply Chain, and Tourism Management (AAPSCM®)',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-19.jpg'),
                'paragraphs' => [
                    'The Chartered E-Commerce Data Analytics and AI Professional (CED-AI)® certification is a cutting-edge credential designed for professionals who aim to master the intersection of e-commerce, data analytics, and artificial intelligence (AI). This globally recognized certification equips individuals with advanced skills to harness data insights, optimize operations, and implement AI-driven solutions for unparalleled success in digital commerce. In a rapidly evolving marketplace, this certification positions you as a forward-thinking leader capable of leveraging data and technology to drive innovation and growth.',
                ],
            ],

            'why_pursue' => [
                'heading' => 'Why Pursue the CED-AI® Certification?',
                'intro' => 'Data and AI are the cornerstones of successful e-commerce strategies in Today’s digital economy. The CED-AI® certification empowers you to:',
                'items' => [
                    ['title' => 'Master Data Analytics', 'text' => 'Learn to collect, interpret, and leverage e-commerce data to optimize business decisions.'],
                    ['title' => 'Harness AI Capabilities', 'text' => 'Implement AI-driven tools and techniques to enhance operational efficiency, personalization, and customer engagement.'],
                    ['title' => 'Drive Innovation', 'text' => 'Use predictive analytics and machine learning to forecast trends and uncover growth opportunities.'],
                    ['title' => 'Optimize E-Commerce Performance', 'text' => 'Align data insights with strategic goals to improve conversions, streamline operations, and reduce costs.'],
                    ['title' => 'Advance Your Career', 'text' => 'Gain a prestigious, globally recognized credential that positions you as an expert in data analytics and AI for e-commerce.'],
                ],
            ],

            'who_should_pursue' => [
                'heading' => 'Who Should Pursue This Certification?',
                'intro' => 'The CED-AI® certification is ideal for:',
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/girl-laptop@2x-886x1024.png'),
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-92.png'), 'title' => 'Data Analysts and AI Enthusiasts', 'text' => 'Professionals looking to apply advanced analytics and AI techniques to e-commerce platforms.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/2-4.png'), 'title' => 'E-Commerce Professionals', 'text' => 'Individuals seeking to enhance their ability to use data for decision-making and performance optimization.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-93.png'), 'title' => 'Digital Strategists', 'text' => 'Professionals aiming to align AI-driven insights with broader e-commerce goals.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-94.png'), 'title' => 'Entrepreneurs and Innovators', 'text' => 'Business owners looking to integrate cutting-edge analytics and AI solutions into their operations.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-95.png'), 'title' => 'IT and Technology Specialists', 'text' => 'Professionals focused on implementing AI technologies to transform e-commerce systems.'],
                ],
            ],

            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro' => 'By earning the CED-AI® certification, you will:',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/data.png'), 'title' => 'Leverage Data Analytics', 'text' => 'Use advanced tools to analyze, interpret, and apply e-commerce data for informed decision-making.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/artificial-intelligence.png'), 'title' => 'Implement AI Solutions', 'text' => 'Develop and deploy AI-driven strategies for personalized customer experiences and operational efficiency.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/reliability.png'), 'title' => 'Enhance Predictive Insights', 'text' => 'Master predictive analytics to anticipate market trends, customer behaviors, and business challenges.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/engineering.png'), 'title' => 'Drive Automation', 'text' => 'Optimize e-commerce processes using AI-powered automation for inventory management, marketing, and customer service.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/artificial-intelligence.png'), 'title' => 'Integrate Ethical AI Practices', 'text' => 'Ensure the ethical use of AI and data analytics to maintain customer trust and compliance with global standards.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/service.png'), 'title' => 'Build Scalable Systems', 'text' => 'Design and implement scalable e-commerce systems powered by AI and data-driven insights.'],
                ],
            ],

            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/comprehension.png'), 'title' => 'Comprehensive Curriculum', 'text' => 'Covering data analytics, machine learning, AI applications, and ethical practices in e-commerce.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/resume-1.png'), 'title' => 'Real-World Applications', 'text' => 'Case studies, hands-on projects, and simulations to ensure actionable insights and practical skills.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/expert.png'), 'title' => 'Expert Faculty', 'text' => 'Learn from data science, AI, and e-commerce strategy leaders with extensive industry experience.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/global-network.png'), 'title' => 'Globally Recognized Credential', 'text' => 'A certification respected by top organizations in e-commerce, data science, and AI.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/learning.png'), 'title' => 'Future-focused learning', 'text' => 'Stay ahead with the latest AI and data analytics advancements tailored for e-commerce.'],
                ],
            ],

            'benefits' => [
                'heading' => 'Certification Benefits',
                'items' => [
                    'Enhance your career prospects with a credential that demonstrates your expertise in data analytics and AI for e-commerce.',
                    'Equip yourself with skills that are in high demand across industries, including data science, AI, and digital commerce.',
                    'Gain access to AAPSCM®®\'s network of professionals, mentors, and innovators in the field of e-commerce and technology.',
                    'Lead the transformation of e-commerce operations through data-driven and AI-powered strategies.',
                ],
            ],

            'eligibility' => [
                'heading' => 'Eligibility Criteria',
                'items' => [
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-91.png'), 'text' => 'Open to professionals from diverse backgrounds, including data science, e-commerce, IT, and business strategy.'],
                    ['image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/2-3.png'), 'text' => 'No prior certification is required, making it accessible to both aspiring and experienced professionals.'],
                ],
            ],

            'enrollment' => [
                'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2025/01/1-62.png'),
                'heading' => 'Enrollment Details',
                'items' => [
                    ['title' => 'Flexible Learning Options', 'text' => 'Choose online, hybrid, or in-person formats to suit your schedule.'],
                    ['title' => 'Certification Exam', 'text' => 'A rigorous assessment designed to validate your expertise in data analytics and AI applications for e-commerce.'],
                    ['title' => 'Test Cost', 'text' => '$399.99: Competitive pricing with transfer equivalency credits for US College students with eligible College Partners'],
                ],
            ],

            'closing' => [
                'heading' => 'Lead with Data and AI in E-Commerce',
                'paragraphs' => [
                    'The Chartered E-Commerce Data Analytics and AI Professional (CED-AI)® certification is your gateway to becoming a trailblazer in the digital economy. This certification equips you with the skills and knowledge to drive innovation, optimize performance, and confidently lead e-commerce businesses. Whether you’re a data enthusiast, a strategic leader, or an entrepreneur, the CED-AI certification is your key to staying ahead in the competitive world of digital commerce.',
                    'Enroll and unlock your potential as a data-driven, AI-powered leader in e-commerce!',
                ],
            ],

            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes', 'value' => ''],
                    ['label' => 'Launch Date', 'value' => '2025'],
                    ['label' => 'Exam Details', 'value' => 'The CED-AI® certification exam assesses your proficiency in leveraging data analytics and AI-driven solutions to optimize e-commerce operations, enhance customer experiences, predict trends, and drive strategic decision-making in digital commerce.'],
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
                'flyer_href' => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/CED-AI.pdf'),
            ],

            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text' => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=34612'),
                    ],
                    [
                        'text' => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href' => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-e-commerce-data-analytics-and-ai-professional-ced-ai/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-e-commerce-data-analytics-and-ai-professional-ced-ai'],
            [
                'title' => 'Chartered E-Commerce Data Analytics and AI Professional (CED-AI)®',
                'content' => null,
                'excerpt' => 'The Chartered E-Commerce Data Analytics and AI Professional (CED-AI)® certification is a cutting-edge credential designed for professionals who aim to master the intersection of e-commerce, data analytics, and artificial intelligence (AI).',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered E-Commerce Data Analytics and AI Professional (CED-AI)®',
                'meta_description' => 'The Chartered E-Commerce Data Analytics and AI Professional (CED-AI)® certification is a cutting-edge credential designed for professionals who aim to master the intersection of e-commerce, data analytics, and artificial intelligence (AI).',
                'show_in_nav' => false,
            ],
        );
    }
}
