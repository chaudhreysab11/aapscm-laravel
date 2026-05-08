<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data        = $page->page_data ?? [];
        $hero        = $data['hero'] ?? [];
        $certsHead   = $data['certs_heading_html'] ?? '';
        $cards       = $data['cert_cards'] ?? [];
        $whyHead     = $data['why_heading_html'] ?? '';
        $whyItems    = $data['why_items'] ?? [];
        $outro       = $data['outro_html'] ?? '';
    @endphp

    {{-- Hero: heading + intro paragraphs (left) + background image (right) --}}
    @if (! empty($hero) && (! empty($hero['heading_html']) || ! empty($hero['text_html'])))
        <section
            class="relative py-14 md:py-20 bg-white bg-no-repeat bg-right-top md:bg-right"
            @if (! empty($hero['bg_image'])) style="background-image:url('{{ $hero['bg_image'] }}');background-size:auto 100%;" @endif
        >
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($hero['heading_html']))
                            <h1 class="text-[26px] md:text-[36px] font-light text-[#14166e] leading-tight mb-5">
                                {!! $hero['heading_html'] !!}
                            </h1>
                        @endif
                        @if (! empty($hero['text_html']))
                            <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed mb-4">
                                {!! $hero['text_html'] !!}
                            </div>
                        @endif
                        @if (! empty($hero['text2_html']))
                            <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed">
                                {!! $hero['text2_html'] !!}
                            </div>
                        @endif
                    </div>
                    <div aria-hidden="true"></div>
                </div>
            </div>
        </section>
    @endif

    {{-- Certifications section heading --}}
    @if ($certsHead)
        <section class="bg-white pt-8 pb-4">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-light text-[#14166e] leading-tight">
                    {!! $certsHead !!}
                </h2>
                <div class="w-16 h-[3px] bg-[#e74c1d] mx-auto mt-4"></div>
            </div>
        </section>
    @endif

    {{-- Certification cards (home-style design) --}}
    @if (! empty($cards))
        <section class="bg-[#f6f8fb] py-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-8">
                @foreach ($cards as $card)
                    @php $cardTitle = strip_tags($card['heading_html'] ?? ''); @endphp
                    <div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] p-6 flex flex-col text-center hover:-translate-y-1 transition-transform">
                        @if (! empty($card['image_top']))
                            <img src="{{ $card['image_top'] }}" alt="{{ $cardTitle }}"
                                 class="w-[200px] h-[200px] object-contain mx-auto mb-4" loading="lazy">
                        @endif

                        @if (! empty($card['heading_html']))
                            <h2 class="text-[24px] md:text-[28px] font-semibold text-[#14166e] leading-snug mb-3 min-h-[56px]">
                                {!! $card['heading_html'] !!}
                            </h2>
                        @endif

                        @if (! empty($card['text_html']))
                            <div class="text-[14px] text-gray-600 leading-relaxed flex-grow mb-5">
                                {!! $card['text_html'] !!}
                            </div>
                        @endif

                        @if (! empty($card['image_bottom']))
                            <img src="{{ $card['image_bottom'] }}" alt="{{ $cardTitle }} badge"
                                 class="w-[130px] h-[130px] object-contain mx-auto mb-4" loading="lazy">
                        @endif

                        @if (! empty($card['buttons']))
                            @foreach ($card['buttons'] as $btn)
                                <a href="{{ $btn['href'] ?: '#' }}"
                                class="inline-flex items-center justify-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-5 py-2.5 rounded-full transition-colors">
                                    {{ $btn['label'] ?: 'Learn More' }}
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                                </a>
                            @endforeach
                        @endif
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Why are these AI Certifications... --}}
    @if ($whyHead)
        <section class="bg-white pt-14 pb-6">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-light text-[#14166e] leading-tight">
                    {!! $whyHead !!}
                </h2>
                <div class="w-16 h-[3px] bg-[#e74c1d] mx-auto mt-4"></div>
            </div>
        </section>
    @endif

    @if (! empty($whyItems))
        <section class="bg-white pb-12">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach ($whyItems as $item)
                        <div class="bg-[#f6f8fb] rounded-lg p-6 flex items-start gap-4">
                            @if (! empty($item['icon']))
                                <img src="{{ $item['icon'] }}" alt="" class="w-12 h-auto flex-shrink-0" />
                            @endif
                            <div class="text-gray-800 leading-relaxed text-[15px] font-medium">
                                @if (! empty($item['heading_html']))
                                    <div class="mb-1">{!! $item['heading_html'] !!}</div>
                                @endif
                                @if (! empty($item['text_html']))
                                    <div class="text-gray-700 font-normal">{!! $item['text_html'] !!}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Outro paragraph --}}
    @if ($outro)
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed">
                    {!! $outro !!}
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
