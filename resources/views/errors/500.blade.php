<x-layouts.cms>

    <div class="min-h-[60vh] flex items-center justify-center py-20 px-4">
        <div class="max-w-lg text-center">
            <p class="text-red-400 font-bold text-6xl mb-4">500</p>
            <h1 class="text-3xl font-extrabold text-[#0B2F5E] mb-4">Server Error</h1>
            <p class="text-gray-500 text-lg mb-8 leading-relaxed">
                Something went wrong on our end. Please try again in a few moments.
                If the problem persists, please contact us.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ url('/') }}"
                   class="bg-[#0B2F5E] text-white font-semibold px-6 py-2.5 rounded-full hover:bg-[#0a2750] transition-colors">
                    &larr; Back to Home
                </a>
                <a href="mailto:info@aapscm.org"
                   class="border border-gray-300 text-gray-700 font-semibold px-6 py-2.5 rounded-full hover:border-[#0B2F5E] hover:text-[#0B2F5E] transition-colors">
                    Contact Support
                </a>
            </div>
        </div>
    </div>

</x-layouts.cms>
