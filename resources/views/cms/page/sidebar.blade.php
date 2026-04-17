<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         Page hero
    ---------------------------------------------------------------- --}}
    <div class="bg-[#0B2F5E] text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav aria-label="Breadcrumb" class="text-sm text-blue-300 mb-4">
                <ol class="flex items-center gap-2">
                    <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition-colors">Home</a></li>
                    <li aria-hidden="true" class="text-blue-500">/</li>
                    <li class="text-white" aria-current="page">{{ $page->title }}</li>
                </ol>
            </nav>

            <h1 class="text-3xl sm:text-4xl font-bold leading-tight">{{ $page->title }}</h1>

            @if ($page->excerpt)
                <p class="mt-4 text-lg text-blue-100 leading-relaxed max-w-2xl">
                    {{ $page->excerpt }}
                </p>
            @endif
        </div>
    </div>

    {{-- ----------------------------------------------------------------
         Two-column: content + sidebar
    ---------------------------------------------------------------- --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col lg:flex-row gap-10">

            {{-- Main content (2/3) --}}
            <article class="lg:w-2/3">
                {{-- Content is admin-entered HTML from Filament RichEditor, sanitized at input --}}
                <div class="
                    text-gray-700 leading-relaxed
                    [&_h2]:text-2xl [&_h2]:font-bold [&_h2]:text-[#0B2F5E] [&_h2]:mt-8 [&_h2]:mb-4
                    [&_h3]:text-xl  [&_h3]:font-semibold [&_h3]:text-[#0B2F5E] [&_h3]:mt-6 [&_h3]:mb-3
                    [&_p]:mb-4 [&_p]:leading-7
                    [&_ul]:list-disc [&_ul]:pl-6 [&_ul]:mb-4 [&_ul_li]:mb-1
                    [&_ol]:list-decimal [&_ol]:pl-6 [&_ol]:mb-4 [&_ol_li]:mb-1
                    [&_a]:text-blue-700 [&_a]:underline [&_a:hover]:text-yellow-600
                    [&_blockquote]:border-l-4 [&_blockquote]:border-yellow-400 [&_blockquote]:pl-4 [&_blockquote]:italic [&_blockquote]:text-gray-600 [&_blockquote]:my-6
                    [&_table]:w-full [&_table]:border-collapse [&_table]:mb-6
                    [&_th]:bg-[#0B2F5E] [&_th]:text-white [&_th]:px-4 [&_th]:py-2 [&_th]:text-left
                    [&_td]:border [&_td]:border-gray-200 [&_td]:px-4 [&_td]:py-2
                    [&_tr:nth-child(even)_td]:bg-gray-50
                    [&_img]:rounded-lg [&_img]:max-w-full [&_img]:my-4
                    [&_hr]:border-gray-200 [&_hr]:my-8
                ">
                    {!! $page->content !!}
                </div>
            </article>

            {{-- Sidebar (1/3) --}}
            <aside class="lg:w-1/3 space-y-6">

                {{-- "In This Section" widget --}}
                @if ($page->children->isNotEmpty())
                    <div class="bg-gray-50 border border-gray-200 rounded-xl p-5">
                        <h2 class="text-[#0B2F5E] font-bold text-base mb-3 uppercase tracking-wide">
                            In This Section
                        </h2>
                        <ul class="space-y-1 text-sm">
                            @foreach ($page->children as $child)
                                @if ($child->is_published)
                                    <li>
                                        <a href="{{ url($child->slug) }}"
                                           class="flex items-center gap-2 text-blue-700 hover:text-yellow-600 transition-colors py-1">
                                            <span class="text-yellow-400">&rsaquo;</span>
                                            {{ $child->title }}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- CTA card --}}
                <div class="bg-[#0B2F5E] text-white rounded-xl p-6">
                    <h2 class="font-bold text-lg mb-2">Need Help?</h2>
                    <p class="text-blue-100 text-sm leading-relaxed mb-4">
                        Have a question about our programs, certifications, or membership? Our team is here for you.
                    </p>
                    <a href="mailto:info@aapscm.org"
                       class="inline-block bg-yellow-400 text-[#0B2F5E] font-semibold text-sm px-4 py-2 rounded-lg hover:bg-yellow-300 transition-colors">
                        info@aapscm.org
                    </a>
                </div>

            </aside>

        </div>
    </div>

</x-layouts.cms>
