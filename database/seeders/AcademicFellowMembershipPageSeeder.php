<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Illuminate\Database\Seeder;

/**
 * Auto-generated from Live Pages HTML/academic-fellow-membership.html
 * Re-run extract_fellow_pages.php to regenerate. Verbatim source content.
 */
class AcademicFellowMembershipPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = array (
  'hero' =>
  array (
    'heading' => 'Academic Fellow',
  ),
  'eligibility' =>
  array (
    'intro_paragraphs' =>
    array (
      0 => 'The <strong>Academic Fellow Membership</strong> is tailored for academicians, researchers, and educators who have demonstrated significant contributions to the advancement of <strong>procurement, supply chain management, e-commerce, or tourism management through</strong>:',
    ),
    'items' =>
    array (
      0 => '<b>Teaching</b>: Developing and delivering impactful courses that prepare students for real-world challenges.',
      1 => '<b>Publications</b>: Authoring scholarly articles, textbooks, or research papers that advance industry knowledge.',
      2 => '<b>Research</b>: Leading innovative studies that address critical issues or explore new opportunities in the field.',
    ),
    'closing_paragraph' => 'This membership recognizes academia’s vital role in shaping these industries’ future and fostering collaboration between academia and practice.',
  ),
  'benefits_intro' => 'Academic Fellows enjoy a range of exclusive benefits that enhance their ability to drive innovation and influence in their fields:',
  'benefits' =>
  array (
    0 =>
    array (
      'heading' => 'Research and Curriculum Collaboration',
      'items' =>
      array (
        0 => 'Opportunities to collaborate with industry professionals on groundbreaking research and curriculum development projects.',
      ),
    ),
    1 =>
    array (
      'heading' => 'Access to Academic and Research Grants',
      'items' =>
      array (
        0 => 'Eligibility for grants to fund research, pilot studies, and academic initiatives that align with AAPSCM®\'s mission.',
      ),
    ),
    2 =>
    array (
      'heading' => 'Recognition and Visibility',
      'items' =>
      array (
        0 => 'Prominent recognition in AAPSCM® publications, conferences, and events, highlighting your contributions to the profession.',
      ),
    ),
    3 =>
    array (
      'heading' => 'Complimentary Scholarly Resources',
      'items' =>
      array (
        0 => 'Access to a curated selection of academic journals, reports, and data resources to support your teaching and research efforts.',
      ),
    ),
    4 =>
    array (
      'heading' => 'Professional Networking',
      'items' =>
      array (
        0 => 'Engage with a global network of educators, researchers, and practitioners to share knowledge and collaborate on industry-focused initiatives.',
      ),
    ),
  ),
  'fee' =>
  array (
    'text' => 'The annual membership fee for the Academic Fellow Membership is $950, reflecting the premium value of resources, collaboration opportunities, and recognition provided to members.',
  ),
  'cta' =>
  array (
    'heading' => 'Join the Academic Community',
    'text' => 'Become an Academic Fellow Member of AAPSCM® to enhance your influence in academia and industry. Collaborate, innovate, and contribute to the future of procurement, supply chain, e-commerce, and tourism management.',
    'join_url' => '/checkout/?add-to-cart=35341',
    'join_label' => 'Join Now',
    'cv_url' => '/fellow-membership-form/?tier=academic_fellow',
    'cv_label' => 'Submit Your CV',
  ),
);

        Page::updateOrCreate(
            ['slug' => 'academic-fellow-membership'],
            [
                'title'            => 'Academic Fellow Membership',
                'template'         => 'fellow_tier',
                'status'           => 'published',
                'is_published'     => true,
                'content'          => '',
                'excerpt'          => 'The Academic Fellow Membership is tailored for academicians, researchers, and educators who have demonstrated significant contributions to the advancement of procurement, supply chain management, e...',
                'page_data'        => $pageData,
                'meta_title'       => 'Academic Fellow Membership - AAPSCM',
                'meta_description' => 'The Academic Fellow Membership is tailored for academicians, researchers, and educators who have demonstrated significant contributions to the advancement of procurement, supply chain management, e...',
                'show_in_nav'      => false,
            ],
        );
    }
}
