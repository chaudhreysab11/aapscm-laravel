@php($p = $page->page_data ?? [])

<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @if(!empty($p['product']))
        <section class="bg-white py-14">
            <div class="max-w-6xl mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-start">
                <div>
                    <a href="{{ $p['product']['image'] }}" class="block">
                        <img src="{{ $p['product']['image_thumb'] }}"
                             alt="{{ $p['product']['image_alt'] }}"
                             class="w-full h-auto rounded-md shadow-sm border border-gray-200">
                    </a>
                </div>
                <div>
                    <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] leading-snug">
                        {{ $p['product']['product_title'] }}
                    </h2>
                    <p class="mt-4 text-[28px] font-semibold text-[#14166e]">
                        {{ $p['product']['price'] }}
                    </p>

                    <div class="mt-6">
                        <a href="{{ $p['product']['cta_href'] }}"
                           class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">
                            {{ $p['product']['cta_label'] }}
                        </a>
                    </div>

                    <div class="mt-8 text-sm text-gray-700 border-t border-gray-200 pt-4">
                        <span class="font-semibold">{{ $p['product']['category_label'] }}</span>
                        <a href="{{ $p['product']['category_href'] }}"
                           class="text-[#14166e] hover:underline ml-1">
                            {{ $p['product']['category_name'] }}
                        </a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(!empty($p['related']['items']))
        <section class="bg-[#f5f7fa] py-14">
            <div class="max-w-6xl mx-auto px-4">
                <h2 class="text-[26px] md:text-[32px] font-bold text-[#14166e] uppercase leading-snug mb-8">
                    {{ $p['related']['heading'] }}
                </h2>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                    @foreach($p['related']['items'] as $item)
                        <div class="bg-white rounded-md shadow-sm border border-gray-200 flex flex-col">
                            <a href="{{ $item['href'] }}" class="block">
                                <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}"
                                     class="w-full h-auto">
                            </a>
                            <div class="p-4 flex flex-col flex-1">
                                <h4 class="text-[15px] font-semibold text-[#14166e] leading-snug min-h-[60px]">
                                    <a href="{{ $item['href'] }}" class="hover:underline">{{ $item['title'] }}</a>
                                </h4>
                                <p class="mt-3 text-[18px] font-bold text-[#14166e]">{{ $item['price'] }}</p>
                                <a href="{{ $item['href'] }}"
                                   class="mt-4 inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[13px] px-5 py-2 rounded-full transition text-center">
                                    {{ $item['cta_label'] }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-layouts.cms>
