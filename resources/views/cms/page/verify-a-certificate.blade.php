@php
    /** @var \App\Models\Page $page */
    $data = $page->page_data ?? [];
    $form = $data['form'] ?? [];
    $labels = $form['labels'] ?? [];
    $separator = $form['separator'] ?? 'OR';
    $submitLabel = $form['submit'] ?? 'Verify';

    $submitted = $submitted ?? false;
    $awarded = $awarded ?? null;
    $submittedValues = $submittedValues ?? [
        'first_name' => '',
        'last_name' => '',
        'certificate_number' => '',
    ];
@endphp

<x-layouts.cms :page="$page">
    <x-cms.seo-head :page="$page" />

    <x-cms.eltdf-title-bar title="Verify a Certificate" :breadcrumbs="[['label' => 'Verify a Certificate']]" />

    <main class="bg-white">
        <div class="max-w-[1200px] mx-auto px-4 py-12 md:py-16">
            <div class="flex flex-wrap gap-8 items-start">
                {{-- Verification form (mirrors live #verify-certificate-form) --}}
                <form id="verify-certificate-form"
                    method="post"
                    action="{{ url('/verify-a-certificate/') }}"
                    class="w-full md:w-[45%] p-6 md:p-10 rounded-md"
                    style="box-shadow: rgba(0,0,0,0.16) 0 1px 4px;">
                    @csrf

                    <label class="block text-sm mb-1"><b>{{ $labels['first_name'] ?? 'First Name:' }}</b></label>
                    <input type="text" name="first_name"
                        value="{{ old('first_name', $submittedValues['first_name'] ?? '') }}"
                        class="w-full mb-3 px-3 py-2 border border-gray-300 rounded" />

                    <p class="w-full text-center my-1">{{ $separator }}</p>

                    <label class="block text-sm mb-1"><b>{{ $labels['last_name'] ?? 'Last Name:' }}</b></label>
                    <input type="text" name="last_name"
                        value="{{ old('last_name', $submittedValues['last_name'] ?? '') }}"
                        class="w-full mb-3 px-3 py-2 border border-gray-300 rounded" />

                    <label class="block text-sm mb-1"><b>{{ $labels['certificate_number'] ?? 'Certificate Number:' }}</b></label>
                    <input type="text" name="certificate_number" required
                        value="{{ old('certificate_number', $submittedValues['certificate_number'] ?? '') }}"
                        class="w-full mb-4 px-3 py-2 border border-gray-300 rounded" />

                    @error('certificate_number')
                        <p class="text-red-600 text-sm mb-3">{{ $message }}</p>
                    @enderror

                    <button type="submit" name="verify_certificate"
                        class="text-white font-medium border-0"
                        style="background-color:#08186A;font-family:'Poppins',sans-serif;border-radius:30px;padding:12px 30px;width:120px;">
                        {{ $submitLabel }}
                    </button>
                </form>

                {{-- Result panel (only after submission) --}}
                @if ($submitted)
                    <div class="certificate-result w-full md:w-[40%] p-5">
                        @if ($awarded)
                            <div class="border border-gray-200 rounded p-5">
                                <h3 class="text-[#14166e] font-semibold text-lg mb-3">Certificate Verified</h3>
                                <dl class="text-sm text-gray-700 space-y-2">
                                    <div class="flex">
                                        <dt class="w-44 font-medium">Certificate Number:</dt>
                                        <dd>{{ $awarded->certificate_number }}</dd>
                                    </div>
                                    @if ($awarded->user)
                                        <div class="flex">
                                            <dt class="w-44 font-medium">Holder:</dt>
                                            <dd>{{ trim(($awarded->user->first_name ?? '') . ' ' . ($awarded->user->last_name ?? '')) }}</dd>
                                        </div>
                                    @endif
                                    @if ($awarded->catalogEntry)
                                        <div class="flex">
                                            <dt class="w-44 font-medium">Certification:</dt>
                                            <dd>{{ $awarded->catalogEntry->name ?? $awarded->catalogEntry->title ?? '' }}</dd>
                                        </div>
                                    @endif
                                    @if ($awarded->issued_at)
                                        <div class="flex">
                                            <dt class="w-44 font-medium">Issued:</dt>
                                            <dd>{{ $awarded->issued_at->format('M j, Y') }}</dd>
                                        </div>
                                    @endif
                                    @if ($awarded->expires_at)
                                        <div class="flex">
                                            <dt class="w-44 font-medium">Expires:</dt>
                                            <dd>{{ $awarded->expires_at->format('M j, Y') }}</dd>
                                        </div>
                                    @endif
                                    <div class="flex">
                                        <dt class="w-44 font-medium">Status:</dt>
                                        <dd>
                                            @if ($awarded->isActive())
                                                <span class="text-green-700 font-medium">Active</span>
                                            @else
                                                <span class="text-red-700 font-medium">Inactive</span>
                                            @endif
                                        </dd>
                                    </div>
                                </dl>
                            </div>
                        @else
                            <div class="border border-red-200 bg-red-50 rounded p-5">
                                <p class="text-red-700 font-medium">No certificate found matching the supplied details.</p>
                                <p class="text-sm text-gray-700 mt-2">Please double-check the certificate number and try again.</p>
                            </div>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </main>
</x-layouts.cms>
