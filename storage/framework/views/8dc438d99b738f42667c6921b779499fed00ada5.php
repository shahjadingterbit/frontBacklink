<?php $__env->startSection('content'); ?>
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication-->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">

            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <!--begin::Logo-->
                <a href="<?php echo e($theme->getPageUrl('')); ?>" class="mb-12">
                    <!-- <img alt="Logo" src="<?php echo e(asset(theme()->getMediaUrlPath() . 'logos/default.svg')); ?>" class="h-45px"/> -->
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                    <?php echo e($slot); ?>

                <!--end::Wrapper-->
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
           <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="<?php echo e($theme->getOption("general", "about")); ?>" class="text-muted text-hover-primary px-2"><?php echo e(__('About')); ?></a>

                    <a href="<?php echo e($theme->getOption('general', 'contact')); ?>" class="text-muted text-hover-primary px-2"><?php echo e(__('Contact Us')); ?></a>

                    <a href="<?php echo e($theme->getOption('product', 'purchase')); ?>" class="text-muted text-hover-primary px-2"><?php echo e(__('Purchase')); ?></a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication-->
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('base.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/auth/layout.blade.php ENDPATH**/ ?>