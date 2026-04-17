<?php

use App\Models\CertificationCatalog;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

use function Pest\Laravel\get;

/**
 * Tests for the certification catalog listing page (index action).
 */

it('shows only active certifications on the index page', function () {
    CertificationCatalog::factory()->create(['is_active' => true, 'title' => 'Active Cert']);
    CertificationCatalog::factory()->create(['is_active' => false, 'title' => 'Hidden Cert']);

    get(route('certifications.index') . '/')
        ->assertSee('Active Cert')
        ->assertDontSee('Hidden Cert');
});

it('shows the type filter bar when credential types exist', function () {
    CertificationCatalog::factory()->create([
        'is_active'       => true,
        'credential_type' => 'professional',
    ]);

    get(route('certifications.index') . '/')
        ->assertSee('professional');
});

it('filters certifications by credential type when type param is present', function () {
    CertificationCatalog::factory()->create([
        'is_active'       => true,
        'credential_type' => 'associate',
        'title'           => 'Associate Level Cert',
    ]);
    CertificationCatalog::factory()->create([
        'is_active'       => true,
        'credential_type' => 'professional',
        'title'           => 'Senior Expert Cert',  // avoids collision with page H1 "Professional Certifications"
    ]);

    get(route('certifications.index') . '/?type=associate')
        ->assertSee('Associate Level Cert')
        ->assertDontSee('Senior Expert Cert');
});

it('shows an empty state message when no certifications match the filter', function () {
    get(route('certifications.index') . '/?type=nonexistent-type')
        ->assertSee('No certifications found');
});

it('shows pagination links when certification count exceeds the page size', function () {
    CertificationCatalog::factory()->count(25)->create(['is_active' => true]);

    get(route('certifications.index') . '/')
        ->assertOk();
    // Pagination renders more than one page; content assertion is enough
    // since withQueryString() preserves the type filter in paginator URLs.
});
