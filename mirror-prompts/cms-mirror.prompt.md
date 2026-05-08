Convert the public CMS pages in this Laravel repo from their current implemented state to live WordPress mirrors.

Scope:
- Use public_url_inventory_by_category/public_url_inventory_cms.csv as the source list.
- Only act on rows where route_source=cms-page.
- Ignore module-route asset rows such as Livewire frontend asset endpoints.
- This category includes standard org pages plus template-backed profile pages.

Requirements:
- Keep every existing slug, URL, and route unchanged.
- Use the matching https://aapscm.org/<slug>/ page as the source of truth for visible content and layout.
- For standard CMS pages, use the established exact-mirror workflow when that is the fastest route to parity.
- For template-backed pages such as person_profile pages, preserve any necessary Laravel structure but rewrite the visible rendering so it matches the live page closely.
- Preserve hero imagery, section order, profile layouts, hotline/legal copy, partner/about content, and any page-specific CSS-driven arrangements.
- Rewrite all links and assets to local equivalents and eliminate remote AAPSCM leaks from rendered HTML.
- Because these pages are already implemented, replace existing markup instead of stacking another approximation on top.

Special handling:
- Board member/profile pages may need shared template changes rather than one-off edits.
- Home page should only be included if it appears in scope and if its current implementation can be brought to parity without reintroducing WordPress runtime dependencies.

Validation:
- Check touched files for errors.
- Seed changed CMS pages where applicable.
- Clear views.
- Confirm local HTTP 200 and no remote AAPSCM URL leakage.
- Spot-check several pages with strong visual differences such as profile pages and content-heavy info pages.

Complete the CMS category in pragmatic batches, preferring shared fixes over page-by-page drift.