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

        // Check for a slug-specific WordPress content partial that overrides the blocks system.
        $wpPartial = 'cms.pages.' . $slug;
        if (view()->exists($wpPartial)) {
            return view('cms.page.wp-content', [
                'page'          => $page,
                'wpContentView' => $wpPartial,
            ]);
        }

        $viewName = self::TEMPLATE_VIEWS[$page->template] ?? 'cms.page.default';

        return view($viewName, ['page' => $page]);
    }
}
