<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero      = $page->page_data['hero']      ?? [];
        $mission   = $page->page_data['mission']   ?? [];
        $objective = $page->page_data['objective'] ?? '';
        $programs  = $page->page_data['programs']  ?? [];
        $donations = $page->page_data['donations'] ?? [];
        $facts     = $page->page_data['facts']     ?? [];
        $utilized  = $page->page_data['utilized']  ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h3 class="text-[32px] md:text-[44px] font-semibold text-[#14166e]">
                {!! $hero['heading'] ?? 'Non-Profit Activities &amp; Donation' !!}
            </h3>
        </div>
    </section>

    {{-- Mission --}}
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4">
            <h3 class="text-[28px] md:text-[36px] font-semibold text-[#14166e] mb-5">
                {{ $mission['heading'] ?? 'Our Mission' }}
            </h3>
            <p class="text-[16px] md:text-[18px] text-gray-700 leading-relaxed">
                {{ $mission['body'] ?? '' }}
            </p>
        </div>
    </section>

    {{-- Objective --}}
    <section class="bg-[#f6f8fb] py-10">
        <div class="max-w-[1100px] mx-auto px-4">
            <p class="text-[16px] md:text-[18px] text-gray-700 leading-relaxed">{{ $objective }}</p>
        </div>
    </section>

    {{-- Philanthropic Programs (grid; swiper replaced with static grid) --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <h3 class="text-[28px] md:text-[36px] font-semibold text-[#14166e] text-center mb-10">
                {{ $programs['heading'] ?? 'Our Philanthropic Programs' }}
            </h3>
            <div class="grid md:grid-cols-2 gap-10">
                @foreach ($programs['items'] ?? [] as $p)
                    <div class="bg-[#f6f8fb] rounded-lg overflow-hidden border border-gray-200 shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                        @if (! empty($p['image']))
                            <img src="{{ $p['image'] }}" alt="{{ $p['title'] }}" class="w-full h-auto">
                        @endif
                        <div class="p-6">
                            <h3 class="text-[20px] md:text-[22px] font-semibold text-[#14166e] mb-3">{{ $p['title'] }}</h3>
                            <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $p['body'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Donations row --}}
    <section class="bg-[#14166e] py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <h3 class="text-[32px] md:text-[42px] font-semibold text-white text-center mb-10">
                {{ $donations['heading'] ?? 'Donations' }}
            </h3>
            <div class="grid sm:grid-cols-2 md:grid-cols-4 gap-6">
                @foreach ($donations['cards'] ?? [] as $c)
                    <div class="bg-white rounded-lg p-6 text-center flex flex-col items-center">
                        <img src="{{ $c['icon'] }}" alt="{{ $c['title'] }}" class="w-20 h-20 object-contain mb-4">
                        <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] mb-4">{{ $c['title'] }}</h3>
                        <a href="{{ $c['url'] }}"
                           class="mt-auto inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                            {{ $c['label'] ?? 'Donation' }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Facts about hunger --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            @if (! empty($facts['image']))
                <img src="{{ $facts['image'] }}" alt="" class="w-full h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
            @endif
            <div>
                <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-6">
                    {{ $facts['heading'] ?? 'Facts about hunger in America' }}
                </h3>
                <ul class="space-y-4">
                    @foreach ($facts['items'] ?? [] as $f)
                        <li class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#14166e" viewBox="0 0 20 20" class="w-5 h-5 mt-1 flex-shrink-0"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $f }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>

    {{-- How this donation will be utilized --}}
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            <div>
                <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-5">
                    {{ $utilized['heading'] ?? 'How this donation will be utilized' }}
                </h3>
                <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-6">{{ $utilized['body'] ?? '' }}</p>
                <ul class="space-y-3">
                    @foreach ($utilized['items'] ?? [] as $u)
                        <li class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#14166e" viewBox="0 0 20 20" class="w-5 h-5 mt-1 flex-shrink-0"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                            <span class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed">{{ $u }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>
            @if (! empty($utilized['image']))
                <img src="{{ $utilized['image'] }}" alt="" class="w-full h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
            @endif
        </div>
    </section>

</x-layouts.cms>
