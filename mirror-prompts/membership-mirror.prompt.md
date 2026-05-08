Convert the membership pages in this Laravel repo from their current implemented state to live WordPress mirrors, while preserving membership-specific behavior and routes.

Scope:
- Use public_url_inventory_by_category/public_url_inventory_membership.csv as the source list.
- Work only on rows where route_source=cms-page.
- This category includes standard Blade pages plus template-backed tier pages such as fellow_tier and membership_tier entries.

Requirements:
- Keep all existing slugs, URLs, and membership routing unchanged.
- Mirror the visible live WordPress content from the matching https://aapscm.org/<slug>/ page.
- For standard pages, prefer the established exact-mirror seeder plus wrapper pattern when it provides the cleanest path to parity.
- For tier/template-backed pages, preserve the functional Laravel structure if needed, but the visible output must match live WordPress closely. Heavy template changes are allowed if they are the most direct route to parity.
- Preserve membership comparison content, benefit grids, tier copy, CTA language, imagery, and any board/fellowship sections.
- Rewrite links/assets locally and do not leave remote AAPSCM references in rendered HTML.
- Do not change underlying membership logic, pricing logic, auth rules, or policies just to imitate WordPress markup.

Special handling:
- Fellow and tier pages may require deeper changes than simple Blade swaps because they currently use template-driven rendering. Favor root-cause changes over cosmetic patches.

Validation:
- Check errors on touched files.
- Seed changed membership pages where applicable.
- Clear views.
- Confirm local HTTP 200 and local asset loading.
- Verify that membership routes still resolve correctly and that no membership functionality regressed.

Process the full membership category until the pages are visually aligned with live WordPress.