<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data         = $page->page_data ?? [];
        $hero         = $data['hero'] ?? [];
        $buyExams     = $data['buy_exams'] ?? [];
        $learnAdvance = $data['learn_advance'] ?? [];
        $cards        = $data['cards'] ?? [];
    @endphp

    {{-- Hero banner --}}
    <section class="relative bg-[#0B2F5E] py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[32px] md:text-[44px] font-bold text-white leading-tight mb-4">
                {{ $hero['heading'] ?? $page->title }}
            </h1>
            @if (! empty($hero['lead']))
                <p class="text-[16px] md:text-[18px] text-gray-200 leading-relaxed max-w-[800px] mx-auto">
                    {{ $hero['lead'] }}
                </p>
            @endif
        </div>
    </section>

    {{-- Buy Exams & Course Materials --}}
    @if (! empty($buyExams))
        <section class="bg-white py-14">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[24px] md:text-[32px] font-semibold text-[#14166e] mb-4 leading-snug">
                    {{ $buyExams['heading'] ?? '' }}
                </h2>
                @if (! empty($buyExams['lead']))
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed max-w-[900px] mx-auto">
                        {{ $buyExams['lead'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- Learn, Earn and Advance --}}
    @if (! empty($learnAdvance))
        <section class="bg-[#f6f8fb] py-10">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[22px] md:text-[28px] font-semibold text-[#14166e] mb-3 leading-snug">
                    {{ $learnAdvance['heading'] ?? '' }}
                </h2>
                @if (! empty($learnAdvance['lead']))
                    <p class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed max-w-[900px] mx-auto">
                        {{ $learnAdvance['lead'] }}
                    </p>
                @endif
            </div>
        </section>
    @endif

    {{-- Product grid --}}
    @if (! empty($cards))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($cards as $card)
                        @include('cms.partials.online-courses-card', ['card' => $card])
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>