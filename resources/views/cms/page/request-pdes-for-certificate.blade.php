<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @push('head')
        <style>
            .request-pdes-page {
                background: #fff;
            }

            .request-pdes-page .page-shell {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1rem;
            }

            .request-pdes-page .intro-section {
                padding: 3rem 0 4.5rem;
            }

            .request-pdes-page .intro-grid,
            .request-pdes-page .form-grid {
                display: grid;
                grid-template-columns: minmax(0, 1fr);
                gap: 2rem;
            }

            .request-pdes-page .intro-grid {
                align-items: start;
            }

            .request-pdes-page .intro-copy {
                max-width: 25.5rem;
            }

            .request-pdes-page .intro-heading {
                color: #272727;
                font-size: 2.125rem;
                line-height: 1.32;
                font-weight: 600;
                letter-spacing: -0.02em;
                margin: 0 0 1.5rem;
            }

            .request-pdes-page .form-heading {
                color: #272727;
                font-size: 1.5rem;
                line-height: 1.35;
                font-weight: 500;
                margin: 0 0 0.75rem;
            }

            .request-pdes-page .intro-body,
            .request-pdes-page .form-description {
                color: #444;
                font-size: 0.9375rem;
                line-height: 1.9;
                margin: 0 0 1.25rem;
            }

            .request-pdes-page .intro-requirement {
                color: #111;
                font-size: 1rem;
                line-height: 1.6;
                margin: 0;
            }

            .request-pdes-page .intro-media {
                display: flex;
                align-items: flex-start;
                justify-content: flex-end;
            }

            .request-pdes-page .intro-image {
                display: block;
                width: 100%;
                max-width: 39.4375rem;
                height: auto;
            }

            .request-pdes-page .form-section {
                padding: 0 0 4.5rem;
            }

            .request-pdes-page .form-band {
                position: relative;
                overflow: hidden;
                background-image: url('https://aapscm.org/wp-content/uploads/2025/03/1-12-scaled.jpg');
                background-position: 0 0;
                background-repeat: repeat;
                background-size: auto;
                padding: 1.875rem 0;
            }

            .request-pdes-page .form-band-overlay {
                position: absolute;
                inset: 0;
                opacity: 0.5;
            }

            .request-pdes-page .form-band-shell {
                position: relative;
                z-index: 1;
                max-width: 68.75rem;
                margin: 0 auto;
                padding: 0 0.625rem;
            }

            .request-pdes-page .form-inner {
                background-image: url('https://aapscm.org/wp-content/uploads/2025/03/1-13-scaled.jpg');
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .request-pdes-page .form-column {
                min-width: 0;
            }

            .request-pdes-page .form-panel {
                max-width: 100%;
                background: #fff;
                padding: 1.875rem;
                box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.02);
            }

            .request-pdes-page .PDES-form {
                color: #111;
            }

            .request-pdes-page .mn-hd-3 {
                margin: 0 0 0.75rem;
                padding: 0.625rem 0;
                color: #000 !important;
                font-size: 1.375rem;
                font-weight: 500;
                line-height: 1.4;
            }

            .request-pdes-page .p-info1 {
                display: flex;
                width: 100%;
                gap: 0.3125rem;
            }

            .request-pdes-page .txt-2,
            .request-pdes-page .txt-3 {
                width: 100%;
                margin: 0 0 0.9375rem;
                font-size: 0.875rem;
            }

            .request-pdes-page .lb-hd1 {
                display: block;
                color: #111;
                font-size: 0.9375rem;
                font-weight: 400;
                line-height: 1.5;
                margin-bottom: 0.3125rem;
            }

            .request-pdes-page .field-wrap {
                display: block;
                width: 100%;
            }

            .request-pdes-page .field-control,
            .request-pdes-page .field-file,
            .request-pdes-page .field-wrap input,
            .request-pdes-page .field-wrap select {
                width: 100%;
                border: 1px solid #d6d6d6;
                border-radius: 0;
                background: #fff;
                color: #111;
                font-size: 0.875rem;
                line-height: 1.5;
                padding: 0.7rem 0.85rem;
                box-shadow: none;
            }

            .request-pdes-page .field-control:focus,
            .request-pdes-page .field-file:focus,
            .request-pdes-page .field-wrap input:focus,
            .request-pdes-page .field-wrap select:focus {
                outline: none;
                border-color: #14166e;
            }

            .request-pdes-page .field-file {
                padding: 0;
            }

            .request-pdes-page .declaration-list {
                display: grid;
                gap: 0.625rem;
                margin-bottom: 1.25rem;
            }

            .request-pdes-page .declaration-item {
                display: flex;
                align-items: flex-start;
                gap: 0.5rem;
                color: #111;
                font-size: 0.875rem;
                line-height: 1.6;
            }

            .request-pdes-page .declaration-item input {
                margin-top: 0.25rem;
                width: 0.95rem;
                height: 0.95rem;
                accent-color: #14166e;
            }

            .request-pdes-page .submit-wrap {
                padding-top: 0.25rem;
                margin-top: 1.25rem;
            }

            .request-pdes-page .submit-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border: 0;
                border-radius: 0;
                background: #005b1c;
                color: #fff;
                font-size: 0.9375rem;
                font-weight: 600;
                line-height: 1;
                padding: 0.5rem 2.6875rem;
                transition: background-color 0.2s ease;
            }

            .request-pdes-page .submit-button:hover,
            .request-pdes-page .submit-button:focus-visible {
                background: #004717;
            }

            .request-pdes-page .assistance-note {
                border-top: 1px solid #e5e7eb;
                color: #444;
                font-size: 0.8125rem;
                line-height: 1.8;
                margin-top: 1.5rem;
                padding-top: 1rem;
            }

            .request-pdes-page .assistance-note a {
                color: #14166e;
                text-decoration: underline;
            }

            @media (min-width: 768px) {
                .request-pdes-page .intro-grid {
                    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                    gap: 1.75rem;
                }

                .request-pdes-page .form-grid {
                    grid-template-columns: minmax(0, 45%) minmax(0, 55%);
                    gap: 0;
                }

                .request-pdes-page .form-row {
                    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                }

                .request-pdes-page .field-span-2 {
                    grid-column: 1 / -1;
                }
            }

            @media (max-width: 767px) {
                .request-pdes-page .intro-section {
                    padding: 2.5rem 0 3rem;
                }

                .request-pdes-page .form-section {
                    padding-bottom: 3rem;
                }

                .request-pdes-page .form-band {
                    padding: 1.5rem 0;
                }

                .request-pdes-page .form-band-shell {
                    padding: 0;
                }

                .request-pdes-page .form-panel {
                    padding: 0 0.625rem;
                    background: #fff;
                    box-shadow: none;
                }

                .request-pdes-page .intro-heading {
                    font-size: 2rem;
                    line-height: 1.3;
                }

                .request-pdes-page .form-heading {
                    font-size: 1.5rem;
                }

                .request-pdes-page .p-info1 {
                    display: block;
                }

                .request-pdes-page .txt-2 {
                    padding-left: 0.625rem;
                    padding-right: 0.625rem;
                    text-align: left;
                }

                .request-pdes-page .mn-hd-3 {
                    padding-left: 0.625rem;
                    text-align: left;
                }
            }
        </style>
    @endpush

    @php
        $intro = $page->page_data['intro'] ?? [];
        $form  = $page->page_data['form']  ?? [];
    @endphp

    <div class="request-pdes-page">
        @if (! empty($intro))
            <section class="intro-section">
                <div class="page-shell">
                    <div class="intro-grid">
                        <div class="intro-copy">
                            @if (! empty($intro['heading']))
                                <h2 class="intro-heading">{{ $intro['heading'] }}</h2>
                            @endif

                            @if (! empty($intro['body']))
                                <p class="intro-body">{{ $intro['body'] }}</p>
                            @endif

                            @if (! empty($intro['requirement_html']))
                                <p class="intro-requirement">{!! $intro['requirement_html'] !!}</p>
                            @endif
                        </div>

                        @if (! empty($intro['image']))
                            <div class="intro-media">
                                <img src="{{ $intro['image'] }}" alt="{{ $intro['heading'] ?? $page->title }}" class="intro-image" />
                            </div>
                        @endif
                    </div>
                </div>
            </section>
        @endif

        @if (! empty($form))
            <section class="form-section">
                <div class="form-band">
                    <div class="form-band-overlay"></div>
                    <div class="form-band-shell">
                        <div class="form-inner">
                            <div class="form-grid">
                                <div aria-hidden="true"></div>

                                <div class="form-column">
                                    <div class="form-panel">
                                        @if (! empty($form['heading']))
                                            <h2 class="form-heading">{{ $form['heading'] }}</h2>
                                        @endif

                                        @if (! empty($form['description']))
                                            <p class="form-description">{{ $form['description'] }}</p>
                                        @endif

                                        @if (session('success'))
                                            <div style="margin-bottom: 1.5rem; border: 1px solid #bbf7d0; background: #f0fdf4; color: #166534; padding: 1rem 1.25rem; border-radius: 0.75rem;">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if ($errors->any())
                                            <div style="margin-bottom: 1.5rem; border: 1px solid #fecaca; background: #fef2f2; color: #b91c1c; padding: 1rem 1.25rem; border-radius: 0.75rem;">
                                                <strong>Please correct the highlighted issues and try again.</strong>
                                                <ul style="margin: 0.75rem 0 0; padding-left: 1.25rem;">
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif

                                        <form method="post" action="{{ route('request-pdes.submit') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="PDES-form">
                                                <p class="mn-hd-3">Personal Information</p>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Full Name*</label>
                                                        <span class="field-wrap"><input type="text" name="full_name" value="{{ old('full_name') }}" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Email Address*</label>
                                                        <span class="field-wrap"><input type="email" name="email" value="{{ old('email') }}" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                </div>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Phone Number*</label>
                                                        <span class="field-wrap"><input type="tel" name="phone" value="{{ old('phone') }}" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">AAPSCM Certification*</label>
                                                        <span class="field-wrap">
                                                            <select name="certification" required class="field-control">
                                                                <option value="">Select Course</option>
                                                                @foreach (($form['certifications'] ?? []) as $cert)
                                                                    <option value="{{ $cert }}" @selected(old('certification') === $cert)>{{ $cert }}</option>
                                                                @endforeach
                                                            </select>
                                                        </span>
                                                    </p>
                                                </div>

                                                <p class="txt-2 txt-3">
                                                    <label class="lb-hd1">AAPSCM Certification Number (if applicable*)</label>
                                                    <span class="field-wrap"><input type="text" name="certification_number" value="{{ old('certification_number') }}" maxlength="400" class="field-control" /></span>
                                                </p>

                                                <p class="mn-hd-3">PDES Activity Details</p>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Activity Type*</label>
                                                        <span class="field-wrap">
                                                            <select name="activity_type" required class="field-control">
                                                                <option value="">Select Activity</option>
                                                                @foreach (($form['activity_types'] ?? []) as $activity)
                                                                    <option value="{{ $activity }}" @selected(old('activity_type') === $activity)>{{ $activity }}</option>
                                                                @endforeach
                                                            </select>
                                                        </span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Course/Event Name*</label>
                                                        <span class="field-wrap"><input type="text" name="course_name" value="{{ old('course_name') }}" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                </div>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Training Provider/Organization*</label>
                                                        <span class="field-wrap"><input type="text" name="provider" value="{{ old('provider') }}" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Location (If In-Person)*</label>
                                                        <span class="field-wrap"><input type="text" name="location" value="{{ old('location') }}" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                </div>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Course/Event Date*</label>
                                                        <span class="field-wrap"><input type="date" name="course_date" value="{{ old('course_date') }}" required class="field-control" /></span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Total PDES Earned*</label>
                                                        <span class="field-wrap"><input type="number" name="pdes_earned" value="{{ old('pdes_earned') }}" required min="1" class="field-control" /></span>
                                                    </p>
                                                </div>

                                                <p class="txt-2 txt-3">
                                                    <label class="lb-hd1">Category of PDES*</label>
                                                    <span class="field-wrap">
                                                        <select name="category" required class="field-control">
                                                            <option value="">Select Category</option>
                                                            @foreach (($form['categories'] ?? []) as $cat)
                                                                <option value="{{ $cat }}" @selected(old('category') === $cat)>{{ $cat }}</option>
                                                            @endforeach
                                                        </select>
                                                    </span>
                                                </p>

                                                <p class="mn-hd-3">Supporting Documentation</p>

                                                <p class="txt-2 txt-3">
                                                    <label class="lb-hd1"><strong>Upload Certificate of Completion (PDF, JPG, PNG, DOC):</strong></label>
                                                    <span class="field-wrap"><input type="file" name="certificate" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="field-file" /></span>
                                                </p>

                                                <p class="txt-2 txt-3">
                                                    <label class="lb-hd1"><strong>Upload Additional Supporting Documents (Optional):</strong></label>
                                                    <span class="field-wrap"><input type="file" name="additional_docs" class="field-file" /></span>
                                                </p>

                                                <p class="mn-hd-3">Declaration &amp; Submission</p>
                                                <p class="declaration-label">By submitting this form, I confirm that:</p>

                                                <div class="declaration-list">
                                                    @foreach (($form['declarations'] ?? []) as $idx => $decl)
                                                        <label class="declaration-item">
                                                            <input type="checkbox" name="declaration_{{ $idx }}" value="1" required {{ old('declaration_' . $idx) ? 'checked' : '' }} />
                                                            <span>{{ $decl }}</span>
                                                        </label>
                                                    @endforeach
                                                </div>

                                                <div class="submit-wrap submit-btn1">
                                                    <button type="submit" class="submit-button">Submit</button>
                                                </div>
                                            </div>

                                            @if (! empty($form['assistance_html']))
                                                <p class="assistance-note">{!! $form['assistance_html'] !!}</p>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
    </div>

</x-layouts.cms>
