@props(['certification'])

<div class="bg-[#0B2F5E] text-white py-16">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-start lg:items-center gap-8">

            {{-- Badge image --}}
            @if ($certification->og_image || $certification->badge_image)
                <div class="shrink-0">
                    <img src="{{ asset('storage/' . ($certification->og_image ?? $certification->badge_image)) }}"
                         alt="{{ $certification->title }} badge"
                         class="w-28 h-28 object-contain">
                </div>
            @endif

            {{-- Text block --}}
            <div class="flex-1">

                {{-- Credential type badge --}}
                @if ($certification->credential_type)
                    <span class="inline-block bg-white/10 text-white/80 text-xs font-semibold uppercase tracking-widest px-3 py-1 rounded-full mb-3">
                        {{ str_replace('_', ' ', $certification->credential_type) }}
                    </span>
                @endif

                <h1 class="text-3xl lg:text-4xl font-bold leading-tight mb-2">
                    {{ $certification->title }}
                    @if ($certification->acronym)
                        <span class="text-white/60 text-2xl font-normal ml-2">({{ $certification->acronym }})</span>
                    @endif
                </h1>

                {{-- Certifying body --}}
                @if ($certification->certifying_body)
                    <p class="text-white/70 text-sm mt-1">
                        Offered by <span class="font-semibold text-white">{{ $certification->certifying_body }}</span>
                    </p>
                @endif

                {{-- PDU credits --}}
                @if ($certification->pdu_credits > 0)
                    <p class="mt-3 inline-flex items-center gap-1.5 text-sm bg-[#1e5c38] text-white px-3 py-1 rounded-full">
                        <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                        </svg>
                        {{ $certification->pdu_credits }} PDU Credits
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
