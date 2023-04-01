<?php
    $logoFileName = 'logo-1-dark.svg';
    $itemClass = "ms-1 ms-lg-3";
    $btnClass = "btn btn-icon btn-icon-muted btn-active-light btn-active-color-primary w-30px h-30px w-md-40px h-md-40px";
    $userAvatarClass = "symbol-30px symbol-md-40px";
    $btnIconClass = "svg-icon-1";
?>

<!--begin::Toolbar wrapper-->
<div class="d-flex align-items-stretch flex-shrink-0">

    

    <?php if(auth()->check()): ?>
        <!--begin::User menu-->
        <div class="d-flex align-items-center <?php echo e($itemClass); ?>" id="kt_header_user_menu_toggle">
            <!--begin::Menu wrapper-->
            <div class="cursor-pointer symbol <?php echo e($userAvatarClass); ?>" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="<?php echo e((theme()->isRtl() ? "bottom-start" : "bottom-end")); ?>">
                <img src="<?php echo e(auth()->user()->avatarUrl); ?>" alt="user"/>
            </div>
            <?php echo e(theme()->getView('partials/topbar/_user-menu')); ?>

            <!--end::Menu wrapper-->
        </div>
        <!--end::User menu-->
    <?php endif; ?>

    <!--begin::Header menu toggle-->
    <?php if(theme()->getOption('layout', 'header/left') === 'menu'): ?>
        <div class="d-flex align-items-center d-lg-none ms-2 me-n3" data-bs-toggle="tooltip" title="Show header menu">
            <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px" id="kt_header_menu_mobile_toggle">
                <?php echo theme()->getSvgIcon("icons/duotune/text/txt001.svg", "svg-icon-1"); ?>

            </div>
        </div>
    <?php endif; ?>
<!--end::Header menu toggle-->
</div>
<!--end::Toolbar wrapper-->
<?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/layout/demo1/header/__topbar.blade.php ENDPATH**/ ?>