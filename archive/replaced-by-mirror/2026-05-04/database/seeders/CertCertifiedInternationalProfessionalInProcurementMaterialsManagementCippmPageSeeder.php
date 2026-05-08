<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertCertifiedInternationalProfessionalInProcurementMaterialsManagementCippmPageSeeder extends Seeder
{
    public function run(): void
    {
        $pageData = $this->rewriteUrls(
            require database_path('seeders/data/certified-international-professional-in-procurement-materials-management-cippm_data.php')
        );

        $metaDescription = is_string($pageData['meta_description'] ?? null) && trim((string) $pageData['meta_description']) !== ''
            ? (string) $pageData['meta_description']
            : 'Certified International Professional in Procurement & Materials Management (CIPPM®) Foundational Professional Certification in Global Procurement, Strategic Sourcing, and Materials Management. The CIPPM® certification equips procurement and supply chain professionals with practical knowledge of procurement operations, sourcing strategies, materials management, and supplier relationship management in international environments.';

        Page::updateOrCreate(
            ['slug' => 'certified-international-professional-in-procurement-materials-management-cippm'],
            [
                'title' => 'Certified International Professional in Procurement & Materials Management (CIPPM®)',
                'content' => null,
                'excerpt' => 'The Certified International Professional in Procurement & Materials Management (CIPPM®) certification is a foundational professional program designed to equip procurement and supply chain professionals with practical knowledge of procurement operations, sourcing strategies, materials management, and supplier relationship management in international environments.',
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
                'page_data' => $pageData,
                'meta_title' => is_string($pageData['title'] ?? null) && trim((string) $pageData['title']) !== ''
                    ? str_replace("\u{00A0}", ' ', (string) $pageData['title'])
                    : 'Certified International Professional in Procurement & Materials Management (CIPPM®) - AAPSCM®',
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
