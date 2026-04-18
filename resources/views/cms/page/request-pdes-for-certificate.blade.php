<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $intro = $page->page_data['intro'] ?? [];
        $form  = $page->page_data['form']  ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Intro: copy left, illustration right --}}
    @if (! empty($intro))
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                    <div>
                        @if (! empty($intro['heading']))
                            <h2 class="text-[28px] md:text-[34px] font-semibold text-[#14166e] leading-tight mb-5">
                                {{ $intro['heading'] }}
                            </h2>
                        @endif

                        @if (! empty($intro['body']))
                            <p class="text-[15px] text-gray-700 leading-relaxed mb-5">{{ $intro['body'] }}</p>
                        @endif

                        @if (! empty($intro['requirement_html']))
                            <p class="text-[16px] text-gray-800">{!! $intro['requirement_html'] !!}</p>
                        @endif
                    </div>

                    @if (! empty($intro['image']))
                        <div>
                            <img src="{{ $intro['image'] }}" alt="{{ $intro['heading'] ?? $page->title }}" class="w-full h-auto rounded" />
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @endif

    {{-- PDES form panel --}}
    @if (! empty($form))
        <section class="bg-[#fef5ef] py-14">
            <div class="max-w-[1080px] mx-auto px-4">
                <div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] p-8 md:p-12">
                    @if (! empty($form['heading']))
                        <h2 class="text-[24px] md:text-[30px] font-semibold text-[#14166e] mb-3">
                            {{ $form['heading'] }}
                        </h2>
                    @endif

                    @if (! empty($form['description']))
                        <p class="text-[15px] text-gray-600 leading-relaxed mb-8">{{ $form['description'] }}</p>
                    @endif

                    <form method="post" action="#" enctype="multipart/form-data" class="space-y-8">

                        {{-- Personal Information --}}
                        <div>
                            <h3 class="text-[16px] font-bold text-[#14166e] uppercase tracking-wide mb-4">Personal Information</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Full Name *</label>
                                    <input type="text" name="full_name" required maxlength="400" class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] focus:outline-none focus:border-[#14166e]" />
                                </div>
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Email Address *</label>
                                    <input type="email" name="email" required maxlength="400" class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] focus:outline-none focus:border-[#14166e]" />
                                </div>
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Phone Number *</label>
                                    <input type="tel" name="phone" required maxlength="400" class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] focus:outline-none focus:border-[#14166e]" />
                                </div>
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">AAPSCM Certification *</label>
                                    <select name="certification" required class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] bg-white focus:outline-none focus:border-[#14166e]">
                                        <option value="">Select Course</option>
                                        @foreach (($form['certifications'] ?? []) as $cert)
                                            <option value="{{ $cert }}">{{ $cert }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">AAPSCM Certification Number (if applicable *)</label>
                                    <input type="text" name="certification_number" maxlength="400" class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] focus:outline-none focus:border-[#14166e]" />
                                </div>
                            </div>
                        </div>

                        {{-- PDES Activity Details --}}
                        <div>
                            <h3 class="text-[16px] font-bold text-[#14166e] uppercase tracking-wide mb-4">PDES Activity Details</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Activity Type *</label>
                                    <select name="activity_type" required class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] bg-white focus:outline-none focus:border-[#14166e]">
                                        <option value="">Select Activity</option>
                                        @foreach (($form['activity_types'] ?? []) as $activity)
                                            <option value="{{ $activity }}">{{ $activity }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Course/Event Name *</label>
                                    <input type="text" name="course_name" required maxlength="400" class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] focus:outline-none focus:border-[#14166e]" />
                                </div>
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Training Provider/Organization *</label>
                                    <input type="text" name="provider" required maxlength="400" class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] focus:outline-none focus:border-[#14166e]" />
                                </div>
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Location (If In-Person) *</label>
                                    <input type="text" name="location" required maxlength="400" class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] focus:outline-none focus:border-[#14166e]" />
                                </div>
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Course/Event Date *</label>
                                    <input type="date" name="course_date" required class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] focus:outline-none focus:border-[#14166e]" />
                                </div>
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Total PDES Earned *</label>
                                    <input type="number" name="pdes_earned" required min="0" class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] focus:outline-none focus:border-[#14166e]" />
                                </div>
                                <div class="md:col-span-2">
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1">Category of PDES *</label>
                                    <select name="category" required class="w-full border border-gray-300 rounded px-3 py-2.5 text-[14px] bg-white focus:outline-none focus:border-[#14166e]">
                                        <option value="">Select Category</option>
                                        @foreach (($form['categories'] ?? []) as $cat)
                                            <option value="{{ $cat }}">{{ $cat }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        {{-- Supporting Documentation --}}
                        <div>
                            <h3 class="text-[16px] font-bold text-[#14166e] uppercase tracking-wide mb-4">Supporting Documentation</h3>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1"><strong>Upload Certificate of Completion (PDF, JPG, PNG, DOC):</strong></label>
                                    <input type="file" name="certificate" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="block w-full text-[13px] text-gray-700 file:mr-3 file:border-0 file:bg-[#14166e] file:text-white file:rounded file:px-4 file:py-2" />
                                </div>
                                <div>
                                    <label class="block text-[13px] font-medium text-[#14166e] mb-1"><strong>Upload Additional Supporting Documents (Optional):</strong></label>
                                    <input type="file" name="additional_docs" class="block w-full text-[13px] text-gray-700 file:mr-3 file:border-0 file:bg-[#14166e] file:text-white file:rounded file:px-4 file:py-2" />
                                </div>
                            </div>
                        </div>

                        {{-- Declaration --}}
                        <div>
                            <h3 class="text-[16px] font-bold text-[#14166e] uppercase tracking-wide mb-4">Declaration &amp; Submission</h3>
                            <p class="text-[14px] font-semibold text-gray-800 mb-3">By submitting this form, I confirm that:</p>
                            <div class="space-y-2.5">
                                @foreach (($form['declarations'] ?? []) as $idx => $decl)
                                    <label class="flex items-start gap-2.5 text-[14px] text-gray-800">
                                        <input type="checkbox" name="declaration_{{ $idx }}" value="1" required class="mt-1 w-4 h-4 text-[#14166e] border-gray-300 rounded focus:ring-[#14166e]" />
                                        <span>{{ $decl }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <div class="pt-2">
                            <button type="submit" class="bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[15px] px-10 py-3 rounded transition">
                                Submit
                            </button>
                        </div>

                        @if (! empty($form['assistance_html']))
                            <p class="text-[13px] text-gray-700 leading-relaxed pt-4 border-t border-gray-200 [&_a]:text-[#14166e] [&_a]:underline hover:[&_a]:text-[#0f1159]">
                                {!! $form['assistance_html'] !!}
                            </p>
                        @endif
                    </form>
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
