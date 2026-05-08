<?php

declare(strict_types=1);

namespace App\Actions\Course;

use App\Models\Course;
use App\Models\CourseEnrollment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Support\Carbon;

class FulfillPaidCourseOrderAction
{
    public function __invoke(Order $order): void
    {
        if ($order->user_id === null) {
            return;
        }

        $order->loadMissing(['user', 'items.product']);

        if ($order->user === null) {
            return;
        }

        $order->items
            ->filter(function (OrderItem $item): bool {
                /** @var Product|null $product */
                $product = $item->product;

                return $item->item_type === 'training'
                    && $product instanceof Product
                    && $product->isTrainingProduct();
            })
            ->each(function (OrderItem $item) use ($order): void {
                $course = $this->resolveCourseForItem($item);

                if (! $course instanceof Course) {
                    return;
                }

                $enrollment = CourseEnrollment::query()->firstOrCreate(
                    [
                        'user_id' => $order->user_id,
                        'course_id' => $course->id,
                    ],
                    [
                        'order_id' => $order->id,
                        'status' => 'enrolled',
                        'enrolled_at' => now(),
                    ],
                );

                if ($enrollment->wasRecentlyCreated) {
                    $course->increment('enrolled_count');

                    return;
                }

                if ($enrollment->status === 'cancelled') {
                    $enrollment->update([
                        'order_id' => $order->id,
                        'status' => 'enrolled',
                        'enrolled_at' => now(),
                        'cancelled_at' => null,
                    ]);

                    $course->increment('enrolled_count');

                    return;
                }

                if ($enrollment->order_id === null) {
                    $enrollment->update(['order_id' => $order->id]);
                }
            });
    }

    private function resolveCourseForItem(OrderItem $item): ?Course
    {
        /** @var Product|null $product */
        $product = $item->product;

        if (! $product instanceof Product) {
            return null;
        }

        $meta = is_array($item->meta) ? $item->meta : [];
        $explicitCourseId = $meta['course_id'] ?? null;

        if (is_numeric($explicitCourseId)) {
            return Course::query()->find((int) $explicitCourseId);
        }

        if ($product->certification_catalog_id === null) {
            return null;
        }

        $query = Course::query()->where('certification_catalog_id', $product->certification_catalog_id);
        $selectedOption = isset($meta['selected_option']) && is_string($meta['selected_option'])
            ? trim($meta['selected_option'])
            : null;

        if ($selectedOption !== null && $selectedOption !== '') {
            $matched = $query->get()->first(fn (Course $course): bool => $this->courseMatchesSelectedOption($course, $selectedOption));

            if ($matched instanceof Course) {
                return $matched;
            }
        }

        return $query
            ->orderByDesc('is_published')
            ->orderByRaw('starts_at is null')
            ->orderBy('starts_at')
            ->orderBy('id')
            ->first();
    }

    private function courseMatchesSelectedOption(Course $course, string $selectedOption): bool
    {
        $normalized = $this->normalizeSelection($selectedOption);

        if ($course->starts_at === null) {
            return false;
        }

        $candidates = [
            strtoupper($course->starts_at->format('M j, Y')),
            strtoupper($course->starts_at->format('F j, Y')),
        ];

        if ($course->ends_at !== null) {
            $sameMonth = $course->starts_at->isSameMonth($course->ends_at) && $course->starts_at->isSameYear($course->ends_at);

            if ($sameMonth) {
                $candidates[] = strtoupper($course->starts_at->format('M ') . $course->starts_at->format('j') . '-' . $course->ends_at->format('j, Y'));
                $candidates[] = strtoupper($course->starts_at->format('F ') . $course->starts_at->format('j') . '-' . $course->ends_at->format('j, Y'));
            } else {
                $candidates[] = strtoupper($course->starts_at->format('M j') . '-' . $course->ends_at->format('M j, Y'));
                $candidates[] = strtoupper($course->starts_at->format('F j') . '-' . $course->ends_at->format('F j, Y'));
            }
        }

        return collect($candidates)
            ->map(fn (string $candidate): string => $this->normalizeSelection($candidate))
            ->contains($normalized);
    }

    private function normalizeSelection(string $value): string
    {
        return (string) preg_replace('/\s+/', ' ', strtoupper(trim($value)));
    }
}
