<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-procurement-risk-management-specialist/
 * for WP parity (American Certified Procurement Risk Management Professional, AC-PRM).
 *
 * Mirrors visible Elementor sections in source order. The trailing hidden
 * section (elementor-hidden) is skipped.
 */
class CertAmericanCertifiedProcurementRiskManagementSpecialistPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image'      => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-40.png'),
                'heading'    => 'Advanced Procurement Risk Management',
                'paragraphs' => [
                    'Overview: This program would specialize in identifying, assessing, and managing procurement risks, such as supply chain disruptions, geopolitical factors, and cybersecurity threats.',
                    'Key Topics: Risk assessment frameworks, supply chain resilience, risk mitigation strategies, contingency planning, and cybersecurity in procurement.',
                    'Ideal For : Procurement managers and executives aiming to build robust risk management strategies for global supply chains.',
                ],
            ],
            'lead' => [
                'paragraph' => 'Procurement risks are at an all-time high in an increasingly complex global environment. Effective risk management is essential for organizations looking to maintain resilience and continuity from supply chain disruptions to cybersecurity threats. The Advanced Procurement Risk Management program provides procurement professionals with the skills to identify, assess, and mitigate risks across the supply chain. This program emphasizes proactive risk management, equipping participants with the tools to build a resilient procurement strategy that withstands internal and external challenges.',
            ],
            'who_should_enroll' => [
                'heading' => 'Who Should Enroll?',
                'items' => [
                    ['icon' => $check, 'text' => 'Procurement managers and supply chain leaders who want to strengthen risk management in their organizations.'],
                    ['icon' => $check, 'text' => 'Professionals involved in procurement strategy and policy development.'],
                    ['icon' => $check, 'text' => 'Risk management specialists seeking specialized skills in procurement risk assessment..'],
                    ['icon' => $check, 'text' => 'Executives aiming to build a resilient and adaptable supply chain structure.'],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Risk Identification and Assessment',
                        'text'  => 'Learn to identify common risks in procurement, from supplier reliability to economic and geopolitical factors.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Supply Chain Resilience and Continuity Planning',
                        'text'  => 'Understand the principles of resilience, continuity planning, and disaster recovery within procurement.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'Cybersecurity in Procurement',
                        'text'  => 'Explore the importance of securing procurement systems and data, especially in light of increasing cyber threats.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Compliance and Regulatory Risk Management',
                        'text'  => 'Learn aboutglobal regulatory standards and how to maintain compliance to reduce legal and operational risks.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Supplier Risk Evaluation',
                        'text'  => 'Develop frameworks for evaluating and monitoring supplier risk, focusing on financial stability, reliability, and adherence to ethical practices.',
                    ],
                ],
            ],
            'learning_outcomes' => [
                'heading' => 'Key Learning Outcomes',
                'items' => [
                    ['icon' => $check, 'text' => 'Conduct thorough risk assessments across the procurement process, identifying and prioritizing critical vulnerabilities.'],
                    ['icon' => $check, 'text' => 'Develop resilience strategies that minimize the impact of supply chain disruptions.'],
                    ['icon' => $check, 'text' => 'Integrate cybersecurity protocols within procurement to protect against data breaches and cyber threats.'],
                    ['icon' => $check, 'text' => 'Ensure compliance with global regulations to mitigate legal and financial risks.'],
                    ['icon' => $check, 'text' => 'Build and apply supplier evaluation frameworks to monitor and manage supplier reliability and ethical standards.'],
                ],
            ],
            'modules' => [
                'heading' => 'Program Structure and Modules',
                'cards' => [
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/12708155.png'),
                        'title' => 'Introduction to Procurement Risk Management',
                        'text'  => 'Explore the fundamentals of procurement risk management and its importance in maintaining organizational stability.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/18273843.png'),
                        'title' => 'Types of Risks in Procurement',
                        'text'  => 'Learn about the various operational, financial, regulatory, and supplier-related risks and how each can impact the supply chain.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/9926288.png'),
                        'title' => 'Supplier Risk Evaluation and Monitoring',
                        'text'  => 'Develop frameworks for assessing and monitoring supplier risk, ensuring reliable partnerships that align with corporate values and risk tolerance.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/4813885.png'),
                        'title' => 'Supply Chain Resilience and Continuity Planning',
                        'text'  => 'Discover how to design and implement continuity planning, ensuring procurement can operate despite disruptions or crises.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2092629.png'),
                        'title' => 'Cybersecurity and Data Protection in Procurement',
                        'text'  => 'Understand the role of cybersecurity in procurement, with a focus on protecting data, digital systems, and communication channels from potential breaches.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/11782403.png'),
                        'title' => 'Compliance and Regulatory Risks',
                        'text'  => 'Learn how to navigate international procurement laws, trade regulations, and industry-specific standards to maintain compliance and avoid legal consequences.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/13728501.png'),
                        'title' => 'Risk Mitigation and Contingency Strategies',
                        'text'  => 'Develop and implement contingency plans and risk mitigation strategies to reduce exposure and protect against potential supply chain failures.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/6757112.png'),
                        'title' => 'Risk Assessment Tools and Technologies',
                        'text'  => 'Gain hands-on experience with digital tools and software that help assess, monitor, and report on procurement risks in real-time.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1654190.png'),
                        'title' => 'Case Studies and Real-World Applications',
                        'text'  => 'Analyze real-world case studies on procurement risk, learning from successful and unsuccessful approaches to risk management.',
                    ],
                    [
                        'icon'  => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1087927.png'),
                        'title' => 'Capstone Project: Designing a Risk-Resilient Procurement Strategy',
                        'text'  => 'Apply what you have learned by developing a comprehensive procurement risk management plan for a sample organization, including continuity and contingency planning.',
                    ],
                ],
            ],
            'certification_pathway' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Untitled-4.png'),
                'heading'   => 'Certification and Career Pathways',
                'roles' => [
                    'Procurement Risk Manager',
                    'Supply Chain Resilience Specialist',
                    'Compliance and Regulatory Officer',
                    'Procurement Strategy Consultant',
                ],
                // CTA hidden: links to legacy /course/ URL (commented out for review).
                // 'cta_label' => 'Enroll Now',
                // 'cta_href'  => UrlRewriter::local('https://aapscm.org/course/american-certified-procurement-risk-management-specialist/'),
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-PRM)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => 'The exam emphasizes identifying, evaluating, and mitigating procurement risks, with a focus on supply chain disruptions, geopolitical challenges, and cybersecurity threats.'],
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
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22256'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-procurement-risk-management-specialist-ac-prms/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-procurement-risk-management-specialist'],
            [
                'title'            => "American Certified Procurement Risk Management Professional (AC-PRM)\u{00ae}",
                'content'          => null,
                'excerpt'          => 'This program would specialize in identifying, assessing, and managing procurement risks, such as supply chain disruptions, geopolitical factors, and cybersecurity threats.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Procurement Risk Management Professional (AC-PRM)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "American Certified Procurement Risk Management Professional (AC-PRM)\u{00ae} Advanced Procurement Risk Management Overview: This program would specialize in identifying, assessing, and managing procurement risks, such as supply chain disruptions, geopolitical factors, and cybersecurity threats. Key Topics: Risk assessment frameworks, supply chain resilience, risk mitigation strategies, contingency planning, and cybersecurity in procurement. Ideal For : Procurement managers and [\u{2026}]",
                'show_in_nav'      => false,
            ],
        );
    }
}
