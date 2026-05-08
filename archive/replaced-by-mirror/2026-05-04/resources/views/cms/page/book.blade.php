<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero  = $page->page_data['hero']  ?? [];
        $intro = $page->page_data['intro'] ?? [];
        $books = $page->page_data['books'] ?? [];
    @endphp

    {{-- Hero --}}
    @if (! empty($hero))
        <section class="relative bg-cover bg-center bg-no-repeat"
                 @if (! empty($hero['background'])) style="background-image:url('{{ $hero['background'] }}');" @endif>
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative max-w-[1200px] mx-auto px-4 py-[100px] text-center">
                <h3 class="text-white font-semibold uppercase tracking-wide text-[28px] md:text-[40px] leading-[45px]">
                    {{ $hero['title'] }}
                </h3>
            </div>
        </section>
    @endif

    {{-- Intro: title + paragraph + image --}}
    @if (! empty($intro))
        <section class="bg-white py-[70px]">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($intro['title']))
                            <h2 class="uppercase font-normal text-[32px] md:text-[48px] leading-[1.1] text-[#202124] mb-6">
                                {{ $intro['title'] }}
                            </h2>
                        @endif

                        @if (! empty($intro['paragraph']))
                            <p class="text-[16px] text-[#202124] leading-[26px]">
                                {!! $intro['paragraph'] !!}
                            </p>
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

    {{-- Books grid (4-up on md+) --}}
    @if (! empty($books))
        <section class="bg-white pb-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach ($books as $book)
                        <div class="flex flex-col items-center text-center rounded p-4 border border-gray-200 h-full">
                            @if (! empty($book['image']))
                                <div class="h-[100px] flex items-center justify-center mb-4">
                                    <img src="{{ $book['image'] }}"
                                         alt="{{ $book['title'] }}"
                                         class="max-h-[100px] w-auto object-contain">
                                </div>
                            @endif

                            @if (! empty($book['title']))
                                <p class="text-[15px] font-normal text-[#202124] leading-snug mb-4 min-h-[60px]">
                                    {{ $book['title'] }}
                                </p>
                            @endif

                            @if (! empty($book['btn_href']))
                                <a href="{{ $book['btn_href'] }}"
                                   rel="nofollow"
                                   target="_blank"
                                   class="inline-block bg-[#14166e] text-white font-medium text-sm px-5 py-2 rounded hover:bg-[#0f1159] transition-colors">
                                    {{ $book['btn_text'] ?: 'Buy Now' }}
                                </a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
