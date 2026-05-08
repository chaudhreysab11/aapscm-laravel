<?php

namespace App\Services\Payment;

use App\Contracts\PaymentGatewayContract;
use GuzzleHttp\Client;

/**
 * PayPal payment gateway implementation.
 *
 * Uses the PayPal Orders v2 REST API directly via Guzzle.
 * srmklive/paypal is NOT used — it does not support Laravel 13.
 *
 * Required .env keys:
 *   PAYPAL_CLIENT_ID
 *   PAYPAL_CLIENT_SECRET
 *   PAYPAL_MODE  (sandbox|live)
 */
class PayPalGateway implements PaymentGatewayContract
{
    private Client $http;

    private string $baseUrl;

    public function __construct()
    {
        $mode = config('services.paypal.mode', 'sandbox');
        $this->baseUrl = $mode === 'live'
            ? 'https://api-m.paypal.com'
            : 'https://api-m.sandbox.paypal.com';

        $this->http = new Client(['base_uri' => $this->baseUrl]);
    }

    public function createPayment(array $data): array
    {
        $token = $this->getAccessToken();

        $amountCents = $data['amount_cents'];
        $currency = strtoupper($data['currency'] ?? 'USD');
        $value = number_format($amountCents / 100, 2, '.', '');

        $response = $this->http->post('/v2/checkout/orders', [
            'headers' => [
                'Authorization' => "Bearer {$token}",
                'Content-Type' => 'application/json',
            ],
            'json' => [
                'intent' => 'CAPTURE',
                'purchase_units' => [[
                    'amount' => ['currency_code' => $currency, 'value' => $value],
                    'custom_id' => $data['metadata']['order_id'] ?? null,
                ]],
                'application_context' => array_filter([
                    'return_url' => $data['return_url'] ?? null,
                    'cancel_url' => $data['cancel_url'] ?? null,
                    'shipping_preference' => 'NO_SHIPPING',
                ]),
            ],
        ]);

        $body = json_decode((string) $response->getBody(), true);

        return [
            'gateway_id' => $body['id'],
            'approve_url' => collect($body['links'])->firstWhere('rel', 'approve')['href'] ?? null,
            'status' => $body['status'],
        ];
    }

    public function getPayment(string $gatewayId): array
    {
        $token = $this->getAccessToken();

        $response = $this->http->get("/v2/checkout/orders/{$gatewayId}", [
            'headers' => [
                'Authorization' => "Bearer {$token}",
                'Content-Type' => 'application/json',
            ],
        ]);

        $body = json_decode((string) $response->getBody(), true);

        return [
            'gateway_id' => $body['id'],
            'approve_url' => collect($body['links'] ?? [])->firstWhere('rel', 'approve')['href'] ?? null,
            'status' => $body['status'] ?? null,
        ];
    }

    public function capturePayment(string $gatewayId, array $data = []): array
    {
        $existing = $this->getPayment($gatewayId);

        if (strtoupper((string) ($existing['status'] ?? '')) === 'COMPLETED') {
            return [
                'gateway_id' => $existing['gateway_id'],
                'status' => $existing['status'],
            ];
        }

        $token = $this->getAccessToken();

        $response = $this->http->post("/v2/checkout/orders/{$gatewayId}/capture", [
            'headers' => [
                'Authorization' => "Bearer {$token}",
                'Content-Type' => 'application/json',
            ],
        ]);

        $body = json_decode((string) $response->getBody(), true);

        return [
            'gateway_id' => $body['id'],
            'status' => $body['status'],
        ];
    }

    public function refundPayment(string $gatewayId, ?int $amountCents = null): array
    {
        $token = $this->getAccessToken();

        $payload = [];
        if ($amountCents !== null) {
            $payload['amount'] = [
                'value' => number_format($amountCents / 100, 2, '.', ''),
                'currency_code' => 'USD',
            ];
        }

        $response = $this->http->post("/v2/payments/captures/{$gatewayId}/refund", [
            'headers' => [
                'Authorization' => "Bearer {$token}",
                'Content-Type' => 'application/json',
            ],
            'json' => $payload,
        ]);

        $body = json_decode((string) $response->getBody(), true);

        return [
            'refund_id' => $body['id'],
            'status' => $body['status'],
        ];
    }

    public function verifyWebhook(string $rawPayload, array $headers): array
    {
        // PayPal webhook verification requires calling their API with all headers.
        // Signature verification is handled here.
        $token = $this->getAccessToken();

        $verifyPayload = [
            'transmission_id' => $headers['paypal-transmission-id'] ?? '',
            'transmission_time' => $headers['paypal-transmission-time'] ?? '',
            'cert_url' => $headers['paypal-cert-url'] ?? '',
            'auth_algo' => $headers['paypal-auth-algo'] ?? '',
            'transmission_sig' => $headers['paypal-transmission-sig'] ?? '',
            'webhook_id' => config('services.paypal.webhook_id'),
            'webhook_event' => json_decode($rawPayload, true),
        ];

        $response = $this->http->post('/v1/notifications/verify-webhook-signature', [
            'headers' => [
                'Authorization' => "Bearer {$token}",
                'Content-Type' => 'application/json',
            ],
            'json' => $verifyPayload,
        ]);

        $body = json_decode((string) $response->getBody(), true);

        if (($body['verification_status'] ?? '') !== 'SUCCESS') {
            throw new \RuntimeException('PayPal webhook signature verification failed.');
        }

        $event = json_decode($rawPayload, true);

        return [
            'event_id' => $event['id'],
            'event_type' => $event['event_type'],
            'data' => $event['resource'] ?? [],
        ];
    }

    public function getName(): string
    {
        return 'paypal';
    }

    /**
     * Obtain a PayPal OAuth 2.0 access token.
     */
    private function getAccessToken(): string
    {
        $response = $this->http->post('/v1/oauth2/token', [
            'auth' => [
                config('services.paypal.client_id'),
                config('services.paypal.client_secret'),
            ],
            'form_params' => ['grant_type' => 'client_credentials'],
        ]);

        $body = json_decode((string) $response->getBody(), true);

        return $body['access_token'];
    }
}
