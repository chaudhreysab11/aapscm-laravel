<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-public-sector-procurement-compliance-specialist/
 * for WP parity (American Certified Public Sector Procurement & Compliance Professional, AC-PSPC).
 *
 * Mirrors visible Elementor sections in source order. The trailing hidden
 * Elementor section is skipped.
 */
class CertAmericanCertifiedPublicSectorProcurementComplianceSpecialistPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image'      => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Untitled-2-1.png'),
                'heading'    => 'Public Sector Procurement and Compliance',
                'paragraphs' => [
                    'Overview: Procurement in the public sector requires strict adherence to regulations and high standards of accountability and transparency. The Public Sector Procurement and Compliance program provides professionals with the knowledge to navigate complex public procurement regulations, maintain compliance, and uphold ethical procurement standards. This program equips participants to manage procurement within government agencies or public organizations, ensuring that all processes align with legal requirements and organizational policies.',
                ],
            ],
            'who_should_enroll' => [
                'heading' => 'Who Should Enroll?',
                'intro'   => 'This program is designed for:',
                'items' => [
                    ['icon' => $check, 'text' => 'Government procurement professionals responsible for purchasing goods and services.'],
                    ['icon' => $check, 'text' => 'Compliance officers working within public sector organizations.'],
                    ['icon' => $check, 'text' => 'Professionals seeking to understand public procurement regulations and standards.'],
                    ['icon' => $check, 'text' => 'Individuals aspiring to transition into public sector procurement roles.'],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Group-1000001863.png'),
                        'title' => 'Regulatory Compliance in Public Procurement',
                        'text'  => 'Gain a comprehensive understanding of the regulations governing public sector procurement, including local, state, and federal laws.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Group-1000001864.png'),
                        'title' => 'Ethics and Accountability',
                        'text'  => 'Learn best practices for maintaining ethical standards in procurement and promoting transparency and accountability in public sector purchasing.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Group-1000001865.png'),
                        'title' => 'Supplier Evaluation and Selection',
                        'text'  => 'Understand the unique criteria for selecting suppliers in the public sector, focusing on fair competition and compliance with procurement policies.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Group-1000001866.png'),
                        'title' => 'Transparency and Reporting',
                        'text'  => 'Discover tools and techniques to maintain transparency throughout the procurement process, ensuring compliance with reporting requirements.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Group-1000001867.png'),
                        'title' => 'Managing Public Procurement Contracts',
                        'text'  => 'Develop skills to manage and oversee contracts in the public sector, with a focus on compliance, quality assurance, and cost control.',
                    ],
                ],
            ],
            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'intro'   => 'Upon completion of this program, participants will be able to:',
                'items' => [
                    ['icon' => $check, 'text' => 'Interpret and apply public procurement regulations and ensure compliance in purchasing processes.'],
                    ['icon' => $check, 'text' => 'Uphold high ethical standards, ensuring transparency and accountability in all procurement activities.'],
                    ['icon' => $check, 'text' => 'Conduct supplier evaluations that meet public sector requirements, emphasizing fairness and adherence to policies.'],
                    ['icon' => $check, 'text' => 'Implement transparency measures, from bid selection to contract management, in alignment with public sector standards.'],
                    ['icon' => $check, 'text' => 'Implement transparency measures, from bid selection to contract management, in alignment with public sector standards.'],
                ],
            ],
            'modules' => [
                'heading' => 'Program Structure and Modules',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4862413-2.png'),
                        'title' => 'Introduction to Public Sector Procurement',
                        'text'  => 'Explore the unique aspects of procurement within government and public institutions, including the impact of regulations and policies.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/17202459.png'),
                        'title' => 'Regulatory Compliance in Public Procurement',
                        'text'  => 'Learn about the legal requirements and regulations that govern public procurement, including federal, state, and local procurement laws.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/10162784.png'),
                        'title' => 'Ethics and Accountability in Public Procurement',
                        'text'  => 'Understand ethical standards and accountability practices that promote trust and integrity within public procurement.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/17235065.png'),
                        'title' => 'Supplier Evaluation and Competitive Bidding',
                        'text'  => 'Discover methods for fair supplier evaluation and the competitive bidding process, ensuring compliance with public procurement policies.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/11126001.png'),
                        'title' => 'Transparency and Reporting Requirements',
                        'text'  => 'Learn to maintain transparency through reporting and documentation, ensuring that procurement activities are open and accessible.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/9375453.png'),
                        'title' => 'Contract Management and Quality Assurance',
                        'text'  => 'Develop skills in advanced analytics to forecast supply chain needs, optimize decision-making, and improve procurement performance.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2117661.png'),
                        'title' => 'Risk Management in Public Procurement',
                        'text'  => 'Identify and mitigate risks in public sector procurement, including compliance risks, supplier performance, and financial exposure.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12455416.png'),
                        'title' => 'Sustainable and Inclusive Procurement',
                        'text'  => 'Explore sustainable procurement practices and strategies for inclusive procurement, ensuring fair opportunities for diverse suppliers.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1654190-1.png'),
                        'title' => 'Case Studies in Public Sector Procurement',
                        'text'  => 'Analyze real-world case studies from the public sector, examining successful and unsuccessful procurement strategies to learn best practices.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/9650603.png'),
                        'title' => 'Capstone Project: Developing a Public Procurement Compliance Strategy',
                        'text'  => 'Apply your learning by designing a comprehensive procurement compliance strategy for a hypothetical government agency, focusing on regulatory adherence, transparency, and accountability.',
                    ],
                ],
            ],
            'certification_pathway' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Untitled-5-1.png'),
                'heading'   => 'Certification and Career Pathways',
                'paragraph' => "Candidates who passed the test will receive the American Certified Public Sector Procurement & Compliance Professional (AC-PSPC)\u{00ae} designation. This program opens doors to careers such as:",
                'roles' => [
                    'Public Procurement Officer',
                    'Compliance Officer in Government',
                    'Contract Manager for Public Organizations',
                    'Public Sector Procurement Consultant',
                ],
                'cta_label' => 'Enroll Now',
                'cta_href'  => UrlRewriter::local('https://aapscm.org/course/american-certified-public-sector-procurement-compliance-specialist/'),
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-PSPC)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => "The American Certified Public Sector Procurement & Compliance Professional (AC-PSPC)\u{00ae} exam will focus on the foundational principles of public sector procurement, compliance with federal, state, and local regulations, ethical procurement practices, strategic sourcing, contract management, vendor negotiations, and alignment with organizational goals, emphasizing transparency, accountability, and fiscal responsibility."],
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
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22302'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-public-sector-procurement-compliance-specialist-ac-pspcs/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-public-sector-procurement-compliance-specialist'],
            [
                'title'            => "American Certified Public Sector Procurement & Compliance Professional (AC-PSPC)\u{00ae}",
                'content'          => null,
                'excerpt'          => 'Procurement in the public sector requires strict adherence to regulations and high standards of accountability and transparency. The Public Sector Procurement and Compliance program provides professionals with the knowledge to navigate complex public procurement regulations, maintain compliance, and uphold ethical procurement standards.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Public Sector Procurement & Compliance Professional (AC-PSPC)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "American Certified Public Sector Procurement & Compliance Professional (AC-PSPC)\u{00ae} Public Sector Procurement and Compliance Overview: Procurement in the public sector requires strict adherence to regulations and high standards of accountability and transparency. The Public Sector Procurement and Compliance program provides professionals with the knowledge to navigate complex public procurement regulations, maintain compliance, and uphold ethical procurement […]",
                'show_in_nav'      => false,
            ],
        );
    }
}
