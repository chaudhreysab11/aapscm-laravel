<?php

declare(strict_types=1);

namespace App\Listeners;

use App\Events\OrderPaid;

/**
 * Enrol the buyer in any course products bought by a paid order.
 *
 * STUB — wiring only. Business logic is intentionally deferred to the LMS
 * / Course Enrollment module phase.
 */
class EnrollUserInCourseOnOrderPaid
{
    public function handle(OrderPaid $event): void
    {
        // TODO: inspect $event->order->items where item_type = 'training'
        // and create CourseEnrollment rows for the order's user.
    }
}
