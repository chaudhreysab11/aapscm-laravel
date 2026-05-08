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
        'billing_state' => 'Maryland',
        'billing_postcode' => '21044',
        'billing_country' => 'USA',
        'billing_phone' => '+1 555 0100',
    ];

    return compact('user', 'product', 'cartSession', 'billing');
}

it('processes a Stripe checkout end-to-end and dispatches OrderPaid', function (): void {
    Event::fake([OrderPaid::class]);

    ['user' => $user, 'cartSession' => $cartSession, 'billing' => $billing] = setupCheckoutScenario();

    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('createPayment')
        ->once()
        ->andReturn(['gateway_id' => 'pi_test_123', 'client_secret' => 'cs_test', 'status' => 'requires_payment_method']);
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

    // 2. Start payment -> mocked Stripe createPayment runs and the Stripe page renders.
    $this->actingAs($user)
        ->get("/payment/{$order->id}/start")
        ->assertOk()
        ->assertSee('Pay securely with Stripe');

    expect($order->fresh()->payment_intent_id)->toBe('pi_test_123');

    // 3. Success -> mocked Stripe capture runs, order becomes paid.
    $this->actingAs($user)
        ->get("/payment/{$order->id}/success")
        ->assertRedirect("/order/{$order->id}/receipt");

    $order->refresh();
    expect($order->payment_status)->toBe('paid')
        ->and($order->status)->toBe('completed');

    Event::assertDispatched(OrderPaid::class, fn (OrderPaid $e): bool => $e->order->id === $order->id);
});

it('shows only Stripe on the checkout page', function (): void {
    ['user' => $user, 'cartSession' => $cartSession] = setupCheckoutScenario();

    $this->actingAs($user)
        ->withSession(['cart.items' => $cartSession])
        ->get('/checkout/')
        ->assertOk()
        ->assertSee('Stripe')
        ->assertDontSee('PayPal');
});

it('shows the create account option only to guests on the checkout page', function (): void {
    ['user' => $user, 'cartSession' => $cartSession] = setupCheckoutScenario();

    $this->withSession(['cart.items' => $cartSession])
        ->get('/checkout/')
        ->assertOk()
        ->assertSee('Create an account?');

    $this->actingAs($user)
        ->withSession(['cart.items' => $cartSession])
        ->get('/checkout/')
        ->assertOk()
        ->assertDontSee('Create an account?');
});

it('stores create-account intent only for guests who select it', function (): void {
    ['user' => $user, 'cartSession' => $cartSession, 'billing' => $billing] = setupCheckoutScenario();

    $this->withSession(['cart.items' => $cartSession])
        ->post('/checkout/', $billing + ['create_account' => '1'])
        ->assertRedirect();

    $guestOrder = Order::query()->latest('id')->firstOrFail();
    $guestNotes = json_decode((string) $guestOrder->notes, true, 512, JSON_THROW_ON_ERROR);

    expect($guestOrder->user_id)->toBeNull()
        ->and(data_get($guestNotes, 'checkout_context.create_account'))->toBeTrue();

    $this->actingAs($user)
        ->withSession(['cart.items' => $cartSession])
        ->post('/checkout/', $billing + ['create_account' => '1'])
        ->assertRedirect();

    $memberOrder = Order::query()->latest('id')->firstOrFail();
    $memberNotes = json_decode((string) $memberOrder->notes, true, 512, JSON_THROW_ON_ERROR);

    expect($memberOrder->user_id)->toBe($user->id)
        ->and(data_get($memberNotes, 'checkout_context.create_account'))->toBeNull();
});

it('normalizes a forged PayPal checkout submission to Stripe', function (): void {
    ['user' => $user, 'cartSession' => $cartSession, 'billing' => $billing] = setupCheckoutScenario();

    $this->actingAs($user)
        ->withSession(['cart.items' => $cartSession])
        ->post('/checkout/', $billing + ['gateway' => 'paypal'])
        ->assertRedirect();

    $order = Order::query()->latest('id')->firstOrFail();

    expect($order->payment_method)->toBe('stripe')
        ->and($order->payment_status)->toBe('unpaid');
});

it('defaults checkout to Stripe when no gateway is submitted', function (): void {
    ['user' => $user, 'cartSession' => $cartSession, 'billing' => $billing] = setupCheckoutScenario();

    $this->actingAs($user)
        ->withSession(['cart.items' => $cartSession])
        ->post('/checkout/', $billing)
        ->assertRedirect();

    $order = Order::query()->latest('id')->firstOrFail();

    expect($order->payment_method)->toBe('stripe');
});

it('does not mark a PayPal order paid when the webhook is only approval without capture', function (): void {
    Event::fake([OrderPaid::class]);

    ['user' => $user] = setupCheckoutScenario();

    $order = Order::create([
        'user_id' => $user->id,
        'billing_email' => 'buyer@example.com',
        'billing_name' => 'Buyer',
        'order_number' => 'AAPSCM-PAYPAL-' . uniqid(),
        'status' => 'processing',
        'payment_method' => 'paypal',
        'payment_intent_id' => 'PAYID_APPROVAL_ONLY',
        'payment_status' => 'unpaid',
        'currency' => 'USD',
        'subtotal' => '49.99',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '49.99',
    ]);

    $paypal = Mockery::mock(PayPalGateway::class);
    $paypal->shouldReceive('verifyWebhook')
        ->once()
        ->andReturn([
            'event_id' => 'WH-APPROVED',
            'event_type' => 'CHECKOUT.ORDER.APPROVED',
            'data' => ['id' => 'PAYID_APPROVAL_ONLY'],
        ]);
    $this->instance(PayPalGateway::class, $paypal);

    $this->postJson('/webhooks/paypal', ['payload' => 'fake'])->assertOk();

    expect($order->fresh()->payment_status)->toBe('unpaid')
        ->and($order->fresh()->status)->toBe('processing');

    Event::assertNotDispatched(OrderPaid::class);
});
