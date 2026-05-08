<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;
use Database\Seeders\Support\MirrorLinkReconciler;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class TrainingMirrorPagesSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->slugs() as $slug) {
            if (! file_exists(database_path('seeders/data/' . $slug . '_data.php'))) {
                continue;
            }

            if ($slug === 'workshop-trainings') {
                $seeder = new class extends ExactMirrorPageSeeder {
                    protected function slug(): string
                    {
                        return 'workshop-trainings';
                    }

                    protected function payloadFile(): string
                    {
                        return 'workshop-trainings_data.php';
                    }

                    /**
                     * @param array<string, mixed> $pageData
                     * @return array<string, mixed>
                     */
                    protected function transformPageData(array $pageData): array
                    {
                        $pageData['css_files'] = $this->withTablepressCss((array) ($pageData['css_files'] ?? []));
                        $pageData['inline_css'] = $this->appendInlineCss(
                            is_string($pageData['inline_css'] ?? null) ? $pageData['inline_css'] : ''
                        );
                        $pageData['shortcode_replacements'] = $this->shortcodeReplacements();

                        return $pageData;
                    }

                    /**
                     * @return array<string, string>
                     */
                    private function shortcodeReplacements(): array
                    {
                        /** @var array<string, mixed> $raw */
                        $raw = require database_path('seeders/data/workshop_trainings_data.php');

                        return [
                            '[table id=4 /]' => $this->renderTable(
                                'tablepress-4',
                                'Procurement-Certification-PM',
                                'Procurement-Certification-PM-BTN',
                                (array) data_get($raw, 'tables.procurement.rows', [])
                            ),
                            '[table id=7 /]' => $this->renderTable(
                                'tablepress-7',
                                'E-Commerce-Management',
                                'E-Commerce-Management-BTN',
                                (array) data_get($raw, 'tables.ecommerce.rows', [])
                            ),
                            '[table id=6 /]' => $this->renderTable(
                                'tablepress-6',
                                'Tourism-Management-PM',
                                'Tourism-Management-PM-BTN',
                                (array) data_get($raw, 'tables.tourism.rows', [])
                            ),
                            '[table id=5 /]' => $this->renderTable(
                                'tablepress-5',
                                'Supply-Chain-Management-PM',
                                'Supply-Chain-Management-PM-BTN',
                                (array) data_get($raw, 'tables.supply_chain.rows', [])
                            ),
                            '[table id=8 /]' => $this->renderTable(
                                'tablepress-8',
                                'Combine-Procurement-Certification-PM',
                                'Combine-Procurement-Certification-PM-BTN',
                                (array) data_get($raw, 'tables.combined.rows', [])
                            ),
                        ];
                    }

                    /**
                     * @param array<int, string> $cssFiles
                     * @return array<int, string>
                     */
                    private function withTablepressCss(array $cssFiles): array
                    {
                        $tablepressCss = 'mirrors/shared/wp-content/plugins/tablepress/css/build/default.css';

                        if (! in_array($tablepressCss, $cssFiles, true)) {
                            $cssFiles[] = $tablepressCss;
                        }

                        return $cssFiles;
                    }

                    private function appendInlineCss(string $inlineCss): string
                    {
                        $styles = <<<'CSS'
.Combine-Procurement-Certification-PM th{background:rgb(219,37,33);color:#fff;font-family:Poppins}.Combine-Procurement-Certification-PM .column-1{width:40%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:450}.Combine-Procurement-Certification-PM .column-2{width:44%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.Combine-Procurement-Certification-PM .column-3{font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.Combine-Procurement-Certification-PM tr:nth-child(even){background-color:rgb(219,37,33,0.2);z-index:1}.Combine-Procurement-Certification-PM-BTN,.Combine-Procurement-Certification-PM-BTN:visited{padding:10px 18px;border-radius:20px;color:#000!important;transition:.2s ease-out}.Combine-Procurement-Certification-PM-BTN:hover{color:rgb(219,37,33)!important}
.Procurement-Certification-PM th{background:darkslategray;color:#fff;font-family:Poppins}.Procurement-Certification-PM .column-1{width:40%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:450}.Procurement-Certification-PM .column-2{width:44%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.Procurement-Certification-PM .column-3{font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.Procurement-Certification-PM tr:nth-child(even){background-color:rgb(47,79,79,0.2);z-index:1}.Procurement-Certification-PM-BTN,.Procurement-Certification-PM-BTN:visited{padding:10px 18px;border-radius:20px;color:#000!important;transition:.2s ease-in}.Procurement-Certification-PM-BTN:hover{color:darkslategray!important}
.Supply-Chain-Management-PM th{background:darkslateblue;color:#fff;font-family:Poppins}.Supply-Chain-Management-PM .column-1{width:40%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:450}.Supply-Chain-Management-PM .column-2{width:44%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.Supply-Chain-Management-PM .column-3{font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.Supply-Chain-Management-PM tr:nth-child(even){background-color:rgb(72,61,139,0.2);z-index:1}.Supply-Chain-Management-PM-BTN{padding:10px 18px;border-radius:20px;color:#000;transition:.2s ease-in;background:rgb(72,61,139,0.3)}.Supply-Chain-Management-PM-BTN:hover{background:rgb(72,61,139);color:darkslateblue}
.Tourism-Management-PM th{background:darkgreen;color:#fff;font-family:Poppins}.Tourism-Management-PM .column-1{width:40%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:450}.Tourism-Management-PM .column-2{width:44%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.Tourism-Management-PM .column-3{font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.Tourism-Management-PM tr:nth-child(even){background-color:rgb(0,100,0,0.2);z-index:1}.Tourism-Management-PM-BTN{padding:10px 18px;border-radius:20px;color:#000;transition:.2s ease-in;background:rgb(0,100,0,0.3)}.Tourism-Management-PM-BTN:hover{background:rgb(0,100,0);color:darkgreen}
.E-Commerce-Management th{background:rgb(247,198,0);color:#fff;font-family:Poppins}.E-Commerce-Management .column-1{width:40%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:450}.E-Commerce-Management .column-2{width:44%;font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.E-Commerce-Management .column-3{font-family:Poppins;padding-left:20px;justify-content:center;align-content:center;font-weight:400}.E-Commerce-Management tr:nth-child(even){background-color:rgb(247,198,0,0.2);z-index:1}.E-Commerce-Management-BTN{padding:10px 18px;border-radius:20px;color:#000;transition:.2s ease-in;background:rgb(247,198,0,0.3)}.E-Commerce-Management-BTN:hover{background:rgb(247,198,0);color:rgb(247,198,0)}
@media (max-width: 767px){.Supply-Chain-Management-PM-BTN,.Tourism-Management-PM-BTN,.Procurement-Certification-PM-BTN,.E-Commerce-Management-BTN,.Combine-Procurement-Certification-PM-BTN{padding:10px 0!important;border-radius:20px;color:#000;transition:.2s ease-in;background:none!important}}
@media (min-width: 768px){.Supply-Chain-Management-PM-BTN,.Tourism-Management-PM-BTN,.Procurement-Certification-PM-BTN,.E-Commerce-Management-BTN{padding:10px 0!important;border-radius:20px;color:#000;background:none!important}}
CSS;

                        if (str_contains($inlineCss, '.Procurement-Certification-PM th{')) {
                            return $inlineCss;
                        }

                        return trim($inlineCss . "\n" . $styles);
                    }

                    /**
                     * @param array<int, array<string, mixed>> $rows
                     */
                    private function renderTable(string $tableId, string $tableClass, string $buttonClass, array $rows): string
                    {
                        if ($rows === []) {
                            return '';
                        }

                        $tablepressIdClass = 'tablepress-id-' . preg_replace('/^tablepress-/', '', $tableId);
                        $html = '<table id="' . htmlspecialchars($tableId, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '" class="tablepress ' . htmlspecialchars($tablepressIdClass, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . ' ' . htmlspecialchars($tableClass, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '">';
                        $html .= '<thead><tr class="row-1">';
                        $html .= '<th class="column-1">Certification</th>';
                        $html .= '<th class="column-2">Key Focus Area</th>';
                        $html .= '<td class="column-3"></td>';
                        $html .= '</tr></thead><tbody class="row-hover">';

                        foreach (array_values($rows) as $index => $row) {
                            $certification = trim((string) ($row['certification_html'] ?? ''));
                            $focus = htmlspecialchars((string) ($row['focus'] ?? ''), ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');
                            $href = trim((string) ($row['href'] ?? ''));
                            $href = $href !== '' && $href !== '#'
                                ? UrlRewriter::local($href)
                                : '';

                            $html .= '<tr class="row-' . ($index + 2) . '">';
                            $html .= '<td class="column-1">' . $certification . '</td>';
                            $html .= '<td class="column-2">' . $focus . '</td>';
                            $html .= '<td class="column-3">';

                            if ($href !== '') {
                                $html .= '<a href="' . htmlspecialchars($href, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '" class="' . htmlspecialchars($buttonClass, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8') . '">Learn More <i class="fa fa-arrow-right" aria-hidden="true"></i></a>';
                            }

                            $html .= '</td></tr>';
                        }

                        $html .= '</tbody></table>';

                        return $html;
                    }
                };

                $seeder->run();

                continue;
            }

            $linkMap = $this->reconciliationMapForSlug($slug);

            $seeder = new class($slug, $linkMap) extends ExactMirrorPageSeeder {
                /**
                 * @param array<string, string> $linkMap
                 */
                public function __construct(private readonly string $mirrorSlug, private readonly array $linkMap)
                {
                }

                protected function slug(): string
                {
                    return $this->mirrorSlug;
                }

                protected function payloadFile(): string
                {
                    return $this->mirrorSlug . '_data.php';
                }

                /**
                 * @param array<string, mixed> $pageData
                 * @return array<string, mixed>
                 */
                protected function transformPageData(array $pageData): array
                {
                    if ($this->linkMap !== [] && is_string($pageData['body_html'] ?? null)) {
                        $pageData['body_html'] = MirrorLinkReconciler::reconcileBodyHtml(
                            $pageData['body_html'],
                            $this->linkMap,
                        );
                    }

                    return $pageData;
                }
            };

            $seeder->run();
        }
    }

    /**
     * @return string[]
     */
    private function slugs(): array
    {
        return [
            'aapscm-training-virtual-american-certified-blockchain-for-supply-chain-professional-ac-bscp',
            'aapscm-training-virtual-american-certified-digital-merchandising-and-user-experience-professional-ac-dmux',
            'aapscm-training-virtual-american-certified-digital-procurement-analytics-specialist-acdpas',
            'aapscm-training-virtual-american-certified-digital-supply-chain-integration-professional-ac-dscip',
            'aapscm-training-virtual-american-certified-e-commerce-strategy-and-growth-professional-ac-esgp',
            'aapscm-training-virtual-american-certified-ethical-practices-amp-sustainable-e-commerce-professional-ac-seep',
            'aapscm-training-virtual-american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss',
            'aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp',
            'aapscm-training-virtual-american-certified-it-procurement-digital-transformation-specialist-acipdts',
            'aapscm-training-virtual-american-certified-procurement-automation-rpa-specialist-ac-paras',
            'aapscm-training-virtual-american-certified-procurement-data-science-ai-specialist-ac-pdss',
            'aapscm-training-virtual-american-certified-procurement-leadership-change-management-specialist-acplcms',
            'aapscm-training-virtual-american-certified-procurement-professional-acpp',
            'aapscm-training-virtual-american-certified-procurement-risk-management-specialist-ac-prms',
            'aapscm-training-virtual-american-certified-public-sector-procurement-compliance-specialist-ac-pspcs',
            'aapscm-training-virtual-american-certified-strategic-procurement-supplier-relationship-specialist-ac-sprs',
            'aapscm-training-virtual-american-certified-supply-chain-cybersecurity-professional-ac-sccp',
            'aapscm-training-virtual-american-certified-supply-chain-digital-transformation-manager-ac-scdtm',
            'aapscm-training-virtual-american-certified-supplychain-professional-acscp',
            'aapscm-training-virtual-american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp',
            'aapscm-training-virtual-american-certified-sustainable-procurement-ethical-sourcing-professional-acspesp',
            'aapscm-training-virtual-american-certified-tourism-professional-actp',
            'aapscm-training-virtual-certified-contract-management-consultant-ccmc',
            'aapscm-training-virtual-certified-contract-manager-ccm',
            'aapscm-training-virtual-certified-contract-professional-ccp',
            'aapscm-training-virtual-chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm',
            'aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-manager-ca-ispm',
            'aapscm-training-virtual-chartered-e-commerce-data-analytics-and-ai-professional-ced-ai',
            'aapscm-training-virtual-chartered-global-cross-border-e-commerce-manager-cgcbe',
            'aapscm-training-virtual-chartered-healthcare-procurement-solutions-professional-chpp',
            'aapscm-training-virtual-chartered-procurement-manager-acpm',
            'aapscm-training-virtual-chartered-strategic-procurement-supplier-relationship-specialist-csp-srm',
            'aapscm-training-virtual-chartered-supply-chain-artiﬁcial-intelligence-analyst-csai',
            'aapscm-training-virtual-chartered-supply-chain-manager-acscm',
            'aapscm-training-virtual-chartered-supply-chain-technology-managers-csct',
            'aapscm-training-virtual-chartered-sustainable-culinary-tourism-manager-csctm',
            'aapscm-training-virtual-chartered-sustainable-supply-chain-manager-csscm',
            'aapscm-training',
            'all-courses',
            'artificial-intelligence-ai-courses',
            'become-a-authorized-training-partner',
            'executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai',
            'executive-diploma-in-ai-driven-procurement-operations-automation-ed-poaai',
            'executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst',
            'executive-diploma-in-ai-integrated-contract-management-automation-ed-cmaai',
            'executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai',
            'learning-and-development-hub',
            'online-courses',
            'professional-development',
            'seminars-courses',
            'training-and-credentialing',
            'training-school-affiliated',
            'workshop-trainings',
        ];
    }

    /**
     * @return array<string, string>
     */
    private function reconciliationMapForSlug(string $slug): array
    {
        return match ($slug) {
            'all-courses' => $this->loadHrefMap('all_courses_cards.php', 'title', 'href'),
            'aapscm-training' => $this->loadHrefMap('aapscm_training_cards.php', 'title', 'href'),
            'online-courses' => $this->loadHrefMap('online_courses_cards.php', 'title', 'member_href', 'abbrev'),
            'seminars-courses' => $this->seminarsHrefMap(),
            'artificial-intelligence-ai-courses' => $this->loadHrefMap('certifications_for_professionals_cards.php', 'title', 'href'),
            default => [],
        };
    }

    /**
     * @return array<string, string>
     */
    private function loadHrefMap(string $fileName, string $titleKey, string $hrefKey, ?string $abbrevKey = null): array
    {
        $path = database_path('seeders/data/' . $fileName);
        if (! file_exists($path)) {
            return [];
        }

        /** @var array<int, array<string, mixed>> $rows */
        $rows = require $path;
        $map = [];
        foreach ($rows as $row) {
            $title = trim((string) ($row[$titleKey] ?? ''));
            $href = trim((string) ($row[$hrefKey] ?? ''));
            if ($title === '' || $href === '' || $href === '#') {
                continue;
            }

            $abbreviation = $abbrevKey !== null ? trim((string) ($row[$abbrevKey] ?? '')) : null;
            $abbreviation ??= $this->abbreviationFromHref($href);
            $localizedHref = UrlRewriter::local($href);

            foreach (MirrorLinkReconciler::titleVariants($title, $abbreviation) as $variant) {
                $map[$variant] = $localizedHref;
            }
        }

        return $map;
    }

    private function abbreviationFromHref(string $href): ?string
    {
        $path = trim((string) parse_url($href, PHP_URL_PATH), '/');
        if ($path === '') {
            return null;
        }

        if (preg_match('/(?:^|-)((?:[a-z]{1,6}(?:-[a-z]{1,8})+))$/i', $path, $matches) !== 1) {
            return null;
        }

        return strtoupper($matches[1]);
    }

    /**
     * @return array<string, string>
     */
    private function seminarsHrefMap(): array
    {
        $map = $this->loadHrefMap('online_courses_cards.php', 'title', 'member_href', 'abbrev');
        $chapterHref = UrlRewriter::local('https://aapscm.org/us-charters/#aapscm-spartanburg-sc-chapter');

        foreach (MirrorLinkReconciler::titleVariants('Spartanburg, SC Chapter') as $variant) {
            $map[$variant] = $chapterHref;
        }

        return $map;
    }
}
