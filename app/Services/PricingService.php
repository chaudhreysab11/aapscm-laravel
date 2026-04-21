<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductPrice;
use App\Models\User;
use App\Models\UserMembership;

class PricingService
{
    /**
     * Resolve the price a given user should pay for a product.
     *
     * Looks up `product_prices` rows for the product. If the user is an
     * active member, a tier-specific price is preferred when present;
     * otherwise (or for guests / non-members) the public/non-member price
     * (membership_tier_id IS NULL) is used.
     *
     * @return array{price: string, currency: string, membership_tier_id: int|null}
     */
    public function resolvePrice(Product $product, ?User $user): array
    {
        $tierId = $this->activeTierId($user);

        if ($tierId !== null) {
            /** @var ProductPrice|null $memberPrice */
            $memberPrice = $product->prices()
                ->where('is_active', true)
                ->where('membership_tier_id', $tierId)
                ->first();

            if ($memberPrice !== null) {
                return [
                    'price' => number_format((float) $memberPrice->price, 2, '.', ''),
                    'currency' => $memberPrice->currency,
                    'membership_tier_id' => $tierId,
                ];
            }
        }

        /** @var ProductPrice|null $publicPrice */
        $publicPrice = $product->prices()
            ->where('is_active', true)
            ->whereNull('membership_tier_id')
            ->first();

        if ($publicPrice === null) {
            // Hard fail rather than silently selling for $0.00. A product with no
            // active price row is a data/seed error and must be surfaced.
            throw new \RuntimeException(
                "Product #{$product->id} ({$product->slug}) has no active price configured."
            );
        }

        return [
            'price' => number_format((float) $publicPrice->price, 2, '.', ''),
            'currency' => $publicPrice->currency,
            'membership_tier_id' => null,
        ];
    }

    /**
     * Return the membership_tier_id of the user's currently-active membership,
     * or null if the user is a guest or has no active membership.
     */
    public function activeTierId(?User $user): ?int
    {
        if ($user === null) {
            return null;
        }

        /** @var UserMembership|null $active */
        $active = $user->memberships()
            ->where('status', 'active')
            ->where('expires_at', '>', now())
            ->latest('starts_at')
            ->first();

        return $active?->membership_tier_id;
    }

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
