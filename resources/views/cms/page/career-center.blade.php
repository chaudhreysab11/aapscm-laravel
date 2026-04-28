<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero       = $page->page_data['hero']        ?? [];
        $jobSeekers = $hero['job_seekers']            ?? [];
        $nonMembers = $page->page_data['non_members'] ?? [];
        $employers  = $page->page_data['employers']   ?? [];

        $btnSolid   = 'inline-block bg-[#195B13] text-white border-2 border-[#195B13] font-medium text-sm px-6 py-3 rounded hover:bg-[#0f1159]/0 hover:bg-[#0201010D] hover:text-black transition-colors';
        $btnOutline = 'inline-block bg-transparent text-black border-2 border-[#195B13] font-medium text-sm px-6 py-3 rounded hover:bg-[#195B13] hover:text-white transition-colors';
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero / Job Seekers --}}
    <section class="relative bg-cover bg-center bg-no-repeat py-14"
             @if (! empty($hero['background'])) style="background-image:url('{{ $hero['background'] }}');" @endif>
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid md:grid-cols-2 gap-10 items-center">
                <div>
                    @if (! empty($hero['title']))
                        <h2 class="text-[32px] md:text-[40px] font-semibold text-[#14166e] leading-tight mb-4">
                            {{ $hero['title'] }}
                        </h2>
                    @endif

                    @if (! empty($jobSeekers['heading']))
                        <h2 class="text-[24px] md:text-[28px] font-semibold text-[#14166e] mb-4">
                            {{ $jobSeekers['heading'] }}
                        </h2>
                    @endif

                    @if (! empty($jobSeekers['description']))
                        <h2 class="text-[15px] md:text-[16px] font-normal text-gray-700 leading-relaxed mb-6">
                            {{ $jobSeekers['description'] }}
                        </h2>
                    @endif

                    @if (! empty($jobSeekers['membership_heading']))
                        <h2 class="text-[20px] md:text-[22px] font-semibold text-[#14166e] mb-2">
                            {{ $jobSeekers['membership_heading'] }}
                        </h2>
                    @endif

                    @if (! empty($jobSeekers['membership_text']))
                        <h2 class="text-[15px] md:text-[16px] font-normal text-gray-700 leading-relaxed mb-6">
                            {{ $jobSeekers['membership_text'] }}
                        </h2>
                    @endif

                    @if (! empty($jobSeekers['buttons']))
                        <div class="flex flex-wrap gap-4">
                            @foreach ($jobSeekers['buttons'] as $btn)
                                <a href="{{ $btn['href'] }}"
                                   class="{{ ($btn['style'] ?? 'solid') === 'outline' ? $btnOutline : $btnSolid }}">
                                    {{ $btn['text'] }}
                                </a>
                            @endforeach
                        </div>
                    @endif
                </div>

                @if (! empty($hero['image']))
                    <div class="hidden md:flex justify-center">
                        <img src="{{ $hero['image'] }}"
                             alt="{{ $hero['image_alt'] ?? '' }}"
                             class="max-w-full h-auto">
                    </div>
                @endif
            </div>
        </div>
    </section>

    {{-- Available to Non-members band (centered, light grey) --}}
    @if (! empty($nonMembers))
        <section class="bg-[#F5F5F5] py-12">
            <div class="max-w-[1000px] mx-auto px-4 text-center">
                @if (! empty($nonMembers['heading']))
                    <h2 class="text-[22px] md:text-[28px] font-semibold text-black mb-6">
                        {{ $nonMembers['heading'] }}
                    </h2>
                @endif

                @if (! empty($nonMembers['buttons']))
                    <div class="flex flex-wrap gap-4 justify-center">
                        @foreach ($nonMembers['buttons'] as $btn)
                            <a href="{{ $btn['href'] }}"
                               class="{{ ($btn['style'] ?? 'solid') === 'outline' ? $btnOutline : $btnSolid }}">
                                {{ $btn['text'] }}
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif

    {{-- Employers services --}}
    @if (! empty($employers))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    @if (! empty($employers['image']))
                        <div>
                            <img src="{{ $employers['image'] }}"
                                 alt="{{ $employers['image_alt'] ?? '' }}"
                                 class="w-full h-auto">
                        </div>
                    @endif

                    <div>
                        @if (! empty($employers['heading']))
                            <h2 class="text-[26px] md:text-[32px] font-semibold text-[#14166e] mb-5">
                                {{ $employers['heading'] }}
                            </h2>
                        @endif

                        @if (! empty($employers['description_html']))
                            <h2 class="text-[15px] md:text-[16px] font-normal text-gray-700 leading-relaxed mb-6">
                                {!! $employers['description_html'] !!}
                            </h2>
                        @endif

                        @if (! empty($employers['membership_heading']))
                            <h2 class="text-[20px] md:text-[22px] font-semibold text-[#14166e] mb-2">
                                {{ $employers['membership_heading'] }}
                            </h2>
                        @endif

                        @if (! empty($employers['membership_text']))
                            <h2 class="text-[15px] md:text-[16px] font-normal text-gray-700 leading-relaxed mb-6">
                                {{ $employers['membership_text'] }}
                            </h2>
                        @endif

                        @if (! empty($employers['buttons']))
                            <div class="flex flex-wrap gap-4">
                                @foreach ($employers['buttons'] as $btn)
                                    <a href="{{ $btn['href'] }}"
                                       class="{{ ($btn['style'] ?? 'solid') === 'outline' ? $btnOutline : $btnSolid }}">
                                        {{ $btn['text'] }}
                                    </a>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
