<?php

declare(strict_types=1);

use App\Models\Page;
use App\Models\Redirect;
use App\Models\SeoMeta;
use Database\Seeders\WpCmsPagesImportSeeder;
use Database\Seeders\WpRedirectsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $this->seed(WpCmsPagesImportSeeder::class);
    $this->seed(WpRedirectsSeeder::class);
});

// ─────────────────────────────────────────────────────────────────────────────
// F. Seeded Data Integrity (requires WpCmsPagesImportSeeder + WpRedirectsSeeder)
// ─────────────────────────────────────────────────────────────────────────────

it('has at least 38 published CMS pages', function () {
    $count = Page::where('is_published', true)->count();
    expect($count)->toBeGreaterThanOrEqual(38, "Expected ≥38 published pages; found {$count}");
});

it('has at least 38 SeoMeta rows', function () {
    $count = SeoMeta::count();
    expect($count)->toBeGreaterThanOrEqual(38, "Expected ≥38 SeoMeta rows; found {$count}");
});

it('has at least 51 redirect rows (31 WpRedirectsSeeder + 20 training-virtual)', function () {
    $count = Redirect::count();
    expect($count)->toBeGreaterThanOrEqual(51, "Expected ≥51 redirects; found {$count}");
});

it('all redirects in the DB have http_code = 301', function () {
    $wrong = Redirect::where('http_code', '!=', 301)->pluck('from_path');
    expect($wrong)->toBeEmpty('Non-301 redirects: ' . $wrong->implode(', '));
});

it('all redirects in the DB are active', function () {
    $inactive = Redirect::where('is_active', false)->pluck('from_path');
    expect($inactive)->toBeEmpty('Inactive redirects: ' . $inactive->implode(', '));
});

it('known CMS slugs are present in the seeded database', function () {
    $requiredSlugs = [
        'about-us',
        'contact-us',
        'board-of-directors',
        'certifications-faq',
        'affiliate-partners',
        'member-services',
        'non-profit-activities-donation',
    ];

    foreach ($requiredSlugs as $slug) {
        expect(Page::where('slug', $slug)->where('is_published', true)->exists())
            ->toBeTrue("Expected published page with slug [{$slug}] not found");
    }
});

it('no published page has a blank seo_title in SeoMeta', function () {
    $blank = SeoMeta::whereNull('seo_title')
        ->orWhere('seo_title', '')
        ->pluck('url_path');

    expect($blank)->toBeEmpty('Blank seo_title on: ' . $blank->implode(', '));
});

it('no published page has a blank seo_description in SeoMeta', function () {
    $blank = SeoMeta::whereNull('seo_description')
        ->orWhere('seo_description', '')
        ->pluck('url_path');

    expect($blank)->toBeEmpty('Blank seo_description on: ' . $blank->implode(', '));
});

it('no SeoMeta canonical_url uses HTTP instead of HTTPS', function () {
    $insecure = SeoMeta::where('canonical_url', 'like', 'http://%')->pluck('url_path');
    expect($insecure)->toBeEmpty('Insecure canonical URLs: ' . $insecure->implode(', '));
});

it('all SeoMeta url_path values have leading and trailing slashes', function () {
    $missing = SeoMeta::where(function ($q) {
        $q->where('url_path', 'not like', '/%')
            ->orWhere('url_path', 'not like', '%/');
    })->pluck('url_path');

    expect($missing)->toBeEmpty('url_path missing slashes: ' . $missing->implode(', '));
});

it('all SeoMeta robots are set to index, follow', function () {
    $wrong = SeoMeta::where('robots', '!=', 'index, follow')->pluck('url_path');
    expect($wrong)->toBeEmpty('Incorrect robots values: ' . $wrong->implode(', '));
});

it('no redirect has a self-referential from_path = to_path', function () {
    $loops = Redirect::whereColumn('from_path', 'to_path')->pluck('from_path');
    expect($loops)->toBeEmpty('Redirect self-loops: ' . $loops->implode(', '));
});

it('no redirect from_path matches a live published page slug', function () {
    $publishedPaths = Page::where('is_published', true)
        ->pluck('slug')
        ->map(fn ($slug) => '/' . $slug . '/');

    $shadows = Redirect::whereIn('from_path', $publishedPaths)->pluck('from_path');

    expect($shadows)->toBeEmpty('Redirect shadows live page slug: ' . $shadows->implode(', '));
});

it('seo_title lengths are within 10–80 characters', function () {
    $tooShort = SeoMeta::whereRaw('CHAR_LENGTH(seo_title) < 10')->pluck('url_path');
    $tooLong = SeoMeta::whereRaw('CHAR_LENGTH(seo_title) > 80')->pluck('url_path');

    expect($tooShort)->toBeEmpty('seo_title too short (<10): ' . $tooShort->implode(', '));
    expect($tooLong)->toBeEmpty('seo_title too long (>80): ' . $tooLong->implode(', '));
});

it('seo_description lengths are within 50–165 characters', function () {
    $tooShort = SeoMeta::whereRaw('CHAR_LENGTH(seo_description) < 50')->pluck('url_path');
    $tooLong = SeoMeta::whereRaw('CHAR_LENGTH(seo_description) > 165')->pluck('url_path');

    expect($tooShort)->toBeEmpty('seo_description too short (<50): ' . $tooShort->implode(', '));
    expect($tooLong)->toBeEmpty('seo_description too long (>165): ' . $tooLong->implode(', '));
});
