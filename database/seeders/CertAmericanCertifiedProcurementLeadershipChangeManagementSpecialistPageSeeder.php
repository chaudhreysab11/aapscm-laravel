<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes
 * https://aapscm.org/american-certified-procurement-leadership-change-management-specialist/
 * for WP parity (American Certified Procurement Leadership & Change Management
 * Professional, AC-PLCM).
 */
class CertAmericanCertifiedProcurementLeadershipChangeManagementSpecialistPageSeeder extends Seeder
{
    public function run(): void
    {
        $check = UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/check.png');

        $pageData = [
            'intro' => [
                'image'         => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/1-55.png'),
                'title_heading' => 'Procurement Leadership and Change Management',
                'paragraph'     => "Overview: Effective procurement requires not only strategic thinking but also strong leadership skills to navigate change and drive organizational success. The Procurement Leadership and Change Management program empowers professionals with the skills to lead teams, implement transformative procurement strategies, and manage change within procurement functions. This program is designed for professionals looking to advance into leadership roles and shape the future of procurement through vision, influence, and strategic direction.",
            ],
            'who_should_enroll' => [
                'heading'    => 'Who Should Enroll?',
                'intro'      => 'This program is ideal for:',
                'check_icon' => $check,
                'items' => [
                    ['text' => 'Mid- to senior-level procurement professionals preparing for leadership roles.'],
                    ['text' => 'Current procurement managers seeking to enhance their leadership and change management skills.'],
                    ['text' => 'Team leaders responsible for driving procurement transformation within their organizations.'],
                    ['text' => 'Professionals looking to cultivate skills in strategic decision-making and organizational change.'],
                ],
            ],
            'program_highlights' => [
                'heading' => 'Program Highlights',
                'items' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883853.png'),
                        'title' => 'Leadership Skills for Procurement',
                        'text'  => 'Build essential leadership qualities, including communication, decision-making, and team management, tailored specifically for procurement functions.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883854.png'),
                        'title' => 'Strategic Decision-Making',
                        'text'  => 'Learn to analyze procurement data to extract actionable insights, supporting strategic decision-making and process improvements.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883855.png'),
                        'title' => 'AI and Machine Learning',
                        'text'  => 'Explore AI and ML applications in procurement, from demand forecasting to supplier risk assessment.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883856.png'),
                        'title' => 'Building High-Performing Teams',
                        'text'  => 'Develop strategies for building, motivating, and managing high-performing procurement teams.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/12/Group-1597883857.png'),
                        'title' => 'Influence and Stakeholder Engagement',
                        'text'  => 'Master the art of influencing stakeholders and collaborating across departments to drive procurement initiatives.',
                    ],
                ],
            ],
            'key_learning_outcomes' => [
                'heading'    => 'Key Learning Outcomes',
                'intro'      => 'Upon completion of this program, participants will be able to:',
                'check_icon' => $check,
                'items' => [
                    ['text' => 'Lead procurement teams effectively, fostering a culture of collaboration, innovation, and accountability.'],
                    ['text' => "Make strategic procurement decisions that enhance value and align with the organization\u{2019}s vision."],
                    ['text' => 'Apply change management techniques to facilitate smooth transitions within procurement processes.'],
                    ['text' => 'Engage and influence key stakeholders, securing buy-in for procurement projects and initiatives.'],
                    ['text' => 'Build and manage high-performing teams that deliver on procurement goals and contribute to organizational success.'],
                ],
            ],
            'program_structure' => [
                'heading' => 'Program Structure and Modules',
                'modules' => [
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2553140-1.png'),
                        'title' => 'Introduction to Leadership in Procurement',
                        'text'  => 'Explore the role of leadership in procurement, understanding how strong leaders drive procurement success and organizational impact.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/14898785.png'),
                        'title' => 'Key Leadership Skills for Procurement Professionals',
                        'text'  => 'Develop core leadership skills tailored to procurement, including communication, conflict resolution, and decision-making..',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/10212932.png'),
                        'title' => 'Strategic Decision-Making in Procurement',
                        'text'  => 'Learn how to make informed, strategic decisions that support organizational goals and procurement efficiency.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/15939784.png'),
                        'title' => 'Fundamentals of Change Management',
                        'text'  => 'Understand change management principles and learn how to lead teams through procurement changes effectively.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/7576690.png'),
                        'title' => 'Building and Managing High-Performing Teams',
                        'text'  => 'Gain skills in team building, motivation, and performance management to create a cohesive and productive procurement team.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/1283342.png'),
                        'title' => 'Stakeholder Engagement and Influence',
                        'text'  => 'Master the art of influencing and engaging stakeholders, ensuring alignment and support for procurement initiatives.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/15555014.png'),
                        'title' => 'Leading Procurement Transformation Projects',
                        'text'  => 'Learn to design and implement procurement transformation projects, from planning and communication to execution and evaluation.',
                    ],
                    [
                        'image' => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/2553140-1.png'),
                        'title' => 'Capstone Project: Developing a Leadership Strategy for Procurement Change',
                        'text'  => 'Apply your learning by creating a leadership strategy for a procurement transformation initiative, focusing on change management, team leadership, and stakeholder engagement.',
                    ],
                ],
            ],
            'career_pathways' => [
                'image'     => UrlRewriter::image('https://aapscm.org/wp-content/uploads/2024/11/Untitled-5-4.png'),
                'heading'   => 'Certification and Career Pathways',
                'intro'     => 'Graduates of this program will receive the Certified Procurement Leadership Specialist designation, preparing them for roles such as',
                'roles' => [
                    'Procurement Team Leader',
                    'Head of Procurement Transformation',
                    'Senior Procurement Manager',
                    'Senior Procurement Manager',
                ],
                'cta_label' => 'Enroll Now',
                'cta_href'  => '#enroll-now',
            ],
            'exam_details' => [
                'rows' => [
                    ['label' => 'Exam Codes',             'value' => "Exam (AC-PLCMS)\u{00ae}"],
                    ['label' => 'Exam Details',           'value' => "The American Certified Procurement Leadership & Change Management (AC-PLCM)\u{00ae} exam will focus on leadership principles, strategic decision-making, change management methodologies, fostering innovation, stakeholder engagement, team building, and driving organizational transformation within procurement functions to achieve sustainable and adaptive supply chain excellence."],
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
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/checkout/?add-to-cart=22318'),
                    ],
                    [
                        'text'      => 'Instructor-Led Training: Enroll in a 4-day program with 2 hours of live instruction daily, led by industry experts, for $1,200.',
                        'cta_label' => 'Purchase and Pay',
                        'cta_href'  => UrlRewriter::local('https://aapscm.org/aapscm-training-virtual-american-certified-procurement-leadership-change-management-specialist-acplcms/'),
                    ],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'american-certified-procurement-leadership-change-management-specialist'],
            [
                'title'            => "American Certified Procurement Leadership & Change Management Professional (AC-PLCM)\u{00ae}",
                'content'          => null,
                'excerpt'          => 'Effective procurement requires not only strategic thinking but also strong leadership skills to navigate change and drive organizational success. The Procurement Leadership and Change Management program empowers professionals with the skills to lead teams, implement transformative procurement strategies, and manage change within procurement functions.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "American Certified Procurement Leadership & Change Management Professional (AC-PLCM)\u{00ae} - AAPSCM\u{00ae}",
                'meta_description' => "American Certified Procurement Leadership & Change Management Professional (AC-PLCM)\u{00ae} Procurement Leadership and Change Management Overview: Effective procurement requires not only strategic thinking but also strong leadership skills to navigate change and drive organizational success. The Procurement Leadership and Change Management program empowers professionals with the skills to lead teams, implement transformative procurement strategies, and manage change […]",
                'show_in_nav'      => false,
            ],
        );
    }
}
