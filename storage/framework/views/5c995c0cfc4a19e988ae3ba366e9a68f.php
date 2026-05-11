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
        $personName  = $page->page_data['person_name']  ?? $page->title;
        $role        = $page->page_data['role']         ?? '';
        $bio         = $page->page_data['bio']          ?? '';
        $avatarImage = $page->page_data['avatar_image'] ?? '';
    ?>

    <style>
        .elementor-10413 .elementor-container {
            width: 100%;
            max-width: 1140px;
            margin: 0 auto;
        }

        .elementor-10413 .elementor-widget-wrap {
            width: 100%;
        }

        .elementor-10413 .elementor-element.elementor-element-e197407 {
            position: relative;
            margin: 50px 0 0;
            padding: 100px 0;
            background: #195B13;
            transition: background 0.3s, border-radius 0.3s, box-shadow 0.3s;
        }

        .elementor-10413 .elementor-element.elementor-element-e197407 > .elementor-background-overlay {
            position: absolute;
            inset: 0;
            background: #000000;
            opacity: 0.5;
        }

        .elementor-10413 .elementor-element.elementor-element-e197407 > .elementor-container {
            position: relative;
            z-index: 1;
        }

        .elementor-10413 .elementor-element.elementor-element-6c45a391 {
            text-align: center;
        }

        .elementor-10413 .elementor-element.elementor-element-6c45a391 .elementor-widget-container {
            margin: 0;
        }

        .elementor-10413 .elementor-element.elementor-element-6c45a391 .elementor-heading-title {
            margin: 0;
            color: #ffffff;
            font-family: "Poppins", sans-serif;
            font-size: 40px;
            font-weight: 600;
            line-height: 45px;
            text-align: center;
            text-transform: uppercase;
        }

        .elementor-10413 .elementor-element.elementor-element-29bc4e3b {
            margin: 70px 0;
        }

        .elementor-10413 .elementor-element.elementor-element-29bc4e3b > .elementor-container {
            display: flex;
            align-items: flex-start;
        }

        .elementor-10413 .elementor-element.elementor-element-1e1c34ff {
            width: 33.333%;
        }

        .elementor-10413 .elementor-element.elementor-element-733d974c {
            width: 66.667%;
        }

        .elementor-10413 .elementor-element.elementor-element-733d974c > .elementor-element-populated {
            margin-left: 10px;
        }

        .elementor-10413 .elementor-element.elementor-element-56553872 {
            padding: 20px 0;
            border: 1px solid #eeeeee;
            border-radius: 5px;
            transition: border-color 0.3s;
        }

        .elementor-10413 .elementor-element.elementor-element-56553872 > .elementor-container {
            min-height: 300px;
        }

        .elementor-10413 .elementor-element.elementor-element-56553872:hover {
            border-color: #508433;
        }

        .elementor-10413 .elementor-element.elementor-element-149b300c .elementor-widget-container,
        .elementor-10413 .elementor-element.elementor-element-266609c6,
        .elementor-10413 .elementor-element.elementor-element-6a8ec438 {
            text-align: center;
        }

        .elementor-10413 .elementor-element.elementor-element-149b300c img {
            display: block;
            margin: 0 auto;
        }

        .elementor-10413 .elementor-element.elementor-element-266609c6 .elementor-heading-title {
            margin: 20px 0 0;
            font-family: "Poppins", sans-serif;
            font-size: 23px;
            font-weight: 700;
            line-height: 23px;
            letter-spacing: 0.5px;
            color: #202124;
        }

        .elementor-10413 .elementor-element.elementor-element-6a8ec438 .elementor-widget-container {
            margin: 0;
        }

        .elementor-10413 .elementor-element.elementor-element-6a8ec438 .elementor-heading-title {
            margin: 0;
            font-family: "Poppins", sans-serif;
            font-size: 18px;
            font-weight: 700;
            line-height: 25px;
            color: #508433;
        }

        .elementor-10413 .elementor-element.elementor-element-5018298a .elementor-widget-container {
            color: #202124;
            font-family: "Poppins", sans-serif;
            font-size: 15px;
            font-weight: 400;
            line-height: 24px;
        }

        .elementor-10413 .elementor-element.elementor-element-5018298a .elementor-widget-container p {
            margin-bottom: 1rem;
        }

        .elementor-10413 .elementor-element.elementor-element-5018298a .elementor-widget-container p:last-child {
            margin-bottom: 0;
        }

        @media (max-width: 767px) {
            .elementor-10413 .elementor-element.elementor-element-e197407 {
                padding: 72px 0;
            }

            .elementor-10413 .elementor-element.elementor-element-6c45a391 .elementor-heading-title {
                font-size: 32px;
                line-height: 1.2;
            }

            .elementor-10413 .elementor-element.elementor-element-29bc4e3b > .elementor-container {
                display: block;
            }

            .elementor-10413 .elementor-element.elementor-element-1e1c34ff,
            .elementor-10413 .elementor-element.elementor-element-733d974c {
                width: 100%;
            }

            .elementor-10413 .elementor-element.elementor-element-733d974c > .elementor-element-populated {
                margin-left: 0;
                margin-top: 32px;
            }
        }
    </style>

    <div class="eltdf-container eltdf-default-page-template">
        <div class="eltdf-container-inner clearfix">
            <div class="eltdf-grid-row eltdf-grid-medium-gutter">
                <div class="eltdf-page-content-holder eltdf-grid-col-12">
                    <div class="elementor elementor-10413" data-elementor-type="wp-page" data-elementor-id="10413" data-elementor-post-type="page">
                        <section class="elementor-section elementor-top-section elementor-element elementor-element-e197407 elementor-section-full_width elementor-section-stretched elementor-section-height-default elementor-section-height-default" data-id="e197407" data-element_type="section" data-e-type="section" data-settings='{"stretch_section":"section-stretched","background_background":"classic"}'>
                            <div class="elementor-background-overlay"></div>
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-100 elementor-top-column elementor-element elementor-element-458d7b48" data-id="458d7b48" data-element_type="column" data-e-type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-6c45a391 elementor-widget elementor-widget-heading" data-id="6c45a391" data-element_type="widget" data-e-type="widget" data-widget_type="heading.default">
                                            <div class="elementor-widget-container">
                                                <h3 class="elementor-heading-title elementor-size-default"><?php echo e($personName); ?></h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section class="elementor-section elementor-top-section elementor-element elementor-element-29bc4e3b elementor-section-boxed elementor-section-height-default elementor-section-height-default pt-10 md:pt-14" data-id="29bc4e3b" data-element_type="section" data-e-type="section">
                            <div class="elementor-container elementor-column-gap-default">
                                <div class="elementor-column elementor-col-33 elementor-top-column elementor-element elementor-element-1e1c34ff" data-id="1e1c34ff" data-element_type="column" data-e-type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <section class="elementor-section elementor-inner-section elementor-element elementor-element-56553872 elementor-section-height-min-height elementor-section-boxed elementor-section-height-default" data-id="56553872" data-element_type="section" data-e-type="section">
                                            <div class="elementor-container elementor-column-gap-default">
                                                <div class="elementor-column elementor-col-100 elementor-inner-column elementor-element elementor-element-2e0ecc95" data-id="2e0ecc95" data-element_type="column" data-e-type="column">
                                                    <div class="elementor-widget-wrap elementor-element-populated">
                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($avatarImage): ?>
                                                            <div class="elementor-element elementor-element-149b300c elementor-widget elementor-widget-image" data-id="149b300c" data-element_type="widget" data-e-type="widget" data-widget_type="image.default">
                                                                <div class="elementor-widget-container">
                                                                    <img
                                                                        decoding="async"
                                                                        width="206"
                                                                        height="206"
                                                                        src="<?php echo e($avatarImage); ?>"
                                                                        class="elementor-animation-grow attachment-large size-large"
                                                                        alt="<?php echo e($personName); ?>"
                                                                    />
                                                                </div>
                                                            </div>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                                        <div class="elementor-element elementor-element-266609c6 elementor-widget elementor-widget-heading" data-id="266609c6" data-element_type="widget" data-e-type="widget" data-widget_type="heading.default">
                                                            <div class="elementor-widget-container">
                                                                <h2 class="elementor-heading-title elementor-size-default"><?php echo e($personName); ?></h2>
                                                            </div>
                                                        </div>

                                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($role): ?>
                                                            <div class="elementor-element elementor-element-6a8ec438 elementor-widget elementor-widget-heading" data-id="6a8ec438" data-element_type="widget" data-e-type="widget" data-widget_type="heading.default">
                                                                <div class="elementor-widget-container">
                                                                    <h5 class="elementor-heading-title elementor-size-default"><?php echo e($role); ?></h5>
                                                                </div>
                                                            </div>
                                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>

                                <div class="elementor-column elementor-col-66 elementor-top-column elementor-element elementor-element-733d974c" data-id="733d974c" data-element_type="column" data-e-type="column">
                                    <div class="elementor-widget-wrap elementor-element-populated">
                                        <div class="elementor-element elementor-element-5018298a elementor-widget elementor-widget-text-editor" data-id="5018298a" data-element_type="widget" data-e-type="widget" data-widget_type="text-editor.default">
                                            <div class="elementor-widget-container [&_strong]:font-semibold [&_strong]:text-gray-900 [&_a]:text-[#14166e] [&_a]:underline hover:[&_a]:text-[#0f1159] [&_ul]:list-disc [&_ul]:ml-6 [&_ul]:mb-4 [&_ul]:space-y-1 [&_ol]:list-decimal [&_ol]:ml-6 [&_ol]:mb-4 [&_ol]:space-y-1">
                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($bio): ?>
                                                    <?php echo $bio; ?>

                                                <?php else: ?>
                                                    <p class="text-gray-400">Profile content coming soon.</p>
                                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    </div>
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
<?php endif; ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\person-profile.blade.php ENDPATH**/ ?>