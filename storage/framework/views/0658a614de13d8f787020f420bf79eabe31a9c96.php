

<?php $__env->startSection('content'); ?>

    <!--begin::Main-->
    <?php if(theme()->getOption('layout', 'main/type') === 'blank'): ?>
        <div class="d-flex flex-column flex-root">
            <?php echo e($slot); ?>

        </div>
    <?php else: ?>
        <!--begin::Root-->
        <div class="d-flex flex-column flex-root">
            <!--begin::Page-->
            <div class="page d-flex flex-row flex-column-fluid">
            <?php if( theme()->getOption('layout', 'aside/display') === true ): ?>
                <?php echo e(theme()->getView('layout/aside/_base')); ?>

            <?php endif; ?>

                <!--begin::Wrapper-->
                <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <?php echo e(theme()->getView('layout/header/_base')); ?>


                    <!--begin::Content-->
                    <div class="content d-flex flex-column flex-column-fluid <?php echo e(theme()->printHtmlClasses('content', false)); ?>" id="kt_content">
                    <?php if(theme()->getOption('layout', 'toolbar/display') === true): ?>
                        <?php echo e(theme()->getView('layout/toolbars/_' . theme()->getOption('layout', 'toolbar/layout'))); ?>

                    <?php endif; ?>

                        <!--begin::Post-->
                        <div class="post d-flex flex-column-fluid" id="kt_post">
                            <?php echo e(theme()->getView('layout/_content', compact('slot'))); ?>

                        </div>
                        <!--end::Post-->
                    </div>
                    <!--end::Content-->

                    <?php echo e(theme()->getView('layout/_footer')); ?>

                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Page-->
        </div>
        <!--end::Root-->

        <!--begin::Drawers-->
        <?php echo e(theme()->getView('partials/topbar/_activity-drawer')); ?>

        <?php echo e(theme()->getView('pages/apps/chat/_partials/_drawer-messenger')); ?>

        <!--end::Drawers-->
        <?php if(theme()->getOption('layout', 'scrolltop/display') === true): ?>
            <?php echo e(theme()->getView('layout/_scrolltop')); ?>

        <?php endif; ?>
    <?php endif; ?>
    <!--end::Main-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('base.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/layout/demo1/master.blade.php ENDPATH**/ ?>