<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-strategic-procurement-supplier-relationship-specialist/
 * for WP parity (American Certified Strategic Procurement and Supplier Relationship Professional, AC-SPR).
 *
 * Mirrors visible Elementor sections in source order. The trailing hidden
 * section (elementor-hidden) is skipped.
 */
class CertAmericanCertifiedStrategicProcurementSupplierRelationshipSpecialistPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image'      => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-52.png'),
                'heading'    => "American Certified Strategic Procurement and Supplier Relationship Professional (AC-SPR)\u{00ae}",
                'paragraphs' => [
                    "Overview: In today\u{2019}s competitive landscape, successful procurement goes beyond simple transactions. Building solid and strategic relationships with suppliers can significantly enhance value, drive innovation, and foster collaboration. The American Certified Strategic Procurement and Supplier Relationship Professional (AC-SPR)\u{00ae} program empowers procurement professionals to establish and maintain mutually beneficial supplier relationships, optimize sourcing strategies, and create long-term value for their organizations.",
                ],
            ],
            'who_should_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro'   => 'This program is designed for:',
                'items' => [
                    ['icon' => $check, 'text' => 'Procurement managers focused on strengthening supplier partnerships.'],
                    ['icon' => $check, 'text' => 'Professionals in strategic sourcing roles.'],
                    ['icon' => $check, 'text' => 'Supply chain and procurement leaders who seek to maximize value through collaboration.'],
                    ['icon' => $check, 'text' => 'Executives responsible for driving innovation and long-term supplier engagement.'],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Supplier Segmentation and Prioritization',
                        'text'  => 'Learn how to categorize and prioritize suppliers based on their strategic importance, impact, and relationship potential.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Supplier Performance Management',
                        'text'  => 'Establish and monitor metrics to assess supplier performance and ensure alignment with organizational goals.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Innovation and Collaboration Sourcing',
                        'text'  => 'Discover methods to foster innovation with critical suppliers, encouraging collaborative development and continuous improvement.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Negotiation and Contract Management',
                        'text'  => 'Develop advanced negotiation skills and learn best practices for creating value-driven contracts.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Conflict Resolution and Relationship Building',
                        'text'  => 'Develop skills for effectively resolving conflicts and cultivating strong, long-lasting relationships with suppliers.',
                    ],
                ],
            ],
            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro'   => 'Upon completion of this program, participants will be able to:',
                'items' => [
                    ['icon' => $check, 'text' => 'Segment suppliers based on strategic value and manage different supplier relationships effectively.'],
                    ['icon' => $check, 'text' => 'Establish supplier performance metrics and conduct regular assessments to maintain quality and efficiency.'],
                    ['icon' => $check, 'text' => 'Foster innovation through collaborative sourcing practices with critical suppliers.'],
                    ['icon' => $check, 'text' => "Negotiate and manage contracts that protect the organization\u{2019}s interests while creating mutual benefits."],
                    ['icon' => $check, 'text' => 'Address conflicts constructively, ensuring strong and resilient supplier relationships.'],
                ],
            ],
            'modules' => [
                'heading' => 'Program Structure and Modules',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/10464441-1.png'),
                        'title' => 'Introduction to Strategic Procurement and SRM',
                        'text'  => "Explore the role of strategic procurement and the importance of effective supplier relationship management in today\u{2019}s competitive marketplace.",
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/wholesale.png'),
                        'title' => 'Supplier Segmentation and Prioritization',
                        'text'  => 'Learn how to categorize suppliers by strategic value, impact on the organization, and partnership potential, which will help you focus resources on high-impact relationships.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/14106283.png'),
                        'title' => 'Supplier Performance Metrics and Evaluation',
                        'text'  => 'Develop key performance indicators (KPIs) to monitor supplier performance, quality, and delivery standards. Learn best practices for supplier scorecards and performance reviews.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/6808956.png'),
                        'title' => 'Collaborative Sourcing and Innovation',
                        'text'  => 'Discover techniques to drive innovation through collaborative sourcing with suppliers, unlocking new opportunities for development and mutual growth.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/11813377.png'),
                        'title' => 'Advanced Negotiation Strategies',
                        'text'  => 'Enhance negotiation skills, focusing on creating win-win outcomes that strengthen supplier relationships and secure long-term benefits.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/9375697.png'),
                        'title' => 'Contract Management and Compliance',
                        'text'  => 'Gain expertise in managing and negotiating contracts, with a focus on compliance, value creation, and relationship sustainability.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/15774686.png'),
                        'title' => 'Conflict Resolution in Supplier Relationships',
                        'text'  => 'Build skills to identify potential conflicts early and resolve them effectively, fostering a cooperative approach to problem-solving.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/11204808.png'),
                        'title' => 'Supplier Risk Management',
                        'text'  => 'Learn to identify, assess, and mitigate supplier risks that could impact organizational performance, focusing on reliability and ethical practices.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/10464441.png'),
                        'title' => 'Case Studies in SRM',
                        'text'  => 'Analyze real-world case studies in strategic procurement, learning from successes and challenges in building and managing supplier relationships.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/wholesale.png'),
                        'title' => 'Capstone Project: Developing a Strategic Supplier Management Plan',
                        'text'  => 'Apply your learning by designing a comprehensive supplier management plan, including segmentation, performance metrics, and relationship strategies for a sample organization.',
                    ],
                ],
            ],
            'certification_pathway' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Untitled-9.png'),
                'heading'   => 'Certification and Career Pathways',
                'paragraph' => "Candidates will earn the American Certified Strategic Procurement and Supplier Relationship Professional (AC-SPR)\u{00ae}",
                'roles' => [
                    'Supplier Relationship Manager',
                    'Strategic Sourcing Specialist',
                    'Procurement Innovation Lead',
                    'Vendor Relationship Officer',
                ],
                'cta_label' => 'Enroll Now',
                'cta_href'  => UrlRewriter::local('https://aapscm.org/course/american-certified-strategic-procurement-supplier-relationship-specialist/'),
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-SPR)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => 'The Strategic Procurement and Supplier Relationship Management certification exam focuses on developing advanced strategies for procurement excellence and fostering collaborative, value-driven supplier partnerships.'],
                    ['label' => 'Number of Questions',    'value' => 'Maximum of 100 questions per exam'],
                    ['label' => 'Type of Questions',      'value' => 'Multiple choice'],
                    ['label' => 'Length of Test',         'value' => '120 Minutes'],
                    ['label' => 'Passing Score',          'value' => '600 (on a scale of 1000)'],
                    ['label' => 'Recommended Experience', 'value' => 'No prior experience necessary'],
                    ['label' => 'Languages',              'value' => 'English'],
                    ['label' => 'Retirement',             'value' => 'None'],
                    ['label' => 'Testing Provider',       'value' => 'Affiliate Partners Testing Centers Online Testing'],
                    ['label' => 'Price',                  'value' => '$399.99 USD'],
                ],
            ],
            'training_options' => [
                'check_icon' => $check,
                'options' => [
                    [
                        'text'      => 'Self-Paced Training, Exam Fees: Payment covers the exam only. Complimentary exam guide and practice questions will be provided to assist you.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22281'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-strategic-procurement-supplier-relationship-specialist-ac-sprs/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-strategic-procurement-supplier-relationship-specialist'],
            [
                'title'            => "American Certified Strategic Procurement and Supplier Relationship Professional (AC-SPR)\u{00ae}",
                'content'          => null,
                'excerpt'          => "In today\u{2019}s competitive landscape, successful procurement goes beyond simple transactions. Building solid and strategic relationships with suppliers can significantly enhance value, drive innovation, and foster collaboration.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Strategic Procurement and Supplier Relationship Professional (AC-SPR)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "American Certified Strategic Procurement and Supplier Relationship Professional (AC-SPR)\u{00ae} American Certified Strategic Procurement and Supplier Relationship Professional (AC-SPR)\u{00ae} Overview: In today\u{2019}s competitive landscape, successful procurement goes beyond simple transactions. Building solid and strategic relationships with suppliers can significantly enhance value, drive innovation, and foster collaboration. The American Certified Strategic Procurement and Supplier Relationship Professional (AC-SPR)\u{00ae} program [\u{2026}]",
                'show_in_nav'      => false,
            ],
        );
    }
}
