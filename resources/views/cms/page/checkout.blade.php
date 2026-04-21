<x-layouts.cms>

    @push('title')Checkout — @endpush

    <section class="relative bg-[#0B2F5E] py-12 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[26px] md:text-[36px] font-bold text-white">Checkout</h1>
        </div>
    </section>

    <section class="bg-[#f6f8fb] py-12">
        <div class="max-w-[900px] mx-auto px-4">

            @if (session('error'))
                <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-800 text-[14px]">
                    {{ session('error') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-800 text-[14px]">
                    <strong>Please correct the following:</strong>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white rounded-xl shadow-sm p-6 md:p-8 mb-6">
                <h2 class="text-[20px] font-semibold text-[#14166e] mb-4">Order Summary</h2>
                <table class="w-full text-[14px] text-gray-700">
                    <thead class="text-left text-gray-500 border-b">
                        <tr>
                            <th class="py-2">Item</th>
                            <th class="py-2 text-center">Qty</th>
                            <th class="py-2 text-right">Unit Price</th>
                            <th class="py-2 text-right">Line Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $line)
                            <tr class="border-b last:border-0">
                                <td class="py-3">{{ $line['product']->name }}</td>
                                <td class="py-3 text-center">{{ $line['quantity'] }}</td>
                                <td class="py-3 text-right">{{ $line['currency'] }} {{ $line['unit_price'] }}</td>
                                <td class="py-3 text-right font-medium">{{ $line['currency'] }} {{ $line['line_total'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="pt-4 text-right font-semibold text-[#14166e]">Subtotal</td>
                            <td class="pt-4 text-right font-bold text-[#14166e]">{{ $items->first()['currency'] ?? 'USD' }} {{ $subtotal }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <form method="POST" action="/checkout/" class="space-y-6">
                @csrf

                <fieldset class="bg-white rounded-xl shadow-sm p-6 md:p-8">
                    <legend class="text-[18px] font-semibold text-[#14166e] mb-4">Billing Details</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label for="billing_name" class="block text-[13px] font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="billing_name" id="billing_name" value="{{ old('billing_name') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[14px]" />
                        </div>
                        <div>
                            <label for="billing_email" class="block text-[13px] font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="billing_email" id="billing_email" value="{{ old('billing_email', auth()->user()->email ?? '') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[14px]" />
                        </div>
                        <div>
                            <label for="billing_country" class="block text-[13px] font-medium text-gray-700 mb-1">Country <span class="text-red-500">*</span></label>
                            <input type="text" name="billing_country" id="billing_country" value="{{ old('billing_country') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[14px]" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="billing_address" class="block text-[13px] font-medium text-gray-700 mb-1">Address <span class="text-red-500">*</span></label>
                            <input type="text" name="billing_address" id="billing_address" value="{{ old('billing_address') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[14px]" />
                        </div>
                        <div>
                            <label for="billing_city" class="block text-[13px] font-medium text-gray-700 mb-1">City <span class="text-red-500">*</span></label>
                            <input type="text" name="billing_city" id="billing_city" value="{{ old('billing_city') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[14px]" />
                        </div>
                    </div>
                </fieldset>

                <fieldset class="bg-white rounded-xl shadow-sm p-6 md:p-8">
                    <legend class="text-[18px] font-semibold text-[#14166e] mb-4">Payment Method <span class="text-red-500">*</span></legend>
                    <div class="space-y-3">
                        <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-[#14166e]">
                            <input type="radio" name="gateway" value="stripe" {{ old('gateway') === 'stripe' ? 'checked' : 'checked' }} required
                                   class="text-[#14166e] focus:ring-[#14166e]" />
                            <span class="text-[14px] text-gray-700"><strong>Stripe</strong> &mdash; Pay by credit / debit card</span>
                        </label>
                        <label class="flex items-center gap-3 p-4 border border-gray-200 rounded-lg cursor-pointer hover:border-[#14166e]">
                            <input type="radio" name="gateway" value="paypal" {{ old('gateway') === 'paypal' ? 'checked' : '' }}
                                   class="text-[#14166e] focus:ring-[#14166e]" />
                            <span class="text-[14px] text-gray-700"><strong>PayPal</strong> &mdash; Pay with your PayPal account</span>
                        </label>
                    </div>
                </fieldset>

                <div class="flex justify-center pt-2">
                    <button type="submit" class="bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[16px] px-12 py-3 rounded-lg transition">
                        Place Order
                    </button>
                </div>
            </form>
        </div>
    </section>
</x-layouts.cms>
