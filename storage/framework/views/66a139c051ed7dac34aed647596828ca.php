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
        $personName = $page->page_data['person_name'] ?? $page->title;
        $role = $page->page_data['role'] ?? '';
        $bio = $page->page_data['bio'] ?? '';
        $avatarImage = $page->page_data['avatar_image'] ?? '';
    ?>

    <style>
        .gleb-profile-title {
            padding-bottom: 9px;
        }

        .gleb-profile-page .eltdf-container-inner {
            width: calc(100% - 78px);
            margin: 50px auto;
        }

        .gleb-profile-page .eltdf-grid-row {
            margin: 0 -20px;
        }

        .gleb-profile-page .eltdf-page-content-holder {
            display: flow-root;
            padding: 0 20px;
            color: #252525;
            font-family: "Open Sans", sans-serif;
            font-size: 15px;
            line-height: 1.8;
        }

        .gleb-profile-title h1 {
            margin-bottom: 8px;
            font-size: 45px;
            line-height: 54px;
            font-weight: 700;
        }

        .gleb-profile-page .eltdf-page-content-holder h3,
        .gleb-profile-page .eltdf-page-content-holder h2,
        .gleb-profile-page .eltdf-page-content-holder h5 {
            margin: 20px 0;
            color: #252525;
            font-family: "Poppins", sans-serif;
            font-weight: 700;
            line-height: 1.2;
        }

        .gleb-profile-page .eltdf-page-content-holder h3 {
            font-size: 28px;
            line-height: 33.88px;
        }

        .gleb-profile-page .eltdf-page-content-holder h2 {
            margin-top: 26px;
            font-size: 45px;
            line-height: 54px;
        }

        .gleb-profile-page .eltdf-page-content-holder h5 {
            font-size: 18px;
            line-height: 27px;
        }

        .gleb-profile-page .eltdf-page-content-holder p {
            margin: 0 0 1rem;
        }

        .gleb-profile-page .eltdf-page-content-holder p:last-child {
            margin-bottom: 0;
        }

        .gleb-profile-page__image {
            display: block;
            margin: 0;
            width: 206px;
            height: 206px;
        }
    </style>

    <div class="gleb-profile-title">
        <?php if (isset($component)) { $__componentOriginalf7954dd292a0bbaf9ed6312af9465f42 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf7954dd292a0bbaf9ed6312af9465f42 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.cms.eltdf-title-bar','data' => ['title' => $page->title,'breadcrumbs' => [['label' => $page->title]]]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('cms.eltdf-title-bar'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($page->title),'breadcrumbs' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute([['label' => $page->title]])]); ?>
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
    </div>

    <div class="gleb-profile-page eltdf-container eltdf-default-page-template">
        <div class="eltdf-container-inner clearfix">
            <div class="eltdf-grid-row eltdf-grid-medium-gutter">
                <div class="eltdf-page-content-holder eltdf-grid-col-12">
                    <h3><?php echo e($personName); ?></h3>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($avatarImage): ?>
                        <p>
                            <img
                                src="<?php echo e($avatarImage); ?>"
                                alt="<?php echo e($personName); ?>"
                                width="206"
                                height="206"
                                class="gleb-profile-page__image"
                            />
                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <h2><?php echo e($personName); ?></h2>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role): ?>
                        <h5><?php echo e($role); ?></h5>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php echo $bio; ?>

                </div>
            </div>
        </div>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410)): ?>
<?php $attributes = $__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410; ?>
<?php unset($__attributesOriginal4180a3ac5a0c6c95fc9bdc464e812410); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410)): ?>
<?php $component = $__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410; ?>
<?php unset($__componentOriginal4180a3ac5a0c6c95fc9bdc464e812410); ?>
<?php endif; ?><?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\gleb-mikulich.blade.php ENDPATH**/ ?>