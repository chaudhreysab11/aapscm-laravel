<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCertifiedAiRpaProcurementManagerCairpmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = $this->rewriteUrls(
            require database_path('seeders/data/certified-ai-rpa-procurement-manager-cairpm_data.php')
        );

        $metaDescription = is_string($pageData['meta_description'] ?? null) && trim((string) $pageData['meta_description']) !== ''
            ? (string) $pageData['meta_description']
            : 'Certified AI & RPA Procurement Manager (CAIRPM)® Advanced Executive Certification in Intelligent Procurement Automation Lead the Next Generation of Intelligent Procurement Procurement organizations worldwide are undergoing a major transformation driven by Artificial Intelligence (AI), Robotic Process Automation (RPA), advanced analytics, and intelligent digital platforms.';

        Page::updateOrCreate(
            ['slug' => 'certified-ai-rpa-procurement-manager-cairpm'],
            [
                'title' => 'Certified AI & RPA Procurement Manager (CAIRPM)®',
                'content' => null,
                'excerpt' => 'The Certified AI & RPA Procurement Manager (CAIRPM)® certification is an advanced executive-level program designed for procurement managers, directors, digital transformation leaders, and supply chain executives responsible for implementing AI and automation technologies in procurement operations.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => is_string($pageData['title'] ?? null) && trim((string) $pageData['title']) !== ''
                    ? str_replace("\u{00A0}", ' ', (string) $pageData['title'])
                    : 'Certified AI & RPA Procurement Manager (CAIRPM)® - AAPSCM®',
                'meta_description' => $metaDescription,
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
