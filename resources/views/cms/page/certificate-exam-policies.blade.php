@php
    $data = $page->page_data ?? [];
    $heroHeading = $data['hero_heading_html'] ?? '';
    $sections = $data['sections'] ?? [];
    $sidebar = $data['sidebar'] ?? [];
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

    {{-- Two-column body: policy text (left) + media sidebar (right) --}}
    <section class="bg-[#f6f8fb] py-12 md:py-16">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8">

                {{-- Policy content --}}
                <div class="lg:col-span-8 space-y-8">
                    @foreach ($sections as $sec)
                        <article>
                            @if (! empty($sec['title_html']))
                                <h2 class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-3">
                                    {!! $sec['title_html'] !!}
                                </h2>
                            @endif

                            @if (! empty($sec['intro_html']))
                                <div class="text-[15.5px] md:text-[16px] text-gray-700 leading-relaxed mb-3">
                                    {!! $sec['intro_html'] !!}
                                </div>
                            @endif

                            @foreach ($sec['blocks'] ?? [] as $block)
                                @if ($block['type'] === 'list')
                                    <ul class="space-y-2 mb-4">
                                        @foreach ($block['items'] ?? [] as $item)
                                            <li class="flex items-start gap-3 text-[15.5px] text-gray-700 leading-relaxed">
                                                <svg class="w-5 h-5 mt-0.5 flex-shrink-0 text-[#14166e]" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
                                                <span>{!! $item['html'] !!}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @elseif ($block['type'] === 'steps')
                                    <div class="space-y-4 mb-2">
                                        @foreach ($block['items'] ?? [] as $step)
                                            <div>
                                                <h3 class="text-[16px] md:text-[17px] font-semibold text-[#14166e] mb-1">
                                                    {!! $step['title_html'] !!}
                                                </h3>
                                                <p class="text-[15px] text-gray-700 leading-relaxed">
                                                    {!! $step['desc_html'] !!}
                                                </p>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            @endforeach
                        </article>
                    @endforeach
                </div>

                {{-- Sidebar: video + image --}}
                <aside class="lg:col-span-4 space-y-6">
                    @if (! empty($sidebar['youtube_id']))
                        <div class="aspect-video w-full overflow-hidden rounded-md shadow-sm bg-black">
                            <iframe
                                class="w-full h-full"
                                src="https://www.youtube.com/embed/{{ $sidebar['youtube_id'] }}"
                                title="AAPSCM® Certification Examination Policy"
                                frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin"
                                allowfullscreen
                                loading="lazy"></iframe>
                        </div>
                    @endif

                    @if (! empty($sidebar['image']))
                        <div>
                            <img src="{{ $sidebar['image'] }}" alt="" class="w-full h-auto rounded-md shadow-sm" loading="lazy" />
                        </div>
                    @endif
                </aside>

            </div>
        </div>
    </section>
</x-layouts.cms>
