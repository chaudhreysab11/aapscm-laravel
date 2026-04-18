<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $heroImage   = $page->page_data['hero_image']   ?? null;
        $heroKicker  = $page->page_data['hero_kicker']  ?? 'Certification FAQs';
        $heroHeading = $page->page_data['hero_heading'] ?? $page->title;
        $intro       = $page->page_data['intro']        ?? '';
        $sections    = $page->page_data['sections']     ?? [];
        $cta         = $page->page_data['cta']          ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Intro: text left, hero image right --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    @if ($heroKicker)
                        <h3 class="text-[22px] md:text-[26px] font-light text-[#14166e] leading-tight mb-3">
                            Certification <span class="font-semibold">FAQs</span>
                        </h3>
                    @endif

                    <h2 class="text-[28px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-5">
                        {{ $heroHeading }}
                    </h2>

                    @if ($intro)
                        <p class="text-[16px] text-gray-700 leading-relaxed">{!! $intro !!}</p>
                    @endif
                </div>

                @if ($heroImage)
                    <div>
                        <img src="{{ $heroImage }}" alt="{{ $page->title }}" class="w-full h-auto rounded" />
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- FAQ sections --}}
    @foreach ($sections as $sectionIndex => $section)
        <section class="py-12 {{ $sectionIndex % 2 === 0 ? 'bg-[#f6f8fb]' : 'bg-white' }}">
            <div class="max-w-[1080px] mx-auto px-4">
                @if (! empty($section['heading']))
                    <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] text-center mb-8">
                        {{ $section['heading'] }}
                    </h3>
                @endif

                <div class="space-y-3" x-data="{ open: null }">
                    @foreach (($section['items'] ?? []) as $itemIndex => $item)
                        @php $key = "s{$sectionIndex}-i{$itemIndex}"; @endphp
                        <div class="bg-white border border-gray-200 rounded-lg shadow-sm overflow-hidden">
                            <button
                                type="button"
                                @click="open === '{{ $key }}' ? open = null : open = '{{ $key }}'"
                                class="w-full flex items-center justify-between gap-4 text-left px-6 py-4 hover:bg-[#fef5ef] transition"
                            >
                                <span class="text-[15px] md:text-[16px] font-semibold text-[#14166e]">
                                    {{ $item['question'] }}
                                </span>
                                <svg class="w-5 h-5 text-[#14166e] flex-shrink-0 transition-transform"
                                     :class="open === '{{ $key }}' ? 'rotate-180' : ''"
                                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <div x-show="open === '{{ $key }}'" x-cloak class="px-6 pb-5 pt-1">
                                <div class="
                                    text-[15px] text-gray-700 leading-relaxed
                                    [&_p]:mb-3
                                    [&_ul]:list-disc [&_ul]:ml-6 [&_ul]:space-y-1.5 [&_ul]:mb-3
                                    [&_ol]:list-decimal [&_ol]:ml-6 [&_ol]:space-y-1.5 [&_ol]:mb-3
                                    [&_a]:text-[#14166e] [&_a]:underline hover:[&_a]:text-[#0f1159]
                                    [&_strong]:font-semibold [&_b]:font-semibold
                                ">
                                    {!! $item['answer_html'] !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

    {{-- CTA --}}
    @if (! empty($cta))
        <section class="bg-[#fef5ef] py-14">
            <div class="max-w-[900px] mx-auto px-4 text-center">
                @if (! empty($cta['heading']))
                    <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-4">
                        Get Started <span class="font-light">Today</span>
                    </h3>
                @endif

                @if (! empty($cta['body']))
                    <p class="text-[16px] text-gray-700 leading-relaxed max-w-[760px] mx-auto mb-8">
                        {{ $cta['body'] }}
                    </p>
                @endif

                @if (! empty($cta['buttons']))
                    <div class="flex flex-col sm:flex-row gap-4 justify-center">
                        @foreach ($cta['buttons'] as $btnIndex => $btn)
                            <a href="{{ $btn['href'] }}"
                               class="{{ $btnIndex === 0
                                    ? 'bg-[#14166e] hover:bg-[#0f1159] text-white'
                                    : 'bg-white hover:bg-gray-100 text-[#14166e] border border-[#14166e]' }}
                                    font-semibold text-[15px] px-8 py-3 rounded transition">
                                {{ $btn['label'] }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

</x-layouts.cms>
