Clean up corrupt internal URLs on mirrored certification and training pages by reusing the trusted Laravel URLs from the older non-mirror implementations in this repo.

Objective:
- Find corrupt or malformed internal URLs now present inside exact-mirror certification/training pages.
- Recover the correct internal URLs from the old implemented Laravel files that existed before the mirror conversion.
- Apply those trusted URLs back into the mirrored pages so I do not have to fix each link manually.

Primary source of truth:
- Start with [implemented_url_inventory.csv](implemented_url_inventory.csv).
- Use it to identify certification and training pages where `mirror_status=non-mirror` and the `current_renderer` points to an older Blade implementation.
- Treat those older Laravel implementations as the preferred source for internal certification/training destination URLs when the newer mirrored output contains corrupt links.

Current mirror surfaces to inspect:
- [app/Http/Controllers/CmsPageController.php](app/Http/Controllers/CmsPageController.php) for current slug-to-view mappings.
- Exact-mirror wrappers under [resources/views/cms/page](resources/views/cms/page) that render through `training-exact-mirror`, `certification-exact-mirror`, or other exact-mirror wrappers.
- Current mirror seeders and payloads under [database/seeders](database/seeders) and [database/seeders/data](database/seeders/data).
- Shared exact-mirror renderer at [resources/views/components/cms/exact-mirror-page.blade.php](resources/views/components/cms/exact-mirror-page.blade.php) only if a shared fix is truly required.

Old implementation surfaces to mine for trusted URLs:
- Category/list pages such as old certification and training Blade files under [resources/views/cms/page](resources/views/cms/page), especially pages like certifications, certifications-for-professionals, procurement-management-certifications, supply-chain-management-certifications, tourism-management-certifications, e-commerce-certifications, workshop-trainings, training-and-credentialing, and similar list/table/card pages.
- Any old partials those pages include.
- Old page-data arrays or seeders that populate card grids, tables, CTA buttons, or category lists.

What to fix:
- Only fix internal AAPSCM certification/training URLs that are malformed, corrupt, duplicated, wrongly encoded, stale, or otherwise broken in the mirrored pages.
- Prefer the existing Laravel-local path already used by the older implementation, for example `/acpp/` instead of a corrupt mirrored variant.
- Preserve public slugs, route structure, SEO behavior, and visible copy.
- Do not switch pages away from the exact-mirror architecture just to repair URLs.
- Do not introduce WordPress runtime dependencies.

Method:
1. Build a mapping of trusted old URLs from the non-mirror certification/training implementations.
2. Find the corresponding mirrored pages now serving the same destinations.
3. Compare all certification/training links in mirrored list/card/table/CTA areas against the trusted old URLs.
4. Replace corrupt mirrored URLs with the trusted Laravel-local URLs.
5. Apply fixes at the narrowest durable source:
   - Prefer page payload data or page-specific mirror seeder transforms.
   - Only use shared renderer logic if the corruption pattern is truly cross-page and rule-based.
6. Keep changes minimal and focused on URL repair.

Validation requirements:
- Run `get_errors` on all touched files.
- Reseed only the affected mirror seeders.
- Run `php artisan view:clear` after reseeding.
- Validate the affected local pages in the browser.
- Confirm that repaired links now point to valid Laravel-local certification/training paths.
- Confirm no corrupt URL variants remain in the touched mirrored pages.
- Summarize exactly which URLs were corrected and which source file supplied the trusted replacement.

Important constraints:
- Do not change working routes or invent new slugs.
- Do not hand-edit large rendered HTML blobs if the same correction can be made in seed data or a targeted transform.
- If multiple old files disagree on a URL, prefer the one that matches the current routed slug in [app/Http/Controllers/CmsPageController.php](app/Http/Controllers/CmsPageController.php) or the existing page slug in the database seeder inventory.
- Keep going in batches until all corrupt certification/training links found in mirrored pages are repaired or you hit a real blocker.
