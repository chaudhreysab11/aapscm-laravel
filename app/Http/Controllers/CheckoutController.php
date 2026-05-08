<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Cart\AddProductToCartBySourceIdAction;
use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartPricingService;
use App\Services\CartService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(
        private CartService $cart,
        private CartPricingService $cartPricing,
        private AddProductToCartBySourceIdAction $addProductToCartBySourceId,
    ) {}

    public function show(Request $request): View|RedirectResponse
    {
        if ($request->query->has('add-to-cart')) {
            $product = ($this->addProductToCartBySourceId)(
                $request->query('add-to-cart'),
                $request->user(),
            );

            if (! $product instanceof Product) {
                return redirect()
                    ->route('cart.show')
                    ->with('error', 'The requested product is not available.');
            }

            return redirect()
                ->route('cart.show')
                ->with('success', "{$product->name} added to your cart.");
        }

        if ($this->cart->isEmpty()) {
            return redirect()->route('cart.show')
                ->with('error', 'Your cart is currently empty. Add a product before checking out.');
        }

        $items = $this->cart->items();
        $summary = $this->cartPricing->summarize($items, $this->cart->couponCode());
        $couponError = $summary['coupon_error'];

        if ($couponError !== null) {
            $this->cart->removeCoupon();
            $summary = $this->cartPricing->summarize($items, null);
            $request->session()->now('error', $couponError);
        }

        return view('cms.page.checkout', [
            'items' => $items,
            'subtotal' => $summary['totals']['subtotal'],
            'totals' => $summary['totals'],
            'appliedCoupon' => $summary['coupon'],
        ]);
    }

    public function store(StoreCheckoutRequest $request): RedirectResponse
    {
        if ($this->cart->isEmpty()) {
            return redirect('/checkout/')->with('error', 'Your cart is empty.');
        }

        $items = $this->cart->items();
        $summary = $this->cartPricing->summarize($items, $this->cart->couponCode());

        if ($summary['coupon_error'] !== null) {
            $this->cart->removeCoupon();

            return redirect()->route('checkout.show')->with('error', $summary['coupon_error']);
        }

        $totals = $summary['totals'];
        $appliedCoupon = $summary['coupon'];
        $currency = $items->first()['currency'] ?? 'USD';
        $data = $request->validated();
        $gateway = 'stripe';

        $billingName = trim((string) ($data['billing_name'] ?? ''));

        if ($billingName === '') {
            $billingName = trim(implode(' ', array_filter([
                $data['billing_first_name'] ?? null,
                $data['billing_last_name'] ?? null,
            ])));
        }

        $checkoutContext = [
            'allergic_to_peanuts' => $data['allergic_to_peanuts'] ?? null,
        ];

        if ($request->user() === null && $request->boolean('create_account')) {
            $checkoutContext['create_account'] = true;
        }

        $orderNotes = [
            'billing_address' => $data['billing_address'],
            'billing_address_line_2' => $data['billing_address_line_2'] ?? null,
            'billing_city' => $data['billing_city'],
            'billing_state' => $data['billing_state'] ?? null,
            'billing_postcode' => $data['billing_postcode'] ?? null,
            'billing_country' => $data['billing_country'],
            'billing_phone' => $data['billing_phone'] ?? null,
            'billing_company' => $data['billing_company'] ?? null,
            'customer_note' => $data['notes'] ?? null,
            'checkout_context' => array_filter($checkoutContext, static fn ($value): bool => $value !== null && $value !== ''),
        ];

        $order = DB::transaction(function () use ($items, $totals, $appliedCoupon, $currency, $data, $request, $billingName, $orderNotes, $gateway): Order {
            $order = Order::create([
                'user_id' => $request->user()?->id,
                'billing_email' => $data['billing_email'],
                'billing_name' => $billingName,
                'order_number' => $this->generateOrderNumber(),
                'status' => 'pending',
                'payment_method' => $gateway,
                'payment_status' => 'unpaid',
                'currency' => $currency,
                'subtotal' => $totals['subtotal'],
                'tax' => $totals['tax'],
                'discount' => $totals['discount'],
                'coupon_id' => $appliedCoupon['id'] ?? null,
                'coupon_code' => $appliedCoupon['code'] ?? null,
                'coupon_type' => $appliedCoupon['type'] ?? null,
                'coupon_value' => $appliedCoupon['value'] ?? null,
                'total' => $totals['total'],
                'notes' => json_encode(array_filter($orderNotes, static fn ($value): bool => $value !== null && $value !== '')),
            ]);

            foreach ($items as $line) {
                /** @var Product $product */
                $product = $line['product'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'membership_tier_id' => $line['membership_tier_id'] ?? null,
                    'quantity' => $line['quantity'],
                    'unit_price' => $line['unit_price'],
                    'total_price' => $line['line_total'],
                    'item_type' => $product->type,
                    'meta' => $line['meta'] ?? null,
                ]);
            }

            return $order;
        });

        // Bind the guest's billing email to the session so OrderPolicy can
        // grant them access to the receipt page within this browser session.
        if ($request->user() === null) {
            $request->session()->put('checkout.guest_email', $data['billing_email']);
        }

        return redirect()->route('payment.start', ['order' => $order->id]);
    }

    private function generateOrderNumber(): string
    {
        return 'AAPSCM-' . now()->format('Ymd') . '-' . strtoupper(Str::random(6));
    }
}
