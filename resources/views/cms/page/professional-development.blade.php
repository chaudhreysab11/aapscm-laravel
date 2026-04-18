<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero      = $page->page_data['hero']       ?? [];
        $badgeBand = $page->page_data['badge_band'] ?? [];
        $rows      = $page->page_data['rows']       ?? [];
        $banner    = $page->page_data['banner']     ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero: left artwork + heading + join; right photo --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                @if (! empty($hero['image_left']))
                    <img src="{{ $hero['image_left'] }}" alt="" class="w-full max-w-[510px] h-auto mb-6">
                @endif
                <h2 class="text-[32px] md:text-[42px] font-semibold text-[#14166e] leading-tight mb-6">
                    {{ $hero['heading'] ?? 'Professional Development' }}
                </h2>
                @if (! empty($hero['cta_label']))
                    <a href="{{ $hero['cta_url'] ?? '#' }}"
                       class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                        {{ $hero['cta_label'] }}
                    </a>
                @endif
            </div>
            @if (! empty($hero['image_right']))
                <img src="{{ $hero['image_right'] }}" alt="" class="w-full max-w-[509px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
            @endif
        </div>
    </section>

    {{-- Badge band: small grad-cap left, CTA right --}}
    @if (! empty($badgeBand['image']))
        <section class="bg-[#f6f8fb] py-10">
            <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-3 gap-6 items-center">
                <img src="{{ $badgeBand['image'] }}" alt="" class="w-full max-w-[280px] h-auto">
                <div></div>
                <div class="text-right">
                    <a href="{{ $badgeBand['cta_url'] ?? '#' }}"
                       class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                        {{ $badgeBand['cta_label'] ?? 'Register Now' }}
                    </a>
                </div>
            </div>
        </section>
    @endif

    {{-- Alternating rows: copy | image + CTA --}}
    @foreach ($rows as $i => $row)
        @if ($i > 0)
            <div class="border-t border-dashed border-gray-300 max-w-[1100px] mx-auto"></div>
        @endif
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-3 gap-10 items-center">
                <div class="md:col-span-2">
                    <h2 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-4">
                        {{ $row['heading'] }}
                    </h2>
                    <p class="text-[16px] md:text-[18px] text-gray-700 leading-relaxed">
                        {{ $row['body'] }}
                    </p>
                </div>
                <div class="md:col-span-1">
                    @if (! empty($row['image']))
                        <img src="{{ $row['image'] }}" alt="" class="w-full h-auto rounded-lg mb-4 shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    @endif
                    @if (! empty($row['cta_label']))
                        <a href="{{ $row['cta_url'] ?? '#' }}"
                           class="block w-full text-center bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                            {{ $row['cta_label'] }}
                        </a>
                    @endif
                </div>
            </div>
        </section>
    @endforeach

    {{-- Bottom banner: Books | Seminars/Courses --}}
    <section class="grid md:grid-cols-2">
        @foreach ($banner as $idx => $b)
            <a href="{{ $b['cta_url'] ?? '#' }}"
               class="block bg-gradient-to-br from-[#14166e] to-[#1e2080] text-white py-16 px-8 text-center hover:opacity-90 transition-opacity">
                <h2 class="text-[30px] md:text-[40px] font-semibold mb-3">{{ $b['title'] }}</h2>
                <p class="text-[16px] md:text-[18px] opacity-90">{{ $b['subtitle'] }}</p>
            </a>
        @endforeach
    </section>

</x-layouts.cms>
