<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class CharteredProfessionalMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $img = '/storage/cms-images';

        $pageData = [
            'hero' => [
                'heading_html' => 'Chartered Professional <span style="font-weight:600">Membership</span>',
                'subheading'   => 'Becoming a chartered professional and earning certifications is a strategic investment in personal and professional growth. It reflects expertise, dedication, and a commitment to excellence, which is essential for success in today’s dynamic and competitive job market.',
                'image'        => null, // /2024/12/1.png missing locally
            ],

            'importance_heading_html' => 'Importance of Becoming a  <span style="font-weight:600">Chartered Professional and Earning Certifications</span>',

            'importance_items' => [
                [
                    'title' => 'Professional Credibility and Recognition',
                    'text'  => 'Becoming a chartered professional member of an organization enhances your credibility and positions you as an expert. It signifies that you have met rigorous standards of competence and ethics, earning the trust of employers, clients, and colleagues.',
                ],
                [
                    'title' => 'Access to Exclusive Resources and Networks',
                    'text'  => 'Chartered members gain access to specialized resources, tools, and industry-specific knowledge provided by their organizations. Additionally, networking opportunities with other certified professionals, industry leaders, and mentors can lead to valuable collaborations and career growth.',
                ],
                [
                    'title' => 'Global Recognition and Mobility',
                    'text'  => 'Many chartered designations are recognized internationally, allowing professionals to work across borders and in various industries. This opens doors to global career opportunities and establishes a standardized level of competence.',
                ],
                [
                    'title' => 'Ethical and Professional Standards',
                    'text'  => 'Chartered memberships often require adherence to a strict code of ethics. This ensures that professionals uphold integrity and accountability, building trust with stakeholders.',
                ],
                [
                    'title' => 'Relevance in a Competitive Market',
                    'text'  => "In industries where competition is intense, having a chartered status or certification can set you apart, demonstrating that you have the expertise to meet your profession's challenges effectively.",
                ],
                [
                    'title' => 'Career Advancement Opportunities',
                    'text'  => 'Chartered membership and certifications demonstrate your commitment to professional development, making you a competitive candidate for promotions, leadership roles, and higher-level responsibilities. Employers often prioritize certified professionals when hiring or considering internal advancement.',
                ],
                [
                    'title' => 'Enhanced Skills and Knowledge',
                    'text'  => 'Earning certifications requires continuous learning and staying updated with industry standards and innovations. This not only improves your technical skills but also enhances your strategic thinking and problem-solving capabilities.',
                ],
                [
                    'title' => 'Increased Earning Potential',
                    'text'  => 'Certifications often correlate with higher salaries. Employers are willing to pay a premium for professionals who demonstrate their expertise and commitment to maintaining industry standards.',
                ],
                [
                    'title' => 'Increased Earning Potential',
                    'text'  => 'Pursuing a chartered designation or certification shows dedication to your field, enhances your professional reputation, and distinguishes you from peers who may not have similar qualifications.',
                ],
                [
                    'title' => '	Lifelong Learning and Development',
                    'text'  => 'Many professional organizations require ongoing education to maintain chartered status or certifications. This ensures that members remain relevant and adaptive to industry changes throughout their careers.',
                ],
            ],

            'membership_benefits' => [
                'heading_html' => 'Chartered Professional <span style="font-weight:600">Membership</span>',
                'left_items' => [
                    "Take the Certification Exam up till Manager's certification and pass",
                    'Be part of the largest Procurement/Supply Chain/Tourism Management Community',
                    'Track your certification status online after passing.',
                    'Receive a Diploma folder with our golden seal',
                    'Automatically registered to “Spartanburg, South Carolina Chapter” and attend our annual conferences here in the USA free of charge',
                    'Get our Unique ID card and Ring',
                    'Download the AAPSCM® Guide for free',
                    'Access to AAPSCM® Standards+ digital content solution',
                    'Unlock several resources, test questions, brochures + tools, and templates',
                    'Save on career-advancing certifications with Vouchers',
                ],
                'right_items' => [
                    'Find relevant jobs with the AAPSCM® Job Board/Career section',
                    'Stay up-to-date with AAPSCM® publications',
                    'Digital download of several of our resources and books',
                    'Opportunity to join local chapters for educational and networking opportunities (additional annual fee). We have chapters in the following:',
                ],
                'chapters_col_1' => [
                    'Chicago, IL',
                    '	Dallas, TX',
                    'Boston, MA',
                    'Spartanburg, SC',
                ],
                'chapters_col_2' => [
                    'New York, NY',
                    'Rockford, IL',
                    'Columbia, SC',
                ],
            ],

            'pathway_intro' => 'The American Association of Procurement and Supply Chain Management (AAPSCM)® offers a structured pathway to certification, encompassing several key steps:',

            'pathway_left' => [
                'image' => $img.'/2023/10/22-2.png',
                'steps' => [
                    [
                        'heading' => '1. Eligibility Criteria',
                        'text'    => 'Each AAPSCM® certification has specific eligibility requirements related to educational background and professional experience. Prospective candidates should consult the handbook for their desired certification to ensure they meet these prerequisites.',
                        'items'   => [],
                    ],
                    [
                        'heading' => '2. Eligibility Criteria',
                        'text'    => '',
                        'items'   => [
                            '<b>Membership Registration:</b> Create an AAPSCM® account by registering as a Student member. Ensure you use an active, valid email address, as important information about your exam results and certification status will be sent to this address.',
                            '<b>Application Submission:</b> Provide detailed information regarding your educational qualifications and professional experience as part of the application. This information will be reviewed to verify that you meet the eligibility criteria.',
                        ],
                    ],
                ],
            ],

            'pathway_right' => [
                'image' => null, // /2024/12/Untitled-4.jpg missing locally
                'steps' => [
                    [
                        'heading' => '3. Payment',
                        'text'    => 'Upon approval of your application, proceed with the payment for the certification exam. This step finalizes your eligibility to schedule the examination.',
                        'items'   => [],
                    ],
                    [
                        'heading' => '4. Exam Scheduling',
                        'text'    => 'AAPSCM® offers flexibility in exam scheduling:',
                        'items'   => [
                            '<b>Online Proctored Exams:</b> Candidates can take select online proctored certification exams from their home or office, available 24/7.',
                            '<b>In-Person Exams: </b>For those preferring a traditional setting, in-person exams can be scheduled at accredited testing centers.',
                        ],
                    ],
                ],
            ],

            'exam_left' => [
                'steps' => [
                    [
                        'heading' => '5. Examination Details',
                        'text'    => '',
                        'items'   => [
                            '<b>Format: </b>The exams typically consist of up to 100 multiple-choice questions',
                            '<b>Duration:</b> Candidates are allotted 120 minutes to complete the exam.',
                            '<b>Passing Score: </b>A minimum score of 600 out of 1000 is required to pass the exam.',
                        ],
                    ],
                    [
                        'heading' => '6. Post-Exam Process',
                        'text'    => 'After completing the exam:',
                        'items'   => [
                            '<b>Results Notification: </b>Candidates will receive their exam results via the email address provided during registration.',
                            '<b>Results Notification: </b>Candidates will receive their exam results via the email address provided during registration.',
                            '<b>Certification Issuance: </b>Successful candidates will be awarded the corresponding certification, affirming their expertise in procurement and supply chain management.',
                        ],
                    ],
                ],
            ],

            'exam_right' => [
                'images' => [
                    // /2024/12/Untitled-5.png missing locally
                    // /2024/12/Untitled-2-1.png missing locally
                ],
            ],

            'cta_buttons' => [
                ['text' => 'Purchase Course Materials', 'url' => '/all-courses/'],
                ['text' => 'purchase for exams',       'url' => '/checkout/?add-to-cart=19453'],
                ['text' => 'buy virtual live training', 'url' => '/aapscm-training/'],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'chartered-professional-membership'],
            [
                'title'            => 'Chartered Professional Membership',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Chartered Professional Membership with AAPSCM — benefits, importance, and certification pathway.',
                'page_data'        => $pageData,
                'meta_title'       => 'Chartered Professional Membership - AAPSCM',
                'meta_description' => 'Become a Chartered Professional Member with AAPSCM. Discover the benefits, certification pathway, and exam details.',
                'show_in_nav'      => true,
            ],
        );
    }
}
