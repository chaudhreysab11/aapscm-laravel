{{--
    Shared card for /certifications-for-professionals/.
    Expects $cert = ['title', 'desc', 'href', 'image', 'badge'].
    Live page uses the card's Learn More button as the only interactive link;
    some entries have href = '#' or a broken '/hyperlink-1/' slug (preserved
    for visual parity with WordPress).
--}}
<div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] p-6 flex flex-col text-center hover:-translate-y-1 transition-transform">
    @if (! empty($cert['image']))
        <img src="{{ $cert['image'] }}" alt="{{ $cert['title'] ?? '' }}"
             class="w-[200px] h-[200px] object-contain mx-auto mb-4">
    @endif
    <h2 class="text-[22px] md:text-[26px] font-semibold text-[#14166e] leading-snug mb-3 min-h-[56px]">
        {{ $cert['title'] ?? '' }}
    </h2>
    <p class="text-[14px] text-gray-600 leading-relaxed flex-grow mb-5">
        {{ $cert['desc'] ?? '' }}
    </p>
    @if (! empty($cert['badge']))
        <img src="{{ $cert['badge'] }}" alt="{{ $cert['title'] ?? '' }} badge"
             class="w-[130px] h-[130px] object-contain mx-auto mb-4">
    @endif
    <a href="{{ $cert['href'] ?? '#' }}"
       class="inline-flex items-center justify-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-5 py-2.5 rounded-full transition-colors">
        Learn More
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
    </a>
</div>
