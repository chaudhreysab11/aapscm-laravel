<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $preselectedTier = request('tier');
    @endphp

    <div class="eltdf-title-holder eltdf-standard-with-breadcrumbs-type eltdf-title-va-header-bottom eltdf-has-bg-image" style="height: 240px;background-color: #14166e;background-image:url(https://aapscm.org/wp-content/uploads/2021/10/onlinetestingimproved-bg-1.png);position: relative; display: inline-block; width: 100%; vertical-align: middle; height: 240 px; background-color: black ! important; background-position: center 0; background-repeat: no-repeat; z-index: 101;" data-height="240">
        <div class="eltdf-title-wrapper" style="height: 240px; position: relative; display: table-cell; width: 100%; vertical-align: middle;">
            <div class="eltdf-title-inner" style="height: 240px; position: relative; display: table-cell; width: 100%; vertical-align: middle;">
                <div class="eltdf-grid" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                    <div class="eltdf-title-info">
                        <h2 class="eltdf-page-title entry-title" style="color: #fff; font-size: 45px; line-height: 1.2; font-weight: 700; margin: 0 0 8px; text-align: left;">
                            {{ $page->title }}
                        </h2>
                        <div class="eltdf-breadcrumbs-info">
                            <div itemprop="breadcrumb" class="eltdf-breadcrumbs" style="color: rgba(255, 255, 255, 0.82); font-size: 13px; line-height: 1.6; text-align: left;">
                                <a itemprop="url" href="{{ url('/') }}" style="color: inherit; text-decoration: none;">Home</a>
                                <span class="eltdf-delimiter">&nbsp; / &nbsp;</span>
                                <span class="eltdf-current" style="color: #fff;">{{ $page->title }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[900px] mx-auto px-4">

            @if (session('success'))
                <div class="mb-8 rounded-lg bg-green-50 border border-green-200 p-5 text-green-800 text-[15px]">
                    <strong>Application Submitted!</strong> {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 rounded-lg bg-red-50 border border-red-200 p-5 text-red-800 text-[14px]">
                    <strong>Please correct the following errors:</strong>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('fellow-membership-form.submit') }}" enctype="multipart/form-data" class="space-y-8 bg-white rounded-xl p-6 md:p-8 shadow-sm">
                @csrf

                {{-- Submit Your CV (Membership Tier Selection) --}}
                <fieldset>
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-2">Submit Your CV <span class="text-red-500">*</span></legend>
                    <p class="text-[14px] text-gray-600 mb-5">Select the Fellow membership tier you are applying for.</p>

                    <div class="space-y-3">
                        @foreach ($tiers as $key => $tier)
                            <label class="flex items-start gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#14166e] cursor-pointer">
                                <input type="radio" name="membership_tier" value="{{ $key }}" required
                                       {{ old('membership_tier', $preselectedTier) === $key ? 'checked' : '' }}
                                       class="mt-1 text-[#14166e] focus:ring-[#14166e]" />
                                <span class="text-[15px] text-gray-700">
                                    <strong class="text-[#14166e]">{{ $tier['label'] }} - {{ $tier['price'] }}</strong>
                                </span>
                            </label>
                        @endforeach
                    </div>
                </fieldset>

                {{-- Personal Information --}}
                <fieldset>
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Personal Information</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label for="full_name" class="block text-[14px] font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="date_of_birth" class="block text-[14px] font-medium text-gray-700 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="nationality" class="block text-[14px] font-medium text-gray-700 mb-1">Nationality <span class="text-red-500">*</span></label>
                            <input type="text" name="nationality" id="nationality" value="{{ old('nationality') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                    </div>
                </fieldset>

                {{-- Contact Information --}}
                <fieldset >
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Contact Information</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="email" class="block text-[14px] font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="phone" class="block text-[14px] font-medium text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="address" class="block text-[14px] font-medium text-gray-700 mb-1">Address <span class="text-red-500">*</span></label>
                            <input type="text" name="address" id="address" value="{{ old('address') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                    </div>
                </fieldset>

                {{-- Professional Information --}}
                <fieldset >
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Professional Information</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label for="current_employer" class="block text-[14px] font-medium text-gray-700 mb-1">Current Employer/Organization Name <span class="text-red-500">*</span></label>
                            <input type="text" name="current_employer" id="current_employer" value="{{ old('current_employer') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="job_title" class="block text-[14px] font-medium text-gray-700 mb-1">Job Title/Position <span class="text-red-500">*</span></label>
                            <input type="text" name="job_title" id="job_title" value="{{ old('job_title') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="industry_sector" class="block text-[14px] font-medium text-gray-700 mb-1">Industry/Sector <span class="text-red-500">*</span></label>
                            <input type="text" name="industry_sector" id="industry_sector" value="{{ old('industry_sector') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="years_experience" class="block text-[14px] font-medium text-gray-700 mb-1">Years of Professional Experience <span class="text-red-500">*</span></label>
                            <input type="text" name="years_experience" id="years_experience" value="{{ old('years_experience') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                    </div>
                </fieldset>

                {{-- Qualifications --}}
                <fieldset >
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Qualifications</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label for="highest_qualification" class="block text-[14px] font-medium text-gray-700 mb-1">Highest Academic Qualification <span class="text-red-500">*</span></label>
                            <input type="text" name="highest_qualification" id="highest_qualification" value="{{ old('highest_qualification') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="degree_name" class="block text-[14px] font-medium text-gray-700 mb-1">Degree/Certification Name <span class="text-red-500">*</span></label>
                            <input type="text" name="degree_name" id="degree_name" value="{{ old('degree_name') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="institution" class="block text-[14px] font-medium text-gray-700 mb-1">Institution <span class="text-red-500">*</span></label>
                            <input type="text" name="institution" id="institution" value="{{ old('institution') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="year_completed" class="block text-[14px] font-medium text-gray-700 mb-1">Year Completed <span class="text-red-500">*</span></label>
                            <input type="date" name="year_completed" id="year_completed" value="{{ old('year_completed') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                    </div>
                </fieldset>

                {{-- Membership Requirements --}}
                <fieldset >
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Membership Requirements</legend>
                    <div class="space-y-5">
                        <div>
                            <label for="cv" class="block text-[14px] font-medium text-gray-700 mb-1">Professional CV/Resume <span class="text-red-500">*</span></label>
                            <input type="file" name="cv" id="cv" required accept=".pdf,.doc,.docx"
                                   class="w-full text-[14px] text-gray-700 file:mr-3 file:rounded-lg file:border-0 file:bg-[#14166e] file:text-white file:px-4 file:py-2 file:text-[13px] file:cursor-pointer" />
                            <p class="text-[12px] text-gray-500 mt-1">PDF, DOC, or DOCX (max 5 MB)</p>
                        </div>
                        <div>
                            <label for="identity" class="block text-[14px] font-medium text-gray-700 mb-1">Proof of Identity <span class="text-red-500">*</span></label>
                            <input type="file" name="identity" id="identity" required accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-[14px] text-gray-700 file:mr-3 file:rounded-lg file:border-0 file:bg-[#14166e] file:text-white file:px-4 file:py-2 file:text-[13px] file:cursor-pointer" />
                            <p class="text-[12px] text-gray-500 mt-1">PDF or image (max 5 MB)</p>
                        </div>
                        <div>
                            <label for="supporting_documents" class="block text-[14px] font-medium text-gray-700 mb-1">Supporting Documents</label>
                            <input type="file" name="supporting_documents" id="supporting_documents" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.zip"
                                   class="w-full text-[14px] text-gray-700 file:mr-3 file:rounded-lg file:border-0 file:bg-[#14166e] file:text-white file:px-4 file:py-2 file:text-[13px] file:cursor-pointer" />
                            <p class="text-[12px] text-gray-500 mt-1">Optional. PDF, DOC, image, or ZIP (max 10 MB)</p>
                        </div>
                        <div>
                            <label for="personal_statement" class="block text-[14px] font-medium text-gray-700 mb-1">Personal Statement <span class="text-red-500">*</span></label>
                            <textarea name="personal_statement" id="personal_statement" rows="4" required
                                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]">{{ old('personal_statement') }}</textarea>
                        </div>
                    </div>
                </fieldset>

                {{-- Declaration --}}
                <fieldset >
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Declaration <span class="text-red-500">*</span></legend>
                    <label class="flex items-start gap-3">
                        <input type="checkbox" name="declaration_agreed" value="1" required
                               {{ old('declaration_agreed') ? 'checked' : '' }}
                               class="mt-1 rounded text-[#14166e] focus:ring-[#14166e]" />
                        <span class="text-[14px] text-gray-700 leading-relaxed">
                            <strong>Yes, I agree.</strong> I hereby declare that all the information provided in this application is true and correct to the best of my knowledge. I agree to abide by the code of conduct and professional standards set forth by the organization.
                        </span>
                    </label>
                </fieldset>

                {{-- Payment --}}
                <fieldset >
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Payment</legend>
                    <div>
                        <label for="payment_proof" class="block text-[14px] font-medium text-gray-700 mb-1">
                            Membership Fee Payment Confirmation <span class="text-red-500">*</span>
                        </label>
                        <p class="text-[13px] text-gray-600 mb-2">Upload proof of payment (e.g., payment receipt or transaction confirmation):</p>
                        <input type="file" name="payment_proof" id="payment_proof" required accept=".pdf,.jpg,.jpeg,.png"
                               class="w-full text-[14px] text-gray-700 file:mr-3 file:rounded-lg file:border-0 file:bg-[#14166e] file:text-white file:px-4 file:py-2 file:text-[13px] file:cursor-pointer" />
                        <p class="text-[12px] text-gray-500 mt-1">PDF or image (max 5 MB)</p>
                    </div>
                </fieldset>

                <div class="flex justify-center pt-2">
                    <button type="submit" class="bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[16px] px-12 py-3 rounded-lg transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>

</x-layouts.cms>
