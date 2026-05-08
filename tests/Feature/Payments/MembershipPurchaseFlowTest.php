<?php

declare(strict_types=1);

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\MembershipTier;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use App\Models\UserMembership;
use App\Services\Payment\OrderPaymentService;
use App\Services\Payment\StripeGateway;
use Database\Seeders\CommerceConfirmedPricesSeeder;
use Database\Seeders\CommerceConfirmedProductsSeeder;
use Database\Seeders\MembershipTiersSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Carbon;

uses(RefreshDatabase::class);

beforeEach(function (): void {
    $this->seed(MembershipTiersSeeder::class);
    $this->seed(CommerceConfirmedProductsSeeder::class);
    $this->seed(CommerceConfirmedPricesSeeder::class);
});

function membershipCartSession(Product $product): array
{
    /** @var ProductPrice $price */
    $price = $product->prices()->whereNull('membership_tier_id')->firstOrFail();

    return [
        $product->id => [
            'quantity' => 1,
            'unit_price' => (string) $price->price,
            'currency' => $price->currency,
            'membership_tier_id' => null,
        ],
    ];
}

function checkoutBilling(string $email = 'member@example.com'): array
{
    return [
        'billing_name' => 'Membership Buyer',
        'billing_email' => $email,
        'billing_address' => '1 Test Street',
        'billing_city' => 'Columbia',
        'billing_state' => 'Maryland',
        'billing_postcode' => '21044',
        'billing_country' => 'USA',
        'billing_phone' => '+1 555 0100',
    ];
}

function tierByCode(string $code): MembershipTier
{
    return MembershipTier::query()->where('code', $code)->firstOrFail();
}

it('activates a one-time professional membership after Stripe payment succeeds', function (): void {
    $user = User::factory()->create();
    $product = Product::query()->where('slug', 'professional-membership')->firstOrFail();

    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('createPayment')
        ->once()
        ->andReturn([
            'gateway_id' => 'pi_membership_123',
            'client_secret' => 'cs_membership_123',
            'status' => 'requires_payment_method',
        ]);
    $stripe->shouldReceive('capturePayment')
        ->once()
        ->with('pi_membership_123')
        ->andReturn([
            'gateway_id' => 'pi_membership_123',
            'status' => 'succeeded',
        ]);
    $this->instance(StripeGateway::class, $stripe);

    $this->actingAs($user)
        ->withSession(['cart.items' => membershipCartSession($product)])
        ->post('/checkout/', checkoutBilling($user->email) + ['gateway' => 'stripe'])
        ->assertRedirect();

    $order = Order::query()->latest('id')->firstOrFail();

    $this->actingAs($user)
        ->get("/payment/{$order->id}/start")
        ->assertOk();

    $this->actingAs($user)
        ->get("/payment/{$order->id}/success")
        ->assertRedirect("/order/{$order->id}/receipt");

    $user->refresh();
    $membership = $user->memberships()->with('tier')->firstOrFail();

    expect($membership->order_id)->toBe($order->id)
        ->and($membership->status)->toBe('active')
        ->and($membership->tier?->code)->toBe('CM')
        ->and($membership->expires_at)->not->toBeNull()
        ->and($user->hasRole('CM'))->toBeTrue();
});

it('activates a one-time corporate membership after Stripe payment succeeds', function (): void {
    $user = User::factory()->create();
    $product = Product::query()->where('slug', 'corporate-membership')->firstOrFail();

    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('createPayment')
        ->once()
        ->andReturn([
            'gateway_id' => 'pi_corp_456',
            'client_secret' => 'cs_corp_456',
            'status' => 'requires_payment_method',
        ]);
    $stripe->shouldReceive('capturePayment')
        ->once()
        ->with('pi_corp_456')
        ->andReturn([
            'gateway_id' => 'pi_corp_456',
            'status' => 'succeeded',
        ]);
    $this->instance(StripeGateway::class, $stripe);

    $this->actingAs($user)
        ->withSession(['cart.items' => membershipCartSession($product)])
        ->post('/checkout/', checkoutBilling($user->email) + ['gateway' => 'paypal'])
        ->assertRedirect();

    $order = Order::query()->latest('id')->firstOrFail();

    expect($order->payment_method)->toBe('stripe');

    $this->actingAs($user)
        ->get("/payment/{$order->id}/start")
        ->assertOk();

    $this->actingAs($user)
        ->get("/payment/{$order->id}/success")
        ->assertRedirect("/order/{$order->id}/receipt");

    $user->refresh();
    $membership = $user->memberships()->with('tier')->firstOrFail();

    expect($membership->status)->toBe('active')
        ->and($membership->tier?->code)->toBe('CORP')
        ->and($user->hasRole('CORP'))->toBeTrue();
});

it('does not create duplicate memberships when the same order is marked paid twice', function (): void {
    $user = User::factory()->create();
    $product = Product::query()->where('slug', 'professional-membership')->firstOrFail();

    $order = Order::create([
        'user_id' => $user->id,
        'billing_email' => $user->email,
        'billing_name' => 'Membership Buyer',
        'order_number' => 'AAPSCM-MEM-' . uniqid(),
        'status' => 'processing',
        'payment_method' => 'stripe',
        'payment_intent_id' => 'pi_duplicate_membership',
        'payment_status' => 'unpaid',
        'currency' => 'USD',
        'subtotal' => '150.00',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '150.00',
    ]);

    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'quantity' => 1,
        'unit_price' => '150.00',
        'total_price' => '150.00',
        'item_type' => 'membership',
    ]);

    $payments = app(OrderPaymentService::class);

    expect($payments->markPaid($order, ['status' => 'succeeded']))->toBeTrue()
        ->and($payments->markPaid($order, ['status' => 'succeeded']))->toBeFalse();

    expect($user->fresh()->memberships()->count())->toBe(1)
        ->and($user->fresh()->memberships()->first()?->status)->toBe('active')
        ->and($user->fresh()->hasRole('CM'))->toBeTrue();
});

it('preserves non-membership roles when assigning the granted membership role', function (): void {
    $user = User::factory()->create();
    $user->assignRole('staff');

    $product = Product::query()->where('slug', 'professional-membership')->firstOrFail();

    $order = Order::create([
        'user_id' => $user->id,
        'billing_email' => $user->email,
        'billing_name' => 'Membership Buyer',
        'order_number' => 'AAPSCM-ROLE-' . uniqid(),
        'status' => 'processing',
        'payment_method' => 'stripe',
        'payment_intent_id' => 'pi_role_membership',
        'payment_status' => 'unpaid',
        'currency' => 'USD',
        'subtotal' => '150.00',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '150.00',
    ]);

    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'quantity' => 1,
        'unit_price' => '150.00',
        'total_price' => '150.00',
        'item_type' => 'membership',
    ]);

    app(OrderPaymentService::class)->markPaid($order, ['status' => 'succeeded']);

    $user->refresh();

    expect($user->hasRole('staff'))->toBeTrue()
        ->and($user->hasRole('CM'))->toBeTrue();
});

it('renews an active membership through Stripe by extending the current expiry', function (): void {
    Carbon::setTestNow('2026-05-05 12:00:00');

    $user = User::factory()->create();
    $tier = tierByCode('CM');
    $product = Product::query()->where('slug', 'professional-membership-renewal')->firstOrFail();

    $membership = UserMembership::create([
        'user_id' => $user->id,
        'membership_tier_id' => $tier->id,
        'order_id' => null,
        'status' => 'active',
        'billing_cycle' => 'annual',
        'starts_at' => now()->subMonths(10),
        'expires_at' => now()->addMonths(2),
        'auto_renew' => false,
    ]);

    $originalExpiry = $membership->expires_at->copy();

    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('createPayment')
        ->once()
        ->andReturn([
            'gateway_id' => 'pi_renew_123',
            'client_secret' => 'cs_renew_123',
            'status' => 'requires_payment_method',
        ]);
    $stripe->shouldReceive('capturePayment')
        ->once()
        ->with('pi_renew_123')
        ->andReturn([
            'gateway_id' => 'pi_renew_123',
            'status' => 'succeeded',
        ]);
    $this->instance(StripeGateway::class, $stripe);

    $this->actingAs($user)
        ->withSession(['cart.items' => membershipCartSession($product)])
        ->post('/checkout/', checkoutBilling($user->email) + ['gateway' => 'stripe'])
        ->assertRedirect();

    $order = Order::query()->latest('id')->firstOrFail();

    $this->actingAs($user)->get("/payment/{$order->id}/start")->assertOk();
    $this->actingAs($user)->get("/payment/{$order->id}/success")->assertRedirect("/order/{$order->id}/receipt");

    $membership->refresh();

    expect($user->fresh()->memberships()->count())->toBe(1)
        ->and($membership->status)->toBe('active')
        ->and($membership->order_id)->toBe($order->id)
        ->and($membership->starts_at?->toDateTimeString())->toBe(now()->subMonths(10)->toDateTimeString())
        ->and($membership->expires_at?->toDateTimeString())->toBe($originalExpiry->addYear()->toDateTimeString());

    Carbon::setTestNow();
});

it('renews an expired membership through Stripe by reactivating it from now', function (): void {
    Carbon::setTestNow('2026-05-05 12:00:00');

    $user = User::factory()->create();
    $tier = tierByCode('CM');
    $product = Product::query()->where('slug', 'professional-membership-renewal')->firstOrFail();

    $membership = UserMembership::create([
        'user_id' => $user->id,
        'membership_tier_id' => $tier->id,
        'order_id' => null,
        'status' => 'expired',
        'billing_cycle' => 'annual',
        'starts_at' => now()->subYears(2),
        'expires_at' => now()->subDays(10),
        'cancelled_at' => now()->subDays(9),
        'cancellation_reason' => 'lapsed',
        'auto_renew' => false,
    ]);

    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('createPayment')
        ->once()
        ->andReturn([
            'gateway_id' => 'pi_renew_456',
            'client_secret' => 'cs_renew_456',
            'status' => 'requires_payment_method',
        ]);
    $stripe->shouldReceive('capturePayment')
        ->once()
        ->with('pi_renew_456')
        ->andReturn([
            'gateway_id' => 'pi_renew_456',
            'status' => 'succeeded',
        ]);
    $this->instance(StripeGateway::class, $stripe);

    $this->actingAs($user)
        ->withSession(['cart.items' => membershipCartSession($product)])
        ->post('/checkout/', checkoutBilling($user->email) + ['gateway' => 'paypal'])
        ->assertRedirect();

    $order = Order::query()->latest('id')->firstOrFail();

    expect($order->payment_method)->toBe('stripe');

    $this->actingAs($user)
        ->get("/payment/{$order->id}/start")
        ->assertOk();

    $this->actingAs($user)
        ->get("/payment/{$order->id}/success")
        ->assertRedirect("/order/{$order->id}/receipt");

    $membership->refresh();

    expect($user->fresh()->memberships()->count())->toBe(1)
        ->and($membership->status)->toBe('active')
        ->and($membership->order_id)->toBe($order->id)
        ->and($membership->starts_at?->toDateTimeString())->toBe(now()->toDateTimeString())
        ->and($membership->expires_at?->toDateTimeString())->toBe(now()->addYear()->toDateTimeString())
        ->and($membership->cancelled_at)->toBeNull()
        ->and($membership->cancellation_reason)->toBeNull()
        ->and($user->fresh()->hasRole('CM'))->toBeTrue();

    Carbon::setTestNow();
});

it('does not double-extend an active membership when the same renewal order is marked paid twice', function (): void {
    Carbon::setTestNow('2026-05-05 12:00:00');

    $user = User::factory()->create();
    $tier = tierByCode('CM');
    $product = Product::query()->where('slug', 'professional-membership-renewal')->firstOrFail();

    $membership = UserMembership::create([
        'user_id' => $user->id,
        'membership_tier_id' => $tier->id,
        'order_id' => null,
        'status' => 'active',
        'billing_cycle' => 'annual',
        'starts_at' => now()->subMonths(6),
        'expires_at' => now()->addMonth(),
        'auto_renew' => false,
    ]);

    $originalExpiry = $membership->expires_at->copy();

    $order = Order::create([
        'user_id' => $user->id,
        'billing_email' => $user->email,
        'billing_name' => 'Membership Buyer',
        'order_number' => 'AAPSCM-RENEW-' . uniqid(),
        'status' => 'processing',
        'payment_method' => 'stripe',
        'payment_intent_id' => 'pi_duplicate_renewal',
        'payment_status' => 'unpaid',
        'currency' => 'USD',
        'subtotal' => '160.00',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '160.00',
    ]);

    OrderItem::create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'quantity' => 1,
        'unit_price' => '160.00',
        'total_price' => '160.00',
        'item_type' => 'membership',
    ]);

    $payments = app(OrderPaymentService::class);

    expect($payments->markPaid($order, ['status' => 'succeeded']))->toBeTrue()
        ->and($payments->markPaid($order, ['status' => 'succeeded']))->toBeFalse();

    $membership->refresh();

    expect($user->fresh()->memberships()->count())->toBe(1)
        ->and($membership->order_id)->toBe($order->id)
        ->and($membership->expires_at?->toDateTimeString())->toBe($originalExpiry->addYear()->toDateTimeString());

    Carbon::setTestNow();
});
