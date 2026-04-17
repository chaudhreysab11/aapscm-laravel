<?php

use App\Models\CertificationCatalog;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

/**
 * Tests for the CertificationCatalog model — scopes, casts, and factory.
 */

it('scopeActive only returns active, non-deleted certifications', function () {
    CertificationCatalog::factory()->create(['is_active' => true]);
    CertificationCatalog::factory()->create(['is_active' => false]);
    $deleted = CertificationCatalog::factory()->create(['is_active' => true]);
    $deleted->delete();

    $results = CertificationCatalog::active()->get();

    expect($results)->toHaveCount(1);
    expect($results->first()->is_active)->toBeTrue();
});

it('scopeOrdered sorts by sort_order ascending then title', function () {
    CertificationCatalog::factory()->create(['sort_order' => 10, 'title' => 'Z Cert', 'is_active' => true]);
    CertificationCatalog::factory()->create(['sort_order' => 1, 'title' => 'A Cert', 'is_active' => true]);

    $results = CertificationCatalog::ordered()->get();

    expect($results->first()->title)->toBe('A Cert');
});

it('scopeByCredentialType filters by type', function () {
    CertificationCatalog::factory()->create(['credential_type' => 'associate', 'is_active' => true]);
    CertificationCatalog::factory()->create(['credential_type' => 'professional', 'is_active' => true]);

    $results = CertificationCatalog::byCredentialType('associate')->get();

    expect($results)->toHaveCount(1);
    expect($results->first()->credential_type)->toBe('associate');
});
