<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/career-center/ for WordPress parity.
 *
 * Sections: hero (Career center) with bg image + Job Seekers panel,
 * Available to Non-members band (Resume evaluation / Resume building workshop),
 * Employers services panel (image + description + Job Seekers / Post job openings).
 */
class CareerCenterPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/career-center_data.php');

        $rewriteButtons = static function (array $buttons): array {
            return array_map(
                static fn (array $b): array => [
                    'text'  => $b['text'],
                    'href'  => UrlRewriter::local($b['href']),
                    'style' => $b['style'] ?? 'solid',
                ],
                $buttons,
            );
        };

        $pageData = [
            'hero' => [
                'background' => UrlRewriter::image($data['hero']['background']),
                'image'      => UrlRewriter::image($data['hero']['image']),
                'image_alt'  => $data['hero']['image_alt'],
                'title'      => $data['hero']['title'],
                'job_seekers' => [
                    'heading'            => $data['hero']['job_seekers']['heading'],
                    'description'        => $data['hero']['job_seekers']['description'],
                    'membership_heading' => $data['hero']['job_seekers']['membership_heading'],
                    'membership_text'    => $data['hero']['job_seekers']['membership_text'],
                    'buttons'            => $rewriteButtons($data['hero']['job_seekers']['buttons']),
                ],
            ],

            'non_members' => [
                'heading' => $data['non_members']['heading'],
                'buttons' => $rewriteButtons($data['non_members']['buttons']),
            ],

            'employers' => [
                'image'              => UrlRewriter::image($data['employers']['image']),
                'image_alt'          => $data['employers']['image_alt'],
                'heading'            => $data['employers']['heading'],
                'description_html'   => UrlRewriter::rewriteHtml($data['employers']['description_html']),
                'membership_heading' => $data['employers']['membership_heading'],
                'membership_text'    => $data['employers']['membership_text'],
                'buttons'            => $rewriteButtons($data['employers']['buttons']),
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'career-center'],
            [
                'title'            => 'Career Center',
                'content'          => null,
                'excerpt'          => "AAPSCM\u{00ae} Career Center \u{2014} job board, resume posting, evaluation, and employer services for procurement, supply chain, e-commerce, and tourism professionals.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Career Center | AAPSCM\u{00ae}",
                'meta_description' => "Submit your resume, browse job listings, or post procurement, supply chain, e-commerce, and tourism management roles through the AAPSCM\u{00ae} Career Center.",
                'show_in_nav'      => false,
            ],
        );
    }
}
