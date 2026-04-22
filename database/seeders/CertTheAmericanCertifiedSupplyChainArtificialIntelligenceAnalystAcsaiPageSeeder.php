<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/the-american-certified-supply-chain-artificial-intelligence-analyst-acsai/
 * for WP parity (Chartered Supply Chain Artificial Intelligence Professional, CSAI).
 *
 * Mirrors the Elementor sections in source order:
 *   0  why_cert            (heading + 2 paragraphs + image — lead block, white 2-col)
 *   1  about_exam          (heading + paragraph + intro + 6 image-box cards)
 *   2  about_exam_closing  (single closing line)
 *   3  who_benefits        (heading + intro paragraph)
 *   4+5 who_benefits_cards (6 mini cards: image + title + text)
 *   6  who_benefits_closing(closing paragraph)
 *   7  evolution           (heading + paragraph)
 *   8  why_benefit         (heading + 2 paragraphs)
 *   9  ai_growing          (heading + paragraph + image, 2-col)
 *   10 who_benefits_long   (image + heading + paragraph, 2-col)
 *   11 why_benefit_long    (image + heading + paragraph, 2-col)
 *   12 exam_details        (key/value table + 3 CTA buttons)
 *   13 training_options    (2 cards with check + Purchase and Pay)
 *
 * NOTE: This page has NO PDF flyer.
 */
class CertTheAmericanCertifiedSupplyChainArtificialIntelligenceAnalystAcsaiPageSeeder extends Seeder
{
    public function run(): void
    {
        $miniIcon = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png');
        $miniIconAlt = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/3.png');

        $pageData = [
            'why_cert' => [
                'heading'    => "Why Go for CSAI\u{00ae} Certification?",
                'paragraphs' => [
                    "In the rapidly evolving world of supply chains and logistics, the Certified Chartered Supply Chain Artificial Intelligence (CSAI) Professionals equips professionals with the knowledge and skills to harness AI\u{2019}s transformative power. As conventional supply chain management models struggle to address unprecedented levels of complexity and disruption, companies are increasingly adopting AI-driven solutions to enhance workflow efficiency and optimize the movement of goods from companies to end consumers. AI offers significant advantages by simplifying complex processes, automating tasks, and enabling faster, more informed decision-making.",
                    "The next wave of technology\u{2014}artificial intelligence\u{2014}is revolutionizing supply chain operations by processing vast amounts of data from diverse devices and cloud applications. AI applies advanced mathematics and machine learning techniques to create adaptive, self-learning systems, improving accuracy and efficiency across the supply chain. With CSAI\u{00ae} certification, you will gain the expertise to lead in this transformation, positioning yourself as a forward-thinking professional ready to navigate challenges and drive innovation in a data-driven, AI-powered supply chain ecosystem.",
                ],
                'image'      => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Untitled-2-6.png'),
            ],
            'about_exam' => [
                'heading'   => 'About the Exam',
                'paragraph' => "The Chartered Supply Chain Artificial Intelligence (CSAI) Professionals examination is designed to test candidates\u{2019} knowledge and expertise in integrating Machine Learning (ML) and Artificial Intelligence (AI) within supply chain management. This comprehensive assessment evaluates proficiency in applying AI-driven tools and techniques to optimize supply chain processes, improve decision-making, and enhance operational efficiency.",
                'intro'     => 'The exam covers major instructional areas, including:',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/analysis-1.png'),
                        'title' => 'Predictive Analytics and Forecasting',
                        'text'  => 'Leveraging AI to forecast demand and optimize inventory levels.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/settings.png'),
                        'title' => 'Automation in Supply Chains',
                        'text'  => 'Using AI for warehouse operations, logistics, and order fulfillment.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/risks.png'),
                        'title' => 'Risk Management and Mitigation',
                        'text'  => 'Applying AI to identify and address potential disruptions.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/shared-vision.png'),
                        'title' => 'Supply Chain Visibility',
                        'text'  => 'Utilizing AI and IoT for real-time tracking and monitoring.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/artificial-intelligence.png'),
                        'title' => 'AI-Powered Decision Support',
                        'text'  => 'Implementing machine learning models for strategic planning and process optimization.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/analysis-1.png'),
                        'title' => 'Sustainability and Efficiency',
                        'text'  => 'Integrating AI to reduce waste, enhance energy efficiency, and support sustainable practices.',
                    ],
                ],
                'closing' => "The CSAI\u{00ae} certification ensures candidates are equipped with cutting-edge knowledge to lead in the evolving field of AI-driven supply chain management.",
            ],
            'who_benefits' => [
                'heading' => "Who Would Benefit from CSAI\u{00ae}?",
                'intro'   => 'The Chartered Supply Chain Artificial Intelligence (CSAI) Professionals certification is ideal for individuals and professionals seeking to enhance their expertise in integrating Artificial Intelligence (AI) into supply chain operations. This certification benefits:',
                'cards' => [
                    [
                        'icon'  => $miniIcon,
                        'title' => 'Supply Chain Managers and Professionals',
                        'text'  => 'Equip managers with AI tools to streamline logistics, improve efficiency, and optimize decision-making.',
                    ],
                    [
                        'icon'  => $miniIcon,
                        'title' => 'Data Analysts and Scientists',
                        'text'  => 'Leverage AI-driven insights to improve predictive analytics and support supply chain strategies',
                    ],
                    [
                        'icon'  => $miniIcon,
                        'title' => 'IT Specialists in Supply Chain Technology',
                        'text'  => 'Gain expertise in implementing AI-powered solutions for end-to-end supply chain visibility and automation',
                    ],
                    [
                        'icon'  => $miniIcon,
                        'title' => 'Logistics and Procurement Specialists',
                        'text'  => 'Use AI to enhance supplier performance, procurement strategies, and risk management.',
                    ],
                    [
                        'icon'  => $miniIcon,
                        'title' => 'Graduate Students and Entry-Level Professionals',
                        'text'  => 'Build foundational AI knowledge to prepare for advanced roles in supply chain management.',
                    ],
                    [
                        'icon'  => $miniIconAlt,
                        'title' => 'Business Leaders and Entrepreneurs',
                        'text'  => 'Understand the strategic advantages of AI in driving competitiveness and innovation in supply chain operations.',
                    ],
                ],
                'closing' => "The CSAI\u{00ae} certification empowers professionals across diverse roles to embrace AI\u{2019}s potential, transforming supply chains into resilient, efficient, and forward-thinking systems.",
            ],
            'evolution' => [
                'heading' => 'The Evolution of Supply Chain Roles in the Age of AI and Automation',
                'body'    => 'Regardless of individual perspectives on the impact of AI and automation, one fact remains clear: technology is reshaping the supply chain landscape at an unprecedented pace. Professionals must adapt to these disruptions by reinventing their roles and acquiring new skills to remain relevant. Beyond technology, this transformation is also driven by the increasing demands of modern customers who expect faster delivery, personalized experiences, and lower costs. Meeting these rising expectations requires supply chains to be reimagined and redesigned, incorporating advanced technologies, innovative processes, and expanded ecosystems. The emphasis will be on creating hyper-efficient systems capable of delivering customized products and services with unparalleled speed and precision. This shift demands professionals with expertise in AI, data analytics, and digital transformation, paving the way for a new era of supply chain management that is agile, customer-centric, and technology-driven.',
            ],
            'why_benefit' => [
                'heading'    => "Why Would You Benefit from CSAI\u{00ae}?",
                'paragraphs' => [
                    "The Chartered Supply Chain Artificial Intelligence (CSAI) Professionals certification equips professionals with the advanced skills needed to thrive in an industry undergoing rapid transformation due to AI and automation. As supply chains become more digital and data-driven, this certification ensures you are prepared to leverage AI technologies for predictive analytics, risk management, and operational efficiency.",
                    "With the CSAI\u{00ae} certification, you\u{2019}ll gain expertise in implementing AI tools to enhance supply chain visibility, streamline processes, and meet rising customer demands for speed, personalization, and cost-effectiveness. This credential positions you as a forward-thinking leader capable of navigating disruptions, driving innovation, and adding strategic value to your organization. Whether you\u{2019}re looking to advance your career or stay competitive in the evolving supply chain landscape, CSAI\u{00ae} certification is your key to success.",
                ],
            ],
            'ai_growing' => [
                'heading' => 'The Growing Role of AI in Supply Chain Transformation',
                'body'    => "Artificial Intelligence (AI) is rapidly becoming indispensable for innovative supply chain transformation. According to recent insights, 46% of supply chain executives plan to prioritize AI, cognitive computing, and cloud applications as their top areas of investment in digital operations over the next three years. These technologies are seen as critical drivers of efficiency, agility, and competitiveness in the supply chain sector. To explore the impact of AI and cognitive computing solutions further, a survey of over 1,600 senior operational executives, including Chief Operating Officers (COOs), Chief Supply Chain Officers (CSCOs), and leaders in product development, procurement, and manufacturing, was conducted across diverse industries and geographies. The findings shed light on executives\u{2019} current perspectives, strategic priorities, and the value they anticipate deriving from these advanced technologies. The results underscore the pivotal role of AI in reshaping supply chain operations and enabling businesses to meet the demands of a rapidly evolving market.",
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/New-Project-3-1.png'),
            ],
            'who_benefits_long' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-1.jpg'),
                'heading' => "Who would benefit from (CSAI)\u{00ae}",
                'body'    => 'Regardless of where you stand on the impact of AI and automation, it is clear that technology is causing tremendous supply chain disruption. If professionals need to survive and thrive, they will have to reinvent themselves. This reinvention of supply chain roles also has to be driven by the impact of another fundamental trend: rising customer expectations. Customers want products and services in their hands more quickly, they expect a more personalized experience and all this at a lower cost. This means more customized products and services, faster order fulfillment times, and super-efficient delivery. This will require an entirely new way to architect, design, and manage supply chains across broader ecosystems, new technologies, and new roles and skill sets.',
            ],
            'why_benefit_long' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-2.jpg'),
                'heading' => "Why would you benefit from (CSAI)\u{00ae}?",
                'body'    => 'AI is becoming essential to innovative supply chain transformation. Forty-six percent of supply chain executives anticipate that AI/cognitive computing and cloud applications will be their greatest areas of investment in digital operations over the next three years. To better understand the impact of AI and cognitive computing solutions on supply chain and operations, we surveyed senior operational executives across a wide range of industries and geographies. We asked more than 1,600 Chief Operating Officers (COOs), Chief Supply Chain Officers (CSCOs) and executives of product development, procurement and manufacturing about their current views on AI and cognitive computing, their priorities and the value that they expect to derive.',
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (CSAI)\u{00ae}"],
                    ['label' => 'Launch Date',            'value' => 'August 2022 November 2022'],
                    ['label' => 'Exam Details',           'value' => "The CSAI (Chartered Supply Chain Artificial Intelligence Professional)\u{00ae} certification focuses on applying AI-driven tools and methodologies to enhance supply chain visibility, optimize operations, and drive data-informed decision-making"],
                    ['label' => 'Number of Questions',    'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions',      'value' => 'Multiple choice'],
                    ['label' => 'Length of Test',         'value' => '120 Minutes'],
                    ['label' => 'Passing Score',          'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages',              'value' => 'English'],
                    ['label' => 'Retirement',             'value' => 'None'],
                    ['label' => 'Testing Provider',       'value' => 'Affiliate Partner Testing Centers Online Testing'],
                    ['label' => 'Price',                  'value' => '$399.99 USD'],
                ],
                'buttons' => [
                    [
                        'label' => 'Purchase Exam',
                        'href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=7769'),
                    ],
                    // Button hidden: links to legacy /course/ URL (commented out for review).
                    // [
                    //     'label' => 'Purchase course materials',
                    //     'href'  => UrlRewriter::local('https://aapscm.org/course/american-certified-supply-chain-artificial-intelligence-analyst/'),
                    // ],
                    [
                        'label' => 'Purchase virtual instructor-led Training',
                        'href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-supply-chain-arti%ef%ac%81cial-intelligence-analyst-csai/'),
                    ],
                ],
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text'      => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=7769'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-supply-chain-arti%ef%ac%81cial-intelligence-analyst-csai/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'the-american-certified-supply-chain-artificial-intelligence-analyst-acsai'],
            [
                'title'            => "Chartered Supply Chain Artificial Intelligence Professional (CSAI)\u{00ae}",
                'content'          => null,
                'excerpt'          => "The CSAI\u{00ae} certification equips supply chain professionals to harness AI\u{2019}s transformative power \u{2014} predictive analytics, automation, risk management, end-to-end visibility, AI-powered decision support and sustainability across modern supply chains.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Chartered Supply Chain Artificial Intelligence Professional (CSAI)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "CSAI\u{00ae} is AAPSCM's Chartered Supply Chain Artificial Intelligence Professional certification \u{2014} integrating Machine Learning and AI into predictive analytics, automation, risk mitigation, real-time visibility, decision support and sustainable supply chain operations.",
                'show_in_nav'      => false,
            ],
        );
    }
}
