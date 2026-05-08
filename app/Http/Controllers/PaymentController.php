<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\CartService;
use App\Services\Payment\OrderPaymentService;
use App\Services\Payment\PaymentManager;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\URL;
use RuntimeException;
use Illuminate\View\View;

class PaymentController extends Controller
{
    public function __construct(
        private PaymentManager $payments,
        private CartService $cart,
        private OrderPaymentService $orderPayments,
    ) {}

    /**
     * Start or resume payment for the order.
     */
    public function start(Order $order): RedirectResponse|View
    {
        Gate::authorize('viewPayment', $order);

        if ($order->payment_status === 'paid') {
            return redirect($this->postPaymentRedirect($order))->with('success', 'Payment already confirmed.');
        }

        $gatewayKey = $order->payment_method ?? 'stripe';
        $gateway = $this->payments->gateway($gatewayKey);

        $result = $order->payment_intent_id !== null
            ? $gateway->getPayment($order->payment_intent_id)
            : $gateway->createPayment([
                'amount_cents' => (int) round(((float) $order->total) * 100),
                'currency' => $order->currency,
                'metadata' => ['order_id' => $order->id],
                'return_url' => route('payment.success', ['order' => $order->id]),
                'cancel_url' => route('payment.cancel', ['order' => $order->id]),
            ]);

        if ($order->payment_intent_id === null) {
            $order->update([
                'payment_intent_id' => $result['gateway_id'] ?? null,
                'status' => 'processing',
            ]);
        }

        if ($gatewayKey === 'paypal') {
            if (! empty($result['approve_url'])) {
                return redirect()->away($result['approve_url']);
            }

            throw new RuntimeException('PayPal approval URL could not be generated for this order.');
        }

        if (($result['client_secret'] ?? null) === null) {
            throw new RuntimeException('Stripe client secret could not be generated for this order.');
        }

        return view('cms.page.payment-stripe', [
            'order' => $order->load('items.product'),
            'publishableKey' => (string) config('services.stripe.key', ''),
            'clientSecret' => (string) $result['client_secret'],
            'returnUrl' => route('payment.success', ['order' => $order->id]),
            'cancelUrl' => route('payment.cancel', ['order' => $order->id]),
        ]);
    }

    /**
     * Capture the payment with the gateway and mark the order paid.
     */
    public function success(Order $order): RedirectResponse
    {
        Gate::authorize('viewPayment', $order);

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
     * After a successful payment, buyers land on the receipt surface.
     * Authenticated owners use the normal receipt route; guests get a signed
     * receipt URL that remains time-limited.
     */
    private function postPaymentRedirect(Order $order): string
    {
        if (auth()->check()) {
            return route('order.receipt', ['order' => $order->id]);
        }

        return URL::temporarySignedRoute(
            'order.receipt',
            now()->addDays(7),
            ['order' => $order->id],
        );
    }

    public function cancel(Order $order): RedirectResponse
    {
        Gate::authorize('viewPayment', $order);

        if (! in_array($order->payment_status, ['paid', 'refunded'], true)) {
            $order->update(['status' => 'cancelled']);
        }

        return redirect('/checkout/')->with('error', 'Payment was cancelled.');
    }
}
