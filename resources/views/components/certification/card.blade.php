@props(['certification'])

<a href="{{ route('certifications.show', $certification->slug) }}"
   class="group flex flex-col bg-white border border-gray-200 rounded-xl p-5 hover:border-[#0B2F5E] hover:shadow-md transition-all duration-150">

    {{-- Badge --}}
    @if ($certification->badge_image)
        <img src="{{ asset('storage/' . $certification->badge_image) }}"
             alt="{{ $certification->title }} badge"
             class="w-16 h-16 object-contain mb-4">
    @else
        <div class="w-16 h-16 rounded-full bg-[#0B2F5E] flex items-center justify-center mb-4">
            <span class="text-white font-bold text-sm">{{ $certification->acronym ?? '?' }}</span>
        </div>
    @endif

    {{-- Acronym + type --}}
    <div class="flex items-center gap-2 mb-1">
        @if ($certification->acronym)
            <span class="text-xs font-semibold text-[#1e5c38] uppercase tracking-wide">
                {{ $certification->acronym }}
            </span>
        @endif
        @if ($certification->credential_type)
            <span class="text-xs text-gray-400 capitalize">
                {{ str_replace('_', ' ', $certification->credential_type) }}
            </span>
        @endif
    </div>

    {{-- Title --}}
    <h3 class="text-sm font-semibold text-gray-900 leading-snug mb-2 group-hover:text-[#0B2F5E]">
        {{ $certification->title }}
    </h3>

    {{-- PDU credits --}}
    @if ($certification->pdu_credits > 0)
        <p class="mt-auto text-xs text-gray-500 pt-3 border-t border-gray-100">
            {{ $certification->pdu_credits }} PDU credits
        </p>
    @endif
</a>
