<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- ----------------------------------------------------------------
         TF-05: Person Profile
         Renders structured page_data: avatar, name, role, bio, linkedin.
         No block builder on this template.
    ---------------------------------------------------------------- --}}
    @php
        $personName  = $page->page_data['person_name']  ?? $page->title;
        $role        = $page->page_data['role']         ?? '';
        $bio         = $page->page_data['bio']          ?? '';
        $linkedinUrl = $page->page_data['linkedin_url'] ?? '';
        $avatarImage = $page->page_data['avatar_image'] ?? '';

        // Resolve parent page for breadcrumb
        $parent = $page->parent;
    @endphp

    {{-- Header --}}
    <div class="bg-[#0B2F5E] text-white py-12">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

            <nav aria-label="Breadcrumb" class="text-sm text-blue-300 mb-4">
                <ol class="flex items-center gap-2">
                    <li><a href="{{ url('/') }}" class="hover:text-yellow-400 transition-colors">Home</a></li>
                    @if ($parent)
                        <li aria-hidden="true" class="text-blue-500">/</li>
                        <li>
                            <a href="{{ route('cms.page', $parent->slug) }}" class="hover:text-yellow-400 transition-colors">
                                {{ $parent->title }}
                            </a>
                        </li>
                    @endif
                    <li aria-hidden="true" class="text-blue-500">/</li>
                    <li class="text-white" aria-current="page">{{ $personName }}</li>
                </ol>
            </nav>

            <h1 class="text-3xl sm:text-4xl font-bold leading-tight">{{ $personName }}</h1>

            @if ($role)
                <p class="mt-2 text-lg text-yellow-300 font-medium">{{ $role }}</p>
            @endif
        </div>
    </div>

    {{-- Profile body --}}
    <main class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="flex flex-col sm:flex-row gap-8">

            {{-- Avatar --}}
            @if ($avatarImage)
                <div class="sm:w-40 flex-shrink-0">
                    <img src="{{ $avatarImage }}"
                         alt="{{ $personName }}"
                         class="w-36 h-36 sm:w-40 sm:h-40 rounded-full object-cover shadow-lg border-4 border-yellow-400">
                </div>
            @endif

            {{-- Bio --}}
            <article class="flex-1 min-w-0">
                @if ($bio)
                    <div class="
                        prose max-w-none text-gray-700 leading-relaxed
                        [&_p]:mb-4 [&_p]:leading-7
                        [&_strong]:font-semibold
                        [&_a]:text-blue-700 [&_a]:underline [&_a:hover]:text-yellow-600
                    ">
                        {!! $bio !!}
                    </div>
                @else
                    <p class="text-gray-400">Profile content coming soon.</p>
                @endif

                @if ($linkedinUrl)
                    <div class="mt-6">
                        <a href="{{ $linkedinUrl }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex items-center gap-2 bg-[#0077B5] text-white font-semibold text-sm px-4 py-2 rounded-lg hover:bg-[#006097] transition-colors">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24" aria-hidden="true">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.024-3.037-1.852-3.037-1.852 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433a2.062 2.062 0 01-2.063-2.065 2.064 2.064 0 112.063 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                            Connect on LinkedIn
                        </a>
                    </div>
                @endif
            </article>

        </div>
    </main>

</x-layouts.cms>
