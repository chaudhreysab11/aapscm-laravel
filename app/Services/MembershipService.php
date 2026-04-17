<?php

namespace App\Services;

use App\Models\MembershipTier;
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
            'starts_at' => now(),
            'expires_at' => $this->calculateExpiryDate($membership->billing_cycle),
        ]);

        /** @var User $user */
        $user = $membership->user;
        /** @var MembershipTier $tier */
        $tier = $membership->tier;
        $user->syncRoles([$tier->code]);
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
     * Calculate expiry from billing cycle.
     */
    private function calculateExpiryDate(string $billingCycle): Carbon
    {
        return match ($billingCycle) {
            'monthly' => now()->addMonth(),
            default => now()->addYear(),
        };
    }
}
