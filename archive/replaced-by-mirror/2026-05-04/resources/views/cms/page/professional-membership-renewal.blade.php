<x-layouts.cms>
    <x-cms.seo-head :page="$page" />

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    @php
        $data     = $page->page_data ?? [];
        $hero     = $data['hero'] ?? [];
        $whyRenew = $data['why_renew'] ?? [];
        $form     = $data['form'] ?? [];
        $support  = $data['support'] ?? [];
        $heroImageExists = ! empty($hero['image']) && file_exists(public_path(ltrim($hero['image'], '/')));
    @endphp

    {{-- Hero --}}
    @if (! empty($hero))
    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                @if (! empty($hero['heading_html']))
                <h2 class="text-[28px] md:text-[40px] font-bold text-[#14166e] leading-tight mb-4">{!! $hero['heading_html'] !!}</h2>
                @endif
                @if (! empty($hero['subheading']))
                <h2 class="text-[20px] md:text-[24px] font-semibold text-[#0B2F5E] mb-5">{{ $hero['subheading'] }}</h2>
                @endif
                @if (! empty($hero['text']))
                <p class="text-[15px] md:text-[16px] text-gray-700 leading-relaxed mb-5">{{ $hero['text'] }}</p>
                @endif
                @if (! empty($hero['fee_html']))
                <p class="text-[16px] md:text-[18px] text-[#14166e] mb-6">{!! $hero['fee_html'] !!}</p>
                @endif
                @if (! empty($hero['button_text']))
                @isset($ctaProduct)
                <x-add-to-cart-button :product="$ctaProduct" :label="$hero['button_text']" />
                @else
                <a href="{{ $hero['button_url'] ?? '#' }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[15px] px-7 py-3 rounded transition">
                    {{ $hero['button_text'] }}
                </a>
                @endisset
                @endif
            </div>
            @if ($heroImageExists)
            <div class="flex justify-center">
                <img src="{{ $hero['image'] }}" alt="Professional Membership Renewal" class="w-full max-w-[500px] h-auto" />
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Why Renew --}}
    @if (! empty($whyRenew))
    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[1200px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
            <div>
                @if (! empty($whyRenew['heading_html']))
                <h2 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-4 leading-tight">{!! $whyRenew['heading_html'] !!}</h2>
                @endif
                @if (! empty($whyRenew['subtitle']))
                <p class="text-[16px] md:text-[18px] text-gray-700 mb-6">{{ $whyRenew['subtitle'] }}</p>
                @endif
                @if (! empty($whyRenew['button_text']))
                <a href="{{ $whyRenew['button_url'] ?? '#' }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[15px] px-7 py-3 rounded transition">
                    {{ $whyRenew['button_text'] }}
                </a>
                @endif
            </div>

            @if (! empty($whyRenew['items']))
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                @foreach ($whyRenew['items'] as $item)
                @php $iconExists = ! empty($item['icon']) && file_exists(public_path(ltrim($item['icon'], '/'))); @endphp
                <div class="bg-white rounded-lg p-6 text-center shadow-sm border border-gray-100">
                    @if ($iconExists)
                    <img src="{{ $item['icon'] }}" alt="{{ $item['title'] ?? '' }}" class="w-16 h-16 mx-auto mb-4 object-contain" />
                    @else
                    <div class="w-16 h-16 mx-auto mb-4 rounded-full bg-[#f0b323]/20 flex items-center justify-center">
                        <svg class="w-8 h-8 text-[#14166e]" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    @endif
                    <h3 class="text-[16px] md:text-[18px] font-bold text-[#14166e] mb-2">{{ $item['title'] ?? '' }}</h3>
                    <p class="text-[14px] text-gray-700 leading-relaxed">{{ $item['text'] ?? '' }}</p>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </section>
    @endif

    {{-- Membership Renewal Form --}}
    @if (! empty($form))
    <section class="bg-white py-14">
        <div class="max-w-[900px] mx-auto px-4">
            @if (! empty($form['heading']))
            <h2 class="text-[26px] md:text-[34px] font-bold text-[#14166e] mb-2 text-center">{{ $form['heading'] }}</h2>
            @endif
            @if (! empty($form['subheading']))
            <h3 class="text-[18px] md:text-[20px] text-gray-700 mb-8 text-center">{{ $form['subheading'] }}</h3>
            @endif

            <form action="/professional-membership-renewal/" method="post" class="space-y-8">
                @csrf
                @if (! empty($form['sections']))
                @foreach ($form['sections'] as $section)
                <div>
                    <h4 class="text-[16px] md:text-[18px] font-bold text-[#14166e] uppercase tracking-wide border-b border-gray-200 pb-2 mb-5">
                        {{ $section['title'] ?? '' }}
                    </h4>

                    @if ($section['title'] === 'MEMBERSHIP RENEWAL PAYMENT' && ! empty($form['fee_text']))
                    <p class="text-[16px] md:text-[18px] font-semibold text-[#14166e] mb-4">{{ $form['fee_text'] }}</p>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        @foreach ($section['fields'] ?? [] as $field)
                        <div class="@if (($field['type'] ?? '') === 'radio') md:col-span-2 @endif">
                            <label class="block text-[14px] font-semibold text-[#14166e] mb-2">{{ $field['label'] ?? '' }}</label>
                            @if (($field['type'] ?? '') === 'radio')
                                <div class="flex flex-wrap gap-4">
                                    @foreach ($field['options'] ?? [] as $opt)
                                    <label class="inline-flex items-center gap-2 text-[14px] text-gray-700">
                                        <input type="radio" name="{{ $field['name'] }}" value="{{ $opt }}" class="text-[#14166e] focus:ring-[#14166e]" @if (! empty($field['required'])) required @endif />
                                        <span>{{ $opt }}</span>
                                    </label>
                                    @endforeach
                                </div>
                            @else
                                <input type="{{ $field['type'] ?? 'text' }}" name="{{ $field['name'] }}" @if (! empty($field['required'])) required @endif class="w-full border border-gray-300 rounded px-3 py-2 text-[14px] focus:outline-none focus:ring-2 focus:ring-[#14166e]" />
                            @endif
                        </div>
                        @endforeach
                    </div>

                    @if ($section['title'] === 'MEMBERSHIP RENEWAL PAYMENT' && ! empty($form['checkout_url']))
                    <div class="mt-6">
                        @isset($ctaProduct)
                        <x-add-to-cart-button :product="$ctaProduct" :label="$form['checkout_text'] ?? 'Renew Your Membership'" />
                        @else
                        <a href="{{ $form['checkout_url'] }}" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[15px] px-7 py-3 rounded transition">
                            {{ $form['checkout_text'] ?? 'Renew Your Membership' }}
                        </a>
                        @endisset
                    </div>
                    @endif
                </div>
                @endforeach
                @endif

                @if (! empty($form['consent']))
                <div>
                    <label class="inline-flex items-start gap-3 text-[14px] text-gray-700">
                        <input type="checkbox" name="consent" value="1" class="mt-1 text-[#14166e] focus:ring-[#14166e]" />
                        <span>{{ $form['consent'] }}</span>
                    </label>
                </div>
                @endif

                <div>
                    <button type="submit" class="inline-block bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[15px] px-8 py-3 rounded transition">
                        {{ $form['submit_text'] ?? 'Renew Membership Now' }}
                    </button>
                </div>
            </form>

            {{-- Support --}}
            @if (! empty($support))
            <div class="mt-10 pt-8 border-t border-gray-200">
                @if (! empty($support['heading_html']))
                <p class="text-[15px] text-gray-700 leading-relaxed mb-4">{!! $support['heading_html'] !!}</p>
                @endif
                <ul class="space-y-2">
                    @if (! empty($support['email']))
                    <li class="flex items-center gap-3 text-[15px] text-gray-700">
                        <svg class="w-5 h-5 text-[#14166e]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                        <span><strong>Email</strong>: <a href="mailto:{{ $support['email'] }}" class="text-[#14166e] hover:underline">{{ $support['email'] }}</a></span>
                    </li>
                    @endif
                    @if (! empty($support['phone']))
                    <li class="flex items-center gap-3 text-[15px] text-gray-700">
                        <svg class="w-5 h-5 text-[#14166e]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2.28a2 2 0 011.94 1.515l.7 2.79a2 2 0 01-.51 1.91L8.09 10.91a16 16 0 005 5l1.695-1.32a2 2 0 011.91-.51l2.79.7A2 2 0 0121 16.72V19a2 2 0 01-2 2A16 16 0 013 5z" /></svg>
                        <span><strong>Phone</strong>: {{ $support['phone'] }}</span>
                    </li>
                    @endif
                </ul>
            </div>
            @endif
        </div>
    </section>
    @endif
</x-layouts.cms>
