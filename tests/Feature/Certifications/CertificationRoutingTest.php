<?php

use App\Models\CertificationCatalog;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

use function Pest\Laravel\get;

/**
 * Tests that public routes resolve correctly and apply route model binding rules.
 */

it('renders the certification index page', function () {
    get(route('certifications.index') . '/')
        ->assertOk()
        ->assertSee('Professional Certifications');
});

it('renders a 200 for an active certification show page', function () {
    $cert = CertificationCatalog::factory()->create([
        'is_active'  => true,
        'deleted_at' => null,
    ]);

    get(route('certifications.show', $cert->slug) . '/')
        ->assertOk();
});

it('returns 404 for an inactive certification', function () {
    $cert = CertificationCatalog::factory()->create(['is_active' => false]);

    get(route('certifications.show', $cert->slug))
        ->assertNotFound();
});

it('returns 404 for a soft-deleted certification', function () {
    $cert = CertificationCatalog::factory()->create(['is_active' => true]);
    $cert->delete();

    get(route('certifications.show', $cert->slug))
        ->assertNotFound();
});

it('returns 404 for a non-existent slug', function () {
    get(route('certifications.show', 'does-not-exist'))
        ->assertNotFound();
});

it('certifications index has the named route certifications.index', function () {
    expect(route('certifications.index'))->toContain('/certifications-for-professionals');
});

it('certifications show has the named route certifications.show', function () {
    $cert = CertificationCatalog::factory()->create(['is_active' => true]);

    expect(route('certifications.show', $cert->slug))
        ->toContain('/certification/' . $cert->slug);
});

it('the index route accepts a type query parameter without error', function () {
    CertificationCatalog::factory()->create([
        'is_active'       => true,
        'credential_type' => 'professional',
    ]);

    get(route('certifications.index') . '/?type=professional')
        ->assertOk();
});
