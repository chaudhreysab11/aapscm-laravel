@php
    $data     = $page->page_data ?? [];
    $intro    = $data['intro']    ?? [];
    $sections = $data['sections'] ?? [];
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- Intro: H3 heading + H5 lead paragraph --}}
    @if (! empty($intro))
        <section class="bg-white pt-14 pb-10">
            <div class="max-w-[1100px] mx-auto px-4">
                <h3 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-4 leading-snug">
                    {{ $intro['heading'] ?? '' }}
                </h3>
                @if (! empty($intro['lead']))
                    <h5 class="text-[15px] md:text-[17px] text-gray-700 leading-relaxed max-w-[900px]">
                        {{ $intro['lead'] }}
                    </h5>
                @endif
            </div>
        </section>
    @endif

    {{-- Certification sections: each has a heading + 4-col card grid --}}
    @foreach ($sections as $sIdx => $section)
        <section class="{{ $sIdx % 2 === 0 ? 'bg-[#f6f8fb]' : 'bg-white' }} py-12">
            <div class="max-w-[1200px] mx-auto px-4">
                @if (! empty($section['heading']))
                    <h3 class="text-center text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-8 leading-snug">
                        {{ $section['heading'] }}
                    </h3>
                @endif

                @if (! empty($section['cards']))
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                        @foreach ($section['cards'] as $card)
                            @include('cms.partials.all-courses-card', ['card' => $card])
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endforeach

</x-layouts.cms>
