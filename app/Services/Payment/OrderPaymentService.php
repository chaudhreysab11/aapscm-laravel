<?php

declare(strict_types=1);

namespace App\Services\Payment;

use App\Events\OrderPaid;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

/**
 * Canonical "order is paid" transition.
 *
 * Both the buyer-facing PaymentController::success route and the
 * provider WebhookController call this service. It uses a row-level
 * lock + status guard so the transition (and its OrderPaid event)
 * happens exactly once per order, regardless of which trigger fires
 * first or whether they race.
 */
class OrderPaymentService
{
    /**
     * Transition $order to paid/completed and dispatch OrderPaid.
     *
     * @param  array<string, mixed>  $captureResult  Optional gateway capture payload (currently unused; reserved for future audit).
     * @return bool true if THIS call performed the transition, false if the
     *              order was already paid (idempotent no-op).
     */
    public function markPaid(Order $order, array $captureResult = []): bool
    {
        unset($captureResult); // reserved for future audit logging

        return (bool) DB::transaction(function () use ($order): bool {
            /** @var Order $fresh */
            $fresh = Order::query()->whereKey($order->getKey())->lockForUpdate()->first();

            if ($fresh === null) {
                return false;
            }

            if ($fresh->payment_status === 'paid') {
                // Sync the in-memory model so callers see the canonical state.
                $order->setRawAttributes($fresh->getAttributes(), true);

                return false;
            }

            $fresh->update([
                'status' => 'completed',
                'payment_status' => 'paid',
            ]);

            // Refresh the caller's instance so subsequent reads see the new state.
            $order->setRawAttributes($fresh->getAttributes(), true);

            OrderPaid::dispatch($fresh);

            return true;
        });
    }
}
