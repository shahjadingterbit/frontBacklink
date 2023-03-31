@php
 $items = getAllDomains();
 $reportUrl = ""; 
@endphp
<!--begin::Recently viewed-->
<div data-kt-search-element="main">
    <!--begin::Items-->
    <div class="scroll-y mh-200px mh-lg-325px">        
        @foreach($items as $item)
            @if(!empty(config('dataStudioAnalytics')[$item['name']]['reportURL'])) 
                @php  $reportUrl = config('dataStudioAnalytics')[$item['name']]['reportURL']; @endphp
            @else
                @continue;
            @endif
            <!--begin::Item-->
            <div class="d-flex align-items-center mb-5 domainAnalyticsParentDiv">
                <!--begin::Title-->
                <div class="d-flex flex-column">
                    <a class="fs-6 text-gray-800 text-hover-primary fw-bold gooleDomainList" domain="{{ $item['name'] }}" reportUrl="{{ $reportUrl }}">{{ $item['name'] }}</a>
                </div>
                <!--end::Title-->
            </div>
            <!--end::Item-->
        @endforeach
    </div>
    <!--end::Items-->
</div>
<!--end::Recently viewed-->
