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
     * Eligible certification slugs that now render through the shared exact-mirror wrapper.
     *
     * @var string[]
     */
    private const CERTIFICATION_MIRROR_SLUGS = [
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

    /**
     * Maps page slug → dedicated view (Tier B: unique layout that doesn't fit
     * a shared template family). Takes precedence over the template-family map below.
     */
    private const SLUG_VIEWS = [
        'home' => 'cms.page.home',
        'about-us' => 'cms.page.about-us',
        'contact-us' => 'cms.page.contact-us',
        'us-charters' => 'cms.page.us-charters-mirror',
        'donations' => 'cms.page.donations-mirror',
        'aapscm-hotline' => 'cms.page.aapscm-hotline',
        'career-center' => 'cms.page.career-center-exact-mirror',
        'post-resume' => 'cms.page.career-center-exact-mirror',
        'resume-evaluation' => 'cms.page.career-center-exact-mirror',
        'view-job-seekers' => 'cms.page.career-center-exact-mirror',
        'job-listing' => 'cms.page.career-center-exact-mirror',
        'seminars-courses' => 'cms.page.training-exact-mirror',
        'post-job-opportunities' => 'cms.page.career-center-exact-mirror',
        'book' => 'cms.page.book-mirror',
        'trademark' => 'cms.page.trademark',
        'privacy-policy-legal' => 'cms.page.privacy-policy-legal-mirror',
        'become-a-partner' => 'cms.page.become-a-partner',
        'how-to-apply' => 'cms.page.how-to-apply-mirror',
        'certifications-faq' => 'cms.page.certifications-faq',
        'certification-process' => 'cms.page.certification-process',
        '4-steps-to-verification' => 'cms.page.4-steps-to-verification-mirror',
        'which-certification-is-right-for-you' => 'cms.page.which-certification-is-right-for-you',
        'request-pdes-for-certificate' => 'cms.page.request-pdes-for-certificate',
        'academic-fellow-membership' => 'cms.page.membership-exact-mirror',
        'benefits-and-resources' => 'cms.page.membership-exact-mirror',
        'chartered-professional-membership' => 'cms.page.membership-exact-mirror',
        'chartered-supply-chain-professional-member' => 'cms.page.membership-exact-mirror',
        'corporate-fellow-membership' => 'cms.page.membership-exact-mirror',
        'corporate-membership' => 'cms.page.membership-exact-mirror',
        'digital-badges' => 'cms.page.membership-exact-mirror',
        'emerging-leader-fellow-membership' => 'cms.page.membership-exact-mirror',
        'fellow-membership' => 'cms.page.membership-exact-mirror',
        'grand-fellow-membership' => 'cms.page.membership-exact-mirror',
        'international-fellow-membership' => 'cms.page.membership-exact-mirror',
        'membership-faqs' => 'cms.page.membership-exact-mirror',
        'membership' => 'cms.page.membership-exact-mirror',
        'professional-fellow-membership' => 'cms.page.membership-exact-mirror',
        'professional-member-criteria' => 'cms.page.membership-exact-mirror',
        'professional-membership-renewal' => 'cms.page.membership-exact-mirror',
        'professional-membership' => 'cms.page.membership-exact-mirror',
        'specialist-fellow-membership' => 'cms.page.membership-exact-mirror',
        'student-membership' => 'cms.page.membership-exact-mirror',
        'why-join-aapscm' => 'cms.page.membership-exact-mirror',
        'training-and-credentialing' => 'cms.page.training-exact-mirror',
        'training-school-affiliated' => 'cms.page.training-exact-mirror',
        'become-a-authorized-training-partner' => 'cms.page.training-exact-mirror',
        'affiliate-partners' => 'cms.page.affiliate-partners',
        'member-services' => 'cms.page.member-services-mirror',
        'learning-and-development-hub' => 'cms.page.training-exact-mirror',
        'professional-development' => 'cms.page.training-exact-mirror',
        'non-profit-activities-donation' => 'cms.page.non-profit-activities-donation-mirror',
        'influencing-suppliers' => 'cms.page.influencing-suppliers-mirror',
        'james-raussen' => 'cms.page.james-raussen',
        'mohamed-aboelela' => 'cms.page.mohamed-aboelela',
        'mohammed-zul-jamal' => 'cms.page.mohammed-zul-jamal',
        'board-of-directors' => 'cms.page.board-of-directors',
        'certifications-for-professionals' => 'cms.page.certifications-for-professionals',
        'certifications' => 'cms.page.certifications',
        'all-courses' => 'cms.page.training-exact-mirror',
        'aapscm-training' => 'cms.page.training-exact-mirror',
        'workshop-trainings' => 'cms.page.training-exact-mirror',
        'procurement-management-certifications' => 'cms.page.procurement-management-certifications',
        'supply-chain-management-certifications' => 'cms.page.supply-chain-management-certifications',
        'tourism-management-certifications' => 'cms.page.tourism-management-certifications',
        'e-commerce-certifications' => 'cms.page.e-commerce-certifications',
        'combined-procurement-logistics-and-supply-chain-certifications' => 'cms.page.combined-procurement-logistics-and-supply-chain-certifications',
        'artificial-intelligence-ai-courses' => 'cms.page.training-exact-mirror',
        'exam-objectives' => 'cms.page.exam-objectives-mirror',
        'about-testing-options' => 'cms.page.about-testing-options-mirror',
        'programs-match' => 'cms.page.programs-match-mirror',
        'exam-proctoring' => 'cms.page.exam-proctoring-mirror',
        'certificate-exam-policies' => 'cms.page.certificate-exam-policies-mirror',
        'communities' => 'cms.page.communities-mirror',
        'verify-a-certificate' => 'cms.page.verify-a-certificate-live',
        'online-exam' => 'cms.page.online-exam-mirror',
        'online-courses' => 'cms.page.training-exact-mirror',
        'procurement-management' => 'cms.page.procurement-management',
        'supply-chain-management' => 'cms.page.supply-chain-management',
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
        'chartered-healthcare-procurement-solutions-manager-chpm' => 'cms.page.cert-chartered-healthcare-procurement-solutions-manager-chpm',
        'chartered-ai-procurement-professional-caipp' => 'cms.page.cert-chartered-ai-procurement-professional-caipp',
        'american-certified-procurement-logistics-transportation-expert-ac-plte' => 'cms.page.cert-american-certified-procurement-logistics-transportation-expert-ac-plte',
        'american-certified-agile-procurement-amp-supply-chain-professional-ac-apscp' => 'cms.page.cert-american-certified-agile-procurement-amp-supply-chain-professional-ac-apscp',
        'american-certified-risk-amp-compliance-professional-in-procurement-amp-supply-chain-ac-rcppsc' => 'cms.page.cert-american-certified-risk-amp-compliance-professional-in-procurement-amp-supply-chain-ac-rcppsc',
        'chartered-ai-supplier-negotiation-risk-professional-caisnrp' => 'cms.page.cert-chartered-ai-supplier-negotiation-risk-professional-caisnrp',
        'chartered-supply-chain-artificial-intelligence-analyst' => 'cms.page.cert-chartered-supply-chain-artificial-intelligence-analyst',
        'chartered-ai-driven-sustainable-procurement-professional-cai-spp' => 'cms.page.cert-chartered-ai-driven-sustainable-procurement-professional-cai-spp',
        'chartered-ai-driven-sustainable-procurement-manager-cai-spm' => 'cms.page.cert-chartered-ai-driven-sustainable-procurement-manager-cai-spm',
        'certified-ai-enabled-travel-personalization-digital-marketing-professional-aitp-dmp' => 'cms.page.cert-certified-ai-enabled-travel-personalization-digital-marketing-professional-aitp-dmp',
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
        'chartered-ai-procurement-manager-caipm' => 'cms.page.cert-chartered-ai-procurement-manager-caipm',
        'chartered-ai-procurement-strategist-caips' => 'cms.page.cert-chartered-ai-procurement-strategist-caips',
        'chartered-ai-supply-chain-analyst-caisca' => 'cms.page.cert-chartered-ai-supply-chain-analyst-caisca',
        'certified-ai-amp-rpa-procurement-professional-cairpp' => 'cms.page.cert-certified-ai-amp-rpa-procurement-professional-cairpp',
        'certified-ai-rpa-procurement-manager-cairpm' => 'cms.page.cert-certified-ai-rpa-procurement-manager-cairpm',
        'certified-international-manager-in-procurement-materials-management-cimpm' => 'cms.page.cert-certified-international-manager-in-procurement-materials-management-cimpm',
        'certified-international-professional-in-procurement-materials-management-cippm' => 'cms.page.cert-certified-international-professional-in-procurement-materials-management-cippm',
        'american-certified-supply-chain-cybersecurity-manager-ac-sccm' => 'cms.page.cert-american-certified-supply-chain-cybersecurity-manager-ac-sccm',
        'american-certified-supply-chain-digital-transformation-professional-ac-scdtp' => 'cms.page.cert-american-certified-supply-chain-digital-transformation-professional-ac-scdtp',
        'american-certified-global-supply-chain-risk-and-resilience-manager-ac-gsrm' => 'cms.page.cert-american-certified-global-supply-chain-risk-and-resilience-manager-ac-gsrm',
        'certified-international-professional-in-warehouse-inventory-management-cipwim' => 'cms.page.cert-certified-international-professional-in-warehouse-inventory-management-cipwim',
        'chartered-healthcare-supply-chain-transformation-executive-chste' => 'cms.page.cert-chartered-healthcare-supply-chain-transformation-executive-chste',
        'ctm-2' => 'cms.page.cert-ctm-2',
        'certified-ai-powered-hospitality-experience-professional-a-hxp' => 'cms.page.cert-certified-ai-powered-hospitality-experience-professional-a-hxp',
        'certified-ai-powered-hospitality-experience-manager-a-hxm' => 'cms.page.cert-certified-ai-powered-hospitality-experience-manager-a-hxm',
        'certified-ai-enabled-travel-personalization-digital-marketing-manager-aitp-dmm' => 'cms.page.cert-certified-ai-enabled-travel-personalization-digital-marketing-manager-aitp-dmm',
        'certified-sustainable-hospitality-innovator-cshi' => 'cms.page.cert-certified-sustainable-hospitality-innovator-cshi',
        'certified-digital-tourism-experience-professional-cdtep' => 'cms.page.cert-certified-digital-tourism-experience-professional-cdtep',
        'certified-digital-tourism-experience-manager-cdtem' => 'cms.page.cert-certified-digital-tourism-experience-manager-cdtem',
        'certified-global-event-destination-professional-gedp' => 'cms.page.cert-certified-global-event-destination-professional-gedp',
        'certified-global-event-destination-manager-gedm' => 'cms.page.cert-certified-global-event-destination-manager-gedm',
        'certified-tourism-technology-professional-cttp' => 'cms.page.cert-certified-tourism-technology-professional-cttp',
        'certified-ai-driven-tourism-data-analyst-aita' => 'cms.page.cert-certified-ai-driven-tourism-data-analyst-aita',
        'certified-smart-destination-management-professional-sdmp' => 'cms.page.cert-certified-smart-destination-management-professional-sdmp',
        'certified-digital-tourism-transformation-specialist-dtts' => 'cms.page.cert-certified-digital-tourism-transformation-specialist-dtts',
        'american-certified-global-procurement-logistics-amp-supply-chain-professional-ac-gplscp' => 'cms.page.cert-american-certified-global-procurement-logistics-amp-supply-chain-professional-ac-gplscp',
        'chartered-strategic-procurement-supply-chain-manager-csp-scm' => 'cms.page.cert-chartered-strategic-procurement-supply-chain-manager-csp-scm',
        'advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm' => 'cms.page.cert-advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm',
        'american-certified-sustainable-procurement-amp-green-supply-chain-professional-ac-spgscp' => 'cms.page.cert-american-certified-sustainable-procurement-amp-green-supply-chain-professional-ac-spgscp',
        'american-certified-digital-supply-chain-amp-procurement-transformation-professional-ac-dscptp' => 'cms.page.cert-american-certified-digital-supply-chain-amp-procurement-transformation-professional-ac-dscptp',
        'certified-ai-enabled-travel-personalization-digital-marketing-specialist-aitp-dms' => 'cms.page.cert-certified-ai-enabled-travel-personalization-digital-marketing-specialist-aitp-dms',
        'chartered-sustainable-procurement-esg-ai-manager-cspeai' => 'cms.page.cert-chartered-sustainable-procurement-esg-ai-manager-cspeai',
        'chartered-ai-supplier-negotiation-risk-manager-caisnrm' => 'cms.page.cert-chartered-ai-supplier-negotiation-risk-manager-caisnrm',
        'american-certified-ai-procurement-fraud-amp-cybersecurity-manager-caipfcm' => 'cms.page.cert-american-certified-ai-procurement-fraud-amp-cybersecurity-manager-caipfcm',
        'chartered-supply-chain-artificial-intelligence-csai' => 'cms.page.cert-chartered-supply-chain-artificial-intelligence-csai',
        'american-certified-ai-supply-chain-resilience-amp-crisis-manager-ac-aiscrc' => 'cms.page.cert-american-certified-ai-supply-chain-resilience-amp-crisis-manager-ac-aiscrc',
        'american-certified-ai-amp-blockchain-procurement-professional-ac-aibpp' => 'cms.page.cert-american-certified-ai-amp-blockchain-procurement-professional-ac-aibpp',
        'american-certified-ai-procurement-demand-amp-forecasting-analyst-ac-aipdfa' => 'cms.page.cert-american-certified-ai-procurement-demand-amp-forecasting-analyst-ac-aipdfa',
        'american-certified-ai-procurement-chatbot-amp-supplier-relations-professional-ac-aipcsr' => 'cms.page.cert-american-certified-ai-procurement-chatbot-amp-supplier-relations-professional-ac-aipcsr',
        // Instructor-led virtual training detail pages (WP parity)
        'instructor-led-virtual-training-american-certified-global-procurement-logistics-supply-chain-professional-ac-gplscp' => 'cms.page.instructor-led-virtual-training-american-certified-global-procurement-logistics-supply-chain-professional-ac-gplscp',
        'instructor-led-virtual-training-chartered-strategic-procurement-supply-chain-manager-csp-scm' => 'cms.page.instructor-led-virtual-training-chartered-strategic-procurement-supply-chain-manager-csp-scm',
        'instructor-led-virtual-training-advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm' => 'cms.page.instructor-led-virtual-training-advanced-certified-procurement-logistics-supply-chain-manager-ac-plscm',
        'instructor-led-virtual-training-american-certified-sustainable-procurement-green-supply-chain-professional-ac-spgscp' => 'cms.page.instructor-led-virtual-training-american-certified-sustainable-procurement-green-supply-chain-professional-ac-spgscp',
        'instructor-led-virtual-training-american-certified-digital-supply-chain-procurement-transformation-professional-ac-dscptp' => 'cms.page.instructor-led-virtual-training-american-certified-digital-supply-chain-procurement-transformation-professional-ac-dscptp',
        'instructor-led-virtual-training-american-certified-procurement-logistics-transportation-expert-ac-plte' => 'cms.page.instructor-led-virtual-training-american-certified-procurement-logistics-transportation-expert-ac-plte',
        'instructor-led-virtual-training-american-certified-agile-procurement-supply-chain-professional-ac-apscp' => 'cms.page.instructor-led-virtual-training-american-certified-agile-procurement-supply-chain-professional-ac-apscp',
        'instructor-led-virtual-training-american-certified-risk-compliance-professional-in-procurement-supply-chain-ac-rcppsc' => 'cms.page.instructor-led-virtual-training-american-certified-risk-compliance-professional-in-procurement-supply-chain-ac-rcppsc',
        'instructor-led-virtual-training-executive-diploma-in-procurement-logistics-supply-chain-leadership-edplscl' => 'cms.page.instructor-led-virtual-training-executive-diploma-in-procurement-logistics-supply-chain-leadership-edplscl',
        // Training (virtual) detail pages (WP parity)
        'aapscm-training-virtual-american-certified-procurement-professional-acpp' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-certified-contract-management-consultant-ccmc' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-certified-contract-manager-ccm' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-certified-contract-professional-ccp' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-procurement-manager-acpm' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-supplychain-professional-acscp' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-supply-chain-manager-acscm' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-tourism-professional-actp' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-digital-procurement-analytics-specialist-acdpas' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-it-procurement-digital-transformation-specialist-acipdts' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-supply-chain-technology-managers-csct' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-public-sector-procurement-compliance-specialist-ac-pspcs' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-sustainable-procurement-ethical-sourcing-professional-acspesp' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-procurement-risk-management-specialist-ac-prms' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-strategic-procurement-supplier-relationship-specialist-ac-sprs' => 'cms.page.training-exact-mirror',
        "aapscm-training-virtual-chartered-supply-chain-arti\u{fb01}cial-intelligence-analyst-csai" => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-healthcare-procurement-solutions-professional-chpp' => 'cms.page.aapscm-training-virtual-chartered-healthcare-procurement-solutions-professional-chpp',
        'aapscm-training-virtual-chartered-strategic-procurement-supplier-relationship-specialist-csp-srm' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-global-procurement-cross-border-supply-specialist-ac-gpcss' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-procurement-data-science-ai-specialist-ac-pdss' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-procurement-automation-rpa-specialist-ac-paras' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-procurement-leadership-change-management-specialist-acplcms' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-supply-chain-cybersecurity-professional-ac-sccp' => 'cms.page.training-exact-mirror',
        'apscm-training-virtual-chartered-healthcare-procurement-solutions-manager-chpm' => 'cms.page.apscm-training-virtual-chartered-healthcare-procurement-solutions-manager-chpm',
        'aapscm-training-virtual-chartered-ai-procurement-professional-caipp' => 'cms.page.aapscm-training-virtual-chartered-ai-procurement-professional-caipp',
        'aapscm-training-virtual-chartered-ai-procurement-manager-caipm' => 'cms.page.aapscm-training-virtual-chartered-ai-procurement-manager-caipm',
        'aapscm-training-virtual-chartered-ai-supplier-negotiation-risk-professional-caisnrp' => 'cms.page.aapscm-training-virtual-chartered-ai-supplier-negotiation-risk-professional-caisnrp',
        'aapscm-training-virtual-certified-ai-rpa-procurement-manager-cairpm' => 'cms.page.aapscm-training-virtual-certified-ai-rpa-procurement-manager-cairpm',
        'aapscm-training-virtual-certified-international-professional-in-procurement-materials-management-cippm' => 'cms.page.aapscm-training-virtual-certified-international-professional-in-procurement-materials-management-cippm',
        'aapscm-training-virtual-certified-international-manager-in-procurement-materials-management-cimpm' => 'cms.page.aapscm-training-virtual-certified-international-manager-in-procurement-materials-management-cimpm',
        'aapscm-training-virtual-american-certified-supply-chain-cybersecurity-manager-ac-sccm' => 'cms.page.aapscm-training-virtual-american-certified-supply-chain-cybersecurity-manager-ac-sccm',
        'aapscm-training-virtual-american-certified-supply-chain-digital-transformation-professional-ac-scdtp' => 'cms.page.aapscm-training-virtual-american-certified-supply-chain-digital-transformation-professional-ac-scdtp',
        'aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-manager-ac-gsrm' => 'cms.page.aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-manager-ac-gsrm',
        'aapscm-training-virtual-certified-international-professional-in-warehouse-inventory-management-cipwim' => 'cms.page.aapscm-training-virtual-certified-international-professional-in-warehouse-inventory-management-cipwim',
        'aapscm-training-virtual-chartered-healthcare-supply-chain-transformation-executive-chste' => 'cms.page.aapscm-training-virtual-chartered-healthcare-supply-chain-transformation-executive-chste',
        'aapscm-training-virtual-certified-ai-powered-hospitality-experience-professional-a-hxp' => 'cms.page.aapscm-training-virtual-certified-ai-powered-hospitality-experience-professional-a-hxp',
        'aapscm-training-virtual-certified-ai-powered-hospitality-experience-manager-a-hxm' => 'cms.page.aapscm-training-virtual-certified-ai-powered-hospitality-experience-manager-a-hxm',
        'aapscm-training-virtual-certified-ai-enabled-travel-personalization-digital-marketing-specialist-aitp-dms' => 'cms.page.aapscm-training-virtual-certified-ai-enabled-travel-personalization-digital-marketing-specialist-aitp-dms',
        'aapscm-training-virtual-certified-ai-enabled-travel-personalization-digital-marketing-professional-aitp-dmp' => 'cms.page.aapscm-training-virtual-certified-ai-enabled-travel-personalization-digital-marketing-professional-aitp-dmp',
        'aapscm-training-virtual-certified-ai-enabled-travel-personalization-digital-marketing-manager-aitp-dmm' => 'cms.page.aapscm-training-virtual-certified-ai-enabled-travel-personalization-digital-marketing-manager-aitp-dmm',
        'aapscm-training-virtual-certified-sustainable-hospitality-innovator-cshi' => 'cms.page.aapscm-training-virtual-certified-sustainable-hospitality-innovator-cshi',
        'aapscm-training-virtual-certified-digital-tourism-experience-professional-cdtep' => 'cms.page.aapscm-training-virtual-certified-digital-tourism-experience-professional-cdtep',
        'aapscm-training-virtual-certified-digital-tourism-experience-manager-cdtem' => 'cms.page.aapscm-training-virtual-certified-digital-tourism-experience-manager-cdtem',
        'aapscm-training-virtual-certified-global-event-destination-professional-gedp' => 'cms.page.aapscm-training-virtual-certified-global-event-destination-professional-gedp',
        'aapscm-training-virtual-certified-global-event-destination-manager-gedm' => 'cms.page.aapscm-training-virtual-certified-global-event-destination-manager-gedm',
        'aapscm-training-virtual-certified-tourism-technology-professional-cttp' => 'cms.page.aapscm-training-virtual-certified-tourism-technology-professional-cttp',
        'aapscm-training-virtual-certified-ai-driven-tourism-data-analyst-aita' => 'cms.page.aapscm-training-virtual-certified-ai-driven-tourism-data-analyst-aita',
        'aapscm-training-virtual-certified-smart-destination-management-professional-sdmp' => 'cms.page.aapscm-training-virtual-certified-smart-destination-management-professional-sdmp',
        'aapscm-training-virtual-certified-digital-tourism-transformation-specialist-dtts' => 'cms.page.aapscm-training-virtual-certified-digital-tourism-transformation-specialist-dtts',
        'aapscm-training-virtual-chartered-advanced-supply-chain-cybersecurity-manager-ca-sccm' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-professional-cai-spp' => 'cms.page.aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-professional-cai-spp',
        'aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-manager-cai-spm' => 'cms.page.aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-manager-cai-spm',
        'aapscm-training-virtual-chartered-ai-driven-sustainable-procurement-manager-ca-ispm' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-supply-chain-artificial-intelligence-csaianalyst' => 'cms.page.aapscm-training-virtual-chartered-supply-chain-artificial-intelligence-csaianalyst',
        'aapscm-training-virtual-american-certified-blockchain-for-supply-chain-professional-ac-bscp' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-sustainable-supply-chain-manager-csscm' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-digital-supply-chain-integration-professional-ac-dscip' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-global-supply-chain-risk-and-resilience-professionalac-gsrp' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-sustainable-culinary-tourism-manager-csctm' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-tourism-manager-ctm' => 'cms.page.aapscm-training-virtual-chartered-tourism-manager-ctm',
        'aapscm-training-virtual-american-certified-e-commerce-strategy-and-growth-professional-ac-esgp' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-ethical-practices-amp-sustainable-e-commerce-professional-ac-seep' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-digital-merchandising-and-user-experience-professional-ac-dmux' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-e-commerce-data-analytics-and-ai-professional-ced-ai' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-chartered-global-cross-border-e-commerce-manager-cgcbe' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-supply-chain-digital-transformation-manager-ac-scdtm' => 'cms.page.training-exact-mirror',
        'aapscm-training-virtual-american-certified-sustainable-and-circular-supply-chain-professional-ac-cscsp' => 'cms.page.training-exact-mirror',
        // Executive Diploma program pages (WP parity)
        'executive-diploma-in-ai-driven-procurement-strategy-transformation-ed-aipst' => 'cms.page.training-exact-mirror',
        'executive-diploma-in-ai-powered-supplier-risk-compliance-esg-management-ed-srceai' => 'cms.page.training-exact-mirror',
        'executive-diploma-in-ai-integrated-contract-management-automation-ed-cmaai' => 'cms.page.training-exact-mirror',
        'executive-diploma-in-ai-based-strategic-sourcing-negotiation-intelligence-ed-ssni-ai' => 'cms.page.training-exact-mirror',
        'executive-diploma-in-ai-driven-procurement-operations-automation-ed-poaai' => 'cms.page.training-exact-mirror',
        'executive-diploma-in-procurement-logistics-supply-chain-leadership-edplscl' => 'cms.page.executive-diploma-in-procurement-logistics-supply-chain-leadership-edplscl',
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

        if (in_array($slug, self::CERTIFICATION_MIRROR_SLUGS, true)) {
            return view('cms.page.certification-exact-mirror', $viewData);
        }

        if (isset(self::SLUG_VIEWS[$slug])) {
            if ($this->shouldUseSlugView($slug, $page)) {
                return view(self::SLUG_VIEWS[$slug], $viewData);
            }

            return view('cms.page.wp-content', $viewData);
        }

        $viewName = self::TEMPLATE_VIEWS[$page->template] ?? 'cms.page.default';

        return view($viewName, $viewData);
    }

    private function shouldUseSlugView(string $slug, Page $page): bool
    {
        if ($slug === 'verify-a-certificate') {
            return true;
        }

        if ($page->source_id !== null) {
            return true;
        }

        return is_array($page->page_data) && $page->page_data !== [];
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
