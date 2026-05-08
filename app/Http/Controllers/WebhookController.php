<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\WebhookLog;
use App\Services\Payment\OrderPaymentService;
use App\Services\Payment\PaymentManager;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class WebhookController extends Controller
{
    public function __construct(
        private PaymentManager $payments,
        private OrderPaymentService $orderPayments,
    ) {}

    public function stripe(Request $request): JsonResponse
    {
        return $this->process($request, 'stripe');
    }

    public function paypal(Request $request): JsonResponse
    {
        return $this->process($request, 'paypal');
    }

    private function process(Request $request, string $provider): JsonResponse
    {
        $rawPayload = $request->getContent();
        $headers = collect($request->headers->all())
            ->mapWithKeys(fn (array $values, string $key): array => [strtolower($key) => $values[0] ?? ''])
            ->all();

        $log = WebhookLog::create([
            'provider' => $provider,
            'event_type' => 'unknown',
            'event_id' => null,
            'status' => 'received',
            'payload' => $this->safeDecode($rawPayload),
        ]);

        try {
            $event = $this->payments->gateway($provider)->verifyWebhook($rawPayload, $headers);

            $log->update([
                'event_type' => $event['event_type'] ?? 'unknown',
                'event_id' => $event['event_id'] ?? null,
            ]);

            $this->handleEvent($provider, $event);

            $log->update(['status' => 'processed', 'processed_at' => now()]);

            return response()->json(['status' => 'ok']);
        } catch (Throwable $e) {
            $log->update([
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);

            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 400);
        }
    }

    /**
     * @param  array<string, mixed>  $event
     */
    private function handleEvent(string $provider, array $event): void
    {
        $eventType = (string) ($event['event_type'] ?? '');
        $data = (array) ($event['data'] ?? []);

        $isPaymentSuccess = match ($provider) {
            'stripe' => $eventType === 'payment_intent.succeeded',
            'paypal' => $eventType === 'PAYMENT.CAPTURE.COMPLETED',
            default => false,
        };

        if (! $isPaymentSuccess) {
            return;
        }

        $order = $this->findOrder($provider, $data);

        if ($order === null) {
            return;
        }

        // Single canonical paid-state transition. The service handles the
        // already-paid guard and dispatches OrderPaid exactly once.
        $this->orderPayments->markPaid($order, $event);
    }

    /**
     * @param  array<string, mixed>  $data
     */
    private function findOrder(string $provider, array $data): ?Order
    {
        $intentId = match ($provider) {
            'stripe' => $data['id'] ?? $data['payment_intent'] ?? null,
            'paypal' => $data['id'] ?? $data['supplementary_data']['related_ids']['order_id'] ?? null,
            default => null,
        };

        if ($intentId === null) {
            return null;
        }

        /** @var Order|null */
        return Order::where('payment_intent_id', $intentId)->first();
    }

    /**
     * @return array<string, mixed>
     */
    private function safeDecode(string $payload): array
    {
        $decoded = json_decode($payload, true);

        return is_array($decoded) ? $decoded : ['raw' => $payload];
    }
}
