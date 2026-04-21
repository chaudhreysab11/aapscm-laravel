<x-layouts.cms>

    @push('title')Cart — @endpush

    <section class="relative bg-[#0B2F5E] py-12 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[26px] md:text-[36px] font-bold text-white">Your Cart</h1>
        </div>
    </section>

    <section class="bg-[#f6f8fb] py-12">
        <div class="max-w-[900px] mx-auto px-4">

            @if (session('success'))
                <div class="mb-6 rounded-lg bg-green-50 border border-green-200 p-4 text-green-800 text-[14px]">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-6 rounded-lg bg-red-50 border border-red-200 p-4 text-red-800 text-[14px]">
                    {{ session('error') }}
                </div>
            @endif

            @if ($items->isEmpty())
                <div class="bg-white rounded-xl shadow-sm p-8 text-center">
                    <p class="text-gray-700 text-[15px] mb-6">Your cart is currently empty.</p>
                    <a href="/" class="inline-block bg-[#f0b323] text-[#0B2F5E] font-semibold px-6 py-3 rounded-lg hover:opacity-90">
                        Continue Browsing
                    </a>
                </div>
            @else
                <div class="bg-white rounded-xl shadow-sm p-6 md:p-8 mb-6">
                    <table class="w-full text-[14px] text-gray-700">
                        <thead class="text-left text-gray-500 border-b">
                            <tr>
                                <th class="py-2">Item</th>
                                <th class="py-2 text-center">Qty</th>
                                <th class="py-2 text-right">Unit Price</th>
                                <th class="py-2 text-right">Line Total</th>
                                <th class="py-2 text-right">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($items as $line)
                                <tr class="border-b last:border-0 align-middle">
                                    <td class="py-3">{{ $line['product']->name }}</td>
                                    <td class="py-3 text-center">
                                        <form method="POST" action="{{ route('cart.update', $line['product']->id) }}" class="inline-flex items-center gap-2">
                                            @csrf
                                            @method('PATCH')
                                            <input type="number" name="quantity" min="0" max="99" value="{{ $line['quantity'] }}"
                                                   class="w-16 border border-gray-300 rounded px-2 py-1 text-center" />
                                            <button type="submit" class="text-[12px] text-[#14166e] underline">Update</button>
                                        </form>
                                    </td>
                                    <td class="py-3 text-right">{{ $line['currency'] }} {{ $line['unit_price'] }}</td>
                                    <td class="py-3 text-right font-medium">{{ $line['currency'] }} {{ $line['line_total'] }}</td>
                                    <td class="py-3 text-right">
                                        <form method="POST" action="{{ route('cart.remove', $line['product']->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-[12px] text-red-600 hover:underline">Remove</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="pt-4 text-right font-semibold text-[#14166e]">Subtotal</td>
                                <td class="pt-4 text-right font-bold text-[#14166e]">{{ $items->first()['currency'] ?? 'USD' }} {{ $subtotal }}</td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <div class="flex justify-end">
                    <a href="/checkout/" class="inline-block bg-[#f0b323] text-[#0B2F5E] font-semibold px-6 py-3 rounded-lg hover:opacity-90">
                        Proceed to Checkout
                    </a>
                </div>
            @endif

        </div>
    </section>

</x-layouts.cms>
