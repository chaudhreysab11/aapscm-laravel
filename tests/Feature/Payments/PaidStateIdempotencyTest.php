<?php

declare(strict_types=1);

use App\Events\OrderPaid;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use App\Services\Payment\StripeGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;

uses(RefreshDatabase::class);

function makePendingStripeOrder(): array
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

    $order = Order::create([
        'user_id' => $user->id,
        'order_number' => 'AAPSCM-IDEM-' . uniqid(),
        'status' => 'processing',
        'payment_method' => 'stripe',
        'payment_status' => 'unpaid',
        'payment_intent_id' => 'pi_idem_001',
        'currency' => 'USD',
        'subtotal' => '49.99',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '49.99',
    ]);

    return [$user, $order];
}

it('rejects payment.success when the current buyer context does not match the order', function (): void {
    [, $order] = makePendingStripeOrder();

    $this->get("/payment/{$order->id}/success")
        ->assertForbidden();

    $otherUser = User::factory()->create();

    $this->actingAs($otherUser)
        ->get("/payment/{$order->id}/success")
        ->assertForbidden();
});

it('dispatches OrderPaid only once when webhook arrives before user returns', function (): void {
    Event::fake([OrderPaid::class]);

    [$user, $order] = makePendingStripeOrder();

    // Stripe gateway must not have capturePayment invoked when the order
    // is already paid by the time the user returns.
    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('capturePayment')->never();
    $stripe->shouldReceive('verifyWebhook')->once()->andReturn([
        'event_id' => 'evt_idem_1',
        'event_type' => 'payment_intent.succeeded',
        'data' => ['id' => 'pi_idem_001'],
    ]);
    $this->instance(StripeGateway::class, $stripe);

    // 1. Webhook fires first \u2192 marks paid, dispatches OrderPaid (#1).
    $this->postJson('/webhooks/stripe', ['payload' => 'fake'])
        ->assertOk();

    expect($order->fresh()->payment_status)->toBe('paid');

    // 2. User returns via success URL -> must NOT capture, must NOT re-dispatch.
    $this->actingAs($user)
        ->get("/payment/{$order->id}/success")
        ->assertRedirect("/order/{$order->id}/receipt");

    Event::assertDispatchedTimes(OrderPaid::class, 1);
});

it('dispatches OrderPaid only once when user returns before webhook arrives', function (): void {
    Event::fake([OrderPaid::class]);

    [$user, $order] = makePendingStripeOrder();

    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('capturePayment')
        ->once()
        ->with('pi_idem_001')
        ->andReturn(['gateway_id' => 'pi_idem_001', 'status' => 'succeeded']);
    $stripe->shouldReceive('verifyWebhook')->once()->andReturn([
        'event_id' => 'evt_idem_2',
        'event_type' => 'payment_intent.succeeded',
        'data' => ['id' => 'pi_idem_001'],
    ]);
    $this->instance(StripeGateway::class, $stripe);

    // 1. User returns first -> capture runs, order becomes paid (OrderPaid #1).
    $this->actingAs($user)
        ->get("/payment/{$order->id}/success")
        ->assertRedirect("/order/{$order->id}/receipt");

    expect($order->fresh()->payment_status)->toBe('paid');

    // 2. Webhook arrives later \u2192 markPaid is a no-op, no second event.
    $this->postJson('/webhooks/stripe', ['payload' => 'fake'])
        ->assertOk();

    Event::assertDispatchedTimes(OrderPaid::class, 1);
});
