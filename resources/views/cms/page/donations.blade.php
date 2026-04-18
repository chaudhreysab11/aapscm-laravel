<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $heroHeading  = $page->page_data['hero_heading']  ?? $page->title;
        $panelHeading = $page->page_data['panel_heading'] ?? '';
        $bankDetails  = $page->page_data['bank_details']  ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Banner: peach band with large "Donations" heading (matches live page) --}}
    <section class="bg-[#fef5ef] py-16">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[32px] md:text-[40px] font-semibold text-[#14166e] leading-tight">
                {{ $heroHeading }}
            </h2>
        </div>
    </section>

    {{-- Centered bank-details panel --}}
    <section class="bg-white py-16">
        <div class="max-w-[720px] mx-auto px-4">
            <div class="bg-white border border-gray-200 rounded-lg p-8 md:p-10 shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px]">

                @if ($panelHeading)
                    <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] leading-relaxed text-center whitespace-pre-line mb-8">
                        {{ $panelHeading }}
                    </h3>
                @endif

                <dl class="space-y-5 text-[16px] leading-relaxed">
                    @foreach ($bankDetails as $row)
                        <div class="text-center">
                            <dt class="inline font-bold text-gray-900">{{ $row['label'] }}</dt>
                            @if (! empty($row['value']))
                                <dd class="inline text-gray-700 whitespace-pre-line"> {{ $row['value'] }}</dd>
                            @endif
                        </div>
                    @endforeach
                </dl>

            </div>
        </div>
    </section>

</x-layouts.cms>
