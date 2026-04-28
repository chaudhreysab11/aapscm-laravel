<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Seeds /executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst/
 * mirrored verbatim from the live WordPress page on 2026-04-27.
 */
class ExecutiveDiplomaInAiDrivenProcurementStrategyTransformationEdAipstPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst_data.php');

        $rewriteList = static function (array $items, string $key): array {
            foreach ($items as $i => $row) {
                if (isset($row[$key])) {
                    $items[$i][$key] = UrlRewriter::image($row[$key]);
                }
            }
            return $items;
        };

        // Hero
        $data['hero']['image'] = UrlRewriter::image($data['hero']['image']);

        // Outcomes / Modules / Duration / Awards / Fees / Accreditation cards
        $data['outcomes']['cards']      = $rewriteList($data['outcomes']['cards'], 'image');
        $data['modules']['cards']       = $rewriteList($data['modules']['cards'], 'image');
        $data['modules']['capstone']['image'] = UrlRewriter::image($data['modules']['capstone']['image']);
        $data['duration']['cards']      = $rewriteList($data['duration']['cards'], 'image');
        $data['assessment']['image']    = UrlRewriter::image($data['assessment']['image']);
        $data['accreditation']['standards']    = $rewriteList($data['accreditation']['standards'], 'image');
        $data['awards']['cards']        = $rewriteList($data['awards']['cards'], 'image');
        $data['careers']['image']       = UrlRewriter::image($data['careers']['image']);
        $data['fees']['cards']          = $rewriteList($data['fees']['cards'], 'image');
        $data['delivery']['intro_blocks'] = $rewriteList($data['delivery']['intro_blocks'], 'image');

        // CTA: check icon + each option's link
        $data['cta']['check_icon'] = UrlRewriter::image($data['cta']['check_icon']);
        foreach ($data['cta']['options'] as $i => $opt) {
            $data['cta']['options'][$i]['cta_href'] = UrlRewriter::local($opt['cta_href']);
        }

        $title = 'Executive Diploma in AI-Driven Procurement Strategy & Transformation (ED-AIPST) - AAPSCM®';

        Page::updateOrCreate(
            ['slug' => 'executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst'],
            [
                'title'            => $title,
                'content'          => null,
                'excerpt'          => 'The Executive Diploma in AI-Driven Procurement Strategy & Transformation (ED-AIPST)® is an advanced, practitioner-focused program for senior procurement leaders modernizing procurement through AI, automation, predictive analytics, and digital operating models.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $data,
                'meta_title'       => $title,
                'meta_description' => 'Executive Diploma in AI-Driven Procurement Strategy & Transformation (ED-AIPST)® — 12-week AAPSCM® executive program covering AI strategy, predictive analytics, digital operating models, governance, and a transformation capstone.',
                'show_in_nav'      => false,
            ],
        );
    }
}
