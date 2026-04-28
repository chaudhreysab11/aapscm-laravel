<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $data         = $page->page_data ?? [];
        $titleHtml    = $data['title_heading_html'] ?? '';
        $building     = $data['building_section'] ?? [];
        $whyHeading   = $data['why_choose_heading_html'] ?? '';
        $whyItems     = $data['why_choose_items'] ?? [];
        $whyOutro     = $data['why_choose_outro_html'] ?? '';
        $managers     = $data['managers_section'] ?? [];
        $certIntro    = $data['cert_intro_heading_html'] ?? '';
        $cards        = $data['cert_cards'] ?? [];
    @endphp

    {{-- Page title heading --}}
    @if ($titleHtml)
        <section class="bg-white pt-12 pb-6">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <h1 class="text-[28px] md:text-[40px] font-light text-[#14166e] leading-tight">
                    {!! $titleHtml !!}
                </h1>
            </div>
        </section>
    @endif

    {{-- Building Expertise: heading + divider + sub-heading + paragraph | image --}}
    @if (! empty($building))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($building['heading_html']))
                            <h2 class="text-[26px] md:text-[34px] font-light text-[#14166e] leading-tight mb-5">
                                {!! $building['heading_html'] !!}
                            </h2>
                        @endif

                        <div class="w-16 h-[3px] bg-[#e74c1d] mb-6"></div>

                        @if (! empty($building['sub_heading_html']))
                            <h3 class="text-[22px] md:text-[28px] font-light text-[#14166e] mb-4">
                                {!! $building['sub_heading_html'] !!}
                            </h3>
                        @endif

                        @if (! empty($building['text_html']))
                            <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed">
                                {!! $building['text_html'] !!}
                            </div>
                        @endif
                    </div>

                    @if (! empty($building['image']))
                        <div>
                            <img src="{{ $building['image'] }}" alt="Building Expertise" class="w-full h-auto" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Why Choose Us heading --}}
    @if ($whyHeading)
        <section class="bg-white pt-12 pb-4">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <h2 class="text-[26px] md:text-[34px] font-light text-[#14166e]">
                    {!! $whyHeading !!}
                </h2>
                <div class="w-16 h-[3px] bg-[#e74c1d] mx-auto mt-4"></div>
            </div>
        </section>
    @endif

    {{-- Why Choose: 3-col icon list --}}
    @if (! empty($whyItems))
        <section class="bg-white pb-12">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($whyItems as $item)
                        <div class="bg-[#f5f7fa] rounded-lg p-6 flex items-start gap-4">
                            @if (! empty($item['icon']))
                                <img src="{{ $item['icon'] }}" alt="" class="w-12 h-auto flex-shrink-0" />
                            @endif
                            @if (! empty($item['desc']))
                                <div class="text-gray-700 leading-relaxed text-[15px]">
                                    {!! $item['desc'] !!}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Why Choose outro --}}
    @if ($whyOutro)
        <section class="bg-white pb-14">
            <div class="max-w-[1000px] mx-auto px-4 text-center">
                <p class="text-[16px] md:text-[18px] text-gray-700 leading-relaxed font-medium">
                    {!! $whyOutro !!}
                </p>
            </div>
        </section>
    @endif

    {{-- Managers section: image | heading + text + sub-heading + 3 image-boxes + outro --}}
    @if (! empty($managers))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    @if (! empty($managers['image']))
                        <div>
                            <img src="{{ $managers['image'] }}" alt="Managers" class="w-full h-auto" />
                        </div>
                    @endif

                    <div>
                        @if (! empty($managers['heading_html']))
                            <h2 class="text-[26px] md:text-[34px] font-light text-[#14166e] leading-tight mb-4">
                                {!! $managers['heading_html'] !!}
                            </h2>
                        @endif

                        @if (! empty($managers['text_html']))
                            <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed mb-6">
                                {!! $managers['text_html'] !!}
                            </div>
                        @endif

                        @if (! empty($managers['why_heading_html']))
                            <h3 class="text-[20px] md:text-[24px] font-light text-[#14166e] mb-4">
                                {!! $managers['why_heading_html'] !!}
                            </h3>
                        @endif

                        @if (! empty($managers['items']))
                            <ul class="space-y-3 mb-6">
                                @foreach ($managers['items'] as $mi)
                                    <li class="flex items-start gap-3">
                                        @if (! empty($mi['icon']))
                                            <img src="{{ $mi['icon'] }}" alt="" class="w-8 h-auto flex-shrink-0 mt-1" />
                                        @endif
                                        @if (! empty($mi['desc']))
                                            <div class="text-gray-700 leading-relaxed text-[15px]">
                                                {!! $mi['desc'] !!}
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if (! empty($managers['outro_html']))
                            <div class="prose prose-sm md:prose-base max-w-none text-gray-700 leading-relaxed">
                                {!! $managers['outro_html'] !!}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    {{-- Cert intro divider heading --}}
    @if ($certIntro)
        <section class="bg-white pt-14 pb-6">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h2 class="text-[22px] md:text-[28px] font-light text-[#14166e] leading-snug">
                    {!! $certIntro !!}
                </h2>
                <div class="w-16 h-[3px] bg-[#e74c1d] mx-auto mt-5"></div>
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
                            <h2 class="text-[35px] font-semibold text-[#14166e] leading-snug mb-3 min-h-[56px]">
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

                        <a href="{{ $card['btn_href'] ?: '#' }}"
                           class="inline-flex items-center justify-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-5 py-2.5 rounded-full transition-colors">
                            {{ $card['btn_label'] ?: 'Learn More' }}
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

</x-layouts.cms>
