<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\OrderPaid;
use App\Actions\Course\FulfillPaidCourseOrderAction;

/**
 * Enrol the buyer in any course products bought by a paid order.
 *
 * STUB — wiring only. Business logic is intentionally deferred to the LMS
 * / Course Enrollment module phase.
 */
class EnrollUserInCourseOnOrderPaid
{
    public function __construct(private FulfillPaidCourseOrderAction $fulfillCourseOrder) {}

    public function handle(OrderPaid $event): void
    {
        ($this->fulfillCourseOrder)($event->order);
    }
}
