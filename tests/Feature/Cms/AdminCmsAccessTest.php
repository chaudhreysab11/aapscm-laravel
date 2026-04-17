<?php

declare(strict_types=1);

use App\Filament\Resources\PageResource;
use App\Filament\Resources\RedirectResource;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

// ─────────────────────────────────────────────────────────────────────────────
// E. Admin Panel — Access Control
// ─────────────────────────────────────────────────────────────────────────────

it('admin panel redirects unauthenticated guest to login', function () {
    $this->get('/admin/pages')->assertRedirect();
});

it('admin panel pages list is accessible to admin-role users', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $this->actingAs($admin)
        ->get('/admin/pages')
        ->assertStatus(200);
});

it('admin panel redirects list is accessible to admin-role users', function () {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $this->actingAs($admin)
        ->get('/admin/redirects')
        ->assertStatus(200);
});

it('admin panel pages list is accessible to staff-role users', function () {
    $staff = User::factory()->create();
    $staff->assignRole('staff');

    $this->actingAs($staff)
        ->get('/admin/pages')
        ->assertStatus(200);
});

it('admin panel denies access to member-role users', function () {
    $member = User::factory()->create();
    $member->assignRole('member');

    $this->actingAs($member)
        ->get('/admin/pages')
        ->assertStatus(403);
});

it('admin panel denies access to subscriber-role users', function () {
    $subscriber = User::factory()->create();
    $subscriber->assignRole('subscriber');

    $this->actingAs($subscriber)
        ->get('/admin/pages')
        ->assertStatus(403);
});

it('PageResource class exists', function () {
    expect(class_exists(PageResource::class))->toBeTrue();
});

it('RedirectResource class exists', function () {
    expect(class_exists(RedirectResource::class))->toBeTrue();
});
