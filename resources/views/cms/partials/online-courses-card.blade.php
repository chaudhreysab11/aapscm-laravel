{{--
    Product card for /online-courses/.
    Expects $card = ['abbrev', 'title', 'member_price', 'non_member_price', 'member_href', 'non_member_href'].
--}}

@php
    $textColors = [
        '#1e2199',
        '#195b13',
        '#6b21a8',
        '#b91c1c',
        '#0b3c5d',
        '#047857',
        '#9d174d',
        '#0f172a',
        '#064e3b',
        '#7c2d12',
        '#1e40af',
        '#065f46',
        '#881337',
        '#111827',
        '#0c4a6e',
    ];
    $abbrevColor = $textColors[$loop->index % count($textColors)];
@endphp
<div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] p-6 flex flex-col items-center text-center hover:-translate-y-1 transition-transform">
    {{-- Abbreviation --}}
    <h3 class="text-[20px] md:text-[24px] font-bold leading-tight mb-2" style="color: {{ $abbrevColor }};">
        {{ $card['abbrev'] ?? '' }}
    </h3>

    {{-- Divider --}}
    <div class="w-12 h-[3px] bg-[#2da44e] rounded mb-3"></div>

    {{-- Full title --}}
    <p class="text-[13px] md:text-[14px] text-gray-700 leading-snug mb-4 min-h-[48px]">
        {{ $card['title'] ?? '' }}
    </p>

    {{-- Pricing --}}
    <div class="w-full flex justify-center gap-6 mb-5 text-sm">
        <div>
            <span class="block text-gray-500 text-[12px] uppercase tracking-wide">Members</span>
            <span class="font-bold text-[#14166e]">${{ $card['member_price'] ?? '399.00' }}</span>
        </div>
        <div>
            <span class="block text-gray-500 text-[12px] uppercase tracking-wide">Non-Members</span>
            <span class="font-bold text-[#14166e]">${{ $card['non_member_price'] ?? '399.00' }}</span>
        </div>
    </div>

    {{-- Buttons --}}
    <div class="mt-auto flex flex-col sm:flex-row gap-2 w-full">
        <a href="{{ $card['member_href'] ?? '#' }}"
           class="flex-1 inline-flex items-center justify-center bg-[#14166e] hover:bg-[#14166e] text-white font-semibold text-[13px] px-3 py-2 rounded-full transition-colors">
            Members
        </a>
        <a href="{{ $card['non_member_href'] ?? '#' }}"
           class="flex-1 inline-flex items-center justify-center bg-[#14166e] hover:bg-[#14166e] text-white font-semibold text-[13px] px-3 py-2 rounded-full transition-colors">
            Non-Members
        </a>
    </div>
</div>
