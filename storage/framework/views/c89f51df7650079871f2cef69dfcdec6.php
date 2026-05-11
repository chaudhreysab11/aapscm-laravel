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
        $sliderSlides   = $page->page_data['slider']         ?? [];
        $hero           = $page->page_data['hero']           ?? [];
        $intro          = $page->page_data['intro']          ?? [];
        $certifications = $page->page_data['certifications'] ?? [];
        $training       = $page->page_data['training']       ?? [];
        $testCta        = $page->page_data['test_cta']       ?? [];
        $overview       = $page->page_data['overview']       ?? [];
        $process        = $page->page_data['process']        ?? [];
        $partners       = $page->page_data['partners']       ?? [];
    ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($sliderSlides[0]['image'])): ?>
        <?php $__env->startPush('head'); ?>
            <link rel="preload" as="image" href="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($sliderSlides[0]['image']) ?? $sliderSlides[0]['image']); ?>" fetchpriority="high">
        <?php $__env->stopPush(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($sliderSlides)): ?>
        <section
            class="relative isolate overflow-hidden bg-[#101010]"
            x-data="{
                slides: <?php echo \Illuminate\Support\Js::from($sliderSlides)->toHtml() ?>,
                active: 0,
                timer: null,
                start() {
                    this.stop();
                    if (this.slides.length < 2) return;
                    this.timer = window.setInterval(() => this.next(), 5600);
                },
                stop() {
                    if (this.timer !== null) {
                        window.clearInterval(this.timer);
                        this.timer = null;
                    }
                },
                next() {
                    this.active = (this.active + 1) % this.slides.length;
                },
                prev() {
                    this.active = (this.active - 1 + this.slides.length) % this.slides.length;
                },
                go(index) {
                    this.active = index;
                },
                init() {
                    this.start();
                }
            }"
            @mouseenter="stop()"
            @mouseleave="start()">
            <div class="relative h-[450px] md:h-[550px] xl:h-[650px]">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $sliderSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <article
                        class="home-hero-slide absolute inset-0"
                        style="display: <?php echo e($loop->first ? 'block' : 'none'); ?>;"
                        x-show="active === <?php echo e($loop->index); ?>"
                        x-transition:enter="transition ease-out duration-[950ms]"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-[700ms]"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        :aria-hidden="active === <?php echo e($loop->index); ?> ? 'false' : 'true'">
                        <img
                            src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($slide['image']) ?? $slide['image']); ?>"
                            alt="<?php echo e($slide['title']); ?>"
                            class="home-hero-slide-image absolute inset-0 h-full w-full object-cover"
                            loading="<?php echo e($loop->first ? 'eager' : 'lazy'); ?>"
                            decoding="async"
                            <?php if($loop->first): ?> fetchpriority="high" <?php endif; ?>
                        >
                        <div class="relative z-10 flex h-full items-center">
                            <div class="mx-auto w-full max-w-[1240px] px-5 sm:px-8 lg:px-10">
                                <div class="max-w-[920px] text-white">
                                    <h1
                                        class="home-hero-copy max-w-[1000px] font-['Poppins'] text-[48px] font-bold leading-[0.98] tracking-[-0.03em] text-white drop-shadow-[0_6px_30px_rgba(0,0,0,0.35)] sm:text-[72px] lg:text-[60px]"
                                        style="opacity: <?php echo e($loop->first ? '1' : '0'); ?>; transform: translate3d(<?php echo e($loop->first ? '0' : '4.25rem'); ?>, <?php echo e($loop->first ? '0' : '1rem'); ?>, 0) scale(<?php echo e($loop->first ? '1' : '0.97'); ?>); filter: blur(<?php echo e($loop->first ? '0' : '8px'); ?>);"
                                        :style="active === <?php echo e($loop->index); ?> ? 'opacity: 1; transform: translate3d(0, 0, 0) scale(1); filter: blur(0);' : 'opacity: 0; transform: translate3d(4.25rem, 1rem, 0) scale(0.97); filter: blur(8px);'"
                                    >
                                        <?php echo e($slide['title']); ?>

                                    </h1>

                                    <div
                                        class="home-hero-copy home-hero-copy-body mt-8 max-w-[470px] font-['Poppins'] text-[18px] font-light leading-[1.58] text-white/95 sm:text-[19px]"
                                        style="opacity: <?php echo e($loop->first ? '1' : '0'); ?>; transform: translate3d(<?php echo e($loop->first ? '0' : '3rem'); ?>, <?php echo e($loop->first ? '0' : '0.85rem'); ?>, 0); filter: blur(<?php echo e($loop->first ? '0' : '6px'); ?>);"
                                        :style="active === <?php echo e($loop->index); ?> ? 'opacity: 1; transform: translate3d(0, 0, 0); filter: blur(0);' : 'opacity: 0; transform: translate3d(3rem, 0.85rem, 0); filter: blur(6px);'"
                                    >
                                        <?php echo $slide['body_html']; ?>

                                    </div>

                                    <div
                                        class="home-hero-copy home-hero-copy-cta mt-8"
                                        style="opacity: <?php echo e($loop->first ? '1' : '0'); ?>; transform: translate3d(<?php echo e($loop->first ? '0' : '2rem'); ?>, <?php echo e($loop->first ? '0' : '0.75rem'); ?>, 0) scale(<?php echo e($loop->first ? '1' : '0.96'); ?>); filter: blur(<?php echo e($loop->first ? '0' : '5px'); ?>);"
                                        :style="active === <?php echo e($loop->index); ?> ? 'opacity: 1; transform: translate3d(0, 0, 0) scale(1); filter: blur(0);' : 'opacity: 0; transform: translate3d(2rem, 0.75rem, 0) scale(0.96); filter: blur(5px);'"
                                    >
                                        <a
                                            href="<?php echo e($slide['cta_href']); ?>"
                                            class="home-hero-cta inline-flex items-center gap-3 rounded-sm bg-[#ff1949] px-8 py-4 font-['Poppins'] text-[15px] font-semibold uppercase tracking-[0.08em] text-black shadow-[0_18px_45px_rgba(0,0,0,0.22)] transition duration-300 ease-out hover:-translate-y-0.5 hover:bg-[#ff315e] hover:shadow-[0_22px_52px_rgba(255,25,73,0.28)] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-white"
                                        >
                                            <span class="text-white"><?php echo e($slide['cta_label']); ?></span>
                                            
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>

            <button
                type="button"
                class="home-hero-arrow absolute left-5 top-1/2 z-20 hidden h-16 w-16 -translate-y-1/2 items-center justify-center bg-black/38 text-white transition-colors duration-300 hover:bg-black/54 lg:inline-flex"
                @click="prev(); start()"
                aria-label="Previous slide">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m15 18-6-6 6-6" /></svg>
            </button>

            <button
                type="button"
                class="home-hero-arrow absolute right-5 top-1/2 z-20 hidden h-16 w-16 -translate-y-1/2 items-center justify-center bg-black/38 text-white transition-colors duration-300 hover:bg-black/54 lg:inline-flex"
                @click="next(); start()"
                aria-label="Next slide">
                <svg class="h-7 w-7" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.75" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="m9 6 6 6-6 6" /></svg>
            </button>

            <div class="absolute bottom-6 left-1/2 z-20 flex -translate-x-1/2 items-center gap-2 lg:hidden">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $sliderSlides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <button
                        type="button"
                        class="h-2.5 rounded-full bg-white/35 transition-all duration-300"
                        :class="active === <?php echo e($loop->index); ?> ? 'w-9 bg-white' : 'w-2.5'"
                        @click="go(<?php echo e($loop->index); ?>); start()"
                        aria-label="Go to slide <?php echo e($loop->iteration); ?>"></button>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <section class="bg-white text-white py-20 md:py-28 flex items-center justify-center">
        <div class="bg-[#F8F8F8] max-w-[1140px] px-10 py-10 ">
            <h1 class="text-[25px] md:text-[25px] lg:text-[32px] font-bold leading-tight mb-8 text-center text-black">
                <?php echo e($hero['heading'] ?? $page->title); ?>

            </h1>
            <div class="max-w-[1000px] mx-auto space-y-5 text-[15px] md:text-[17px] leading-relaxed text-black text-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($hero['paragraphs'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <p><?php echo e($p); ?></p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </div>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro)): ?>
        <section class="bg-white py-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div>
                    <h2 class="text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-6 leading-snug">
                        <?php echo e($intro['heading'] ?? ''); ?>

                    </h2>
                    <div class="space-y-4 text-[15px] md:text-[16px] text-gray-700 leading-relaxed">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($intro['paragraphs'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <p><?php echo e($p); ?></p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['image'])): ?>
                    <div class="flex justify-center">
                        <img src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($intro['image']) ?? $intro['image']); ?>" alt="Advancing Excellence"
                                class="w-full max-w-[521px] h-auto rounded-lg shadow-[rgba(100,100,111,0.15)_0px_4px_18px_0px]"
                                loading="lazy" decoding="async">
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($certifications)): ?>
        <section class="bg-[#f6f8fb] py-16">
            <div class="max-w-[1200px] mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-8">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $certifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] p-6 flex flex-col text-center hover:-translate-y-1 transition-transform">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($cert['image'])): ?>
                            <img src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($cert['image']) ?? $cert['image']); ?>" alt="<?php echo e($cert['title']); ?>"
                                   class="w-[200px] h-[200px] object-contain mx-auto mb-4"
                                   width="200" height="200" loading="lazy" decoding="async">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <h2 class="text-[35px] font-semibold text-[#14166e] leading-snug mb-3 min-h-[56px]">
                            <?php echo e($cert['title']); ?>

                        </h2>
                        <p class="text-[18px] text-gray-600 leading-relaxed flex-grow mb-5">
                            <?php echo e($cert['desc']); ?>

                        </p>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($cert['badge'])): ?>
                            <img src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($cert['badge']) ?? $cert['badge']); ?>" alt="<?php echo e($cert['title']); ?> badge"
                                   class="w-[130px] h-[130px] object-contain mx-auto mb-4"
                                   width="130" height="130" loading="lazy" decoding="async">
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <a href="<?php echo e($cert['href'] ?? '#'); ?>"
                           class="inline-flex items-center justify-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-5 py-2.5 rounded-full transition-colors">
                            Learn More
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($training)): ?>
        <section class="bg-white py-16">
            <div class="max-w-[1100px] mx-auto px-4">
                <h2 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10">
                    <?php echo e($training['heading'] ?? ''); ?>

                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($training['cards'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="bg-white rounded-lg p-5 shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] transition-transform hover:-translate-y-1">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($card['image'])): ?>
                                <a href="<?php echo e($card['href'] ?? '#'); ?>"
                                   class="block rounded-lg">
                                    <img src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($card['image']) ?? $card['image']); ?>" alt="<?php echo e($card['title']); ?>"
                                         class="w-full h-[250px] object-cover rounded-md"
                                         width="520" height="250" loading="lazy" decoding="async">
                                </a>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="px-1 pt-5 text-center">
                                <h3 class="text-[18px] md:text-[20px] font-semibold text-[#14166e] leading-snug">
                                    <a href="<?php echo e($card['href'] ?? '#'); ?>" class="hover:underline"><?php echo e($card['title']); ?></a>
                                </h3>
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($training['cta_href'])): ?>
                    <div class="text-center mt-10">
                        <a href="<?php echo e($training['cta_href']); ?>"
                           class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-8 py-3 rounded-full transition-colors">
                            <?php echo e($training['cta_label'] ?? 'Read More'); ?>

                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" /></svg>
                        </a>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($testCta)): ?>
        <section class="bg-[#14166e] relative isolate overflow-hidden py-16">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($testCta['icon2'])): ?>
                <img src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($testCta['icon2']) ?? $testCta['icon2']); ?>" alt="" aria-hidden="true"
                     class="pointer-events-none absolute top-0 left-0 z-0 w-full h-full object-cover opacity-20 select-none"
                     loading="lazy" decoding="async">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($testCta['icon'])): ?>
                <img src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($testCta['icon']) ?? $testCta['icon']); ?>" alt="" aria-hidden="true"
                     class="pointer-events-none absolute top-8 left-8 z-0 w-12 h-auto opacity-40 select-none"
                     loading="lazy" decoding="async">
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <div class="relative z-10 max-w-[900px] mx-auto px-4 text-center text-white">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($testCta['eyebrow'])): ?>
                    <div class="inline-flex items-center gap-2 text-sm uppercase tracking-wider mb-4 text-yellow-300">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" /><path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" /></svg>
                        <?php echo e($testCta['eyebrow']); ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <h2 class="text-[26px] md:text-[36px] font-semibold leading-tight mb-5">
                    <?php echo $testCta['heading'] ?? ''; ?>

                </h2>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($testCta['description'])): ?>
                    <p class="text-white/80 text-[15px] md:text-[16px] leading-relaxed mb-7 max-w-[720px] mx-auto">
                        <?php echo e($testCta['description']); ?>

                    </p>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($testCta['button_href'])): ?>
                    <a href="<?php echo e($testCta['button_href']); ?>"
                       class="inline-flex items-center gap-2 bg-yellow-400 hover:bg-yellow-300 text-[#14166e] font-semibold text-sm px-8 py-3 rounded-full transition-colors">
                        <?php echo e($testCta['button_text'] ?? 'Register'); ?>

                    </a>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($overview)): ?>
        <section class="bg-white py-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10">
                    <?php echo e($overview['heading'] ?? ''); ?>

                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($overview['cards'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="flex h-full flex-col bg-[#f6f8fb] rounded-lg p-6 text-center shadow-[rgba(100,100,111,0.12)_0px_4px_14px_0px] hover:-translate-y-1 transition-transform">
                            <div class="flex flex-1 flex-col">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($card['icon'])): ?>
                                    <img src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($card['icon']) ?? $card['icon']); ?>" alt="<?php echo e($card['title']); ?>"
                                        class="w-16 h-16 object-contain mx-auto mb-5"
                                        width="64" height="64" loading="lazy" decoding="async">
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <h2 class="text-[18px] font-semibold text-[#14166e] mb-3 leading-snug"><?php echo e($card['title']); ?></h2>
                                <p class="text-[16px] text-gray-600 leading-relaxed"><?php echo e($card['text']); ?></p>
                            </div>
                            <div class="mt-6">
                                <a href="<?php echo e($card['href'] ?? '#'); ?>"
                                   class="inline-flex items-center gap-2 bg-[#14166e] hover:bg-[#1e2199] text-white font-semibold text-sm px-8 py-3 rounded-full transition-colors">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($process)): ?>
        <section class="bg-[#f6f8fb] py-16">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10">
                    <?php echo e($process['heading'] ?? ''); ?>

                </h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($process['steps'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $step): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="bg-white rounded-lg p-6 flex gap-5 shadow-[rgba(100,100,111,0.10)_0px_4px_12px_0px]">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($step['icon'])): ?>
                                <div class="flex-shrink-0">
                                    <img src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($step['icon']) ?? $step['icon']); ?>" alt="<?php echo e($step['title']); ?>"
                                         class="w-16 h-16 object-contain"
                                         width="64" height="64" loading="lazy" decoding="async">
                                </div>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            <div class="flex-grow">
                                <h3 class="text-[18px] font-semibold text-[#14166e] mb-2"><?php echo e($step['title']); ?></h3>
                                <p class="text-[16px] text-gray-600 leading-relaxed mb-3"><?php echo e($step['text']); ?></p>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($step['href'])): ?>
                                    <a href="<?php echo e($step['href']); ?>"
                                       class="inline-flex items-center gap-2 text-[#14166e] hover:text-[#1e2199] font-semibold text-sm">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10" stroke-width="2"/><path stroke-width="2" stroke-linecap="round" d="M10 8l4 4-4 4"/></svg>
                                        Read More
                                    </a>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </div>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($partners)): ?>
        <section class="bg-white py-14">
            <div class="max-w-[1200px] mx-auto px-4">
                <h2 class="text-center text-[26px] md:text-[34px] font-semibold text-[#14166e] mb-10">
                    <?php echo e($partners['heading'] ?? ''); ?>

                </h2>
                <div class="relative overflow-hidden" x-data="{}"
                     x-init="
                        const track = $refs.track;
                        track.innerHTML += track.innerHTML;
                     ">
                    <div x-ref="track" class="flex gap-10 items-center animate-[scroll-x_40s_linear_infinite]">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($partners['logos'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <div class="flex-shrink-0">
                                <img src="<?php echo e(\App\Support\Media\ImageAttributes::optimizedUrlFor($logo) ?? $logo); ?>" alt="Affiliate partner"
                                      class="w-[120px] h-[120px] object-contain opacity-80 hover:opacity-100 transition-opacity"
                                      width="120" height="120" loading="lazy" decoding="async">
                            </div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <?php $__env->startPush('head'); ?>
            <style>
                @keyframes scroll-x {
                    0%   { transform: translateX(0); }
                    100% { transform: translateX(-50%); }
                }
            </style>
        <?php $__env->stopPush(); ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php $__env->startPush('head'); ?>
        <style>
            .home-hero-slide {
                overflow: hidden;
            }

            .home-hero-slide-image {
                opacity: 0.86;
                transform: scale(1.015) translate3d(-1.25rem, 0, 0);
                transform-origin: center;
                transition:
                    transform 5600ms cubic-bezier(0.16, 1, 0.3, 1),
                    opacity 900ms ease,
                    filter 1200ms ease;
                will-change: transform, opacity, filter;
            }

            .home-hero-slide[aria-hidden="false"] .home-hero-slide-image {
                opacity: 1;
                transform: scale(1.09) translate3d(0, 0, 0);
                filter: saturate(1.06) contrast(1.04);
            }

            .home-hero-overlay {
                transition: opacity 900ms ease;
            }

            .home-hero-slide[aria-hidden="false"] .home-hero-overlay {
                opacity: 1;
            }

            .home-hero-copy {
                transition:
                    opacity 920ms cubic-bezier(0.16, 1, 0.3, 1),
                    transform 920ms cubic-bezier(0.16, 1, 0.3, 1),
                    filter 920ms cubic-bezier(0.16, 1, 0.3, 1);
                will-change: opacity, transform, filter;
            }

            .home-hero-copy-body {
                transition-delay: 180ms;
            }

            .home-hero-copy-cta {
                transition-delay: 340ms;
            }

            .home-hero-arrow {
                backdrop-filter: blur(2px);
            }

            .home-hero-cta {
                min-width: 178px;
                justify-content: center;
                position: relative;
                overflow: hidden;
            }

            .home-hero-cta::before {
                content: '';
                position: absolute;
                inset: 0;
                background: linear-gradient(120deg, transparent 0%, rgba(255,255,255,0.34) 42%, transparent 72%);
                transform: translateX(-130%);
                transition: transform 680ms ease;
            }

            .home-hero-cta:hover::before,
            .home-hero-cta:focus-visible::before {
                transform: translateX(130%);
            }

            .home-hero-cta > span {
                position: relative;
                z-index: 1;
            }

            @media (max-width: 1023px) {
                .home-hero-cta {
                    min-width: 0;
                    padding-inline: 1.4rem;
                }
            }

            @media (prefers-reduced-motion: reduce) {
                .home-hero-slide-image,
                .home-hero-copy,
                .home-hero-cta,
                .home-hero-cta::before {
                    transition-duration: 1ms !important;
                    transition-delay: 0ms !important;
                    animation-duration: 1ms !important;
                }

                .home-hero-slide[aria-hidden="false"] .home-hero-slide-image,
                .home-hero-slide-image {
                    transform: none;
                }
            }
        </style>
    <?php $__env->stopPush(); ?>

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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/cms/page/home.blade.php ENDPATH**/ ?>