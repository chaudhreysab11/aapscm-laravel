<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data       = $page->page_data ?? [];
        $hero       = $data['hero']        ?? [];
        $introBand  = $data['intro_band']  ?? [];
        $steps      = $data['steps']       ?? [];
        $closing    = $data['closing']     ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero: heading + intro paragraphs + side image --}}
    @if (! empty($hero))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        <h2 class="text-[28px] md:text-[34px] font-light text-[#14166e] leading-tight mb-5">
                            {{ $hero['heading_pre'] ?? '' }}<span class="font-semibold">{{ $hero['heading_bold'] ?? '' }}</span>
                        </h2>

                        @foreach ($hero['paragraphs'] ?? [] as $para)
                            <p class="text-[16px] text-gray-700 leading-relaxed mb-4">{{ $para }}</p>
                        @endforeach
                    </div>

                    @if (! empty($hero['image']))
                        <div>
                            <img src="{{ $hero['image'] }}" alt="" class="w-full h-auto" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Intro band: image left + paragraph right --}}
    @if (! empty($introBand))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    @if (! empty($introBand['image']))
                        <div>
                            <img src="{{ $introBand['image'] }}" alt="" class="w-full h-auto" />
                        </div>
                    @endif

                    @if (! empty($introBand['paragraph']))
                        <div>
                            <p class="text-[16px] text-gray-700 leading-relaxed">{{ $introBand['paragraph'] }}</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Steps: 2-column grid (preserves source DOM order: 1, 3, 2, 4) --}}
    @if (! empty($steps))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-10 gap-y-12">
                    @foreach ($steps as $step)
                        <div class="flex flex-col">
                            <h3 class="text-[22px] md:text-[26px] font-light text-[#14166e] leading-snug mb-5">
                                {{ $step['heading_pre'] ?? '' }}<span class="font-semibold">{{ $step['heading_bold'] ?? '' }}</span>
                            </h3>

                            @foreach ($step['paragraphs'] ?? [] as $para)
                                <p class="text-[15.5px] text-gray-700 leading-relaxed mb-4">{{ $para }}</p>
                            @endforeach

                            @if (! empty($step['cta_label']) && ! empty($step['cta_url']))
                                <div class="mt-4">
                                    <a href="{{ $step['cta_url'] }}"
                                       class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-6 py-3 rounded-full transition">
                                        {{ $step['cta_label'] }}
                                    </a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Closing: Congratulations heading + paragraph + image --}}
    @if (! empty($closing))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        <h2 class="text-[26px] md:text-[32px] font-light text-[#14166e] leading-tight mb-5">
                            {{ $closing['heading_pre'] ?? '' }}<span class="font-semibold">{{ $closing['heading_bold'] ?? '' }}</span>
                        </h2>

                        @foreach ($closing['paragraphs'] ?? [] as $para)
                            <p class="text-[16px] text-gray-700 leading-relaxed mb-4">{{ $para }}</p>
                        @endforeach
                    </div>

                    @if (! empty($closing['image']))
                        <div>
                            <img src="{{ $closing['image'] }}" alt="" class="w-full h-auto" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
