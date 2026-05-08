Bring the public commerce pages in this Laravel repo to live WordPress visual fidelity without breaking the existing Laravel commerce flow.

Scope:
- Use public_url_inventory_by_category/public_url_inventory_commerce.csv as the source list.
- This category currently contains module routes such as cart and checkout, not CMS pages.

Requirements:
- Keep the existing slugs, controllers, checkout flow, pricing logic, cart logic, and Stripe/PayPal integrations intact.
- Use the matching https://aapscm.org/<slug>/ page as the visual/content reference only.
- Mirror visible structure, supporting copy, trust signals, headings, field presentation, summary layout, and CTA treatment as closely as possible without turning the checkout back into WordPress markup.
- Do not port WordPress plugin behavior, shortcodes, or remote scripts.
- Heavy frontend rewrites are allowed if needed, but the root cause fix must preserve Laravel commerce behavior.
- Keep all links/assets local and eliminate remote AAPSCM leakage.

Validation:
- Check touched files for errors.
- Confirm cart and checkout pages return HTTP 200.
- Verify cart totals, checkout rendering, and payment entry points still work after the UI rewrite.
- Confirm no remote AAPSCM assets or URLs remain in rendered HTML.

Treat this as a high-fidelity visual conversion of existing Laravel commerce pages, not a raw WordPress clone.