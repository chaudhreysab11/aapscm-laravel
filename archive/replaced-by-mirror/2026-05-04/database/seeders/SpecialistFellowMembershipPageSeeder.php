<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Auto-generated from Live Pages HTML/specialist-fellow-membership.html
 * Re-run extract_fellow_pages.php to regenerate. Verbatim source content.
 */
class SpecialistFellowMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = array (
  'hero' =>
  array (
    'heading' => 'Specialist Fellow',
  ),
  'eligibility' =>
  array (
    'intro_paragraphs' =>
    array (
      0 => 'The <strong>Specialist Fellow Membership</strong> is tailored for professionals with advanced expertise, specialized certifications, or demonstrated mastery in a focused area of <strong>procurement, supply chain management, e-commerce, or tourism management.</strong> This membership is designed to recognize and celebrate individuals who possess in-depth knowledge and technical skills that set them apart as thought leaders and innovators in their specific domains.',
      1 => 'To qualify, applicants must exhibit:',
    ),
    'items' =>
    array (
      0 => 'A proven track record of expertise in a specialized field.',
      1 => 'Relevant certifications or credentials that validate their professional acumen.',
      2 => 'Contributions to advancing practices, technologies, or methodologies within their area of focus.',
    ),
  ),
  'benefits_intro' => 'As a <strong>Specialist Fellow, members</strong> gain access to an exclusive suite of benefits designed to enhance their professional standing, influence, and opportunities:',
  'benefits' =>
  array (
    0 =>
    array (
      'heading' => 'Premium Access to Specialized Resources',
      'items' =>
      array (
        0 => 'Unparalleled access to industry-specific tools, cutting-edge research, and comprehensive data tailored to your area of expertise.',
      ),
    ),
    1 =>
    array (
      'heading' => 'Leadership Opportunities',
      'items' =>
      array (
        0 => 'Invitations to lead or participate in high-impact <b>working groups, advisory boards</b>, and <b>think tanks</b> dedicated to addressing challenges and opportunities in your field.',
      ),
    ),
    2 =>
    array (
      'heading' => 'Global Recognition',
      'items' =>
      array (
        0 => 'Recognition as a subject matter expert on AAPSCM®\'s global platforms, including featured profiles, publications, and speaking opportunities at prestigious events.',
      ),
    ),
    3 =>
    array (
      'heading' => 'Advanced Learning Opportunities',
      'items' =>
      array (
        0 => 'Exclusive discounts on specialized training modules, certifications, and masterclasses are designed to keep you ahead in your domain.',
      ),
    ),
    4 =>
    array (
      'heading' => 'Networking and Collaboration',
      'items' =>
      array (
        0 => 'Membership in a vibrant network of peers and industry leaders, offering unparalleled opportunities for collaboration, mentorship, and knowledge exchange.',
      ),
    ),
    5 =>
    array (
      'heading' => 'Strategic Influence',
      'items' =>
      array (
        0 => 'Be part of a professional community shaping policies, frameworks, and innovations in procurement, supply chain, e-commerce, and tourism management.',
      ),
    ),
  ),
  'fee' =>
  array (
    'text' => 'The annual membership fee for the Specialist Fellow Membership is $850, reflecting the premium value and exclusive opportunities provided to members.',
  ),
  'cta' =>
  array (
    'heading' => 'Take the Next Step',
    'text' => 'Join the Specialist Fellow Membership Today and position yourself as a leading expert in your field. Elevate your professional journey with AAPSCM®’s global network, innovative resources, and unparalleled opportunities.',
    'join_url' => '/checkout/?add-to-cart=35315',
    'join_label' => 'Join Now',
    'cv_url' => '/fellow-membership-form/?tier=specialist_fellow',
    'cv_label' => 'Submit Your CV',
  ),
);

        Page::updateOrCreate(
            ['slug' => 'specialist-fellow-membership'],
            [
                'title'            => 'Specialist Fellow Membership',
                'template'         => 'fellow_tier',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'The Specialist Fellow Membership is tailored for professionals with advanced expertise, specialized certifications, or demonstrated mastery in a focused area of procurement, supply chain management...',
                'page_data'        => $pageData,
                'meta_title'       => 'Specialist Fellow Membership - AAPSCM',
                'meta_description' => 'The Specialist Fellow Membership is tailored for professionals with advanced expertise, specialized certifications, or demonstrated mastery in a focused area of procurement, supply chain management...',
                'show_in_nav'      => false,
            ],
        );
    }
}
