<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Auto-generated from Live Pages HTML/emerging-leader-fellow-membership.html
 * Re-run extract_fellow_pages.php to regenerate. Verbatim source content.
 */
class EmergingLeaderFellowMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = array (
  'hero' =>
  array (
    'heading' => 'Emerging Leader Fellow',
  ),
  'eligibility' =>
  array (
    'intro_paragraphs' =>
    array (
      0 => 'The <strong>Emerging Leader Fellow Membership</strong> is designed for <strong>early to mid-career professionals</strong> who have demonstrated exceptional leadership potential, innovation, and a commitment to advancing their careers in <strong>procurement, supply chain management, e-commerce, or tourism management. </strong>Eligible individuals are those who:',
    ),
    'items' =>
    array (
      0 => 'Have 3-10 years of professional experience in their respective fields.',
      1 => 'Exhibit strong leadership capabilities and a proactive approach to professional growth.',
      2 => 'Show a commitment to driving positive change and innovation within their industries.',
    ),
    'closing_paragraph' => 'This membership aims to cultivate the next generation of leaders by providing tailored opportunities for growth, collaboration, and recognition.',
  ),
  'benefits_intro' => 'Emerging Leader Fellows enjoy a range of exclusive benefits designed to accelerate their professional development and leadership trajectory:',
  'benefits' =>
  array (
    0 =>
    array (
      'heading' => 'Leadership Development',
      'items' =>
      array (
        0 => 'Access to<b> leadership training programs</b>, tailored workshops, and mentorship opportunities with senior fellows to enhance your skills and knowledge.',
      ),
    ),
    1 =>
    array (
      'heading' => 'Advisory Panel Participation',
      'items' =>
      array (
        0 => 'Opportunities to contribute to AAPSCM® advisory panels, working groups, and task forces, allowing you to influence industry policies and practices.',
      ),
    ),
    2 =>
    array (
      'heading' => 'Reduced Certification Fees',
      'items' =>
      array (
        0 => 'Enjoy discounted rates on certifications, advanced training programs, and professional development opportunities to support your growth.',
      ),
    ),
    3 =>
    array (
      'heading' => 'Networking Opportunities',
      'items' =>
      array (
        0 => 'Engage with a dynamic community of peers, mentors, and industry leaders through exclusive networking events and forums.',
      ),
    ),
    4 =>
    array (
      'heading' => 'Recognition and Visibility',
      'items' =>
      array (
        0 => 'Recognition on AAPSCM® platforms, including newsletters and social media, as an emerging leader committed to advancing the profession.',
      ),
    ),
    5 =>
    array (
      'heading' => 'Career Advancement Resources',
      'items' =>
      array (
        0 => 'Access to tailored career guidance, industry insights, and resources to help you navigate and excel in your professional journey.',
      ),
    ),
  ),
  'fee' =>
  array (
    'text' => 'The annual membership fee for the Emerging Leader Fellow Membership is $850, reflecting the premium benefits and opportunities available to support your growth and leadership development.',
  ),
  'cta' =>
  array (
    'heading' => 'Step Into Leadership',
    'text' => 'Join the Emerging Leader Fellow Membership to unlock your leadership potential, connect with influential mentors, and accelerate your career in procurement, supply chain, e-commerce, or tourism management. Together, we will shape the future of the industry.',
    'join_url' => '/checkout/?add-to-cart=35392%20',
    'join_label' => 'Join Now',
    'cv_url' => '/fellow-membership-form/?tier=emerging_leader_fellow',
    'cv_label' => 'Submit Your CV',
  ),
);

        Page::updateOrCreate(
            ['slug' => 'emerging-leader-fellow-membership'],
            [
                'title'            => 'Emerging Leader Fellow Membership',
                'template'         => 'fellow_tier',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'The Emerging Leader Fellow Membership is designed for early to mid-career professionals who have demonstrated exceptional leadership potential, innovation, and a commitment to advancing their caree...',
                'page_data'        => $pageData,
                'meta_title'       => 'Emerging Leader Fellow Membership - AAPSCM',
                'meta_description' => 'The Emerging Leader Fellow Membership is designed for early to mid-career professionals who have demonstrated exceptional leadership potential, innovation, and a commitment to advancing their caree...',
                'show_in_nav'      => false,
            ],
        );
    }
}
