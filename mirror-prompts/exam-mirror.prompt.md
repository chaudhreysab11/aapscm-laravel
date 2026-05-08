Convert the exam pages in this Laravel repo from their current implemented state to live WordPress mirrors, while preserving any real exam or verification behavior.

Scope:
- Use public_url_inventory_by_category/public_url_inventory_exam.csv as the source list.
- Work only on rows where route_source=cms-page.

Requirements:
- Keep all current slugs, URLs, and route contracts intact.
- Use the matching https://aapscm.org/<slug>/ page as the visual and content source of truth.
- Prefer the exact-mirror workflow for informational pages when it gives the highest fidelity.
- Preserve live copy, accordions, policy blocks, step flows, CTA sections, and any exam guidance layout.
- Rewrite internal links and assets locally.
- For pages that front important functionality, such as certificate verification or online exam entry points, preserve the Laravel behavior while making the visible page match WordPress as closely as possible.
- Heavy rewrites are allowed if that is what it takes to bring the existing page to live parity.

Validation:
- Check touched files for errors.
- Seed changed pages where applicable.
- Clear views.
- Confirm local HTTP 200.
- Confirm verification/exam entry pages still route correctly after the UI/content rewrite.
- Confirm no remote AAPSCM links/assets remain in rendered HTML.

Work through the full exam category until the rendered pages match the live WordPress content closely without breaking app behavior.