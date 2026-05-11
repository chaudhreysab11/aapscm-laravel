<?php

declare(strict_types=1);

use App\Models\Page;
use App\Models\CertificationAwarded;
use App\Models\CertificationCatalog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

uses(RefreshDatabase::class);

it('renders the certificate verification form with a same-origin trailing-slash action', function (): void {
    Page::factory()->published()->create([
        'slug' => 'verify-a-certificate',
        'title' => 'Verify a Certificate',
    ]);

    $this->get('/verify-a-certificate/')
        ->assertOk()
        ->assertSee('action="/verify-a-certificate/"', false)
        ->assertDontSee('localhost:9000/verify-a-certificate', false);
});

it('submits certificate verification without redirecting from the canonical form action', function (): void {
    Page::factory()->published()->create([
        'slug' => 'verify-a-certificate',
        'title' => 'Verify a Certificate',
    ]);

    $this->post('/verify-a-certificate/', [
        'certificate_number' => 'AAPSCM-NOT-FOUND',
    ])
        ->assertOk()
        ->assertSee('No certificate found matching the supplied details.', false);
});

it('filters certificate verification by holder name using the users name column', function (): void {
    Page::factory()->published()->create([
        'slug' => 'verify-a-certificate',
        'title' => 'Verify a Certificate',
    ]);
    $user = User::factory()->create(['name' => 'Bilal Khan']);
    $catalog = CertificationCatalog::factory()->create(['title' => 'Procurement Professional']);

    CertificationAwarded::query()->create([
        'user_id' => $user->id,
        'certification_catalog_id' => $catalog->id,
        'certificate_number' => '12345',
        'verification_token' => Str::random(64),
        'issued_at' => now(),
        'status' => 'active',
    ]);

    $this->post('/verify-a-certificate/', [
        'first_name' => 'Bilal',
        'last_name' => 'Khan',
        'certificate_number' => '12345',
    ])
        ->assertOk()
        ->assertSee('Certificate Verified', false)
        ->assertSee('Bilal Khan', false);
});
