@php
    $data           = $page->page_data ?? [];
    $heroHeading    = $data['hero_heading']    ?? 'Contact Us';
    $intro          = $data['intro']           ?? [];
    $supportHeading = $data['support_heading'] ?? '';
    $channels       = $data['channels']        ?? [];
    $formHeading    = $data['form_heading']    ?? 'Send Me Message';
    $getInTouch     = $data['get_in_touch']    ?? [];
    $locations      = $getInTouch['locations'] ?? [];
@endphp

<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    {{-- Theme title band (Qode/Eltdf parity) --}}
    <x-cms.eltdf-title-bar
        title="Contact Us"
        :breadcrumbs="[['label' => 'Contact Us']]"
    />

    {{-- §1 Hero word-mark --}}
    <section class="py-10 bg-white">
        <div class="max-w-[1100px] mx-auto px-4 text-center">
            <h3 class="text-[#14166e] text-[28px] md:text-[34px] font-light tracking-[0.15em] uppercase">
                {{ $heroHeading }}
            </h3>
        </div>
    </section>

    {{-- §2 Intro: image + get-in-touch copy --}}
    <section class="py-16">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                @if (! empty($intro['image']))
                    <img
                        src="{{ $intro['image'] }}"
                        alt=""
                        class="w-full h-auto"
                        loading="lazy"
                    />
                @endif
            </div>
            <div>
                <h3 class="text-[30px] leading-tight text-[#14166e] font-semibold mb-4">
                    {{ $intro['heading'] ?? 'Get in touch' }}
                </h3>
                @if (! empty($intro['subheading']))
                    <p class="text-[15px] leading-relaxed text-gray-700 mb-6">
                        {{ $intro['subheading'] }}
                    </p>
                @endif
                @if (! empty($intro['cta']))
                    <a
                        href="{{ $intro['cta']['url'] }}"
                        class="inline-flex items-center gap-2 px-5 py-2.5 bg-[#14166e] text-white text-sm rounded hover:bg-[#0f1159] transition-colors"
                    >
                        <span>{{ $intro['cta']['label'] }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 448 512" fill="currentColor" aria-hidden="true"><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>
                    </a>
                @endif
            </div>
        </div>
    </section>

    {{-- §3 Support heading + channel cards --}}
    <section class="py-16 bg-[#fef5ef]">
        <div class="max-w-[1100px] mx-auto px-4">
            @if (! empty($supportHeading))
                <h2 class="text-center text-[28px] md:text-[32px] font-semibold text-[#14166e] mb-12">
                    {!! $supportHeading !!}
                </h2>
            @endif

            <div class="grid md:grid-cols-2 gap-8">
                @foreach ($channels as $channel)
                    <div class="bg-white rounded-md shadow-[0_7px_29px_rgba(100,100,111,0.2)] px-8 py-10 flex flex-col items-center text-center">
                        @if (! empty($channel['icon']))
                            <img
                                src="{{ $channel['icon'] }}"
                                width="128"
                                height="128"
                                alt=""
                                loading="lazy"
                                class="mb-6"
                            />
                        @endif

                        <h2 class="text-[24px] font-semibold text-[#14166e] mb-3">
                            {{ $channel['title'] ?? '' }}
                        </h2>

                        @if (! empty($channel['lede']))
                            <p class="text-[15px] text-gray-700 font-medium mb-3">
                                {{ $channel['lede'] }}
                            </p>
                        @endif

                        @if (! empty($channel['body_html']))
                            <div class="text-[15px] leading-relaxed text-gray-700 mb-4 space-y-3">
                                {!! $channel['body_html'] !!}
                            </div>
                        @endif

                        @if (! empty($channel['features_heading']))
                            <h3 class="text-[18px] font-semibold text-[#14166e] mt-2 mb-3 self-start">
                                {{ $channel['features_heading'] }}
                            </h3>
                        @endif

                        @if (! empty($channel['features']))
                            <ul class="w-full space-y-2 text-left">
                                @foreach ($channel['features'] as $feature)
                                    <li class="flex items-start gap-2 text-[15px] text-gray-700">
                                        <span class="shrink-0 mt-1 text-[#14166e]" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512" fill="currentColor"><path d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zM227.3 387.3l184-184c6.2-6.2 6.2-16.4 0-22.6l-22.6-22.6c-6.2-6.2-16.4-6.2-22.6 0L216 308.1l-70.1-70.1c-6.2-6.2-16.4-6.2-22.6 0l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6l104 104c6.2 6.3 16.4 6.3 22.6 0z"/></svg>
                                        </span>
                                        <span>{{ $feature }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif

                        @if (! empty($channel['trailing_body_html']))
                            <div class="text-[15px] leading-relaxed text-gray-700 mt-5 self-start text-left">
                                {!! $channel['trailing_body_html'] !!}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- §4 Form + Get In Touch addresses --}}
    <section class="py-16">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10">
            {{-- Contact form --}}
            <div>
                <h2 class="text-[26px] font-semibold text-[#14166e] mb-6">
                    {{ $formHeading }}
                </h2>
                <form action="#" method="post" class="space-y-4">
                    @csrf
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label for="contact-name" class="sr-only">Name</label>
                            <input
                                id="contact-name"
                                name="name"
                                type="text"
                                placeholder="Name"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#14166e]"
                            />
                        </div>
                        <div>
                            <label for="contact-email" class="sr-only">Email</label>
                            <input
                                id="contact-email"
                                name="email"
                                type="email"
                                placeholder="Email"
                                required
                                class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#14166e]"
                            />
                        </div>
                    </div>
                    <div>
                        <label for="contact-subject" class="sr-only">Subject</label>
                        <input
                            id="contact-subject"
                            name="subject"
                            type="text"
                            placeholder="Subject"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#14166e]"
                        />
                    </div>
                    <div>
                        <label for="contact-message" class="sr-only">Message</label>
                        <textarea
                            id="contact-message"
                            name="message"
                            rows="5"
                            placeholder="Message"
                            required
                            class="w-full px-4 py-3 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-[#14166e]"
                        ></textarea>
                    </div>
                    <div>
                        <button
                            type="submit"
                            class="px-6 py-3 bg-[#14166e] text-white text-sm rounded hover:bg-[#0f1159] transition-colors"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>

            {{-- Locations + email --}}
            <div>
                <h2 class="text-[26px] font-semibold text-[#14166e] mb-6">
                    {{ $getInTouch['heading'] ?? 'Get In Touch' }}
                </h2>

                <div class="space-y-8">
                    @foreach ($locations as $loc)
                        <div>
                            <h3 class="text-[18px] font-semibold text-[#14166e] mb-3">
                                {{ $loc['name'] ?? '' }}
                            </h3>
                            <ul class="space-y-2 text-[15px] text-gray-700">
                                @if (! empty($loc['address']))
                                    <li class="flex items-start gap-2">
                                        <span class="shrink-0 mt-1 text-[#14166e]" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="16" viewBox="0 0 384 512" fill="currentColor"><path d="M215.7 499.2C267 435 384 279.4 384 192 384 86 298 0 192 0S0 86 0 192c0 87.4 117 243 168.3 307.2 12.3 15.3 35.1 15.3 47.4 0zM192 128a64 64 0 1 1 0 128 64 64 0 1 1 0-128z"/></svg>
                                        </span>
                                        <span>{{ $loc['address'] }}</span>
                                    </li>
                                @endif
                                @if (! empty($loc['phone']))
                                    <li class="flex items-start gap-2">
                                        <span class="shrink-0 mt-1 text-[#14166e]" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512" fill="currentColor"><path d="M164.9 24.6c-7.7-18.6-28-28.5-47.4-23.2l-88 24C12.1 30.2 0 46 0 64C0 311.4 200.6 512 448 512c18 0 33.8-12.1 38.6-29.5l24-88c5.3-19.4-4.6-39.7-23.2-47.4l-96-40c-16.3-6.8-35.2-2.1-46.3 11.6L304.7 368C234.3 334.7 177.3 277.7 144 207.3L193.3 167c13.7-11.2 18.4-30 11.6-46.3l-40-96z"/></svg>
                                        </span>
                                        <a href="tel:{{ preg_replace('/[^0-9+]/', '', $loc['phone']) }}" class="hover:text-[#14166e]">{{ $loc['phone'] }}</a>
                                    </li>
                                @endif
                                @if (! empty($loc['fax']))
                                    <li class="flex items-start gap-2">
                                        <span class="shrink-0 mt-1 text-[#14166e]" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512" fill="currentColor"><path d="M128 64h320v128H128V64zM64 64c0-35.3 28.7-64 64-64h320c35.3 0 64 28.7 64 64v128c35.3 0 64 28.7 64 64v176c0 17.7-14.3 32-32 32H448v48c0 17.7-14.3 32-32 32H160c-17.7 0-32-14.3-32-32v-48H32c-17.7 0-32-14.3-32-32V256c0-35.3 28.7-64 64-64V64zm384 320v96H160v-96h288z"/></svg>
                                        </span>
                                        <span>{{ $loc['fax'] }}</span>
                                    </li>
                                @endif
                                @if (! empty($loc['email_html']))
                                    <li class="flex items-start gap-2">
                                        <span class="shrink-0 mt-1 text-[#14166e]" aria-hidden="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512" fill="currentColor"><path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z"/></svg>
                                        </span>
                                        <span>{!! $loc['email_html'] !!}</span>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

</x-layouts.cms>
