<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px" data-kt-menu="true">
    <!--begin::Menu item-->
    <div class="menu-item px-3">
        <div class="menu-content d-flex align-items-center px-3">
            <!--begin::Username-->
            <div class="d-flex flex-column">
                <div class="fw-bolder d-flex align-items-center fs-5">
                    <!-- <span class="badge badge-light-success fw-bolder fs-8 px-2 py-1 ms-2">Pro</span> -->
                </div>
                <a href="#" class="fw-bold text-muted text-hover-primary fs-7"></a>
            </div>
            <!--end::Username-->
        </div>
    </div>
    <!--end::Menu item-->


    <!--begin::Menu item-->
    <div class="menu-item px-5">
        <a href="<?php echo e(route('logout')); ?>" >
            <?php echo e(__('Sign Out')); ?>

        </a>
    </div>
    <!--end::Menu item-->

    <?php if(theme()->isDarkModeEnabled()): ?>
        <!--begin::Menu separator-->
        <div class="separator my-2"></div>
        <!--end::Menu separator-->

        <!--begin::Menu item-->
        <div class="menu-item px-5">
            <div class="menu-content px-5">
                <label class="form-check form-switch form-check-custom form-check-solid pulse pulse-success" for="kt_user_menu_dark_mode_toggle">
                    <input class="form-check-input w-30px h-20px" type="checkbox" value="1" name="skin" id="kt_user_menu_dark_mode_toggle" <?php echo e(theme()->isDarkMode() ? 'checked' : ''); ?> data-kt-url="<?php echo e(theme()->getPageUrl('', '', theme()->isDarkMode() ? '' : 'dark')); ?>"/>
                    <span class="pulse-ring ms-n1"></span>

                    <span class="form-check-label text-gray-600 fs-7">
                        <?php echo e(__('Dark Mode')); ?>

                    </span>
                </label>
            </div>
        </div>
        <!--end::Menu item-->
    <?php endif; ?>
</div>
<!--end::Menu-->
<?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/partials/topbar/_user-menu.blade.php ENDPATH**/ ?>