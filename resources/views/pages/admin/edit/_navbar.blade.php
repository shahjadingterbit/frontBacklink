<!--begin::Navbar-->
<div class="card {{ $class }}">
    <div class="card-body pt-9 pb-0">
        <!--begin::Details-->
        <div class="d-flex flex-wrap flex-sm-nowrap mb-3">
           <!--begin::Info-->
            <div class="flex-grow-1">
                <!--begin::Title-->
                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                    <!--begin::User-->
                    <div class="d-flex flex-column">
                        <!--begin::Name-->
                        <div class="d-flex align-items-center mb-2">
                            <a href="#" class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">{{ $user->name }}</a>
                            <a href="#">
                                {!! theme()->getSvgIcon("icons/duotune/general/gen026.svg", "svg-icon-1 svg-icon-primary") !!}
                            </a>
                            <a href="#" class="btn btn-sm btn-light-success fw-bolder ms-2 fs-8 py-1 px-3" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">{{ __('Upgrade to Pro') }}</a>
                        </div>
                        <!--end::Name-->
                        <!--begin::Info-->
                        <div class="d-flex flex-wrap fw-bold fs-6 mb-4 pe-2">                           
                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                {!! theme()->getSvgIcon("icons/duotune/communication/com011.svg", "svg-icon-4 me-1") !!}
                                {{ $user->email }}
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
    </div>
</div>
<!--end::Navbar-->
