<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Seeds /executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai/
 * mirrored verbatim from the live WordPress page on 2026-04-27.
 */
class ExecutiveDiplomaInAiPoweredSupplierRiskComplianceEsgManagementEdSrceaiPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai_data.php');

        $rewriteList = static function (array $items, string $key): array {
            foreach ($items as $i => $row) {
                if (! empty($row[$key])) {
                    $items[$i][$key] = UrlRewriter::image($row[$key]);
                }
            }
            return $items;
        };

        // Hero — two side-by-side images.
        $data['hero']['images'] = array_map([UrlRewriter::class, 'image'], $data['hero']['images']);

        // Outcomes / Modules / Duration / Awards / Fees / Accreditation / Delivery cards
        $data['outcomes']['cards']             = $rewriteList($data['outcomes']['cards'], 'image');
        $data['modules']['cards']              = $rewriteList($data['modules']['cards'], 'image');
        $data['modules']['capstone']['image']  = UrlRewriter::image($data['modules']['capstone']['image']);
        $data['duration']['cards']             = $rewriteList($data['duration']['cards'], 'image');
        $data['audience']['image']             = UrlRewriter::image($data['audience']['image']);
        $data['assessment']['image']           = UrlRewriter::image($data['assessment']['image']);
        $data['accreditation']['standards']    = $rewriteList($data['accreditation']['standards'], 'image');
        $data['awards']['cards']               = $rewriteList($data['awards']['cards'], 'image');
        $data['careers']['image']              = UrlRewriter::image($data['careers']['image']);
        $data['fees']['cards']                 = $rewriteList($data['fees']['cards'], 'image');
        $data['delivery']['intro_blocks']      = $rewriteList($data['delivery']['intro_blocks'], 'image');

        // CTA: each option's link.
        foreach ($data['cta']['options'] as $i => $opt) {
            $data['cta']['options'][$i]['cta_href'] = UrlRewriter::local($opt['cta_href']);
        }

        $title = 'Executive Diploma in AI-Powered Supplier Risk, Compliance & ESG Management (ED-SRCEAI) - AAPSCM®';

        Page::updateOrCreate(
            ['slug' => 'executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai'],
            [
                'title'            => $title,
                'content'          => null,
                'excerpt'          => 'The Executive Diploma in AI-Powered Supplier Risk, Compliance & ESG Management (ED-SRCEAI)® is an advanced AAPSCM® program for procurement, supply chain, and compliance leaders managing modern risk environments with AI, predictive analytics, blockchain, and ESG scoring frameworks.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $data,
                'meta_title'       => $title,
                'meta_description' => '12-week AAPSCM® executive program covering AI-driven supplier risk modeling, ESG analytics, ISO-aligned compliance, blockchain traceability, fraud detection, and a capstone Supplier Risk & ESG Intelligence Dashboard.',
                'show_in_nav'      => false,
            ],
        );
    }
}
