<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/seminars-courses/ for WordPress parity.
 *
 * Sections: intro hero (heading + 3 paragraphs + REGISTER NOW + side image)
 * followed by 27 course cards (banner image + title link), grouped 2-per-row
 * matching the live Elementor layout (the final row has 1 card).
 */
class SeminarsCoursesPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array{intro: array<string,mixed>, cards: array<int,array<string,string>>} $data */
        $data = require database_path('seeders/data/seminars-courses_data.php');

        $pageData = [
            'intro' => [
                'title'      => $data['intro']['title'],
                'paragraphs' => array_map(
                    static fn (string $p): string => UrlRewriter::rewriteHtml($p),
                    $data['intro']['paragraphs'],
                ),
                'button' => [
                    'text' => $data['intro']['button']['text'],
                    'href' => UrlRewriter::local($data['intro']['button']['href']),
                ],
                'image' => [
                    'src' => UrlRewriter::image($data['intro']['image']['src']),
                    'alt' => $data['intro']['image']['alt'],
                ],
            ],
            'cards' => array_map(
                static fn (array $c): array => [
                    'title'  => $c['title'],
                    'href'   => UrlRewriter::local($c['href']),
                    'banner' => UrlRewriter::image($c['banner']),
                ],
                $data['cards'],
            ),
        ];

        Page::updateOrCreate(
            ['slug' => 'seminars-courses'],
            [
                'title'            => 'Seminars & Courses',
                'content'          => null,
                'excerpt'          => "Online procurement, supply chain, e-commerce, and tourism courses from AAPSCM\u{00ae} \u{2014} flexible self-paced programs with certificates upon completion.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Seminars & Courses | AAPSCM\u{00ae}",
                'meta_description' => "Browse AAPSCM\u{00ae}'s online procurement, supply chain, and e-commerce courses \u{2014} flexible, self-paced programs with certificates upon completion.",
                'show_in_nav'      => false,
            ],
        );
    }
}
