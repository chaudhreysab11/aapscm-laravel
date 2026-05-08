<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Support\Collection;

class CartPricingService
{
    public function __construct(
        private PricingService $pricing,
        private CouponService $coupons,
    ) {}

    /**
     * @param  Collection<int, array{product:mixed, quantity:int, unit_price:string, line_total:string, currency:string, membership_tier_id:int|null, meta:array<string, scalar>|null}>  $items
     * @return array{totals:array{subtotal:string, tax:string, discount:string, total:string}, coupon:?array{id:int, code:string, type:string, value:string, discount:string}, coupon_code:?string, coupon_error:?string}
     */
    public function summarize(Collection $items, ?string $couponCode): array
    {
        $lineItems = $items
            ->map(fn (array $line): array => [
                'price' => $line['unit_price'],
                'quantity' => $line['quantity'],
            ])
            ->values()
            ->all();

        $subtotal = (float) $items->sum(fn (array $line): float => (float) $line['line_total']);
        $couponState = $this->coupons->evaluate($couponCode, $subtotal);
        $totals = $this->pricing->calculateOrderTotals(
            $lineItems,
            0.0,
            (float) $couponState['discount'],
        );

        $coupon = $couponState['coupon'];

        return [
            'totals' => $totals,
            'coupon' => $coupon === null ? null : [
                'id' => $coupon->id,
                'code' => $coupon->code,
                'type' => $coupon->type,
                'value' => number_format((float) $coupon->value, 2, '.', ''),
                'discount' => $couponState['discount'],
            ],
            'coupon_code' => $couponState['normalized_code'],
            'coupon_error' => $couponState['error'],
        ];
    }
}
