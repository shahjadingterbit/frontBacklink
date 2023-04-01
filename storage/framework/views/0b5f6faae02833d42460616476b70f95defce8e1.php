<?php if (isset($component)) { $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a = $component; } ?>
<?php $component = App\View\Components\BaseLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('base-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\BaseLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php echo e(theme()->getView('layout/demo1/toolbars/_group_toolbar')); ?>

    <div class="col-xl-12 mb-5 mb-xl-10">
        <!--begin::Table Widget 4-->
        <div class="card card-flush h-xl-100">
            <!--begin::Card header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column">
                </h3>
                <!--end::Title-->
                <!--begin::Actions-->
                <div class="card-toolbar">
                    <!--begin::Filters-->
                    <div class="d-flex flex-stack flex-wrap gap-4">
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
            <!--begin::Card body-->
            <div class="card-body pt-2">
                <!--begin::Table-->
                <div id="kt_table_widget_4_table_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="table-responsive">
                        <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable no-footer" id="kt_table_widget_4_table">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                    <th class="min-w-100px sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">Group ID</th>
                                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">Group Name</th>
                                    <th class="text-end min-w-125px sorting_disabled" rowspan="1" colspan="1" style="width: 125px;">Manage Backlink</th>
                                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">Created at</th>
                                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">Action</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                <?php $i = 0; ?>
                                <?php $__currentLoopData = $groupList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $i++; ?>
                                <tr class="odd">
                                    <td>
                                        <a href="/metronic8/demo8/../demo8/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary"><?php echo e($i); ?></a>
                                    </td>
                                    <td class="text-end"><?php echo e($row['group_name']); ?> </td>
                                    <td class="text-end">
                                        <a href="<?php echo e(route('groups.backlinks.index', $row['id'])); ?>" class="btn btn-sm btn-light btn-success">
                                            Assign Backlink
                                        </a>
                                    </td>
                                    <td class="text-end"><?php echo e(date('d M, Y', strtotime($row['created_at']))); ?></td>
                                    <td class="text-end">
                                        <a class="badge py-3 px-4 fs-7 badge-light-warning" href="<?php echo e(route('groups.edit', $row['id'])); ?>">Edit</a>
                                        <a class="badge py-3 px-4 fs-7 badge-light-warning" href="<?php echo e(route('groups.destroy',$row['id'])); ?> ">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                            <!--end::Table body-->
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start"></div>
                        <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end"></div>
                    </div>
                </div>
                <!--end::Table-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Table Widget 4-->
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a)): ?>
<?php $component = $__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a; ?>
<?php unset($__componentOriginal6121507de807c98d4e75d845c5e3ae4201a89c9a); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\project-backlink\resources\views/pages/group/index.blade.php ENDPATH**/ ?>