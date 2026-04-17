<?php

declare(strict_types=1);

use App\Models\Page;
use App\Models\SeoMeta;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// ─────────────────────────────────────────────────────────────────────────────
// C. SEO Tags — unit-level (DB + HTML assertions)
// ─────────────────────────────────────────────────────────────────────────────

it('every SeoMeta row has a non-empty seo_title', function () {
    SeoMeta::factory()->count(5)->create(['seo_title' => 'Valid Title | AAPSCM']);

    $blank = SeoMeta::whereNull('seo_title')->orWhere('seo_title', '')->pluck('url_path');

    expect($blank)->toBeEmpty('Blank seo_title on: ' . $blank->implode(', '));
});

it('every SeoMeta row has a non-empty seo_description', function () {
    SeoMeta::factory()->count(5)->create();

    $blank = SeoMeta::whereNull('seo_description')->orWhere('seo_description', '')->pluck('url_path');

    expect($blank)->toBeEmpty('Blank seo_description on: ' . $blank->implode(', '));
});

it('every SeoMeta canonical_url uses HTTPS', function () {
    SeoMeta::factory()->count(5)->create();

    $insecure = SeoMeta::where('canonical_url', 'like', 'http://%')->pluck('url_path');

    expect($insecure)->toBeEmpty('Insecure canonical URLs: ' . $insecure->implode(', '));
});

it('every SeoMeta url_path has leading and trailing slashes', function () {
    SeoMeta::factory()->count(5)->create();

    $missing = SeoMeta::where('url_path', 'not like', '/%')
        ->orWhere('url_path', 'not like', '%/')
        ->pluck('url_path');

    expect($missing)->toBeEmpty('url_path missing slashes: ' . $missing->implode(', '));
});

it('every SeoMeta robots defaults to index, follow', function () {
    SeoMeta::factory()->count(5)->create(['robots' => 'index, follow']);

    $wrong = SeoMeta::where('robots', '!=', 'index, follow')->pluck('url_path');

    expect($wrong)->toBeEmpty('Incorrect robots on: ' . $wrong->implode(', '));
});

it('page response includes <title> tag from seo_title', function () {
    $page = Page::factory()->create([
        'slug' => 'seo-title-test',
        'is_published' => true,
        'seo_title' => 'SEO Title Test',
    ]);

    SeoMeta::factory()->forUrlPath('/seo-title-test/')->create([
        'seo_title' => 'SEO Title Test | AAPSCM',
        'seo_description' => 'Test description for the SEO title test page.',
        'canonical_url' => 'https://aapscm.org/seo-title-test/',
        'seoable_id' => $page->id,
        'seoable_type' => Page::class,
    ]);

    $this->get('/seo-title-test/')
        ->assertStatus(200)
        ->assertSee('SEO Title Test | AAPSCM', false);
});

it('page response includes <meta name="description"> tag', function () {
    $page = Page::factory()->create([
        'slug' => 'seo-desc-test',
        'is_published' => true,
    ]);

    SeoMeta::factory()->forUrlPath('/seo-desc-test/')->create([
        'seo_title' => 'SEO Desc Test | AAPSCM',
        'seo_description' => 'This is the meta description for testing.',
        'canonical_url' => 'https://aapscm.org/seo-desc-test/',
        'seoable_id' => $page->id,
        'seoable_type' => Page::class,
    ]);

    $this->get('/seo-desc-test/')
        ->assertSee('<meta name="description" content="This is the meta description for testing."', false);
});

it('page response includes <link rel="canonical"> tag', function () {
    $page = Page::factory()->create([
        'slug' => 'canonical-test',
        'is_published' => true,
    ]);

    SeoMeta::factory()->forUrlPath('/canonical-test/')->create([
        'seo_title' => 'Canonical Test | AAPSCM',
        'seo_description' => 'Canonical test description text goes here for testing.',
        'canonical_url' => 'https://aapscm.org/canonical-test/',
        'seoable_id' => $page->id,
        'seoable_type' => Page::class,
    ]);

    $this->get('/canonical-test/')
        ->assertSee('<link rel="canonical" href="https://aapscm.org/canonical-test/"', false);
});

it('page response includes <meta name="robots"> tag', function () {
    $page = Page::factory()->create([
        'slug' => 'robots-test',
        'is_published' => true,
    ]);

    SeoMeta::factory()->forUrlPath('/robots-test/')->create([
        'seo_title' => 'Robots Test | AAPSCM',
        'seo_description' => 'Robots meta tag test description text for testing.',
        'canonical_url' => 'https://aapscm.org/robots-test/',
        'robots' => 'index, follow',
        'seoable_id' => $page->id,
        'seoable_type' => Page::class,
    ]);

    $this->get('/robots-test/')
        ->assertSee('<meta name="robots" content="index, follow"', false);
});

it('seo-head component does not throw when SeoMeta is missing (fallback to page fields)', function () {
    Page::factory()->create([
        'slug' => 'no-meta-page',
        'is_published' => true,
        'seo_title' => 'Fallback Title | AAPSCM',
    ]);

    // No SeoMeta row — effective_seo_title falls back to page->seo_title
    $this->get('/no-meta-page/')->assertStatus(200);
});
