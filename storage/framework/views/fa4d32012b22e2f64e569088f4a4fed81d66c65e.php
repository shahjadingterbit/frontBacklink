<!DOCTYPE html>

<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"<?php echo theme()->printHtmlAttributes('html'); ?> <?php echo e(theme()->printHtmlClasses('html')); ?>>

<head>
    <meta charset="utf-8"/>
    <title><?php echo e(ucfirst(theme()->getOption('meta', 'title'))); ?> | Project</title>
    <meta name="description" content="<?php echo e(ucfirst(theme()->getOption('meta', 'description'))); ?>"/>
    <meta name="keywords" content="<?php echo e(theme()->getOption('meta', 'keywords')); ?>"/>
    <link rel="canonical" href="<?php echo e(ucfirst(theme()->getOption('meta', 'canonical'))); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="<?php echo e(asset(theme()->getDemo() . '/' .theme()->getOption('assets', 'favicon'))); ?>"/>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script type="text/javascript">
    var APP_URL = <?php echo json_encode(url('/')); ?>

    </script>

    
    <?php echo e(theme()->includeFonts()); ?>

    

    <?php if(theme()->hasOption('page', 'assets/vendors/css')): ?>
        
        <?php $__currentLoopData = array_unique(theme()->getOption('page', 'assets/vendors/css')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo preloadCss(assetCustom($file)); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    <?php endif; ?>

    <?php if(theme()->hasOption('page', 'assets/custom/css')): ?>
        
        <?php $__currentLoopData = array_unique(theme()->getOption('page', 'assets/custom/css')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo preloadCss(assetCustom($file)); ?>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    <?php endif; ?>

    <?php if(theme()->hasOption('assets', 'css')): ?>
        
        <?php $__currentLoopData = array_unique(theme()->getOption('assets', 'css')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(strpos($file, 'plugins') !== false): ?>
                <?php echo preloadCss(assetCustom($file)); ?>

            <?php else: ?>
                <link href="<?php echo e(assetCustom($file)); ?>" rel="stylesheet" type="text/css"/>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
    <?php endif; ?>

    <?php if(theme()->getViewMode() === 'preview'): ?>
        <?php echo e(theme()->getView('partials/trackers/_ga-general')); ?>

        <?php echo e(theme()->getView('partials/trackers/_ga-tag-manager-for-head')); ?>

    <?php endif; ?>

    <?php echo $__env->yieldContent('styles'); ?>
</head>



<body <?php echo theme()->printHtmlAttributes('body'); ?> <?php echo theme()->printHtmlClasses('body'); ?> <?php echo theme()->printCssVariables('body'); ?> data-kt-name="metronic">

    <!--begin::Theme mode setup on page load-->
    <script>
        if ( document.documentElement ) {
            var name = document.body.getAttribute("data-kt-name");
            var themeMode = localStorage.getItem("kt_" + name + "_theme_mode_value");
            var enableSystemMode = true;

            if ( themeMode ) {
                if ( themeMode === "dark" ) {
                    document.documentElement.setAttribute("data-theme", "dark");
                } else if ( themeMode === "light" ) {
                    document.documentElement.setAttribute("data-theme", "light");
                } else if ( enableSystemMode === true || themeMode === "system" ) {
                    document.documentElement.setAttribute("data-theme", window.matchMedia('(prefers-color-scheme: dark)') ? "dark" : "light");
                }
            } else {
                document.documentElement.setAttribute("data-theme", "light");
            }
        }            
    </script>
    <!--end::Theme mode setup on page load-->

<?php if(theme()->getOption('layout', 'loader/display') === true): ?>
    <?php echo e(theme()->getView('layout/_loader')); ?>

<?php endif; ?>

<?php echo $__env->yieldContent('content'); ?>


<?php if(theme()->hasOption('assets', 'js')): ?>
    
    <?php $__currentLoopData = array_unique(theme()->getOption('assets', 'js')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(asset(theme()->getDemo() . '/' .$file)); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php endif; ?>

<?php if(theme()->hasOption('page', 'assets/vendors/js')): ?>
    
    <?php $__currentLoopData = array_unique(theme()->getOption('page', 'assets/vendors/js')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(asset(theme()->getDemo() . '/' .$file)); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php endif; ?>

<?php if(theme()->hasOption('page', 'assets/custom/js')): ?>
    
    <?php $__currentLoopData = array_unique(theme()->getOption('page', 'assets/custom/js')); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script src="<?php echo e(asset(theme()->getDemo() . '/' .$file)); ?>"></script>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
<?php endif; ?>


<?php if(theme()->getViewMode() === 'preview'): ?>
    <?php echo e(theme()->getView('partials/trackers/_ga-tag-manager-for-body')); ?>

<?php endif; ?>

<?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/base/base.blade.php ENDPATH**/ ?>