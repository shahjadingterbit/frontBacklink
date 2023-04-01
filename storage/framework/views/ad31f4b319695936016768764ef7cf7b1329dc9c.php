<?php
$breadcrumb = bootstrap()->getBreadcrumb();

if (theme()->getOption('layout', 'page-title/direction') == 'column') {
$baseClass = 'flex-column align-items-start me-3';
} else {
$baseClass = 'align-items-center me-3';
}

$attr = array();
if (theme()->getOption('layout', 'toolbar/fixed/desktop') === true && theme()->getOption('layout', 'toolbar/fixed/tablet-and-mobile') === true && theme()->getOption('layout', 'page-title/responsive') === true) {
$baseClass .= " flex-wrap mb-5 mb-lg-0 lh-1";
}
?>

<!--begin::Page title-->
<div <?php echo e(theme()->printHtmlAttributes("page-title")); ?> class="d-flex <?php echo e($baseClass); ?>">
    <!--begin::Title-->
    <h1 class="d-flex align-items-center text-dark fw-bolder my-1 fs-3">
        <?php if(!empty($domainName)): ?>
        <span class="googleSearchDomain"> </span>
        <?php else: ?>
        <?php echo e(theme()->getOption('page', 'title')); ?>

        <?php endif; ?>
        <?php if(theme()->hasOption('page', 'description') && theme()->getOption('layout', 'page-title/description') === true): ?>
        <!--begin::Separator-->
        <span class="h-20px border-gray-200 border-start ms-3 mx-2"></span>
        <!--end::Separator-->

        <!--begin::Description-->
        <small class="text-muted fs-7 fw-bold my-1 ms-1">
            <?php echo e(theme()->getOption('page', 'description')); ?>

        </small>
        <!--end::Description-->
        <?php endif; ?>
    </h1>
    <?php if(!empty($domainName)): ?>
    <div class="clearfix googleDomainSearchBar">
        <?php echo e(theme()->getView('layout/search/_base',array('domainName' => $domainName,'searchMainTypeID' => $searchMainTypeID,'searchInputID' => $searchInputID,'searchPlaceholder' => $searchPlaceholder))); ?>

    </div>
    <?php endif; ?>
    <!--end::Title-->

    <?php if( theme()->getOption('layout', 'page-title/breadcrumb') === true && !empty($breadcrumb)): ?>
    <?php if(theme()->getOption('layout', 'page-title/direction') === 'row'): ?>
    <!--begin::Separator-->
    <span class="h-20px border-gray-200 border-start mx-4"></span>
    <!--end::Separator-->
    <?php endif; ?>

    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
        <?php $__currentLoopData = $breadcrumb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <!--begin::Item-->
        <?php if( $item['active'] === true ): ?>
        <li class="breadcrumb-item text-dark">
            <?php echo e($item['title']); ?>

        </li>
        <?php else: ?>
        <li class="breadcrumb-item text-muted">
            <?php if( ! empty($item['path']) ): ?>
            <a href="<?php echo e(theme()->getPageUrl($item['path'])); ?>" class="text-muted text-hover-primary">
                <?php echo e($item['title']); ?>

            </a>
            <?php else: ?>
            <?php echo e($item['title']); ?>

            <?php endif; ?>
        </li>
        <?php endif; ?>
        <!--end::Item-->
        <?php if(next($breadcrumb)): ?>
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <span class="bullet bg-gray-200 w-5px h-2px"></span>
        </li>
        <!--end::Item-->
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
    <!--end::Breadcrumb-->
    <?php endif; ?>
</div>

<!--end::Page title--><?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/layout/demo1/page-title/_default.blade.php ENDPATH**/ ?>