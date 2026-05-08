<x-layouts.cms>

    @push('title')Complete Payment — @endpush

    @push('head')
        <script src="https://js.stripe.com/v3/"></script>
    @endpush

    {{-- Page hero --}}
    <section class="relative overflow-hidden bg-[radial-gradient(circle_at_top_left,_#1f4d8a,_#0b2f5e_55%,_#071f40)] py-10 text-white">
        <div class="absolute inset-0 opacity-20 [background-image:linear-gradient(rgba(255,255,255,0.2)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.12)_1px,transparent_1px)] [background-size:32px_32px]"></div>
        <div class="relative mx-auto max-w-[1180px] px-4">
            <p class="text-[12px] font-semibold uppercase tracking-[0.28em] text-[#f0b323]">AAPSCM Store</p>
            <h1 class="mt-2 text-[34px] font-bold leading-tight">Complete Payment</h1>
            <nav class="mt-2 flex items-center gap-2 text-[13px] text-white/70">
                <a href="{{ route('home') }}" class="transition-colors hover:text-white">Home</a>
                <span>/</span>
                <a href="{{ route('checkout.show') }}" class="transition-colors hover:text-white">Checkout</a>
                <span>/</span>
                <span>Complete Payment</span>
            </nav>
        </div>
    </section>

    <section class="bg-[#f4f7fb] py-[60px]">
        <div class="mx-auto max-w-[1180px] px-4">
            <div class="mb-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <h2 class="text-[26px] font-bold leading-none text-slate-900">Pay securely with Stripe</h2>
                        <p class="mt-3 max-w-[820px] text-[15px] leading-7 text-slate-500">Enter your card details below to confirm payment for order {{ $order->order_number }}. Your order will be marked complete only after Stripe confirms the payment and the server finalizes it.</p>
                    </div>
                    <a href="{{ $cancelUrl }}" class="inline-flex items-center justify-center rounded-full border border-slate-200 bg-white px-6 py-3 text-[12px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100">
                        Cancel payment
                    </a>
                </div>
            </div>

            @if ($publishableKey === '')
                <div class="rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-[14px] text-rose-800">
                    Stripe is not configured yet. Set STRIPE_KEY and STRIPE_SECRET before using the live card flow.
                </div>
            @else
                <div class="grid gap-10 lg:grid-cols-[minmax(0,1fr)_360px] lg:items-start">
                    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <form id="stripe-payment-form" class="space-y-6">
                            <div>
                                <label for="payment-element" class="mb-3 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Card details</label>
                                <div id="payment-element" class="rounded-xl border border-slate-200 px-4 py-4"></div>
                            </div>

                            <div id="stripe-payment-error" class="hidden rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-[14px] text-rose-800"></div>

                            <button id="stripe-submit" type="submit" class="inline-flex items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-8 py-4 text-[13px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86] disabled:opacity-60">
                                <x-ui.icon name="card" class="h-4 w-4" />
                                Pay {{ $order->currency }} {{ number_format((float) $order->total, 2, '.', '') }}
                            </button>
                        </form>
                    </div>

                    <aside class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                        <h2 class="mb-5 text-[20px] font-bold leading-none text-slate-900">Order summary</h2>

                        <table class="min-w-full text-left text-[14px] text-slate-600">
                            <thead class="border-b border-slate-200 text-[13px] font-semibold uppercase tracking-[0.08em] text-slate-700">
                                <tr>
                                    <th class="py-3 pr-4">Product</th>
                                    <th class="py-3 text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order->items as $item)
                                    <tr class="border-b border-slate-100 align-top last:border-b-0">
                                        <td class="py-4 pr-4 text-slate-800">{{ $item->product?->name ?? 'Order item' }} <strong>&times; {{ $item->quantity }}</strong></td>
                                        <td class="py-4 text-right font-medium">{{ $order->currency }} {{ number_format((float) $item->total_price, 2, '.', '') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="border-t border-slate-200">
                                    <th class="py-4 pr-4 text-left font-bold text-slate-900">Total</th>
                                    <td class="py-4 text-right text-[18px] font-bold text-slate-900">{{ $order->currency }} {{ number_format((float) $order->total, 2, '.', '') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </aside>
                </div>
            @endif
        </div>
    </section>

    @if ($publishableKey !== '')
        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', async () => {
                    const form = document.getElementById('stripe-payment-form');
                    const errorBox = document.getElementById('stripe-payment-error');
                    const submitButton = document.getElementById('stripe-submit');

                    if (!form || !window.Stripe) {
                        return;
                    }

                    const stripe = window.Stripe(@json($publishableKey));
                    const elements = stripe.elements({ clientSecret: @json($clientSecret) });
                    const paymentElement = elements.create('payment');
                    paymentElement.mount('#payment-element');

                    form.addEventListener('submit', async (event) => {
                        event.preventDefault();
                        submitButton.disabled = true;
                        errorBox.classList.add('hidden');
                        errorBox.textContent = '';

                        const { error } = await stripe.confirmPayment({
                            elements,
                            confirmParams: {
                                return_url: @json($returnUrl),
                            },
                        });

                        if (error) {
                            errorBox.textContent = error.message || 'Payment could not be confirmed. Please check your details and try again.';
                            errorBox.classList.remove('hidden');
                            submitButton.disabled = false;
                        }
                    });
                });
            </script>
        @endpush
    @endif

</x-layouts.cms>
