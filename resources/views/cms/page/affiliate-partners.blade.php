<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero     = $page->page_data['hero']     ?? [];
        $intro    = $page->page_data['intro']    ?? [];
        $partners = $page->page_data['partners'] ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero: heading + brochure button --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h3 class="text-[32px] md:text-[44px] font-semibold text-[#14166e] leading-tight mb-6">
                {{ $hero['heading'] ?? 'Affiliate Partners' }}
            </h3>
            @if (! empty($hero['brochure_url']))
                <a href="{{ $hero['brochure_url'] }}" target="_blank" rel="noopener"
                   class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                    {{ $hero['brochure_label'] ?? "Authorized training partner\u{2019} pdf" }}
                </a>
            @endif
        </div>
    </section>

    {{-- Intro row: heading + CTA button | YouTube video --}}
    <section class="bg-white py-14" id="become-partner">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <h2 class="text-[32px] md:text-[42px] font-semibold text-[#14166e] leading-tight mb-6">
                    {{ $intro['heading'] ?? 'Our Affiliate Partners' }}
                </h2>
                @if (! empty($intro['cta_label']))
                    <a href="{{ $intro['cta_url'] ?? '#become-partner' }}"
                       class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#0f1157] text-white text-[14px] font-semibold px-5 py-2.5 rounded transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/></svg>
                        {{ $intro['cta_label'] }}
                    </a>
                @endif
            </div>
            @if (! empty($intro['youtube_id']))
                <div class="aspect-video w-full rounded-lg overflow-hidden shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]">
                    <iframe
                        src="https://www.youtube.com/embed/{{ $intro['youtube_id'] }}"
                        title="Our Affiliate Partners"
                        class="w-full h-full"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            @endif
        </div>
    </section>

    {{-- Partner flip cards grid --}}
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid sm:grid-cols-2 md:grid-cols-3 gap-8">
            @foreach ($partners as $partner)
                <div class="bg-white border border-gray-200 rounded-lg overflow-hidden shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px] flex flex-col">
                    <div class="flex items-center justify-center h-[180px] bg-white p-6">
                        <img src="{{ $partner['image'] }}" alt="{{ $partner['name'] }}" class="max-h-[140px] max-w-full object-contain">
                    </div>
                    <div class="px-6 py-5 text-center border-t border-gray-100">
                        <h5 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] leading-snug mb-2">
                            {!! $partner['name_html'] ?? e($partner['name']) !!}
                        </h5>
                        <p class="text-[14px] text-gray-600 break-all">
                            <a href="{{ $partner['url'] }}" target="_blank" rel="noopener" class="hover:underline">{{ $partner['url'] }}</a>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</x-layouts.cms>
