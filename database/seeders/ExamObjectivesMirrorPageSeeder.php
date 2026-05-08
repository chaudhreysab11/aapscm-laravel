<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;

class ExamObjectivesMirrorPageSeeder extends ExactMirrorPageSeeder
{
    protected function slug(): string
    {
        return 'exam-objectives';
    }

    protected function payloadFile(): string
    {
        return 'exam-objectives_data.php';
    }

    protected function transformPageData(array $pageData): array
    {
        if (isset($pageData['body_html']) && is_string($pageData['body_html']) && ! str_contains($pageData['body_html'], 'Our Certifications and Guiding Objectives')) {
            $pageData['body_html'] = $this->titleHolderHtml() . $pageData['body_html'];
        }

        $pageData['title_holder'] = [
            'classes' => 'eltdf-centered-type eltdf-title-va-window-top eltdf-has-bg-image',
            'height' => 400,
            'background_color' => '#828282',
            'background_image' => '/storage/cms-images/2021/10/image-13.png',
            'image' => '/storage/cms-images/2021/10/image-13.png',
            'image_alt' => 'Image Alt',
            'title' => 'Our Certifications and Guiding Objectives',
            'title_color' => '#ffffff',
        ];

        return $pageData;
    }

    private function titleHolderHtml(): string
    {
        return <<<'HTML'
<div class="eltdf-title-holder eltdf-centered-type eltdf-title-va-window-top eltdf-has-bg-image" style="height: 400px;background-color: #828282;background-image:url(/storage/cms-images/2021/10/image-13.png);" data-height="400">
    <div class="eltdf-title-image">
        <img itemprop="image" src="/storage/cms-images/2021/10/image-13.png" alt="Image Alt">
    </div>
    <div class="eltdf-title-wrapper">
        <div class="eltdf-title-inner">
            <div class="eltdf-grid">
                <h2 class="eltdf-page-title entry-title" style="color: #ffffff">Our Certifications and Guiding Objectives</h2>
            </div>
        </div>
    </div>
</div>
HTML;
    }
}