<?php

namespace App\Contracts;

interface PaymentGatewayContract
{
    /**
     * Create a payment intent / order on the gateway side.
     *
     * @param  array<string, mixed>  $data
     * @return array<string, mixed> Gateway-specific result (must include 'gateway_id' key)
     */
    public function createPayment(array $data): array;

    /**
     * Fetch an existing payment intent / gateway order.
     *
     * @return array<string, mixed> Gateway-specific result
     */
    public function getPayment(string $gatewayId): array;

    /**
     * Capture / confirm a previously created payment.
     *
     * @param  string  $gatewayId  The provider's payment/order ID
     * @param  array<string, mixed>  $data
     */
    public function capturePayment(string $gatewayId, array $data = []): array;

    /**
     * Refund a completed payment, fully or partially.
     *
     * @param  int|null  $amountCents  null = full refund
     */
    public function refundPayment(string $gatewayId, ?int $amountCents = null): array;

    /**
     * Verify an inbound webhook payload and return normalised event data.
     *
     * @param  array<string, string>  $headers  HTTP headers from the request
     * @return array<string, mixed>
     */
    public function verifyWebhook(string $rawPayload, array $headers): array;

    /**
     * Human-readable name of this gateway, e.g. "stripe" or "paypal".
     */
    public function getName(): string;
}
