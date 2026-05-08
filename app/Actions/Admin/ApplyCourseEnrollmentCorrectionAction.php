<?php

declare(strict_types=1);

namespace App\Actions\Admin;

use App\Models\CourseEnrollment;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;

class ApplyCourseEnrollmentCorrectionAction
{
    public function execute(CourseEnrollment $enrollment, string $status, string $reason, ?CarbonInterface $completedAt = null, ?CarbonInterface $cancelledAt = null, ?Model $actor = null): void
    {
        $before = $this->snapshot($enrollment);

        $attributes = [
            'status' => $status,
        ];

        if ($status === 'completed') {
            $attributes['completed_at'] = $completedAt ?? now();
            $attributes['cancelled_at'] = null;
        } elseif ($status === 'cancelled') {
            $attributes['cancelled_at'] = $cancelledAt ?? now();
            $attributes['completed_at'] = null;
        } else {
            $attributes['completed_at'] = null;
            $attributes['cancelled_at'] = null;
        }

        $enrollment->update($attributes);
        $enrollment->refresh();

        $logger = activity('admin-corrections')
            ->performedOn($enrollment)
            ->withProperties([
                'correction_type' => 'status_correction',
                'reason' => $reason,
                'before' => $before,
                'after' => $this->snapshot($enrollment),
            ]);

        if ($actor instanceof Model) {
            $logger = $logger->causedBy($actor);
        }

        $logger->log('course enrollment corrected by admin');
    }

    private function snapshot(CourseEnrollment $enrollment): array
    {
        return [
            'status' => $enrollment->status,
            'enrolled_at' => $enrollment->enrolled_at?->toIso8601String(),
            'completed_at' => $enrollment->completed_at?->toIso8601String(),
            'cancelled_at' => $enrollment->cancelled_at?->toIso8601String(),
        ];
    }
}