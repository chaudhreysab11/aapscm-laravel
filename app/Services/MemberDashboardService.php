<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class MemberDashboardService
{
    /**
     * @return array<string, mixed>
     */
    public function build(User $user): array
    {
        $membership = $user->memberships()
            ->with('tier')
            ->orderByDesc('starts_at')
            ->orderByDesc('id')
            ->first();

        $ordersQuery = $user->orders()->latest('created_at');
        $enrollmentsQuery = $user->courseEnrollments()->with('course')->latest('enrolled_at');
        $trainingPurchases = $this->buildFallbackTrainingPurchases($user);

        $recentOrders = (clone $ordersQuery)
            ->limit(4)
            ->get();

        $orders = (clone $ordersQuery)
            ->limit(20)
            ->get();

        $recentEnrollments = (clone $enrollmentsQuery)
            ->limit(4)
            ->get();

        $enrollments = (clone $enrollmentsQuery)
            ->limit(20)
            ->get();
        $recentTrainingPurchases = $trainingPurchases
            ->take(4)
            ->values();
        $trainingPurchases = $trainingPurchases
            ->take(20)
            ->values();

        $profilePayload = is_array($user->profile_payload) ? $user->profile_payload : [];
        $paidOrdersTotal = (float) $user->orders()->where('payment_status', 'paid')->sum('total');
        $memberSince = $user->memberships()->min('starts_at');
        $resolvedEnrollmentCount = $user->courseEnrollments()->whereIn('status', ['enrolled', 'completed'])->count();

        $profileItems = array_filter([
            'Email Address' => $user->email,
            'Phone' => $user->phone,
            'Job Title' => $user->job_title,
            'Company' => $user->company,
            'Country' => $user->country,
            'Industry' => is_string($profilePayload['industry'] ?? null) ? $profilePayload['industry'] : null,
        ], static fn (mixed $value): bool => is_string($value) && trim($value) !== '');

        return [
            'member' => $user,
            'membership' => $membership,
            'recentOrders' => $recentOrders,
            'orders' => $orders,
            'recentEnrollments' => $recentEnrollments,
            'enrollments' => $enrollments,
            'recentTrainingPurchases' => $recentTrainingPurchases,
            'trainingPurchases' => $trainingPurchases,
            'profileItems' => $profileItems,
            'memberSince' => $memberSince,
            'stats' => [
                'membership_label' => $membership?->tier?->name ?? 'No active membership',
                'orders_count' => $user->orders()->count(),
                'paid_total' => number_format($paidOrdersTotal, 2, '.', ''),
                'enrollment_count' => $resolvedEnrollmentCount + $trainingPurchases->count(),
            ],
        ];
    }

    /**
     * @return Collection<int, array<string, mixed>>
     */
    private function buildFallbackTrainingPurchases(User $user): Collection
    {
        $orders = $user->orders()
            ->where('payment_status', 'paid')
            ->with(['items.product'])
            ->latest('created_at')
            ->get();

        $catalogIds = $orders
            ->flatMap(fn (Order $order): Collection => $order->items->pluck('product.certification_catalog_id'))
            ->filter(fn (mixed $catalogId): bool => is_int($catalogId))
            ->unique()
            ->values();

        $catalogsWithCourses = $catalogIds->isEmpty()
            ? collect()
            : Course::query()
                ->whereIn('certification_catalog_id', $catalogIds)
                ->pluck('certification_catalog_id')
                ->filter(fn (mixed $catalogId): bool => is_int($catalogId))
                ->unique()
                ->values();

        return $orders
            ->flatMap(function (Order $order) use ($catalogsWithCourses): Collection {
                return $order->items
                    ->filter(function (OrderItem $item) use ($catalogsWithCourses): bool {
                        /** @var Product|null $product */
                        $product = $item->product;

                        if (! $product instanceof Product || $item->item_type !== 'training' || ! $product->isTrainingProduct()) {
                            return false;
                        }

                        return $product->certification_catalog_id === null
                            || ! $catalogsWithCourses->contains($product->certification_catalog_id);
                    })
                    ->map(function (OrderItem $item) use ($order): array {
                        /** @var Product $product */
                        $product = $item->product;

                        return [
                            'product_name' => $product->name,
                            'delivery_label' => $this->inferTrainingDeliveryLabel($product),
                            'status_label' => 'Purchased',
                            'status_tone' => 'brand',
                            'order_number' => $order->order_number,
                            'purchased_at' => $order->created_at,
                        ];
                    });
            })
            ->unique(fn (array $purchase): string => $purchase['order_number'] . '|' . $purchase['product_name'])
            ->values();
    }

    private function inferTrainingDeliveryLabel(Product $product): string
    {
        $name = Str::lower($product->name);

        return match (true) {
            str_contains($name, 'self-paced') => 'Self-paced online learning',
            str_contains($name, 'hyperflex'), str_contains($name, 'in-seat') => 'In-seat or hyperflex',
            str_contains($name, 'virtual') => 'Virtual training',
            default => 'Training purchase',
        };
    }
}
