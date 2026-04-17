<?php

namespace App\Services;

use App\Models\Product;
use App\Models\User;

class PricingService
{
    /**
     * Resolve the correct price of a product for a given user.
     * Members get member_price; non-members get non_member_price (or the base price).
     *
     * @return string Decimal string safe for storage
     */
    public function resolveProductPrice(Product $product, ?User $user): string
    {
        $isMember = $user !== null && $this->userIsMember($user);

        if ($isMember && $product->member_price !== null) {
            return number_format((float) $product->member_price, 2, '.', '');
        }

        $price = $product->non_member_price ?? $product->price;

        return number_format((float) $price, 2, '.', '');
    }

    /**
     * Determine if a user is currently an active member.
     */
    public function userIsMember(?User $user): bool
    {
        if ($user === null) {
            return false;
        }

        return $user->memberships()
            ->where('status', 'active')
            ->where('expires_at', '>', now())
            ->exists();
    }

    /**
     * Calculate order totals: subtotal, tax, discount, total.
     *
     * @param  array<array{price: string, quantity: int, discount?: string}>  $lineItems
     * @param  float  $taxRate  e.g. 0.0 for no tax
     * @return array{subtotal: string, tax: string, discount: string, total: string}
     */
    public function calculateOrderTotals(array $lineItems, float $taxRate = 0.0): array
    {
        $subtotal = array_reduce($lineItems, function (float $carry, array $item): float {
            return $carry + ((float) $item['price'] * $item['quantity']);
        }, 0.0);

        $discount = array_reduce($lineItems, function (float $carry, array $item): float {
            return $carry + (float) ($item['discount'] ?? 0.0);
        }, 0.0);

        $taxable = $subtotal - $discount;
        $tax = round($taxable * $taxRate, 2);
        $total = $taxable + $tax;

        return [
            'subtotal' => number_format($subtotal, 2, '.', ''),
            'tax' => number_format($tax, 2, '.', ''),
            'discount' => number_format($discount, 2, '.', ''),
            'total' => number_format($total, 2, '.', ''),
        ];
    }
}
