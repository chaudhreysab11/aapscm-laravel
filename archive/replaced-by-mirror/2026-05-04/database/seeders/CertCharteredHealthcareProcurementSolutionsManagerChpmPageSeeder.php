<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCharteredHealthcareProcurementSolutionsManagerChpmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = $this->rewriteUrls(
            require database_path('seeders/data/chartered-healthcare-procurement-solutions-manager-chpm_data.php')
        );

        $metaDescription = is_string($pageData['meta_description'] ?? null) && trim((string) $pageData['meta_description']) !== ''
            ? (string) $pageData['meta_description']
            : 'Chartered Healthcare Procurement Solutions Manager (CHPM)® Advanced Professional Certification for Healthcare Procurement Leaders Lead Strategic Procurement Solutions in Healthcare Systems Healthcare organizations operate within highly complex supply chain environments that require efficient procurement systems, regulatory compliance, supplier risk management, cost optimization strategies, and technology-enabled procurement solutions. Hospitals, health systems, pharmaceutical companies, and healthcare service providers must ensure that medical supplies, pharmaceuticals, equipment, and critical healthcare services are procured efficiently, transparently, and sustainably.';

        Page::updateOrCreate(
            ['slug' => 'chartered-healthcare-procurement-solutions-manager-chpm'],
            [
                'title' => 'Chartered Healthcare Procurement Solutions Manager (CHPM)®',
                'content' => null,
                'excerpt' => 'Healthcare organizations operate within highly complex supply chain environments that require efficient procurement systems, regulatory compliance, supplier risk management, cost optimization strategies, and technology-enabled procurement solutions.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => is_string($pageData['title'] ?? null) && trim((string) $pageData['title']) !== ''
                    ? str_replace("\u{00A0}", ' ', (string) $pageData['title'])
                    : 'Chartered Healthcare Procurement Solutions Manager (CHPM)® - AAPSCM®',
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
