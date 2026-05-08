Convert the career-center pages in this Laravel repo from their current implemented state to live WordPress mirrors, while preserving any working form or listing behavior.

Scope:
- Use public_url_inventory_by_category/public_url_inventory_career-center.csv as the source list.
- Work only on rows where route_source=cms-page.

Requirements:
- Keep all existing slugs, URLs, and route behavior unchanged.
- Use the matching https://aapscm.org/<slug>/ live page as the source of truth.
- Bring each page to live WordPress fidelity for visible content, section order, headings, CTAs, supporting text, and imagery.
- Where a page includes job forms or resume submission UI, preserve the Laravel submission behavior but match the visible WordPress layout and field presentation as closely as possible.
- Reuse the exact-mirror pattern when it is suitable, but do not force a raw mirror if it would damage working career-center interactions.
- Rewrite all internal links/assets locally and eliminate remote AAPSCM references.

Validation:
- Check touched files for errors.
- Seed changed pages where applicable.
- Clear views.
- Confirm local HTTP 200.
- Verify any working listing or form interactions still load after the visual rewrite.
- Confirm no remote AAPSCM URLs remain in rendered HTML.

Finish the category end-to-end rather than stopping at visual-only partial work.