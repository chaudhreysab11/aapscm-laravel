<x-layouts.cms>

    <x-cms.seo-head :page="$page" />

    @php
        $hero = $page->page_data['hero'] ?? [];
        $intro = $page->page_data['intro'] ?? [];
        $ways = $page->page_data['ways'] ?? [];
        $membershipCards = $page->page_data['memberships']['cards'] ?? [];
        $salaryGuide = $page->page_data['salary_guide'] ?? [];
        $celebrations = $page->page_data['celebrations'] ?? [];
        $slides = $celebrations['slides'] ?? [];
    @endphp

    @if (! empty($hero))
        <section class="relative bg-cover bg-center bg-no-repeat"
                 @if (! empty($hero['background'])) style="background-image: url('{{ $hero['background'] }}');" @endif>
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative mx-auto max-w-[1200px] px-4 py-[84px] text-center text-white sm:py-[100px]">
                <h3 class="m-0 text-[28px] font-semibold uppercase leading-[36px] sm:text-[40px] sm:leading-[45px]">
                    {{ $hero['title'] }}
                </h3>
                @if (! empty($hero['subtitle']))
                    <h2 class="mx-auto mt-4 max-w-[760px] text-[20px] font-medium leading-[30px] sm:text-[28px] sm:leading-[42px]">
                        {{ $hero['subtitle'] }}
                    </h2>
                @endif
            </div>
        </section>
    @endif

    @if (! empty($intro))
        <section class="bg-white py-14 sm:py-[70px]">
            <div class="mx-auto grid max-w-[1200px] grid-cols-1 items-center gap-[30px] px-4 sm:gap-10 md:grid-cols-2">
                <div>
                    @if (! empty($intro['title']))
                        <h3 class="m-0 mb-6 text-[36px] font-normal uppercase leading-[44px] text-[#202124] sm:text-[48px] sm:leading-[58px]">
                            {{ $intro['title'] }}
                        </h3>
                    @endif

                    @if (! empty($intro['body']))
                        <h2 class="m-0 text-justify text-[16px] font-normal leading-[26px] text-black">
                            {{ $intro['body'] }}
                        </h2>
                    @endif

                    @if (! empty($intro['button']['text']))
                        <div class="mt-8">
                            <a href="{{ $intro['button']['href'] ?? '#' }}"
                               class="inline-flex items-center justify-center rounded-[30px] bg-[#001A67] px-[30px] py-[15px] text-[15px] font-light uppercase leading-none text-white no-underline transition-colors hover:bg-[#14166e]">
                                {{ $intro['button']['text'] }}
                            </a>
                        </div>
                    @endif
                </div>

                @if (! empty($intro['image']['src']))
                    <div>
                        <a href="{{ $intro['image']['href'] ?? '#' }}">
                            <img src="{{ $intro['image']['src'] }}"
                                 alt=""
                                 class="w-full rounded-[10px] shadow-[0_0_4px_rgba(0,0,0,0.5)]">
                        </a>
                    </div>
                @endif
            </div>
        </section>
    @endif

    @if (! empty($ways))
        <section class="bg-[#DEDEDE] py-[50px]">
            <div class="mx-auto max-w-[1200px] px-4">
                <div class="rounded-[20px] bg-white px-4 py-5 shadow-[0_0_10px_rgba(0,0,0,0.5)] sm:px-8">
                    <div class="mb-8 flex flex-col items-stretch justify-between gap-4 sm:flex-row sm:items-center">
                        @if (! empty($ways['title']))
                            <h2 class="m-0 max-w-[470px] text-[28px] font-medium leading-[34px] text-[#14166e] sm:text-[34.5px] sm:leading-[34.5px]">
                                {{ $ways['title'] }}
                            </h2>
                        @endif

                        @if (! empty($ways['button']['text']))
                            <a href="{{ $ways['button']['href'] ?? '#' }}"
                               class="inline-flex w-full min-w-[138px] items-center justify-center rounded-[5px] bg-[#14166e] px-6 py-3 text-[15px] font-semibold uppercase leading-none text-white no-underline sm:w-auto">
                                {{ $ways['button']['text'] }}
                            </a>
                        @endif
                    </div>

                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                        @foreach ($ways['items'] ?? [] as $item)
                            <div class="rounded-[20px] bg-white p-[30px] shadow-[0_0_2px_rgba(0,0,0,0.5)]">
                                <div class="mb-5 flex items-center gap-4 text-[#1b1b1b]">
                                    <i aria-hidden="true" class="{{ $item['icon_class'] ?? '' }} text-[45px] leading-none text-[#313CBF]"></i>
                                    <span class="text-[19px] font-medium leading-[1.3] tracking-[2px]">
                                        {{ $item['label'] ?? '' }}
                                    </span>
                                </div>
                                <h2 class="m-0 text-justify text-[16.8px] font-normal leading-[1.5] text-black">
                                    {{ $item['description'] ?? '' }}
                                </h2>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (! empty($membershipCards))
        <section class="bg-white py-[50px]">
            <div class="mx-auto grid max-w-[1200px] gap-8 px-4 md:grid-cols-3">
                @foreach ($membershipCards as $card)
                    <div class="rounded-[20px] bg-white p-[13px] shadow-[0_0_3px_rgba(0,0,0,0.5)]">
                        @if (! empty($card['image']['src']))
                            <img src="{{ $card['image']['src'] }}"
                                 alt=""
                                 class="h-[230px] w-full object-fill">
                        @endif

                        <div class="px-3 py-4 text-center">
                            <h2 class="mb-3 text-[1.3rem] font-semibold leading-[30px] text-[#0E0197]">
                                {{ $card['title'] ?? '' }}
                            </h2>

                            <h2 class="mb-4 text-[1rem] font-normal leading-[1.5] tracking-[0.5px] text-black">
                                {{ $card['body'] ?? '' }}
                            </h2>

                            @if (! empty($card['button']['text']))
                                <a href="{{ $card['button']['href'] ?? '#' }}"
                                   class="inline-flex items-center gap-2 rounded-[5px] px-5 py-[13px] text-[14px] font-light uppercase text-[#14166e]">
                                    <span>{{ $card['button']['text'] }}</span>
                                    <i aria-hidden="true" class="fas fa-angle-right"></i>
                                </a>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if (! empty($salaryGuide))
        <section class="bg-white py-[50px]">
            <div class="mx-auto max-w-[1200px] px-4">
                <div class="rounded-[20px] bg-white px-6 py-6 shadow-[0_0_10px_rgba(0,0,0,0.5)] md:px-8">
                    <div class="grid gap-8 md:grid-cols-2 md:items-center">
                        @if (! empty($salaryGuide['image']['src']))
                            <div class="flex justify-center md:justify-start">
                                <img src="{{ $salaryGuide['image']['src'] }}"
                                     alt=""
                                     class="h-auto max-w-full">
                            </div>
                        @endif

                        <div>
                            <h2 class="mb-4 text-center text-[30px] font-semibold tracking-[3px] text-[#1B1B1B] md:text-left">
                                {{ $salaryGuide['title'] ?? '' }}
                            </h2>
                            <h2 class="text-left text-[1.05rem] font-normal leading-[1.5] text-black">
                                {{ $salaryGuide['body'] ?? '' }}
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if (! empty($celebrations['title']))
        <section class="bg-white pt-[50px]">
            <div class="mx-auto max-w-[1200px] px-4">
                <h2 class="text-center text-[1.8em] font-medium text-[#14166e] md:text-[2.3em]">
                    {{ $celebrations['title'] }}
                </h2>
            </div>
        </section>
    @endif

    @if (! empty($slides))
        <section class="bg-white pb-[50px] pt-5">
            <div class="mx-auto max-w-[1200px] px-4">
                <div data-learning-slider class="relative mx-auto">
                    <div data-learning-slider-frame class="relative overflow-hidden rounded-[20px] bg-[#f5f5f5] h-[min(360px,72vw)] min-h-[240px] sm:h-[min(500px,58vw)] sm:min-h-[260px]">
                        @foreach ($slides as $slide)
                            <div data-learning-slide class="absolute inset-0 transition-opacity duration-300 ease-in-out {{ $loop->first ? 'pointer-events-auto opacity-100' : 'pointer-events-none opacity-0' }}">
                                <img src="{{ $slide['src'] }}"
                                     alt="{{ $slide['label'] ?? '' }}"
                                     class="block h-full w-full object-cover object-top">
                            </div>
                        @endforeach
                    </div>

                    @if (count($slides) > 1)
                        <button type="button"
                                data-learning-prev
                                class="absolute left-3 top-1/2 -translate-y-1/2 rounded-full bg-white/90 px-3 py-2 text-[#14166e] shadow md:left-4">
                            <span aria-hidden="false">&#10094;</span>
                            <span class="sr-only">Previous slide</span>
                        </button>

                        <button type="button"
                                data-learning-next
                                class="absolute right-3 top-1/2 -translate-y-1/2 rounded-full bg-white/90 px-3 py-2 text-[#14166e] shadow md:right-4">
                            <span aria-hidden="false">&#10095;</span>
                            <span class="sr-only">Next slide</span>
                        </button>

                        <div class="mt-4 flex justify-center gap-2">
                            @foreach ($slides as $slide)
                                <button type="button"
                                        data-learning-dot
                                        data-learning-index="{{ $loop->index }}"
                                        class="h-3 w-3 rounded-full transition-colors {{ $loop->first ? 'bg-[#14166e] opacity-100' : 'bg-[#14166e]/30' }}"
                                        aria-label="Go to slide {{ $loop->iteration }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </section>

        @once
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const slider = document.querySelector('[data-learning-slider]');

                    if (!slider) {
                        return;
                    }

                    const slides = Array.from(slider.querySelectorAll('[data-learning-slide]'));
                    const dots = Array.from(slider.querySelectorAll('[data-learning-dot]'));
                    const prev = slider.querySelector('[data-learning-prev]');
                    const next = slider.querySelector('[data-learning-next]');
                    const frame = slider.querySelector('[data-learning-slider-frame]');

                    if (slides.length === 0) {
                        return;
                    }

                    let index = 0;
                    let intervalId = null;
                    let touchStartX = null;

                    const render = function (nextIndex) {
                        index = (nextIndex + slides.length) % slides.length;

                        slides.forEach(function (slide, slideIndex) {
                            const isActive = slideIndex === index;
                            slide.classList.toggle('opacity-100', isActive);
                            slide.classList.toggle('pointer-events-auto', isActive);
                            slide.classList.toggle('opacity-0', !isActive);
                            slide.classList.toggle('pointer-events-none', !isActive);
                        });

                        dots.forEach(function (dot, dotIndex) {
                            const isActive = dotIndex === index;
                            dot.classList.toggle('bg-[#14166e]', isActive);
                            dot.classList.toggle('opacity-100', isActive);
                            dot.classList.toggle('bg-[#14166e]/30', !isActive);
                        });
                    };

                    const restart = function () {
                        if (intervalId !== null) {
                            window.clearInterval(intervalId);
                        }

                        intervalId = window.setInterval(function () {
                            render(index + 1);
                        }, 5000);
                    };

                    if (prev) {
                        prev.addEventListener('click', function () {
                            render(index - 1);
                            restart();
                        });
                    }

                    if (next) {
                        next.addEventListener('click', function () {
                            render(index + 1);
                            restart();
                        });
                    }

                    dots.forEach(function (dot) {
                        dot.addEventListener('click', function () {
                            render(Number(dot.getAttribute('data-learning-index') || '0'));
                            restart();
                        });
                    });

                    if (frame) {
                        frame.addEventListener('touchstart', function (event) {
                            touchStartX = event.changedTouches[0]?.clientX ?? null;
                        }, { passive: true });

                        frame.addEventListener('touchend', function (event) {
                            const touchEndX = event.changedTouches[0]?.clientX ?? null;

                            if (touchStartX === null || touchEndX === null) {
                                return;
                            }

                            const delta = touchStartX - touchEndX;

                            if (Math.abs(delta) < 30) {
                                touchStartX = null;
                                return;
                            }

                            render(delta > 0 ? index + 1 : index - 1);
                            restart();
                            touchStartX = null;
                        }, { passive: true });
                    }

                    render(0);
                    restart();
                });
            </script>
        @endonce
    @endif

</x-layouts.cms>

