@php
    $chartColor = $chartColor ?? 'primary';
    $chartHeight = $chartHeight ?? '175px';
@endphp

<!--begin::Mixed Widget 2-->
{{-- <div class="card {{ $class }}">
    <!--begin::Header-->
    <div class="card-header border-0 bg-{{ $chartColor }} py-5">
        <h3 class="card-title fw-bolder text-white">Seo Sheet</h3>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body p-0">
        <!--begin::Chart-->
        <div class="bg-{{ $chartColor }}" style="height: {{ $chartHeight }}"></div>
        <!--end::Chart-->

        <!--begin::Stats-->
        <div class="card-p mt-n20 position-relative">
            <!--begin::Row-->
            <div class="row g-0">
                <!--begin::Col-->
                <div class="col bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
                    {!! theme()->getSvgIcon("icons/duotune/general/gen032.svg", "svg-icon-3x svg-icon-warning d-block my-2") !!}
                    <a href="{{ route('groups.index') }}" class="text-warning fw-bold fs-6">
                        Group
                    </a>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col bg-light-primary px-6 py-8 rounded-2 mb-7">
                    {!! theme()->getSvgIcon("icons/duotune/communication/com001.svg", "svg-icon-3x svg-icon-primary d-block my-2") !!}
                    <a href="{{ route('domains.index') }}" class="text-primary fw-bold fs-6">
                        Domains
                    </a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->

            <!--begin::Row-->
            <div class="row g-0">
                <!--begin::Col-->
                <div class="col bg-light-danger px-6 py-8 rounded-2 me-7">
                    {!! theme()->getSvgIcon("icons/duotune/technology/teh002.svg", "svg-icon-3x svg-icon-danger d-block my-2") !!}
                    <a href="{{ route('roles.index') }}" class="text-danger fw-bold fs-6 mt-2">
                         Roles 
                    </a>
                </div>
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col bg-light-success px-6 py-8 rounded-2">
                    {!! theme()->getSvgIcon("icons/duotune/maps/map007.svg", "svg-icon-3x svg-icon-success d-block my-2") !!}
                    <a href="{{ route('locations.index') }}" class="text-success fw-bold fs-6 mt-2">
                        Location
                    </a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Stats-->
    </div>
    <!--end::Body-->
</div> --}}
<!--end::Mixed Widget 2-->
