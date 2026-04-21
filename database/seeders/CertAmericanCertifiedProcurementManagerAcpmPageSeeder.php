<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/american-certified-procurement-manager-acpm/
 * for WP parity.
 *
 * Mirrors the 11 Elementor top-level sections in source order:
 *   0  hero               (heading + intro + image)
 *   1  why_different      (image + heading + paragraph)
 *   2  why_cert           (heading + paragraph + Buy Exam CTA)
 *   3  about_exam         (image + heading + intro + 5 numbered subgroups w/ bullets)
 *   4  exam_areas_header  (single heading + intro)
 *   5+6 exam_areas        (8 icon-box cards across two 4-column rows)
 *   7  ai_outcomes        (heading + intro + 4 ai bullets + side image)
 *   8  growing_opportunity(image + heading + paragraph)
 *   9  exam_details       (key/value table rendered from shortcode)
 *   10 flyer              (Download Flyer PDF CTA — standalone flex-con)
 *   11 training_options   (image-boxes with checks + Purchase and Pay CTAs)
 */
class CertAmericanCertifiedProcurementManagerAcpmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = [
            'hero' => [
                'heading' => "Master Strategic Sourcing and Unlock Value with aN ACPM\u{00ae} Certification",
                'body'    => "The American Certified Procurement Manager (ACPM) certification sets itself apart by showcasing to future employers that you possess the practical knowledge, deep insights, and professional expertise required to excel in today\u{2019}s complex procurement landscape. As businesses face increasing demands for advanced procurement management processes and ethical practices, the ACPM\u{00ae} certification demonstrates your ability to meet these challenges head-on. Designed specifically for managers, ACPM\u{00ae} is the pinnacle of procurement certifications, equipping professionals with advanced skills to lead, innovate, and drive sustainable success in procurement and supply chain management.",
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/about-1.png'),
            ],
            'why_different' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/tourism.png'),
                'heading' => 'Why is it different?',
                'body'    => "In today\u{2019}s fast-paced and interconnected world, advanced procurement is the key to staying ahead of the competition. It\u{2019}s no longer just about sourcing goods and services, it\u{2019}s about creating value, driving innovation, and building resilient supply chains. American Certified Procurement Manager (ACPM)\u{00ae} certification leverages cutting-edge strategies, data-driven insights, and emerging technologies like artificial intelligence to optimize operations and ensure sustainable practices. Whether you\u{2019}re negotiating critical contracts, managing global suppliers, or reducing risks, advanced procurement equips organizations with the tools to achieve unparalleled efficiency and growth. Transform your business by mastering the art and science of procurement\u{2014}because the future belongs to those who innovate!",
            ],
            'why_cert' => [
                'heading'    => "Why Go for ACPM\u{00ae} Certification?",
                'paragraphs' => [
                    "The American Certified Procurement Manager (ACPM) certification is designed to empower managers and experienced procurement specialists with the advanced managerial skills needed to excel in procurement operations. It bridges the gap between operational expertise and strategic leadership, equipping professionals to navigate complex procurement challenges effectively. The ACPM\u{00ae} certification exam assumes candidates have a close working relationship with procurement processes, making it the ideal choice for those seeking to enhance their ability to manage procurement teams, optimize supply chain efficiency, and drive organizational success. This certification not only validates your expertise but also positions you as a leader in the procurement industry.",
                ],
                'cta_label' => 'Buy Exam Now',
                'cta_href'  => UrlRewriter::local('https://aapscm.org/course/the-american-certified-professional-in-procurement-management-acpp/'),
            ],
            'about_exam' => [
                'image_top'    => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/XcOM0CQxK2Qsd-7-1.jpg'),
                'image_bottom' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-3-1.jpg'),
                'image_caption' => "American Certified Procurement Professional Certification\u{00ae}",
                'heading'      => "About the CPM\u{00ae} Exam",
                'intro'        => "The Chartered Procurement Manager (CPM\u{00ae}) examination evaluates candidates on advanced procurement management skills, ensuring they possess the knowledge and expertise required to excel in leadership roles. The exam covers major instructional areas, including:",
                'groups' => [
                    [
                        'title' => '1. Procurement management',
                        'items' => [
                            'Planning of purchases and acquisitions',
                            'Bidding processes',
                            'Procurement decision analysis',
                        ],
                    ],
                    [
                        'title' => '2. Plan contracting',
                        'items' => [
                            'Contract statement of work',
                            'Standard forms and templates',
                            'Evaluation criteria',
                            'Procurement management plan',
                        ],
                    ],
                    [
                        'title' => '3. Contract administration and change control',
                        'items' => [
                            'Contract management plan',
                            'Communication and relationships',
                            'Ethics',
                            'Change management',
                        ],
                    ],
                    [
                        'title' => '4. Contract closure',
                        'items' => [],
                    ],
                    [
                        'title' => '5. Logistics',
                        'items' => [],
                    ],
                ],
            ],
            'exam_areas_header' => [
                'heading' => "About the ACPM\u{00ae} Exam",
                'intro'   => 'The American Certified Procurement Manager (ACPM) examination evaluates candidates on advanced procurement management skills, ensuring they possess the knowledge and expertise required to excel in leadership roles. The exam covers major instructional areas, including:',
            ],
            'exam_areas' => [
                'cards' => [
                    [
                        'title' => 'Strategic Procurement Planning',
                        'text'  => 'Developing and implementing long-term procurement strategies aligned with organizational goals.',
                    ],
                    [
                        'title' => 'Supplier Relationship Management',
                        'text'  => 'Fostering strong, collaborative partnerships with suppliers and optimizing supplier performance.',
                    ],
                    [
                        'title' => 'Contract and Risk Management',
                        'text'  => 'Mastering contract negotiation, legal compliance, and risk mitigation techniques.',
                    ],
                    [
                        'title' => 'Global Sourcing and Supply Chain Integration',
                        'text'  => 'Navigating international trade, assessing global risks, and ensuring seamless supply chain operations.',
                    ],
                    [
                        'title' => 'Sustainability and Ethical Procurement',
                        'text'  => 'Incorporating environmental and social governance (ESG) principles into procurement practices.',
                    ],
                    [
                        'title' => 'Data Analytics in Procurement',
                        'text'  => 'Utilizing advanced analytics and AI-driven tools for informed decision-making and performance optimization.',
                    ],
                    [
                        'title' => 'Digital Procurement Transformation',
                        'text'  => 'Implementing and managing e-procurement systems and leveraging emerging technologies like blockchain and IoT.',
                    ],
                    [
                        'title' => 'AI-Driven Decision-Making in Procurement',
                        'text'  => 'Developing and implementing long-term procurement strategies aligned with organizational goals.',
                    ],
                ],
            ],
            'ai_outcomes' => [
                'heading' => 'Learning Outcomes with AI Integration',
                'intro'   => 'Graduates of an advanced procurement management program with AI focus will be equipped to:',
                'items' => [
                    'Leverage AI to streamline procurement processes and enhance decision-making.',
                    'Apply advanced analytics to predict risks, optimize costs, and drive supplier performance.',
                    'Implement sustainable and ethical procurement practices with AI insights.',
                    'Lead digital transformation initiatives in procurement and supply chain management, ensuring efficiency and innovation.',
                ],
                'side_image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/management.png'),
            ],
            'growing_opportunity' => [
                'image'   => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2023/10/Untitled-2.jpg'),
                'heading' => 'A Growing Opportunity in a Technological Era',
                'paragraphs' => [
                    'Procurement management is at the forefront of a rapidly evolving global economy, with demand for skilled professionals expected to rise significantly. According to the U.S. Bureau of Labor Statistics, jobs in procurement and supply chain management are projected to grow at a much faster-than-average rate, with a remarkable 41% increase, adding 3,531,200 new jobs from 2019 to 2029. This growth reflects the expanding need for expertise in sourcing, supply chain efficiency, and resource optimization.',
                    "In today\u{2019}s technology-driven world, 72% of employers identify technology as a critical factor for achieving business goals. For procurement professionals, integrating technology is no longer optional\u{2014}it\u{2019}s essential. Foundational IT skills empower procurement teams to streamline purchasing processes, secure innovative goods and services, and strengthen their organization\u{2019}s competitive edge. A strategically managed procurement function not only optimizes costs but also opens doors to exclusive supplier partnerships, fostering sustainability and long-term growth in a dynamic marketplace.",
                ],
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam ACPM\u{00ae} AC-US02"],
                    ['label' => 'Launch Date',            'value' => 'February, 2020'],
                    ['label' => 'Exam Details',           'value' => "The ACPM\u{00ae} exam focuses on the knowledge and skills required to explore the methods used by organizations to acquire the raw materials, components, supplies, equipment, facilities, and services needed to operate. Other topic areas include strategic procurement, procurement process, competitive bidding and negotiation, procurement, and supply management organization, make or buy, price and cost analysis, quality and inventory, supplier selection, supplier development and certification, services procurement."],
                    ['label' => 'Number of Questions',    'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions',      'value' => 'Multiple choice'],
                    ['label' => 'Length of Test',         'value' => '120 Minutes'],
                    ['label' => 'Passing Score',          'value' => '650 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => "Must have obtained ACPP\u{00ae} or has 3+ experience as a Procurement Manager or Professional or Specialist"],
                    ['label' => 'Languages',              'value' => 'English'],
                    ['label' => 'Retirement',             'value' => 'None'],
                    ['label' => 'Testing Provider',       'value' => 'Affiliate Partner Testing Centers Online Testing'],
                    ['label' => 'Price',                  'value' => '$399.99 USD'],
                ],
                'flyer' => [
                    'label' => 'Download Flyer',
                    'href'  => UrlRewriter::pdf('https://aapscm.org/wp-content/uploads/2026/02/ACPM-Flyer.pdf'),
                ],
            ],
            'training_options' => [
                'check_icon' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png'),
                'options' => [
                    [
                        'text'      => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=5590'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-chartered-procurement-manager-acpm/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-procurement-manager-acpm'],
            [
                'title'            => "American Certified Procurement Manager (ACPM)",
                'content'          => null,
                'excerpt'          => "Master Strategic Sourcing and Unlock Value with an ACPM\u{00ae} Certification \u{2014} the pinnacle of procurement certifications for managers and experienced procurement specialists.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Procurement Manager (ACPM) - AAPSCM\u{00ae}",
                'meta_description' => "ACPM\u{00ae} is AAPSCM's advanced procurement certification for managers \u{2014} covering strategic sourcing, supplier relationship management, contract and risk management, global sourcing, sustainability, data analytics, digital transformation and AI-driven decision-making.",
                'show_in_nav'      => false,
            ],
        );
    }
}
