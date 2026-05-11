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
        $heroHeading  = $page->page_data['hero_heading']   ?? $page->title;
        $dedication   = $page->page_data['dedication']     ?? [];
        $benefits     = $page->page_data['benefits']       ?? [];
        $emailCta     = $page->page_data['email_cta']      ?? [];
        $form         = $page->page_data['form']           ?? [];
    ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($dedication)): ?>
        <section class="bg-white py-14">
            <div class="max-w-[960px] mx-auto px-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($heroHeading): ?>
                    <h2 class="text-[30px] md:text-[36px] font-semibold text-[#14166e] mb-8 leading-tight">
                        <?php echo e($heroHeading); ?>

                    </h2>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($dedication['heading'])): ?>
                    <h3 class="text-[24px] md:text-[28px] font-semibold text-[#14166e] mb-5">
                        <?php echo e($dedication['heading']); ?>

                    </h3>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($dedication['paragraphs'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paragraph): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                    <p class="text-[16px] text-gray-700 leading-relaxed mb-5"><?php echo e($paragraph); ?></p>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($benefits)): ?>
        <section class="bg-[#f6f8fb] py-14">
            <div class="max-w-[960px] mx-auto px-4">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($benefits['heading'])): ?>
                    <h3 class="text-[24px] md:text-[28px] font-semibold text-[#14166e] mb-6">
                        <?php echo e($benefits['heading']); ?>

                    </h3>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <ul class="space-y-4">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = ($benefits['items'] ?? []); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                        <li class="flex items-start gap-3">
                            <svg class="w-6 h-6 text-[#14166e] flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <p class="text-[15px] text-gray-800 leading-relaxed">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($item['lead'])): ?>
                                    <strong class="text-[#14166e]"><?php echo e($item['lead']); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($item['body'])): ?>:<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?></strong>
                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($item['body'])): ?>
                                    <?php echo e($item['body']); ?>

                                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                            </p>
                        </li>
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                </ul>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($emailCta)): ?>
        <section class="bg-white py-14">
            <div class="max-w-[960px] mx-auto px-4 text-center">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($emailCta['lead_html'])): ?>
                    <h3 class="text-[20px] md:text-[24px] font-semibold text-[#14166e] leading-relaxed mb-6 [&_a]:underline hover:[&_a]:text-[#0f1159]">
                        <?php echo $emailCta['lead_html']; ?>

                    </h3>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($emailCta['extra_items'])): ?>
                    <ul class="max-w-[720px] mx-auto text-left space-y-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $emailCta['extra_items']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $extra): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li class="flex items-start gap-3">
                                <svg class="w-5 h-5 text-[#14166e] flex-shrink-0 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="text-[15px] text-gray-800 leading-relaxed"><?php echo $extra; ?></span>
                            </li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </ul>
                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </div>
        </section>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($form)): ?>
        <section class="bg-[#fef5ef] py-14">
            <div class="max-w-[1080px] mx-auto px-4">
                <div class="bg-white rounded-lg shadow-[rgba(100,100,111,0.2)_0px_7px_29px_0px] p-8 md:p-12">
                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($form['heading'])): ?>
                        <h3 class="text-[24px] md:text-[28px] font-semibold text-[#14166e] mb-2 text-center">
                            <?php echo e($form['heading']); ?>

                        </h3>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(! empty($form['description'])): ?>
                        <p class="text-[15px] text-gray-600 leading-relaxed text-center max-w-[760px] mx-auto mb-8">
                            <?php echo e($form['description']); ?>

                        </p>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-5 py-4 text-[15px] text-green-800">
                            <?php echo e(session('success')); ?>

                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                        <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-5 py-4 text-[14px] text-red-700">
                            <p class="font-semibold">Please correct the highlighted issues and try again.</p>
                            <ul class="mt-2 list-disc pl-5">
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                                    <li><?php echo e($error); ?></li>
                                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                            </ul>
                        </div>
                    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

                    <form method="post" action="<?php echo e(route('become-a-partner.submit')); ?>" class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <?php echo csrf_field(); ?>
                        <div>
                            <label for="user_login" class="block text-[14px] font-medium text-[#14166e] mb-1">Username</label>
                            <input type="text" id="user_login" name="user_login" value="<?php echo e(old('user_login')); ?>" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="first_name" class="block text-[14px] font-medium text-[#14166e] mb-1">First Name</label>
                            <input type="text" id="first_name" name="first_name" value="<?php echo e(old('first_name')); ?>" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="user_pass" class="block text-[14px] font-medium text-[#14166e] mb-1">User Password <span class="text-red-600">*</span></label>
                            <input type="password" id="user_pass" name="user_pass" required minlength="8" autocomplete="new-password" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="last_name" class="block text-[14px] font-medium text-[#14166e] mb-1">Last Name</label>
                            <input type="text" id="last_name" name="last_name" value="<?php echo e(old('last_name')); ?>" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="user_email" class="block text-[14px] font-medium text-[#14166e] mb-1">User Email <span class="text-red-600">*</span></label>
                            <input type="email" id="user_email" name="user_email" value="<?php echo e(old('user_email')); ?>" required class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="role" class="block text-[14px] font-medium text-[#14166e] mb-1">Role</label>
                            <input type="text" id="role" name="role" value="<?php echo e(old('role')); ?>" maxlength="20" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="city" class="block text-[14px] font-medium text-[#14166e] mb-1">City</label>
                            <input type="text" id="city" name="city" value="<?php echo e(old('city')); ?>" maxlength="20" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="country" class="block text-[14px] font-medium text-[#14166e] mb-1">Country</label>
                            <select id="country" name="country" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] bg-white focus:outline-none focus:border-[#14166e]">
                                <option value="">Select country…</option>
                                <option value="US" <?php if(old('country') === 'US'): echo 'selected'; endif; ?>>United States (US)</option>
                                <option value="GB" <?php if(old('country') === 'GB'): echo 'selected'; endif; ?>>United Kingdom (UK)</option>
                                <option value="CA" <?php if(old('country') === 'CA'): echo 'selected'; endif; ?>>Canada</option>
                                <option value="AU" <?php if(old('country') === 'AU'): echo 'selected'; endif; ?>>Australia</option>
                                <option value="NG" <?php if(old('country') === 'NG'): echo 'selected'; endif; ?>>Nigeria</option>
                                <option value="IN" <?php if(old('country') === 'IN'): echo 'selected'; endif; ?>>India</option>
                                <option value="ZA" <?php if(old('country') === 'ZA'): echo 'selected'; endif; ?>>South Africa</option>
                                <option value="GH" <?php if(old('country') === 'GH'): echo 'selected'; endif; ?>>Ghana</option>
                                <option value="KE" <?php if(old('country') === 'KE'): echo 'selected'; endif; ?>>Kenya</option>
                            </select>
                        </div>

                        <div>
                            <label for="organization" class="block text-[14px] font-medium text-[#14166e] mb-1">Organization &amp; Institution</label>
                            <input type="text" id="organization" name="organization" value="<?php echo e(old('organization')); ?>" maxlength="255" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]" />
                        </div>

                        <div>
                            <label for="partner_type" class="block text-[14px] font-medium text-[#14166e] mb-1">Partner Type</label>
                            <select id="partner_type" name="partner_type" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] bg-white focus:outline-none focus:border-[#14166e]">
                                <option value="Academic Partner" <?php if(old('partner_type', 'Academic Partner') === 'Academic Partner'): echo 'selected'; endif; ?>>Academic Partner</option>
                                <option value="Delivery Partner" <?php if(old('partner_type') === 'Delivery Partner'): echo 'selected'; endif; ?>>Delivery Partner</option>
                            </select>
                        </div>

                        <div class="md:col-span-2">
                            <label for="assist" class="block text-[14px] font-medium text-[#14166e] mb-1">How may AAPSCM assist you?</label>
                            <textarea id="assist" name="assist" rows="4" class="w-full border border-gray-300 rounded px-3 py-2 text-[15px] focus:outline-none focus:border-[#14166e]"><?php echo e(old('assist')); ?></textarea>
                        </div>

                        <div class="md:col-span-2 text-center pt-2">
                            <button type="submit" class="bg-[#14166e] hover:bg-[#0f1159] text-white font-semibold text-[15px] px-10 py-3 rounded transition">
                                Submit
                            </button>
                        </div>
                    </form>
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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views\cms\page\become-a-partner.blade.php ENDPATH**/ ?>