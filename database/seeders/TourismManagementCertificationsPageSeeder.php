<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class TourismManagementCertificationsPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = require database_path('seeders/data/tourism-management-certifications_data.php');

        $this->rewriteUrls($pageData);

        Page::updateOrCreate(
            ['slug' => 'tourism-management-certifications'],
            [
                'title'            => 'Tourism Management Certifications',
                'excerpt'          => 'Globally recognised AAPSCM® Tourism Management certifications for professionals and managers — covering sustainable tourism, AI-powered hospitality, digital marketing, destination management and tourism analytics.',
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
        $htmlKeys  = ['html', 'heading_html', 'sub_heading_html', 'why_heading_html', 'paragraph_html', 'text_html', 'intro_html', 'outro_html', 'cert_intro_heading_html', 'why_choose_heading_html', 'why_choose_outro_html', 'title_heading_html', 'desc'];

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
