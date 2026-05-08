<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    @php
        $data         = $page->page_data ?? [];
        $hero         = $data['hero'] ?? [];
        $benefits     = $data['benefits'] ?? [];
        $whyJoin      = $data['why_join'] ?? [];
        $faqs         = $data['faqs'] ?? [];
        $freeTraining = $data['free_training'] ?? [];
    @endphp

    {{-- Hero --}}
    @if (! empty($hero))
    <section class="bg-white py-14">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] leading-snug mb-5">
                    {{ $hero['heading_pre'] ?? '' }}<span class="font-bold text-[#001a67]">{{ $hero['heading_mid'] ?? '' }}</span>{{ $hero['heading_post'] ?? '' }}
                </h3>
                @if (! empty($hero['subheading']))
                <h5 class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-6">{{ $hero['subheading'] }}</h5>
                @endif
                @if (! empty($hero['button_text']))
                <a href="{{ $hero['button_url'] ?? '#' }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[15px] px-7 py-3 rounded transition">
                    {{ $hero['button_text'] }}
                </a>
                @endif
            </div>
            @if (! empty($hero['image']))
            <div class="flex justify-center">
                <img src="{{ $hero['image'] }}" alt="Student Membership" class="w-full max-w-[500px] h-auto" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Exclusive Benefits heading --}}
    @if (! empty($benefits['heading']))
    <section class="bg-white pt-6 pb-2">
        <div class="max-w-[1100px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[32px] font-bold text-[#14166e]">{{ $benefits['heading'] }}</h2>
        </div>
    </section>
    @endif

    {{-- Benefits grid --}}
    @if (! empty($benefits['items']))
    <section class="bg-white py-10">
        <div class="max-w-[1100px] mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($benefits['items'] as $item)
            <div class="bg-[#f6f8fb] rounded-xl p-6 border border-gray-100">
                @if (! empty($item['icon']))
                <img src="{{ $item['icon'] }}" alt="{{ $item['title'] ?? '' }}" class="w-[64px] h-[64px] object-contain mb-4" />
                @endif
                <h2 class="text-[18px] md:text-[20px] font-bold text-[#14166e] mb-2">{{ $item['title'] ?? '' }}</h2>
                <p class="text-[14px] md:text-[15px] text-gray-700 leading-relaxed">{{ $item['text'] ?? '' }}</p>
            </div>
            @endforeach
        </div>
    </section>
    @endif

    {{-- Why Join? --}}
    @if (! empty($whyJoin))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1000px] mx-auto px-4">
            <h3 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-4">{{ $whyJoin['heading'] ?? '' }}</h3>
            @if (! empty($whyJoin['text']))
            <h5 class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed mb-5">{{ $whyJoin['text'] }}</h5>
            @endif
            @if (! empty($whyJoin['cta_bold']) || ! empty($whyJoin['cta_text']))
            <h5 class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed">
                @if (! empty($whyJoin['cta_bold']))
                <strong class="block mb-1">{{ $whyJoin['cta_bold'] }}</strong>
                @endif
                {{ $whyJoin['cta_text'] ?? '' }}
            </h5>
            @endif
        </div>
    </section>
    @endif

    {{-- FAQs --}}
    @if (! empty($faqs['items']))
    <section class="bg-white py-14">
        <div class="max-w-[1000px] mx-auto px-4">
            <h2 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-8">{{ $faqs['heading'] ?? 'Frequently asked Questions' }}</h2>
            <div class="space-y-4">
                @foreach ($faqs['items'] as $i => $faq)
                <details class="group border border-gray-200 rounded-lg bg-white overflow-hidden" @if($i === 0) open @endif>
                    <summary class="cursor-pointer list-none flex items-center justify-between px-6 py-4 bg-[#f6f8fb] hover:bg-gray-100 transition">
                        <span class="text-[15px] md:text-[16px] font-semibold text-[#14166e]">{{ $faq['question'] }}</span>
                        <span class="ml-4 text-[#14166e] text-xl leading-none">
                            <span class="group-open:hidden">+</span>
                            <span class="hidden group-open:inline">−</span>
                        </span>
                    </summary>
                    <div class="px-6 py-5 text-[14px] md:text-[15px] text-gray-700 leading-relaxed prose prose-sm max-w-none">
                        {!! $faq['answer'] !!}
                    </div>
                </details>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- Free training + Sign up / Pay buttons --}}
    @if (! empty($freeTraining))
    <section class="bg-[#0B2F5E] py-12">
        <div class="max-w-[1000px] mx-auto px-4 text-center">
            <h5 class="text-[15px] md:text-[17px] text-white leading-relaxed mb-6">
                {{ $freeTraining['text_pre'] ?? '' }}
                <a href="{{ $freeTraining['link_url'] ?? '#' }}" class="text-[#f0b323] underline">{{ $freeTraining['link_text'] ?? 'click here' }}</a>{{ $freeTraining['text_post'] ?? '' }}
            </h5>
            <div class="flex flex-wrap justify-center gap-4">
                @if (! empty($freeTraining['signup_button_text']))
                <a href="{{ $freeTraining['signup_button_url'] ?? '#' }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[14px] px-7 py-3 rounded transition">
                    {{ $freeTraining['signup_button_text'] }}
                </a>
                @endif
                @if (! empty($freeTraining['pay_button_text']))
                <a href="{{ $freeTraining['pay_button_url'] ?? '#' }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[14px] px-7 py-3 rounded transition">
                    {{ $freeTraining['pay_button_text'] }}
                </a>
                @endif
            </div>
        </div>
    </section>
    @endif
</x-layouts.cms>
