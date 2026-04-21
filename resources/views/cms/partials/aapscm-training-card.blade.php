{{--
    Training schedule card for /aapscm-training/.
    Expects $card = ['title', 'image', 'href'].
    Image at full width, linked title with arrow icon below.
--}}
<a href="{{ $card['href'] ?? '#' }}"
   class="block bg-white rounded-lg shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] overflow-hidden hover:-translate-y-1 transition-transform group">
    @if (! empty($card['image']))
        <img src="{{ $card['image'] }}" alt="{{ $card['title'] ?? '' }}"
             class="w-full h-[200px] object-cover" loading="lazy">
    @endif
    <div class="p-5">
        <h2 class="text-[15px] md:text-[17px] font-semibold text-[#14166e] leading-snug group-hover:text-[#1e2199] transition-colors">
            {{ $card['title'] ?? '' }}
            <svg class="inline-block w-4 h-4 ml-1 align-baseline" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"/>
            </svg>
        </h2>
    </div>
</a>
