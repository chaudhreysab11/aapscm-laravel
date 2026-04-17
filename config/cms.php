<?php

declare(strict_types=1);

return [
    /**
     * CMS Template Families (TF).
     * Key   = value stored in pages.template
     * Value = label shown in Filament admin
     *
     * View mapping: cms/page/{kebab-case-key}.blade.php
     */
    'templates' => [
        'standard_content'  => 'TF-01 Standard Content',
        'hero_landing'      => 'TF-02 Hero Landing',
        'legal_full_width'  => 'TF-03 Legal / Full Width',
        'sidebar_guide'     => 'TF-04 Sidebar Guide',
        'person_profile'    => 'TF-05 Person Profile',
        'membership_tier'   => 'TF-06 Membership Tier',
        'communities'       => 'TF-07 Communities',
    ],

    /**
     * Block types allowed per template family.
     * Templates not listed here allow all block types.
     */
    'template_blocks' => [
        'standard_content' => ['hero', 'rich_text', 'text_image', 'cards', 'cta_banner', 'two_columns', 'accordion', 'html'],
        'hero_landing'     => ['hero', 'rich_text', 'text_image', 'cards', 'cta_banner', 'two_columns'],
        'legal_full_width' => ['rich_text', 'accordion', 'html'],
        'sidebar_guide'    => ['rich_text', 'accordion', 'html'],
        'membership_tier'  => ['rich_text', 'cards', 'cta_banner', 'accordion'],
        'communities'      => ['rich_text', 'cards', 'cta_banner'],
    ],
];
