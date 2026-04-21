# WordPress → Laravel Commerce Mapping

**Status:** Draft for client review.
**Owner:** Migration Agent.
**Read with:** [`products.csv`](wp-commerce-mapping/products.csv), [`memberships.csv`](wp-commerce-mapping/memberships.csv), [`prices.csv`](wp-commerce-mapping/prices.csv).

---

## 1. Purpose

This folder is the **human-confirmable bridge** between the legacy WordPress (WooCommerce + WPEverest membership) commerce data and the new Laravel rebuild's `products`, `product_prices`, and `membership_tiers` tables.

Nothing in this folder is auto-imported. It exists so the client + backend team can sign off on:

- which WP products map to which Laravel products (and which need to be created),
- which WP membership plans map to which of the 13 seeded Laravel `membership_tiers`,
- which prices are confirmed vs. need confirmation,
- which rows are ambiguous and need a decision before we wire "Add to Cart" buttons or implement membership activation.

Once this doc is signed off, the Backend Agent will:

1. Update `ProductSeeder.php` and `MembershipTiersSeeder.php` with the confirmed slugs + prices.
2. Add a `ProductPriceSeeder.php` for member / non-member rows.
3. Only **then** will the Frontend Agent wire `<x-add-to-cart-button :product="…" />` into seeded pages.

---

## 2. Sources used

WordPress side (read-only):

- [`Sitemap Analysis/aapsbthj_wp106.sql`](../../../Sitemap%20Analysis/aapsbthj_wp106.sql) — full WP DB dump (3.31 GB; not opened directly).
- [`Sitemap Analysis/sql_products.csv`](../../../Sitemap%20Analysis/sql_products.csv) — pre-extracted WP `wp_posts` rows where `post_type = 'product'` (210 rows).
- [`Sitemap Analysis/sql_membership.csv`](../../../Sitemap%20Analysis/sql_membership.csv) — WPEverest membership user-meta rows (7 rows; user-side only, not plan-side).
- [`Sitemap Analysis/sql_analysis.txt`](../../../Sitemap%20Analysis/sql_analysis.txt) — totals: 79 users, 210 products, 338 certifications, 40 courses, 427 pages.
- [`Live Pages HTML/*.html`](../../../Live%20Pages%20HTML/) — static HTML capture of the live site. Used as the **price ground truth** for memberships (member-facing copy was the only place actual prices were visible).

Laravel side (read-only):

- [`database/seeders/ProductSeeder.php`](../seeders/ProductSeeder.php) — currently **4 placeholder products** (basic / premium / enterprise / cert-voucher).
- [`database/seeders/MembershipTiersSeeder.php`](../seeders/MembershipTiersSeeder.php) — 13 tiers, no prices yet.
- [`app/Models/Product.php`](../../app/Models/Product.php), [`app/Models/MembershipTier.php`](../../app/Models/MembershipTier.php), [`app/Models/ProductPrice.php`](../../app/Models/ProductPrice.php) — schema reference.

> **The price column is empty for almost every WP row in the CSVs.** The `_price` / `_regular_price` `wp_postmeta` rows were not in the pre-extracted CSV and the 3.31 GB SQL dump was not parsed for this pass. Where a price *is* filled in, it came from the live HTML capture, not the SQL.

---

## 3. How to read the CSVs

Each CSV has a **`status`** column. Values mean:

| status | meaning | what to do |
|---|---|---|
| `matched` | Slug + name + price all align. | Nothing — just sign off. |
| `matched_price_diff` | Slug/name match but price differs (or Laravel price is missing). | Confirm the canonical price. |
| `wp_only` | WP has it, Laravel does not. | Decide: import (most cases), retire, or merge into another row. |
| `laravel_only` | Laravel seeded it but WP has nothing. | Decide: keep (it's new content), or remove. |
| `ambiguous` | Multiple plausible matches, missing data, or the WP row is a duplicate / draft. | Read the `notes` column and answer the open question in §4. |

The `notes` column is freeform — it explains *why* the status is what it is and what the reviewer needs to confirm.

### `products.csv`

214 rows. One row per WP product (210) + 4 Laravel-only placeholder rows. Almost every WP row is `wp_only` because the Laravel seeder currently only contains the 4 placeholders. This is expected — Phase 2 will import the real catalog.

Columns: `wp_post_id, wp_slug, wp_title, wp_price_usd, laravel_product_id, laravel_slug, laravel_name, laravel_price_usd, status, notes`.

### `memberships.csv`

24 rows. Covers:

- 16 WP membership / fellow / renewal / "join" SKUs found in the products dump.
- 8 Laravel-seeded tiers with no WP equivalent (SCM, NPO, GOV, LIFE, HON, ASSOC, AFF, plus FM partial).

The 13 Laravel tiers and 13 distinct WP membership SKUs do **not** line up 1-to-1. See open questions §4.

Columns: `wp_plan_id, wp_slug, wp_title, wp_price_usd, wp_billing_cycle, laravel_tier_id, laravel_slug, laravel_name, laravel_price_usd, laravel_billing_cycle, status, notes`.

### `prices.csv`

73 rows. One row per product **per audience** (`member` or `non_member`).

- 64 rows derived from WP product titles ending in `(Members)` or `(Non-Members)` — these are the 32 cert/course SKUs that already use the dual-pricing pattern in WP. Prices are blank pending the SQL `_price` extract.
- 9 rows for confirmed membership joining-fee prices pulled from the live HTML capture.

Columns: `wp_post_id, wp_slug, audience, wp_price_usd, laravel_product_id, laravel_membership_tier_id, laravel_price_usd, status, notes`.

---

## 4. Open questions / ambiguous rows needing confirmation

These are the questions the client + backend team must answer **before** we seed real data or wire Add-to-Cart buttons. Each item points to the CSV file + the row identifier so a reviewer can jump straight to it.

1. **Product count discrepancy.** The Final Scope brief says **154 products**. The WP dump contains **210** product rows. Confirm whether the extra 56 are: drafts, archived/copy SKUs (one is literally titled `… (Copy)`), or in-scope products that the brief under-counted. *(`products.csv` — every row.)*

2. **Membership plan count discrepancy.** The brief says **13 membership tiers**. WP has **~13 distinct membership-related SKUs** but they don't map 1-to-1 to the 13 Laravel tier codes (`CM, SCM, FM, STU, ACAD, CORP, NPO, GOV, INTL, LIFE, HON, ASSOC, AFF`). For example, WP has 7 *Fellow* sub-variants (Specialist / Professional / Academic / Corporate / Emerging Leader / International / Grand) but Laravel has a single `Fellow Member (FM)` tier. Decision needed: split FM into 7 tiers, or keep FM as one tier with 7 product SKUs underneath? *(`memberships.csv` rows for `*-fellow-membership`.)*

3. **`Professional Membership Fee` has two WP rows** — `4234` (publish, slug `professional-membership-fee-2`) and `19447` (draft, slug `professional-membership-fee`). Confirm `4234` is canonical and `19447` should be ignored. *(`memberships.csv` rows 1–2.)*
   - **RESOLVED 2026-04-19:** `4234` confirmed canonical and implemented as Laravel slug `professional-membership` ($150 USD, public NULL-tier price). `19447` (draft) ignored. See OQ#13 for the separate $10 application-fee gap.

4. **`CHARTERED PROFESSIONAL MEMBERSHIP` (WP id 19453) has no visible price** in the HTML capture. Map to Laravel `Senior Certified Member (SCM)`? Confirm price. *(`memberships.csv` row 3.)*

5. **`Annual Membership Renewal Fee` ($160, WP id 37207)** — is renewal a separate purchasable product, or is it the same SKU as the original membership re-billed annually? This affects whether we keep it in `products` or just rely on `user_memberships.expires_at`. *(`memberships.csv` row 16.)*
   - **RESOLVED 2026-04-19 (provisional, pending client sign-off):** Modelled as a SEPARATE Laravel product (slug `professional-membership-renewal`, $160 USD, public NULL-tier price) to mirror the WP behaviour where the renewal page links to a distinct cart-add SKU (`?add-to-cart=37207`). Auto re-billing via `user_memberships.expires_at` remains out of scope until membership-activation rules in OQ#2 are signed off.

6. **`Renewal and New Certificate Fee` (WP id 36822)** is currently in `memberships.csv` but is actually about certifications, not membership. Move it to `products.csv` once the certification-flow brief is written. *(`memberships.csv` row 17.)*

7. **Member vs Non-Member dual pricing** — every cert / training / on-demand prep SKU exists as two WP products with `(Members)` / `(Non-Members)` suffixes (e.g. WP ids 20279 + 20288 for ACPP On-Demand). In the Laravel schema we should collapse each pair into **one `Product` + two `ProductPrice` rows** (one per audience). Confirm this is the intended modeling before the Backend Agent writes the importer. *(`prices.csv` — every paired row.)*

8. **`AAPSCM® Training Virtual - … (Copy)` (WP id 33877)** is a literal duplicate of WP id 19726. Confirm it can be dropped during import. *(`products.csv` row for slug `…-acpp-copy`.)*

9. **9 chapter SKUs** (`AAPSCM® Chicago, IL Chapter`, Atlanta, Baltimore, Columbia, Spartanburg, Dallas, Rockford, Boston, NYC) are products in WP. Are these paid chapter memberships, free directory entries, or admin-only records? Determines whether they need an Add-to-Cart at all. *(`products.csv` rows for slugs `aapscm-*-chapter`.)*

10. **Exam vouchers vs On-Demand prep.** WP has both `… Preparation Workshop and Exam Fee` SKUs (e.g. id 17818) and `… Authorized On-demand … Exam Prep` SKUs (e.g. ids 20279/20288). Confirm: are these distinct products, or two delivery formats of the same exam? *(`products.csv` rows for slugs `*-preparation-workshop-and-exam-fee` and `*-on-demand-*`.)*

11. **`Become a Fellow Member` (WP id 12326, slug `become-a-fellow-member`)** has no price in either source. Likely a landing/gateway page, not a real product. Confirm whether to import or drop. *(`memberships.csv` row 13.)*

12. **`Membership Service Fee` (WP id 6509)** is a generic admin/processing SKU. Confirm whether to retire it or model it as a manual Filament-only line item. *(`memberships.csv` row 15.)*

13. **$10 application-fee gap on Professional Membership.** *(NEW — surfaced 2026-04-19 during confirmed-subset implementation.)* The WP product price for `professional-membership-fee-2` is **$150**, and that is what was seeded into the Laravel `professional-membership` product. However, the live Professional Membership page copy advertises an **additional $10 application fee** on top of the $150. The seeded product does NOT include this fee. Confirm with the client whether the application fee should be: **(a)** a separate Laravel product / cart line item added alongside `professional-membership`, **(b)** baked into the seeded $150 price (so the product becomes $160), or **(c)** a one-time admin-only charge applied at first signup outside the cart. Until resolved, the cart total for Professional Membership matches the WP product price ($150) but NOT the page copy. *(`memberships.csv` row for source_id 4234.)*

14. **Legacy WooCommerce `?add-to-cart={wp_id}` anchors on non-confirmed pages.** *(NEW — surfaced 2026-04-20 from a real user click on `http://127.0.0.1:8000/checkout/?add-to-cart=24613`.)* Many seeded CMS pages still contain the original WP HTML with anchors of the form `<a href="/checkout/?add-to-cart={wp_post_id}">`. Laravel's `CheckoutController::show()` ignores the `add-to-cart` query string, so every such click currently dead-ends on the cart page with the "Your cart is currently empty" message. Three resolution paths to confirm with the client / Architect: **(a)** add a small Woo-compat shim that reads `?add-to-cart={wp_id}`, looks up `Product::where('source_id', $wp_id)->first()`, adds it to the cart, and redirects to `/cart/` — works only for products that have been seeded into Laravel; **(b)** scrub the legacy anchors out of the seeded page HTML and replace each one with an `<x-add-to-cart-button>` (requires the underlying product to be in the confirmed subset first); **(c)** leave as-is and accept the dead-end UX on non-confirmed pages until each page is wired in its own scoped task. The 3 confirmed-subset pages (`professional-membership`, `corporate-membership`, `professional-membership-renewal`) are NOT affected — they were already swapped to `<x-add-to-cart-button>` in Task C. Concrete example: WP id `24613` is currently `wp_only` in `products.csv` and has no `source_id` in any Laravel `products` row, so even option (a) would not resolve it without first seeding 24613.

---

## 4a. Status update — confirmed subset implemented

The following 3 rows from §4 have been implemented in the Laravel codebase **ahead of full sign-off**, scoped tightly to what the WP HTML evidence + the project brief unambiguously confirmed:

| WP id | Laravel slug | Public price | Source seeders |
|---|---|---|---|
| 4234 | `professional-membership` | $150.00 USD | `CommerceConfirmedProductsSeeder` + `CommerceConfirmedPricesSeeder` |
| 4233 | `corporate-membership` | $3,000.00 USD | `CommerceConfirmedProductsSeeder` + `CommerceConfirmedPricesSeeder` |
| 37207 | `professional-membership-renewal` | $160.00 USD | `CommerceConfirmedProductsSeeder` + `CommerceConfirmedPricesSeeder` |

- These rows are now `matched` in `memberships.csv`, `products.csv`, and `prices.csv`.
- The page-product wiring lives in `database/seeders/data/page-product-map.php` and is consumed by `CmsPageController::resolveCtaProduct()`.
- Add-to-cart → cart → checkout is verified end-to-end by `tests/Feature/Commerce/ConfirmedSubsetEndToEndTest.php` and `tests/Feature/Commerce/PageCtaIntegrationTest.php`.
- Legacy `ProductSeeder.php` was deliberately **not** edited; the confirmed-subset seeders are additive and idempotent.
- All other rows in the CSVs remain `wp_only` / `ambiguous` / `matched_price_diff` and stay blocked on client sign-off per §5.

---

## 5. Next steps for other agents

**Backend Agent — after sign-off:**

- For every `wp_only` row in `products.csv` that the client confirms in-scope, add it to `ProductSeeder.php` (or a new `WpProductsImportSeeder.php`). Preserve `wp_post_id` in the new `source_id` column to keep traceability per the project conventions.
- For every `matched_price_diff` row, set the `price` (and the `product_prices` row) from the confirmed value in this CSV.
- For Fellow sub-variants (open question #2): once the client decides split-vs-flatten, update `MembershipTiersSeeder.php` accordingly.
- Do **not** implement membership activation logic in this phase. The `OrderPaid` listener stubs from Phase 1 stay empty until the membership rules above are confirmed.

**Frontend Agent — blocked until sign-off:**

- Do **not** insert `<x-add-to-cart-button :product="…" />` into any seeded page until the rows in `products.csv` have a real `laravel_slug`. Linking the wrong slug now would route the buyer to a placeholder.

**Migration Agent — follow-up tasks (out of scope for this doc):**

- Order-history mapping (`wp_posts` where `post_type = 'shop_order'`).
- User-membership-assignment mapping (`wp_ur_*` tables → `user_memberships`).
- Media migration for product images.
- WP `_price` / `_regular_price` extraction for the empty cells in this doc — best done with a targeted `grep` over the SQL dump filtered by the WP product IDs already enumerated here.

---

## 6. What is intentionally NOT in this doc

- ❌ Order history mapping — deferred to a separate user-migration phase.
- ❌ User → membership-plan assignment mapping — deferred (depends on the decisions in open question #2).
- ❌ Auto-activation rules — explicitly out of scope; activation stays manual / Filament-driven until §4 is signed off.
- ❌ Coupon / discount code mapping — none observed in the WP exports yet; will be addressed when the exports are extended.
- ❌ Tax / shipping rules — not used by the current AAPSCM commerce flow (digital products only).
