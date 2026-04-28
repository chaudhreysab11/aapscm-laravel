<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class JobListingPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/job-listing_data.php');

        $rewriteItems = static function (array $items) use (&$rewriteItems): array {
            return array_map(
                static function (array $item) use (&$rewriteItems): array {
                    $rewritten = [
                        'text' => $item['text'],
                        'href' => UrlRewriter::local($item['href']),
                    ];

                    if (! empty($item['children']) && is_array($item['children'])) {
                        $rewritten['children'] = $rewriteItems($item['children']);
                    }

                    return $rewritten;
                },
                $items,
            );
        };

        $pageData = [
            'hero' => [
                'title' => $data['hero']['title'],
                'background' => UrlRewriter::image($data['hero']['background']),
            ],
            'menu' => [
                'items' => $rewriteItems($data['menu']['items']),
            ],
            'search' => [
                'shortcode' => $data['search']['shortcode'],
                'card_class' => $data['search']['card_class'],
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'job-listing'],
            [
                'title' => 'Job Listing',
                'content' => null,
                'excerpt' => $data['meta']['description'],
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $data['meta']['title'],
                'meta_description' => $data['meta']['description'],
                'show_in_nav' => false,
            ],
        );
    }
}
