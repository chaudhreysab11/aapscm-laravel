<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class ExamProctoringPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = require database_path('seeders/data/exam-proctoring_data.php');

        $this->rewriteUrls($pageData);

        Page::updateOrCreate(
            ['slug' => 'exam-proctoring'],
            [
                'title'            => 'Exam Proctoring',
                'excerpt'          => 'Step-by-step guide to scheduling and taking an in-person AAPSCM® certification exam.',
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
        $imageKeys = ['image', 'icon', 'src'];
        $linkKeys  = ['href'];

        array_walk_recursive($data, function (&$value, $key) use ($imageKeys, $linkKeys) {
            if (! is_string($value) || $value === '') {
                return;
            }

            if (in_array($key, $imageKeys, true)) {
                $value = UrlRewriter::image($value);
            } elseif (in_array($key, $linkKeys, true) && ! str_starts_with($value, 'mailto:')) {
                $value = UrlRewriter::local($value);
            } elseif (str_ends_with((string) $key, '_html')) {
                $value = UrlRewriter::rewriteHtml($value);
            }
        });
    }
}
