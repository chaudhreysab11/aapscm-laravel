<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\BoardMember;
use App\Models\Page;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * Single-action controller that resolves a CMS page by slug and dispatches
 * it to the appropriate Blade template for the page's template family.
 *
 * Template family → view mapping:
 *   standard_content  → cms/page/standard-content
 *   hero_landing      → cms/page/hero-landing
 *   legal_full_width  → cms/page/legal-full-width
 *   sidebar_guide     → cms/page/sidebar-guide
 *   person_profile    → cms/page/person-profile
 *   membership_tier   → cms/page/membership-tier
 *   communities       → cms/page/communities
 */
class CmsPageController extends Controller
{
    /**
     * Maps page slug → dedicated view (Tier B: unique layout that doesn't fit
     * a shared template family). Takes precedence over the template-family map below.
     */
    private const SLUG_VIEWS = [
        'home' => 'cms.page.home',
        'about-us' => 'cms.page.about-us',
        'contact-us' => 'cms.page.contact-us',
        'us-charters' => 'cms.page.us-charters',
        'donations' => 'cms.page.donations',
        'aapscm-hotline' => 'cms.page.aapscm-hotline',
        'career-center' => 'cms.page.career-center',
        'post-resume' => 'cms.page.post-resume',
        'resume-evaluation' => 'cms.page.resume-evaluation',
        'view-job-seekers' => 'cms.page.view-job-seekers',
        'job-listing' => 'cms.page.job-listing',
        'seminars-courses' => 'cms.page.seminars-courses',
        'post-job-opportunities' => 'cms.page.post-job-opportunities',
        'book' => 'cms.page.book',
        'trademark' => 'cms.page.trademark',
        'privacy-policy-legal' => 'cms.page.privacy-policy-legal',
        'become-a-partner' => 'cms.page.become-a-partner',
        'how-to-apply' => 'cms.page.how-to-apply',
        'certifications-faq' => 'cms.page.certifications-faq',
        'certification-process' => 'cms.page.certification-process',
        '4-steps-to-verification' => 'cms.page.4-steps-to-verification',
        'which-certification-is-right-for-you' => 'cms.page.which-certification-is-right-for-you',
        'request-pdes-for-certificate' => 'cms.page.request-pdes-for-certificate',
        'professional-member-criteria' => 'cms.page.professional-member-criteria',
        'why-join-aapscm' => 'cms.page.why-join-aapscm',
        'benefits-and-resources' => 'cms.page.benefits-and-resources',
        'digital-badges' => 'cms.page.digital-badges',
        'training-and-credentialing' => 'cms.page.training-and-credentialing',
        'training-school-affiliated' => 'cms.page.training-school-affiliated',
        'become-a-authorized-training-partner' => 'cms.page.become-a-authorized-training-partner',
        'affiliate-partners' => 'cms.page.affiliate-partners',
        'member-services' => 'cms.page.member-services',
        'learning-and-development-hub' => 'cms.page.learning-and-development-hub',
        'professional-development' => 'cms.page.professional-development',
        'non-profit-activities-donation' => 'cms.page.non-profit-activities-donation',
        'influencing-suppliers' => 'cms.page.influencing-suppliers',
        'board-of-directors' => 'cms.page.board-of-directors',
        'certifications-for-professionals' => 'cms.page.certifications-for-professionals',
        'certifications' => 'cms.page.certifications',
        'all-courses' => 'cms.page.all-courses',
        'aapscm-training' => 'cms.page.aapscm-training',
        'workshop-trainings' => 'cms.page.workshop-trainings',
        'procurement-management-certifications' => 'cms.page.procurement-management-certifications',
        'supply-chain-management-certifications' => 'cms.page.supply-chain-management-certifications',
        'tourism-management-certifications' => 'cms.page.tourism-management-certifications',
        'e-commerce-certifications' => 'cms.page.e-commerce-certifications',
        'combined-procurement-logistics-and-supply-chain-certifications' => 'cms.page.combined-procurement-logistics-and-supply-chain-certifications',
        'artificial-intelligence-ai-courses' => 'cms.page.artificial-intelligence-ai-courses',
        'exam-objectives' => 'cms.page.exam-objectives',
        'about-testing-options' => 'cms.page.about-testing-options',
        'programs-match' => 'cms.page.programs-match',
        'exam-proctoring' => 'cms.page.exam-proctoring',
        'certificate-exam-policies' => 'cms.page.certificate-exam-policies',
        'communities' => 'cms.page.communities',
        'verify-a-certificate' => 'cms.page.verify-a-certificate',
        'online-exam' => 'cms.page.online-exam',
        'online-courses' => 'cms.page.online-courses',
        'procurement-management' => 'cms.page.procurement-management',
        'supply-chain-management' => 'cms.page.supply-chain-management',
        'membership' => 'cms.page.membership',
        'professional-membership' => 'cms.page.professional-membership',
        'chartered-professional-membership' => 'cms.page.chartered-professional-membership',
        'chartered-supply-chain-professional-member' => 'cms.page.chartered-supply-chain-professional-member',
        'corporate-membership' => 'cms.page.corporate-membership',
        'student-membership' => 'cms.page.student-membership',
        'professional-membership-renewal' => 'cms.page.professional-membership-renewal',
        'fellow-membership' => 'cms.page.fellow-membership',
        'membership-faqs' => 'cms.page.membership-faqs',
        // Certification detail pages (WP parity)
        'acpp' => 'cms.page.cert-acpp',
        'american-certified-procurement-manager-acpm' => 'cms.page.cert-american-certified-procurement-manager-acpm',
        'the-american-certified-supply-chain-professional-acscp' => 'cms.page.cert-the-american-certified-supply-chain-professional-acscp',
        'chartered-supply-chain-manager-acscm' => 'cms.page.cert-chartered-supply-chain-manager-acscm',
        'the-american-certified-supply-chain-artificial-intelligence-analyst-acsai' => 'cms.page.cert-the-american-certified-supply-chain-artificial-intelligence-analyst-acsai',
        'american-certified-digital-procurement-analytics-specialist' => 'cms.page.cert-american-certified-digital-procurement-analytics-specialist',
        'american-certified-sustainable-procurement-ethical-sourcing-professional' => 'cms.page.cert-american-certified-sustainable-procurement-ethical-sourcing-professional',
        'american-certified-procurement-risk-management-specialist' => 'cms.page.cert-american-certified-procurement-risk-management-specialist',
        'american-certified-strategic-procurement-supplier-relationship-specialist' => 'cms.page.cert-american-certified-strategic-procurement-supplier-relationship-specialist',
        'chartered-strategic-procurement-supplier-relationship-specialist' => 'cms.page.cert-chartered-strategic-procurement-supplier-relationship-specialist',
        'american-certified-it-procurement-digital-transformation-specialist' => 'cms.page.cert-american-certified-it-procurement-digital-transformation-specialist',
        'american-certified-public-sector-procurement-compliance-specialist' => 'cms.page.cert-american-certified-public-sector-procurement-compliance-specialist',
        'american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss' => 'cms.page.cert-american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss',
        'american-certified-procurement-data-science-ai-specialist-ac-pdss' => 'cms.page.cert-american-certified-procurement-data-science-ai-specialist-ac-pdss',
        'american-certified-procurement-leadership-change-management-specialist' => 'cms.page.cert-american-certified-procurement-leadership-change-management-specialist',
        'american-certified-procurement-automation-rpa-specialist-ac-paras-2' => 'cms.page.cert-american-certified-procurement-automation-rpa-specialist-ac-paras-2',
        'american-certified-tourism-professional' => 'cms.page.cert-american-certified-tourism-professional',
        'acsct' => 'cms.page.cert-acsct',
        'chartered-healthcare-procurement-solutions-professional-chpp' => 'cms.page.cert-chartered-healthcare-procurement-solutions-professional-chpp',
        'american-certified-supply-chain-cybersecurity-professional-ac-sccp' => 'cms.page.cert-american-certified-supply-chain-cybersecurity-professional-ac-sccp',
        'chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm' => 'cms.page.cert-chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm',
        'chartered-ai-driven-sustainable-procurement-manager-ca-ispm' => 'cms.page.cert-chartered-ai-driven-sustainable-procurement-manager-ca-ispm',
        'american-certified-blockchain-for-supply-chain-professional-ac-bscp' => 'cms.page.cert-american-certified-blockchain-for-supply-chain-professional-ac-bscp',
        'chartered-sustainable-supply-chain-manager-csscm' => 'cms.page.cert-chartered-sustainable-supply-chain-manager-csscm',
        'american-certified-digital-supply-chain-integration-professional-ac-dscip' => 'cms.page.cert-american-certified-digital-supply-chain-integration-professional-ac-dscip',
        'american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp' => 'cms.page.cert-american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp',
        'chartered-sustainable-culinary-tourism-manager-csctm' => 'cms.page.cert-chartered-sustainable-culinary-tourism-manager-csctm',
        'american-certified-e-commerce-strategy-and-growth-professional-ac-esgp' => 'cms.page.cert-american-certified-e-commerce-strategy-and-growth-professional-ac-esgp',
        'american-certified-ethical-practices-sustainable-e-commerce-professional-ac-seep' => 'cms.page.cert-american-certified-ethical-practices-sustainable-e-commerce-professional-ac-seep',
        'american-certified-digital-merchandising-and-user-experience-professional-ac-dmux' => 'cms.page.cert-american-certified-digital-merchandising-and-user-experience-professional-ac-dmux',
        'chartered-e-commerce-data-analytics-and-ai-professional-ced-ai' => 'cms.page.cert-chartered-e-commerce-data-analytics-and-ai-professional-ced-ai',
        'chartered-global-cross-border-e-commerce-manager-cgcbe' => 'cms.page.cert-chartered-global-cross-border-e-commerce-manager-cgcbe',
        'american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp' => 'cms.page.cert-american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp',
        'american-certified-supply-chain-digital-transformation-manager-ac-scdtm' => 'cms.page.cert-american-certified-supply-chain-digital-transformation-manager-ac-scdtm',
        'american-certified-supply-chain-artificial-intelligence-ai-professional-ac-scai' => 'cms.page.cert-american-certified-supply-chain-artificial-intelligence-ai-professional-ac-scai',
        'chartered-supply-chain-artificial-intelligence-manager-csai-m' => 'cms.page.cert-chartered-supply-chain-artificial-intelligence-manager-csai-m',
        'chartered-ai-procurement-strategist-caips' => 'cms.page.cert-chartered-ai-procurement-strategist-caips',
        'chartered-ai-supply-chain-analyst-caisca' => 'cms.page.cert-chartered-ai-supply-chain-analyst-caisca',
        'certified-ai-amp-rpa-procurement-professional-cairpp' => 'cms.page.cert-certified-ai-amp-rpa-procurement-professional-cairpp',
        'chartered-sustainable-procurement-esg-ai-manager-cspeai' => 'cms.page.cert-chartered-sustainable-procurement-esg-ai-manager-cspeai',
        'chartered-ai-supplier-negotiation-risk-manager-caisnrm' => 'cms.page.cert-chartered-ai-supplier-negotiation-risk-manager-caisnrm',
        'american-certified-ai-procurement-fraud-amp-cybersecurity-manager-caipfcm' => 'cms.page.cert-american-certified-ai-procurement-fraud-amp-cybersecurity-manager-caipfcm',
        'chartered-supply-chain-artificial-intelligence-csai' => 'cms.page.cert-chartered-supply-chain-artificial-intelligence-csai',
        'american-certified-ai-supply-chain-resilience-amp-crisis-manager-ac-aiscrc' => 'cms.page.cert-american-certified-ai-supply-chain-resilience-amp-crisis-manager-ac-aiscrc',
        'american-certified-ai-amp-blockchain-procurement-professional-ac-aibpp' => 'cms.page.cert-american-certified-ai-amp-blockchain-procurement-professional-ac-aibpp',
        'american-certified-ai-procurement-demand-amp-forecasting-analyst-ac-aipdfa' => 'cms.page.cert-american-certified-ai-procurement-demand-amp-forecasting-analyst-ac-aipdfa',
        'american-certified-ai-procurement-chatbot-amp-supplier-relations-professional-ac-aipcsr' => 'cms.page.cert-american-certified-ai-procurement-chatbot-amp-supplier-relations-professional-ac-aipcsr',
        // Training (virtual) detail pages (WP parity)
        'aapscm-training-virtual-american-certified-procurement-professional-acpp' => 'cms.page.aapscm-training-virtual-american-certified-procurement-professional-acpp',
        'aapscm-training-virtual-certified-contract-management-consultant-ccmc' => 'cms.page.aapscm-training-virtual-certified-contract-management-consultant-ccmc',
        'aapscm-training-virtual-certified-contract-manager-ccm' => 'cms.page.aapscm-training-virtual-certified-contract-manager-ccm',
        'aapscm-training-virtual-certified-contract-professional-ccp' => 'cms.page.aapscm-training-virtual-certified-contract-professional-ccp',
        'aapscm-training-virtual-chartered-procurement-manager-acpm' => 'cms.page.aapscm-training-virtual-chartered-procurement-manager-acpm',
        'aapscm-training-virtual-american-certified-supplychain-professional-acscp' => 'cms.page.aapscm-training-virtual-american-certified-supplychain-professional-acscp',
        'aapscm-training-virtual-chartered-supply-chain-manager-acscm' => 'cms.page.aapscm-training-virtual-chartered-supply-chain-manager-acscm',
        'aapscm-training-virtual-american-certified-tourism-professional-actp' => 'cms.page.aapscm-training-virtual-american-certified-tourism-professional-actp',
        'aapscm-training-virtual-american-certified-digital-procurement-analytics-specialist-acdpas' => 'cms.page.aapscm-training-virtual-american-certified-digital-procurement-analytics-specialist-acdpas',
        'aapscm-training-virtual-american-certified-it-procurement-digital-transformation-specialist-acipdts' => 'cms.page.aapscm-training-virtual-american-certified-it-procurement-digital-transformation-specialist-acipdts',
        'aapscm-training-virtual-chartered-supply-chain-technology-managers-csct' => 'cms.page.aapscm-training-virtual-chartered-supply-chain-technology-managers-csct',
        'aapscm-training-virtual-american-certified-public-sector-procurement-compliance-specialist-ac-pspcs' => 'cms.page.aapscm-training-virtual-american-certified-public-sector-procurement-compliance-specialist-ac-pspcs',
        'aapscm-training-virtual-american-certified-sustainable-procurement-ethical-sourcing-professional-acspesp' => 'cms.page.aapscm-training-virtual-american-certified-sustainable-procurement-ethical-sourcing-professional-acspesp',
        'aapscm-training-virtual-american-certified-procurement-risk-management-specialist-ac-prms' => 'cms.page.aapscm-training-virtual-american-certified-procurement-risk-management-specialist-ac-prms',
        'aapscm-training-virtual-american-certified-strategic-procurement-supplier-relationship-specialist-ac-sprs' => 'cms.page.aapscm-training-virtual-american-certified-strategic-procurement-supplier-relationship-specialist-ac-sprs',
        "aapscm-training-virtual-chartered-supply-chain-arti\u{fb01}cial-intelligence-analyst-csai" => 'cms.page.aapscm-training-virtual-chartered-supply-chain-artificial-intelligence-analyst-csai',
        'aapscm-training-virtual-chartered-healthcare-procurement-solutions-professional-chpp' => 'cms.page.aapscm-training-virtual-chartered-healthcare-procurement-solutions-professional-chpp',
        'aapscm-training-virtual-chartered-strategic-procurement-supplier-relationship-specialist-csp-srm' => 'cms.page.aapscm-training-virtual-chartered-strategic-procurement-supplier-relationship-specialist-csp-srm',
        'aapscm-training-virtual-american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss' => 'cms.page.aapscm-training-virtual-american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss',
        'aapscm-training-virtual-american-certified-procurement-data-science-ai-specialist-ac-pdss' => 'cms.page.aapscm-training-virtual-american-certified-procurement-data-science-ai-specialist-ac-pdss',
        'aapscm-training-virtual-american-certified-procurement-automation-rpa-specialist-ac-paras' => 'cms.page.aapscm-training-virtual-american-certified-procurement-automation-rpa-specialist-ac-paras',
        'aapscm-training-virtual-american-certified-procurement-leadership-change-management-specialist-acplcms' => 'cms.page.aapscm-training-virtual-american-certified-procurement-leadership-change-management-specialist-acplcms',
        'aapscm-training-virtual-american-certified-supply-chain-cybersecurity-professional-ac-sccp' => 'cms.page.aapscm-training-virtual-american-certified-supply-chain-cybersecurity-professional-ac-sccp',
        'aapscm-training-virtual-chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm' => 'cms.page.aapscm-training-virtual-chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm',
        'aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-manager-ca-ispm' => 'cms.page.aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-manager-ca-ispm',
        'aapscm-training-virtual-american-certified-blockchain-for-supply-chain-professional-ac-bscp' => 'cms.page.aapscm-training-virtual-american-certified-blockchain-for-supply-chain-professional-ac-bscp',
        'aapscm-training-virtual-chartered-sustainable-supply-chain-manager-csscm' => 'cms.page.aapscm-training-virtual-chartered-sustainable-supply-chain-manager-csscm',
        'aapscm-training-virtual-american-certified-digital-supply-chain-integration-professional-ac-dscip' => 'cms.page.aapscm-training-virtual-american-certified-digital-supply-chain-integration-professional-ac-dscip',
        'aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp' => 'cms.page.aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp',
        'aapscm-training-virtual-chartered-sustainable-culinary-tourism-manager-csctm' => 'cms.page.aapscm-training-virtual-chartered-sustainable-culinary-tourism-manager-csctm',
        'aapscm-training-virtual-chartered-tourism-manager-ctm' => 'cms.page.aapscm-training-virtual-chartered-tourism-manager-ctm',
        'aapscm-training-virtual-american-certified-e-commerce-strategy-and-growth-professional-ac-esgp' => 'cms.page.aapscm-training-virtual-american-certified-e-commerce-strategy-and-growth-professional-ac-esgp',
        'aapscm-training-virtual-american-certified-ethical-practices-amp-sustainable-e-commerce-professional-ac-seep' => 'cms.page.aapscm-training-virtual-american-certified-ethical-practices-amp-sustainable-e-commerce-professional-ac-seep',
        'aapscm-training-virtual-american-certified-digital-merchandising-and-user-experience-professional-ac-dmux' => 'cms.page.aapscm-training-virtual-american-certified-digital-merchandising-and-user-experience-professional-ac-dmux',
        'aapscm-training-virtual-chartered-e-commerce-data-analytics-and-ai-professional-ced-ai' => 'cms.page.aapscm-training-virtual-chartered-e-commerce-data-analytics-and-ai-professional-ced-ai',
        'aapscm-training-virtual-chartered-global-cross-border-e-commerce-manager-cgcbe' => 'cms.page.aapscm-training-virtual-chartered-global-cross-border-e-commerce-manager-cgcbe',
        'aapscm-training-virtual-american-certified-supply-chain-digital-transformation-manager-ac-scdtm' => 'cms.page.aapscm-training-virtual-american-certified-supply-chain-digital-transformation-manager-ac-scdtm',
        'aapscm-training-virtual-american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp' => 'cms.page.aapscm-training-virtual-american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp',
        // Executive Diploma program pages (WP parity)
        'executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst' => 'cms.page.executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst',
        'executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai' => 'cms.page.executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai',
        'executive-diploma-in-ai-integrated-contract-management-automation-ed-cmaai' => 'cms.page.executive-diploma-in-ai-integrated-contract-management-automation-ed-cmaai',
        'executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai' => 'cms.page.executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai',
        'executive-diploma-in-ai-driven-procurement-operations-automation-ed-poaai' => 'cms.page.executive-diploma-in-ai-driven-procurement-operations-automation-ed-poaai',
        // Foundation-level certification pages (WP parity)
        'certified-contract-professional-ccp' => 'cms.page.cert-certified-contract-professional-ccp',
        'certified-contract-manager-ccm' => 'cms.page.cert-certified-contract-manager-ccm',
        'certified-contract-management-consultant-ccmc' => 'cms.page.cert-certified-contract-management-consultant-ccmc',
    ];

    /** Maps template key → view file (relative to resources/views) */
    private const TEMPLATE_VIEWS = [
        // New template families (TF-01 through TF-07)
        'standard_content' => 'cms.page.standard-content',
        'hero_landing' => 'cms.page.hero-landing',
        'legal_full_width' => 'cms.page.legal-full-width',
        'sidebar_guide' => 'cms.page.sidebar-guide',
        'person_profile' => 'cms.page.person-profile',
        'membership_tier' => 'cms.page.membership-tier',
        'fellow_tier' => 'cms.page.fellow-tier',
        'communities' => 'cms.page.communities',
        // Legacy template keys — kept for backward-compat, render their own views
        'default' => 'cms.page.default',
        'full-width' => 'cms.page.full-width',
        'sidebar' => 'cms.page.sidebar',
        'landing' => 'cms.page.landing',
        'blocks' => 'cms.page.blocks',
    ];

    public function __invoke(string $slug): View|RedirectResponse
    {
        /** @var Page|null $page */
        $page = Page::with('seoMeta')
            ->published()
            ->where('slug', $slug)
            ->first();

        if ($page === null) {
            throw new NotFoundHttpException("Page not found: {$slug}");
        }

        // Restrict access to members-only pages.
        if ($page->membership_tier_id !== null && ! auth()->check()) {
            return redirect()->guest(route('login'));
        }

        return $this->renderPage($slug, $page);
    }

    /**
     * Resolves which view to render for the given page, in priority order:
     *   1. Slug-specific dedicated template (Tier B)
     *   2. Template-family view, falling back to the default template view
     *
     * Bodies are stored in pages.content and structured fields in pages.page_data.
     */
    private function renderPage(string $slug, Page $page): View
    {
        $viewData = ['page' => $page, 'ctaProduct' => $this->resolveCtaProduct($slug)];

        // Architect directive (2026-04-20): /board-of-directors/ pulls its
        // member grid from the board_members table (single source of truth).
        if ($slug === 'board-of-directors') {
            $viewData['boardMembers'] = BoardMember::active()->ordered()->get();
        }

        if (isset(self::SLUG_VIEWS[$slug])) {
            return view(self::SLUG_VIEWS[$slug], $viewData);
        }

        $viewName = self::TEMPLATE_VIEWS[$page->template] ?? 'cms.page.default';

        return view($viewName, $viewData);
    }

    /**
     * Look up the commerce Product (if any) attached to the given page via
     * database/seeders/data/page-product-map.php. Returns null when the page
     * has no mapped product or when the mapped slug is missing/inactive.
     *
     * Used by the 3 confirmed commerce pages (Commerce Data Alignment - Task C):
     * professional-membership, corporate-membership, professional-membership-renewal.
     */
    private function resolveCtaProduct(string $pageSlug): ?Product
    {
        /** @var array<string, string> $map */
        static $map;
        $map ??= require database_path('seeders/data/page-product-map.php');

        $productSlug = $map[$pageSlug] ?? null;

        if ($productSlug === null) {
            return null;
        }

        return Product::where('slug', $productSlug)->where('is_active', true)->first();
    }
}
