<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero       = $page->page_data['hero']       ?? [];
        $intro      = $page->page_data['intro']      ?? [];
        $categories = $page->page_data['categories'] ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[960px] mx-auto px-4 text-center">
            <h2 class="text-[30px] md:text-[40px] font-semibold text-[#14166e] leading-tight">
                {{ $hero['heading'] ?? 'Digital Badges' }}
            </h2>
        </div>
    </section>

    {{-- Intro --}}
    @if (! empty($intro))
        <section class="bg-white py-14">
            <div class="max-w-[960px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-4 text-center">
                    {{ $intro['heading'] }}
                </h3>
                @if (! empty($intro['body_1']))
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-4">{{ $intro['body_1'] }}</p>
                @endif
                @if (! empty($intro['body_2']))
                    <p class="text-[16px] text-gray-700 leading-relaxed">{{ $intro['body_2'] }}</p>
                @endif
            </div>
        </section>
    @endif

    {{-- Category grids --}}
    @foreach ($categories as $catIndex => $cat)
        <section class="{{ $catIndex % 2 === 0 ? 'bg-[#f6f8fb]' : 'bg-white' }} py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h3 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] text-center mb-10">
                    {{ $cat['heading'] }}
                </h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                    @foreach (($cat['badges'] ?? []) as $badge)
                        <div class="flex items-center justify-center bg-white rounded-lg p-4 border border-gray-200 shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                            <img src="{{ $badge }}" alt="" class="max-w-full h-auto object-contain">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

</x-layouts.cms>
