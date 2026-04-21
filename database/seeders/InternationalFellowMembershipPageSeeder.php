<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Auto-generated from Live Pages HTML/international-fellow-membership.html
 * Re-run extract_fellow_pages.php to regenerate. Verbatim source content.
 */
class InternationalFellowMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = array (
  'hero' =>
  array (
    'heading' => 'International Fellow',
  ),
  'eligibility' =>
  array (
    'intro_paragraphs' =>
    array (
      0 => 'The <strong>International Fellow Membership</strong> is designed for professionals and organizations based outside the United States who have made impactful contributions to advancing global practices and standards in <strong>procurement, supply chain management, e-commerce, or tourism management.</strong> Eligible members include:',
    ),
    'items' =>
    array (
      0 => 'Professionals with experience in promoting cross-border collaborations or implementing global best practices.',
      1 => 'Organizations that actively contribute to innovation and sustainable practices in their respective industries on an international scale.',
      2 => 'Individuals or entities that serve as industry advocates and ambassadors in their regions.',
    ),
    'closing_paragraph' => 'This membership seeks to foster global collaboration and recognize outstanding contributions to the advancement of international industry standards.',
  ),
  'benefits_intro' => 'International Fellows gain access to a range of exclusive benefits tailored to support their global impact and professional growth:',
  'benefits' =>
  array (
    0 =>
    array (
      'heading' => 'Ambassadorial Privileges',
      'items' =>
      array (
        0 => 'Represent <b>AAPSCM®</b> in your region, serving as a trusted ambassador to promote the organization\'s mission and values globally.',
      ),
    ),
    1 =>
    array (
      'heading' => 'Global Networking Opportunities',
      'items' =>
      array (
        0 => 'Connect with an extensive network of <b>industry professionals</b> and thought leaders through international events, conferences, and forums.',
      ),
    ),
    2 =>
    array (
      'heading' => 'Participation in Global Projects',
      'items' =>
      array (
        0 => 'Be included in <b>AAPSCM®-led international collaborations</b>, initiatives, and research projects aimed at advancing global industry standards.',
      ),
    ),
    3 =>
    array (
      'heading' => 'Recognition and Visibility',
      'items' =>
      array (
        0 => 'Gain recognition on the <b>AAPSCM® website,</b> international newsletters, and publications, showcasing your contributions and expertise to a global audience.',
      ),
    ),
    4 =>
    array (
      'heading' => 'Customized Support for Regional Impact',
      'items' =>
      array (
        0 => 'Access resources and tools designed to address your region\'s unique challenges and opportunities, supporting your efforts to drive local and international growth.',
      ),
    ),
  ),
  'fee' =>
  array (
    'text' => 'The annual membership fee for the International Fellow Membership is <strong>$1,499.99, </strong>providing exceptional value for the premium benefits and opportunities offered.',
  ),
  'cta' =>
  array (
    'heading' => 'Expand Your Global Reach',
    'text' => 'Join the <strong>International Fellow Membership</strong> to become a recognized leader in your region while contributing to advancing global standards in procurement, supply chain, e-commerce, or tourism management. Collaborate, innovate, and lead on a global stage.',
    'join_url' => '/checkout/?add-to-cart=35419',
    'join_label' => 'Join Now',
    'cv_url' => '/fellow-membership-form/?tier=international_fellow',
    'cv_label' => 'Submit Your CV',
  ),
);

        Page::updateOrCreate(
            ['slug' => 'international-fellow-membership'],
            [
                'title'            => 'International Fellow Membership',
                'template'         => 'fellow_tier',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'The International Fellow Membership is designed for professionals and organizations based outside the United States who have made impactful contributions to advancing global practices and standards...',
                'page_data'        => $pageData,
                'meta_title'       => 'International Fellow Membership - AAPSCM',
                'meta_description' => 'The International Fellow Membership is designed for professionals and organizations based outside the United States who have made impactful contributions to advancing global practices and standards...',
                'show_in_nav'      => false,
            ],
        );
    }
}
