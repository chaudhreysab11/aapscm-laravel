<x-layouts.cms>

    @push('title')Order Receipt — @endpush

    <section class="relative bg-[#0B2F5E] py-12 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[26px] md:text-[36px] font-bold text-white">Thank You for Your Order</h1>
            <p class="text-white/80 mt-2 text-[14px]">Order #{{ $order->order_number }}</p>
        </div>
    </section>

    <section class="bg-[#f6f8fb] py-12">
        <div class="max-w-[900px] mx-auto px-4">

            <div class="bg-white rounded-xl shadow-sm p-6 md:p-8 mb-6">
                <h2 class="text-[20px] font-semibold text-[#14166e] mb-4">Order Summary</h2>

                <table class="w-full text-[14px] text-gray-700 mb-6">
                    <thead class="text-left text-gray-500 border-b">
                        <tr>
                            <th class="py-2">Item</th>
                            <th class="py-2 text-center">Qty</th>
                            <th class="py-2 text-right">Unit Price</th>
                            <th class="py-2 text-right">Line Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr class="border-b last:border-0">
                                <td class="py-3">{{ $item->product?->name ?? 'Item' }}</td>
                                <td class="py-3 text-center">{{ $item->quantity }}</td>
                                <td class="py-3 text-right">{{ $order->currency }} {{ number_format((float) $item->unit_price, 2) }}</td>
                                <td class="py-3 text-right font-medium">{{ $order->currency }} {{ number_format((float) $item->total_price, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="pt-4 text-right font-semibold text-[#14166e]">Total Paid</td>
                            <td class="pt-4 text-right font-bold text-[#14166e]">{{ $order->currency }} {{ number_format((float) $order->total, 2) }}</td>
                        </tr>
                    </tfoot>
                </table>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-[14px] text-gray-700">
                    <div>
                        <h3 class="font-semibold text-[#14166e] mb-2">Billing</h3>
                        <p>{{ $order->billing_name }}</p>
                        <p class="text-gray-500">{{ $order->billing_email }}</p>
                    </div>
                    <div>
                        <h3 class="font-semibold text-[#14166e] mb-2">Payment</h3>
                        <p>Method: <span class="capitalize">{{ $order->payment_method }}</span></p>
                        <p>Status: <span class="capitalize">{{ $order->payment_status }}</span></p>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <a href="/" class="inline-block bg-[#f0b323] text-[#0B2F5E] font-semibold px-6 py-3 rounded-lg hover:opacity-90">
                    Return Home
                </a>
            </div>

        </div>
    </section>

</x-layouts.cms>
