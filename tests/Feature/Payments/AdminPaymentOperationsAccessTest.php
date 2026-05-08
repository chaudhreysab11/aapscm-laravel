<?php

declare(strict_types=1);

use App\Filament\Resources\OrderResource;
use App\Filament\Resources\WebhookLogResource;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

it('admin users can access the orders admin resource', function (): void {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $this->actingAs($admin)
        ->get('/admin/orders')
        ->assertOk();
});

it('staff users can access the webhook logs admin resource', function (): void {
    $staff = User::factory()->create();
    $staff->assignRole('staff');

    $this->actingAs($staff)
        ->get('/admin/webhook-logs')
        ->assertOk();
});

it('member users cannot access payment operations resources', function (): void {
    $member = User::factory()->create();
    $member->assignRole('member');

    $this->actingAs($member)
        ->get('/admin/orders')
        ->assertForbidden();

    $this->actingAs($member)
        ->get('/admin/webhook-logs')
        ->assertForbidden();
});

it('payment operation resource classes exist', function (): void {
    expect(class_exists(OrderResource::class))->toBeTrue()
        ->and(class_exists(WebhookLogResource::class))->toBeTrue();
});
