<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertificationsPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $raw */
        $raw = require database_path('seeders/data/certifications_data.php');

        $pageData = [
            'hero' => [
                'title' => (string) data_get($raw, 'hero.title', 'Certifications'),
                'background_image' => UrlRewriter::image((string) data_get($raw, 'hero.background_image', '')),
            ],
            'intro' => [
                'heading' => (string) data_get($raw, 'intro.heading', ''),
                'image' => UrlRewriter::image((string) data_get($raw, 'intro.image', '')),
                'features' => array_map(
                    static fn (array $feature): array => [
                        'icon' => UrlRewriter::image((string) ($feature['icon'] ?? '')),
                        'title' => (string) ($feature['title'] ?? ''),
                        'text' => (string) ($feature['text'] ?? ''),
                    ],
                    array_values((array) data_get($raw, 'intro.features', [])),
                ),
            ],
            'benefits' => [
                'heading' => (string) data_get($raw, 'benefits.heading', ''),
                'background_image' => UrlRewriter::image((string) data_get($raw, 'benefits.background_image', '')),
                'items' => array_map(
                    static fn (array $item): array => [
                        'icon' => UrlRewriter::image((string) ($item['icon'] ?? '')),
                        'title' => (string) ($item['title'] ?? ''),
                        'text' => (string) ($item['text'] ?? ''),
                    ],
                    array_values((array) data_get($raw, 'benefits.items', [])),
                ),
            ],
            'cta' => (string) data_get($raw, 'cta', ''),
            'cards' => array_map(
                static fn (array $card): array => [
                    'title' => (string) ($card['title'] ?? ''),
                    'image' => UrlRewriter::image((string) ($card['image'] ?? '')),
                    'href' => UrlRewriter::local((string) ($card['href'] ?? '#')),
                ],
                array_values((array) data_get($raw, 'cards', [])),
            ),
        ];

        Page::updateOrCreate(
            ['slug' => 'certifications'],
            [
                'title' => 'Certifications',
                'content' => null,
                'excerpt' => 'Explore AAPSCM® certifications across procurement, supply chain and tourism, with the live certification links mapped to local Laravel routes.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Certifications - AAPSCM®',
                'meta_description' => 'AAPSCM® certifications recognized by employers worldwide across procurement, supply chain and tourism management, now mirrored locally in the Laravel CMS.',
                'show_in_nav' => false,
            ],
        );
    }
}
