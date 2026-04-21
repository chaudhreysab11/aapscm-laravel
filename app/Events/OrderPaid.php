<?php

declare(strict_types=1);

namespace App\Events;

use App\Models\Order;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

/**
 * Dispatched whenever an Order transitions to payment_status = 'paid'.
 *
 * Downstream listeners (membership activation, course enrollment, exam
 * booking confirmation, etc.) react to this single event.
 */
class OrderPaid
{
    use Dispatchable, SerializesModels;

    public function __construct(public readonly Order $order) {}
}
