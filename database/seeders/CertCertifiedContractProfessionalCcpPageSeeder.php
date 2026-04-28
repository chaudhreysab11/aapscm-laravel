<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Seeds /certified-contract-professional-ccp/ mirrored verbatim from the
 * live WordPress page on 2026-04-27.
 */
class CertCertifiedContractProfessionalCcpPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/cert-certified-contract-professional-ccp_data.php');

        $rewriteList = static function (array $items, string $key): array {
            foreach ($items as $i => $row) {
                if (! empty($row[$key])) {
                    $items[$i][$key] = UrlRewriter::image($row[$key]);
                }
            }
            return $items;
        };

        if (! empty($data['hero']['image'])) {
            $data['hero']['image'] = UrlRewriter::image($data['hero']['image']);
        }
        if (! empty($data['overview']['image'])) {
            $data['overview']['image'] = UrlRewriter::image($data['overview']['image']);
        }
        $data['outcomes']['cards']         = $rewriteList($data['outcomes']['cards'], 'image');
        $data['modules']['cards']          = $rewriteList($data['modules']['cards'], 'image');
        $data['delivery']['cards']         = $rewriteList($data['delivery']['cards'], 'image');
        $data['exam']['image']             = UrlRewriter::image($data['exam']['image']);
        $data['careers']['image']          = UrlRewriter::image($data['careers']['image']);
        $data['iso_eligibility']['cards']  = $rewriteList($data['iso_eligibility']['cards'], 'image');
        $data['why_benefits']['cards']     = $rewriteList($data['why_benefits']['cards'], 'image');

        foreach ($data['cta']['options'] as $i => $opt) {
            $data['cta']['options'][$i]['cta_href'] = UrlRewriter::local($opt['cta_href']);
        }

        $title = 'Certified Contract Professional (CCP)® - AAPSCM®';

        Page::updateOrCreate(
            ['slug' => 'certified-contract-professional-ccp'],
            [
                'title'            => $title,
                'content'          => null,
                'excerpt'          => 'The Certified Contract Professional (CCP)® is a foundation-level, globally aligned certification covering the full contract lifecycle, AI-powered contract intelligence, digital CLM, and ISO-aligned compliance.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $data,
                'meta_title'       => $title,
                'meta_description' => 'Master the foundations of contract management with the AAPSCM® CCP® certification — 8 modules, 24 sub-modules, AI & digital contract tooling, ISO 9001/20400/31000/37301 alignment.',
                'show_in_nav'      => false,
            ],
        );
    }
}
