<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $personName  = $page->page_data['person_name']  ?? $page->title;
        $role        = $page->page_data['role']         ?? '';
        $bio         = $page->page_data['bio']          ?? '';
        $linkedinUrl = $page->page_data['linkedin_url'] ?? '';
        $avatarImage = $page->page_data['avatar_image'] ?? '';

        $parent = $page->parent;
        $breadcrumbs = [];
        if ($parent) {
            $breadcrumbs[] = ['label' => $parent->title, 'url' => route('cms.page', $parent->slug)];
        }
        $breadcrumbs[] = ['label' => $personName];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$personName"
        :breadcrumbs="$breadcrumbs"
    />

    <div class="max-w-[1100px] mx-auto px-4 py-12">
        <div class="flex flex-col md:flex-row gap-10">

            <aside class="md:w-1/3 flex-shrink-0">
                @if ($avatarImage)
                    <div class="bg-white p-3 rounded border border-gray-200 shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px]">
                        <img src="{{ $avatarImage }}"
                             alt="{{ $personName }}"
                             class="w-full h-auto rounded object-cover">
                    </div>
                @endif

                <div class="mt-6">
                    <h2 class="text-[22px] font-semibold text-[#14166e] leading-tight">{{ $personName }}</h2>
                    @if ($role)
                        <p class="mt-2 text-[15px] text-gray-600 leading-snug">{{ $role }}</p>
                    @endif
                </div>

                @if ($linkedinUrl)
                    <a href="{{ $linkedinUrl }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="mt-5 inline-flex items-center gap-2 bg-[#0077B5] text-white font-semibold text-sm px-4 py-2 rounded hover:bg-[#006097] transition-colors">
                        <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.024-3.037-1.852-3.037-1.852 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                        </svg>
                        Connect on LinkedIn
                    </a>
                @endif
            </aside>

            <article class="md:w-2/3 min-w-0">
                @if ($bio)
                    <div class="text-[15px] leading-relaxed text-gray-800
                        [&_p]:mb-4
                        [&_strong]:font-semibold [&_strong]:text-gray-900
                        [&_a]:text-[#14166e] [&_a]:underline hover:[&_a]:text-[#0f1159]
                        [&_ul]:list-disc [&_ul]:ml-6 [&_ul]:mb-4 [&_ul]:space-y-1
                        [&_ol]:list-decimal [&_ol]:ml-6 [&_ol]:mb-4 [&_ol]:space-y-1">
                        {!! $bio !!}
                    </div>
                @else
                    <p class="text-gray-400">Profile content coming soon.</p>
                @endif
            </article>

        </div>
    </div>

</x-layouts.cms>
