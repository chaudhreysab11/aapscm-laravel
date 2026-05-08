<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\OrderPaid;
use App\Actions\Membership\FulfillPaidMembershipOrderAction;

/**
 * Activate (or extend) a user membership when an order containing a
 * 'membership' product line item is paid.
 *
 * STUB — wiring only. Business logic is intentionally deferred to the
 * Membership module phase.
 */
class ActivateMembershipOnOrderPaid
{
    public function __construct(private FulfillPaidMembershipOrderAction $fulfillMembershipOrder) {}

    public function handle(OrderPaid $event): void
    {
        ($this->fulfillMembershipOrder)($event->order);
    }
}
