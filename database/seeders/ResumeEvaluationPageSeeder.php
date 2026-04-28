<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class ResumeEvaluationPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/resume-evaluation_data.php');

        $pageData = [
            'title_band' => [
                'title' => $data['title_band']['title'],
                'background' => UrlRewriter::image($data['title_band']['background'] ?? ''),
            ],
            'hero' => [
                'title' => $data['hero']['title'],
                'subtitle' => $data['hero']['subtitle'],
                'cta' => [
                    'label' => $data['hero']['cta']['label'],
                    'href' => UrlRewriter::local($data['hero']['cta']['href']),
                ],
                'image' => UrlRewriter::image($data['hero']['image']),
                'image_alt' => $data['hero']['image_alt'],
            ],
            'overview' => [
                'heading' => $data['overview']['heading'],
                'paragraphs' => $data['overview']['paragraphs'],
                'items' => $data['overview']['items'],
                'closing' => $data['overview']['closing'],
            ],
            'terms' => [
                'heading' => $data['terms']['heading'],
                'paragraphs' => $data['terms']['paragraphs'],
                'formats' => $data['terms']['formats'],
                'cancellation_notice' => $data['terms']['cancellation_notice'],
                'postal' => [
                    'image' => UrlRewriter::image($data['terms']['postal']['image']),
                    'address_html' => $data['terms']['postal']['address_html'],
                    'note' => $data['terms']['postal']['note'],
                ],
            ],
            'source_anomalies' => $data['source_anomalies'] ?? [],
        ];

        Page::updateOrCreate(
            ['slug' => 'resume-evaluation'],
            [
                'source_id' => 6833,
                'title' => 'Resume Evaluation',
                'content' => null,
                'excerpt' => $data['hero']['subtitle'],
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => $data['meta']['title'],
                'meta_description' => $data['meta']['description'],
                'seo_title' => $data['meta']['title'],
                'seo_description' => $data['meta']['description'],
                'seo_canonical' => $data['meta']['canonical'],
                'show_in_nav' => false,
            ],
        );
    }
}
