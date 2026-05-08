<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Coupon;
use Illuminate\Support\Str;

class CouponService
{
    public function normalizeCode(string $code): string
    {
        return Str::upper(trim($code));
    }

    /**
     * @return array{coupon:?Coupon, normalized_code:?string, discount:string, error:?string}
     */
    public function evaluate(?string $couponCode, float $subtotal): array
    {
        if (! is_string($couponCode) || trim($couponCode) === '') {
            return [
                'coupon' => null,
                'normalized_code' => null,
                'discount' => '0.00',
                'error' => null,
            ];
        }

        $normalizedCode = $this->normalizeCode($couponCode);
        $coupon = Coupon::query()->where('code', $normalizedCode)->first();

        if ($coupon === null) {
            return $this->invalidResult($normalizedCode, 'That coupon code is not valid.');
        }

        if (! $coupon->is_active) {
            return $this->invalidResult($normalizedCode, 'That coupon is not active.');
        }

        if ($coupon->expires_at !== null && $coupon->expires_at->isPast()) {
            return $this->invalidResult($normalizedCode, 'That coupon has expired.');
        }

        if ($coupon->minimum_order_amount !== null && $subtotal < (float) $coupon->minimum_order_amount) {
            $minimum = number_format((float) $coupon->minimum_order_amount, 2, '.', '');

            return $this->invalidResult($normalizedCode, "This coupon requires a minimum order amount of USD {$minimum}.");
        }

        if ($coupon->usage_limit !== null && $this->usageCount($coupon) >= $coupon->usage_limit) {
            return $this->invalidResult($normalizedCode, 'That coupon has reached its usage limit.');
        }

        $discount = $this->calculateDiscount($coupon, $subtotal);

        if ((float) $discount <= 0.0) {
            return $this->invalidResult($normalizedCode, 'That coupon does not apply to the current cart.');
        }

        return [
            'coupon' => $coupon,
            'normalized_code' => $normalizedCode,
            'discount' => $discount,
            'error' => null,
        ];
    }

    public function calculateDiscount(Coupon $coupon, float $subtotal): string
    {
        $discount = match ($coupon->type) {
            'percentage' => round($subtotal * ((float) $coupon->value / 100), 2),
            'fixed' => round((float) $coupon->value, 2),
            default => 0.0,
        };

        return number_format(max(min($discount, $subtotal), 0.0), 2, '.', '');
    }

    public function usageCount(Coupon $coupon): int
    {
        return $coupon->orders()
            ->whereNotIn('status', ['cancelled'])
            ->count();
    }

    /**
     * @return array{coupon_id:int, coupon_code:string, coupon_type:string, coupon_value:string}
     */
    public function snapshot(Coupon $coupon): array
    {
        return [
            'coupon_id' => $coupon->id,
            'coupon_code' => $coupon->code,
            'coupon_type' => $coupon->type,
            'coupon_value' => number_format((float) $coupon->value, 2, '.', ''),
        ];
    }

    /**
     * @return array{coupon:null, normalized_code:string, discount:string, error:string}
     */
    private function invalidResult(string $normalizedCode, string $message): array
    {
        return [
            'coupon' => null,
            'normalized_code' => $normalizedCode,
            'discount' => '0.00',
            'error' => $message,
        ];
    }
}
