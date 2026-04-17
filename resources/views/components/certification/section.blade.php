@props(['title'])

<section class="py-10 border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-xl font-bold text-[#1e5c38] mb-4">{{ $title }}</h2>
        <div class="prose prose-sm max-w-none text-gray-700">
            {{ $slot }}
        </div>
    </div>
</section>
