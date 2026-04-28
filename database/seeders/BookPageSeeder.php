<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.org/book/ for WordPress parity.
 *
 * Sections: hero with SLIDER4 background, intro hero (heading + paragraph + side image)
 * followed by 20 book cards (cover image + title + Buy Now button linking to amazon.com).
 * Amazon URLs are preserved verbatim — only wp-content uploads are routed through
 * UrlRewriter::image().
 */
class BookPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string,mixed> $data */
        $data = require database_path('seeders/data/book_data.php');

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
            'books' => array_map(
                static fn (array $b): array => [
                    'title'    => $b['title'],
                    'image'    => UrlRewriter::image($b['image']),
                    'btn_text' => $b['btn_text'],
                    'btn_href' => $b['btn_href'],
                ],
                $data['books'],
            ),
        ];

        Page::updateOrCreate(
            ['slug' => 'book'],
            [
                'title'            => 'Books',
                'content'          => null,
                'excerpt'          => "Professional development books on procurement, supply chain, inventory, logistics, and more \u{2014} curated by AAPSCM\u{00ae} for purchasing professionals.",
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Books | AAPSCM\u{00ae}",
                'meta_description' => "Browse AAPSCM\u{00ae}'s curated library of procurement, supply chain, inventory, logistics, and purchasing-management books for professional development.",
                'show_in_nav'      => false,
            ],
        );
    }
}
