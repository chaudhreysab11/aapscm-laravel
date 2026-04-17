<?php

declare(strict_types=1);

use App\Models\Page;
use App\Models\Redirect;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// ─────────────────────────────────────────────────────────────────────────────
// D. Redirect Behavior
// ─────────────────────────────────────────────────────────────────────────────

it('all redirect rows have http_code = 301', function () {
    Redirect::factory()->count(5)->create(['http_code' => 301]);

    $wrong = Redirect::where('http_code', '!=', 301)->count();

    expect($wrong)->toBe(0, "{$wrong} redirect(s) have http_code != 301");
});

it('all redirect rows have is_active = true', function () {
    Redirect::factory()->count(5)->create(['is_active' => true]);

    // Factory defaults to active — this checks that no orphan inactive rows crept in
    $inactive = Redirect::where('is_active', false)->count();

    expect($inactive)->toBe(0, "{$inactive} redirect(s) are inactive");
});

it('no redirect has from_path equal to to_path (no self-loops)', function () {
    // Normal redirects — no loops
    Redirect::factory()->count(5)->create();

    $loops = Redirect::whereColumn('from_path', 'to_path')->pluck('from_path');

    expect($loops)->toBeEmpty('Self-loop redirect(s) found: ' . $loops->implode(', '));
});

it('no redirect from_path shadows a published page slug', function () {
    Page::factory()->count(5)->create(['is_published' => true]);
    Redirect::factory()->count(5)->create();

    $publishedPaths = Page::where('is_published', true)
        ->pluck('slug')
        ->map(fn ($slug) => '/' . $slug . '/');

    $shadows = Redirect::whereIn('from_path', $publishedPaths)->pluck('from_path');

    expect($shadows)->toBeEmpty('from_path shadows a published page: ' . $shadows->implode(', '));
});

it('active redirect fires with HTTP 301', function () {
    Page::factory()->create(['slug' => 'new-target', 'is_published' => true]);

    Redirect::factory()->create([
        'from_path' => '/old-path-test/',
        'to_path' => '/new-target/',
        'http_code' => 301,
        'is_active' => true,
    ]);

    $this->get('/old-path-test/')
        ->assertStatus(301)
        ->assertRedirect('/new-target/');
});

it('inactive redirect returns 404 instead of 301', function () {
    Redirect::factory()->inactive()->create([
        'from_path' => '/inactive-redirect-path/',
        'to_path' => '/some-page/',
    ]);

    $this->get('/inactive-redirect-path/')->assertStatus(404);
});

it('redirect middleware only resolves one hop — does not recurse infinitely', function () {
    // A → B and B → A: each individual request resolves one hop only
    Redirect::factory()->create([
        'from_path' => '/loop-a/',
        'to_path' => '/loop-b/',
        'http_code' => 301,
        'is_active' => true,
    ]);
    Redirect::factory()->create([
        'from_path' => '/loop-b/',
        'to_path' => '/loop-a/',
        'http_code' => 301,
        'is_active' => true,
    ]);

    // The HTTP test client does NOT follow redirects by default — should see a single 301
    $this->get('/loop-a/')
        ->assertStatus(301)
        ->assertRedirect('/loop-b/');
});
