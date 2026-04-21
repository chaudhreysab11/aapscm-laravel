<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\OrderPaid;

/**
 * Activate (or extend) a user membership when an order containing a
 * 'membership' product line item is paid.
 *
 * STUB — wiring only. Business logic is intentionally deferred to the
 * Membership module phase.
 */
class ActivateMembershipOnOrderPaid
{
    public function handle(OrderPaid $event): void
    {
        // TODO: inspect $event->order->items where item_type = 'membership'
        // and create/extend a UserMembership row via MembershipService.
    }
}
