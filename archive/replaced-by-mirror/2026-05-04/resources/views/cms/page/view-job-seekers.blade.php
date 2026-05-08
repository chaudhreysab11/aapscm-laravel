@php
    $data = $page->page_data ?? [];
    $hero = $data['hero'] ?? [];
    $panel = $data['content_panel'] ?? [];
    $menuItems = $panel['menu_items'] ?? [];
    $heroImages = $hero['images'] ?? [];
    $currentPath = '/' . trim(request()->path(), '/') . '/';
@endphp

<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    <style>
        .view-job-seekers-summary {
            list-style: none;
        }

        .view-job-seekers-summary::-webkit-details-marker {
            display: none;
        }

        .view-job-seekers-summary:hover,
        .view-job-seekers-summary:focus {
            background: #195b13;
            color: #ffffff;
        }

        .view-job-seekers-summary:hover a,
        .view-job-seekers-summary:focus a {
            color: #ffffff;
        }

        details[open] .view-job-seekers-plus {
            transform: rotate(45deg);
        }
    </style>

    <section class="bg-white">
        <div class="mx-auto grid min-h-[650px] max-w-[1200px] grid-cols-1 items-center gap-10 px-4 py-12 md:grid-cols-[49.908%_50%]"
             style="background-color: {{ $hero['background_color'] ?? '#DEDEDE' }};">
            <div class="order-2 flex flex-col items-start justify-center md:order-1">
                @if (! empty($heroImages[0]['src']))
                    <img src="{{ $heroImages[0]['src'] }}"
                         alt=""
                         class="w-full max-w-[130px]"
                         loading="lazy">
                @endif

                @if (! empty($hero['heading']))
                    <h1 class="mt-[30px] font-[stratos] text-[20px] font-bold uppercase text-[#313CBF] md:text-[3.3rem]">
                        {{ $hero['heading'] }}
                    </h1>
                @endif
            </div>

            <div class="order-1 flex justify-center md:order-2">
                @if (! empty($heroImages[1]['src']))
                    <img src="{{ $heroImages[1]['src'] }}"
                         alt=""
                         class="w-full max-w-[374px] rounded-[10px] shadow-[0_0_4px_rgba(0,0,0,0.5)]"
                         loading="lazy">
                @endif
            </div>
        </div>
    </section>

    <section class="my-[50px]">
        <div class="mx-auto grid max-w-[1200px] grid-cols-1 gap-8 px-4 md:grid-cols-[33%_66%]">
            <div>
                <nav class="overflow-hidden rounded-[5px] border-2 border-[#195B13] bg-white" aria-label="View Job Seekers Page Menu">
                    <ul class="divide-y-2 divide-[#195B13]">
                        @foreach ($menuItems as $item)
                            <li>
                                @if (! empty($item['children']))
                                    <details>
                                        <summary class="view-job-seekers-summary flex cursor-pointer items-center justify-between px-5 py-[19px] text-[16px] font-medium text-[#202124] transition-colors">
                                            <a href="{{ $item['href'] }}" class="pr-4 text-inherit">
                                                {{ $item['text'] }}
                                            </a>
                                            <span class="view-job-seekers-plus text-[24px] leading-none text-[#195B13] transition-transform">+</span>
                                        </summary>

                                        <ul class="border-t-2 border-[#195B13] bg-[#f6f8fb]">
                                            @foreach ($item['children'] as $child)
                                                @php
                                                    $isActive = ($child['href'] ?? '') === $currentPath;
                                                @endphp
                                                <li class="border-b border-[#d9e2ec] last:border-b-0">
                                                    <a href="{{ $child['href'] }}"
                                                       class="block px-7 py-4 text-[16px] font-medium transition-colors {{ $isActive ? 'bg-[#195B13] text-white' : 'text-[#202124] hover:bg-[#195B13] hover:text-white' }}">
                                                        {{ $child['text'] }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </details>
                                @else
                                    <a href="{{ $item['href'] }}"
                                       class="block px-5 py-[19px] text-[16px] font-medium text-[#202124] transition-colors hover:bg-[#195B13] hover:text-white">
                                        {{ $item['text'] }}
                                    </a>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>

            {{-- <div>
                <div class="rounded-[5px] bg-white p-5 shadow-[0_0_2px_rgba(0,0,0,0.5)]">
                    <p class="text-[18px] leading-[1.7] text-[#202124]">
                        {{ $panel['shortcode'] ?? '' }}
                    </p>
                </div>
            </div> --}}
        </div>
    </section>
</x-layouts.cms>
