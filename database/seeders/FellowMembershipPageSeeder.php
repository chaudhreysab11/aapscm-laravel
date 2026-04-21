<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

class FellowMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $img = '/storage/cms-images';

        $pageData = [
            // Section 1: Intro (heading + subheading on left, image on right)
            'intro' => [
                'heading_html' => 'Become an AAPSCM® Fellow:  A Prestigious Recognition of <span style="font-weight:600"> Excellence and Impact Membership<span>',
                'subheading'   => 'Are you a Corporate Executive, Procurement Professional, Supply Chain Leader, College Professor, or a professional who has made significant contributions to the fields of Supply Chain, Procurement or Tourism Management? If so, you may qualify to join an exclusive group of professionals as an AAPSCM® Fellow Member.',
                'image'        => $img.'/2024/12/about-img.png',
            ],

            // Section 2: What is an AAPSCM Fellowship? (left blank, right content)
            'what_is' => [
                'heading_html'   => 'What is an AAPSCM® <span style="font-weight:600">  Fellowship?<span>',
                'paragraph_html' => "The AAPSCM® Fellowship celebrates excellence, diversity, and achievement within the global community of supply chain and tourism management professionals. This prestigious designation recognizes individuals who have demonstrated exceptional leadership, innovation, and contributions to advancing their industry.<br><br>\nFellow Members come from a broad range of backgrounds, representing a diverse and inclusive network of experts. Among the Fellows are:",
                'items_html' => [
                    '<b>Entrepreneurs </b>who have revolutionized their fields.',
                    '<b>Innovators </b>who have introduced groundbreaking ideas and practices.',
                    '<b>Researchers and Academics</b> who have contributed to the body of knowledge through thought leadership and scholarly work.',
                    '<b>Business Leaders and Industry Professionals</b> who have demonstrated outstanding achievements in their careers.',
                ],
            ],

            // Section 3: Why Become an AAPSCM Fellow? (heading + 5 image-boxes)
            'why_become' => [
                'heading_html' => 'Why Become an AAPSCM® <span style="font-weight:600">Fellow?  </span>',
                'icon'         => $img.'/2024/12/Untitled-1-1.png',
                'boxes' => [
                    [
                        'title'       => 'Professional Recognition',
                        'description' => 'Fellowship is a testament to your expertise, leadership, and contributions to your field.',
                    ],
                    [
                        'title'       => 'Networking Opportunities',
                        'description' => 'Join an elite community of leaders, innovators, and pioneers who are shaping the future of supply chain and tourism management',
                    ],
                    [
                        'title'       => 'Leadership Roles',
                        'description' => 'Access opportunities to mentor others, contribute to strategic initiatives, and influence the direction of the AAPSCM®',
                    ],
                    [
                        'title'       => 'Exclusive Benefits',
                        'description' => 'Gain priority access to premium resources, international conferences, industry-specific publications, and thought leadership platforms.',
                    ],
                    [
                        'title'       => 'Global Influence',
                        'description' => 'Represent your profession on a global stage, advocating for best practices and innovative approaches.',
                    ],
                ],
            ],

            // Section 4: Eligibility Criteria (image-boxes left, image right)
            'eligibility' => [
                'heading_html' => 'Eligibility  <span style="font-weight:600">Criteria</span>',
                'subheading'   => 'To qualify for Fellowship, candidates must demonstrate:',
                'image'        => $img.'/2024/12/1-2.png',
                'criteria' => [
                    [
                        'title' => 'Professional Excellence',
                        'description_html' => "A track record of significant achievements in supply chain or tourism management, such as:<br><br>\n1) Developing innovative solutions.<br>\n\t2)Contributing to academic or professional research.\n3)Leading impactful initiatives or organizations.",
                    ],
                    [
                        'title' => 'Leadership and Influence',
                        'description_html' => 'Proven ability to inspire and lead within your industry, community, or organization.',
                    ],
                    [
                        'title' => 'Commitment to Advancement',
                        'description_html' => 'Active involvement in activities that promote the growth and development of the profession, such as mentoring, publishing, or volunteering.',
                    ],
                ],
            ],

            // Section 5: Fellow Membership Categories
            'categories_section' => [
                'heading_html' => 'Fellow Membership Categories for <span style="font-weight:600">AAPSCM®</span>',
                'subheading'   => 'AAPSCM® offers six distinct categories of Fellow Membership to recognize and engage professionals, educators, and organizations contributing to procurement, supply chain, e-commerce, and tourism management. Each membership level reflects a commitment to advancing the field, fostering innovation, and supporting global collaboration.',
                'categories' => [
                    ['title' => 'Grand Fellow ',           'url' => '/grand-fellow-membership/'],
                    ['title' => 'Specialist Fellow ',      'url' => '/specialist-fellow-membership/'],
                    ['title' => 'Professional Fellow ',    'url' => '/professional-fellow-membership/'],
                    ['title' => 'Academic Fellow ',        'url' => '/academic-fellow-membership/'],
                    ['title' => 'Corporate Fellow ',       'url' => '/corporate-fellow-membership/'],
                    ['title' => 'Emerging Leader Fellow ', 'url' => '/emerging-leader-fellow-membership/'],
                    ['title' => 'International Fellow ',   'url' => '/international-fellow-membership/'],
                ],
            ],

            // Section 6: How to Apply
            'how_to_apply' => [
                'heading_html' => 'How to <span style="font-weight:600">Apply  </span>',
                'subheading'   => 'Applying to become an AAPSCM® Fellow is simple:',
                'steps_html' => [
                    '<b>Prepare Your CV</b>: Include your career achievements, professional contributions, leadership roles, and any relevant certifications or awards.',
                    '<b>Submit Your Application</b>: Email your CV to <a href="mailto:info@aapscm.org">info@aapscm.org</a> for review. Ensure that your submission highlights how you meet the eligibility criteria.',
                    '<b>Review and Approval</b>: Your application will be reviewed by the Fellowship Committee. If approved, you will receive an invitation to join this distinguished community.',
                ],
            ],

            // Section 7: CTA
            'cta' => [
                'paragraph' => 'Becoming a Fellow Member is a mark of distinction and a recognition of your exemplary contributions to your profession. It enhances your professional standing and positions you as a leader, innovator, and mentor. For those dedicated to excellence and advancing their field, earning the status of Fellow Member is both a career milestone and a platform for more significant influence and impact.',
                'buttons' => [
                    ['text' => 'Become a Fellow', 'url' => '/checkout/?add-to-cart=12326'],
                    ['text' => 'How to Apply',    'url' => '/how-to-apply/'],
                ],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'fellow-membership'],
            [
                'title'            => 'Fellow Membership',
                'template'         => '',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'Become an AAPSCM Fellow — a prestigious recognition of excellence and impact for supply chain, procurement, and tourism management leaders.',
                'page_data'        => $pageData,
                'meta_title'       => 'Fellow Membership - AAPSCM',
                'meta_description' => 'Become an AAPSCM Fellow Member. A prestigious recognition for Corporate Executives, Supply Chain Leaders, Academics, and Industry Professionals.',
                'show_in_nav'      => true,
            ],
        );
    }
}
