<?php

declare(strict_types=1);

namespace App\Actions\Cart;

use App\Models\Product;
use App\Models\User;
use App\Services\CartService;

class AddProductToCartBySourceIdAction
{
    public function __construct(private CartService $cart) {}

    public function __invoke(mixed $sourceId, ?User $user = null): ?Product
    {
        if (! is_numeric($sourceId)) {
            return null;
        }

        $product = Product::query()
            ->where('source_id', (int) $sourceId)
            ->where('is_active', true)
            ->first();

        if (! $product instanceof Product) {
            return null;
        }

        try {
            $this->cart->add($product, 1, $user);
        } catch (\RuntimeException) {
            return null;
        }

        return $product;
    }
}