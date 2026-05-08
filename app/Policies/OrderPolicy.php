<?php

declare(strict_types=1);

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class OrderPolicy
{
    public function viewPayment(?User $user, Order $order): bool
    {
        return $this->buyerMatchesOrder($user, $order) || $this->isAdminReviewer($user);
    }

    /**
     * Receipt view rules:
     *  - Authenticated owner (matches user_id) ALWAYS allowed.
     *  - Guest with session-bound billing_email matching the order allowed.
     */
    public function viewReceipt(?User $user, Order $order): bool
    {
        return $this->buyerMatchesOrder($user, $order) || $this->isAdminReviewer($user);
    }

    private function isAdminReviewer(?User $user): bool
    {
        return $user !== null && $user->hasRole(['admin', 'staff']);
    }

    private function buyerMatchesOrder(?User $user, Order $order): bool
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
