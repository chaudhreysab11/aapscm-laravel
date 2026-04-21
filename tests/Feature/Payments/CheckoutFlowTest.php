<?php

declare(strict_types=1);

use App\Events\OrderPaid;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use App\Services\Payment\PayPalGateway;
use App\Services\Payment\StripeGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;

uses(RefreshDatabase::class);

function setupCheckoutScenario(): array
{
    $user = User::factory()->create();
    $product = Product::factory()->create(['type' => 'digital']);
    ProductPrice::factory()->create([
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'price' => '49.99',
        'currency' => 'USD',
        'is_active' => true,
    ]);

    $cartSession = [
        $product->id => [
            'quantity' => 1,
            'unit_price' => '49.99',
            'currency' => 'USD',
            'membership_tier_id' => null,
        ],
    ];

    $billing = [
        'billing_name' => 'Test Buyer',
        'billing_email' => 'buyer@example.com',
        'billing_address' => '1 Test Street',
        'billing_city' => 'Columbia',
        'billing_country' => 'USA',
    ];

    return compact('user', 'product', 'cartSession', 'billing');
}

it('processes a Stripe checkout end-to-end and dispatches OrderPaid', function (): void {
    Event::fake([OrderPaid::class]);

    ['user' => $user, 'cartSession' => $cartSession, 'billing' => $billing] = setupCheckoutScenario();

    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('createPayment')
        ->once()
        ->andReturn(['gateway_id' => 'pi_test_123', 'client_secret' => 'cs_test', 'status' => 'requires_capture']);
    $stripe->shouldReceive('capturePayment')
        ->once()
        ->with('pi_test_123')
        ->andReturn(['gateway_id' => 'pi_test_123', 'status' => 'succeeded']);
    $this->instance(StripeGateway::class, $stripe);

    // 1. Submit checkout form (creates an unpaid Order).
    $this->actingAs($user)
        ->withSession(['cart.items' => $cartSession])
        ->post('/checkout/', $billing + ['gateway' => 'stripe'])
        ->assertRedirect();

    $order = Order::query()->latest('id')->first();
    expect($order)->not->toBeNull()
        ->and($order->payment_method)->toBe('stripe')
        ->and($order->payment_status)->toBe('unpaid');

    // 2. Start payment → mocked Stripe createPayment runs.
    $this->actingAs($user)
        ->post("/payment/{$order->id}/start")
        ->assertRedirect();

    expect($order->fresh()->payment_intent_id)->toBe('pi_test_123');

    // 3. Success → mocked Stripe capture runs, order becomes paid.
    //    The success route is signed-URL gated; generate one as the controller would.
    $signed = URL::temporarySignedRoute('payment.success', now()->addHour(), ['order' => $order->id]);

    $this->actingAs($user)
        ->get($signed)
        ->assertRedirect('/dashboard');

    $order->refresh();
    expect($order->payment_status)->toBe('paid')
        ->and($order->status)->toBe('completed');

    Event::assertDispatched(OrderPaid::class, fn (OrderPaid $e): bool => $e->order->id === $order->id);
});

it('processes a PayPal checkout end-to-end and dispatches OrderPaid', function (): void {
    Event::fake([OrderPaid::class]);

    ['user' => $user, 'cartSession' => $cartSession, 'billing' => $billing] = setupCheckoutScenario();

    $paypal = Mockery::mock(PayPalGateway::class);
    $paypal->shouldReceive('createPayment')
        ->once()
        ->andReturn([
            'gateway_id' => 'PAYID_TEST_456',
            'approve_url' => 'https://www.sandbox.paypal.com/checkoutnow?token=TEST',
            'status' => 'CREATED',
        ]);
    $paypal->shouldReceive('capturePayment')
        ->once()
        ->with('PAYID_TEST_456')
        ->andReturn(['gateway_id' => 'PAYID_TEST_456', 'status' => 'COMPLETED']);
    $this->instance(PayPalGateway::class, $paypal);

    // 1. Submit checkout form.
    $this->actingAs($user)
        ->withSession(['cart.items' => $cartSession])
        ->post('/checkout/', $billing + ['gateway' => 'paypal'])
        ->assertRedirect();

    $order = Order::query()->latest('id')->first();
    expect($order->payment_method)->toBe('paypal');

    // 2. Start payment → redirected away to PayPal approve_url.
    $this->actingAs($user)
        ->post("/payment/{$order->id}/start")
        ->assertRedirect('https://www.sandbox.paypal.com/checkoutnow?token=TEST');

    expect($order->fresh()->payment_intent_id)->toBe('PAYID_TEST_456');

    // 3. Buyer returns to success URL (signed) → capture runs, order becomes paid.
    $signed = URL::temporarySignedRoute('payment.success', now()->addHour(), ['order' => $order->id]);

    $this->actingAs($user)
        ->get($signed)
        ->assertRedirect('/dashboard');

    $order->refresh();
    expect($order->payment_status)->toBe('paid')
        ->and($order->status)->toBe('completed');

    Event::assertDispatched(OrderPaid::class, fn (OrderPaid $e): bool => $e->order->id === $order->id);
});
