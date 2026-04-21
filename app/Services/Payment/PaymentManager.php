<?php

declare(strict_types=1);

namespace App\Services\Payment;

use App\Contracts\PaymentGatewayContract;
use InvalidArgumentException;

/**
 * Resolves a PaymentGatewayContract implementation by its key.
 *
 * Supported keys: 'stripe', 'paypal'.
 */
class PaymentManager
{
    public function gateway(string $key): PaymentGatewayContract
    {
        return match ($key) {
            'stripe' => app(StripeGateway::class),
            'paypal' => app(PayPalGateway::class),
            default => throw new InvalidArgumentException("Unknown payment gateway: {$key}"),
        };
    }
}
