<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\ApplyCouponRequest;
use App\Models\Product;
use App\Services\CartPricingService;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    public function __construct(
        private CartService $cart,
        private CartPricingService $cartPricing,
    ) {}

    public function show(): View
    {
        $items = $this->cart->items();
        $summary = $this->cartPricing->summarize($items, $this->cart->couponCode());

        return view('cms.page.cart', [
            'items' => $items,
            'subtotal' => $summary['totals']['subtotal'],
            'totals' => $summary['totals'],
            'appliedCoupon' => $summary['coupon'],
        ]);
    }

    public function applyCoupon(ApplyCouponRequest $request): RedirectResponse
    {
        $code = (string) $request->validated('coupon_code');
        $this->cart->applyCoupon($code);

        $summary = $this->cartPricing->summarize($this->cart->items(), $this->cart->couponCode());

        if ($summary['coupon_error'] !== null) {
            $this->cart->removeCoupon();

            return redirect()
                ->route('cart.show')
                ->with('error', $summary['coupon_error']);
        }

        if ($summary['coupon_code'] !== null) {
            $this->cart->applyCoupon($summary['coupon_code']);
        }

        return redirect()
            ->route('cart.show')
            ->with('success', 'Coupon applied.');
    }

    public function removeCoupon(): RedirectResponse
    {
        $this->cart->removeCoupon();

        return redirect()
            ->route('cart.show')
            ->with('success', 'Coupon removed.');
    }

    public function add(Request $request, string $product): RedirectResponse
    {
        $product = $this->resolveProductForCart($product);
        $quantity = (int) $request->input('quantity', 1);
        $meta = [];

        if ($request->filled('custom_options')) {
            $meta['selected_option'] = (string) $request->input('custom_options');
        }

        $this->cart->add($product, max(1, $quantity), $request->user(), $meta);

        return redirect()
            ->route('cart.show')
            ->with('success', "{$product->name} added to your cart.");
    }

    private function resolveProductForCart(string $identifier): Product
    {
        return Product::find($identifier)
            ?? Product::where('source_id', $identifier)->firstOrFail();
    }

    public function update(Request $request, Product $product): RedirectResponse
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:0', 'max:99'],
        ]);

        $this->cart->updateQuantity($product->id, (int) $validated['quantity']);

        return redirect()->route('cart.show')->with('success', 'Cart updated.');
    }

    public function remove(Product $product): RedirectResponse
    {
        $this->cart->remove($product->id);

        return redirect()->route('cart.show')->with('success', 'Item removed from cart.');
    }
}
