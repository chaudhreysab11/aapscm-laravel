<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use App\Services\Payment\OrderPaymentService;
use App\Services\Payment\PaymentManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\URL;
use RuntimeException;

class PaymentController extends Controller
{
    public function __construct(
        private PaymentManager $payments,
        private CartService $cart,
        private OrderPaymentService $orderPayments,
    ) {}

    /**
     * Create a payment on the chosen gateway and redirect the user to the
     * approval/checkout flow (PayPal) or the success route (Stripe — captured
     * inline once the client-side payment intent is confirmed).
     */
    public function start(Order $order): RedirectResponse
    {
        if ($order->payment_status === 'paid') {
            return redirect($this->successUrl($order));
        }

        $gateway = $this->payments->gateway($order->payment_method ?? 'stripe');

        $result = $gateway->createPayment([
            'amount_cents' => (int) round(((float) $order->total) * 100),
            'currency' => $order->currency,
            'metadata' => ['order_id' => $order->id],
        ]);

        $order->update([
            'payment_intent_id' => $result['gateway_id'] ?? null,
            'status' => 'processing',
        ]);

        // PayPal returns an approve_url the buyer must visit before capture.
        if (! empty($result['approve_url'])) {
            return redirect()->away($result['approve_url']);
        }

        // Stripe (and any other inline-confirm gateway): proceed to success.
        return redirect($this->successUrl($order));
    }

    /**
     * Build a temporary signed URL for the success route. The buyer must
     * arrive via this URL; the `signed` middleware on the route rejects
     * un-signed or tampered requests with 403.
     */
    private function successUrl(Order $order): string
    {
        return URL::temporarySignedRoute(
            'payment.success',
            now()->addHour(),
            ['order' => $order->id],
        );
    }

    /**
     * Capture the payment with the gateway and mark the order paid.
     */
    public function success(Order $order): RedirectResponse
    {
        // Idempotent fast-path: order already settled (e.g. webhook arrived first).
        if ($order->payment_status === 'paid') {
            $this->cart->clear();

            return redirect($this->postPaymentRedirect($order))->with('success', 'Payment already confirmed.');
        }

        if ($order->payment_intent_id === null) {
            throw new RuntimeException('Order has no associated payment intent.');
        }

        $gateway = $this->payments->gateway($order->payment_method ?? 'stripe');

        $capture = $gateway->capturePayment($order->payment_intent_id);

        $status = strtolower((string) ($capture['status'] ?? ''));

        if (in_array($status, ['succeeded', 'completed', 'requires_capture'], true)) {
            // Single canonical paid-state transition. markPaid() is locked +
            // idempotent — if the webhook beat us to it, this is a no-op and
            // OrderPaid is NOT dispatched a second time.
            $this->orderPayments->markPaid($order, $capture);

            $this->cart->clear();

            return redirect($this->postPaymentRedirect($order))->with('success', 'Payment received. Thank you!');
        }

        $order->update(['payment_status' => 'failed', 'status' => 'cancelled']);

        return redirect()->route('payment.cancel', ['order' => $order->id])
            ->with('error', 'Payment could not be confirmed.');
    }

    /**
     * After a successful payment, authenticated members go to /dashboard.
     * Guests get a 7-day signed link to their order receipt page.
     */
    private function postPaymentRedirect(Order $order): string
    {
        if (auth()->check()) {
            return '/dashboard';
        }

        return URL::temporarySignedRoute(
            'order.receipt',
            now()->addDays(7),
            ['order' => $order->id],
        );
    }

    public function cancel(Order $order): RedirectResponse
    {
        if (! in_array($order->payment_status, ['paid', 'refunded'], true)) {
            $order->update(['status' => 'cancelled']);
        }

        return redirect('/checkout/')->with('error', 'Payment was cancelled.');
    }
}
