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

    public function show(Request $request): View
    {
        $items = $this->cart->items();
        $summary = $this->cartPricing->summarize($items, $this->cart->couponCode());
        $couponError = $summary['coupon_error'];

        if ($couponError !== null) {
            $this->cart->removeCoupon();
            $summary = $this->cartPricing->summarize($items, null);
            $request->session()->now('error', $couponError);
        }

        return view('cms.page.cart', [
            'items' => $items,
            'subtotal' => $summary['totals']['subtotal'],
            'totals' => $summary['totals'],
            'appliedCoupon' => $summary['coupon'],
        ]);
    }

    public function add(Request $request, string $product): RedirectResponse
    {
        $validated = $request->validate([
            'redirect_to' => ['nullable', 'string', 'max:2048'],
            'custom_options' => ['nullable', 'string', 'max:255'],
        ]);

        $product = $this->resolveProductForCart($product);
        $meta = array_filter([
            'selected_option' => isset($validated['custom_options']) && trim($validated['custom_options']) !== ''
                ? trim($validated['custom_options'])
                : null,
        ]);

        $this->cart->add($product, 1, $request->user(), $meta);

        return redirect()
            ->to($validated['redirect_to'] ?? route('cart.show'))
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

    public function applyCoupon(ApplyCouponRequest $request): RedirectResponse
    {
        if ($this->cart->isEmpty()) {
            return redirect()->route('cart.show')->with('error', 'Add an item to the cart before applying a coupon.');
        }

        $items = $this->cart->items();
        $summary = $this->cartPricing->summarize($items, $request->validated('coupon_code'));

        if ($summary['coupon_error'] !== null || $summary['coupon_code'] === null) {
            return redirect()->route('cart.show')->with('error', $summary['coupon_error'] ?? 'That coupon could not be applied.');
        }

        $this->cart->applyCoupon($summary['coupon_code']);

        return redirect()->route('cart.show')->with('success', "Coupon {$summary['coupon_code']} applied.");
    }

    public function removeCoupon(): RedirectResponse
    {
        $this->cart->removeCoupon();

        return redirect()->route('cart.show')->with('success', 'Coupon removed.');
    }
}
