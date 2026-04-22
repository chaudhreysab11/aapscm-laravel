<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-it-procurement-digital-transformation-specialist/
 * for WP parity (American Certified IT Procurement & Digital Transformation Professional, ACIPDT).
 *
 * Mirrors visible Elementor sections in source order. The trailing hidden
 * Elementor section is skipped.
 *
 * The page on WP has no separate "lead" paragraph after the intro — the
 * intro itself is a single paragraph beginning with "Overview:".
 */
class CertAmericanCertifiedItProcurementDigitalTransformationSpecialistPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image'      => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-42.png'),
                'heading'    => 'Procurement for Digital Transformation and IT',
                'paragraphs' => [
                    'Overview: As organizations continue to digitize, the demand for efficient and strategic IT procurement has grown. The Procurement for Digital Transformation and IT program addresses the complexities of sourcing technology, including software, hardware, and digital services. Participants will learn how to evaluate IT vendors, manage licensing agreements, and optimize procurement for digital transformation initiatives, ensuring cost-effective, secure, and scalable technology acquisitions.',
                ],
            ],
            'who_should_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro'   => 'This program is designed for:',
                'items' => [
                    ['icon' => $check, 'text' => 'IT procurement specialists looking to deepen their expertise in technology sourcing.'],
                    ['icon' => $check, 'text' => 'Procurement professionals involved in digital transformation projects.'],
                    ['icon' => $check, 'text' => 'IT managers tasked with evaluating and acquiring technology solutions.'],
                    ['icon' => $check, 'text' => 'Business leaders aiming to optimize IT investment for digital transformation.'],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Software and IT Procurement',
                        'text'  => 'Understand the unique needs and requirements for procuring software and hardware, including vendor evaluation and compatibility.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Vendor Evaluation and Selection',
                        'text'  => 'Learn best practices for evaluating IT vendors, assessing product features, vendor support, and long-term viability.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Licensing and SaaS Contracts',
                        'text'  => 'Develop expertise in managing software licensing, SaaS contracts, and subscription models, ensuring compliance and cost-efficiency.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Cloud and Cybersecurity Procurement',
                        'text'  => 'Gain insights into cloud service procurement, cybersecurity requirements, and how to ensure vendor security compliance.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Digital Transformation Strategy',
                        'text'  => 'Discover the role of procurement in driving digital transformation by aligning technology acquisitions with organizational goals.',
                    ],
                ],
            ],
            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro'   => 'Upon completion of this program, participants will be able to:',
                'items' => [
                    ['icon' => $check, 'text' => 'Navigate IT procurement complexities, from vendor selection to contract negotiations.'],
                    ['icon' => $check, 'text' => 'Assess and select technology vendors based on value, security, and long-term viability.'],
                    ['icon' => $check, 'text' => 'Manage software and SaaS licensing, ensuring compliance and cost control.'],
                    ['icon' => $check, 'text' => 'Procure cloud and cybersecurity solutions aligned with organizational standards and risk tolerance.'],
                    ['icon' => $check, 'text' => 'Support organizational digital transformation goals through strategic technology procurement.'],
                ],
            ],
            'modules' => [
                'heading' => 'Program Structure and Modules',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4862413-1.png'),
                        'title' => 'Introduction to IT Procurement in Digital Transformation',
                        'text'  => 'Explore the fundamentals of IT procurement and its role in supporting digital transformation strategies.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/11894800.png'),
                        'title' => 'Understanding Software and Hardware Procurement',
                        'text'  => 'Learn the essentials of procuring software, hardware, and IT services, focusing on compatibility, scalability, and organizational fit.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12882476.png'),
                        'title' => 'Vendor Evaluation and Technology Selection',
                        'text'  => 'Develop criteria for evaluating IT vendors, assessing product quality, support, and long-term viability to ensure value.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/3135763.png'),
                        'title' => 'Managing Software Licensing and SaaS Contracts',
                        'text'  => 'Gain expertise in software licensing models, SaaS subscriptions, and contract negotiations, focusing on compliance and cost-efficiency.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/14488200.png'),
                        'title' => 'Cloud and Cybersecurity Procurement',
                        'text'  => 'Learn to procure cloud solutions and cybersecurity tools, ensuring alignment with security standards and risk management practices.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/7440452.png'),
                        'title' => 'Digital Transformation and Technology Strategy',
                        'text'  => 'Understand how to align technology procurement with digital transformation objectives, supporting organizational goals through strategic sourcing.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12708155-1.png'),
                        'title' => 'Risk Management in IT Procurement',
                        'text'  => 'Develop skills to identify and mitigate risks associated with technology procurement, from vendor lock-in to cybersecurity threats.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/16138030.png'),
                        'title' => 'Capstone Project: Building an IT Procurement Strategy for Digital Transformation',
                        'text'  => 'Apply your learning by creating a comprehensive IT procurement strategy for a sample organization, focusing on vendor selection, licensing, and digital transformation alignment.',
                    ],
                ],
            ],
            'certification_pathway' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Untitled-13.png'),
                'heading'   => 'Certification and Career Pathways',
                'paragraph' => "Successful candidates who passed the test will receive the American Certified IT Procurement & Digital Transformation Professional (ACIPDT\u{00ae}). This program opens doors to careers such as:",
                'roles' => [
                    'IT Procurement Specialist',
                    'Digital Transformation Procurement Lead',
                    'IT Vendor Manager',
                    'Technology Sourcing Specialist',
                ],
                // CTA hidden: links to legacy /course/ URL (commented out for review).
                // 'cta_label' => 'Enroll Now',
                // 'cta_href'  => UrlRewriter::local('https://aapscm.org/course/american-certified-it-procurement-digital-transformation-specialist-ac-ipdts/'),
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-IPDTS)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => 'The exam will focus on the principles, processes, and strategies of IT procurement, and its alignment with digital transformation goals, emphasizing vendor management, emerging technologies, compliance, and strategic value creation.'],
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
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22300'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-it-procurement-digital-transformation-specialist-acipdts/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-it-procurement-digital-transformation-specialist'],
            [
                'title'            => "American Certified IT Procurement & Digital Transformation Professional(ACIPDT)\u{00ae}",
                'content'          => null,
                'excerpt'          => 'As organizations continue to digitize, the demand for efficient and strategic IT procurement has grown. The Procurement for Digital Transformation and IT program addresses the complexities of sourcing technology, including software, hardware, and digital services.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified IT Procurement & Digital Transformation Professional(ACIPDT)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "American Certified IT Procurement & Digital Transformation Professional (ACIPDT\u{00ae}) Procurement for Digital Transformation and IT Overview: As organizations continue to digitize, the demand for efficient and strategic IT procurement has grown. The Procurement for Digital Transformation and IT program addresses the complexities of sourcing technology, including software, hardware, and digital services. Participants will learn how to […]",
                'show_in_nav'      => false,
            ],
        );
    }
}
