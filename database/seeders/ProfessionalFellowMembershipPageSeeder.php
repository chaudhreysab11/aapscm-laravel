<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Auto-generated from Live Pages HTML/professional-fellow-membership.html
 * Re-run extract_fellow_pages.php to regenerate. Verbatim source content.
 */
class ProfessionalFellowMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = array (
  'hero' =>
  array (
    'heading' => 'Professional Fellow',
  ),
  'eligibility' =>
  array (
    'intro_paragraphs' =>
    array (
      0 => 'The<strong> Professional Fellow Membership</strong> is designed for certified professionals who have demonstrated significant expertise, leadership, and dedication in the fields of <strong>procurement, supply chain management, e-commerce, or tourism management.</strong> This membership is open to those with:',
    ),
    'items' =>
    array (
      0 => 'A <b>minimum of 10 years of professional experience</b> in their respective industries.',
      1 => 'A proven track record of <b>leadership roles</b>, innovative contributions, or impactful achievements within their field.',
      2 => 'A commitment to advancing professional standards and mentoring the next generation of leaders.',
    ),
    'closing_paragraph' => 'This membership recognizes individuals who exemplify excellence and have consistently driven progress within their industries.',
  ),
  'benefits_intro' => 'Professional Fellows gain access to exclusive benefits that enhance their influence, opportunities, and recognition:',
  'benefits' =>
  array (
    0 =>
    array (
      'heading' => 'Access to Advanced Resources',
      'items' =>
      array (
        0 => 'Receive cutting-edge tools, research, and insights designed to support strategic decision-making and professional excellence.',
      ),
    ),
    1 =>
    array (
      'heading' => 'Mentorship Opportunities',
      'items' =>
      array (
        0 => 'Inspire and guide emerging professionals through structured mentoring programs, shaping the future of the industry.',
      ),
    ),
    2 =>
    array (
      'heading' => 'Leadership Roles',
      'items' =>
      array (
        0 => 'Eligibility for leadership positions within <b>AAPSCM® working groups, committees</b>, and advisory boards, enabling you to shape industry policies and practices.',
      ),
    ),
    3 =>
    array (
      'heading' => 'Exclusive Discounts',
      'items' =>
      array (
        0 => 'Reduced rates for high-impact events, advanced training programs, certifications, and masterclasses tailored to your expertise.',
      ),
    ),
    4 =>
    array (
      'heading' => 'Professional Recognition',
      'items' =>
      array (
        0 => 'Be recognized as a leading professional on AAPSCM® platforms, including member directories, publications, and event features.',
      ),
    ),
    5 =>
    array (
      'heading' => 'Networking Opportunities',
      'items' =>
      array (
        0 => 'Engage with a prestigious community of industry leaders, fostering collaborations and partnerships that drive innovation and growth.',
      ),
    ),
  ),
  'fee' =>
  array (
    'text' => 'The annual membership fee for the Professional Fellow Membership is $1,200, reflecting the premium benefits and opportunities available to members.',
  ),
  'cta' =>
  array (
    'heading' => 'Take the Lead',
    'text' => 'Elevate your career and make a lasting impact in your industry by joining the <strong>Professional Fellow Membership</strong> today. Leverage AAPSCM®’s extensive resources, leadership opportunities, and global network to drive meaningful change and achieve professional',
    'join_url' => '/checkout/?add-to-cart=35332%20',
    'join_label' => 'Join Now',
    'cv_url' => '/fellow-membership-form/?tier=professional_fellow',
    'cv_label' => 'Submit Your CV',
  ),
);

        Page::updateOrCreate(
            ['slug' => 'professional-fellow-membership'],
            [
                'title'            => 'Professional Fellow Membership',
                'template'         => 'fellow_tier',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'The Professional Fellow Membership is designed for certified professionals who have demonstrated significant expertise, leadership, and dedication in the fields of procurement, supply chain managem...',
                'page_data'        => $pageData,
                'meta_title'       => 'Professional Fellow Membership - AAPSCM',
                'meta_description' => 'The Professional Fellow Membership is designed for certified professionals who have demonstrated significant expertise, leadership, and dedication in the fields of procurement, supply chain managem...',
                'show_in_nav'      => false,
            ],
        );
    }
}
