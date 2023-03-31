@php $items = getAllDomains(); @endphp
<!--begin::Recently viewed-->
<div data-kt-search-element="main">
    <!--begin::Heading-->
    <div class="d-flex flex-stack fw-bold mb-5">
        <!--begin::Label-->
        <!-- <span class="text-muted fs-6 me-2">Recently Searched</span> -->
        <!--end::Label-->

       {{-- <div class="d-flex" data-kt-search-element="toolbar">
            <!--begin::Preferences toggle-->
            <div data-kt-search-element="preferences-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-2" data-bs-toggle="tooltip" title="Show search preferences">
                {!! theme()->getSvgIcon("icons/duotune/coding/cod001.svg", "svg-icon-1") !!}
            </div>
            <!--end::Preferences toggle-->

            <!--begin::Advanced search toggle-->
            <div data-kt-search-element="advanced-options-form-show" class="btn btn-icon w-20px btn-sm btn-active-color-primary me-n1" data-bs-toggle="tooltip" title="Show more search options">
                {!! theme()->getSvgIcon("icons/duotune/arrows/arr072.svg", "svg-icon-2") !!}
            </div>
            <!--end::Advanced search toggle-->
        </div> --}}
        <!--end::Toolbar-->
    </div>
    <!--end::Heading-->

    <!--begin::Items-->
    <div class="scroll-y mh-200px mh-lg-325px">        
        @foreach($items as $item)
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-5 domainParentDiv">
                <!--begin::Title-->
                <div class="d-flex flex-column">
                    <a href="{{ route('domains.project_logs.show',  ['domain_id' => $item['id']]) }}" class="fs-6 text-gray-800 text-hover-primary fw-bold domainList" domain="{{ $item['name'] }}">{{ $item['name'] }}</a>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Item-->
        @endforeach
    </div>
    <!--end::Items-->
</div>
<!--end::Recently viewed-->
