<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class OrderPolicy
{
    /**
     * Receipt view rules:
     *  - Authenticated owner (matches user_id) ALWAYS allowed.
     *  - Guest with session-bound billing_email matching the order allowed.
     *  - All other access denied (signed URL gate handled by route middleware,
     *    not by this policy).
     */
    public function viewReceipt(?User $user, Order $order): bool
    {
        if ($user !== null && $order->user_id === $user->id) {
            return true;
        }

        $sessionEmail = Session::get('checkout.guest_email');

        return is_string($sessionEmail)
            && $order->billing_email !== null
            && strcasecmp($sessionEmail, $order->billing_email) === 0;
    }
}
