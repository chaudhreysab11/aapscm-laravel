<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class LearningAndDevelopmentHubPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/learning-and-development-hub_data.php');

        $pageData = [
            'hero' => [
                'title' => $data['hero']['title'],
                'subtitle' => $data['hero']['subtitle'],
                'background' => UrlRewriter::image($data['hero']['background']),
            ],
            'intro' => [
                'title' => $data['intro']['title'],
                'body' => $data['intro']['body'],
                'button' => [
                    'text' => $data['intro']['button']['text'],
                    'href' => UrlRewriter::local($data['intro']['button']['href']),
                ],
                'image' => [
                    'src' => UrlRewriter::image($data['intro']['image']['src']),
                    'alt' => $data['intro']['image']['alt'],
                    'href' => UrlRewriter::local($data['intro']['image']['href']),
                ],
            ],
            'ways' => [
                'title' => $data['ways']['title'],
                'button' => [
                    'text' => $data['ways']['button']['text'],
                    'href' => UrlRewriter::local($data['ways']['button']['href']),
                ],
                'items' => $data['ways']['items'],
            ],
            'memberships' => [
                'cards' => array_map(
                    static fn (array $card): array => [
                        'image' => [
                            'src' => UrlRewriter::image($card['image']['src']),
                            'alt' => $card['image']['alt'],
                        ],
                        'title' => $card['title'],
                        'body' => $card['body'],
                        'button' => [
                            'text' => $card['button']['text'],
                            'href' => UrlRewriter::local($card['button']['href']),
                        ],
                    ],
                    $data['memberships']['cards'],
                ),
            ],
            'salary_guide' => [
                'image' => [
                    'src' => UrlRewriter::image($data['salary_guide']['image']['src']),
                    'alt' => $data['salary_guide']['image']['alt'],
                ],
                'title' => $data['salary_guide']['title'],
                'body' => $data['salary_guide']['body'],
            ],
            'celebrations' => [
                'title' => $data['celebrations']['title'],
                'slides' => array_map(
                    static fn (array $slide): array => [
                        'label' => $slide['label'],
                        'src' => UrlRewriter::image($slide['src']),
                    ],
                    $data['celebrations']['slides'],
                ),
            ],
        ];

        Page::updateOrCreate(
            ['slug' => 'learning-and-development-hub'],
            [
                'title' => 'Learning And Development Hub',
                'content' => null,
                'excerpt' => $data['hero']['subtitle'],
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
