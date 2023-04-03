<?php
    $nav = array(
        array('title' => 'Overview', 'view' => 'account/overview'),
        array('title' => 'Settings', 'view' => 'account/settings'),
        // array('title' => 'Security', 'view' => ''),
    );
?>

<!--begin::Navbar-->
<div class="card <?php echo e($class); ?>">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
            <!--begin: Pic-->
            <div class="me-7 mb-4">
                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                    <img src="<?php echo e(auth()->user()->avatar_url); ?>" alt="image"/>
                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-white h-20px w-20px"></div>
                </div>
            </div>
            <!--end::Pic-->

            <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1"><?php echo e(auth()->user()->name); ?></a>
                            <a href="#">
                                <?php echo theme()->getSvgIcon("icons/duotune/general/gen026.svg", "svg-icon-1 svg-icon-primary"); ?>

                            </a>

                            <a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan"><?php echo e(__('Upgrade to Pro')); ?></a>
                        </div>
                        <!--end::Name-->

                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">
                           
                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                <?php echo theme()->getSvgIcon("icons/duotune/communication/com011.svg", "svg-icon-4 me-1"); ?>

                                <?php echo e(auth()->user()->email); ?>

                            </a>
                        </div>
                        <!--end::Info-->
                    </div>
                    <!--end::User-->
                </div>
                <!--end::Title-->
            </div>
            <!--end::Info-->
        </div>
        <!--end::Details-->

        <!--begin::Navs-->
        <div class="d-flex overflow-auto h-55px">
            <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bolder flex-nowrap">
                <?php $__currentLoopData = $nav; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $each): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!--begin::Nav item-->
                    <li class="nav-item">
                        <a class="nav-link text-active-primary me-6 <?php echo e(theme()->getPagePath() === $each['view'] ? 'active' : ''); ?>" href="<?php echo e($each['view'] ? theme()->getPageUrl($each['view']) : '#'); ?>">
                            <?php echo e($each['title']); ?>

                        </a>
                    </li>
                    <!--end::Nav item-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <!--begin::Navs-->
    </div>
</div>
<!--end::Navbar-->
<?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/pages/account/_navbar.blade.php ENDPATH**/ ?>