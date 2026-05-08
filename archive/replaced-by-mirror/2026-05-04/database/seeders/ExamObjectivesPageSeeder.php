<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class ExamObjectivesPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = require database_path('seeders/data/exam-objectives_data.php');

        $this->rewriteUrls($pageData);

        Page::updateOrCreate(
            ['slug' => 'exam-objectives'],
            [
                'title'            => 'Exam Objectives',
                'excerpt'          => 'AAPSCM® exam objectives and the full catalog of certifications across Procurement Management, Supply Chain Management, Tourism Management, and E-Commerce Management & Administration.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => $pageData['meta']['title']       ?? null,
                'meta_description' => $pageData['meta']['description'] ?? null,
                'show_in_nav'      => false,
            ],
        );
    }

    private function rewriteUrls(array &$data): void
    {
        $imageKeys = ['image', 'image_top', 'image_bottom', 'icon', 'src'];
        $linkKeys  = ['href', 'cta_href', 'btn_href'];
        $htmlKeys  = ['html', 'heading_html', 'intro_heading_html', 'text_html'];

        array_walk_recursive($data, function (&$value, $key) use ($imageKeys, $linkKeys, $htmlKeys) {
            if (! is_string($value) || $value === '') {
                return;
            }

            if (in_array($key, $imageKeys, true)) {
                $value = UrlRewriter::image($value);
            } elseif (in_array($key, $linkKeys, true)) {
                $value = UrlRewriter::local($value);
            } elseif (in_array($key, $htmlKeys, true) || str_ends_with((string) $key, '_html')) {
                $value = UrlRewriter::rewriteHtml($value);
            }
        });
    }
}
