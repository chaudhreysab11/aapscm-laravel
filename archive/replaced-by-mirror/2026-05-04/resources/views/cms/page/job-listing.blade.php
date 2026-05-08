<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero = $page->page_data['hero'] ?? [];
        $menu = $page->page_data['menu']['items'] ?? [];
        $search = $page->page_data['search'] ?? [];
        $currentPath = '/' . trim(request()->path(), '/') . '/';
    @endphp

    <style>
        .job-menu-summary {
            list-style: none;
        }

        .job-menu-summary::-webkit-details-marker {
            display: none;
        }

        .job-menu-summary:hover,
        .job-menu-summary:focus {
            background: #195b13;
            color: #ffffff;
        }

        .job-menu-summary:hover a,
        .job-menu-summary:focus a {
            color: #ffffff;
        }

        details[open] .job-menu-plus {
            transform: rotate(45deg);
        }
    </style>

    @if (! empty($hero))
        <section class="relative bg-cover bg-center bg-no-repeat"
                 @if (! empty($hero['background'])) style="background-image: url('{{ $hero['background'] }}');" @endif>
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative mx-auto max-w-[1200px] px-4 py-[100px] text-center">
                <h3 class="text-[40px] font-semibold uppercase leading-[45px] text-white">
                    {{ $hero['title'] }}
                </h3>
            </div>
        </section>
    @endif

    @if (! empty($menu))
        <section class="my-[50px]">
            <div class="mx-auto max-w-[1200px] px-4">
                <nav class="overflow-hidden rounded-[5px] border-2 border-[#195B13] bg-white" aria-label="Job Listing Page Menu">
                    <ul class="divide-y-2 divide-[#195B13]">
                        @foreach ($menu as $item)
                            <li>
                                @if (! empty($item['children']))
                                    <details>
                                        <summary class="job-menu-summary flex cursor-pointer items-center justify-between px-5 py-[19px] text-[16px] font-medium text-[#202124] transition-colors">
                                            <a href="{{ $item['href'] }}" class="pr-4 text-inherit">
                                                {{ $item['text'] }}
                                            </a>
                                            <span class="job-menu-plus text-[24px] leading-none text-[#195B13] transition-transform">+</span>
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
        </section>
    @endif

    {{-- @if (! empty($search['shortcode']))
        <section class="mb-[50px]">
            <div class="mx-auto max-w-[1200px] px-4">
                <div class="{{ $search['card_class'] ?? '' }} rounded-[5px] bg-white p-5 shadow-[0_0_2px_rgba(0,0,0,0.5)]">
                    <p class="text-[18px] leading-[1.7] text-[#202124]">
                        {{ $search['shortcode'] }}
                    </p>
                </div>
            </div>
        </section>
    @endif --}}

</x-layouts.cms>
