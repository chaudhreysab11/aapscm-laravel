<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Auto-generated from Live Pages HTML/grand-fellow-membership.html
 * Re-run extract_fellow_pages.php to regenerate. Verbatim source content.
 */
class GrandFellowMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = array (
  'hero' =>
  array (
    'heading' => 'Grand Fellow',
  ),
  'eligibility' =>
  array (
    'intro_paragraphs' =>
    array (
      0 => 'The <strong>Grand Fellow Membership</strong> represents the highest tier of recognition and engagement within <strong>AAPSCM®</strong>, tailored for distinguished professionals and visionary organizations committed to advancing excellence in <strong>procurement, supply chain management, e-commerce,</strong> and <strong>tourism management.</strong>',
      1 => 'This membership is ideal for those seeking to leverage the full suite of <strong>AAPSCM®</strong> benefits while influencing global industry standards. Eligible individuals or entities demonstrate:',
    ),
    'items' =>
    array (
      0 => 'A proven record of leadership, innovation, and impactful contributions across multiple domains.',
      1 => 'A commitment to fostering global collaboration, mentorship, and thought leadership.',
      2 => 'A desire to participate actively in shaping industry policies, standards, and practices through high-level engagement.',
    ),
    'closing_paragraph' => '<strong>Grand Fellow Membership</strong> is designed for those who aspire to lead, collaborate, and make a significant mark on the global stage.',
  ),
  'benefits_intro' => 'As a<strong> Grand Fellow Member</strong>, you gain unparalleled access to all the privileges and opportunities offered by AAPSCM®, ensuring maximum impact on your professional or organizational journey:',
  'benefits' =>
  array (
    0 =>
    array (
      'heading' => 'Comprehensive Access to Membership Benefits',
      'items' =>
      array (
        0 => 'Full inclusion of benefits from Professional, Academic, Corporate, Specialist, Emerging Leader, Honorary, and International Fellow Memberships.',
      ),
    ),
    1 =>
    array (
      'heading' => 'Global Leadership and Influence',
      'items' =>
      array (
        0 => 'Opportunities to take on <b>executive leadership roles</b> within AAPSCM®, including chairing advisory boards, leading global working groups, and contributing to strategic initiatives.',
        1 => 'Ambassadorial privileges to represent AAPSCM® in international forums and promote its mission globally.',
      ),
    ),
    2 =>
    array (
      'heading' => 'Participation in Awards Panels',
      'items' =>
      array (
        0 => 'Exclusive invitations to serve on AAPSCM® Awards Panels, contributing to the selection of industry leaders and innovators for prestigious recognitions.',
      ),
    ),
    3 =>
    array (
      'heading' => 'VIP Access to International Conferences and Summits',
      'items' =>
      array (
        0 => 'Complimentary or priority invitations to <b>global conferences, summits, and forums</b>, providing access to cutting-edge insights, industry trends, and unparalleled networking opportunities.',
      ),
    ),
    4 =>
    array (
      'heading' => 'Professional and Organizational Development',
      'items' =>
      array (
        0 => 'Complimentary access to all AAPSCM®® certifications, advanced training modules, and professional development programs to enhance skills and expertise.',
        1 => 'Tailored resources and tools to support organizational growth, sustainability, and compliance with global standards.',
      ),
    ),
    5 =>
    array (
      'heading' => 'Recognition and Visibility',
      'items' =>
      array (
        0 => 'Prominent recognition as a <b>Grand Fellow Member on AAPSCM®\'s global platforms</b>, including the website, newsletters, event materials, and publications.',
        1 => 'Opportunities to deliver keynote addresses, lead panels, and publish thought leadership articles under the AAPSCM® banner.',
      ),
    ),
    6 =>
    array (
      'heading' => 'Mentorship and Collaboration',
      'items' =>
      array (
        0 => 'Engage in structured <b>mentorship programs</b>, guiding emerging leaders and sharing expertise across the AAPSCM® network.',
        1 => 'Collaborate with top professionals, educators, and organizations on pioneering research, projects, and global initiatives.',
      ),
    ),
    7 =>
    array (
      'heading' => 'Participation in Global Projects',
      'items' =>
      array (
        0 => 'Direct involvement in <b>AAPSCM®-led international collaborations</b>, research initiatives, and policy development enables you to influence industry evolution globally.',
      ),
    ),
    8 =>
    array (
      'heading' => 'Access to Exclusive Networking Opportunities',
      'items' =>
      array (
        0 => 'VIP invitations to elite networking events, including <b>regional summits, corporate workshops,</b> and <b>private think tanks</b> with industry leaders.',
      ),
    ),
    9 =>
    array (
      'heading' => 'Awards and Grants',
      'items' =>
      array (
        0 => 'Eligibility for <b>sustainability and innovation grants</b> to support cutting-edge research and development.',
        1 => 'Special recognition through AAPSCM® awards for contributions to advancing industry practices.',
      ),
    ),
  ),
  'fee' =>
  array (
    'text' => 'The annual membership fee for the Grand Fellow Membership is $1,999.99, reflecting its unmatched benefits and opportunities to lead, collaborate, and shape the global landscape of procurement, supply chain management, e-commerce, and tourism management.',
  ),
  'cta' =>
  array (
    'heading' => 'Join the Pinnacle of Excellence',
    'text' => 'Elevate your influence and maximize your impact as a Grand Fellow Member of AAPSCM®. Be part of a prestigious community shaping the future of global industries through collaboration, innovation, and leadership.',
    'join_url' => '/checkout/?add-to-cart=35458%20',
    'join_label' => 'Join Now',
    'cv_url' => '/fellow-membership-form/?tier=grand_fellow',
    'cv_label' => 'Submit Your CV',
  ),
);

        Page::updateOrCreate(
            ['slug' => 'grand-fellow-membership'],
            [
                'title'            => 'Grand Fellow Membership',
                'template'         => 'fellow_tier',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'The Grand Fellow Membership represents the highest tier of recognition and engagement within AAPSCM®, tailored for distinguished professionals and visionary organizations committed to advancing exc...',
                'page_data'        => $pageData,
                'meta_title'       => 'Grand Fellow Membership - AAPSCM',
                'meta_description' => 'The Grand Fellow Membership represents the highest tier of recognition and engagement within AAPSCM®, tailored for distinguished professionals and visionary organizations committed to advancing exc...',
                'show_in_nav'      => false,
            ],
        );
    }
}
