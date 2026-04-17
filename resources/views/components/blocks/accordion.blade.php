{{--
    Block: Accordion / FAQ
    Expandable FAQ items using native HTML <details>/<summary>.
--}}
@php
    $heading = $data['heading'] ?? '';
    $items   = $data['items'] ?? [];
@endphp

<section class="py-12">
    <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">

        @if($heading)
            <h2 class="text-3xl font-bold text-[#0B2F5E] mb-8 text-center">{{ $heading }}</h2>
        @endif

        @if($items)
            <div class="space-y-3">
                @foreach($items as $item)
                    @php $faq = $item['data'] ?? []; @endphp
                    <details class="group border border-gray-200 rounded-lg overflow-hidden">
                        <summary class="flex items-center justify-between gap-4 px-6 py-4 cursor-pointer list-none bg-white hover:bg-gray-50 transition-colors">
                            <span class="font-semibold text-gray-900 text-base">
                                {{ $faq['question'] ?? '' }}
                            </span>
                            <svg class="w-5 h-5 text-[#0B2F5E] flex-shrink-0 transition-transform group-open:rotate-180"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </summary>
                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                            <div class="
                                text-gray-700 leading-relaxed text-sm
                                [&_p]:mb-3 [&_ul]:list-disc [&_ul]:pl-5 [&_ul_li]:mb-1
                                [&_a]:text-blue-700 [&_a]:underline
                                [&_strong]:font-semibold
                            ">
                                {!! $faq['answer'] ?? '' !!}
                            </div>
                        </div>
                    </details>
                @endforeach
            </div>
        @endif

    </div>
</section>
