<!--begin::Search-->
@php
   $searchID = "kt_header_search";
   $searchInputTypeID = "domainSearch";
   $searchPlaceholderValue ="Search domain";
   if (!empty($searchMainTypeID)) {
        $searchID = $searchMainTypeID;
        $searchInputTypeID = $searchInputID;
        $searchPlaceholderValue = $searchPlaceholder;
   }
@endphp
<div
    id="{{ $searchID }}"
    class="d-flex align-items-center"

    data-kt-search-keypress="true"
    data-kt-search-min-length="2"
    data-kt-search-layout="menu"

    data-kt-menu-trigger="auto"
    data-kt-menu-permanent="true"
    data-kt-menu-placement="bottom-start"
    data-kt-menu-flip="bottom">

    <!--begin::Form-->
    <form data-kt-search-element="form" class="w-100 position-relative" autocomplete="off">
        <!--begin::Hidden input(Added to disable form autocomplete)-->
        <input type="hidden"/>
        <!--end::Hidden input-->

        <!--begin::Icon-->
        {!! theme()->getSvgIcon("icons/duotune/general/gen021.svg", "svg-icon-2 search-icon position-absolute top-50 translate-middle-y ms-4") !!}
        <!--end::Icon-->

        <!--begin::Input-->
        <input type="text" class="form-control ps-13 fs-7 h-40px" name="search" value="" placeholder="{{ $searchPlaceholderValue }}" data-kt-search-element="input" id="{{ $searchInputTypeID }}"/>
        <!--end::Input-->

        <!--begin::Spinner-->
        <span class="position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-5" data-kt-search-element="spinner">
            <span class="spinner-border h-15px w-15px align-middle text-gray-400"></span>
        </span>
        <!--end::Spinner-->

        <!--begin::Reset-->
        <span class="btn btn-flush btn-active-color-primary position-absolute top-50 end-0 translate-middle-y lh-0 d-none me-4" data-kt-search-element="clear">
            {!! theme()->getSvgIcon("icons/duotune/arrows/arr061.svg", "svg-icon-2 svg-icon-lg-1 me-0") !!}
        </span>
        <!--end::Reset-->
    </form>
    <!--end::Form-->

    <!--begin::Menu-->
    <div data-kt-search-element="content" class="menu menu-sub menu-sub-dropdown w-300px w-md-270px px-7 overflow-hidden">
        <!--begin::Wrapper-->
        <div data-kt-search-element="wrapper">
            @if($searchID == 'kt_analytics_search')
                {{ theme()->getView('layout/search/partials/_googleAnalytics',array('domainName' => $domainName)) }}
            @elseif($searchID == 'kt_console_search')
                {{ theme()->getView('layout/search/partials/_consoleSearch',array('domainName' => $domainName)) }}
            @else 
                {{ theme()->getView('layout/search/partials/_main') }}
            @endif  
            {{ theme()->getView('partials/search/partials/_empty') }}
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Menu-->
</div>
<!--end::Search-->
