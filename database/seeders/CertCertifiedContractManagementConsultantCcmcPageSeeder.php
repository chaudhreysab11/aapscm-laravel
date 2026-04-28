<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Seeds /certified-contract-management-consultant-ccmc/ mirrored verbatim
 * from the live WordPress page on 2026-04-27.
 */
class CertCertifiedContractManagementConsultantCcmcPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/cert-certified-contract-management-consultant-ccmc_data.php');

        $rewriteImg = static function (array $items, string $key = 'image'): array {
            foreach ($items as $i => $row) {
                if (! empty($row[$key])) {
                    $items[$i][$key] = UrlRewriter::image($row[$key]);
                }
            }
            return $items;
        };

        if (! empty($data['overview']['image'])) {
            $data['overview']['image'] = UrlRewriter::image($data['overview']['image']);
        }
        if (! empty($data['why_matters']['image'])) {
            $data['why_matters']['image'] = UrlRewriter::image($data['why_matters']['image']);
        }
        $data['outcomes']['cards']                  = $rewriteImg($data['outcomes']['cards']);
        $data['modules']['cards']                   = $rewriteImg($data['modules']['cards']);
        $data['tools']['cards']                     = $rewriteImg($data['tools']['cards']);
        $data['delivery']['cards']                  = $rewriteImg($data['delivery']['cards']);
        if (! empty($data['iso']['image'])) {
            $data['iso']['image'] = UrlRewriter::image($data['iso']['image']);
        }
        $data['eligibility_why_benefits']['cards']  = $rewriteImg($data['eligibility_why_benefits']['cards']);
        $data['positioning']['cards']               = $rewriteImg($data['positioning']['cards']);
        $data['choose_cards']['cards']              = $rewriteImg($data['choose_cards']['cards']);

        foreach ($data['cta']['options'] as $i => $opt) {
            $data['cta']['options'][$i]['cta_href'] = UrlRewriter::local($opt['cta_href']);
        }

        $title = 'Certified Contract Management Consultant (CCMC)® - AAPSCM®';

        Page::updateOrCreate(
            ['slug' => 'certified-contract-management-consultant-ccmc'],
            [
                'title'            => $title,
                'content'          => null,
                'excerpt'          => 'The Certified Contract Management Consultant (CCMC)® is an elite, advisory-level certification for experienced consultants and senior leaders driving contract strategy, transformation, governance, and AI-enabled advisory services.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $data,
                'meta_title'       => $title,
                'meta_description' => 'AAPSCM® CCMC® is an elite advisory certification — 8 executive modules, 24 consulting sub-modules, AI-driven contract intelligence, ISO-aligned governance, and a CCP®/CCM®/CCMC® career pathway.',
                'show_in_nav'      => false,
            ],
        );
    }
}
