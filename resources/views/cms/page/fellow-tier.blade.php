<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data        = $page->page_data ?? [];
        $hero        = $data['hero'] ?? [];
        $eligibility = $data['eligibility'] ?? [];
        $benefits    = $data['benefits'] ?? [];
        $fee         = $data['fee'] ?? [];
        $cta         = $data['cta'] ?? [];

        // Backwards-compat: older seeders had a single eligibility.text instead of intro_paragraphs.
        $introParagraphs = $eligibility['intro_paragraphs'] ?? null;
        if ($introParagraphs === null && !empty($eligibility['text'])) {
            $introParagraphs = [$eligibility['text']];
        }
        $introParagraphs = $introParagraphs ?? [];

        $eliImage = $eligibility['image'] ?? ($hero['image'] ?? null);
    @endphp

    {{-- Hero --}}
    <section class="relative bg-[#0B2F5E] py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[28px] md:text-[40px] font-bold text-white leading-tight">
                {{ $hero['heading'] ?? $page->title }}
            </h1>
        </div>
    </section>

    {{-- Eligibility --}}
    @if (!empty($eligibility))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            <div>
                <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4">Eligibility</h2>

                @foreach ($introParagraphs as $para)
                    <p class="text-[15px] text-gray-700 leading-relaxed mb-4">{!! $para !!}</p>
                @endforeach

                @if (!empty($eligibility['items']))
                <ul class="space-y-3 mt-2">
                    @foreach ($eligibility['items'] as $item)
                    <li class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-[#f0b323] mt-0.5 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        <span class="text-[15px] text-gray-700">{!! $item !!}</span>
                    </li>
                    @endforeach
                </ul>
                @endif

                @if (!empty($eligibility['closing_paragraph']))
                    <p class="text-[15px] text-gray-700 leading-relaxed mt-5">{!! $eligibility['closing_paragraph'] !!}</p>
                @endif
            </div>

            @if (!empty($eliImage))
            <div class="flex justify-center">
                <img src="{{ $eliImage }}" alt="{{ $page->title }}" class="rounded-xl shadow-lg max-h-[420px] object-contain" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Benefits --}}
    @if (!empty($benefits))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-3">Benefits</h2>
            @if (!empty($data['benefits_intro']))
            <p class="text-[15px] text-gray-700 leading-relaxed mb-8">{!! $data['benefits_intro'] !!}</p>
            @endif

            <div class="grid md:grid-cols-2 gap-6">
                @foreach ($benefits as $i => $benefit)
                <div class="bg-white rounded-xl shadow-sm p-6 flex gap-5">
                    <span class="text-[28px] font-bold text-[#f0b323] leading-none" style="min-width:40px">{{ str_pad((string)($i + 1), 2, '0', STR_PAD_LEFT) }}</span>
                    <div class="flex-1">
                        <h3 class="text-[17px] font-semibold text-[#14166e] mb-3">{{ $benefit['heading'] ?? '' }}</h3>

                        @if (!empty($benefit['items']) && is_array($benefit['items']))
                            <ul class="space-y-2">
                                @foreach ($benefit['items'] as $bItem)
                                <li class="flex items-start gap-2">
                                    <svg class="w-4 h-4 text-[#f0b323] mt-1 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                    <span class="text-[14px] text-gray-600 leading-relaxed">{!! $bItem !!}</span>
                                </li>
                                @endforeach
                            </ul>
                        @elseif (!empty($benefit['text']))
                            <p class="text-[14px] text-gray-600 leading-relaxed">{!! $benefit['text'] !!}</p>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Fee --}}
    @if (!empty($fee))
    <section class="bg-white py-12">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-3">Fee</h2>
            <p class="text-[17px] text-gray-700 leading-relaxed max-w-3xl mx-auto">{!! $fee['text'] ?? '' !!}</p>
        </div>
    </section>
    @endif

    {{-- CTA --}}
    @if (!empty($cta))
    <section class="bg-[#14166e] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[24px] md:text-[30px] font-bold text-white mb-4">{{ $cta['heading'] ?? '' }}</h2>
            <p class="text-[15px] text-blue-100 leading-relaxed mb-8 max-w-3xl mx-auto">{!! $cta['text'] ?? '' !!}</p>
            <div class="flex flex-wrap justify-center gap-4">
                @if (!empty($cta['join_url']))
                <a href="{{ $cta['join_url'] }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[15px] px-8 py-3 rounded-lg transition">{{ $cta['join_label'] ?? 'Join Now' }}</a>
                @endif
                @if (!empty($cta['cv_url']))
                <a href="{{ $cta['cv_url'] }}" class="inline-block border-2 border-white text-white hover:bg-white hover:text-[#14166e] font-bold text-[15px] px-8 py-3 rounded-lg transition">{{ $cta['cv_label'] ?? 'Submit Your CV' }}</a>
                @endif
            </div>
        </div>
    </section>
    @endif

</x-layouts.cms>
