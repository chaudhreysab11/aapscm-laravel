<?php
    $data = $page->page_data ?? [];

    $whoWeAre       = $data['who_we_are']               ?? [];
    $whyStandApart  = $data['why_stand_apart']          ?? [];
    $aboutUs        = $data['about_us']                 ?? [];
    $responsibilities = $data['responsibilities']       ?? [];
    $chaptersTransitionHeading = $data['chapters_transition_heading'] ?? null;
    $mission        = $data['mission']                  ?? [];
    $vision         = $data['vision']                   ?? [];
    $chapterFunctions = $data['chapter_functions']      ?? [];
    $goals          = $data['goals']                    ?? [];
    $objectives     = $data['objectives']               ?? [];
    $headquarteredBodyHtml = $data['headquartered_body_html'] ?? null;
    $becomeAMember  = $data['become_a_member']          ?? [];
    $advocacyLeadIn = $data['advocacy_lead_in']         ?? null;
    $accreditations = $data['accreditations']           ?? [];
    $teasers        = $data['teasers']                  ?? [];
    $closing        = $data['closing']                  ?? [];

    $chapterFunctionCards = $chapterFunctions['cards'] ?? [];
    $objectiveCards = $objectives['cards'] ?? [];
    $accreditationLogos = $accreditations['logos'] ?? [];
?>

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

    
    <?php if (isset($component)) { $__componentOriginalf7954dd292a0bbaf9ed6312af9465f42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf7954dd292a0bbaf9ed6312af9465f42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.eltdf-title-bar','data' => ['title' => 'About us','breadcrumbs' => [['label' => 'About us']]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.eltdf-title-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'About us','breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => 'About us']])]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf7954dd292a0bbaf9ed6312af9465f42)): ?>
<?php $attributes = $__attributesOriginalf7954dd292a0bbaf9ed6312af9465f42; ?>
<?php unset($__attributesOriginalf7954dd292a0bbaf9ed6312af9465f42); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf7954dd292a0bbaf9ed6312af9465f42)): ?>
<?php $component = $__componentOriginalf7954dd292a0bbaf9ed6312af9465f42; ?>
<?php unset($__componentOriginalf7954dd292a0bbaf9ed6312af9465f42); ?>
<?php endif; ?>

    
    <section class="py-16">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($whoWeAre['image'])): ?>
                    <img
                        src="<?php echo e($whoWeAre['image']); ?>"
                        alt=""
                        class="md:hidden w-full max-w-[540px] mx-auto mb-6"
                    />
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <h3 class="text-[30px] leading-tight text-[#202124] mb-4">
                    <?php echo $whoWeAre['heading'] ?? 'Who are <strong>We?</strong>'; ?>

                </h3>
                <div class="text-[15px] leading-relaxed text-gray-700">
                    <?php echo $whoWeAre['body_html'] ?? ''; ?>

                </div>
            </div>
            <div class="hidden md:block">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($whoWeAre['image'])): ?>
                    <img
                        src="<?php echo e($whoWeAre['image']); ?>"
                        alt=""
                        class="w-full max-w-[540px] mx-auto"
                    />
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </div>
    </section>

    
    <section class="py-16">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
            <div class="grid grid-cols-2 gap-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($whyStandApart['image_pair'][0])): ?>
                    <?php if (isset($component)) { $__componentOriginal07633cd89a4b98a67b750253b683801a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07633cd89a4b98a67b750253b683801a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.reveal','data' => ['animation' => 'fadeInDown']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.reveal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['animation' => 'fadeInDown']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        <img src="<?php echo e($whyStandApart['image_pair'][0]); ?>" alt="" class="w-full h-auto" />
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $attributes = $__attributesOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__attributesOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $component = $__componentOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__componentOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($whyStandApart['image_pair'][1])): ?>
                    <?php if (isset($component)) { $__componentOriginal07633cd89a4b98a67b750253b683801a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07633cd89a4b98a67b750253b683801a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.reveal','data' => ['animation' => 'fadeInUp']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.reveal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['animation' => 'fadeInUp']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        <img src="<?php echo e($whyStandApart['image_pair'][1]); ?>" alt="" class="w-full h-auto" />
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $attributes = $__attributesOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__attributesOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $component = $__componentOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__componentOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <h3 class="text-[30px] leading-tight text-[#202124] mb-4">
                    <?php echo $whyStandApart['heading'] ?? 'Why We <strong>Stand Apart</strong>'; ?>

                </h3>
                <div class="text-[15px] leading-relaxed text-gray-700">
                    <?php echo $whyStandApart['body_html'] ?? ''; ?>

                </div>
            </div>
        </div>
    </section>

    
    <section class="py-16 bg-[#E5F0F945]">
        <div class="max-w-[1100px] mx-auto px-4">
            <h3 class="text-[30px] leading-tight text-[#202124] mb-6">
                <?php echo $aboutUs['heading'] ?? 'About <strong>Us</strong>'; ?>

            </h3>
            <div class="text-[15px] leading-relaxed text-gray-700 space-y-4 text-justify">
                <?php echo $aboutUs['body_html'] ?? ''; ?>

            </div>
        </div>
        <div class="max-w-[1100px] mx-auto px-4 py-2 grid md:grid-cols-2 gap-10">
            <div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($responsibilities['image'])): ?>
                    <img src="<?php echo e($responsibilities['image']); ?>" alt="" class="w-full h-auto" />
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
            <div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($responsibilities['items'])): ?>
                    <ul class="space-y-3 mb-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $responsibilities['items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li class="flex gap-3 text-[15px] text-gray-700">
                                <span class="shrink-0 mt-1 text-[#005B1C]" aria-hidden="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512" fill="currentColor"><path d="M504 256c0 137-111 248-248 248S8 393 8 256 119 8 256 8s248 111 248 248zM227.3 387.3l184-184c6.2-6.2 6.2-16.4 0-22.6l-22.6-22.6c-6.2-6.2-16.4-6.2-22.6 0L216 308.1l-70.1-70.1c-6.2-6.2-16.4-6.2-22.6 0l-22.6 22.6c-6.2 6.2-6.2 16.4 0 22.6l104 104c6.2 6.3 16.4 6.3 22.6 0z"/></svg>
                                </span>
                                <span><?php echo e($item); ?></span>
                            </li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </ul>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($responsibilities['ansi_body_html'])): ?>
                    <div class="text-[15px] leading-relaxed text-gray-700 mb-6">
                        <?php echo $responsibilities['ansi_body_html']; ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <div class="grid grid-cols-2 gap-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ['chapters_col_a', 'chapters_col_b']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $colKey): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <ul class="space-y-2">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($responsibilities[$colKey] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <li class="flex gap-2 text-[15px] text-gray-700">
                                    <span class="shrink-0 mt-1 text-[#005B1C]" aria-hidden="true">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 512 512" fill="currentColor"><path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm140.2 246.9l-135.5 135.5c-9.4 9.4-24.6 9.4-33.9 0l-17-17c-9.4-9.4-9.4-24.6 0-33.9l87.3-87.3H112c-13.3 0-24-10.7-24-24v-24c0-13.3 10.7-24 24-24h185.1l-87.3-87.3c-9.4-9.4-9.4-24.6 0-33.9l17-17c9.4-9.4 24.6-9.4 33.9 0L396.2 221c9.4 9.4 9.4 24.6 0 33.9z"/></svg>
                                    </span>
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($chapter['url'])): ?>
                                        <a href="<?php echo e($chapter['url']); ?>" class="hover:text-[#508433]"><?php echo e($chapter['label']); ?></a>
                                    <?php else: ?>
                                        <span><?php echo e($chapter['label']); ?></span>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </li>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </ul>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($chaptersTransitionHeading): ?>
        <section class="py-12">
            <div class="max-w-[1100px] mx-auto px-4">
                <h3 class="text-[24px] leading-snug text-[#202124] font-poppins font-thin text-justify">
                    <?php echo e($chaptersTransitionHeading); ?>

                </h3>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <section class="py-16">
        <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-6">
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($mission)): ?>
                <?php if (isset($component)) { $__componentOriginal26db73cbbe5610225ea508905078b2a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26db73cbbe5610225ea508905078b2a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.icon-card','data' => ['icon' => $mission['icon'],'iconWidth' => 49,'iconHeight' => 49,'title' => $mission['heading'],'body' => $mission['body']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.icon-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mission['icon']),'iconWidth' => 49,'iconHeight' => 49,'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mission['heading']),'body' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mission['body'])]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $attributes = $__attributesOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__attributesOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $component = $__componentOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__componentOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($vision)): ?>
                <?php if (isset($component)) { $__componentOriginal26db73cbbe5610225ea508905078b2a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26db73cbbe5610225ea508905078b2a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.icon-card','data' => ['icon' => $vision['icon'],'iconWidth' => 49,'iconHeight' => 49,'title' => $vision['heading'],'body' => $vision['body']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.icon-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($vision['icon']),'iconWidth' => 49,'iconHeight' => 49,'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($vision['heading']),'body' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($vision['body'])]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $attributes = $__attributesOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__attributesOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $component = $__componentOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__componentOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
        </div>
    </section>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($chapterFunctions['intro_heading'])): ?>
        <section class="pt-12 pb-6">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h3 class="text-[26px] leading-tight text-[#202124] font-medium">
                    <?php echo $chapterFunctions['intro_heading']; ?>

                </h3>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($chapterFunctionCards)): ?>
        <section class="pb-16">
            <div class="max-w-[1100px] mx-auto px-4 space-y-8">
                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = array_chunk(array_slice($chapterFunctionCards, 0, 6), 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="grid md:grid-cols-3 gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal26db73cbbe5610225ea508905078b2a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26db73cbbe5610225ea508905078b2a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.icon-card','data' => ['icon' => $card['icon'],'title' => $card['title'],'body' => $card['body'],'cta' => $card['cta'] ?? null,'shadow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.icon-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['icon']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['title']),'body' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['body']),'cta' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['cta'] ?? null),'shadow' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $attributes = $__attributesOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__attributesOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $component = $__componentOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__componentOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($chapterFunctionCards) > 6): ?>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="hidden md:block"></div>
                        <?php ($card = $chapterFunctionCards[6]); ?>
                        <?php if (isset($component)) { $__componentOriginal26db73cbbe5610225ea508905078b2a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26db73cbbe5610225ea508905078b2a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.icon-card','data' => ['icon' => $card['icon'],'title' => $card['title'],'body' => $card['body'],'cta' => $card['cta'] ?? null,'shadow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.icon-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['icon']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['title']),'body' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['body']),'cta' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['cta'] ?? null),'shadow' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $attributes = $__attributesOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__attributesOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $component = $__componentOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__componentOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
                        <div class="hidden md:block"></div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($goals['heading'])): ?>
        <section class="pt-12 pb-6">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h3 class="text-[26px] leading-tight text-[#202124] font-medium">
                    <?php echo $goals['heading']; ?>

                </h3>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($goals['items'])): ?>
        <section class="pb-16">
            <div class="max-w-[1100px] mx-auto px-4 space-y-6">
                <?php ($goalIcon = $goals['icon'] ?? '/storage/cms-images/2024/12/check.png'); ?>
                <?php ($goalItems = $goals['items']); ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = array_chunk(array_slice($goalItems, 0, 4), 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="grid md:grid-cols-2 gap-4">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginalcb9e01b9bfc25d1bddcc90db8c378996 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb9e01b9bfc25d1bddcc90db8c378996 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.image-box','data' => ['icon' => $goalIcon,'body' => '<p><b>' . e($item['title']) . '</b>: ' . e($item['body']) . '</p>','shadow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.image-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($goalIcon),'body' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('<p><b>' . e($item['title']) . '</b>: ' . e($item['body']) . '</p>'),'shadow' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb9e01b9bfc25d1bddcc90db8c378996)): ?>
<?php $attributes = $__attributesOriginalcb9e01b9bfc25d1bddcc90db8c378996; ?>
<?php unset($__attributesOriginalcb9e01b9bfc25d1bddcc90db8c378996); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb9e01b9bfc25d1bddcc90db8c378996)): ?>
<?php $component = $__componentOriginalcb9e01b9bfc25d1bddcc90db8c378996; ?>
<?php unset($__componentOriginalcb9e01b9bfc25d1bddcc90db8c378996); ?>
<?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($goalItems) > 4): ?>
                    <div class="grid md:grid-cols-3 gap-4">
                        <div class="hidden md:block"></div>
                        <?php ($item = $goalItems[4]); ?>
                        <?php if (isset($component)) { $__componentOriginalcb9e01b9bfc25d1bddcc90db8c378996 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalcb9e01b9bfc25d1bddcc90db8c378996 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.image-box','data' => ['icon' => $goalIcon,'body' => '<p><b>' . e($item['title']) . '</b>: ' . e($item['body']) . '</p>','shadow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.image-box'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($goalIcon),'body' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('<p><b>' . e($item['title']) . '</b>: ' . e($item['body']) . '</p>'),'shadow' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalcb9e01b9bfc25d1bddcc90db8c378996)): ?>
<?php $attributes = $__attributesOriginalcb9e01b9bfc25d1bddcc90db8c378996; ?>
<?php unset($__attributesOriginalcb9e01b9bfc25d1bddcc90db8c378996); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalcb9e01b9bfc25d1bddcc90db8c378996)): ?>
<?php $component = $__componentOriginalcb9e01b9bfc25d1bddcc90db8c378996; ?>
<?php unset($__componentOriginalcb9e01b9bfc25d1bddcc90db8c378996); ?>
<?php endif; ?>
                        <div class="hidden md:block"></div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($objectives['heading'])): ?>
        <section class="pt-12 pb-6 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4 text-center">
                <h3 class="text-[26px] leading-tight text-[#202124] font-medium mb-4">
                    <?php echo $objectives['heading']; ?>

                </h3>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($objectives['intro_html'])): ?>
                    <div class="text-[15px] leading-relaxed text-gray-700 max-w-3xl mx-auto">
                        <?php echo $objectives['intro_html']; ?>

                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($objectiveCards)): ?>
        <section class="pt-6 pb-16 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4 space-y-6">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = array_chunk(array_slice($objectiveCards, 0, 6), 2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <div class="grid md:grid-cols-2 gap-6">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $card): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <?php if (isset($component)) { $__componentOriginal26db73cbbe5610225ea508905078b2a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26db73cbbe5610225ea508905078b2a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.icon-card','data' => ['icon' => $card['icon'],'title' => $card['title'],'bullets' => $card['bullets'] ?? [],'shadow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.icon-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['icon']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['title']),'bullets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['bullets'] ?? []),'shadow' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $attributes = $__attributesOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__attributesOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $component = $__componentOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__componentOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(count($objectiveCards) > 6): ?>
                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="hidden md:block"></div>
                        <?php ($card = $objectiveCards[6]); ?>
                        <?php if (isset($component)) { $__componentOriginal26db73cbbe5610225ea508905078b2a1 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal26db73cbbe5610225ea508905078b2a1 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.icon-card','data' => ['icon' => $card['icon'],'title' => $card['title'],'bullets' => $card['bullets'] ?? [],'shadow' => true]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.icon-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['icon' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['icon']),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['title']),'bullets' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($card['bullets'] ?? []),'shadow' => true]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $attributes = $__attributesOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__attributesOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal26db73cbbe5610225ea508905078b2a1)): ?>
<?php $component = $__componentOriginal26db73cbbe5610225ea508905078b2a1; ?>
<?php unset($__componentOriginal26db73cbbe5610225ea508905078b2a1); ?>
<?php endif; ?>
                        <div class="hidden md:block"></div>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($headquarteredBodyHtml): ?>
        <section class="py-10 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4 text-[15px] leading-relaxed text-gray-700 text-center">
                <?php echo $headquarteredBodyHtml; ?>

            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($becomeAMember)): ?>
        <section class="py-16 bg-[#fef5ef]">
            <div class="max-w-[1100px] mx-auto px-4">
                <div class="grid md:grid-cols-2 gap-10 items-center">
                    <div>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($becomeAMember['image'])): ?>
                            <img src="<?php echo e($becomeAMember['image']); ?>" alt="" class="w-full h-auto" />
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                    <div>
                        <h3 class="text-[30px] leading-tight text-[#202124] mb-2">
                            <?php echo $becomeAMember['heading']; ?>

                        </h3>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($becomeAMember['subheading'])): ?>
                            <h3 class="text-[22px] leading-snug text-[#202124] font-medium mb-4">
                                <?php echo e($becomeAMember['subheading']); ?>

                            </h3>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <div class="text-[15px] leading-relaxed text-gray-700 space-y-4">
                            <?php echo $becomeAMember['body_html'] ?? ''; ?>

                        </div>
                    </div>
                </div>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($becomeAMember['footer_html']) || ! empty($becomeAMember['button_url'])): ?>
                    <div class="mt-10 text-center max-w-4xl mx-auto">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($becomeAMember['footer_html'])): ?>
                            <div class="text-[15px] leading-relaxed text-gray-700 space-y-4 mb-6">
                                <?php echo $becomeAMember['footer_html']; ?>

                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($becomeAMember['button_url'])): ?>
                            <a
                                href="<?php echo e($becomeAMember['button_url']); ?>"
                                class="inline-block px-6 py-3 bg-[#202124] text-white rounded hover:bg-[#0f1159] transition-colors"
                            >
                                <?php echo e($becomeAMember['button_label'] ?? 'Become a Member Today'); ?>

                            </a>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($advocacyLeadIn): ?>
        <section class="py-10">
            <div class="max-w-[1100px] mx-auto px-4 text-[17px] leading-relaxed text-gray-700 text-center">
                <?php echo $advocacyLeadIn; ?>

            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($accreditations)): ?>
        <section class="py-16">
            <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10">
                <div>
                    <h3 class="text-[30px] leading-tight text-[#202124] mb-4">
                        <?php echo $accreditations['heading'] ?? 'Accreditations and <strong>Alignment</strong>'; ?>

                    </h3>
                    <div class="text-[15px] leading-relaxed text-gray-700 space-y-4">
                        <?php echo $accreditations['body_html'] ?? ''; ?>

                    </div>
                </div>
                <div class="space-y-6">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = array_chunk($accreditationLogos, 3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <div class="grid grid-cols-3 gap-4">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $row; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                <div class="flex flex-col items-center text-center">
                                    <img src="<?php echo e($logo['image']); ?>" alt="<?php echo e($logo['label'] ?? ''); ?>" class="w-full h-auto mb-2" />
                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($logo['label'])): ?>
                                        <p class="text-[13px] leading-tight text-[#202124] font-medium"><?php echo e($logo['label']); ?></p>
                                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                </div>
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                        </div>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </div>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($teasers)): ?>
        <section class="py-16">
            <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $teasers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $teaser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginal07633cd89a4b98a67b750253b683801a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07633cd89a4b98a67b750253b683801a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.reveal','data' => ['animation' => 'fadeInUp']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.reveal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['animation' => 'fadeInUp']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                        <?php if (isset($component)) { $__componentOriginale00726fff65a3572a6c28a6b917020af = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale00726fff65a3572a6c28a6b917020af = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.teaser-card','data' => ['image' => $teaser['image'],'heading' => $teaser['heading'],'headingUrl' => $teaser['heading_url'] ?? null,'body' => $teaser['body_html'] ?? null,'buttonLabel' => $teaser['button_label'],'buttonUrl' => $teaser['button_url']]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.teaser-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaser['image']),'heading' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaser['heading']),'headingUrl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaser['heading_url'] ?? null),'body' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaser['body_html'] ?? null),'buttonLabel' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaser['button_label']),'buttonUrl' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($teaser['button_url'])]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale00726fff65a3572a6c28a6b917020af)): ?>
<?php $attributes = $__attributesOriginale00726fff65a3572a6c28a6b917020af; ?>
<?php unset($__attributesOriginale00726fff65a3572a6c28a6b917020af); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale00726fff65a3572a6c28a6b917020af)): ?>
<?php $component = $__componentOriginale00726fff65a3572a6c28a6b917020af; ?>
<?php unset($__componentOriginale00726fff65a3572a6c28a6b917020af); ?>
<?php endif; ?>
                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $attributes = $__attributesOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__attributesOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $component = $__componentOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__componentOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($closing)): ?>
        <section class="py-16">
            <div class="max-w-[1100px] mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
                <div class="grid grid-cols-2 gap-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($closing['image_pair'][0])): ?>
                        <?php if (isset($component)) { $__componentOriginal07633cd89a4b98a67b750253b683801a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07633cd89a4b98a67b750253b683801a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.reveal','data' => ['animation' => 'fadeInDown']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.reveal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['animation' => 'fadeInDown']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <img src="<?php echo e($closing['image_pair'][0]); ?>" alt="" class="w-full h-auto" />
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $attributes = $__attributesOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__attributesOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $component = $__componentOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__componentOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($closing['image_pair'][1])): ?>
                        <?php if (isset($component)) { $__componentOriginal07633cd89a4b98a67b750253b683801a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal07633cd89a4b98a67b750253b683801a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.reveal','data' => ['animation' => 'fadeInUp']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.reveal'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['animation' => 'fadeInUp']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

                            <img src="<?php echo e($closing['image_pair'][1]); ?>" alt="" class="w-full h-auto" />
                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $attributes = $__attributesOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__attributesOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal07633cd89a4b98a67b750253b683801a)): ?>
<?php $component = $__componentOriginal07633cd89a4b98a67b750253b683801a; ?>
<?php unset($__componentOriginal07633cd89a4b98a67b750253b683801a); ?>
<?php endif; ?>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                </div>
                <div>
                    <h3 class="text-[30px] leading-tight text-[#202124] mb-4">
                        <?php echo $closing['heading'] ?? 'Globally Trusted and <strong>Mission-Driven</strong>'; ?>

                    </h3>
                    <div class="text-[15px] leading-relaxed text-gray-700">
                        <?php echo $closing['body_html'] ?? ''; ?>

                    </div>
                </div>
            </div>
        </section>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/cms/page/about-us.blade.php ENDPATH**/ ?>