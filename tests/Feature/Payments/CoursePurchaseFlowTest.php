<?php

declare(strict_types=1);

use App\Models\CertificationCatalog;
use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use App\Services\Payment\OrderPaymentService;
use App\Services\Payment\StripeGateway;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function trainingCatalog(array $overrides = []): CertificationCatalog
{
    return CertificationCatalog::query()->create(array_merge([
        'title' => 'Training Catalog',
        'slug' => 'training-catalog-' . uniqid(),
        'acronym' => 'TCAT',
        'certifying_body' => 'AAPSCM',
        'credential_type' => 'supply_chain',
        'sort_order' => 1,
        'description' => 'Training catalog description',
        'pdu_credits' => 0,
        'is_active' => true,
    ], $overrides));
}

function trainingCourse(CertificationCatalog $catalog, array $overrides = []): Course
{
    return Course::query()->create(array_merge([
        'title' => 'Training Course ' . uniqid(),
        'slug' => 'training-course-' . uniqid(),
        'delivery_format' => 'virtual',
        'description' => 'Course description',
        'level' => 'beginner',
        'duration_hours' => 8,
        'starts_at' => now()->addWeek(),
        'ends_at' => now()->addWeek()->addDays(4),
        'max_seats' => 50,
        'enrolled_count' => 0,
        'certification_catalog_id' => $catalog->id,
        'is_published' => true,
    ], $overrides));
}

function trainingProduct(CertificationCatalog $catalog, array $overrides = []): Product
{
    return Product::query()->create(array_merge([
        'name' => 'Training Product ' . uniqid(),
        'slug' => 'training-product-' . uniqid(),
        'description' => 'Training product description',
        'type' => 'training',
        'certification_catalog_id' => $catalog->id,
        'is_active' => true,
    ], $overrides));
}

function seedTrainingPrice(Product $product, string $price = '299.00'): void
{
    ProductPrice::query()->create([
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'price' => $price,
        'currency' => 'USD',
        'is_active' => true,
    ]);
}

function trainingCartSession(Product $product, ?array $meta = null): array
{
    /** @var ProductPrice $price */
    $price = $product->prices()->whereNull('membership_tier_id')->firstOrFail();

    return [
        $product->id => [
            'quantity' => 1,
            'unit_price' => (string) $price->price,
            'currency' => $price->currency,
            'membership_tier_id' => null,
            'meta' => $meta,
        ],
    ];
}

function courseCheckoutBilling(string $email): array
{
    return [
        'billing_name' => 'Training Buyer',
        'billing_email' => $email,
        'billing_address' => '1 Test Street',
        'billing_city' => 'Columbia',
        'billing_state' => 'Maryland',
        'billing_postcode' => '21044',
        'billing_country' => 'USA',
        'billing_phone' => '+1 555 0100',
    ];
}

it('creates a course enrollment after a Stripe training purchase is paid', function (): void {
    $catalog = trainingCatalog();
    $course = trainingCourse($catalog);
    $product = trainingProduct($catalog);
    seedTrainingPrice($product);
    $user = User::factory()->create();

    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('createPayment')
        ->once()
        ->andReturn([
            'gateway_id' => 'pi_course_123',
            'client_secret' => 'cs_course_123',
            'status' => 'requires_payment_method',
        ]);
    $stripe->shouldReceive('capturePayment')
        ->once()
        ->with('pi_course_123')
        ->andReturn([
            'gateway_id' => 'pi_course_123',
            'status' => 'succeeded',
        ]);
    $this->instance(StripeGateway::class, $stripe);

    $this->actingAs($user)
        ->withSession(['cart.items' => trainingCartSession($product)])
        ->post('/checkout/', courseCheckoutBilling($user->email) + ['gateway' => 'stripe'])
        ->assertRedirect();

    $order = Order::query()->latest('id')->firstOrFail();

    $this->actingAs($user)->get("/payment/{$order->id}/start")->assertOk();
    $this->actingAs($user)->get("/payment/{$order->id}/success")->assertRedirect("/order/{$order->id}/receipt");

    $enrollment = CourseEnrollment::query()->firstOrFail();

    expect($enrollment->user_id)->toBe($user->id)
        ->and($enrollment->course_id)->toBe($course->id)
        ->and($enrollment->order_id)->toBe($order->id)
        ->and($enrollment->status)->toBe('enrolled')
        ->and($course->fresh()->enrolled_count)->toBe(1);
});

it('uses selected training option metadata to resolve the correct course after a Stripe purchase', function (): void {
    $catalog = trainingCatalog();
    $targetCourse = trainingCourse($catalog, [
        'title' => 'February Cohort',
        'slug' => 'february-cohort',
        'starts_at' => now()->setDate(2026, 2, 7)->setTime(9, 0),
        'ends_at' => now()->setDate(2026, 2, 11)->setTime(17, 0),
    ]);
    trainingCourse($catalog, [
        'title' => 'March Cohort',
        'slug' => 'march-cohort',
        'starts_at' => now()->setDate(2026, 3, 12)->setTime(9, 0),
        'ends_at' => now()->setDate(2026, 3, 16)->setTime(17, 0),
    ]);
    $product = trainingProduct($catalog);
    seedTrainingPrice($product, '499.00');
    $user = User::factory()->create();

    $stripe = Mockery::mock(StripeGateway::class);
    $stripe->shouldReceive('createPayment')
        ->once()
        ->andReturn([
            'gateway_id' => 'pi_course_option_456',
            'client_secret' => 'cs_course_option_456',
            'status' => 'requires_payment_method',
        ]);
    $stripe->shouldReceive('capturePayment')
        ->once()
        ->with('pi_course_option_456')
        ->andReturn([
            'gateway_id' => 'pi_course_option_456',
            'status' => 'succeeded',
        ]);
    $this->instance(StripeGateway::class, $stripe);

    $this->actingAs($user)
        ->withSession(['cart.items' => trainingCartSession($product, ['selected_option' => 'FEB 7-11, 2026'])])
        ->post('/checkout/', courseCheckoutBilling($user->email) + ['gateway' => 'stripe'])
        ->assertRedirect();

    $order = Order::query()->latest('id')->firstOrFail();

    $this->actingAs($user)
        ->get("/payment/{$order->id}/start")
        ->assertOk()
        ->assertSee('Pay securely with Stripe');

    $this->actingAs($user)
        ->get("/payment/{$order->id}/success")
        ->assertRedirect("/order/{$order->id}/receipt");

    $enrollment = CourseEnrollment::query()->firstOrFail();

    expect($enrollment->course_id)->toBe($targetCourse->id)
        ->and($targetCourse->fresh()->enrolled_count)->toBe(1);
});

it('does not create duplicate enrollments when the same training order is marked paid twice', function (): void {
    $catalog = trainingCatalog();
    $course = trainingCourse($catalog);
    $product = trainingProduct($catalog);
    $user = User::factory()->create();

    $order = Order::query()->create([
        'user_id' => $user->id,
        'billing_email' => $user->email,
        'billing_name' => 'Training Buyer',
        'order_number' => 'AAPSCM-COURSE-' . uniqid(),
        'status' => 'processing',
        'payment_method' => 'stripe',
        'payment_intent_id' => 'pi_duplicate_course',
        'payment_status' => 'unpaid',
        'currency' => 'USD',
        'subtotal' => '299.00',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '299.00',
    ]);

    OrderItem::query()->create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'membership_tier_id' => null,
        'quantity' => 1,
        'unit_price' => '299.00',
        'total_price' => '299.00',
        'item_type' => 'training',
    ]);

    $payments = app(OrderPaymentService::class);

    expect($payments->markPaid($order, ['status' => 'succeeded']))->toBeTrue()
        ->and($payments->markPaid($order, ['status' => 'succeeded']))->toBeFalse();

    expect(CourseEnrollment::query()->count())->toBe(1)
        ->and(CourseEnrollment::query()->first()?->course_id)->toBe($course->id)
        ->and($course->fresh()->enrolled_count)->toBe(1);
});

it('allows guests to check out training products and create an order', function (): void {
    $catalog = trainingCatalog();
    $product = trainingProduct($catalog);
    seedTrainingPrice($product);

    $this->withSession(['cart.items' => trainingCartSession($product)])
        ->get('/checkout/')
        ->assertOk();

    $this->withSession(['cart.items' => trainingCartSession($product)])
        ->post('/checkout/', courseCheckoutBilling('guest@example.com') + ['gateway' => 'stripe'])
        ->assertRedirect();

    expect(Order::query()->count())->toBe(1)
        ->and(CourseEnrollment::query()->count())->toBe(0);
});
