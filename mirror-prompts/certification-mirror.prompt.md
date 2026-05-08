Convert the certification pages in this Laravel repo from their current implemented state to exact live WordPress mirrors.

Scope:
- Use public_url_inventory_by_category/public_url_inventory_certification.csv as the source list.
- Work only on rows where route_source=cms-page.
- Treat rows with mirror_status=exact-mirror as already mirrored: validate them and only change them if fidelity is still off.
- Prioritize rows with mirror_candidate=yes, but you may need to revise already-implemented pages heavily because the user wants live WordPress parity.

Requirements:
- Keep every existing slug, route, and SEO surface unchanged.
- Source live content from the matching https://aapscm.org/<slug>/ URL.
- Reuse the established exact-mirror workflow in this repo: generate Elementor mirror payloads, create or update thin seeders, use Database\Seeders\Support\ExactMirrorPageSeeder, register seeders in DatabaseSeeder, map slug views in CmsPageController, and render through resources/views/components/cms/exact-mirror-page.blade.php.
- Preserve live copy, section order, hero/section imagery, tables, tabs, CTA blocks, hidden mobile/desktop sections, and page-specific Elementor CSS.
- Rewrite all AAPSCM internal links and assets to local Laravel equivalents. No remote aapscm.org or aapscm.com asset/runtime leakage is allowed in rendered HTML.
- Because these pages already exist, replace or heavily rewrite existing Blade files and seed payloads instead of layering another design on top.

Validation:
- Run get_errors on touched files.
- Seed only the changed pages.
- Clear compiled views.
- Confirm local HTTP 200.
- Confirm no remote AAPSCM URLs in rendered HTML.
- Spot-check local assets and page-specific post-*.css files.

Deliver the work in sensible batches and keep going until the certification category is complete or you hit a real blocker.