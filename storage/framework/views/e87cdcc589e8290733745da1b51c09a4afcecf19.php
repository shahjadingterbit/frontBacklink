<!--begin::Toolbar-->
<?php if(theme()->getOption('page', 'domainUrl')): ?>
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="<?php echo e(theme()->printHtmlClasses('toolbar-container', false)); ?> d-flex flex-stack">
        <?php if(theme()->getOption('layout', 'page-title/display') && theme()->getOption('layout', 'header/left') !== 'page-title'): ?>
            <?php if(!empty($domainName)): ?>
                <?php echo e(theme()->getView('layout/page-title/_default', array('domainName' => $domainName,'searchMainTypeID' => $searchMainTypeID,'searchInputID' => $searchInputID,'searchPlaceholder' => $searchPlaceholder))); ?>

            <?php endif; ?>
        <?php endif; ?>
		<!--begin::Actions-->
        <?php if(theme()->getOption('page', 'buttonName')): ?>
            <div class="d-flex align-items-center py-1">
                <!--begin::Wrapper-->
                <div>
                    <?php if(theme()->getOption('page', 'buttonName') == 'Create Domain'): ?>
                        <a href="<?php echo e(route('domains.index')); ?>" class="btn btn-sm btn-primary fw-bolder">
                                All Domains
                        </a>
                        <a href="<?php echo e(route('exportAllDomains')); ?>" class="btn btn-sm btn-primary fw-bolder">
                                Export All Domains
                        </a>
                    <?php endif; ?>
                    <a href="<?php echo e(URL::to('/').theme()->getOption('page', 'path')); ?>" class="btn btn-sm btn-primary fw-bolder">
                        <?php echo e(theme()->getOption('page', 'buttonName')); ?>

                    </a>
                </div>
                <!--end::Wrapper-->
            </div>
        <?php endif; ?>
		<!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
<?php endif; ?>
<!--end::Toolbar-->
<?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/layout/demo1/toolbars/_group_toolbar.blade.php ENDPATH**/ ?>