<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/acpp/ for WP parity.
 *
 * Mirrors the 13 Elementor top sections in source order:
 *   0  hero         (heading + intro + image)
 *   1  why_different(image + heading + paragraph)
 *   2  why_cert     (heading + two paragraphs + CTA button)
 *   3  about_exam   (image + heading + intro + bulleted list)
 *   4  skills_header(single heading section)
 *   5+6 skills      (two 3-column rows; 6 cards with icon+title+desc)
 *   7  focus_areas  (image + bulleted list + summary + second image)
 *   8  ai_intro     (heading + paragraph)
 *   9  who_benefits (heading + description, side image)
 *   10 why_benefit  (badge image, heading + paragraph)
 *   11 exam_details (key/value table rendered from shortcode)
 *   12 training_options (image-boxes with checks + CTA buttons)
 */
class CertAcppPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => 'Begin Your Journey to Excellence with a Foundational Course in Procurement Management',
                'body'    => "Unlock the gateway to a thriving career with our Foundational Course in Procurement Management, designed for professionals eager to master the core principles of procurement and supply chain excellence. This dynamic course comprehensively introduces procurement strategies, supplier management, contract negotiation, and ethical sourcing practices. Whether you\u{2019}re new to the field or seeking to enhance your skills, this program equips you with the knowledge and tools to drive cost efficiency, foster supplier partnerships, and align procurement strategies with organizational goals. Take the first step toward professional certification and distinguish yourself as a leader in this high-demand, fast-growing industry.",
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-57.png'),
            ],
            'why_different' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-58.png'),
                'heading' => 'Why is it Different?',
                'body'    => "The American Certified Procurement Professional (ACPP\u{00ae}) certification distinguishes itself by demonstrating to future employers that you possess the practical knowledge, critical insights, and professional expertise required to navigate today\u{2019}s complex procurement landscape. As procurement management processes and ethical standards grow more rigorous, the ACPP\u{00ae} certification validates your ability to confidently meet these evolving demands. Furthermore, it serves as the essential pre-requisite for the Chartered Procurement Manager (CPM\u{00ae}) certification, the gold standard for managers in procurement. This structured pathway ensures a clear progression for professionals aiming to elevate their careers and achieve leadership roles in procurement management.",
            ],
            'why_cert' => [
                'heading'    => "Why Go for ACPP\u{00ae} Certification?",
                'paragraphs' => [
                    "The American Certified Procurement Professional (ACPP\u{00ae}) certification is the perfect starting point for professionals looking to build a solid foundation in procurement management. This certification equips you with the essential knowledge and skills required to succeed as a procurement specialist. The ACPP\u{00ae} certification exam assumes candidates have hands-on experience or a close working relationship with procurement processes, ensuring practical relevance.",
                    "The exam evaluates your understanding of critical concepts such as the formal process of obtaining goods and services, creating a Procurement Management Plan, developing a Procurement Statement of Work (SOW), preparing procurement documents, and managing change requests. Additionally, the assessment covers essential outputs like procurement documentation, lessons learned, and the overall procurement management lifecycle. By earning the ACPP\u{00ae}, you demonstrate your expertise and readiness to navigate the complexities of modern procurement with confidence and professionalism.",
                ],
                // CTA hidden: links to legacy /course/ URL (commented out for review).
                // 'cta_label' => 'Buy Exam Now',
                // 'cta_href'  => UrlRewriter::local('https://aapscm.org/course/the-american-certified-professional-in-procurement-management-acpp/'),
            ],
            'about_exam' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/home-banner-top.png'),
                'heading' => 'About the exam',
                'intro'   => "The American Certified Procurement Professional (ACPP\u{00ae}) exam provides a comprehensive foundation in procurement principles and their role in driving organizational success. This exam includes essential information on:",
                'items'   => [
                    'Procurement Basics: Fundamental concepts, terminology, and the strategic importance of procurement within organizations.',
                    "The Role of Procurement: Exploring procurement\u{2019}s impact on cost savings, value creation, and organizational efficiency.",
                    'Cost vs. Value: Understanding how to make procurement decisions that optimize both cost-effectiveness and value generation.',
                    'Procurement Processes: In-depth coverage of processes such as RFQ (Request for Quotation), RFP (Request for Proposal), and RFX (Request for X).',
                ],
            ],
            'skills' => [
                'heading' => 'What Skills Will You Learn?',
                'cards'   => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Procerement Management Plans',
                        'text'  => 'Comprehend and determine what resources to get, how to get them, when to get them, and how much is needed for the completion of the project. Simply put, the Plan Procurement Management identifies what the project needs to complete it.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/2.png'),
                        'title' => 'E-procurement Process',
                        'text'  => 'Comprehend processes and steps for successful e-procurement strategies. Electronic procurement (also referred to as eProcurement or e-procurement) is the process of buying and selling goods and services over the internet. Electronic procurement creates digital communication lines between buying organizations and their suppliers and supports the process of requisitioning, ordering, and exchange of purchase documents in the business-to-business (B2B) world.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/3.png'),
                        'title' => 'Negotiation Essentials',
                        'text'  => 'Comprehend the negotiation process and the tools, techniques and methods negotiators use to achieve better outcomes. Understand the negotiation process in terms of the end to end process and demonstrate the behaviours that are appropriate at each phase. Have the ability to conduct negotiation planning in a way that allows the organisation to define what are the key objectives and how they may be achieved',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/1.png'),
                        'title' => 'Strategic Sourcing',
                        'text'  => "After payroll, the biggest source of cost in almost all organizations is the procurement of the items that present the \u{201C}cost of doing business\u{201C}.",
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/2.png'),
                        'title' => 'Terminology in procurement management',
                        'text'  => 'Comprehend processes and steps for successful e-procurement strategies. Electronic procurement (also referred to as eProcurement or e-procurement) is the process of buying and selling goods and services over the internet. Electronic procurement creates digital communication lines between buying organizations and their suppliers and supports the process of requisitioning, ordering, and exchange of purchase documents in the business-to-business (B2B) world.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/3.png'),
                        'title' => 'Ethics @ Social Responsibility in Procurement',
                        'text'  => 'Comprehend the negotiation process and the tools, techniques and methods negotiators use to achieve better outcomes. Understand the negotiation process in terms of the end to end process and demonstrate the behaviours that are appropriate at each phase. Have the ability to conduct negotiation planning in a way that allows the organisation to define what are the key objectives and how they may be achieved',
                    ],
                ],
            ],
            'focus_areas' => [
                'image_left'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-1.jpg'),
                'image_right' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-1.jpg'),
                'items' => [
                    ['title' => 'Direct vs. Indirect Procurement',      'text' => 'Highlighting the differences and implications for resource management.'],
                    ['title' => 'e-Procurement',                          'text' => 'Utilizing digital platforms to enhance efficiency, transparency, and accuracy in procurement activities.'],
                    ['title' => 'User and Supplier Involvement',         'text' => 'Techniques for engaging stakeholders and suppliers to achieve collaborative and efficient procurement.'],
                    ['title' => 'Introduction to AI in Procurement',     'text' => 'Understanding the role of artificial intelligence in modern procurement, including AI-powered tools for predictive analytics, spend analysis, supplier performance monitoring, and risk management.'],
                ],
                'summary' => "By mastering these topics, candidates will gain the skills needed to navigate and innovate in the evolving procurement landscape. With a focus on foundational concepts and emerging technologies like AI, the ACPP\u{00ae} certification ensures you are well-prepared to drive value and efficiency in your organization.",
            ],
            'ai_intro' => [
                'heading' => 'Introduction to AI in Procurement',
                'body'    => "Artificial intelligence is revolutionizing modern procurement by enhancing efficiency, accuracy, and strategic decision-making. AI-powered tools play a pivotal role in key areas such as predictive analytics, where they forecast trends and optimize procurement strategies; spend analysis, which identifies cost-saving opportunities and ensures budget compliance; supplier performance monitoring, enabling real-time tracking and fostering stronger supplier relationships; and risk management, where AI identifies and mitigates supply chain risks, from disruptions to regulatory challenges. By understanding and leveraging these advancements, procurement professionals can drive innovation, streamline processes, and maintain a competitive edge in an increasingly dynamic industry.",
            ],
            'who_benefits' => [
                'heading'     => "Who Would Benefit from Acquiring ACPP\u{00ae}?",
                'description' => "The American Certified Procurement Professional (ACPP\u{00ae}) certification is ideal for individuals seeking to enhance their skills and knowledge in procurement management. Students considering a career in procurement management will gain a strong foundation to enter the field with confidence. Professionals working in roles that require a broad understanding of procurement, such as operations, logistics, and supply chain, can deepen their expertise and improve performance. Marketing, sales, and operations staff in organizational departments will benefit from acquiring insights into procurement processes to align their activities with organizational goals better. Additionally, new graduates aiming to develop management skills and build competency for career advancement will find the ACPP\u{00ae} certification an essential stepping stone.",
                'side_image'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/22-2.png'),
            ],
            'why_benefit' => [
                'badge_image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-2.png'),
                'heading'     => "Why Would You Benefit from Acquiring ACPP\u{00ae}?",
                'body'        => "Acquiring the American Certified Procurement Professional (ACPP\u{00ae}) certification positions you for success in one of the fastest-growing industries. Jobs in procurement and supply chain management are projected to grow by 41%, adding over 1.1 million new roles between 2020 and 2030 (Source: U.S. Bureau of Labor Statistics). This growing demand highlights the critical need for professionals with advanced procurement knowledge and skills. With the ACPP\u{00ae} certification, you\u{2019}ll be equipped to navigate the purchasing process effectively, sourcing innovative goods and services that give organizations a competitive edge. Additionally, empowered procurement functions often secure exclusive supplier partnerships, driving long-term value and success. Whether you\u{2019}re advancing your career or entering the field, the ACPP\u{00ae} provides the expertise and credibility needed to thrive in this dynamic and high-demand profession.",
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (ACPP)\u{00ae}"],
                    ['label' => 'Launch Date',            'value' => 'January 2, 2020'],
                    ['label' => 'Exam Details',           'value' => "The ACPP\u{00ae} examination focuses on the knowledge and skills required to identify and explain the basics of procurement management plan, formal process of obtaining goods and services, E-Procurement Process, Strategic Sourcing, Technology tools for Procurement and ethics and social responsibility in procurement management"],
                    ['label' => 'Number of Questions',    'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions',      'value' => 'Multiple choice'],
                    ['label' => 'Length of Test',         'value' => '120 Minutes'],
                    ['label' => 'Passing Score',          'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages',              'value' => 'English'],
                    ['label' => 'Retirement',             'value' => 'None'],
                    ['label' => 'Testing Provider',       'value' => 'Affiliate Partners Testing Centers / Online Testing'],
                    ['label' => 'Price',                  'value' => '$399.99 USD'],
                ],
                'flyer' => [
                    'label' => 'Download Flyer',
                    'href'  => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/ACPP-Flyer.pdf'),
                ],
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text'      => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=5589'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-procurement-professional-acpp/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'acpp'],
            [
                'title'            => "The American Certified Procurement Professional (ACPP)\u{00ae}",
                'content'          => null,
                'excerpt'          => "Begin Your Journey to Excellence with a Foundational Course in Procurement Management \u{2014} the ACPP\u{00ae} certification validates the knowledge, skills, and ethics required of modern procurement professionals.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "The American Certified Procurement Professional (ACPP)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "ACPP\u{00ae} is AAPSCM's foundational procurement certification \u{2014} covering procurement plans, e-procurement, strategic sourcing, negotiation, and ethics. A pre-requisite for the Chartered Procurement Manager (CPM\u{00ae}).",
                'show_in_nav'      => false,
            ],
        );
    }
}
