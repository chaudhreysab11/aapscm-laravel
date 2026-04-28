<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $intro = $page->page_data['intro'] ?? [];
        $cards = $page->page_data['cards'] ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Intro / Hero --}}
    @if (! empty($intro))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($intro['title']))
                            <h2 class="text-[28px] md:text-[36px] font-medium text-[#202124] mb-6">
                                {{ $intro['title'] }}
                            </h2>
                        @endif

                        @foreach ($intro['paragraphs'] ?? [] as $p)
                            <p class="text-[16px] text-[#202124] leading-relaxed mb-4">
                                {!! $p !!}
                            </p>
                        @endforeach

                        @if (! empty($intro['button']))
                            <div class="mt-6">
                                <a href="{{ $intro['button']['href'] }}"
                                   class="inline-block bg-[#005B1C] text-white font-medium text-sm px-6 py-3.5 rounded-full hover:bg-[#004515] transition-colors">
                                    {{ $intro['button']['text'] }}
                                </a>
                            </div>
                        @endif
                    </div>

                    @if (! empty($intro['image']['src']))
                        <div class="flex justify-center">
                            <img src="{{ $intro['image']['src'] }}"
                                 alt="{{ $intro['image']['alt'] ?? '' }}"
                                 class="max-w-full h-auto">
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- Course cards grid (2-up on md+) --}}
    @if (! empty($cards))
        <section class="bg-white pb-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-2.5 gap-y-5">
                    @foreach ($cards as $card)
                        <a href="{{ $card['href'] }}"
                           class="block border border-black rounded-[10px] overflow-hidden bg-white hover:shadow-md transition-shadow">
                            <div class="h-[180px] bg-cover bg-center bg-no-repeat rounded-t-[10px]"
                                 style="background-image:url('{{ $card['banner'] }}');"></div>
                            <div class="px-5 py-5">
                                <h2 class="text-[16px] font-semibold text-[#2A2A2A] leading-snug">
                                    {{ $card['title'] }}
                                </h2>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
