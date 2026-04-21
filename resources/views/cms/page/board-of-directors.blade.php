<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $pageHeading    = $page->page_data['page_heading']    ?? $page->title;
        $sectionHeading = $page->page_data['section_heading'] ?? '';
        // Architect directive (2026-04-20): board members come from the
        // board_members table (single source of truth) via CmsPageController.
        // Fallback to legacy page_data shape only if controller didn't inject.
        $members = collect($boardMembers ?? $page->page_data['members'] ?? [])
            ->map(function ($m) {
                if (is_array($m)) {
                    return $m;
                }

                return [
                    'name'        => $m->name,
                    'role'        => $m->role,
                    'affiliation' => $m->affiliation,
                    'image'       => $m->avatar_image,
                    'href'        => $m->profile_page_slug ? '/'.trim($m->profile_page_slug, '/').'/' : '#',
                ];
            });
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Page heading band --}}
    <section class="bg-white py-10">
        <div class="max-w-[1200px] mx-auto px-4 text-center">
            <h3 class="text-[26px] md:text-[32px] font-semibold text-[#14166e]">{{ $pageHeading }}</h3>
        </div>
    </section>

    {{-- Section heading band --}}
    @if ($sectionHeading)
        <section class="bg-[#f6f8fb] py-8">
            <div class="max-w-[1200px] mx-auto px-4 text-center">
                <h3 class="text-[22px] md:text-[26px] font-semibold text-[#14166e]">{{ $sectionHeading }}</h3>
            </div>
        </section>
    @endif

    {{-- Members grid --}}
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
            @foreach ($members as $m)
                <div class="text-center">
                    @if (! empty($m['image']))
                        <a href="{{ $m['href'] ?? '#' }}" class="inline-block">
                            <img src="{{ $m['image'] }}" alt="{{ $m['name'] }}"
                                 class="w-[206px] h-[206px] object-cover mx-auto rounded-full shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px] transition-transform hover:scale-105">
                        </a>
                    @endif
                    <h2 class="mt-5 text-[22px] md:text-[24px] font-semibold text-[#14166e]">
                        <a href="{{ $m['href'] ?? '#' }}" class="hover:underline">{{ $m['name'] }}</a>
                    </h2>
                    @if (! empty($m['role']))
                        <h5 class="mt-2 text-[15px] md:text-[16px] font-semibold text-gray-800 leading-snug">{{ $m['role'] }}</h5>
                    @endif
                    @if (! empty($m['affiliation']))
                        <h5 class="mt-2 text-[14px] md:text-[15px] text-gray-600 whitespace-pre-line leading-relaxed">{{ $m['affiliation'] }}</h5>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

</x-layouts.cms>
