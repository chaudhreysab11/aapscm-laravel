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

    <?php $__env->startPush('head'); ?>
        <style>
            .request-pdes-page {
                background: #fff;
            }

            .request-pdes-page .page-shell {
                max-width: 1200px;
                margin: 0 auto;
                padding: 0 1rem;
            }

            .request-pdes-page .intro-section {
                padding: 3rem 0 4.5rem;
            }

            .request-pdes-page .intro-grid,
            .request-pdes-page .form-grid {
                display: grid;
                grid-template-columns: minmax(0, 1fr);
                gap: 2rem;
            }

            .request-pdes-page .intro-grid {
                align-items: start;
            }

            .request-pdes-page .intro-copy {
                max-width: 25.5rem;
            }

            .request-pdes-page .intro-heading {
                color: #272727;
                font-size: 2.125rem;
                line-height: 1.32;
                font-weight: 600;
                letter-spacing: -0.02em;
                margin: 0 0 1.5rem;
            }

            .request-pdes-page .form-heading {
                color: #272727;
                font-size: 1.5rem;
                line-height: 1.35;
                font-weight: 500;
                margin: 0 0 0.75rem;
            }

            .request-pdes-page .intro-body,
            .request-pdes-page .form-description {
                color: #444;
                font-size: 0.9375rem;
                line-height: 1.9;
                margin: 0 0 1.25rem;
            }

            .request-pdes-page .intro-requirement {
                color: #111;
                font-size: 1rem;
                line-height: 1.6;
                margin: 0;
            }

            .request-pdes-page .intro-media {
                display: flex;
                align-items: flex-start;
                justify-content: flex-end;
            }

            .request-pdes-page .intro-image {
                display: block;
                width: 100%;
                max-width: 39.4375rem;
                height: auto;
            }

            .request-pdes-page .form-section {
                padding: 0 0 4.5rem;
            }

            .request-pdes-page .form-band {
                position: relative;
                overflow: hidden;
                background-image: url('https://aapscm.org/wp-content/uploads/2025/03/1-12-scaled.jpg');
                background-position: 0 0;
                background-repeat: repeat;
                background-size: auto;
                padding: 1.875rem 0;
            }

            .request-pdes-page .form-band-overlay {
                position: absolute;
                inset: 0;
                opacity: 0.5;
            }

            .request-pdes-page .form-band-shell {
                position: relative;
                z-index: 1;
                max-width: 68.75rem;
                margin: 0 auto;
                padding: 0 0.625rem;
            }

            .request-pdes-page .form-inner {
                background-image: url('https://aapscm.org/wp-content/uploads/2025/03/1-13-scaled.jpg');
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .request-pdes-page .form-column {
                min-width: 0;
            }

            .request-pdes-page .form-panel {
                max-width: 100%;
                background: #fff;
                padding: 1.875rem;
                box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.02);
            }

            .request-pdes-page .PDES-form {
                color: #111;
            }

            .request-pdes-page .mn-hd-3 {
                margin: 0 0 0.75rem;
                padding: 0.625rem 0;
                color: #000 !important;
                font-size: 1.375rem;
                font-weight: 500;
                line-height: 1.4;
            }

            .request-pdes-page .p-info1 {
                display: flex;
                width: 100%;
                gap: 0.3125rem;
            }

            .request-pdes-page .txt-2,
            .request-pdes-page .txt-3 {
                width: 100%;
                margin: 0 0 0.9375rem;
                font-size: 0.875rem;
            }

            .request-pdes-page .lb-hd1 {
                display: block;
                color: #111;
                font-size: 0.9375rem;
                font-weight: 400;
                line-height: 1.5;
                margin-bottom: 0.3125rem;
            }

            .request-pdes-page .field-wrap {
                display: block;
                width: 100%;
            }

            .request-pdes-page .field-control,
            .request-pdes-page .field-file,
            .request-pdes-page .field-wrap input,
            .request-pdes-page .field-wrap select {
                width: 100%;
                border: 1px solid #d6d6d6;
                border-radius: 0;
                background: #fff;
                color: #111;
                font-size: 0.875rem;
                line-height: 1.5;
                padding: 0.7rem 0.85rem;
                box-shadow: none;
            }

            .request-pdes-page .field-control:focus,
            .request-pdes-page .field-file:focus,
            .request-pdes-page .field-wrap input:focus,
            .request-pdes-page .field-wrap select:focus {
                outline: none;
                border-color: #14166e;
            }

            .request-pdes-page .field-file {
                padding: 0;
            }

            .request-pdes-page .declaration-list {
                display: grid;
                gap: 0.625rem;
                margin-bottom: 1.25rem;
            }

            .request-pdes-page .declaration-item {
                display: flex;
                align-items: flex-start;
                gap: 0.5rem;
                color: #111;
                font-size: 0.875rem;
                line-height: 1.6;
            }

            .request-pdes-page .declaration-item input {
                margin-top: 0.25rem;
                width: 0.95rem;
                height: 0.95rem;
                accent-color: #14166e;
            }

            .request-pdes-page .submit-wrap {
                padding-top: 0.25rem;
                margin-top: 1.25rem;
            }

            .request-pdes-page .submit-button {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                border: 0;
                border-radius: 0;
                background: #005b1c;
                color: #fff;
                font-size: 0.9375rem;
                font-weight: 600;
                line-height: 1;
                padding: 0.5rem 2.6875rem;
                transition: background-color 0.2s ease;
            }

            .request-pdes-page .submit-button:hover,
            .request-pdes-page .submit-button:focus-visible {
                background: #004717;
            }

            .request-pdes-page .assistance-note {
                border-top: 1px solid #e5e7eb;
                color: #444;
                font-size: 0.8125rem;
                line-height: 1.8;
                margin-top: 1.5rem;
                padding-top: 1rem;
            }

            .request-pdes-page .assistance-note a {
                color: #14166e;
                text-decoration: underline;
            }

            @media (min-width: 768px) {
                .request-pdes-page .intro-grid {
                    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                    gap: 1.75rem;
                }

                .request-pdes-page .form-grid {
                    grid-template-columns: minmax(0, 45%) minmax(0, 55%);
                    gap: 0;
                }

                .request-pdes-page .form-row {
                    grid-template-columns: minmax(0, 1fr) minmax(0, 1fr);
                }

                .request-pdes-page .field-span-2 {
                    grid-column: 1 / -1;
                }
            }

            @media (max-width: 767px) {
                .request-pdes-page .intro-section {
                    padding: 2.5rem 0 3rem;
                }

                .request-pdes-page .form-section {
                    padding-bottom: 3rem;
                }

                .request-pdes-page .form-band {
                    padding: 1.5rem 0;
                }

                .request-pdes-page .form-band-shell {
                    padding: 0;
                }

                .request-pdes-page .form-panel {
                    padding: 0 0.625rem;
                    background: #fff;
                    box-shadow: none;
                }

                .request-pdes-page .intro-heading {
                    font-size: 2rem;
                    line-height: 1.3;
                }

                .request-pdes-page .form-heading {
                    font-size: 1.5rem;
                }

                .request-pdes-page .p-info1 {
                    display: block;
                }

                .request-pdes-page .txt-2 {
                    padding-left: 0.625rem;
                    padding-right: 0.625rem;
                    text-align: left;
                }

                .request-pdes-page .mn-hd-3 {
                    padding-left: 0.625rem;
                    text-align: left;
                }
            }
        </style>
    <?php $__env->stopPush(); ?>

    <?php
        $intro = $page->page_data['intro'] ?? [];
        $form  = $page->page_data['form']  ?? [];
    ?>

    <div class="request-pdes-page">
        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro)): ?>
            <section class="intro-section">
                <div class="page-shell">
                    <div class="intro-grid">
                        <div class="intro-copy">
                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['heading'])): ?>
                                <h2 class="intro-heading"><?php echo e($intro['heading']); ?></h2>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['body'])): ?>
                                <p class="intro-body"><?php echo e($intro['body']); ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['requirement_html'])): ?>
                                <p class="intro-requirement"><?php echo $intro['requirement_html']; ?></p>
                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                        </div>

                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($intro['image'])): ?>
                            <div class="intro-media">
                                <img src="<?php echo e($intro['image']); ?>" alt="<?php echo e($intro['heading'] ?? $page->title); ?>" class="intro-image" />
                            </div>
                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($form)): ?>
            <section class="form-section">
                <div class="form-band">
                    <div class="form-band-overlay"></div>
                    <div class="form-band-shell">
                        <div class="form-inner">
                            <div class="form-grid">
                                <div aria-hidden="true"></div>

                                <div class="form-column">
                                    <div class="form-panel">
                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($form['heading'])): ?>
                                            <h2 class="form-heading"><?php echo e($form['heading']); ?></h2>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($form['description'])): ?>
                                            <p class="form-description"><?php echo e($form['description']); ?></p>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                                            <div style="margin-bottom: 1.5rem; border: 1px solid #bbf7d0; background: #f0fdf4; color: #166534; padding: 1rem 1.25rem; border-radius: 0.75rem;">
                                                <?php echo e(session('success')); ?>

                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                                            <div style="margin-bottom: 1.5rem; border: 1px solid #fecaca; background: #fef2f2; color: #b91c1c; padding: 1rem 1.25rem; border-radius: 0.75rem;">
                                                <strong>Please correct the highlighted issues and try again.</strong>
                                                <ul style="margin: 0.75rem 0 0; padding-left: 1.25rem;">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                        <li><?php echo e($error); ?></li>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                                </ul>
                                            </div>
                                        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                                        <form method="post" action="<?php echo e(route('request-pdes.submit')); ?>" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="PDES-form">
                                                <p class="mn-hd-3">Personal Information</p>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Full Name*</label>
                                                        <span class="field-wrap"><input type="text" name="full_name" value="<?php echo e(old('full_name')); ?>" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Email Address*</label>
                                                        <span class="field-wrap"><input type="email" name="email" value="<?php echo e(old('email')); ?>" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                </div>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Phone Number*</label>
                                                        <span class="field-wrap"><input type="tel" name="phone" value="<?php echo e(old('phone')); ?>" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">AAPSCM Certification*</label>
                                                        <span class="field-wrap">
                                                            <select name="certification" required class="field-control">
                                                                <option value="">Select Course</option>
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($form['certifications'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cert): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                                    <option value="<?php echo e($cert); ?>" <?php if(old('certification') === $cert): echo 'selected'; endif; ?>><?php echo e($cert); ?></option>
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                                            </select>
                                                        </span>
                                                    </p>
                                                </div>

                                                <p class="txt-2 txt-3">
                                                    <label class="lb-hd1">AAPSCM Certification Number (if applicable*)</label>
                                                    <span class="field-wrap"><input type="text" name="certification_number" value="<?php echo e(old('certification_number')); ?>" maxlength="400" class="field-control" /></span>
                                                </p>

                                                <p class="mn-hd-3">PDES Activity Details</p>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Activity Type*</label>
                                                        <span class="field-wrap">
                                                            <select name="activity_type" required class="field-control">
                                                                <option value="">Select Activity</option>
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($form['activity_types'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                                    <option value="<?php echo e($activity); ?>" <?php if(old('activity_type') === $activity): echo 'selected'; endif; ?>><?php echo e($activity); ?></option>
                                                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                                            </select>
                                                        </span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Course/Event Name*</label>
                                                        <span class="field-wrap"><input type="text" name="course_name" value="<?php echo e(old('course_name')); ?>" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                </div>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Training Provider/Organization*</label>
                                                        <span class="field-wrap"><input type="text" name="provider" value="<?php echo e(old('provider')); ?>" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Location (If In-Person)*</label>
                                                        <span class="field-wrap"><input type="text" name="location" value="<?php echo e(old('location')); ?>" required maxlength="400" class="field-control" /></span>
                                                    </p>
                                                </div>

                                                <div class="p-info1">
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Course/Event Date*</label>
                                                        <span class="field-wrap"><input type="date" name="course_date" value="<?php echo e(old('course_date')); ?>" required class="field-control" /></span>
                                                    </p>
                                                    <p class="txt-2">
                                                        <label class="lb-hd1">Total PDES Earned*</label>
                                                        <span class="field-wrap"><input type="number" name="pdes_earned" value="<?php echo e(old('pdes_earned')); ?>" required min="1" class="field-control" /></span>
                                                    </p>
                                                </div>

                                                <p class="txt-2 txt-3">
                                                    <label class="lb-hd1">Category of PDES*</label>
                                                    <span class="field-wrap">
                                                        <select name="category" required class="field-control">
                                                            <option value="">Select Category</option>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($form['categories'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                                <option value="<?php echo e($cat); ?>" <?php if(old('category') === $cat): echo 'selected'; endif; ?>><?php echo e($cat); ?></option>
                                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                                        </select>
                                                    </span>
                                                </p>

                                                <p class="mn-hd-3">Supporting Documentation</p>

                                                <p class="txt-2 txt-3">
                                                    <label class="lb-hd1"><strong>Upload Certificate of Completion (PDF, JPG, PNG, DOC):</strong></label>
                                                    <span class="field-wrap"><input type="file" name="certificate" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" class="field-file" /></span>
                                                </p>

                                                <p class="txt-2 txt-3">
                                                    <label class="lb-hd1"><strong>Upload Additional Supporting Documents (Optional):</strong></label>
                                                    <span class="field-wrap"><input type="file" name="additional_docs" class="field-file" /></span>
                                                </p>

                                                <p class="mn-hd-3">Declaration &amp; Submission</p>
                                                <p class="declaration-label">By submitting this form, I confirm that:</p>

                                                <div class="declaration-list">
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($form['declarations'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idx => $decl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                                        <label class="declaration-item">
                                                            <input type="checkbox" name="declaration_<?php echo e($idx); ?>" value="1" required <?php echo e(old('declaration_' . $idx) ? 'checked' : ''); ?> />
                                                            <span><?php echo e($decl); ?></span>
                                                        </label>
                                                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                                                </div>

                                                <div class="submit-wrap submit-btn1">
                                                    <button type="submit" class="submit-button">Submit</button>
                                                </div>
                                            </div>

                                            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($form['assistance_html'])): ?>
                                                <p class="assistance-note"><?php echo $form['assistance_html']; ?></p>
                                            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\request-pdes-for-certificate.blade.php ENDPATH**/ ?>