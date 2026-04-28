<?php if (isset($component)) { $__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.cms','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.cms'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


    <?php if (isset($component)) { $__componentOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.seo-head','data' => ['page' => $page]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.seo-head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['page' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd)): ?>
<?php $attributes = $__attributesOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd; ?>
<?php unset($__attributesOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd)): ?>
<?php $component = $__componentOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd; ?>
<?php unset($__componentOriginalf6d9d7e5c5672b8fcc13ff4976c1f9bd); ?>
<?php endif; ?>

    <?php
        $hero = $page->page_data['hero'] ?? [];
        $intro = $page->page_data['intro'] ?? [];
        $ways = $page->page_data['ways'] ?? [];
        $membershipCards = $page->page_data['memberships']['cards'] ?? [];
        $salaryGuide = $page->page_data['salary_guide'] ?? [];
        $celebrations = $page->page_data['celebrations'] ?? [];
        $slides = $celebrations['slides'] ?? [];
    ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($hero)): ?>
        <section class="relative bg-cover bg-center bg-no-repeat"
                 <?php if(! empty($hero['background'])): ?> style="background-image: url('<?php echo e($hero['background']); ?>');" <?php endif; ?>>
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="relative mx-auto max-w-[1200px] px-4 py-[84px] text-center text-white sm:py-[100px]">
                <h3 class="m-0 text-[28px] font-semibold uppercase leading-[36px] sm:text-[40px] sm:leading-[45px]">
                    <?php echo e($hero['title']); ?>

                </h3>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($hero['subtitle'])): ?>
                    <h2 class="mx-auto mt-4 max-w-[760px] text-[20px] font-medium leading-[30px] sm:text-[28px] sm:leading-[42px]">
                        <?php echo e($hero['subtitle']); ?>

                    </h2>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro)): ?>
        <section class="bg-white py-14 sm:py-[70px]">
            <div class="mx-auto grid max-w-[1200px] grid-cols-1 items-center gap-[30px] px-4 sm:gap-10 md:grid-cols-2">
                <div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['title'])): ?>
                        <h3 class="m-0 mb-6 text-[36px] font-normal uppercase leading-[44px] text-[#202124] sm:text-[48px] sm:leading-[58px]">
                            <?php echo e($intro['title']); ?>

                        </h3>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['body'])): ?>
                        <h2 class="m-0 text-justify text-[16px] font-normal leading-[26px] text-black">
                            <?php echo e($intro['body']); ?>

                        </h2>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['button']['text'])): ?>
                        <div class="mt-8">
                            <a href="<?php echo e($intro['button']['href'] ?? '#'); ?>"
                               class="inline-flex items-center justify-center rounded-[30px] bg-[#001A67] px-[30px] py-[15px] text-[15px] font-light uppercase leading-none text-white no-underline transition-colors hover:bg-[#14166e]">
                                <?php echo e($intro['button']['text']); ?>

                            </a>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['image']['src'])): ?>
                    <div>
                        <a href="<?php echo e($intro['image']['href'] ?? '#'); ?>">
                            <img src="<?php echo e($intro['image']['src']); ?>"
                                 alt=""
                                 class="w-full rounded-[10px] shadow-[0_0_4px_rgba(0,0,0,0.5)]">
                        </a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($ways)): ?>
        <section class="bg-[#DEDEDE] py-[50px]">
            <div class="mx-auto max-w-[1200px] px-4">
                <div class="rounded-[20px] bg-white px-4 py-5 shadow-[0_0_10px_rgba(0,0,0,0.5)] sm:px-8">
                    <div class="mb-8 flex flex-col items-stretch justify-between gap-4 sm:flex-row sm:items-center">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($ways['title'])): ?>
                            <h2 class="m-0 max-w-[470px] text-[28px] font-medium leading-[34px] text-[#14166e] sm:text-[34.5px] sm:leading-[34.5px]">
                                <?php echo e($ways['title']); ?>

                            </h2>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($ways['button']['text'])): ?>
                            <a href="<?php echo e($ways['button']['href'] ?? '#'); ?>"
                               class="inline-flex w-full min-w-[138px] items-center justify-center rounded-[5px] bg-[#14166e] px-6 py-3 text-[15px] font-semibold uppercase leading-none text-white no-underline sm:w-auto">
                                <?php echo e($ways['button']['text']); ?>

                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>

                    <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $ways['items'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="rounded-[20px] bg-white p-[30px] shadow-[0_0_2px_rgba(0,0,0,0.5)]">
                                <div class="mb-5 flex items-center gap-4 text-[#1b1b1b]">
                                    <i aria-hidden="true" class="<?php echo e($item['icon_class'] ?? ''); ?> text-[45px] leading-none text-[#313CBF]"></i>
                                    <span class="text-[19px] font-medium leading-[1.3] tracking-[2px]">
                                        <?php echo e($item['label'] ?? ''); ?>

                                    </span>
                                </div>
                                <h2 class="m-0 text-justify text-[16.8px] font-normal leading-[1.5] text-black">
                                    <?php echo e($item['description'] ?? ''); ?>

                                </h2>
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($membershipCards)): ?>
        <section class="bg-white py-[50px]">
            <div class="mx-auto grid max-w-[1200px] gap-8 px-4 md:grid-cols-3">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $membershipCards; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="rounded-[20px] bg-white p-[13px] shadow-[0_0_3px_rgba(0,0,0,0.5)]">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($card['image']['src'])): ?>
                            <img src="<?php echo e($card['image']['src']); ?>"
                                 alt=""
                                 class="h-[230px] w-full object-fill">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div class="px-3 py-4 text-center">
                            <h2 class="mb-3 text-[1.3rem] font-semibold leading-[30px] text-[#0E0197]">
                                <?php echo e($card['title'] ?? ''); ?>

                            </h2>

                            <h2 class="mb-4 text-[1rem] font-normal leading-[1.5] tracking-[0.5px] text-black">
                                <?php echo e($card['body'] ?? ''); ?>

                            </h2>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($card['button']['text'])): ?>
                                <a href="<?php echo e($card['button']['href'] ?? '#'); ?>"
                                   class="inline-flex items-center gap-2 rounded-[5px] px-5 py-[13px] text-[14px] font-light uppercase text-[#14166e]">
                                    <span><?php echo e($card['button']['text']); ?></span>
                                    <i aria-hidden="true" class="fas fa-angle-right"></i>
                                </a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($salaryGuide)): ?>
        <section class="bg-white py-[50px]">
            <div class="mx-auto max-w-[1200px] px-4">
                <div class="rounded-[20px] bg-white px-6 py-6 shadow-[0_0_10px_rgba(0,0,0,0.5)] md:px-8">
                    <div class="grid gap-8 md:grid-cols-2 md:items-center">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($salaryGuide['image']['src'])): ?>
                            <div class="flex justify-center md:justify-start">
                                <img src="<?php echo e($salaryGuide['image']['src']); ?>"
                                     alt=""
                                     class="h-auto max-w-full">
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                        <div>
                            <h2 class="mb-4 text-center text-[30px] font-semibold tracking-[3px] text-[#1B1B1B] md:text-left">
                                <?php echo e($salaryGuide['title'] ?? ''); ?>

                            </h2>
                            <h2 class="text-left text-[1.05rem] font-normal leading-[1.5] text-black">
                                <?php echo e($salaryGuide['body'] ?? ''); ?>

                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($celebrations['title'])): ?>
        <section class="bg-white pt-[50px]">
            <div class="mx-auto max-w-[1200px] px-4">
                <h2 class="text-center text-[1.8em] font-medium text-[#14166e] md:text-[2.3em]">
                    <?php echo e($celebrations['title']); ?>

                </h2>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($slides)): ?>
        <section class="bg-white pb-[50px] pt-5">
            <div class="mx-auto max-w-[1200px] px-4">
                <div data-learning-slider class="relative mx-auto">
                    <div data-learning-slider-frame class="relative overflow-hidden rounded-[20px] bg-[#f5f5f5] h-[min(360px,72vw)] min-h-[240px] sm:h-[min(500px,58vw)] sm:min-h-[260px]">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div data-learning-slide class="absolute inset-0 transition-opacity duration-300 ease-in-out <?php echo e($loop->first ? 'pointer-events-auto opacity-100' : 'pointer-events-none opacity-0'); ?>">
                                <img src="<?php echo e($slide['src']); ?>"
                                     alt="<?php echo e($slide['label'] ?? ''); ?>"
                                     class="block h-full w-full object-cover object-top">
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($slides) > 1): ?>
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
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $slides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <button type="button"
                                        data-learning-dot
                                        data-learning-index="<?php echo e($loop->index); ?>"
                                        class="h-3 w-3 rounded-full transition-colors <?php echo e($loop->first ? 'bg-[#14166e] opacity-100' : 'bg-[#14166e]/30'); ?>"
                                        aria-label="Go to slide <?php echo e($loop->iteration); ?>"></button>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
            </div>
        </section>

        <?php if (! $__env->hasRenderedOnce('9ba63acf-9e96-4f25-8da8-6f1827e995cd')): $__env->markAsRenderedOnce('9ba63acf-9e96-4f25-8da8-6f1827e995cd'); ?>
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
        <?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410)): ?>
<?php $attributes = $__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410; ?>
<?php unset($__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410)): ?>
<?php $component = $__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410; ?>
<?php unset($__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410); ?>
<?php endif; ?>

<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/cms/page/learning-and-development-hub.blade.php ENDPATH**/ ?>