<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class ViewJobSeekersPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/view-job-seekers_data.php');

        $hero = $data['sections'][0] ?? [];
        $panel = $data['sections'][1] ?? [];

        $pageData = [
            'hero' => [
                'heading' => $hero['heading'] ?? '',
                'background_color' => $hero['background_color'] ?? '#DEDEDE',
                'images' => array_map(
                    static fn (array $image): array => [
                        'src' => UrlRewriter::image($image['src'] ?? ''),
                        'alt' => $image['alt'] ?? '',
                        'width' => $image['width'] ?? null,
                        'height' => $image['height'] ?? null,
                    ],
                    $hero['images'] ?? [],
                ),
            ],
            'content_panel' => [
                'menu_items' => array_map(
                    static function (array $item): array {
                        return [
                            'text' => $item['text'] ?? '',
                            'href' => UrlRewriter::local($item['href'] ?? ''),
                            'children' => array_map(
                                static fn (array $child): array => [
                                    'text' => $child['text'] ?? '',
                                    'href' => UrlRewriter::local($child['href'] ?? ''),
                                ],
                                $item['children'] ?? [],
                            ),
                        ];
                    },
                    $panel['menu_items'] ?? [],
                ),
                'shortcode' => $panel['shortcode'] ?? '',
            ],
            'source_anomalies' => $data['source_anomalies'] ?? [],
            'skipped_sections' => $data['skipped_sections'] ?? [],
        ];

        Page::updateOrCreate(
            ['slug' => 'view-job-seekers'],
            [
                'source_id' => $data['source_id'] ?? null,
                'title' => $data['page_title'] ?? 'View Job Seekers',
                'content' => null,
                'excerpt' => $data['meta']['description'] ?? '',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $data['meta']['title'] ?? 'View Job Seekers - AAPSCM®',
                'meta_description' => $data['meta']['description'] ?? '',
                'seo_title' => $data['meta']['title'] ?? 'View Job Seekers - AAPSCM®',
                'seo_description' => $data['meta']['description'] ?? '',
                'seo_canonical' => UrlRewriter::canonical('view-job-seekers'),
                'show_in_nav' => false,
            ],
        );
    }
}

