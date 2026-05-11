<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Session;

/**
 * Session-backed shopping cart.
 *
 * Items are stored under the session key 'cart.items' as:
 *   [ product_id => ['quantity' => int, 'unit_price' => string,
 *                    'currency' => string, 'membership_tier_id' => int|null,
 *                    'meta' => array<string, scalar>|null] ]
 */
class CartService
{
    private const SESSION_KEY = 'cart.items';
    private const COUPON_SESSION_KEY = 'cart.coupon_code';

    public function __construct(private PricingService $pricingService) {}

    /**
     * @param  array<string, scalar>|array{}|null  $meta
     */
    public function add(Product $product, int $quantity = 1, ?User $user = null, ?array $meta = null): void
    {
        $items = $this->raw();
        $quantity = max(1, $quantity);
        $meta = $this->sanitizeMeta($meta);

        if (isset($items[$product->id])) {
            $items[$product->id]['quantity'] = $quantity;

            if ($meta !== []) {
                $items[$product->id]['meta'] = $meta;
            }
        } else {
            $resolved = $this->pricingService->resolvePrice($product, $user);

            $items[$product->id] = [
                'quantity' => $quantity,
                'unit_price' => $resolved['price'],
                'currency' => $resolved['currency'],
                'membership_tier_id' => $resolved['membership_tier_id'],
                'meta' => $meta !== [] ? $meta : null,
            ];
        }

        $this->storeRaw($items);
    }

    public function updateQuantity(int $productId, int $quantity): void
    {
        $items = $this->raw();

        if (! isset($items[$productId])) {
            return;
        }

        if ($quantity <= 0) {
            unset($items[$productId]);
        } else {
            $items[$productId]['quantity'] = $quantity;
        }

        $this->storeRaw($items);
    }

    public function remove(int $productId): void
    {
        $items = $this->raw();
        unset($items[$productId]);
        $this->storeRaw($items);
    }

    /**
     * Hydrated cart items as a Collection of arrays:
     *   ['product' => Product, 'quantity' => int, 'unit_price' => string,
    *    'line_total' => string, 'currency' => string, 'membership_tier_id' => int|null,
    *    'meta' => array<string, scalar>|null]
     */
    public function items(): Collection
    {
        $raw = $this->raw();

        if ($raw === []) {
            return collect();
        }

        $products = Product::query()->whereIn('id', array_keys($raw))->get()->keyBy('id');

        return collect($raw)
            ->filter(fn (array $row, int $productId): bool => $products->has($productId))
            ->map(function (array $row, int $productId) use ($products): array {
                $product = $products[$productId];
                $unitPrice = (float) $row['unit_price'];
                $quantity = (int) $row['quantity'];

                return [
                    'product' => $product,
                    'quantity' => $quantity,
                    'unit_price' => number_format($unitPrice, 2, '.', ''),
                    'line_total' => number_format($unitPrice * $quantity, 2, '.', ''),
                    'currency' => $row['currency'],
                    'membership_tier_id' => $row['membership_tier_id'] ?? null,
                    'meta' => is_array($row['meta'] ?? null) ? $row['meta'] : null,
                ];
            })
            ->values();
    }

    public function subtotal(): string
    {
        $total = $this->items()->sum(fn (array $line): float => (float) $line['line_total']);

        return number_format($total, 2, '.', '');
    }

    public function isEmpty(): bool
    {
        return $this->raw() === [];
    }

    public function count(): int
    {
        return array_sum(array_column($this->raw(), 'quantity'));
    }

    public function clear(): void
    {
        Session::forget([self::SESSION_KEY, self::COUPON_SESSION_KEY]);
    }

    public function couponCode(): ?string
    {
        $code = Session::get(self::COUPON_SESSION_KEY);

        if (! is_string($code) || trim($code) === '') {
            return null;
        }

        return trim($code);
    }

    public function applyCoupon(string $couponCode): void
    {
        Session::put(self::COUPON_SESSION_KEY, trim($couponCode));
    }

    public function removeCoupon(): void
    {
        Session::forget(self::COUPON_SESSION_KEY);
    }

    /**
     * @return array<int, array{quantity:int, unit_price:string, currency:string, membership_tier_id:int|null, meta:array<string, scalar>|null}>
     */
    private function raw(): array
    {
        return (array) Session::get(self::SESSION_KEY, []);
    }

    /**
     * @param  array<int, array{quantity:int, unit_price:string, currency:string, membership_tier_id:int|null, meta:array<string, scalar>|null}>  $items
     */
    private function storeRaw(array $items): void
    {
        if ($items === []) {
            Session::forget([self::SESSION_KEY, self::COUPON_SESSION_KEY]);

            return;
        }

        Session::put(self::SESSION_KEY, $items);
    }

    /**
     * @param  array<string, scalar>|array{}|null  $meta
     * @return array<string, scalar>
     */
    private function sanitizeMeta(?array $meta): array
    {
        if (! is_array($meta) || $meta === []) {
            return [];
        }

        return collect($meta)
            ->filter(static fn (mixed $value): bool => is_string($value) || is_int($value) || is_float($value) || is_bool($value))
            ->map(static fn (string|int|float|bool $value): string|int|float|bool => is_string($value) ? trim($value) : $value)
            ->filter(static fn (string|int|float|bool $value): bool => $value !== '')
            ->all();
    }
}
