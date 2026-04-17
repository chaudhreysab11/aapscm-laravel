<?php

declare(strict_types=1);

use App\Models\Page;
use App\Models\Redirect;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// ─────────────────────────────────────────────────────────────────────────────
// A. Slug Routing
// ─────────────────────────────────────────────────────────────────────────────

it('resolves a published page slug with trailing slash to 200', function () {
    Page::factory()->create(['slug' => 'about-us', 'is_published' => true]);

    $this->get('/about-us/')->assertStatus(200);
});

it('redirects slug WITHOUT trailing slash to slug WITH trailing slash (301)', function () {
    Page::factory()->create(['slug' => 'about-us', 'is_published' => true]);

    $this->get('/about-us')
        ->assertStatus(301)
        ->assertRedirect('/about-us/');
});

it('returns 404 for a page with is_published = false', function () {
    Page::factory()->draft()->create(['slug' => 'hidden-page']);

    $this->get('/hidden-page/')->assertStatus(404);
});

it('returns 404 for a non-existent slug', function () {
    $this->get('/this-page-does-not-exist-xyz/')->assertStatus(404);
});

it('follows an active 301 redirect from an old slug', function () {
    Page::factory()->create(['slug' => 'certifications-faq', 'is_published' => true]);

    Redirect::factory()->create([
        'from_path' => '/certifications-faq-old/',
        'to_path' => '/certifications-faq/',
        'http_code' => 301,
        'is_active' => true,
    ]);

    // Must request with trailing slash so HandleRedirects fires before EnforceTrailingSlash
    $this->get('/certifications-faq-old/')
        ->assertStatus(301)
        ->assertRedirect('/certifications-faq/');
});

it('does not follow an inactive redirect — returns 404', function () {
    Redirect::factory()->inactive()->create([
        'from_path' => '/inactive-old-path/',
        'to_path' => '/some-page/',
    ]);

    $this->get('/inactive-old-path/')->assertStatus(404);
});

it('has no duplicate slugs among published pages', function () {
    $duplicates = DB::table('pages')
        ->select('slug', DB::raw('COUNT(*) as cnt'))
        ->where('is_published', true)
        ->groupBy('slug')
        ->having('cnt', '>', 1)
        ->pluck('slug');

    expect($duplicates)->toBeEmpty('Duplicate published slugs: ' . $duplicates->implode(', '));
});

it('root URL / returns a non-error response', function () {
    $this->get('/')->assertSuccessful();
});
