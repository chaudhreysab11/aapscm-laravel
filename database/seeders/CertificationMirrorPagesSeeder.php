<?php

declare(strict_types=1);

namespace Database\Seeders;

use Database\Seeders\Support\ExactMirrorPageSeeder;
use Database\Seeders\Support\MirrorLinkReconciler;
use Database\Seeders\Support\UrlRewriter;
use Illuminate\Database\Seeder;

class CertificationMirrorPagesSeeder extends Seeder
{
    public function run(): void
    {
        foreach ($this->slugs() as $slug) {
            if (! file_exists(database_path('seeders/data/' . $slug . '_data.php'))) {
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
            'acpp',
            'acsct',
            'american-certified-ai-amp-blockchain-procurement-professional-ac-aibpp',
            'american-certified-ai-procurement-chatbot-amp-supplier-relations-professional-ac-aipcsr',
            'american-certified-ai-procurement-demand-amp-forecasting-analyst-ac-aipdfa',
            'american-certified-ai-procurement-fraud-amp-cybersecurity-manager-caipfcm',
            'american-certified-ai-supply-chain-resilience-amp-crisis-manager-ac-aiscrc',
            'american-certified-blockchain-for-supply-chain-professional-ac-bscp',
            'american-certified-digital-merchandising-and-user-experience-professional-ac-dmux',
            'american-certified-digital-procurement-analytics-specialist',
            'american-certified-digital-supply-chain-integration-professional-ac-dscip',
            'american-certified-e-commerce-strategy-and-growth-professional-ac-esgp',
            'american-certified-ethical-practices-sustainable-e-commerce-professional-ac-seep',
            'american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss',
            'american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp',
            'american-certified-it-procurement-digital-transformation-specialist',
            'american-certified-procurement-automation-rpa-specialist-ac-paras-2',
            'american-certified-procurement-data-science-ai-specialist-ac-pdss',
            'american-certified-procurement-leadership-change-management-specialist',
            'american-certified-procurement-manager-acpm',
            'american-certified-procurement-risk-management-specialist',
            'american-certified-public-sector-procurement-compliance-specialist',
            'american-certified-strategic-procurement-supplier-relationship-specialist',
            'american-certified-supply-chain-artificial-intelligence-ai-professional-ac-scai',
            'american-certified-supply-chain-cybersecurity-professional-ac-sccp',
            'american-certified-supply-chain-digital-transformation-manager-ac-scdtm',
            'american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp',
            'american-certified-sustainable-procurement-ethical-sourcing-professional',
            'american-certified-tourism-professional',
            'certificate-video',
            'certification-process',
            'certifications-faq',
            'certifications-for-professionals',
            'certifications',
            'certified-ai-amp-rpa-procurement-professional-cairpp',
            'certified-ai-rpa-procurement-manager-cairpm',
            'certified-contract-management-consultant-ccmc',
            'certified-contract-manager-ccm',
            'certified-contract-professional-ccp',
            'certified-international-professional-in-procurement-materials-management-cippm',
            'chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm',
            'chartered-ai-driven-sustainable-procurement-manager-ca-ispm',
            'chartered-ai-procurement-manager-caipm',
            'chartered-ai-procurement-professional-caipp',
            'chartered-ai-procurement-strategist-caips',
            'chartered-ai-supplier-negotiation-risk-manager-caisnrm',
            'chartered-ai-supply-chain-analyst-caisca',
            'chartered-e-commerce-data-analytics-and-ai-professional-ced-ai',
            'chartered-global-cross-border-e-commerce-manager-cgcbe',
            'chartered-healthcare-procurement-solutions-manager-chpm',
            'chartered-healthcare-procurement-solutions-professional-chpp',
            'chartered-strategic-procurement-supplier-relationship-specialist',
            'chartered-supply-chain-artificial-intelligence-csai',
            'chartered-supply-chain-artificial-intelligence-manager-csai-m',
            'chartered-supply-chain-manager-acscm',
            'chartered-sustainable-culinary-tourism-manager-csctm',
            'chartered-sustainable-procurement-esg-ai-manager-cspeai',
            'chartered-sustainable-supply-chain-manager-csscm',
            'combined-procurement-logistics-and-supply-chain-certifications',
            'e-commerce-certifications',
            'procurement-management-certifications',
            'procurement-management',
            'supply-chain-management-certifications',
            'supply-chain-management',
            'the-american-certified-supply-chain-artificial-intelligence-analyst-acsai',
            'the-american-certified-supply-chain-professional-acscp',
            'tourism-management-certifications',
            'which-certification-is-right-for-you',
        ];
    }

    /**
     * @return array<string, string>
     */
    private function reconciliationMapForSlug(string $slug): array
    {
        return match ($slug) {
            'certifications-for-professionals',
            'supply-chain-management-certifications',
            'tourism-management-certifications',
            'e-commerce-certifications',
            'combined-procurement-logistics-and-supply-chain-certifications' => $this->loadHrefMap('certifications_for_professionals_cards.php', 'title', 'href'),
            'certifications' => $this->certificationsIndexHrefMap(),
            'procurement-management-certifications' => $this->procurementManagementHrefMap(),
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

    /**
     * @return array<string, string>
     */
    private function loadNestedHrefMap(string $fileName, string $rowsKey, string $titleKey, string $hrefKey): array
    {
        $path = database_path('seeders/data/' . $fileName);
        if (! file_exists($path)) {
            return [];
        }

        /** @var array<string, mixed> $data */
        $data = require $path;
        /** @var array<int, array<string, mixed>> $rows */
        $rows = (array) ($data[$rowsKey] ?? []);
        $map = [];
        foreach ($rows as $row) {
            $title = trim((string) ($row[$titleKey] ?? ''));
            $href = trim((string) ($row[$hrefKey] ?? ''));
            if ($title === '' || $href === '' || $href === '#' || str_contains($href, 'hyperlink')) {
                continue;
            }

            $localizedHref = UrlRewriter::local($href);
            foreach (MirrorLinkReconciler::titleVariants($title) as $variant) {
                $map[$variant] = $localizedHref;
            }
        }

        return $map;
    }

    /**
     * @return array<string, string>
     */
    private function procurementManagementHrefMap(): array
    {
        return array_replace(
            $this->loadNestedHrefMap('procurement_management_certifications_data.php', 'cards', 'title', 'href'),
            $this->loadHrefMap('certifications_for_professionals_cards.php', 'title', 'href'),
        );
    }

    /**
     * @return array<string, string>
     */
    private function certificationsIndexHrefMap(): array
    {
        $map = $this->loadHrefMap('certifications_for_professionals_cards.php', 'title', 'href');
        $chapterHref = UrlRewriter::local('https://aapscm.org/us-charters/#aapscm-spartanburg-sc-chapter');

        foreach (MirrorLinkReconciler::titleVariants('Spartanburg, SC Chapter') as $variant) {
            $map[$variant] = $chapterHref;
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
}
