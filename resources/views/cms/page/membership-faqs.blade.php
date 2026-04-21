<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    @php
        $data = $page->page_data ?? [];
        $hero = $data['hero'] ?? [];
        $faqs = $data['faqs'] ?? [];
        $cta  = $data['cta'] ?? [];
    @endphp

    <section class="relative bg-[#0B2F5E] py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[28px] md:text-[40px] font-bold text-white leading-tight">{{ $hero['heading'] ?? $page->title }}</h1>
        </div>
    </section>

    @if (!empty($faqs))
    <section class="bg-white py-14">
        <div class="max-w-[900px] mx-auto px-4">
            <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-8">Membership FAQs</h2>
            <div class="space-y-4" x-data="{ open: null }">
                @foreach ($faqs as $i => $faq)
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button @click="open = open === {{ $i }} ? null : {{ $i }}" class="w-full flex items-center justify-between px-6 py-4 text-left bg-[#f6f8fb] hover:bg-gray-100 transition">
                        <span class="text-[15px] font-semibold text-[#14166e]">{{ $faq['question'] }}</span>
                        <svg :class="{ 'rotate-180': open === {{ $i }} }" class="w-5 h-5 text-gray-500 transition-transform shrink-0 ml-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                    </button>
                    <div x-show="open === {{ $i }}" x-collapse class="px-6 py-4 bg-white">
                        <p class="text-[14px] text-gray-700 leading-relaxed whitespace-pre-line">{{ $faq['answer'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    @if (!empty($cta))
    <section class="bg-[#f6f8fb] py-12">
        <div class="max-w-[900px] mx-auto px-4 text-center">
            <p class="text-[15px] text-gray-700 leading-relaxed mb-6">{{ $cta['text'] ?? '' }}</p>
            @if (!empty($cta['links']))
            <div class="flex flex-wrap justify-center gap-4">
                @foreach ($cta['links'] as $link)
                <a href="{{ $link['url'] }}" class="inline-block bg-[#14166e] hover:bg-[#0B2F5E] text-white font-semibold text-[14px] px-6 py-3 rounded-lg transition">{{ $link['label'] }}</a>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif
</x-layouts.cms>