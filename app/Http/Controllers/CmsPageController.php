<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Page;
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
        'home'        => 'cms.page.home',
        'about-us'    => 'cms.page.about-us',
        'contact-us'  => 'cms.page.contact-us',
        'us-charters' => 'cms.page.us-charters',
        'donations'      => 'cms.page.donations',
        'aapscm-hotline' => 'cms.page.aapscm-hotline',
        'trademark'           => 'cms.page.trademark',
        'privacy-policy-legal' => 'cms.page.privacy-policy-legal',
        'become-a-partner'     => 'cms.page.become-a-partner',
        'how-to-apply'         => 'cms.page.how-to-apply',
        'certifications-faq'   => 'cms.page.certifications-faq',
        'which-certification-is-right-for-you' => 'cms.page.which-certification-is-right-for-you',
        'request-pdes-for-certificate' => 'cms.page.request-pdes-for-certificate',
        'professional-member-criteria' => 'cms.page.professional-member-criteria',
        'why-join-aapscm'              => 'cms.page.why-join-aapscm',
        'benefits-and-resources'       => 'cms.page.benefits-and-resources',
        'digital-badges'               => 'cms.page.digital-badges',
        'training-and-credentialing'   => 'cms.page.training-and-credentialing',
        'training-school-affiliated'   => 'cms.page.training-school-affiliated',
        'become-a-authorized-training-partner' => 'cms.page.become-a-authorized-training-partner',
        'affiliate-partners'                   => 'cms.page.affiliate-partners',
        'member-services'                      => 'cms.page.member-services',
        'professional-development'             => 'cms.page.professional-development',
        'non-profit-activities-donation'       => 'cms.page.non-profit-activities-donation',
        'influencing-suppliers'                => 'cms.page.influencing-suppliers',
        'board-of-directors'                   => 'cms.page.board-of-directors',
    ];

    /** Maps template key → view file (relative to resources/views) */
    private const TEMPLATE_VIEWS = [
        // New template families (TF-01 through TF-07)
        'standard_content' => 'cms.page.standard-content',
        'hero_landing'     => 'cms.page.hero-landing',
        'legal_full_width' => 'cms.page.legal-full-width',
        'sidebar_guide'    => 'cms.page.sidebar-guide',
        'person_profile'   => 'cms.page.person-profile',
        'membership_tier'  => 'cms.page.membership-tier',
        'communities'      => 'cms.page.communities',
        // Legacy template keys — kept for backward-compat, render their own views
        'default'          => 'cms.page.default',
        'full-width'       => 'cms.page.full-width',
        'sidebar'          => 'cms.page.sidebar',
        'landing'          => 'cms.page.landing',
        'blocks'           => 'cms.page.blocks',
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
        if (isset(self::SLUG_VIEWS[$slug])) {
            return view(self::SLUG_VIEWS[$slug], ['page' => $page]);
        }

        $viewName = self::TEMPLATE_VIEWS[$page->template] ?? 'cms.page.default';

        return view($viewName, ['page' => $page]);
    }
}
