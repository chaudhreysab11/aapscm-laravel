<?php

declare(strict_types=1);

/**
 * Page slug -> Product slug map for the Commerce Data Alignment phase.
 *
 * Single source of truth consumed by the Frontend Agent in Task C
 * to wire the <x-add-to-cart-button> component into the matching
 * CMS pages. Do NOT hardcode product slugs in page seeders or views;
 * read from this file instead.
 *
 * Scope: only the 3 unconditional confirmed rows from Task A.
 * Fellow variants and cert/training SKUs are intentionally omitted
 * until their respective open questions are resolved.
 *
 * Format: [page_slug => product_slug]
 *
 * @see database/seeders/CommerceConfirmedProductsSeeder.php
 * @see database/docs/wp-commerce-mapping.md
 */

return [
    'professional-membership' => 'professional-membership',
    'corporate-membership' => 'corporate-membership',
    'professional-membership-renewal' => 'professional-membership-renewal',
];
