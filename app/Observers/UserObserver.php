<?php

declare(strict_types=1);

namespace App\Observers;

use App\Models\Order;
use App\Models\User;

/**
 * When a new user registers, attach any prior guest orders that were placed
 * with the same billing email and have not yet been linked to a user.
 *
 * Safe / minimal: only updates orphan orders (user_id IS NULL). Existing
 * user assignments are never overwritten. Email match is case-insensitive
 * via the column collation (utf8mb4_unicode_ci is the project default).
 */
class UserObserver
{
    public function created(User $user): void
    {
        if ($user->email === null || $user->email === '') {
            return;
        }

        Order::query()
            ->whereNull('user_id')
            ->where('billing_email', $user->email)
            ->update(['user_id' => $user->id]);
    }
}
