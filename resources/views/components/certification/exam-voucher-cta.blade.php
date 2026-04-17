@props(['vouchers'])

@if ($vouchers->isNotEmpty())
<div class="py-12 bg-gray-50 border-t border-gray-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-[#0B2F5E] mb-2">Exam Vouchers</h2>
        <p class="text-gray-600 mb-8 text-sm">Purchase an exam voucher to schedule your certification exam.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($vouchers as $voucher)
                @php
                    $nonMemberPrice = $voucher->prices->first(fn ($p) => is_null($p->membership_tier_id));
                    $memberPrice    = $voucher->prices->first(fn ($p) => ! is_null($p->membership_tier_id));
                @endphp
                <div class="bg-white border border-gray-200 rounded-xl p-6 shadow-sm">
                    <h3 class="font-semibold text-gray-900 mb-1">{{ $voucher->name }}</h3>

                    @if ($voucher->sku)
                        <p class="text-xs text-gray-400 mb-4">SKU: {{ $voucher->sku }}</p>
                    @endif

                    {{-- Pricing --}}
                    <div class="space-y-2 mb-5">
                        @if ($nonMemberPrice)
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Non-member</span>
                                <span class="font-semibold text-gray-900">
                                    ${{ number_format($nonMemberPrice->price, 2) }}
                                </span>
                            </div>
                        @endif
                        @if ($memberPrice)
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Member</span>
                                <span class="font-semibold text-[#1e5c38]">
                                    ${{ number_format($memberPrice->price, 2) }}
                                </span>
                            </div>
                        @endif
                    </div>

                    @if (Route::has('cart.add'))
                    <a href="{{ route('cart.add', $voucher->id) }}"
                       class="block w-full text-center bg-[#08186A] text-white text-sm font-semibold py-2.5 rounded-lg hover:bg-[#0B2F5E] transition-colors duration-150">
                        Add to Cart
                    </a>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
</div>
@endif
