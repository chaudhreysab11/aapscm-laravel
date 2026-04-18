<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $heroHeading = $page->page_data['hero_heading'] ?? $page->title;
        $intro       = $page->page_data['intro']        ?? '';
        $toc         = $page->page_data['toc']          ?? [];
        $bodyHtml    = $page->page_data['body_html']    ?? '';
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero heading band --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[900px] mx-auto px-4 text-center">
            <h2 class="text-[30px] md:text-[36px] font-semibold text-[#14166e] leading-tight">
                {{ $heroHeading }}
            </h2>
        </div>
    </section>

    {{-- Body --}}
    <section class="bg-white py-14">
        <div class="max-w-[960px] mx-auto px-4">

            @if ($intro)
                <p class="text-[16px] text-gray-700 leading-relaxed mb-6">{{ $intro }}</p>
            @endif

            @if (! empty($toc))
                <div class="bg-[#f6f8fb] border border-gray-200 rounded-lg p-6 mb-10">
                    <h3 class="text-[15px] font-bold text-[#14166e] uppercase tracking-wider mb-3">In This Policy</h3>
                    <ul class="grid grid-cols-1 md:grid-cols-2 gap-2 text-[14px]">
                        @foreach ($toc as $item)
                            <li>
                                <a href="#{{ $item['anchor'] }}" class="text-[#14166e] hover:underline">
                                    {{ $item['label'] }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if ($bodyHtml)
                <article class="
                    text-[15px] leading-relaxed text-gray-800
                    [&>p]:mb-4
                    [&>p>strong:only-child]:block [&>p>strong:only-child]:mt-8 [&>p>strong:only-child]:mb-3 [&>p>strong:only-child]:text-[20px] [&>p>strong:only-child]:font-semibold [&>p>strong:only-child]:text-[#14166e]
                    [&_strong]:font-semibold
                    [&_ul]:list-disc [&_ul]:ml-6 [&_ul]:mb-6 [&_ul]:space-y-2
                    [&_ol]:list-decimal [&_ol]:ml-6 [&_ol]:mb-6 [&_ol]:space-y-2
                    [&_li]:leading-relaxed
                    [&_li>strong]:mr-1
                    [&_a]:text-[#14166e] [&_a]:underline hover:[&_a]:text-[#0f1159]
                    [&_table]:w-full [&_table]:my-6 [&_table]:border-collapse [&_table]:text-[14px]
                    [&_thead>tr]:bg-[#14166e] [&_thead>tr>td]:text-white [&_thead>tr>td]:font-semibold
                    [&_td]:border [&_td]:border-gray-300 [&_td]:px-3 [&_td]:py-2 [&_td]:align-top
                    [&_tbody>tr:nth-child(even)]:bg-gray-50
                ">
                    {!! $bodyHtml !!}
                </article>
            @endif

        </div>
    </section>

</x-layouts.cms>
