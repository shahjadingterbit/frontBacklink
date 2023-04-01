<?php if (isset($component)) { $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a = $component; } ?>
<?php $component = App\View\Components\BaseLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('base-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BaseLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php echo e(theme()->getView('layout/demo1/toolbars/_toolbar-1')); ?>

    <div class="col-xl-12 mb-5 mb-xl-10">
        <!--begin::Table Widget 4-->
        <div class="card card-flush h-xl-100">
            <!--begin::Card header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                    <?php if(!empty($groupName)): ?>
                    All Backlink List of <?php echo e($groupName); ?> AND not Assinged
                    <?php endif; ?>
                </h3>
                <!--end::Title-->
                <!--begin::Actions-->
                <div class="card-toolbar">
                    <!--begin::Filters-->
                    <div class="d-flex flex-stack flex-wrap gap-4">
                        <div class="d-flex align-items-center py-1">
                            <div>
                                <?php if(count($assignedBacklinkIds) > 0): ?>
                                <?php 
                                    $message = "Update Backlink";
                                    $method = "PUT";
                                ?>
                                <?php else: ?>
                                <?php 
                                    $message = "Assign Backlink";
                                    $method = "POST";
                                ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!--begin::Search-->
                        <div class="position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-2 position-absolute top-50 translate-middle-y ms-4">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-table-widget-4="search" class="form-control w-150px fs-7 ps-12" placeholder="Search">
                        </div>
                        <!--end::Search-->
                    </div>
                    <!--begin::Filters-->
                </div>
                <!--end::Actions-->
            </div>
            <!--end::Card header-->
            <form id="assign_backlink_to_group_form" class="form" method="POST" action="<?php echo e(route('addAndUpdateBacklink')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <!--begin::Card body-->
                <div class="col-xl-12">
                    <!--begin::List Widget 3-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            <?php $__empty_1 = true; $__currentLoopData = $allBacklinkList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-8">
                                <!--begin::Checkbox-->
                                <div class="form-check form-check-custom form-check-solid mx-5">
                                    <input class="form-check-input" type="checkbox" name="backlink[]" value="<?php echo e($row['id']); ?>" <?php if(in_array($row['id'],$assignedBacklinkIds)): ?> checked <?php endif; ?>>
                                </div>
                                <!--end::Checkbox-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    <?php echo e($row['backlink_domain']); ?>

                                </div>
                                <!--end::Description-->
                                <?php if(in_array($row['id'],$assignedBacklinkIds)): ?>
                                <span class="badge badge-light-success fs-8 fw-bold">Assigned</span>
                                <?php else: ?>
                                <span class="badge badge-light-danger fs-8 fw-bold">Not Assigned</span>
                                <?php endif; ?>
                            </div>
                            <!--end:Item-->
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <p>No Backlink</p>
                            <?php endif; ?>
                            <input class="form-check-input" type="hidden" name="group_id" value="<?php echo e($groupId); ?>" >
                            <input class="form-check-input" type="hidden" name="method" value="<?php echo e($method); ?>" >
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end:List Widget 3-->
                </div>
                <!--end::Card body-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-white btn-active-light-primary me-2">Discard</button>

                    <button type="submit" class="btn btn-primary" id="assign_backlink_group">
                        <!--begin::Indicator-->
                        <span class="indicator-label">
                            <?php echo e($message); ?>

                        </span>
                        <span class="indicator-progress">
                            Please wait...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                        <!--end::Indicator-->
                    </button>
                </div>
            </form>
            <!--end::Form-->
        </div>
        <!--end::Table Widget 4-->
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a)): ?>
<?php $component = $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a; ?>
<?php unset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/pages/group/backlinks/backlink_list.blade.php ENDPATH**/ ?>