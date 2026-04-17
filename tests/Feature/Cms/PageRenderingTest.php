<?php

declare(strict_types=1);

use App\Models\Page;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

// ─────────────────────────────────────────────────────────────────────────────
// B. Page Rendering
// ─────────────────────────────────────────────────────────────────────────────

it('PageController returns a view (not JSON or exception)', function () {
    Page::factory()->create(['slug' => 'about-us', 'is_published' => true]);

    $this->get('/about-us/')
        ->assertStatus(200)
        ->assertViewIs('cms.page.wp-content');
});

it('selects the default template for template=default', function () {
    Page::factory()->withTemplate('default')->create(['slug' => 'test-default', 'is_published' => true]);

    $this->get('/test-default/')->assertViewIs('cms.page.default');
});

it('selects the full-width template for template=full-width', function () {
    Page::factory()->withTemplate('full-width')->create(['slug' => 'test-full', 'is_published' => true]);

    $this->get('/test-full/')->assertViewIs('cms.page.full-width');
});

it('selects the sidebar template for template=sidebar', function () {
    Page::factory()->withTemplate('sidebar')->create(['slug' => 'test-sidebar', 'is_published' => true]);

    $this->get('/test-sidebar/')->assertViewIs('cms.page.sidebar');
});

it('selects the landing template for template=landing', function () {
    Page::factory()->withTemplate('landing')->create(['slug' => 'test-landing', 'is_published' => true]);

    $this->get('/test-landing/')->assertViewIs('cms.page.landing');
});

it('falls back to default template when template value is unrecognised', function () {
    Page::factory()->create([
        'slug' => 'test-unknown-template',
        'is_published' => true,
        'template' => 'nonexistent-template',
    ]);

    $this->get('/test-unknown-template/')->assertViewIs('cms.page.default');
});

it('renders page HTML content unescaped', function () {
    Page::factory()->create([
        'slug' => 'html-content-page',
        'is_published' => true,
        'content' => '<p class="intro">Hello <strong>World</strong></p>',
    ]);

    $this->get('/html-content-page/')
        ->assertStatus(200)
        ->assertSee('<p class="intro">Hello <strong>World</strong></p>', false);
});

it('does not double-escape HTML entities in content', function () {
    Page::factory()->create([
        'slug' => 'no-escape-page',
        'is_published' => true,
        'content' => '<h2>Test &amp; Verify</h2>',
    ]);

    $this->get('/no-escape-page/')
        ->assertDontSee('&amp;amp;', false);
});

it('loads a board member profile page that has a parent_id set', function () {
    $parent = Page::factory()->create([
        'slug' => 'board-of-directors',
        'is_published' => true,
        'parent_id' => null,
    ]);

    Page::factory()->create([
        'slug' => 'board-of-directors-john-doe',
        'is_published' => true,
        'parent_id' => $parent->id,
    ]);

    $this->get('/board-of-directors-john-doe/')->assertStatus(200);
});

it('passes the $page variable to the view with correct ID', function () {
    $page = Page::factory()->create([
        'slug' => 'view-var-check',
        'is_published' => true,
        'title' => 'View Variable Test',
    ]);

    $this->get('/view-var-check/')
        ->assertViewHas('page', fn ($p) => $p->id === $page->id);
});

it('renders the 404 error view for a missing slug', function () {
    // Note: assertViewIs() does not work for error responses — Laravel's exception
    // handler copies rendered HTML into a new Response via toIlluminateResponse(),
    // dropping the View reference.  Assert visible content instead.
    $this->get('/totally-missing-slug-xyz/')
        ->assertStatus(404)
        ->assertSee('Page Not Found');
});

it('selects the blocks template for template=blocks', function () {
    Page::factory()->withTemplate('blocks')->create(['slug' => 'test-blocks', 'is_published' => true]);

    $this->get('/test-blocks/')->assertViewIs('cms.page.blocks');
});

it('renders blocks page with no blocks showing fallback message', function () {
    Page::factory()->withTemplate('blocks')->create([
        'slug'    => 'empty-blocks-page',
        'is_published' => true,
        'blocks'  => null,
    ]);

    $this->get('/empty-blocks-page/')
        ->assertStatus(200)
        ->assertSee('no content yet', false);
});

it('renders a hero block on a blocks-template page', function () {
    Page::factory()->withTemplate('blocks')->create([
        'slug'        => 'hero-blocks-page',
        'is_published' => true,
        'blocks'      => [
            [
                'type' => 'hero',
                'data' => [
                    'heading'    => 'Welcome to AAPSCM',
                    'subheading' => 'Leading supply chain certification',
                    'cta_label'  => 'Learn More',
                    'cta_url'    => '/about-us/',
                ],
            ],
        ],
    ]);

    $this->get('/hero-blocks-page/')
        ->assertStatus(200)
        ->assertSee('Welcome to AAPSCM')
        ->assertSee('Learn More');
});

it('renders a rich_text block on a blocks-template page', function () {
    Page::factory()->withTemplate('blocks')->create([
        'slug'        => 'richtext-blocks-page',
        'is_published' => true,
        'blocks'      => [
            [
                'type' => 'rich_text',
                'data' => [
                    'heading' => 'About Our Mission',
                    'content' => '<p>We advance supply chain excellence.</p>',
                ],
            ],
        ],
    ]);

    $this->get('/richtext-blocks-page/')
        ->assertStatus(200)
        ->assertSee('About Our Mission')
        ->assertSee('We advance supply chain excellence.', false);
});
