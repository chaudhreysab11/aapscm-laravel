<?php

declare(strict_types=1);

use App\Models\CertificationCatalog;
use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\MembershipTier;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\UserMembership;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

function memberPortalRoutes(): array
{
    return [
        '/my-account/',
        '/dashboard',
        '/dashboard/membership',
        '/dashboard/orders',
        '/dashboard/profile',
        '/dashboard/training',
    ];
}

function memberDashboardCatalog(): CertificationCatalog
{
    return CertificationCatalog::query()->create([
        'title' => 'Member Dashboard Catalog',
        'slug' => 'member-dashboard-catalog-' . uniqid(),
        'acronym' => 'MDC',
        'certifying_body' => 'AAPSCM',
        'credential_type' => 'supply_chain',
        'sort_order' => 1,
        'description' => 'Catalog for dashboard tests',
        'pdu_credits' => 0,
        'is_active' => true,
    ]);
}

function memberDashboardCourse(CertificationCatalog $catalog, string $title): Course
{
    return Course::query()->create([
        'title' => $title,
        'slug' => str($title)->slug() . '-' . uniqid(),
        'delivery_format' => 'virtual',
        'description' => 'Dashboard course description',
        'level' => 'beginner',
        'duration_hours' => 6,
        'starts_at' => now()->addWeek(),
        'ends_at' => now()->addWeeks(2),
        'max_seats' => 40,
        'enrolled_count' => 0,
        'certification_catalog_id' => $catalog->id,
        'is_published' => true,
    ]);
}

it('redirects guests to login when accessing member portal routes', function (): void {
    foreach (memberPortalRoutes() as $route) {
        $this->get($route)
            ->assertRedirect('/login');
    }
});

it('redirects authenticated members from my-account to the dashboard', function (): void {
    $member = User::factory()->create();

    $this->actingAs($member)
        ->get('/my-account/')
        ->assertRedirect(route('dashboard', absolute: false));
});

it('renders the member dashboard with the required navigation and membership summary', function (): void {
    $user = User::factory()->create([
        'job_title' => 'Procurement Manager',
        'company' => 'AAPSCM Holdings',
        'country' => 'USA',
    ]);

    $tier = MembershipTier::query()->create([
        'name' => 'Chartered Member',
        'slug' => 'chartered-member',
        'code' => 'CM',
        'description' => 'Chartered member tier',
        'is_active' => true,
        'sort_order' => 1,
    ]);

    UserMembership::query()->create([
        'user_id' => $user->id,
        'membership_tier_id' => $tier->id,
        'status' => 'active',
        'billing_cycle' => 'annual',
        'starts_at' => now()->subMonth(),
        'expires_at' => now()->addYear(),
        'auto_renew' => false,
    ]);

    $this->actingAs($user)
        ->get('/dashboard')
        ->assertOk()
        ->assertSee('Member Dashboard')
        ->assertSee('Dashboard Home')
        ->assertSee('Membership Profile')
        ->assertSee('Orders')
        ->assertSee('Profile')
        ->assertSee('Enrolled Courses / Training')
        ->assertSee('Logout')
        ->assertSee('Chartered Member')
        ->assertSee('Procurement Manager');
});

it('shows clean empty states when the authenticated member has no membership orders or enrollments', function (): void {
    $member = User::factory()->create();

    $this->actingAs($member)
        ->get('/dashboard/membership')
        ->assertOk()
        ->assertSee('No membership profile attached');

    $this->actingAs($member)
        ->get('/dashboard/orders')
        ->assertOk()
        ->assertSee('No orders have been recorded');

    $this->actingAs($member)
        ->get('/dashboard/training')
        ->assertOk()
        ->assertSee('No training records linked');
});

it('shows only the authenticated members own orders enrollments and membership data across portal pages', function (): void {
    $member = User::factory()->create();
    $otherUser = User::factory()->create();

    $memberTier = MembershipTier::query()->create([
        'name' => 'Corporate Fellow',
        'slug' => 'corporate-fellow',
        'code' => 'CF',
        'description' => 'Corporate fellow tier',
        'is_active' => true,
        'sort_order' => 1,
    ]);

    $otherTier = MembershipTier::query()->create([
        'name' => 'Other Tier',
        'slug' => 'other-tier',
        'code' => 'OT',
        'description' => 'Other tier',
        'is_active' => true,
        'sort_order' => 2,
    ]);

    UserMembership::query()->create([
        'user_id' => $member->id,
        'membership_tier_id' => $memberTier->id,
        'status' => 'active',
        'billing_cycle' => 'annual',
        'starts_at' => now()->subMonth(),
        'expires_at' => now()->addYear(),
        'auto_renew' => false,
    ]);

    UserMembership::query()->create([
        'user_id' => $otherUser->id,
        'membership_tier_id' => $otherTier->id,
        'status' => 'active',
        'billing_cycle' => 'annual',
        'starts_at' => now()->subMonth(),
        'expires_at' => now()->addYear(),
        'auto_renew' => false,
    ]);

    Order::query()->create([
        'user_id' => $member->id,
        'billing_email' => $member->email,
        'billing_name' => $member->name,
        'order_number' => 'AAPSCM-MEMBER-ORDER',
        'status' => 'completed',
        'payment_method' => 'stripe',
        'payment_status' => 'paid',
        'currency' => 'USD',
        'subtotal' => '120.00',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '120.00',
    ]);

    Order::query()->create([
        'user_id' => $otherUser->id,
        'billing_email' => $otherUser->email,
        'billing_name' => $otherUser->name,
        'order_number' => 'AAPSCM-OTHER-ORDER',
        'status' => 'completed',
        'payment_method' => 'stripe',
        'payment_status' => 'paid',
        'currency' => 'USD',
        'subtotal' => '90.00',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '90.00',
    ]);

    $catalog = memberDashboardCatalog();
    $memberCourse = memberDashboardCourse($catalog, 'Member Procurement Foundations');
    $otherCourse = memberDashboardCourse($catalog, 'Other User Course');

    CourseEnrollment::query()->create([
        'user_id' => $member->id,
        'course_id' => $memberCourse->id,
        'order_id' => null,
        'status' => 'enrolled',
        'enrolled_at' => now(),
    ]);

    CourseEnrollment::query()->create([
        'user_id' => $otherUser->id,
        'course_id' => $otherCourse->id,
        'order_id' => null,
        'status' => 'enrolled',
        'enrolled_at' => now(),
    ]);

    $this->actingAs($member)
        ->get('/dashboard/membership')
        ->assertOk()
        ->assertSee('Corporate Fellow')
        ->assertDontSee('Other Tier');

    $this->actingAs($member)
        ->get('/dashboard/orders')
        ->assertOk()
        ->assertSee('AAPSCM-MEMBER-ORDER')
        ->assertDontSee('AAPSCM-OTHER-ORDER');

    $this->actingAs($member)
        ->get('/dashboard/training')
        ->assertOk()
        ->assertSee('Member Procurement Foundations')
        ->assertDontSee('Other User Course');
});

it('shows paid self-paced training purchases even when no course enrollment was created', function (): void {
    $member = User::factory()->create();

    $product = Product::query()->create([
        'name' => 'Self-Paced Online Learning- Certified AI-Enabled Travel Personalization & Digital Marketing Manager (AITP-DMM)®',
        'slug' => 'wp-product-101640',
        'category' => 'Online Course/Exam Payment',
        'type' => 'training',
        'is_active' => true,
    ]);

    $order = Order::query()->create([
        'user_id' => $member->id,
        'billing_email' => $member->email,
        'billing_name' => $member->name,
        'order_number' => 'AAPSCM-AITPDMM-ORDER',
        'status' => 'completed',
        'payment_method' => 'stripe',
        'payment_status' => 'paid',
        'currency' => 'USD',
        'subtotal' => '499.00',
        'tax' => '0.00',
        'discount' => '0.00',
        'total' => '499.00',
    ]);

    OrderItem::query()->create([
        'order_id' => $order->id,
        'product_id' => $product->id,
        'quantity' => 1,
        'unit_price' => '499.00',
        'total_price' => '499.00',
        'item_type' => 'training',
    ]);

    $this->actingAs($member)
        ->get('/dashboard')
        ->assertOk()
        ->assertSee('Self-Paced Online Learning- Certified AI-Enabled Travel Personalization & Digital Marketing Manager (AITP-DMM)®')
        ->assertSee('Purchased');

    $this->actingAs($member)
        ->get('/dashboard/training')
        ->assertOk()
        ->assertSee('Self-Paced Online Learning- Certified AI-Enabled Travel Personalization & Digital Marketing Manager (AITP-DMM)®')
        ->assertSee('Self-paced online learning')
        ->assertSee('AAPSCM-AITPDMM-ORDER');
});
