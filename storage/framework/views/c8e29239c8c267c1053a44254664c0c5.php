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
        $preselectedTier = request('tier');
    ?>

    
    <section class="relative bg-[#0B2F5E] py-16 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-r from-[#0B2F5E] to-[#14166e] opacity-90"></div>
        <div class="relative max-w-[1100px] mx-auto px-4 text-center">
            <h1 class="text-[28px] md:text-[40px] font-bold text-white leading-tight">
                Membership Application Form
            </h1>
            <nav class="text-blue-100 text-[14px] mt-3">
                <a href="/" class="hover:text-white">Home</a>
                <span class="mx-2">/</span>
                <span>Membership Application Form</span>
            </nav>
        </div>
    </section>

    <section class="bg-[#f6f8fb] py-14">
        <div class="max-w-[900px] mx-auto px-4">

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if(session('success')): ?>
                <div class="mb-8 rounded-lg bg-green-50 border border-green-200 p-5 text-green-800 text-[15px]">
                    <strong>Application Submitted!</strong> <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($errors->any()): ?>
                <div class="mb-8 rounded-lg bg-red-50 border border-red-200 p-5 text-red-800 text-[14px]">
                    <strong>Please correct the following errors:</strong>
                    <ul class="list-disc list-inside mt-2 space-y-1">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <li><?php echo e($error); ?></li>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </ul>
                </div>
            <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

            <form method="POST" action="<?php echo e(route('fellow-membership-form.submit')); ?>" enctype="multipart/form-data" class="space-y-8">
                <?php echo csrf_field(); ?>

                
                <fieldset class="bg-white rounded-xl p-6 md:p-8 shadow-sm">
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-2">Submit Your CV <span class="text-red-500">*</span></legend>
                    <p class="text-[14px] text-gray-600 mb-5">Select the Fellow membership tier you are applying for.</p>

                    <div class="space-y-3">
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::openLoop(); ?><?php endif; ?><?php $__currentLoopData = $tiers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::startLoopIteration(); ?><?php endif; ?>
                            <label class="flex items-start gap-3 p-4 border border-gray-200 rounded-lg hover:border-[#14166e] cursor-pointer">
                                <input type="radio" name="membership_tier" value="<?php echo e($key); ?>" required
                                       <?php echo e(old('membership_tier', $preselectedTier) === $key ? 'checked' : ''); ?>

                                       class="mt-1 text-[#14166e] focus:ring-[#14166e]" />
                                <span class="text-[15px] text-gray-700">
                                    <strong class="text-[#14166e]"><?php echo e($tier['label']); ?> - <?php echo e($tier['price']); ?></strong>
                                </span>
                            </label>
                        <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::endLoop(); ?><?php endif; ?><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::closeLoop(); ?><?php endif; ?>
                    </div>
                </fieldset>

                
                <fieldset class="bg-white rounded-xl p-6 md:p-8 shadow-sm">
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Personal Information</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label for="full_name" class="block text-[14px] font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                            <input type="text" name="full_name" id="full_name" value="<?php echo e(old('full_name')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="date_of_birth" class="block text-[14px] font-medium text-gray-700 mb-1">Date of Birth <span class="text-red-500">*</span></label>
                            <input type="date" name="date_of_birth" id="date_of_birth" value="<?php echo e(old('date_of_birth')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="nationality" class="block text-[14px] font-medium text-gray-700 mb-1">Nationality <span class="text-red-500">*</span></label>
                            <input type="text" name="nationality" id="nationality" value="<?php echo e(old('nationality')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                    </div>
                </fieldset>

                
                <fieldset class="bg-white rounded-xl p-6 md:p-8 shadow-sm">
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Contact Information</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div>
                            <label for="email" class="block text-[14px] font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                            <input type="email" name="email" id="email" value="<?php echo e(old('email')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="phone" class="block text-[14px] font-medium text-gray-700 mb-1">Phone Number <span class="text-red-500">*</span></label>
                            <input type="tel" name="phone" id="phone" value="<?php echo e(old('phone')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="address" class="block text-[14px] font-medium text-gray-700 mb-1">Address <span class="text-red-500">*</span></label>
                            <input type="text" name="address" id="address" value="<?php echo e(old('address')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                    </div>
                </fieldset>

                
                <fieldset class="bg-white rounded-xl p-6 md:p-8 shadow-sm">
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Professional Information</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label for="current_employer" class="block text-[14px] font-medium text-gray-700 mb-1">Current Employer/Organization Name <span class="text-red-500">*</span></label>
                            <input type="text" name="current_employer" id="current_employer" value="<?php echo e(old('current_employer')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="job_title" class="block text-[14px] font-medium text-gray-700 mb-1">Job Title/Position <span class="text-red-500">*</span></label>
                            <input type="text" name="job_title" id="job_title" value="<?php echo e(old('job_title')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="industry_sector" class="block text-[14px] font-medium text-gray-700 mb-1">Industry/Sector <span class="text-red-500">*</span></label>
                            <input type="text" name="industry_sector" id="industry_sector" value="<?php echo e(old('industry_sector')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="years_experience" class="block text-[14px] font-medium text-gray-700 mb-1">Years of Professional Experience <span class="text-red-500">*</span></label>
                            <input type="text" name="years_experience" id="years_experience" value="<?php echo e(old('years_experience')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                    </div>
                </fieldset>

                
                <fieldset class="bg-white rounded-xl p-6 md:p-8 shadow-sm">
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Qualifications</legend>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                        <div class="md:col-span-2">
                            <label for="highest_qualification" class="block text-[14px] font-medium text-gray-700 mb-1">Highest Academic Qualification <span class="text-red-500">*</span></label>
                            <input type="text" name="highest_qualification" id="highest_qualification" value="<?php echo e(old('highest_qualification')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="degree_name" class="block text-[14px] font-medium text-gray-700 mb-1">Degree/Certification Name <span class="text-red-500">*</span></label>
                            <input type="text" name="degree_name" id="degree_name" value="<?php echo e(old('degree_name')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div>
                            <label for="institution" class="block text-[14px] font-medium text-gray-700 mb-1">Institution <span class="text-red-500">*</span></label>
                            <input type="text" name="institution" id="institution" value="<?php echo e(old('institution')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                        <div class="md:col-span-2">
                            <label for="year_completed" class="block text-[14px] font-medium text-gray-700 mb-1">Year Completed <span class="text-red-500">*</span></label>
                            <input type="date" name="year_completed" id="year_completed" value="<?php echo e(old('year_completed')); ?>" required
                                   class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]" />
                        </div>
                    </div>
                </fieldset>

                
                <fieldset class="bg-white rounded-xl p-6 md:p-8 shadow-sm">
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Membership Requirements</legend>
                    <div class="space-y-5">
                        <div>
                            <label for="cv" class="block text-[14px] font-medium text-gray-700 mb-1">Professional CV/Resume <span class="text-red-500">*</span></label>
                            <input type="file" name="cv" id="cv" required accept=".pdf,.doc,.docx"
                                   class="w-full text-[14px] text-gray-700 file:mr-3 file:rounded-lg file:border-0 file:bg-[#14166e] file:text-white file:px-4 file:py-2 file:text-[13px] file:cursor-pointer" />
                            <p class="text-[12px] text-gray-500 mt-1">PDF, DOC, or DOCX (max 5 MB)</p>
                        </div>
                        <div>
                            <label for="identity" class="block text-[14px] font-medium text-gray-700 mb-1">Proof of Identity <span class="text-red-500">*</span></label>
                            <input type="file" name="identity" id="identity" required accept=".pdf,.jpg,.jpeg,.png"
                                   class="w-full text-[14px] text-gray-700 file:mr-3 file:rounded-lg file:border-0 file:bg-[#14166e] file:text-white file:px-4 file:py-2 file:text-[13px] file:cursor-pointer" />
                            <p class="text-[12px] text-gray-500 mt-1">PDF or image (max 5 MB)</p>
                        </div>
                        <div>
                            <label for="supporting_documents" class="block text-[14px] font-medium text-gray-700 mb-1">Supporting Documents</label>
                            <input type="file" name="supporting_documents" id="supporting_documents" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png,.zip"
                                   class="w-full text-[14px] text-gray-700 file:mr-3 file:rounded-lg file:border-0 file:bg-[#14166e] file:text-white file:px-4 file:py-2 file:text-[13px] file:cursor-pointer" />
                            <p class="text-[12px] text-gray-500 mt-1">Optional. PDF, DOC, image, or ZIP (max 10 MB)</p>
                        </div>
                        <div>
                            <label for="personal_statement" class="block text-[14px] font-medium text-gray-700 mb-1">Personal Statement <span class="text-red-500">*</span></label>
                            <textarea name="personal_statement" id="personal_statement" rows="4" required
                                      class="w-full rounded-lg border-gray-300 shadow-sm focus:border-[#14166e] focus:ring-[#14166e] text-[15px]"><?php echo e(old('personal_statement')); ?></textarea>
                        </div>
                    </div>
                </fieldset>

                
                <fieldset class="bg-white rounded-xl p-6 md:p-8 shadow-sm">
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Declaration <span class="text-red-500">*</span></legend>
                    <label class="flex items-start gap-3">
                        <input type="checkbox" name="declaration_agreed" value="1" required
                               <?php echo e(old('declaration_agreed') ? 'checked' : ''); ?>

                               class="mt-1 rounded text-[#14166e] focus:ring-[#14166e]" />
                        <span class="text-[14px] text-gray-700 leading-relaxed">
                            <strong>Yes, I agree.</strong> I hereby declare that all the information provided in this application is true and correct to the best of my knowledge. I agree to abide by the code of conduct and professional standards set forth by the organization.
                        </span>
                    </label>
                </fieldset>

                
                <fieldset class="bg-white rounded-xl p-6 md:p-8 shadow-sm">
                    <legend class="text-[20px] md:text-[24px] font-semibold text-[#14166e] mb-6">Payment</legend>
                    <div>
                        <label for="payment_proof" class="block text-[14px] font-medium text-gray-700 mb-1">
                            Membership Fee Payment Confirmation <span class="text-red-500">*</span>
                        </label>
                        <p class="text-[13px] text-gray-600 mb-2">Upload proof of payment (e.g., payment receipt or transaction confirmation):</p>
                        <input type="file" name="payment_proof" id="payment_proof" required accept=".pdf,.jpg,.jpeg,.png"
                               class="w-full text-[14px] text-gray-700 file:mr-3 file:rounded-lg file:border-0 file:bg-[#14166e] file:text-white file:px-4 file:py-2 file:text-[13px] file:cursor-pointer" />
                        <p class="text-[12px] text-gray-500 mt-1">PDF or image (max 5 MB)</p>
                    </div>
                </fieldset>

                <div class="flex justify-center pt-2">
                    <button type="submit" class="bg-[#f0b323] hover:bg-yellow-500 text-[#14166e] font-bold text-[16px] px-12 py-3 rounded-lg transition">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </section>

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
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/cms/page/fellow-membership-form.blade.php ENDPATH**/ ?>