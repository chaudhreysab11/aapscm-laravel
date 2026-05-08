<?php

declare(strict_types=1);

use App\Filament\Resources\CourseEnrollmentResource;
use App\Filament\Resources\ProductResource;
use App\Filament\Resources\UserMembershipResource;
use App\Filament\Widgets\CommerceOverviewWidget;
use App\Filament\Widgets\IntakeOverviewWidget;
use App\Filament\Widgets\MembershipOperationsWidget;
use App\Models\User;
use Database\Seeders\RoleSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $this->seed(RoleSeeder::class);
});

it('admin users can access the operational admin resources', function (): void {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $this->actingAs($admin)
        ->get('/admin/user-memberships')
        ->assertOk();

    $this->actingAs($admin)
        ->get('/admin/course-enrollments')
        ->assertOk();

    $this->actingAs($admin)
        ->get('/admin/products')
        ->assertOk();
});

it('staff users can access the same operational admin resources', function (): void {
    $staff = User::factory()->create();
    $staff->assignRole('staff');

    $this->actingAs($staff)
        ->get('/admin/user-memberships')
        ->assertOk();

    $this->actingAs($staff)
        ->get('/admin/course-enrollments')
        ->assertOk();

    $this->actingAs($staff)
        ->get('/admin/products')
        ->assertOk();
});

it('member users cannot access the new operational admin resources', function (): void {
    $member = User::factory()->create();
    $member->assignRole('member');

    $this->actingAs($member)
        ->get('/admin/user-memberships')
        ->assertForbidden();

    $this->actingAs($member)
        ->get('/admin/course-enrollments')
        ->assertForbidden();
});

it('admin dashboard renders the custom operational widgets', function (): void {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $this->actingAs($admin)
        ->get('/admin')
        ->assertOk()
        ->assertSee('Commerce Overview')
        ->assertSee('Membership and Access')
        ->assertSee('Recent Intake');
});

it('operational resource and widget classes exist', function (): void {
    expect(class_exists(UserMembershipResource::class))->toBeTrue()
        ->and(class_exists(CourseEnrollmentResource::class))->toBeTrue()
        ->and(class_exists(ProductResource::class))->toBeTrue()
        ->and(class_exists(CommerceOverviewWidget::class))->toBeTrue()
        ->and(class_exists(MembershipOperationsWidget::class))->toBeTrue()
        ->and(class_exists(IntakeOverviewWidget::class))->toBeTrue();
});