<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Page;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

/**
 * Transcribes https://aapscm.com/workshop-trainings/ for WP parity.
 *
 * Page anatomy: hero banner, two intro rows (career roadmap + "plan your
 * next move"), five certification tables (procurement / e-commerce / tourism
 * / supply chain / combined), 35 certification cards with image + short
 * description + learn-more link, four feature icon boxes, and the exam
 * money-back-guarantee bullet list.
 *
 * All remote aapscm.com URLs are rewritten to local /storage/cms-images
 * paths and extension-less page links into relative slugs.
 */
class WorkshopTrainingsPageSeeder extends Seeder
{
    public function run(): void
    {
        /** @var array<string, mixed> $raw */
        $raw = require database_path('seeders/data/workshop_trainings_data.php');

        $pageData = [
            'hero' => [
                'h3'          => (string) ($raw['hero']['h3'] ?? ''),
                'h5'          => (string) ($raw['hero']['h5'] ?? ''),
                'breadcrumb'  => 'Workshop Trainings',
            ],
            'intro_row1' => [
                'heading' => (string) ($raw['row1']['heading'] ?? ''),
                'image'   => UrlRewriter::image((string) ($raw['row1']['image'] ?? '')),
                'text'    => (string) ($raw['row1']['text'] ?? ''),
            ],
            'intro_row2' => [
                'image'  => UrlRewriter::image((string) ($raw['row2']['image'] ?? '')),
                'texts'  => array_values(array_map(
                    static fn ($t) => (string) $t,
                    (array) ($raw['row2']['texts'] ?? []),
                )),
                'button' => [
                    'text' => (string) ($raw['row2']['button']['text'] ?? ''),
                    'href' => UrlRewriter::local((string) ($raw['row2']['button']['href'] ?? '#')),
                ],
            ],
            'tables'         => $this->rewriteTables((array) ($raw['tables'] ?? [])),
            'cards'          => $this->rewriteCards((array) ($raw['cards'] ?? [])),
            'icon_boxes'     => $this->rewriteIconBoxes((array) ($raw['icon_boxes'] ?? [])),
            'guarantee_items'=> array_values(array_map(
                static fn ($item) => [
                    'icon' => (string) ($item['icon'] ?? ''),
                    'text' => (string) ($item['text'] ?? ''),
                ],
                (array) ($raw['guarantee_items'] ?? []),
            )),
        ];

        Page::updateOrCreate(
            ['slug' => 'workshop-trainings'],
            [
                'title'            => 'Workshop Trainings',
                'content'          => null,
                'excerpt'          => 'Browse AAPSCM® workshop trainings and certifications across procurement, supply chain, e-commerce, tourism, and combined specialisations — see which path suits your career.',
                'status'           => 'published',
                'is_published'     => true,
                'template'         => 'standard_content',
                'page_data'        => $pageData,
                'meta_title'       => "Workshop Trainings \u{2013} AAPSCM\u{00ae}",
                'meta_description' => 'Explore 35+ AAPSCM® certifications across procurement, supply chain, tourism and e-commerce — instructor-led workshop trainings with money-back pass guarantee.',
                'show_in_nav'      => false,
            ],
        );
    }

    /**
     * @param  array<string, mixed>  $tables
     * @return array<string, array<string, mixed>>
     */
    private function rewriteTables(array $tables): array
    {
        $out = [];
        foreach ($tables as $key => $t) {
            $rows = [];
            foreach ((array) ($t['rows'] ?? []) as $r) {
                $rows[] = [
                    'certification'      => (string) ($r['certification'] ?? ''),
                    'certification_html' => UrlRewriter::rewriteHtml((string) ($r['certification_html'] ?? '')),
                    'focus'              => (string) ($r['focus'] ?? ''),
                    'href'               => UrlRewriter::local((string) ($r['href'] ?? '#')),
                ];
            }
            $out[(string) $key] = [
                'heading_prefix' => (string) ($t['heading_prefix'] ?? ''),
                'heading_bold'   => (string) ($t['heading_bold'] ?? ''),
                'rows'           => $rows,
            ];
        }

        return $out;
    }

    /**
     * @param  array<int, array<string, string>>  $cards
     * @return array<int, array<string, string>>
     */
    private function rewriteCards(array $cards): array
    {
        $out = [];
        foreach ($cards as $c) {
            $out[] = [
                'image_top'    => UrlRewriter::image((string) ($c['image_top'] ?? '')),
                'title'        => (string) ($c['title'] ?? ''),
                'description'  => (string) ($c['description'] ?? ''),
                'href'         => UrlRewriter::local(trim((string) ($c['href'] ?? '#'))),
                'image_bottom' => UrlRewriter::image((string) ($c['image_bottom'] ?? '')),
            ];
        }

        return $out;
    }

    /**
     * @param  array<int, array<string, string>>  $boxes
     * @return array<int, array<string, string>>
     */
    private function rewriteIconBoxes(array $boxes): array
    {
        $out = [];
        foreach ($boxes as $b) {
            $out[] = [
                'image'       => UrlRewriter::image((string) ($b['image'] ?? '')),
                'title'       => (string) ($b['title'] ?? ''),
                'description' => (string) ($b['description'] ?? ''),
            ];
        }

        return $out;
    }
}
