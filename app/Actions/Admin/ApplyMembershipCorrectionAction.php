<?php

declare(strict_types=1);

namespace App\Actions\Admin;

use App\Models\UserMembership;
use App\Services\MembershipService;
use Carbon\CarbonInterface;
use Illuminate\Database\Eloquent\Model;

class ApplyMembershipCorrectionAction
{
    public function __construct(
        private readonly MembershipService $membershipService,
    ) {}

    public function activate(UserMembership $membership, string $reason, ?Model $actor = null): void
    {
        $before = $this->snapshot($membership);

        $this->membershipService->activateMembership($membership->loadMissing(['user', 'tier']));
        $membership->refresh();

        $this->audit($membership, $actor, 'membership activated by admin correction', 'activate', $reason, $before);
    }

    public function placeInGrace(UserMembership $membership, CarbonInterface $gracePeriodEndsAt, string $reason, ?Model $actor = null): void
    {
        $before = $this->snapshot($membership);

        $membership->update([
            'status' => 'grace',
            'grace_period_ends_at' => $gracePeriodEndsAt,
            'cancelled_at' => null,
            'cancellation_reason' => $reason,
        ]);

        $membership->refresh();

        $this->audit($membership, $actor, 'membership moved to grace by admin correction', 'place_in_grace', $reason, $before);
    }

    public function adjustExpiry(UserMembership $membership, CarbonInterface $expiresAt, string $reason, ?Model $actor = null): void
    {
        $before = $this->snapshot($membership);

        $membership->update([
            'expires_at' => $expiresAt,
        ]);

        $membership->refresh();

        $this->audit($membership, $actor, 'membership expiry adjusted by admin correction', 'adjust_expiry', $reason, $before);
    }

    public function expire(UserMembership $membership, string $reason, ?Model $actor = null): void
    {
        $before = $this->snapshot($membership);

        $this->membershipService->expireMembership($membership->loadMissing(['user', 'tier']));

        $membership->forceFill([
            'cancelled_at' => now(),
            'cancellation_reason' => $reason,
            'grace_period_ends_at' => null,
        ])->save();

        $membership->refresh();

        $this->audit($membership, $actor, 'membership expired by admin correction', 'expire', $reason, $before);
    }

    private function audit(UserMembership $membership, ?Model $actor, string $description, string $correctionType, string $reason, array $before): void
    {
        $logger = activity('admin-corrections')
            ->performedOn($membership)
            ->withProperties([
                'correction_type' => $correctionType,
                'reason' => $reason,
                'before' => $before,
                'after' => $this->snapshot($membership),
            ]);

        if ($actor instanceof Model) {
            $logger = $logger->causedBy($actor);
        }

        $logger->log($description);
    }

    private function snapshot(UserMembership $membership): array
    {
        return [
            'status' => $membership->status,
            'membership_tier_id' => $membership->membership_tier_id,
            'billing_cycle' => $membership->billing_cycle,
            'starts_at' => $membership->starts_at?->toIso8601String(),
            'expires_at' => $membership->expires_at?->toIso8601String(),
            'grace_period_ends_at' => $membership->grace_period_ends_at?->toIso8601String(),
            'cancelled_at' => $membership->cancelled_at?->toIso8601String(),
            'cancellation_reason' => $membership->cancellation_reason,
            'auto_renew' => $membership->auto_renew,
        ];
    }
}