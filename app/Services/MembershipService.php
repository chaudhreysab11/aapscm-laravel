<?php

namespace App\Services;

use App\Models\MembershipTier;
use App\Models\Order;
use App\Models\User;
use App\Models\UserMembership;
use Carbon\Carbon;

class MembershipService
{
    /**
     * Determine the correct price for a tier given billing cycle.
     */
    public function getPriceForTier(MembershipTier $tier, string $billingCycle = 'annual'): string
    {
        if ($billingCycle === 'monthly' && $tier->monthly_price !== null) {
            return number_format((float) $tier->monthly_price, 2, '.', '');
        }

        return number_format((float) $tier->annual_price, 2, '.', '');
    }

    /**
     * Check if a user has an active membership of any tier.
     */
    public function userHasActiveMembership(User $user): bool
    {
        return $user->memberships()
            ->where('status', 'active')
            ->where('expires_at', '>', now())
            ->exists();
    }

    /**
     * Return the user's active membership, or null.
     */
    public function getActiveMembership(User $user): ?UserMembership
    {
        /** @var UserMembership|null */
        return $user->memberships()
            ->with('tier')
            ->where('status', 'active')
            ->where('expires_at', '>', now())
            ->latest('starts_at')
            ->first();
    }

    /**
     * Activate a pending membership after successful payment.
     */
    public function activateMembership(UserMembership $membership): void
    {
        $membership->update([
            'status' => 'active',
            'starts_at' => $membership->starts_at ?? now(),
            'expires_at' => $this->calculateExpiryDateFrom(now(), $membership->billing_cycle),
            'cancelled_at' => null,
            'cancellation_reason' => null,
            'grace_period_ends_at' => null,
        ]);

        /** @var User $user */
        $user = $membership->user;
        /** @var MembershipTier $tier */
        $tier = $membership->tier;
        $this->syncMembershipRole($user, $tier);
    }

    /**
     * Mark a membership expired and remove the tier role.
     */
    public function expireMembership(UserMembership $membership): void
    {
        $membership->update(['status' => 'expired']);
        /** @var User $user */
        $user = $membership->user;
        /** @var MembershipTier $tier */
        $tier = $membership->tier;
        $user->removeRole($tier->code);
    }

    /**
     * Create, activate, or extend a paid membership without duplicating rows
     * when the same paid order is observed more than once.
     */
    public function fulfillPaidMembership(User $user, MembershipTier $tier, Order $order, string $billingCycle = 'annual'): UserMembership
    {
        $existingForOrder = UserMembership::query()
            ->where('user_id', $user->id)
            ->where('order_id', $order->id)
            ->where('membership_tier_id', $tier->id)
            ->first();

        if ($existingForOrder instanceof UserMembership) {
            if (! $existingForOrder->isActive()) {
                $this->activateMembership($existingForOrder);
                $existingForOrder->refresh();
            } else {
                $this->syncMembershipRole($user, $tier);
            }

            return $existingForOrder;
        }

        $currentForTier = UserMembership::query()
            ->where('user_id', $user->id)
            ->where('membership_tier_id', $tier->id)
            ->whereIn('status', ['pending', 'active', 'grace'])
            ->latest('expires_at')
            ->latest('id')
            ->first();

        if ($currentForTier instanceof UserMembership) {
            $this->renewMembership($currentForTier, $order, $billingCycle);

            return $currentForTier->fresh() ?? $currentForTier;
        }

        $this->expireConflictingMemberships($user, $tier->id);

        $startsAt = now();

        $membership = UserMembership::create([
            'user_id' => $user->id,
            'membership_tier_id' => $tier->id,
            'order_id' => $order->id,
            'status' => 'pending',
            'billing_cycle' => $billingCycle,
            'starts_at' => $startsAt,
            'expires_at' => $this->calculateExpiryDateFrom($startsAt, $billingCycle),
            'auto_renew' => false,
        ]);

        $this->activateMembership($membership);

        return $membership->fresh() ?? $membership;
    }

    public function fulfillPaidRenewal(User $user, MembershipTier $tier, Order $order, string $billingCycle = 'annual'): UserMembership
    {
        $existingForOrder = UserMembership::query()
            ->where('user_id', $user->id)
            ->where('order_id', $order->id)
            ->where('membership_tier_id', $tier->id)
            ->first();

        if ($existingForOrder instanceof UserMembership) {
            if (! $existingForOrder->isActive()) {
                $this->renewMembership($existingForOrder, $order, $billingCycle);
                $existingForOrder->refresh();
            } else {
                $this->syncMembershipRole($user, $tier);
            }

            return $existingForOrder;
        }

        $membership = UserMembership::query()
            ->where('user_id', $user->id)
            ->where('membership_tier_id', $tier->id)
            ->latest('expires_at')
            ->latest('id')
            ->first();

        if ($membership instanceof UserMembership) {
            $this->renewMembership($membership, $order, $billingCycle);

            return $membership->fresh() ?? $membership;
        }

        return $this->fulfillPaidMembership($user, $tier, $order, $billingCycle);
    }

    public function renewMembership(UserMembership $membership, Order $order, ?string $billingCycle = null): void
    {
        $cycle = $billingCycle ?? $membership->billing_cycle ?: 'annual';
        $isActiveRenewal = $membership->expires_at !== null && $membership->expires_at->isFuture()
            && in_array($membership->status, ['active', 'grace'], true);

        $baseDate = $isActiveRenewal
            ? $membership->expires_at->copy()
            : now();

        $membership->update([
            'order_id' => $order->id,
            'status' => 'active',
            'billing_cycle' => $cycle,
            'starts_at' => $isActiveRenewal
                ? ($membership->starts_at ?? now())
                : now(),
            'expires_at' => $this->calculateExpiryDateFrom($baseDate, $cycle),
            'cancelled_at' => null,
            'cancellation_reason' => null,
            'grace_period_ends_at' => null,
        ]);

        /** @var User $user */
        $user = $membership->user;
        /** @var MembershipTier $tier */
        $tier = $membership->tier;
        $this->syncMembershipRole($user, $tier);
    }

    /**
     * Calculate expiry from billing cycle.
     */
    private function calculateExpiryDateFrom(Carbon $from, string $billingCycle): Carbon
    {
        return match ($billingCycle) {
            'monthly' => $from->copy()->addMonth(),
            default => $from->copy()->addYear(),
        };
    }

    private function expireConflictingMemberships(User $user, int $keepTierId): void
    {
        $user->memberships()
            ->with('tier', 'user')
            ->where('membership_tier_id', '!=', $keepTierId)
            ->whereIn('status', ['active', 'grace'])
            ->get()
            ->each(function (UserMembership $membership): void {
                $this->expireMembership($membership);
            });
    }

    private function syncMembershipRole(User $user, MembershipTier $tier): void
    {
        $membershipRoleCodes = MembershipTier::query()->pluck('code')->all();
        $preservedRoles = $user->roles()
            ->whereNotIn('name', $membershipRoleCodes)
            ->pluck('name')
            ->all();

        $user->syncRoles(array_values(array_unique([...$preservedRoles, $tier->code])));
    }
}
