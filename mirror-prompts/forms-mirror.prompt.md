Bring the public form pages in this Laravel repo to live WordPress visual fidelity while preserving Laravel-side form handling.

Scope:
- Use public_url_inventory_by_category/public_url_inventory_forms.csv as the source list.
- Work only on rows where route_source=cms-page.
- These rows are not flagged as mirror candidates in the inventory because the forms require functional preservation, but they still need live WordPress parity.

Requirements:
- Keep existing slugs, URLs, controllers, validation, and storage behavior intact.
- Use the matching https://aapscm.org/<slug>/ page as the source of truth for visible layout.
- Preserve the visible field set, labels, required markers, option lists, help text, and section ordering exactly unless the live page is clearly broken.
- Heavy Blade changes are allowed. Replace existing form markup if needed, but do not break submission behavior.
- Do not reintroduce WordPress form plugins, reCAPTCHA embeds, or remote form dependencies.
- Rewrite internal links/assets locally and keep all assets in Laravel.

Validation:
- Check touched files for errors.
- Confirm local HTTP 200.
- Submit or at least render-test the forms to verify field names, validation, and success/error handling still work.
- Confirm the visible form matches the live WordPress presentation closely.

Process both form pages completely, prioritizing functional safety and exact visible parity.