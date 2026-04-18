<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $heroHeading  = $page->page_data['hero_heading']   ?? $page->title;
        $dedication   = $page->page_data['dedication']     ?? [];
        $benefits     = $page->page_data['benefits']       ?? [];
        $emailCta     = $page->page_data['email_cta']      ?? [];
        $form         = $page->page_data['form']           ?? [];
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    {{-- Hero heading band --}}
    <section class="bg-[#fef5ef] py-14">
        <div class="max-w-[900px] mx-auto px-4 text-center">
            <h2 class="text-[30px] md:text-[36px] font-semibold text-[#14166e] leading-tight">
                {{ $heroHeading }}
            </h2>
        </div>
    </section>

    {{-- Dedication --}}
    @if (! empty($dedication))
        <section class="bg-white py-14">
            <div class="max-w-[960px] mx-auto px-4">
                @if (! empty($dedication['heading']))
                    <h3 class="text-[24px] md:text-[28px] font-semibold text-[#14166e] mb-5">
                        {{ $dedication['heading'] }}
                    </h3>
                @endif

                @foreach (($dedication['paragraphs'] ?? []) as $paragraph)
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-5">{{ $paragraph }}</p>
                @endforeach
            </div>
        </section>
    @endif

    {{-- Benefits --}}
    @if (! empty($benefits))
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[960px] mx-auto px-4">
                @if (! empty($benefits['heading']))
                    <h3 class="text-[24px] md:text-[28px] font-semibold text-[#14166e] mb-6">
                        {{ $benefits['heading'] }}
                    </h3>
                @endif

                <ul class="space-y-4">
                    @foreach (($benefits['items'] ?? []) as $item)
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-[#14166e] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-[15px] text-gray-800 leading-relaxed">
                                @if (! empty($item['lead']))
                                    <strong class="text-[#14166e]">{{ $item['lead'] }}@if (! empty($item['body'])):@endif</strong>
                                @endif
                                @if (! empty($item['body']))
                                    {{ $item['body'] }}
                                @endif
                            </p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endif

    {{-- Email CTA + extra perks --}}
    @if (! empty($emailCta))
        <section class="bg-white py-14">
            <div class="max-w-[960px] mx-auto px-4 text-center">
                @if (! empty($emailCta['lead_html']))
                    <h3 class="text-[20px] md:text-[24px] font-semibold text-[#14166e] leading-relaxed mb-6 [&_a]:underline hover:[&_a]:text-[#0f1159]">
                        {!! $emailCta['lead_html'] !!}
                    </h3>
                @endif

                @if (! empty($emailCta['extra_items']))
                    <ul class="max-w-[720px] mx-auto text-left space-y-3">
                        @foreach ($emailCta['extra_items'] as $extra)
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#14166e] flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-[15px] text-gray-800 leading-relaxed">{!! $extra !!}</span>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </section>
    @endif

    {{-- Registration form --}}
    @if (! empty($form))
        <section class="bg-[#fef5ef] py-14">
            <div class="max-w-[1080px] mx-auto px-4">
                <div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] p-8 md:p-12">
                    @if (! empty($form['heading']))
                        <h3 class="text-[24px] md:text-[28px] font-semibold text-[#14166e] mb-2 text-center">
                            {{ $form['heading'] }}
                        </h3>
                    @endif

                    @if (! empty($form['description']))
                        <p class="text-[15px] text-gray-600 leading-relaxed text-center max-w-[760px] mx-auto mb-8">
                            {{ $form['description'] }}
                        </p>
                    @endif

                    <form method="post" action="#" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="user_login" class="block text-[14px] font-medium text-[#14166e] mb-1">Username</label>
                            <input type="text" id="user_login" name="user_login" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="first_name" class="block text-[14px] font-medium text-[#14166e] mb-1">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="user_pass" class="block text-[14px] font-medium text-[#14166e] mb-1">User Password <span class="text-red-600">*</span></label>
                            <input type="password" id="user_pass" name="user_pass" required class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="last_name" class="block text-[14px] font-medium text-[#14166e] mb-1">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="user_email" class="block text-[14px] font-medium text-[#14166e] mb-1">User Email <span class="text-red-600">*</span></label>
                            <input type="email" id="user_email" name="user_email" required class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="role" class="block text-[14px] font-medium text-[#14166e] mb-1">Role</label>
                            <input type="text" id="role" name="role" maxlength="20" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="city" class="block text-[14px] font-medium text-[#14166e] mb-1">City</label>
                            <input type="text" id="city" name="city" maxlength="20" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="country" class="block text-[14px] font-medium text-[#14166e] mb-1">Country</label>
                            <select id="country" name="country" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] bg-white focus:outline-none focus:border-[#14166e]">
                                <option value="">Select country…</option>
                                <option value="US">United States (US)</option>
                                <option value="GB">United Kingdom (UK)</option>
                                <option value="CA">Canada</option>
                                <option value="AU">Australia</option>
                                <option value="NG">Nigeria</option>
                                <option value="IN">India</option>
                                <option value="ZA">South Africa</option>
                                <option value="GH">Ghana</option>
                                <option value="KE">Kenya</option>
                            </select>
                        </div>

                        <div>
                            <label for="organization" class="block text-[14px] font-medium text-[#14166e] mb-1">Organization &amp; Institution</label>
                            <input type="text" id="organization" name="organization" maxlength="50" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="partner_type" class="block text-[14px] font-medium text-[#14166e] mb-1">Partner Type</label>
                            <select id="partner_type" name="partner_type" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] bg-white focus:outline-none focus:border-[#14166e]">
                                <option value="Academic Partner">Academic Partner</option>
                                <option value="Delivery Partner">Delivery Partner</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label for="assist" class="block text-[14px] font-medium text-[#14166e] mb-1">How may AAPSCM assist you?</label>
                            <textarea id="assist" name="assist" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]"></textarea>
                        </div>

                        <div class="md:col-span-2 text-center pt-2">
                            <button type="submit" class="bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[15px] px-10 py-3 rounded transition">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endif

</x-layouts.cms>
