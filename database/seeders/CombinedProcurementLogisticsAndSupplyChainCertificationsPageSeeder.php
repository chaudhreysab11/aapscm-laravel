<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CombinedProcurementLogisticsAndSupplyChainCertificationsPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = require database_path('seeders/data/combined-procurement-logistics-and-supply-chain-certifications_data.php');

        $this->rewriteUrls($pageData);

        Page::updateOrCreate(
            ['slug' => 'combined-procurement-logistics-and-supply-chain-certifications'],
            [
                'title'            => 'Combined Procurement, Logistics, and Supply Chain Certifications',
                'excerpt'          => 'Globally recognised AAPSCM® combined certifications spanning procurement, logistics, and supply chain — covering global operations, strategic management, sustainable sourcing, digital transformation, agile practices, risk and compliance, and executive leadership.',
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
        $htmlKeys  = ['html', 'heading_html', 'sub_heading_html', 'paragraph_html', 'text_html', 'intro_html', 'outro_html', 'title_heading_html', 'desc'];

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
