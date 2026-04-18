<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $heroImage   = $page->page_data['hero_image']   ?? null;
        $heroHeading = $page->page_data['hero_heading'] ?? $page->title;
        $intro       = $page->page_data['intro']        ?? '';
        $submitLabel = $page->page_data['form']['submit_label'] ?? 'Submit Now';
    @endphp

    <x-cms.eltdf-title-bar
        :title="$page->title"
        :breadcrumbs="[['label' => $page->title]]"
    />

    <section class="bg-white py-14">
        <div class="max-w-[1200px] mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">

                {{-- Left: hero image --}}
                @if ($heroImage)
                    <div class="order-2 md:order-1">
                        <img src="{{ $heroImage }}" alt="{{ $page->title }}" class="w-full h-auto rounded" />
                    </div>
                @endif

                {{-- Right: heading + form --}}
                <div class="order-1 md:order-2">
                    <h2 class="text-[32px] md:text-[40px] font-light text-[#14166e] leading-tight mb-6">
                        {!! $heroHeading !!}
                    </h2>

                    @if ($intro)
                        <p class="text-[15px] text-gray-700 leading-relaxed mb-6">{{ $intro }}</p>
                    @endif

                    <form method="post" action="#" enctype="multipart/form-data" class="space-y-4">
                        <div>
                            <input type="text" name="name" placeholder="Name*" maxlength="400" required
                                class="w-full border border-gray-300 rounded px-4 py-3 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <input type="email" name="email" placeholder="Email*" maxlength="400" required
                                class="w-full border border-gray-300 rounded px-4 py-3 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <input type="tel" name="phone" placeholder="Phone*" maxlength="400" required
                                class="w-full border border-gray-300 rounded px-4 py-3 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div class="flex flex-col sm:flex-row sm:items-center gap-3">
                            <span class="font-semibold text-[#14166e] text-[15px]">Upload CV*</span>
                            <input type="file" name="cv" required
                                accept=".pdf,.doc,.docx,.png,.jpg,.jpeg"
                                class="flex-1 border border-gray-300 rounded px-4 py-2.5 text-[14px] bg-white file:mr-3 file:border-0 file:bg-[#14166e] file:text-white file:rounded file:px-3 file:py-1.5 file:text-[13px]" />
                        </div>

                        <div>
                            <textarea name="message" rows="6" maxlength="2000" placeholder="Message*" required
                                class="w-full border border-gray-300 rounded px-4 py-3 text-[15px] focus:outline-none focus:border-[#14166e]"></textarea>
                        </div>

                        <div class="pt-2">
                            <button type="submit"
                                class="bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[15px] px-10 py-3 rounded transition">
                                {{ $submitLabel }}
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>

</x-layouts.cms>
