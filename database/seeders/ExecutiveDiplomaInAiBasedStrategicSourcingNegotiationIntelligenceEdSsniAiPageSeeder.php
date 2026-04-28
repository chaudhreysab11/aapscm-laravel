<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Seeds /executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai/
 * mirrored verbatim from the live WordPress page on 2026-04-27.
 */
class ExecutiveDiplomaInAiBasedStrategicSourcingNegotiationIntelligenceEdSsniAiPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $data */
        $data = require database_path('seeders/data/executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai_data.php');

        $rewriteList = static function (array $items, string $key): array {
            foreach ($items as $i => $row) {
                if (! empty($row[$key])) {
                    $items[$i][$key] = UrlRewriter::image($row[$key]);
                }
            }
            return $items;
        };

        $data['hero']['images']               = array_map([UrlRewriter::class, 'image'], $data['hero']['images']);
        if (! empty($data['audience']['image'])) {
            $data['audience']['image']        = UrlRewriter::image($data['audience']['image']);
        }
        $data['outcomes']['cards']            = $rewriteList($data['outcomes']['cards'], 'image');
        $data['modules']['cards']             = $rewriteList($data['modules']['cards'], 'image');
        $data['modules']['capstone']['image'] = UrlRewriter::image($data['modules']['capstone']['image']);
        $data['duration']['cards']            = $rewriteList($data['duration']['cards'], 'image');
        $data['assessment']['image']          = UrlRewriter::image($data['assessment']['image']);
        $data['accreditation']['standards']   = $rewriteList($data['accreditation']['standards'], 'image');
        $data['awards']['cards']              = $rewriteList($data['awards']['cards'], 'image');
        $data['careers']['image']             = UrlRewriter::image($data['careers']['image']);
        $data['fees']['cards']                = $rewriteList($data['fees']['cards'], 'image');
        $data['delivery']['intro_blocks']     = $rewriteList($data['delivery']['intro_blocks'], 'image');

        foreach ($data['cta']['options'] as $i => $opt) {
            $data['cta']['options'][$i]['cta_href'] = UrlRewriter::local($opt['cta_href']);
        }

        $title = 'Executive Diploma in AI-Based Strategic Sourcing & Negotiation Intelligence (ED-SSNI-AI) - AAPSCM®';

        Page::updateOrCreate(
            ['slug' => 'executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai'],
            [
                'title'            => $title,
                'content'          => null,
                'excerpt'          => 'The Executive Diploma in AI-Based Strategic Sourcing & Negotiation Intelligence (ED-SSNI-AI)® equips procurement and sourcing professionals to leverage AI for sourcing strategies, predictive bid scoring, negotiation simulation, and supplier award optimization — aligned with ISO 20400, 44001, 9001, and ISO/IEC 42001.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $data,
                'meta_title'       => $title,
                'meta_description' => '12-week AAPSCM® executive program covering AI-driven sourcing strategy, eSourcing analytics, machine-learning bid scoring, negotiation simulation, supplier award optimization, and a capstone AI-Based Sourcing & Negotiation Intelligence Simulation.',
                'show_in_nav'      => false,
            ],
        );
    }
}
