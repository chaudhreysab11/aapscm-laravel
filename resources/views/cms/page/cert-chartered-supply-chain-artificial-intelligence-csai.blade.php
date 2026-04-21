<x-layouts.cms>
    <x-cms.seo-head :page="$page" />
    <x-cms.eltdf-title-bar :title="$page->title" :breadcrumbs="[['label' => $page->title]]" />

    @php($d = $page->page_data ?? [])

    {{-- Product --}}
    @if (! empty($d['product']))
        <section class="bg-white py-16 md:py-20">
            <div class="max-w-[1100px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                @if (! empty($d['product']['image']))
                    <div>
                        <img src="{{ $d['product']['image'] }}" alt="{{ $d['product']['title'] }}" class="w-full h-auto rounded-md" loading="lazy">
                    </div>
                @endif
                <div>
                    <h1 class="text-[22px] md:text-[28px] font-bold text-[#14166e] leading-snug mb-4">{{ $d['product']['title'] }}</h1>
                    @if (! empty($d['product']['price']))
                        <p class="text-[22px] md:text-[26px] font-bold text-[#14166e] mb-6">{{ $d['product']['price'] }}</p>
                    @endif
                    @if (! empty($d['product']['cta_label']))
                        <a href="{{ $d['product']['cta_href'] }}" class="inline-block bg-[#5cb85c] hover:bg-[#4cae4c] text-white font-semibold text-[15px] px-8 py-3 rounded-full transition">{{ $d['product']['cta_label'] }}</a>
                    @endif
                    @if (! empty($d['product']['category_name']))
                        <p class="text-[14px] text-gray-600 mt-6">
                            {{ $d['product']['category_label'] ?? 'Category:' }}
                            <a href="{{ $d['product']['category_href'] ?? '#' }}" class="text-[#14166e] hover:underline">{{ $d['product']['category_name'] }}</a>
                        </p>
                    @endif
                </div>
            </div>
        </section>
    @endif
</x-layouts.cms>
