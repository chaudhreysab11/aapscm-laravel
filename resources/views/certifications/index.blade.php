<x-layouts.public>
    <x-certification.seo-head
        title="Professional Certifications &amp; Credentials | AAPSCM"
        description="Browse AAPSCM's full catalog of professional supply chain certifications and credentials. Advance your career with globally recognised qualifications."
        :canonical="route('certifications.index')"
    />

    {{-- Hero banner --}}
    <div class="bg-[#0B2F5E] text-white py-14">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h1 class="text-4xl lg:text-5xl font-bold mb-4">Professional Certifications</h1>
            <p class="text-white/70 text-lg max-w-2xl mx-auto">
                World-class supply chain credentials that employers recognise and value.
            </p>
        </div>
    </div>

    {{-- Filter bar --}}
    @if ($credentialTypes->isNotEmpty())
        <div class="bg-white border-b border-gray-200 sticky top-0 z-20">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 overflow-x-auto">
                <div class="flex items-center gap-1 py-3 whitespace-nowrap">
                    <a href="{{ route('certifications.index') }}"
                       class="px-4 py-1.5 rounded-full text-sm font-medium transition-colors duration-150
                           {{ is_null($activeType)
                               ? 'bg-[#0B2F5E] text-white'
                               : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                        All
                    </a>
                    @foreach ($credentialTypes as $type)
                        <a href="{{ route('certifications.index', ['type' => $type]) }}"
                           class="px-4 py-1.5 rounded-full text-sm font-medium capitalize transition-colors duration-150
                               {{ $activeType === $type
                                   ? 'bg-[#0B2F5E] text-white'
                                   : 'text-gray-600 hover:text-gray-900 hover:bg-gray-100' }}">
                            {{ str_replace('_', ' ', $type) }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    {{-- Grid --}}
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

        @if ($certifications->isEmpty())
            <div class="text-center py-24">
                <p class="text-gray-500 text-lg">No certifications found for the selected filter.</p>
                <a href="{{ route('certifications.index') }}"
                   class="mt-4 inline-block text-sm text-[#0B2F5E] underline underline-offset-4">
                    View all certifications
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($certifications as $certification)
                    <x-certification.card :certification="$certification" />
                @endforeach
            </div>

            {{-- Pagination --}}
            @if ($certifications->hasPages())
                <div class="mt-12 flex justify-center">
                    {{ $certifications->links() }}
                </div>
            @endif
        @endif

    </div>
</x-layouts.public>
