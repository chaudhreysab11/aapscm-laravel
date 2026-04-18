<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- WP Content Shell — wraps a caller-supplied Blade partial ($wpContentView). --}}
    <div class="bg-[#0B2F5E] text-white py-12">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

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

    <main class="wp-content-shell">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            @include($wpContentView)
        </div>
    </main>

</x-layouts.cms>
