<?php
    $logoFileName = 'backlink.png';
   
?>
<!--begin::Header-->
<div id="kt_header" style="" class="header <?php echo e(theme()->printHtmlClasses('header', false)); ?> align-items-stretch" <?php echo e(theme()->printHtmlAttributes('header')); ?>>
	<!--begin::Container-->
	<div class="<?php echo e(theme()->printHtmlClasses('header-container', false)); ?> d-flex align-items-stretch justify-content-between">
		<!--begin::Aside mobile toggle-->
		<?php if(theme()->getOption('layout', 'aside/display') === true): ?>
			<div class="d-flex align-items-center d-lg-none ms-n3 me-1" data-bs-toggle="tooltip" title="Show aside menu">
				<div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
					<?php echo theme()->getSvgIcon("icons/duotune/abstract/abs015.svg", "svg-icon-2x mt-1"); ?>

				</div>
			</div>
		<?php endif; ?>
		<!--end::Aside mobile toggle-->

		<?php if(theme()->getOption('layout', 'aside/display') === false): ?>
			<!--begin::Logo-->
			
			<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
				<a href="<?php echo e(theme()->getPageUrl('')); ?>">
					<img alt="Logo" src="<?php echo e(asset(theme()->getMediaUrlPath() . 'logos/' . $logoFileName)); ?>" class="h-55px logo"/>
				</a>
			</div>
			<!--end::Logo-->
			<!-- Start Search Input -->
			
			<!-- End Search Input -->
		<?php else: ?>
			<!--begin::Mobile logo-->
			<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
				<a href="<?php echo e(theme()->getPageUrl('')); ?>" class="d-lg-none">
					<img alt="Logo" src="<?php echo e(asset(theme()->getMediaUrlPath() . 'logos/default.svg')); ?>" class="h-15px"/>
				</a>
			</div>
			<!--end::Mobile logo-->
		<?php endif; ?>

		<!--begin::Wrapper-->
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
			<!--begin::Navbar-->
			<?php if(theme()->getOption('layout', 'header/left') === 'menu'): ?>
				<div class="d-flex align-items-stretch" id="kt_header_nav">
                    <?php echo e(theme()->getView('layout/header/_menu')); ?>

				</div>
			<?php elseif(theme()->getOption('layout', 'header/left') === 'page-title'): ?>
				<div class="d-flex align-items-center" id="kt_header_nav">
					<?php echo e(theme()->getView('layout/page-title/_' . theme()->getOption('layout', 'page-title/layout'))); ?>

				</div>
			<?php endif; ?>
			<!--end::Navbar-->

			<!--begin::Topbar-->
	        <div class="d-flex align-items-stretch flex-shrink-0">
                <?php echo e(theme()->getView('layout/header/__topbar')); ?>

			</div>
			<!--end::Topbar-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->
<?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/layout/demo1/header/_base.blade.php ENDPATH**/ ?>