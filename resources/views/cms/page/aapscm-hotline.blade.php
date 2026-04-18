<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $heroHeading  = $page->page_data['hero_heading'] ?? $page->title;
        $hotline      = $page->page_data['hotline']      ?? [];
        $emailLine    = $page->page_data['email_line_html'] ?? '';
        $terms        = $page->page_data['terms']        ?? [];
        $form         = $page->page_data['form']         ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero heading band --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h2 class="text-[32px] md:text-[40px] font-semibold text-[#14166e] leading-tight">
                {{ $heroHeading }}
            </h2>
        </div>
    </section>

    {{-- Exam Incidents Hotline body --}}
    <section class="bg-white py-14">
        <div class="max-w-[1000px] mx-auto px-4">
            @if (! empty($hotline['subheading']))
                <h3 class="text-[20px] md:text-[22px] font-semibold text-[#14166e] mb-5">
                    {{ $hotline['subheading'] }}
                </h3>
            @endif

            @if (! empty($hotline['lead_body']))
                <p class="text-[16px] text-gray-700 leading-relaxed mb-5">
                    {{ $hotline['lead_body'] }}
                </p>
            @endif

            @if (! empty($hotline['sub_lead_body']))
                <p class="text-[16px] text-gray-700 leading-relaxed mb-6">
                    {{ $hotline['sub_lead_body'] }}
                </p>
            @endif

            @if (! empty($hotline['incidents']))
                <ul class="space-y-3 mb-6">
                    @foreach ($hotline['incidents'] as $item)
                        <li class="flex items-start gap-3 text-[15px] text-gray-700 leading-relaxed">
                            <svg class="w-5 h-5 text-[#14166e] flex-shrink-0 mt-[2px]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                            <span>{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>
            @endif

            @if (! empty($hotline['cta_body']))
                <p class="text-[16px] text-gray-700 leading-relaxed">
                    {{ $hotline['cta_body'] }}
                </p>
            @endif
        </div>
    </section>

    {{-- Email heading band --}}
    @if ($emailLine)
        <section class="bg-[#f6f8fb] py-10">
            <div class="max-w-[1000px] mx-auto px-4 text-center">
                <h2 class="text-[22px] md:text-[26px] text-[#14166e] leading-snug">
                    {!! $emailLine !!}
                </h2>
            </div>
        </section>
    @endif

    {{-- Incident report form --}}
    @if (! empty($form))
        <section class="bg-white py-14">
            <div class="max-w-[820px] mx-auto px-4">
                <div class="bg-white border border-gray-200 rounded-lg p-8 md:p-10 shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px]">
                    @if (! empty($form['heading']))
                        <h3 class="text-[22px] font-semibold text-[#14166e] mb-3 text-center">{{ $form['heading'] }}</h3>
                    @endif
                    @if (! empty($form['description']))
                        <p class="text-[15px] text-gray-600 text-center mb-8">{{ $form['description'] }}</p>
                    @endif

                    <form method="post" action="#" class="space-y-5">
                        @csrf
                        <div>
                            <p class="text-sm font-medium text-gray-700 mb-2">Do you wish to remain anonymous?</p>
                            <label class="inline-flex items-center gap-2 mr-6 text-sm text-gray-700">
                                <input type="radio" name="anonymous" value="yes" class="border-gray-300 text-[#14166e] focus:ring-[#14166e]"> Yes
                            </label>
                            <label class="inline-flex items-center gap-2 text-sm text-gray-700">
                                <input type="radio" name="anonymous" value="no" class="border-gray-300 text-[#14166e] focus:ring-[#14166e]"> No
                            </label>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <label class="block">
                                <span class="block text-sm font-medium text-gray-700 mb-1">First Name</span>
                                <input type="text" name="first_name" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-[#14166e] focus:border-[#14166e]">
                            </label>
                            <label class="block">
                                <span class="block text-sm font-medium text-gray-700 mb-1">Last Name</span>
                                <input type="text" name="last_name" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-[#14166e] focus:border-[#14166e]">
                            </label>
                            <label class="block">
                                <span class="block text-sm font-medium text-gray-700 mb-1">User Email <span class="text-red-500">*</span></span>
                                <input type="email" name="email" required class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-[#14166e] focus:border-[#14166e]">
                            </label>
                            <label class="block">
                                <span class="block text-sm font-medium text-gray-700 mb-1">Phone Number</span>
                                <input type="tel" name="phone" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-[#14166e] focus:border-[#14166e]">
                            </label>
                            <label class="block">
                                <span class="block text-sm font-medium text-gray-700 mb-1">Date of Birth</span>
                                <input type="date" name="dob" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-[#14166e] focus:border-[#14166e]">
                            </label>
                        </div>

                        <label class="block">
                            <span class="block text-sm font-medium text-gray-700 mb-1">Summary of Incident</span>
                            <textarea name="summary" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-[#14166e] focus:border-[#14166e]"></textarea>
                        </label>

                        <label class="block">
                            <span class="block text-sm font-medium text-gray-700 mb-1">Business Name and Address of Incident</span>
                            <textarea name="business" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-[#14166e] focus:border-[#14166e]"></textarea>
                        </label>

                        <label class="flex items-start gap-2 text-sm text-gray-700">
                            <input type="checkbox" name="agree" required class="mt-1 border-gray-300 text-[#14166e] focus:ring-[#14166e]">
                            <span>I agree to the Terms of Use &amp; Privacy statement.</span>
                        </label>

                        <button type="submit" class="bg-[#14166e] text-white font-semibold text-sm px-6 py-2.5 rounded hover:bg-[#0f1159] transition-colors">
                            Submit
                        </button>
                    </form>
                </div>
            </div>
        </section>
    @endif

    {{-- Terms and conditions --}}
    @if (! empty($terms))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[1000px] mx-auto px-4">
                @if (! empty($terms['heading']))
                    <h2 class="text-[24px] md:text-[28px] font-semibold text-[#14166e] mb-6">
                        {{ $terms['heading'] }}
                    </h2>
                @endif

                @if (! empty($terms['items']))
                    <ul class="space-y-3">
                        @foreach ($terms['items'] as $item)
                            <li class="flex items-start gap-3 text-[15px] text-gray-700 leading-relaxed">
                                <svg class="w-5 h-5 text-[#14166e] flex-shrink-0 mt-[2px]" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                <span>{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    @endif

</x-layouts.cms>
