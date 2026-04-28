<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CharteredSupplyChainProfessionalMemberPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = require database_path('seeders/data/chartered-supply-chain-professional-member_data.php');

        $this->rewriteUrls($pageData);

        Page::updateOrCreate(
            ['slug' => 'chartered-supply-chain-professional-member'],
            [
                'title'            => 'Chartered Supply Chain Professional Member',
                'excerpt'          => 'Why pursuing chartered status with AAPSCM® and taking the test elevates your career, validates your expertise, and positions you as a recognised leader.',
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

    /**
     * Walk the data tree and rewrite legacy aapscm URLs to local paths.
     */
    private function rewriteUrls(array &$data): void
    {
        $imageKeys = ['image', 'icon', 'src'];
        $linkKeys  = ['href', 'cta_href', 'btn_href'];
        $htmlKeys  = ['html', 'heading_html', 'paragraph_html', 'text_html', 'intro_html', 'outro_html', 'desc'];

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

        // paragraphs_html arrays of strings — handled by recursive walk via key match.
    }
}
