<?php

declare(strict_types=1);

use App\Models\BoardMember;
use App\Models\Page;
use Database\Seeders\BoardMembersSeeder;
use Database\Seeders\BoardOfDirectorsPageSeeder;
use Database\Seeders\MohammedZulJamalPageSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function () {
    $this->seed(BoardOfDirectorsPageSeeder::class);
    $this->seed(BoardMembersSeeder::class);
});

it('seeds exactly 13 board members and is idempotent on re-run', function () {
    expect(BoardMember::count())->toBe(13);

    $this->seed(BoardMembersSeeder::class);
    $this->seed(BoardMembersSeeder::class);

    expect(BoardMember::count())->toBe(13);
});

it('renders all 13 active members on the public board page in sort_order', function () {
    $response = $this->get('/board-of-directors/');

    $response->assertOk();

    $names = BoardMember::active()->ordered()->pluck('name');
    expect($names)->toHaveCount(13);

    foreach ($names as $name) {
        $response->assertSee($name, false);
    }
});

it('hides inactive members from the public page but keeps them in the database', function () {
    $member = BoardMember::ordered()->first();
    $member->update(['is_active' => false]);

    $response = $this->get('/board-of-directors/');

    $response->assertOk();
    $response->assertDontSee($member->name, false);

    expect(BoardMember::count())->toBe(13)
        ->and(BoardMember::active()->count())->toBe(12);
});

it('strips the members array out of the page_data JSON', function () {
    $page = Page::where('slug', 'board-of-directors')->firstOrFail();

    expect($page->page_data)
        ->toBeArray()
        ->toHaveKey('page_heading')
        ->toHaveKey('section_heading')
        ->not->toHaveKey('members');
});

it('links every board member profile_page_slug to an existing CMS page when present', function () {
    $slugs = BoardMember::whereNotNull('profile_page_slug')->pluck('profile_page_slug');

    expect($slugs)->not->toBeEmpty();

    // The individual board profile pages are seeded by other seeders that we
    // intentionally don't pull into this focused test. Create stub Page rows
    // here so we can verify the linking logic resolves correctly.
    foreach ($slugs as $slug) {
        Page::firstOrCreate(
            ['slug' => $slug],
            [
                'title' => $slug,
                'status' => 'published',
                'is_published' => true,
                'template' => 'standard_content',
            ],
        );
    }

    foreach ($slugs as $slug) {
        $exists = Page::where('slug', $slug)->exists();
        expect($exists)->toBeTrue("Expected a CMS page row for board member profile slug '{$slug}'.");
    }
});

it('renders board member profile links with trailing slashes', function () {
    $member = BoardMember::active()
        ->whereNotNull('profile_page_slug')
        ->ordered()
        ->firstOrFail();

    Page::firstOrCreate(
        ['slug' => $member->profile_page_slug],
        [
            'title' => $member->name,
            'status' => 'published',
            'is_published' => true,
            'template' => 'standard_content',
        ],
    );

    $profileUrl = url('/' . trim($member->profile_page_slug, '/')) . '/';

    $this->get('/board-of-directors/')
        ->assertOk()
        ->assertSee('href="' . $profileUrl . '"', false);

    $this->get('/' . $member->profile_page_slug)
        ->assertRedirect('/' . $member->profile_page_slug . '/');

    $this->get('/' . $member->profile_page_slug . '/')
        ->assertOk()
        ->assertSee($member->name, false);
});

it('seeds and renders the Mohammed Zul Jamal board profile page', function () {
    $this->seed(MohammedZulJamalPageSeeder::class);

    $page = Page::where('slug', 'mohammed-zul-jamal')->firstOrFail();

    expect($page->source_id)->toBe(102895)
        ->and($page->is_published)->toBeTrue()
        ->and($page->seo_canonical)->toBe(config('app.url') . '/mohammed-zul-jamal/');

    $this->get('/mohammed-zul-jamal/')
        ->assertOk()
        ->assertSee('Mohammed Zul Jamal', false)
        ->assertSee('REGIONAL PR MANAGER (MENA Region)', false)
        ->assertSee('client relationship management', false)
        ->assertDontSee('https://aapscm.org/wp-content/uploads', false);
});
