<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/post-job-opportunities/ for WordPress parity.
 *
 * Sections (desktop render): hero with SLIDER4 background, intro hero with
 * side image, pale band with "AAPSCM® job board" copy, members panel with
 * left image and 3 paragraphs, rules panel with 3 paragraphs (one carrying
 * a Cloudflare-protected email placeholder) and right image, plus a closing
 * paragraph block.
 */
class PostJobOpportunitiesPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string,mixed> $data */
        $data = require database_path('seeders/data/post-job-opportunities_data.php');

        $pageData = [
            'hero' => [
                'title'      => $data['hero']['title'],
                'background' => UrlRewriter::image($data['hero']['background']),
            ],
            'intro' => [
                'title'     => $data['intro']['title'],
                'paragraph' => UrlRewriter::rewriteHtml($data['intro']['paragraph']),
                'image'     => [
                    'src' => UrlRewriter::image($data['intro']['image']['src']),
                    'alt' => $data['intro']['image']['alt'],
                ],
            ],
            'band' => [
                'title' => $data['band']['title'],
                'body'  => UrlRewriter::rewriteHtml($data['band']['body']),
            ],
            'members' => [
                'image' => [
                    'src' => UrlRewriter::image($data['members']['image']['src']),
                    'alt' => $data['members']['image']['alt'],
                ],
                'title'      => $data['members']['title'],
                'paragraphs' => array_map(
                    static fn (string $p): string => UrlRewriter::rewriteHtml($p),
                    $data['members']['paragraphs'],
                ),
            ],
            'rules' => [
                'title'      => $data['rules']['title'],
                'paragraphs' => array_map(
                    static fn (string $p): string => UrlRewriter::rewriteHtml($p),
                    $data['rules']['paragraphs'],
                ),
                'image' => [
                    'src' => UrlRewriter::image($data['rules']['image']['src']),
                    'alt' => $data['rules']['image']['alt'],
                ],
            ],
            'closing' => [
                'body' => UrlRewriter::rewriteHtml($data['closing']['body']),
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'post-job-opportunities'],
            [
                'title'            => 'Post Job Opportunities',
                'content'          => null,
                'excerpt'          => 'Post procurement, supply chain, and purchasing job openings on the AAPSCM® job board posting service — free for members, low-cost for non-members.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Post Job Opportunities | AAPSCM\u{00ae}",
                'meta_description' => "Advertise purchasing, supply chain, and materials management roles on AAPSCM\u{00ae}'s job board \u{2014} free for members, paid posting available for non-members.",
                'show_in_nav'      => false,
            ],
        );
    }
}
