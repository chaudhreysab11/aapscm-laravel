<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredAiProcurementManagerCaipmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = $this->rewriteUrls(
            require database_path('seeders/data/chartered-ai-procurement-manager-caipm_data.php')
        );

        Page::updateOrCreate(
            ['slug' => 'chartered-ai-procurement-manager-caipm'],
            [
                'title' => 'Chartered AI Procurement Manager (CAIPM)®',
                'content' => null,
                'excerpt' => 'The Chartered AI Procurement Manager (CAIPM)® certification is an advanced executive-level program designed for procurement managers, directors, and senior leaders responsible for leading AI-driven procurement transformation within modern organizations.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered AI Procurement Manager (CAIPM)® - AAPSCM®',
                'meta_description' => 'Chartered AI Procurement Manager (CAIPM)® Advanced Executive Certification in AI-Driven Procurement Leadership Lead the Future of AI-Driven Procurement Artificial Intelligence is transforming the procurement function. Modern organizations are increasingly deploying AI-powered analytics, predictive sourcing, intelligent automation, supplier intelligence platforms, and digital procurement ecosystems to optimize spending, mitigate risks, and enhance strategic decision-making. As procurement evolves from a transactional function to a strategic value driver, leaders must develop the ability to manage AI-enabled procurement systems while ensuring governance, transparency, and ethical implementation.',
                'show_in_nav' => false,
            ],
        );
    }

    private function rewriteUrls(mixed $value): mixed
    {
        if (is_array($value)) {
            $rewritten = [];

            foreach ($value as $key => $item) {
                $rewritten[$key] = $this->rewriteUrls($item);
            }

            return $rewritten;
        }

        if (! is_string($value)) {
            return $value;
        }

        if (str_contains($value, '<') && preg_match('~https?://(?:www\.)?aapscm\.(?:com|org)/~i', $value)) {
            return str_replace(' elementor-invisible', '', UrlRewriter::rewriteHtml($value));
        }

        if (preg_match('~^https?://(?:www\.)?aapscm\.(?:com|org)/wp-content/uploads/.+\.pdf(?:\?.*)?$~i', $value) === 1) {
            return UrlRewriter::pdf($value);
        }

        if (preg_match('~^https?://(?:www\.)?aapscm\.(?:com|org)/wp-content/uploads/~i', $value) === 1) {
            return UrlRewriter::image($value);
        }

        if (preg_match('~^https?://(?:www\.)?aapscm\.(?:com|org)/~i', $value) === 1) {
            return UrlRewriter::local($value);
        }

        return str_replace(' elementor-invisible', '', $value);
    }
}
