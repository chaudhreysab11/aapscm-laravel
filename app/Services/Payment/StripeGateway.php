<?php

namespace App\Services\Payment;

use App\Contracts\PaymentGatewayContract;
use Stripe\StripeClient;
use Stripe\Webhook;

class StripeGateway implements PaymentGatewayContract
{
    private StripeClient $client;

    public function __construct()
    {
        $this->client = new StripeClient(config('services.stripe.secret'));
    }

    public function createPayment(array $data): array
    {
        $intent = $this->client->paymentIntents->create([
            'amount' => $data['amount_cents'],
            'currency' => strtolower($data['currency'] ?? 'usd'),
            'metadata' => $data['metadata'] ?? [],
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        return [
            'gateway_id' => $intent->id,
            'client_secret' => $intent->client_secret,
            'status' => $intent->status,
        ];
    }

    public function capturePayment(string $gatewayId, array $data = []): array
    {
        $intent = $this->client->paymentIntents->capture($gatewayId);

        return [
            'gateway_id' => $intent->id,
            'status' => $intent->status,
        ];
    }

    public function refundPayment(string $gatewayId, ?int $amountCents = null): array
    {
        $params = ['payment_intent' => $gatewayId];

        if ($amountCents !== null) {
            $params['amount'] = $amountCents;
        }

        $refund = $this->client->refunds->create($params);

        return [
            'refund_id' => $refund->id,
            'status' => $refund->status,
        ];
    }

    public function verifyWebhook(string $rawPayload, array $headers): array
    {
        $secret = config('services.stripe.webhook_secret');

        $event = Webhook::constructEvent(
            $rawPayload,
            $headers['stripe-signature'] ?? '',
            $secret
        );

        return [
            'event_id' => $event->id,
            'event_type' => $event->type,
            'data' => $event->data->object->toArray(),
        ];
    }

    public function getName(): string
    {
        return 'stripe';
    }
}
