<?php

use App\Models\CertificationCatalog;
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

use function Pest\Laravel\get;

/**
 * Tests for the certification detail (show) page.
 */

it('displays the certification title on the show page', function () {
    $cert = CertificationCatalog::factory()->create([
        'is_active' => true,
        'title'     => 'Certified Supply Chain Manager',
        'acronym'   => 'CSCM',
    ]);

    get(route('certifications.show', $cert->slug) . '/')
        ->assertOk()
        ->assertSee('Certified Supply Chain Manager');
});

it('renders the description section when description is present', function () {
    $cert = CertificationCatalog::factory()->create([
        'is_active'   => true,
        'description' => '<p>A comprehensive certification for supply chain professionals.</p>',
    ]);

    get(route('certifications.show', $cert->slug) . '/')
        ->assertSee('Overview')
        ->assertSee('comprehensive certification', false);
});

it('does not render description section when description is null', function () {
    $cert = CertificationCatalog::factory()->create([
        'is_active'   => true,
        'description' => null,
    ]);

    get(route('certifications.show', $cert->slug) . '/')
        // The section h2 has a specific class set; check it doesn't appear
        ->assertDontSee('text-[#1e5c38] mb-4">Overview', false);
});

it('injects the correct canonical URL in the page head', function () {
    $cert = CertificationCatalog::factory()->create(['is_active' => true]);

    get(route('certifications.show', $cert->slug) . '/')
        ->assertSee('rel="canonical"', false)
        ->assertSee('/certification/' . $cert->slug, false);
});

it('renders JSON-LD schema on the show page', function () {
    $cert = CertificationCatalog::factory()->create(['is_active' => true]);

    get(route('certifications.show', $cert->slug) . '/')
        ->assertSee('application/ld+json', false)
        ->assertSee('EducationalOccupationalCredential', false);
});

it('renders exam voucher CTAs when products exist', function () {
    $cert = CertificationCatalog::factory()->create(['is_active' => true]);

    $voucher = Product::factory()->create([
        'type'                    => 'exam_voucher',
        'is_active'               => true,
        'certification_catalog_id' => $cert->id,
        'name'                    => 'CSCM Exam Voucher',
    ]);

    ProductPrice::factory()->create([
        'product_id'         => $voucher->id,
        'membership_tier_id' => null,
        'price'              => 295.00,
    ]);

    get(route('certifications.show', $cert->slug) . '/')
        ->assertSee('Exam Vouchers')
        ->assertSee('CSCM Exam Voucher')
        ->assertSee('295');
});
