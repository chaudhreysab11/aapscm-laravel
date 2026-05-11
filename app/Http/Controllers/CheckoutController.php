<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Actions\Cart\AddProductToCartBySourceIdAction;
use App\Http\Requests\StoreCheckoutRequest;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Services\CartService;
use App\Services\PricingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    public function __construct(
        private CartService $cart,
        private PricingService $pricing,
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

            return redirect()->route('checkout.show');
        }

        if ($this->cart->isEmpty()) {
            return redirect()
                ->route('cart.show')
                ->with('error', 'Your cart is currently empty. Add a product before checking out.');
        }

        return view('cms.page.checkout', [
            'items' => $this->cart->items(),
            'subtotal' => $this->cart->subtotal(),
        ]);
    }

    public function store(StoreCheckoutRequest $request): RedirectResponse
    {
        if ($this->cart->isEmpty()) {
            return redirect('/checkout/')->with('error', 'Your cart is empty.');
        }

        $items = $this->cart->items();
        $subtotal = (float) $this->cart->subtotal();
        $currency = $items->first()['currency'] ?? 'USD';
        $data = $request->validated();

        $order = DB::transaction(function () use ($items, $subtotal, $currency, $data, $request): Order {
            $order = Order::create([
                'user_id' => $request->user()?->id,
                'billing_email' => $data['billing_email'],
                'billing_name' => $data['billing_name'],
                'order_number' => $this->generateOrderNumber(),
                'status' => 'pending',
                'payment_method' => $data['gateway'],
                'payment_status' => 'unpaid',
                'currency' => $currency,
                'subtotal' => number_format($subtotal, 2, '.', ''),
                'tax' => '0.00',
                'discount' => '0.00',
                'total' => number_format($subtotal, 2, '.', ''),
                'notes' => $data['notes'] ?? json_encode([
                    'billing_address' => $data['billing_address'],
                    'billing_city' => $data['billing_city'],
                    'billing_country' => $data['billing_country'],
                ]),
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
                    'meta' => null,
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
