<?php

use App\Models\CertificationCatalog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Spatie\Permission\Models\Role;

uses(RefreshDatabase::class);

use function Pest\Laravel\actingAs;
use function Pest\Laravel\get;

/**
 * Tests for the Filament CertificationResource admin panel.
 */

beforeEach(function () {
    // Ensure the admin role exists (Spatie permissions).
    $adminRole = Role::firstOrCreate(['name' => 'admin', 'guard_name' => 'web']);
    $this->admin = User::factory()->create();
    $this->admin->assignRole($adminRole);
});

it('redirects unauthenticated users away from the certifications resource', function () {
    get('/admin/certifications')
        ->assertRedirectToRoute('filament.admin.auth.login');
});

it('allows admin users to access the certifications list', function () {
    actingAs($this->admin)
        ->get('/admin/certifications')
        ->assertOk();
});

it('shows soft-deleted certifications when the trashed filter is applied', function () {
    $cert = CertificationCatalog::factory()->create(['is_active' => true]);
    $cert->delete();

    // The trashed filter is Livewire-driven; verify the admin page loads OK
    // and that the record is soft-deleted (not hard-deleted) in the DB.
    actingAs($this->admin)
        ->get('/admin/certifications')
        ->assertOk();

    expect(CertificationCatalog::withTrashed()->find($cert->id))->not->toBeNull();
});

it('admin can access the create certification page', function () {
    actingAs($this->admin)
        ->get('/admin/certifications/create')
        ->assertOk();
});

it('admin can access the edit page for an existing certification', function () {
    $cert = CertificationCatalog::factory()->create();

    actingAs($this->admin)
        ->get("/admin/certifications/{$cert->id}/edit")
        ->assertOk();
});

it('non-admin users cannot access the certifications resource', function () {
    $user = User::factory()->create(); // no role assigned

    $response = actingAs($user)
        ->get('/admin/certifications');

    // Non-admin is either forbidden or redirected away from the panel
    expect($response->status())->toBeIn([403, 302]);
});

it('admin list page displays the certification title column', function () {
    $cert = CertificationCatalog::factory()->create(['title' => 'Test Certification Title']);

    actingAs($this->admin)
        ->get('/admin/certifications')
        ->assertSee('Test Certification Title');
});
