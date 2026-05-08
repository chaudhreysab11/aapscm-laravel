<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Seeds /certified-contract-manager-ccm/ mirrored verbatim from the
 * live WordPress page on 2026-04-27.
 */
class CertCertifiedContractManagerCcmPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/cert-certified-contract-manager-ccm_data.php');

        $rewriteList = static function (array $items, string $key): array {
            foreach ($items as $i => $row) {
                if (! empty($row[$key])) {
                    $items[$i][$key] = UrlRewriter::image($row[$key]);
                }
            }
            return $items;
        };

        $data['outcomes']['cards']        = $rewriteList($data['outcomes']['cards'], 'image');
        $data['modules']['cards']         = $rewriteList($data['modules']['cards'], 'image');
        $data['delivery']['cards']        = $rewriteList($data['delivery']['cards'], 'image');
        $data['exam']['image']            = UrlRewriter::image($data['exam']['image']);
        $data['careers']['image']         = UrlRewriter::image($data['careers']['image']);
        if (! empty($data['employment_outlook']['image'])) {
            $data['employment_outlook']['image'] = UrlRewriter::image($data['employment_outlook']['image']);
        }
        $data['iso_eligibility']['cards'] = $rewriteList($data['iso_eligibility']['cards'], 'image');
        $data['why_benefits']['cards']    = $rewriteList($data['why_benefits']['cards'], 'image');

        foreach ($data['cta']['options'] as $i => $opt) {
            $data['cta']['options'][$i]['cta_href'] = UrlRewriter::local($opt['cta_href']);
        }

        $title = 'Certified Contract Manager (CCM)® - AAPSCM®';

        Page::updateOrCreate(
            ['slug' => 'certified-contract-manager-ccm'],
            [
                'title'            => $title,
                'content'          => null,
                'excerpt'          => 'The Certified Contract Manager (CCM)® is an advanced, executive-level certification covering enterprise contract governance, advanced negotiation, AI-driven contract intelligence, and ISO-aligned compliance.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $data,
                'meta_title'       => $title,
                'meta_description' => 'Lead strategic contract management with the AAPSCM® CCM® certification — 8 advanced modules, 24 executive sub-modules, AI & digital contract tooling, ISO 9001/20400/31000/37301/27001 alignment.',
                'show_in_nav'      => false,
            ],
        );
    }
}
