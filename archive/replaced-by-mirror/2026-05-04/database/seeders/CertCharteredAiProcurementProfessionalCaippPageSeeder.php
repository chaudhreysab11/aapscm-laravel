<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredAiProcurementProfessionalCaippPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = $this->rewriteUrls(
            require database_path('seeders/data/chartered-ai-procurement-professional-caipp_data.php')
        );

        Page::updateOrCreate(
            ['slug' => 'chartered-ai-procurement-professional-caipp'],
            [
                'title' => 'Chartered AI Procurement Professional (CAIPP)®',
                'content' => null,
                'excerpt' => 'The Chartered AI Procurement Professional (CAIPP)® certification introduces procurement professionals to artificial intelligence, digital procurement platforms, analytics tools, and responsible AI governance practices.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => 'Chartered AI Procurement Professional (CAIPP)® - AAPSCM®',
                'meta_description' => 'Chartered AI Procurement Professional (CAIPP)® Professional Certification in Artificial Intelligence–Enabled Procurement Build the Foundations of AI-Enabled Procurement Artificial Intelligence (AI) is transforming procurement operations across industries by enabling organizations to automate routine processes, analyze large datasets, optimize supplier selection, and improve strategic sourcing decisions. Modern procurement teams increasingly rely on AI-driven analytics, predictive forecasting tools, intelligent supplier monitoring platforms, and automated procurement workflows to improve operational efficiency and strategic value creation.',
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
