<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Auto-generated from Live Pages HTML/corporate-fellow-membership.html
 * Re-run extract_fellow_pages.php to regenerate. Verbatim source content.
 */
class CorporateFellowMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = array (
  'hero' =>
  array (
    'heading' => 'Corporate Fellow',
  ),
  'eligibility' =>
  array (
    'intro_paragraphs' =>
    array (
      0 => 'The Corporate Fellow Membership is specifically designed for <strong>organizations</strong> that exemplify leadership, innovation, and excellence in the fields of <strong>procurement, supply chain management, e-commerce, or tourism management.</strong> Eligible organizations are those that:',
    ),
    'items' =>
    array (
      0 => 'Demonstrate a commitment to advancing industry practices and standards.',
      1 => 'Actively invest in employee development, innovation, and sustainability initiatives.',
      2 => 'Foster partnerships and collaborations that drive growth and global competitiveness.',
    ),
    'closing_paragraph' => 'This membership positions companies as leaders in their industry, with exclusive opportunities to showcase their influence and impact.',
  ),
  'benefits_intro' => 'Corporate Fellow Members gain access to a suite of premium benefits designed to enhance their brand, growth, and industry presence:',
  'benefits' =>
  array (
    0 =>
    array (
      'heading' => 'Brand Recognition and Visibility',
      'items' =>
      array (
        0 => 'Prominent branding opportunities on the <b>AAPSCM® website</b>, at industry events, and in official publications, showcasing your organization as an industry leader.',
      ),
    ),
    1 =>
    array (
      'heading' => 'Employee Development',
      'items' =>
      array (
        0 => 'Complimentary seats for select training programs, certifications, or workshops to upskill your employees and strengthen your workforce.',
      ),
    ),
    2 =>
    array (
      'heading' => 'Exclusive Event Access',
      'items' =>
      array (
        0 => 'Priority invitations to corporate summits, workshops, and industry forums, offering unparalleled networking opportunities with global leaders and policymakers.',
      ),
    ),
    3 =>
    array (
      'heading' => 'Customized Resources',
      'items' =>
      array (
        0 => 'Tailored insights, tools, and resources to address your organization\'s specific challenges and support strategic growth initiatives.',
      ),
    ),
    4 =>
    array (
      'heading' => 'Collaborative Opportunities',
      'items' =>
      array (
        0 => 'Access to AAPSCM®\'s professional network to foster collaborations, partnerships, and thought leadership projects.',
      ),
    ),
    5 =>
    array (
      'heading' => 'Corporate Influence',
      'items' =>
      array (
        0 => 'Opportunities to shape industry policies and practices through participation in AAPSCM® advisory boards, committees, and working groups.',
      ),
    ),
  ),
  'fee' =>
  array (
    'text' => 'The annual membership fee for the Corporate Fellow Membership is $2,500, reflecting the premium opportunities and resources provided to member organizations.',
  ),
  'cta' =>
  array (
    'heading' => 'Join the Academic Community',
    'text' => 'Join the <strong>Corporate Fellow Membership</strong> to position your organization at the forefront of procurement, supply chain, e-commerce, and tourism management. Empower your workforce, enhance your influence, and drive meaningful change in your industry.',
    'join_url' => '/checkout/?add-to-cart=35368',
    'join_label' => 'Join Now',
    'cv_url' => '/fellow-membership-form/?tier=corporate_fellow',
    'cv_label' => 'Submit Your CV',
  ),
);

        Page::updateOrCreate(
            ['slug' => 'corporate-fellow-membership'],
            [
                'title'            => 'Corporate Fellow Membership',
                'template'         => 'fellow_tier',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'The Corporate Fellow Membership is specifically designed for organizations that exemplify leadership, innovation, and excellence in the fields of procurement, supply chain management, e-commerce, o...',
                'page_data'        => $pageData,
                'meta_title'       => 'Corporate Fellow Membership - AAPSCM',
                'meta_description' => 'The Corporate Fellow Membership is specifically designed for organizations that exemplify leadership, innovation, and excellence in the fields of procurement, supply chain management, e-commerce, o...',
                'show_in_nav'      => false,
            ],
        );
    }
}
