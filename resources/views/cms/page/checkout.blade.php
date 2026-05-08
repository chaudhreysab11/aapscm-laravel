<x-layouts.cms>

    @push('title')Checkout — @endpush

    @php
        $oldBillingName = trim((string) old('billing_name'));
        $nameParts = preg_split('/\s+/', $oldBillingName, 2) ?: [];
        $oldFirstName = old('billing_first_name', $nameParts[0] ?? '');
        $oldLastName = old('billing_last_name', $nameParts[1] ?? '');

        $fieldClass = 'h-12 w-full rounded-xl border border-slate-200 px-4 text-[14px] text-slate-800 placeholder:text-slate-400 focus:border-[#0b2f5e] focus:outline-none focus:ring-2 focus:ring-[#0b2f5e]/10';
    @endphp

    {{-- Page hero --}}
    <section class="relative overflow-hidden bg-[radial-gradient(circle_at_top_left,_#1f4d8a,_#0b2f5e_55%,_#071f40)] py-10 text-white">
        <div class="absolute inset-0 opacity-20 [background-image:linear-gradient(rgba(255,255,255,0.2)_1px,transparent_1px),linear-gradient(90deg,rgba(255,255,255,0.12)_1px,transparent_1px)] [background-size:32px_32px]"></div>
        <div class="relative mx-auto max-w-[1180px] px-4">
            <p class="text-[12px] font-semibold uppercase tracking-[0.28em] text-[#f0b323]">AAPSCM Store</p>
            <h1 class="mt-2 text-[34px] font-bold leading-tight">Checkout</h1>
            <nav class="mt-2 flex items-center gap-2 text-[13px] text-white/70">
                <a href="{{ route('home') }}" class="transition-colors hover:text-white">Home</a>
                <span>/</span>
                <a href="{{ route('cart.show') }}" class="transition-colors hover:text-white">Cart</a>
                <span>/</span>
                <span>Checkout</span>
            </nav>
        </div>
    </section>

    <section class="bg-[#f4f7fb] py-[60px]">
        <div class="mx-auto max-w-[1180px] px-4">

            @if (session('error'))
                <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-[14px] text-rose-800">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-5 py-4 text-[14px] text-rose-800">
                    <strong>Please correct the following:</strong>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Checkout header card --}}
            <div class="mb-8 rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                <div class="grid gap-6 lg:grid-cols-[1fr_auto] lg:items-center">
                    <div>
                        <div class="flex items-center gap-3">
                            <span class="inline-flex h-9 w-9 items-center justify-center rounded-xl bg-[#0b2f5e] text-white">
                                <x-ui.icon name="cart" class="h-4 w-4" />
                            </span>
                            <div>
                                <h2 class="text-[24px] font-bold leading-none text-slate-900">Checkout</h2>
                                <p class="mt-1 text-[13px] text-slate-500">Billing, order review, and secure Stripe payment.</p>
                            </div>
                        </div>
                        <div class="mt-4 flex flex-wrap gap-2">
                            <x-ui.status-pill label="Stripe Only" tone="brand" />
                            <x-ui.status-pill label="Secure Payment" tone="neutral" />
                        </div>
                    </div>

                    <ol class="flex flex-wrap gap-3 text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-600">
                        <li class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-4 py-2">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[#0b2f5e] text-white"><x-ui.icon name="profile" class="h-3.5 w-3.5" /></span>
                            <span>Billing</span>
                        </li>
                        <li class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-50 px-4 py-2">
                            <span class="inline-flex h-6 w-6 items-center justify-center rounded-full bg-[#0b2f5e] text-white"><x-ui.icon name="card" class="h-3.5 w-3.5" /></span>
                            <span>Order &amp; Payment</span>
                        </li>
                    </ol>
                </div>
            </div>

            <form method="POST" action="{{ route('checkout.store') }}" class="grid gap-10 lg:grid-cols-[minmax(0,1fr)_380px] lg:items-start">
                @csrf

                <div class="space-y-8">
                    <fieldset class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                        <legend class="mb-6 flex items-center gap-3 text-[20px] font-bold leading-none text-slate-900">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-[#edf3fb] text-[#0b2f5e]"><x-ui.icon name="profile" class="h-4 w-4" /></span>
                            <span>Billing details</span>
                        </legend>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div class="md:col-span-2 rounded-xl border border-amber-200 bg-amber-50 px-5 py-4">
                                <p class="mb-3 flex items-center gap-2 text-[14px] font-semibold text-amber-900"><x-ui.icon name="warning" class="h-4 w-4 text-amber-600" />Are you allergic to peanuts? <span class="text-rose-600">*</span></p>
                                <div class="flex flex-wrap gap-6 text-[14px] text-slate-700">
                                    <label class="inline-flex items-center gap-2">
                                        <input type="radio" name="allergic_to_peanuts" value="1" {{ old('allergic_to_peanuts') === '1' ? 'checked' : '' }} class="border-slate-300 text-[#0b2f5e] focus:ring-[#0b2f5e]" />
                                        <span>Yes</span>
                                    </label>
                                    <label class="inline-flex items-center gap-2">
                                        <input type="radio" name="allergic_to_peanuts" value="0" {{ old('allergic_to_peanuts', '0') === '0' ? 'checked' : '' }} class="border-slate-300 text-[#0b2f5e] focus:ring-[#0b2f5e]" />
                                        <span>No</span>
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label for="billing_email" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Email address&nbsp;<span class="text-rose-600">*</span></label>
                                <input type="email" name="billing_email" id="billing_email" value="{{ old('billing_email', auth()->user()->email ?? '') }}" required class="{{ $fieldClass }}" />
                            </div>

                            <div>
                                <label for="billing_first_name" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">First name&nbsp;<span class="text-rose-600">*</span></label>
                                <input type="text" name="billing_first_name" id="billing_first_name" value="{{ $oldFirstName }}" required class="{{ $fieldClass }}" />
                            </div>

                            <div class="md:col-span-2">
                                <label for="billing_last_name" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Last name&nbsp;<span class="text-rose-600">*</span></label>
                                <input type="text" name="billing_last_name" id="billing_last_name" value="{{ $oldLastName }}" required class="{{ $fieldClass }}" />
                            </div>

                            <div>
                                <label for="billing_company" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Company name <span class="font-normal normal-case tracking-normal text-slate-400">(optional)</span></label>
                                <input type="text" name="billing_company" id="billing_company" value="{{ old('billing_company') }}" class="{{ $fieldClass }}" />
                            </div>

                            <div>
                                <label for="billing_country" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Country / Region&nbsp;<span class="text-rose-600">*</span></label>
                                <input type="text" name="billing_country" id="billing_country" value="{{ old('billing_country') }}" required class="{{ $fieldClass }}" />
                            </div>

                            <div class="md:col-span-2">
                                <label for="billing_address" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Street address&nbsp;<span class="text-rose-600">*</span></label>
                                <input type="text" name="billing_address" id="billing_address" value="{{ old('billing_address') }}" required placeholder="House number and street name" class="{{ $fieldClass }}" />
                            </div>

                            <div class="md:col-span-2">
                                <label for="billing_address_line_2" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Apartment, suite, unit, etc. <span class="font-normal normal-case tracking-normal text-slate-400">(optional)</span></label>
                                <input type="text" name="billing_address_line_2" id="billing_address_line_2" value="{{ old('billing_address_line_2') }}" class="{{ $fieldClass }}" />
                            </div>

                            <div>
                                <label for="billing_city" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Town / City&nbsp;<span class="text-rose-600">*</span></label>
                                <input type="text" name="billing_city" id="billing_city" value="{{ old('billing_city') }}" required class="{{ $fieldClass }}" />
                            </div>

                            <div>
                                <label for="billing_state" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">State&nbsp;<span class="text-rose-600">*</span></label>
                                <input type="text" name="billing_state" id="billing_state" value="{{ old('billing_state') }}" required class="{{ $fieldClass }}" />
                            </div>

                            <div>
                                <label for="billing_postcode" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">ZIP code&nbsp;<span class="text-rose-600">*</span></label>
                                <input type="text" name="billing_postcode" id="billing_postcode" value="{{ old('billing_postcode') }}" required class="{{ $fieldClass }}" />
                            </div>

                            <div>
                                <label for="billing_phone" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Phone&nbsp;<span class="text-rose-600">*</span></label>
                                <input type="text" name="billing_phone" id="billing_phone" value="{{ old('billing_phone') }}" required class="{{ $fieldClass }}" />
                            </div>

                            @guest
                                <div class="md:col-span-2">
                                    <label class="inline-flex items-center gap-3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-3 text-[14px] text-slate-700">
                                        <input type="checkbox" name="create_account" value="1" {{ old('create_account') ? 'checked' : '' }} class="border-slate-300 text-[#0b2f5e] focus:ring-[#0b2f5e]" />
                                        <span>Create an account?</span>
                                    </label>
                                </div>
                            @endguest
                        </div>
                    </fieldset>

                    <fieldset class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-8">
                        <legend class="mb-4 flex items-center gap-3 text-[20px] font-bold leading-none text-slate-900">
                            <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-[#edf3fb] text-[#0b2f5e]"><x-ui.icon name="note" class="h-4 w-4" /></span>
                            <span>Additional information</span>
                        </legend>
                        <label for="notes" class="mb-2 block text-[13px] font-semibold uppercase tracking-[0.12em] text-slate-500">Order notes</label>
                        <textarea name="notes" id="notes" rows="5" class="w-full rounded-xl border border-slate-200 px-4 py-3 text-[14px] text-slate-700 placeholder:text-slate-400 focus:border-[#0b2f5e] focus:outline-none focus:ring-2 focus:ring-[#0b2f5e]/10" placeholder="Notes about your order, e.g. special notes for delivery.">{{ old('notes') }}</textarea>
                    </fieldset>
                </div>

                <aside class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm">
                    <h2 class="mb-5 flex items-center gap-3 text-[20px] font-bold leading-none text-slate-900">
                        <span class="inline-flex h-8 w-8 items-center justify-center rounded-xl bg-[#edf3fb] text-[#0b2f5e]"><x-ui.icon name="receipt" class="h-4 w-4" /></span>
                        <span>Your order</span>
                    </h2>

                    <table class="min-w-full text-left text-[14px] text-slate-600">
                        <thead class="border-b border-slate-200 text-[13px] font-semibold uppercase tracking-[0.08em] text-slate-700">
                            <tr>
                                <th class="py-3 pr-4">Product</th>
                                <th class="py-3 text-right">Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $line)
                                <tr class="border-b border-slate-100 align-top last:border-b-0">
                                    <td class="py-4 pr-4 text-slate-800">
                                        <div>{{ $line['product']->name }} <strong class="font-semibold">&times;&nbsp;{{ $line['quantity'] }}</strong></div>
                                        @if (! empty($line['meta']['selected_option'] ?? null))
                                            <div class="mt-1 text-[12px] text-slate-500">Selected option: {{ $line['meta']['selected_option'] }}</div>
                                        @endif
                                    </td>
                                    <td class="py-4 text-right font-medium">{{ $line['currency'] }} {{ $line['line_total'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="border-t border-slate-200">
                                <th class="py-4 pr-4 text-left text-slate-800">Subtotal</th>
                                <td class="py-4 text-right font-medium">{{ $items->first()['currency'] ?? 'USD' }} {{ $totals['subtotal'] }}</td>
                            </tr>
                            @if ($appliedCoupon)
                                <tr class="border-t border-slate-200">
                                    <th class="py-4 pr-4 text-left text-slate-800">Coupon ({{ $appliedCoupon['code'] }})</th>
                                    <td class="py-4 text-right font-medium">-{{ $items->first()['currency'] ?? 'USD' }} {{ $totals['discount'] }}</td>
                                </tr>
                            @endif
                            <tr class="border-t border-slate-200">
                                <th class="py-4 pr-4 text-left font-bold text-slate-900">Total</th>
                                <td class="py-4 text-right text-[18px] font-bold text-slate-900">{{ $items->first()['currency'] ?? 'USD' }} {{ $totals['total'] }}</td>
                            </tr>
                        </tfoot>
                    </table>

                    @if ($appliedCoupon)
                        <div class="mt-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-4 text-[14px] text-emerald-900">
                            <p class="flex items-center gap-2 font-semibold"><x-ui.icon name="check-circle" class="h-4 w-4" />Coupon {{ $appliedCoupon['code'] }} is applied to this order.</p>
                            <p class="mt-1 text-[13px] text-emerald-700">Discount already included in the total.</p>
                        </div>
                    @endif

                    <fieldset class="mt-8 border-t border-slate-200 pt-6">
                        <legend class="mb-4 flex items-center gap-2 text-[15px] font-bold text-slate-900"><x-ui.icon name="card" class="h-4 w-4 text-[#0b2f5e]" />Payment method</legend>
                        <input type="hidden" name="gateway" value="stripe" />
                        <div class="space-y-3">
                            <label class="block rounded-xl border border-slate-200 p-4 text-[14px] text-slate-700 transition hover:border-[#0b2f5e]">
                                <span class="flex items-start gap-3">
                                    <input type="radio" name="gateway_display" value="stripe" checked disabled class="mt-1 border-slate-300 text-[#0b2f5e] focus:ring-[#0b2f5e]" />
                                    <span>
                                        <strong class="flex items-center gap-2 text-slate-900"><x-ui.icon name="card" class="h-4 w-4 text-[#0b2f5e]" />Stripe</strong>
                                        <span>Pay by credit or debit card.</span>
                                    </span>
                                </span>
                            </label>
                        </div>
                    </fieldset>

                    <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                        <a href="{{ route('cart.show') }}" class="inline-flex flex-1 items-center justify-center gap-2 rounded-full border border-slate-200 bg-white px-6 py-4 text-[12px] font-semibold uppercase tracking-[0.12em] text-slate-700 transition hover:bg-slate-100">
                            <x-ui.icon name="cart" class="h-4 w-4" />
                            Back to cart
                        </a>
                        <button type="submit" class="inline-flex flex-1 items-center justify-center gap-2 rounded-full bg-[#0b2f5e] px-6 py-4 text-[12px] font-semibold uppercase tracking-[0.12em] text-white transition hover:bg-[#174a86]">
                            <x-ui.icon name="check-circle" class="h-4 w-4" />
                            Next
                        </button>
                    </div>
                </aside>
            </form>
        </div>
    </section>
</x-layouts.cms>
