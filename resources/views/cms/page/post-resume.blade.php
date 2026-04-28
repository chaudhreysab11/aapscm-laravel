@php
    $data = $page->page_data ?? [];
    $titleBand = $data['title_band'] ?? [];
    $guestState = $data['guest_state'] ?? [];
    $resumeForm = $data['resume_form'] ?? [];
    $redirectTo = '/post-resume/';
    $employmentGroups = max(1, (int) ($resumeForm['employment_history_groups'] ?? 3));
    $guestIndustries = [
        'Advertising/Marketing',
        'Communication',
        'Construction',
        'Education',
        'Engineering/Research',
        'Finance/Banking/Insurance',
        'Food Service',
        'Government',
        'Hospital/Health Services',
        'Lodging/Entertainment',
        'Manufacturing',
        'Publishing',
        'Religious Affiliation',
        'Retail',
        'Services',
        'Transportation',
        'Utilities',
        'Wholesale/Distribution',
        'None',
        'Other',
    ];
    $guestTitleCodes = [
        'Analyst',
        'Asst. Purchasing Agent',
        'Buyer',
        'Buyer/Planner',
        'Coordinator',
        'Expediter',
        'Logistics',
        'Materials Director',
        'Materials Manager',
        'Purchasing',
        'Purchasing Agent',
        'Purchasing Director',
        'Purchasing Manager',
        'Purchasing Supervisor',
        'Specialist',
        'Supply Chain',
        'V.P., Materials',
        'V.P., Purchasing',
        'None',
        'Other',
    ];
    $guestSecurityQuestions = [
        'What city was your mother born in?',
        'What city were you born in?',
        'What hospital were you born in?',
        'What is your Mother\'s Maiden Name?',
        'What was the model of your first car?',
        'What was the name of the first school you attended?',
        'What was the name of your favorite teacher?',
        'What was the name of your first employer?',
        'What was your first pet\'s name?',
    ];
    $guestCountries = [
        'Afghanistan', 'Åland Islands', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla',
        'Antarctica', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan',
        'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Belau', 'Belize', 'Benin', 'Bermuda',
        'Bhutan', 'Bolivia', 'Bonaire, Saint Eustatius and Saba', 'Bosnia and Herzegovina', 'Botswana', 'Bouvet Island',
        'Brazil', 'British Indian Ocean Territory', 'British Virgin Islands', 'Brunei', 'Bulgaria', 'Burkina Faso',
        'Burundi', 'Cambodia', 'Cameroon', 'Canada', 'Cape Verde', 'Cayman Islands', 'Central African Republic', 'Chad',
        'Chile', 'China', 'Christmas Island', 'Cocos (Keeling) Islands', 'Colombia', 'Comoros', 'Congo (Brazzaville)',
        'Congo (Kinshasa)', 'Cook Islands', 'Costa Rica', 'Croatia', 'Cuba', 'Curaçao', 'Cyprus', 'Czech Republic',
        'Denmark', 'Djibouti', 'Dominica', 'Dominican Republic', 'Ecuador', 'Egypt', 'El Salvador', 'Equatorial Guinea',
        'Eritrea', 'Estonia', 'Eswatini', 'Ethiopia', 'Falkland Islands', 'Faroe Islands', 'Fiji', 'Finland', 'France',
        'French Guiana', 'French Polynesia', 'French Southern Territories', 'Gabon', 'Gambia', 'Georgia', 'Germany',
        'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guernsey', 'Guinea',
        'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard Island and McDonald Islands', 'Honduras', 'Hong Kong', 'Hungary',
        'Iceland', 'India', 'Indonesia', 'Iran', 'Iraq', 'Ireland', 'Isle of Man', 'Israel', 'Italy', 'Ivory Coast',
        'Jamaica', 'Japan', 'Jersey', 'Jordan', 'Kazakhstan', 'Kenya', 'Kiribati', 'Kuwait', 'Kyrgyzstan', 'Laos',
        'Latvia', 'Lebanon', 'Lesotho', 'Liberia', 'Libya', 'Liechtenstein', 'Lithuania', 'Luxembourg',
        'Macao S.A.R., China', 'Macedonia', 'Madagascar', 'Malawi', 'Malaysia', 'Maldives', 'Mali', 'Malta',
        'Marshall Islands', 'Martinique', 'Mauritania', 'Mauritius', 'Mayotte', 'Mexico', 'Micronesia', 'Moldova',
        'Monaco', 'Mongolia', 'Montenegro', 'Montserrat', 'Morocco', 'Mozambique', 'Myanmar', 'Namibia', 'Nauru',
        'Nepal', 'Netherlands', 'New Caledonia', 'New Zealand', 'Nicaragua', 'Niger', 'Nigeria', 'Niue',
        'Norfolk Island', 'Northern Mariana Islands', 'North Korea', 'Norway', 'Oman', 'Pakistan', 'Palestinian Territory',
        'Panama', 'Papua New Guinea', 'Paraguay', 'Peru', 'Philippines', 'Pitcairn', 'Poland', 'Portugal', 'Puerto Rico',
        'Qatar', 'Reunion', 'Romania', 'Russia', 'Rwanda', 'Saint Barthélemy', 'Saint Helena', 'Saint Kitts and Nevis',
        'Saint Lucia', 'Saint Martin (French part)', 'Saint Martin (Dutch part)', 'Saint Pierre and Miquelon',
        'Saint Vincent and the Grenadines', 'San Marino', 'São Tomé and Príncipe', 'Saudi Arabia', 'Senegal', 'Serbia',
        'Seychelles', 'Sierra Leone', 'Singapore', 'Slovakia', 'Slovenia', 'Solomon Islands', 'Somalia', 'South Africa',
        'South Georgia/Sandwich Islands', 'South Korea', 'South Sudan', 'Spain', 'Sri Lanka', 'Sudan', 'Suriname',
        'Svalbard and Jan Mayen', 'Sweden', 'Switzerland', 'Syria', 'Taiwan', 'Tajikistan', 'Tanzania', 'Thailand',
        'Timor-Leste', 'Togo', 'Tokelau', 'Tonga', 'Trinidad and Tobago', 'Tunisia', 'Turkey', 'Turkmenistan',
        'Turks and Caicos Islands', 'Tuvalu', 'Uganda', 'Ukraine', 'United Arab Emirates', 'United Kingdom (UK)',
        'United States (US)', 'United States (US) Minor Outlying Islands', 'United States (US) Virgin Islands', 'Uruguay',
        'Uzbekistan', 'Vanuatu', 'Vatican', 'Venezuela', 'Vietnam', 'Wallis and Futuna', 'Western Sahara', 'Samoa',
        'Yemen', 'Zambia', 'Zimbabwe',
    ];
@endphp

<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    <section class="relative overflow-hidden py-[100px]">
        @if (! empty($titleBand['background']))
            <div class="absolute inset-0 bg-cover bg-center" style="background-image: url('{{ $titleBand['background'] }}');"></div>
        @endif
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="relative mx-auto max-w-[1200px] px-4 text-center">
            <h1 class="font-[Poppins] text-[40px] font-semibold uppercase leading-[45px] text-white">
                {{ $titleBand['title'] ?? $page->title }}
            </h1>
        </div>
    </section>

    <section class="bg-white py-[50px]">
        <div class="mx-auto max-w-[860px] px-4">
            @if (session('success'))
                <div class="mb-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @auth
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-800">
                        <ul class="list-disc space-y-1 ps-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="rounded-[20px] border border-gray-200 bg-white p-5 shadow-[0_0_3px_rgba(0,0,0,0.5)] md:p-8">
                    <form method="POST" action="{{ route('post-resume.submit') }}" class="space-y-5">
                        @csrf

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label for="headline" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Headline:</label>
                                <input id="headline" name="headline" type="text" value="{{ old('headline') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="objective" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Objective:</label>
                                <input id="objective" name="objective" type="text" value="{{ old('objective') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                        </div>

                        <div class="grid gap-5 md:grid-cols-[2fr_1fr]">
                            <div>
                                <label for="desired_salary" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Desired Salary:</label>
                                <input id="desired_salary" name="desired_salary" type="number" step="0.01" min="0" value="{{ old('desired_salary') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="salary_unit" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Chosse Unit</label>
                                <select id="salary_unit" name="salary_unit" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm">
                                    @foreach ($resumeForm['salary_units'] ?? [] as $option)
                                        <option value="{{ $option }}" @selected(old('salary_unit', ($resumeForm['salary_units'][0] ?? null)) === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label for="education_level" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Highest Level of Education:</label>
                                <select id="education_level" name="education_level" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm">
                                    @foreach ($resumeForm['education_levels'] ?? [] as $option)
                                        <option value="{{ $option }}" @selected(old('education_level', ($resumeForm['education_levels'][0] ?? null)) === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="career_level" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Current Career Level:</label>
                                <select id="career_level" name="career_level" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm">
                                    @foreach ($resumeForm['career_levels'] ?? [] as $option)
                                        <option value="{{ $option }}" @selected(old('career_level', ($resumeForm['career_levels'][0] ?? null)) === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="industry_experience" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Industry Experience</label>
                                <select id="industry_experience" name="industry_experience" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm">
                                    @foreach ($resumeForm['industry_options'] ?? [] as $option)
                                        <option value="{{ $option }}" @selected(old('industry_experience', ($resumeForm['industry_options'][0] ?? null)) === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="years_of_experience" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Year Of Experience</label>
                                <select id="years_of_experience" name="years_of_experience" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm">
                                    @foreach ($resumeForm['experience_options'] ?? [] as $option)
                                        <option value="{{ $option }}" @selected(old('years_of_experience', ($resumeForm['experience_options'][0] ?? null)) === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <span class="block font-[Poppins] text-sm font-semibold text-[#202124]">Job Status (How many hours are you wanting to work?)</span>
                                <div class="mt-3 space-y-2">
                                    @foreach ($resumeForm['job_status_options'] ?? [] as $option)
                                        <label class="flex items-start gap-2 text-sm text-[#202124]">
                                            <input type="checkbox" name="job_statuses[]" value="{{ $option }}" class="mt-1 rounded border-gray-300 text-[#14166e]" @checked(in_array($option, old('job_statuses', []), true))>
                                            <span>{{ $option }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                            <div>
                                <span class="block font-[Poppins] text-sm font-semibold text-[#202124]">Job Preference (What type of work are you looking for?)</span>
                                <div class="mt-3 space-y-2">
                                    @foreach ($resumeForm['job_preference_options'] ?? [] as $option)
                                        <label class="flex items-start gap-2 text-sm text-[#202124]">
                                            <input type="checkbox" name="job_preferences[]" value="{{ $option }}" class="mt-1 rounded border-gray-300 text-[#14166e]" @checked(in_array($option, old('job_preferences', []), true))>
                                            <span>{{ $option }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div>
                            <span class="block font-[Poppins] text-sm font-semibold text-[#202124]">Relocation</span>
                            <label class="mt-3 flex items-start gap-2 text-sm text-[#202124]">
                                <input type="hidden" name="willing_to_relocate" value="0">
                                <input type="checkbox" name="willing_to_relocate" value="1" class="mt-1 rounded border-gray-300 text-[#14166e]" @checked(old('willing_to_relocate'))>
                                <span>{{ $resumeForm['relocation_label'] ?? 'I am willing to relocate.' }}</span>
                            </label>
                        </div>

                        @for ($index = 0; $index < $employmentGroups; $index++)
                            <div class="grid gap-5 border-t border-gray-200 pt-5 md:grid-cols-2">
                                <div class="md:col-span-2">
                                    <label for="employment_history_{{ $index }}_company_name" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Company Name</label>
                                    <input id="employment_history_{{ $index }}_company_name" name="employment_history[{{ $index }}][company_name]" type="text" value="{{ old("employment_history.$index.company_name") }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                                </div>
                                <div>
                                    <label for="employment_history_{{ $index }}_start_date" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Start Date:</label>
                                    <input id="employment_history_{{ $index }}_start_date" name="employment_history[{{ $index }}][start_date]" type="text" placeholder="mm/dd/yyyy" value="{{ old("employment_history.$index.start_date") }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                                </div>
                                <div>
                                    <label for="employment_history_{{ $index }}_end_date" class="block font-[Poppins] text-sm font-semibold text-[#202124]">End Date:</label>
                                    <input id="employment_history_{{ $index }}_end_date" name="employment_history[{{ $index }}][end_date]" type="text" placeholder="mm/dd/yyyy" value="{{ old("employment_history.$index.end_date") }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                                </div>
                                <div>
                                    <label for="employment_history_{{ $index }}_job_title" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Job Title</label>
                                    <input id="employment_history_{{ $index }}_job_title" name="employment_history[{{ $index }}][job_title]" type="text" value="{{ old("employment_history.$index.job_title") }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                                </div>
                                <div>
                                    <label for="employment_history_{{ $index }}_responsibilities" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Accomplishments and Responsibilities</label>
                                    <input id="employment_history_{{ $index }}_responsibilities" name="employment_history[{{ $index }}][responsibilities]" type="text" value="{{ old("employment_history.$index.responsibilities") }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                                </div>
                            </div>
                        @endfor

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label for="city" class="block font-[Poppins] text-sm font-semibold text-[#202124]">City:</label>
                                <input id="city" name="city" type="text" value="{{ old('city') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="state" class="block font-[Poppins] text-sm font-semibold text-[#202124]">State:</label>
                                <input id="state" name="state" type="text" value="{{ old('state') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="zip" class="block font-[Poppins] text-sm font-semibold text-[#202124]">Zip:</label>
                                <input id="zip" name="zip" type="text" value="{{ old('zip') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="us_region" class="block font-[Poppins] text-sm font-semibold text-[#202124]">US Region:</label>
                                <input id="us_region" name="us_region" type="text" value="{{ old('us_region') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="inline-flex w-full items-center justify-center rounded bg-[#14166e] px-6 py-4 font-[Fragment_Mono] text-sm font-semibold uppercase tracking-wide text-white transition hover:bg-[#0f1156] md:w-auto">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            @else
                @if ($errors->any())
                    <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm text-red-800">
                        <ul class="list-disc space-y-1 ps-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="space-y-6 rounded-[20px] border border-gray-200 bg-white p-5 shadow-[0_0_3px_rgba(0,0,0,0.5)] md:p-8">
                    <div>
                        <h2 class="font-[Fragment_Mono] text-[30px] font-semibold text-black">{{ $guestState['heading'] ?? $page->title }}</h2>
                        <p class="mt-4 font-[Roboto] text-[15px] leading-[1.8] text-black">{{ $guestState['message'] ?? '' }}</p>
                        <a href="{{ route('login', ['redirect_to' => $redirectTo]) }}" class="mt-4 inline-flex rounded bg-[#14166e] px-5 py-3 text-sm font-medium text-white transition hover:bg-[#0f1156]">
                            Sign In
                        </a>
                    </div>

                    <form method="POST" action="{{ route('register') }}" class="space-y-5">
                        @csrf
                        <input type="hidden" name="redirect_to" value="{{ $redirectTo }}">

                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label for="first_name" class="block text-sm font-semibold text-[#202124]">First Name *</label>
                                <input id="first_name" name="first_name" type="text" value="{{ old('first_name') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="last_name" class="block text-sm font-semibold text-[#202124]">Last Name *</label>
                                <input id="last_name" name="last_name" type="text" value="{{ old('last_name') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="user_email" class="block text-sm font-semibold text-[#202124]">Email *</label>
                                <input id="user_email" name="user_email" type="email" value="{{ old('user_email', old('email')) }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="company" class="block text-sm font-semibold text-[#202124]">Present or Former Company Name:</label>
                                <input id="company" name="company" type="text" value="{{ old('company') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="industry" class="block text-sm font-semibold text-[#202124]">Industry *</label>
                                <select id="industry" name="industry" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm">
                                    @foreach ($guestIndustries as $option)
                                        <option value="{{ $option }}" @selected(old('industry', $guestIndustries[0]) === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="company_division" class="block text-sm font-semibold text-[#202124]">Company Division:</label>
                                <input id="company_division" name="company_division" type="text" value="{{ old('company_division') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="title" class="block text-sm font-semibold text-[#202124]">Title:</label>
                                <input id="title" name="title" type="text" value="{{ old('title', old('job_title')) }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="title_code" class="block text-sm font-semibold text-[#202124]">Title Code:</label>
                                <select id="title_code" name="title_code" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm">
                                    @foreach ($guestTitleCodes as $option)
                                        <option value="{{ $option }}" @selected(old('title_code', $guestTitleCodes[0]) === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="address_line_1" class="block text-sm font-semibold text-[#202124]">Address Line 1 *</label>
                                <input id="address_line_1" name="address_line_1" type="text" value="{{ old('address_line_1') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="address_line_2" class="block text-sm font-semibold text-[#202124]">Address Line 2:</label>
                                <input id="address_line_2" name="address_line_2" type="text" value="{{ old('address_line_2') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="country" class="block text-sm font-semibold text-[#202124]">Country</label>
                                <select id="country" name="country" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm">
                                    @foreach ($guestCountries as $option)
                                        <option value="{{ $option }}" @selected(old('country', $guestCountries[0]) === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="phone_number" class="block text-sm font-semibold text-[#202124]">Phone Number *</label>
                                <input id="phone_number" name="phone_number" type="text" value="{{ old('phone_number', old('phone')) }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="fax_number" class="block text-sm font-semibold text-[#202124]">Fax Number:</label>
                                <input id="fax_number" name="fax_number" type="text" value="{{ old('fax_number') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="user_login" class="block text-sm font-semibold text-[#202124]">Username *</label>
                                <input id="user_login" name="user_login" type="text" value="{{ old('user_login') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="user_pass" class="block text-sm font-semibold text-[#202124]">User Password *</label>
                                <input id="user_pass" name="user_pass" type="password" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="user_confirm_password" class="block text-sm font-semibold text-[#202124]">Confirm Password *</label>
                                <input id="user_confirm_password" name="user_confirm_password" type="password" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                            <div>
                                <label for="security_question" class="block text-sm font-semibold text-[#202124]">Security Questions</label>
                                <select id="security_question" name="security_question" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm">
                                    <option value="">select</option>
                                    @foreach ($guestSecurityQuestions as $option)
                                        <option value="{{ $option }}" @selected(old('security_question') === $option)>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="security_answer" class="block text-sm font-semibold text-[#202124]">Answer</label>
                                <input id="security_answer" name="security_answer" type="text" value="{{ old('security_answer') }}" class="mt-2 w-full rounded border border-gray-300 px-4 py-3 text-sm" />
                            </div>
                        </div>

                        <button type="submit" class="inline-flex rounded bg-[#14166e] px-6 py-3 text-sm font-medium text-white transition hover:bg-[#0f1156]">
                            Create Account
                        </button>
                    </form>
                </div>
            @endauth
        </div>
    </section>
</x-layouts.cms>
