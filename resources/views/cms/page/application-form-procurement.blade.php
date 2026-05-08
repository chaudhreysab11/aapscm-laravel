<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- Hero banner --}}
    <section class="relative bg-[#0B2F5E] py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[28px] md:text-[40px] font-bold text-white leading-tight">
                Application Form for Free Training in Procurement Management
            </h1>
        </div>
    </section>

    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[800px] mx-auto px-4">

            {{-- Success message --}}
            @if (session('success'))
                <div class="mb-8 rounded-lg bg-green-50 border border-green-200 p-5 text-green-800 text-[15px]">
                    <strong>Application Submitted!</strong> {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('free-training.submit') }}" class="space-y-10 bg-white rounded-xl p-6 md:p-8 shadow-sm">
                @csrf

                {{-- ── Section 1: Personal Information ── --}}
                <fieldset>
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Personal Information</legend>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        {{-- Full Name --}}
                        <div class="md:col-span-2">
                            <label for="full_name" class="block text-[14px] font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="full_name" id="full_name" value="{{ old('full_name') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                            @error('full_name') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Email --}}
                        <div>
                            <label for="email" class="block text-[14px] font-medium text-gray-700 mb-1">Email <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                            @error('email') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Date of Birth --}}
                        <div>
                            <label for="date_of_birth" class="block text-[14px] font-medium text-gray-700 mb-1">Date of Birth</label>
                            <input type="date" name="date_of_birth" id="date_of_birth" value="{{ old('date_of_birth') }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                            @error('date_of_birth') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Phone --}}
                        <div>
                            <label for="phone" class="block text-[14px] font-medium text-gray-700 mb-1">Phone Number</label>
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                            @error('phone') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Gender --}}
                        <div>
                            <label class="block text-[14px] font-medium text-gray-700 mb-2">Gender</label>
                            <div class="flex flex-wrap gap-4">
                                @foreach (['male' => 'Male', 'female' => 'Female', 'other' => 'Other', 'prefer_not_to_say' => 'Prefer not to say'] as $val => $label)
                                <label class="inline-flex items-center gap-1.5 text-[14px] text-gray-700">
                                    <input type="radio" name="gender" value="{{ $val }}" {{ old('gender') === $val ? 'checked' : '' }}
                                           class="text-[#14166e] focus:ring-[#14166e]" />
                                    {{ $label }}
                                </label>
                                @endforeach
                            </div>
                            @error('gender') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </fieldset>

                {{-- ── Section 2: Academic Information ── --}}
                <fieldset>
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Academic Information</legend>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        {{-- College / University --}}
                        <div class="md:col-span-2">
                            <label for="college_university" class="block text-[14px] font-medium text-gray-700 mb-1">College/University Name</label>
                            <input type="text" name="college_university" id="college_university" value="{{ old('college_university') }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                            @error('college_university') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Program of Study --}}
                        <div>
                            <label for="program_of_study" class="block text-[14px] font-medium text-gray-700 mb-1">Current Program of Study</label>
                            <input type="text" name="program_of_study" id="program_of_study" value="{{ old('program_of_study') }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                            @error('program_of_study') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Year of Study --}}
                        <div>
                            <label for="year_of_study" class="block text-[14px] font-medium text-gray-700 mb-1">Year of Study</label>
                            <select name="year_of_study" id="year_of_study"
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]">
                                <option value="">Select...</option>
                                @foreach (['freshman' => 'Freshman', 'sophomore' => 'Sophomore', 'junior' => 'Junior', 'senior' => 'Senior', 'graduate' => 'Graduate'] as $val => $label)
                                <option value="{{ $val }}" {{ old('year_of_study') === $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('year_of_study') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Expected Graduation --}}
                        <div>
                            <label for="expected_graduation" class="block text-[14px] font-medium text-gray-700 mb-1">Expected Graduation Date</label>
                            <input type="date" name="expected_graduation" id="expected_graduation" value="{{ old('expected_graduation') }}"
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                            @error('expected_graduation') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Program Choices --}}
                        <div class="md:col-span-2">
                            <label class="block text-[14px] font-medium text-gray-700 mb-2">Make your Choice(s)</label>
                            <div class="flex flex-col gap-2">
                                @foreach (['procurement_management' => 'Procurement Management', 'supply_chain_management' => 'Supply Chain Management', 'hospitality_tourism_management' => 'Hospitality and Tourism Management'] as $val => $label)
                                <label class="inline-flex items-center gap-2 text-[14px] text-gray-700">
                                    <input type="checkbox" name="program_choices[]" value="{{ $val }}"
                                           {{ in_array($val, old('program_choices', [])) ? 'checked' : '' }}
                                           class="rounded text-[#14166e] focus:ring-[#14166e]" />
                                    {{ $label }}
                                </label>
                                @endforeach
                            </div>
                            @error('program_choices') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </fieldset>

                {{-- ── Section 3: Additional Information ── --}}
                <fieldset>
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Additional Information</legend>

                    <div class="space-y-5">
                        {{-- Interest reason --}}
                        <div>
                            <label for="interest_reason" class="block text-[14px] font-medium text-gray-700 mb-1">Why are you interested in procurement management training? (Briefly describe)</label>
                            <textarea name="interest_reason" id="interest_reason" rows="3"
                                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]">{{ old('interest_reason') }}</textarea>
                            @error('interest_reason') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Prior training --}}
                        <div>
                            <label class="block text-[14px] font-medium text-gray-700 mb-2">Have you taken any related courses or training in procurement or supply chain management?</label>
                            <div class="flex gap-4">
                                <label class="inline-flex items-center gap-1.5 text-[14px] text-gray-700">
                                    <input type="radio" name="has_prior_training" value="1" {{ old('has_prior_training') === '1' ? 'checked' : '' }}
                                           class="text-[#14166e] focus:ring-[#14166e]" />
                                    Yes
                                </label>
                                <label class="inline-flex items-center gap-1.5 text-[14px] text-gray-700">
                                    <input type="radio" name="has_prior_training" value="0" {{ old('has_prior_training') === '0' ? 'checked' : '' }}
                                           class="text-[#14166e] focus:ring-[#14166e]" />
                                    No
                                </label>
                            </div>
                            @error('has_prior_training') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Prior training details --}}
                        <div>
                            <label for="prior_training_details" class="block text-[14px] font-medium text-gray-700 mb-1">If yes, please specify</label>
                            <textarea name="prior_training_details" id="prior_training_details" rows="2"
                                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]">{{ old('prior_training_details') }}</textarea>
                            @error('prior_training_details') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Career aspirations --}}
                        <div>
                            <label for="career_aspirations" class="block text-[14px] font-medium text-gray-700 mb-1">What are your career aspirations in procurement or related fields?</label>
                            <textarea name="career_aspirations" id="career_aspirations" rows="3"
                                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]">{{ old('career_aspirations') }}</textarea>
                            @error('career_aspirations') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </fieldset>

                {{-- ── Section 4: Availability ── --}}
                <fieldset>
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Availability</legend>

                    <div class="space-y-5">
                        {{-- Available all sessions --}}
                        <div>
                            <label class="block text-[14px] font-medium text-gray-700 mb-2">Are you available to attend all training sessions?</label>
                            <div class="flex gap-4">
                                <label class="inline-flex items-center gap-1.5 text-[14px] text-gray-700">
                                    <input type="radio" name="available_all_sessions" value="1" {{ old('available_all_sessions', '1') === '1' ? 'checked' : '' }}
                                           class="text-[#14166e] focus:ring-[#14166e]" />
                                    Yes
                                </label>
                                <label class="inline-flex items-center gap-1.5 text-[14px] text-gray-700">
                                    <input type="radio" name="available_all_sessions" value="0" {{ old('available_all_sessions') === '0' ? 'checked' : '' }}
                                           class="text-[#14166e] focus:ring-[#14166e]" />
                                    No
                                </label>
                            </div>
                            @error('available_all_sessions') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Availability explanation --}}
                        <div>
                            <label for="availability_explanation" class="block text-[14px] font-medium text-gray-700 mb-1">If no, please explain</label>
                            <textarea name="availability_explanation" id="availability_explanation" rows="2"
                                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]">{{ old('availability_explanation') }}</textarea>
                            @error('availability_explanation') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Preferred schedule --}}
                        <div>
                            <label for="preferred_schedule" class="block text-[14px] font-medium text-gray-700 mb-1">Preferred Training Schedule <span class="text-red-500">*</span></label>
                            <select name="preferred_schedule" id="preferred_schedule" required
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]">
                                <option value="">Select...</option>
                                @foreach (['weekdays' => 'Weekdays', 'weekends' => 'Weekends', 'flexible' => 'Flexible'] as $val => $label)
                                <option value="{{ $val }}" {{ old('preferred_schedule') === $val ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('preferred_schedule') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Preferred training type --}}
                        <div>
                            <label for="preferred_training_type" class="block text-[14px] font-medium text-gray-700 mb-1">Preferred Training Type <span class="text-red-500">*</span></label>
                            <select name="preferred_training_type" id="preferred_training_type" required
                                    class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]">
                                <option value="">Select...</option>
                                <option value="virtual_instructor_led" {{ old('preferred_training_type') === 'virtual_instructor_led' ? 'selected' : '' }}>Virtual Training (Instructor-led)</option>
                                <option value="self_paced" {{ old('preferred_training_type') === 'self_paced' ? 'selected' : '' }}>Self-paced downloadable video training and materials</option>
                            </select>
                            @error('preferred_training_type') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Student membership --}}
                        <div>
                            <label class="block text-[14px] font-medium text-gray-700 mb-2">Do you want to be a Student Professional Member after training?</label>
                            <div class="flex flex-col gap-2">
                                <label class="inline-flex items-center gap-1.5 text-[14px] text-gray-700">
                                    <input type="radio" name="wants_student_membership" value="0" {{ old('wants_student_membership', '0') === '0' ? 'checked' : '' }}
                                           class="text-[#14166e] focus:ring-[#14166e]" />
                                    No &mdash; I want only the Training for now
                                </label>
                                <label class="inline-flex items-center gap-1.5 text-[14px] text-gray-700">
                                    <input type="radio" name="wants_student_membership" value="1" {{ old('wants_student_membership') === '1' ? 'checked' : '' }}
                                           class="text-[#14166e] focus:ring-[#14166e]" />
                                    Yes &mdash; Register as a Student Member ($49.99)
                                </label>
                            </div>
                            @error('wants_student_membership') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </fieldset>

                {{-- ── Section 5: Declaration ── --}}
                <fieldset>
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Declaration</legend>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        {{-- Signature --}}
                        <div>
                            <label for="signature_name" class="block text-[14px] font-medium text-gray-700 mb-1">Type your name as signature <span class="text-red-500">*</span></label>
                            <input type="text" name="signature_name" id="signature_name" value="{{ old('signature_name') }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px] italic" />
                            @error('signature_name') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Signature date --}}
                        <div>
                            <label for="signature_date" class="block text-[14px] font-medium text-gray-700 mb-1">Date <span class="text-red-500">*</span></label>
                            <input type="date" name="signature_date" id="signature_date" value="{{ old('signature_date', now()->format('Y-m-d')) }}" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                            @error('signature_date') <p class="text-red-500 text-[13px] mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>
                </fieldset>

                {{-- Submit --}}
                <div class="text-center">
                    <button type="submit"
                            class="inline-block bg-[#195b13] hover:bg-[#14490f] text-white font-semibold px-10 py-3.5 rounded-lg transition-colors text-[16px] shadow-md">
                        Submit Application
                    </button>
                </div>
            </form>
        </div>
    </section>

</x-layouts.cms>