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

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    <div class="eltdf-container eltdf-default-page-template" style="padding: 56px 0 64px; background: #fff;">
        <div class="eltdf-container-inner clearfix" style="max-width: 808px; margin: 0 auto; padding: 0 20px;">
            <div class="eltdf-grid-row eltdf-grid-medium-gutter">
                <div class="eltdf-page-content-holder eltdf-grid-col-12">
                    <form id="verify-certificate-form"
                        method="post"
                        action="/verify-a-certificate/"
                        style="width: 100%; max-width: 425.6px; padding: 40px; border-radius: 5px; box-shadow: rgba(0, 0, 0, 0.16) 0 1px 4px; background: transparent;">
                        @csrf

                        <label style="display: block; font-size: 15px; line-height: 24px; margin-bottom: 4px;"><b>{{ $labels['first_name'] ?? 'First Name:' }}</b></label>
                        <input type="text" name="first_name"
                            value="{{ old('first_name', $submittedValues['first_name'] ?? '') }}"
                            style="display: block; width: 100%; margin-bottom: 12px; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 0;" />

                        <p style="width: 100%; text-align: center; margin: 4px 0;">{{ $separator }}</p>

                        <label style="display: block; font-size: 15px; line-height: 24px; margin-bottom: 4px;"><b>{{ $labels['last_name'] ?? 'Last Name:' }}</b></label>
                        <input type="text" name="last_name"
                            value="{{ old('last_name', $submittedValues['last_name'] ?? '') }}"
                            style="display: block; width: 100%; margin-bottom: 12px; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 0;" />

                        <label style="display: block; font-size: 15px; line-height: 24px; margin-bottom: 4px;"><b>{{ $labels['certificate_number'] ?? 'Certificate Number:' }}</b></label>
                        <input type="text" name="certificate_number" required
                            value="{{ old('certificate_number', $submittedValues['certificate_number'] ?? '') }}"
                            style="display: block; width: 100%; margin-bottom: 16px; padding: 8px 12px; border: 1px solid #d1d5db; border-radius: 0;" />

                        @error('certificate_number')
                            <p style="color: #dc2626; font-size: 14px; margin: 0 0 12px;">{{ $message }}</p>
                        @enderror

                        <button type="submit" name="verify_certificate"
                            style="background-color: #08186A; color: #fff; font-family: 'Poppins', sans-serif; font-size: 15px; font-weight: 500; border: 0; border-radius: 30px; padding: 12px 30px; width: 120px; cursor: pointer;">
                            {{ $submitLabel }}
                        </button>
                    </form>

                    @if ($submitted)
                        <div class="certificate-result" style="width: 100%; max-width: 768px; margin-top: 32px;">
                            @if ($awarded)
                                <div style="border: 1px solid #e5e7eb; border-radius: 6px; padding: 20px;">
                                    <h3 style="color: #14166e; font-size: 18px; font-weight: 600; margin: 0 0 12px;">Certificate Verified</h3>
                                    <dl style="font-size: 14px; color: #374151; margin: 0;">
                                        <div style="display: flex; margin-bottom: 8px;">
                                            <dt style="width: 176px; font-weight: 500;">Certificate Number:</dt>
                                            <dd>{{ $awarded->certificate_number }}</dd>
                                        </div>
                                        @if ($awarded->user)
                                            <div style="display: flex; margin-bottom: 8px;">
                                                <dt style="width: 176px; font-weight: 500;">Holder:</dt>
                                                <dd>{{ $awarded->user->name }}</dd>
                                            </div>
                                        @endif
                                        @if ($awarded->catalogEntry)
                                            <div style="display: flex; margin-bottom: 8px;">
                                                <dt style="width: 176px; font-weight: 500;">Certification:</dt>
                                                <dd>{{ $awarded->catalogEntry->name ?? $awarded->catalogEntry->title ?? '' }}</dd>
                                            </div>
                                        @endif
                                        @if ($awarded->issued_at)
                                            <div style="display: flex; margin-bottom: 8px;">
                                                <dt style="width: 176px; font-weight: 500;">Issued:</dt>
                                                <dd>{{ $awarded->issued_at->format('M j, Y') }}</dd>
                                            </div>
                                        @endif
                                        @if ($awarded->expires_at)
                                            <div style="display: flex; margin-bottom: 8px;">
                                                <dt style="width: 176px; font-weight: 500;">Expires:</dt>
                                                <dd>{{ $awarded->expires_at->format('M j, Y') }}</dd>
                                            </div>
                                        @endif
                                        <div style="display: flex;">
                                            <dt style="width: 176px; font-weight: 500;">Status:</dt>
                                            <dd>
                                                @if ($awarded->isActive())
                                                    <span style="color: #15803d; font-weight: 500;">Active</span>
                                                @else
                                                    <span style="color: #b91c1c; font-weight: 500;">Inactive</span>
                                                @endif
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            @else
                                <div style="border: 1px solid #fecaca; background: #fef2f2; border-radius: 6px; padding: 20px;">
                                    <p style="color: #b91c1c; font-weight: 500; margin: 0;">No certificate found matching the supplied details.</p>
                                    <p style="font-size: 14px; color: #374151; margin: 8px 0 0;">Please double-check the certificate number and try again.</p>
                                </div>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-layouts.cms>
