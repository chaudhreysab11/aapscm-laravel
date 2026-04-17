@php
    use Illuminate\Support\Str;

    $pageTitle       = $certification->meta_title
        ?? ($certification->title . ($certification->acronym ? ' (' . $certification->acronym . ')' : '') . ' Certification | AAPSCM');
    $pageDescription = $certification->meta_description
        ?? Str::limit(strip_tags((string) $certification->description), 155);
    $pageCanonical   = $certification->canonical_url
        ?? route('certifications.show', $certification->slug);
    $pageOgImage     = ($certification->og_image ?? $certification->badge_image)
        ? asset('storage/' . ($certification->og_image ?? $certification->badge_image))
        : null;
@endphp

<x-layouts.public>

    <x-certification.seo-head
        :title="$pageTitle"
        :description="$pageDescription"
        :canonical="$pageCanonical"
        :og-image="$pageOgImage"
    />

    @push('head')
    <script type="application/ld+json">
    {!! json_encode([
        '@context'           => 'https://schema.org',
        '@type'              => 'EducationalOccupationalCredential',
        'name'               => $certification->title,
        'description'        => Str::limit(strip_tags((string) $certification->description), 200),
        'url'                => $pageCanonical,
        'credentialCategory' => $certification->credential_type ?? 'Certificate',
        'recognizedBy'       => [
            '@type' => 'Organization',
            'name'  => $certification->certifying_body ?? 'AAPSCM',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>
    @endpush

    {{-- Hero --}}
    <x-certification.hero :certification="$certification" />

    {{-- Description --}}
    @if ($certification->description)
        <x-certification.section title="Overview">
            {!! $certification->description !!}
        </x-certification.section>
    @endif

    {{-- Eligibility --}}
    @if ($certification->eligibility_requirements)
        <x-certification.section title="Eligibility Requirements">
            {!! $certification->eligibility_requirements !!}
        </x-certification.section>
    @endif

    {{-- Exam details --}}
    @if ($certification->exam_details)
        <x-certification.section title="Exam Details">
            {!! $certification->exam_details !!}
        </x-certification.section>
    @endif

    {{-- Exam voucher CTA --}}
    <x-certification.exam-voucher-cta :vouchers="$examVouchers" />

</x-layouts.public>
