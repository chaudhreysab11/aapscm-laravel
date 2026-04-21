{{--
    Shared card for /all-courses/.
    Expects $card = ['title', 'image', 'href'].
    Simpler than the certifications-for-professionals card: no description, no badge.
--}}
<div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] p-5 flex flex-col items-center text-center hover:-translate-y-1 transition-transform">
    @if (! empty($card['image']))
        <img src="{{ $card['image'] }}" alt="{{ $card['title'] ?? '' }}"
             class="w-[140px] h-[140px] object-contain mx-auto mb-4">
    @endif
    <h3 class="text-[15px] md:text-[17px] font-semibold text-[#14166e] leading-snug mb-4 min-h-[48px] flex items-center">
        {{ $card['title'] ?? '' }}
    </h3>
    <a href="{{ $card['href'] ?? '#' }}"
       class="mt-auto inline-flex items-center justify-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-4 py-2 rounded-full transition-colors">
        Learn More
        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
            <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
        </svg>
    </a>
</div>
