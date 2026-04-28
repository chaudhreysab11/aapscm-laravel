@php
    $data = $page->page_data ?? [];
    $heroHeading = $data['hero_heading_html'] ?? '';
    $steps = $data['steps'] ?? [];
    $closing = $data['closing_html'] ?? '';
@endphp

<x-layouts.cms :page="$page">
    <x-cms.seo-head :page="$page" />

    {{-- Hero --}}
    @if (! empty($heroHeading))
        <section class="bg-white py-14 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h1 class="text-[26px] md:text-[36px] font-semibold text-[#14166e] leading-tight">
                    {!! $heroHeading !!}
                </h1>
                <div class="w-16 h-[3px] bg-[#e74c1d] mx-auto mt-5"></div>
            </div>
        </section>
    @endif

    {{-- Steps --}}
    @foreach ($steps as $sIdx => $step)
        @php $imageRight = ($step['image_side'] ?? 'left') === 'right'; @endphp
        <section class="{{ $sIdx % 2 === 0 ? 'bg-[#f6f8fb]' : 'bg-white' }} py-12 md:py-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-12 gap-6 items-center">
                    @if (! empty($step['image']))
                        <div class="col-span-2 md:col-span-1 flex {{ $imageRight ? 'order-2 md:justify-start' : 'order-1 md:justify-end' }} justify-left">
                            <img src="{{ $step['image'] }}" alt="" class="w-auto max-w-[144px] h-auto" loading="lazy" />
                        </div>
                    @endif
                    <div class="col-span-10 md:col-span-11 {{ $imageRight ? 'order-1' : 'order-2' }}">
                        @if (! empty($step['title_html']))
                            <h2 class="text-[22px] md:text-[28px] font-semibold text-[#14166e] leading-snug mb-5">
                                {!! $step['title_html'] !!}
                            </h2>
                        @endif
                        @foreach ($step['blocks'] ?? [] as $block)
                            @if ($block['type'] === 'paragraph')
                                <div class="text-[15.5px] md:text-[16px] text-gray-700 leading-relaxed mb-4">
                                    {!! $block['html'] !!}
                                </div>
                            @elseif ($block['type'] === 'subheading')
                                <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] mt-6 mb-3">
                                    {!! $block['html'] !!}
                                </h3>
                            @elseif ($block['type'] === 'list')
                                <ul class="space-y-3 mb-4">
                                    @foreach ($block['items'] ?? [] as $item)
                                        <li class="flex items-start gap-3 text-[15.5px] text-gray-700 leading-relaxed">
                                            <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-[#14166e]" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                            <span>{!! $item['html'] !!}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    {{-- Closing --}}
    @if (! empty($closing))
        <section class="bg-white py-12 md:py-16">
            <div class="max-w-[1000px] mx-auto px-4 text-center">
                <p class="text-[16px] md:text-[18px] text-gray-700 leading-relaxed">
                    {!! $closing !!}
                </p>
            </div>
        </section>
    @endif
</x-layouts.cms>
