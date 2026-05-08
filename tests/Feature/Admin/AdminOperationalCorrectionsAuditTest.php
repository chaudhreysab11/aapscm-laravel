<?php

declare(strict_types=1);

use App\Actions\Admin\ApplyCourseEnrollmentCorrectionAction;
use App\Actions\Admin\ApplyMembershipCorrectionAction;
use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\MembershipTier;
use App\Models\User;
use App\Models\UserMembership;
use Database\Seeders\MembershipTiersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;
use Spatie\Activitylog\Models\Activity;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $this->seed(MembershipTiersSeeder::class);
});

it('records membership correction activity when an admin expires a membership', function (): void {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $member = User::factory()->create();
    $member->assignRole('CM');

    $tier = MembershipTier::query()->where('code', 'CM')->firstOrFail();

    $membership = UserMembership::create([
        'user_id' => $member->id,
        'membership_tier_id' => $tier->id,
        'status' => 'active',
        'billing_cycle' => 'annual',
        'starts_at' => now()->subMonths(2),
        'expires_at' => now()->addMonth(),
        'auto_renew' => false,
    ]);

    app(ApplyMembershipCorrectionAction::class)->expire(
        membership: $membership,
        reason: 'Manual expiry after support review',
        actor: $admin,
    );

    $membership->refresh();

    expect($membership->status)->toBe('expired')
        ->and($membership->cancellation_reason)->toBe('Manual expiry after support review')
        ->and($member->fresh()->hasRole('CM'))->toBeFalse();

    $activity = Activity::query()->latest('id')->firstOrFail();
    $properties = $activity->properties->toArray();

    expect($activity->log_name)->toBe('admin-corrections')
        ->and($activity->description)->toBe('membership expired by admin correction')
        ->and($activity->subject_type)->toBe(UserMembership::class)
        ->and($activity->subject_id)->toBe($membership->id)
        ->and((int) $activity->causer_id)->toBe($admin->id)
        ->and(data_get($properties, 'correction_type'))->toBe('expire')
        ->and(data_get($properties, 'reason'))->toBe('Manual expiry after support review');
});

it('records course enrollment correction activity when an admin completes an enrollment', function (): void {
    $admin = User::factory()->create();
    $admin->assignRole('admin');

    $student = User::factory()->create();

    $course = Course::create([
        'title' => 'Admin Correction Test Course',
        'slug' => 'admin-correction-test-course',
        'level' => 'beginner',
        'is_published' => true,
    ]);

    $enrollment = CourseEnrollment::create([
        'user_id' => $student->id,
        'course_id' => $course->id,
        'status' => 'enrolled',
        'enrolled_at' => now()->subWeek(),
    ]);

    $completedAt = Carbon::parse('2026-05-05 12:00:00');

    app(ApplyCourseEnrollmentCorrectionAction::class)->execute(
        enrollment: $enrollment,
        status: 'completed',
        reason: 'Marked complete after manual verification',
        completedAt: $completedAt,
        actor: $admin,
    );

    $enrollment->refresh();

    expect($enrollment->status)->toBe('completed')
        ->and($enrollment->completed_at?->equalTo($completedAt))->toBeTrue()
        ->and($enrollment->cancelled_at)->toBeNull();

    $activity = Activity::query()->latest('id')->firstOrFail();
    $properties = $activity->properties->toArray();

    expect($activity->log_name)->toBe('admin-corrections')
        ->and($activity->description)->toBe('course enrollment corrected by admin')
        ->and($activity->subject_type)->toBe(CourseEnrollment::class)
        ->and($activity->subject_id)->toBe($enrollment->id)
        ->and((int) $activity->causer_id)->toBe($admin->id)
        ->and(data_get($properties, 'correction_type'))->toBe('status_correction')
        ->and(data_get($properties, 'reason'))->toBe('Marked complete after manual verification');
});