Convert the training pages in this Laravel repo from their current implemented state to exact live WordPress mirrors.

Scope:
- Use public_url_inventory_by_category/public_url_inventory_training.csv as the source list.
- Work only on rows where route_source=cms-page.
- Rows already marked exact-mirror should be validated first and only adjusted if the rendered result still drifts from live WordPress.
- Rows marked non-mirror should be converted fully to the repo's exact-mirror pattern.

Requirements:
- Keep all existing slugs and training URLs exactly as implemented.
- Use the matching https://aapscm.org/<slug>/ live page as the fidelity source.
- Reuse the repo’s established Elementor mirror flow: generate payloads with scripts/generate_elementor_mirror_page.php, preserve page-specific post-<page-id>.css, seed through ExactMirrorPageSeeder, use thin wrapper views, and keep CmsPageController slug mappings aligned.
- Preserve live tabs, accordions, CTA sections, course-format blocks, hero imagery, email styling, image/text placement, and any hidden or responsive-only sections.
- Do not simplify sections into generic Laravel components if the live page is more specific. Fidelity is the goal.
- Download every live page asset needed for the visible body and rewrite all internal links/assets locally.
- Since the pages already exist, heavy rewrites are expected. Replace existing Blade approximations when they block parity.

Validation:
- Check touched files for errors.
- Seed changed training pages.
- Clear views.
- Confirm local HTTP 200 and no remote AAPSCM URL leakage.
- Compare a few rendered pages against live WordPress for tab behavior, CTA fidelity, and asset loading.

Work through the category in batches until the training pages are at live WordPress mirror fidelity.