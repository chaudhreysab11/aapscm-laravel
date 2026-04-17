<?php
    use Illuminate\Support\Str;

    $pageTitle       = $certification->meta_title
        ?? ($certification->title . ($certification->acronym ? ' (' . $certification->acronym . ')' : '') . ' Certification | AAPSCM');
    $pageDescription = $certification->meta_description
        ?? Str::limit(strip_tags((string) $certification->description), 155);
    $pageCanonical   = $certification->canonical_url
        ?? route('certifications.show', $certification->slug);
    $pageOgImage     = ($certification->og_image ?? $certification->badge_image)
        ? asset('storage/' . ($certification->og_image ?? $certification->badge_image))
        : null;
?>

<?php if (isset($component)) { $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layouts.public','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layouts.public'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>


    <?php if (isset($component)) { $__componentOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.certification.seo-head','data' => ['title' => $pageTitle,'description' => $pageDescription,'canonical' => $pageCanonical,'ogImage' => $pageOgImage]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('certification.seo-head'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pageTitle),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pageDescription),'canonical' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pageCanonical),'og-image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($pageOgImage)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7)): ?>
<?php $attributes = $__attributesOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7; ?>
<?php unset($__attributesOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7)): ?>
<?php $component = $__componentOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7; ?>
<?php unset($__componentOriginal85fffcd3d2a4151f4bcd147cbc3f9ec7); ?>
<?php endif; ?>

    <?php $__env->startPush('head'); ?>
    <script type="application/ld+json">
    <?php echo json_encode([
        '<?php $__contextArgs = [];
if (context()->has($__contextArgs[0])) :
if (isset($value)) { $__contextPrevious[] = $value; }
$value = context()->get($__contextArgs[0]); ?>'           => 'https://schema.org',
        '@type'              => 'EducationalOccupationalCredential',
        'name'               => $certification->title,
        'description'        => Str::limit(strip_tags((string) $certification->description), 200),
        'url'                => $pageCanonical,
        'credentialCategory' => $certification->credential_type ?? 'Certificate',
        'recognizedBy'       => [
            '@type' => 'Organization',
            'name'  => $certification->certifying_body ?? 'AAPSCM',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT); ?>

    </script>
    <?php $__env->stopPush(); ?>

    
    <?php if (isset($component)) { $__componentOriginal478336eaca1f13f6abe0922d178b6d01 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal478336eaca1f13f6abe0922d178b6d01 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.certification.hero','data' => ['certification' => $certification]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('certification.hero'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['certification' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($certification)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal478336eaca1f13f6abe0922d178b6d01)): ?>
<?php $attributes = $__attributesOriginal478336eaca1f13f6abe0922d178b6d01; ?>
<?php unset($__attributesOriginal478336eaca1f13f6abe0922d178b6d01); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal478336eaca1f13f6abe0922d178b6d01)): ?>
<?php $component = $__componentOriginal478336eaca1f13f6abe0922d178b6d01; ?>
<?php unset($__componentOriginal478336eaca1f13f6abe0922d178b6d01); ?>
<?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certification->description): ?>
        <?php if (isset($component)) { $__componentOriginal48b3420794edec893a604e1ec94770fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48b3420794edec893a604e1ec94770fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.certification.section','data' => ['title' => 'Overview']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('certification.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Overview']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php echo $certification->description; ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal48b3420794edec893a604e1ec94770fd)): ?>
<?php $attributes = $__attributesOriginal48b3420794edec893a604e1ec94770fd; ?>
<?php unset($__attributesOriginal48b3420794edec893a604e1ec94770fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48b3420794edec893a604e1ec94770fd)): ?>
<?php $component = $__componentOriginal48b3420794edec893a604e1ec94770fd; ?>
<?php unset($__componentOriginal48b3420794edec893a604e1ec94770fd); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certification->eligibility_requirements): ?>
        <?php if (isset($component)) { $__componentOriginal48b3420794edec893a604e1ec94770fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48b3420794edec893a604e1ec94770fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.certification.section','data' => ['title' => 'Eligibility Requirements']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('certification.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Eligibility Requirements']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php echo $certification->eligibility_requirements; ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal48b3420794edec893a604e1ec94770fd)): ?>
<?php $attributes = $__attributesOriginal48b3420794edec893a604e1ec94770fd; ?>
<?php unset($__attributesOriginal48b3420794edec893a604e1ec94770fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48b3420794edec893a604e1ec94770fd)): ?>
<?php $component = $__componentOriginal48b3420794edec893a604e1ec94770fd; ?>
<?php unset($__componentOriginal48b3420794edec893a604e1ec94770fd); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($certification->exam_details): ?>
        <?php if (isset($component)) { $__componentOriginal48b3420794edec893a604e1ec94770fd = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal48b3420794edec893a604e1ec94770fd = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.certification.section','data' => ['title' => 'Exam Details']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('certification.section'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Exam Details']); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

            <?php echo $certification->exam_details; ?>

         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal48b3420794edec893a604e1ec94770fd)): ?>
<?php $attributes = $__attributesOriginal48b3420794edec893a604e1ec94770fd; ?>
<?php unset($__attributesOriginal48b3420794edec893a604e1ec94770fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal48b3420794edec893a604e1ec94770fd)): ?>
<?php $component = $__componentOriginal48b3420794edec893a604e1ec94770fd; ?>
<?php unset($__componentOriginal48b3420794edec893a604e1ec94770fd); ?>
<?php endif; ?>
    <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>

    
    <?php if (isset($component)) { $__componentOriginal6244b8b3805e56bacfba9be169f9510c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal6244b8b3805e56bacfba9be169f9510c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.certification.exam-voucher-cta','data' => ['vouchers' => $examVouchers]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('certification.exam-voucher-cta'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['vouchers' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($examVouchers)]); ?>
<?php \Livewire\Features\SupportCompiledWireKeys\SupportCompiledWireKeys::processComponentKey($component); ?>

<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal6244b8b3805e56bacfba9be169f9510c)): ?>
<?php $attributes = $__attributesOriginal6244b8b3805e56bacfba9be169f9510c; ?>
<?php unset($__attributesOriginal6244b8b3805e56bacfba9be169f9510c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6244b8b3805e56bacfba9be169f9510c)): ?>
<?php $component = $__componentOriginal6244b8b3805e56bacfba9be169f9510c; ?>
<?php unset($__componentOriginal6244b8b3805e56bacfba9be169f9510c); ?>
<?php endif; ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $attributes = $__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__attributesOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd)): ?>
<?php $component = $__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd; ?>
<?php unset($__componentOriginal8c0e86a062c1c5bb6d0e151b7076f3fd); ?>
<?php endif; ?>
<?php /**PATH D:\Personal Work\AAPSCM-LARAVEL\resources\views/certifications/show.blade.php ENDPATH**/ ?>