@php
    $logoFileName = 'backlink.png';
   
@endphp
<!--begin::Header-->
<div id="kt_header" style="" class="header {{ theme()->printHtmlClasses('header', false) }} align-items-stretch" {{ theme()->printHtmlAttributes('header') }}>
	<!--begin::Container-->
	<div class="{{ theme()->printHtmlClasses('header-container', false) }} d-flex align-items-stretch justify-content-between">
		<!--begin::Aside mobile toggle-->
		@if (theme()->getOption('layout', 'aside/display') === true)
			<div class="d-flex align-items-center d-lg-none ms-n3 me-1" data-bs-toggle="tooltip" title="Show aside menu">
				<div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
					{!! theme()->getSvgIcon("icons/duotune/abstract/abs015.svg", "svg-icon-2x mt-1") !!}
				</div>
			</div>
		@endif
		<!--end::Aside mobile toggle-->

		@if (theme()->getOption('layout', 'aside/display') === false)
			<!--begin::Logo-->
			
			<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0 me-lg-15">
				<a href="{{ theme()->getPageUrl('') }}">
					<img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/' . $logoFileName) }}" class="h-55px logo"/>
				</a>
			</div>
			<!--end::Logo-->
			<!-- Start Search Input -->
			{{-- <div class="aside-search py-3" style="border-top: 1px solid #2D2D43;border-bottom: 1px solid #2D2D43;padding: 0 25px;">
				{{ theme()->getView('layout/search/_base') }}
			</div> --}}
			<!-- End Search Input -->
		@else
			<!--begin::Mobile logo-->
			<div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
				<a href="{{ theme()->getPageUrl('') }}" class="d-lg-none">
					<img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/default.svg') }}" class="h-15px"/>
				</a>
			</div>
			<!--end::Mobile logo-->
		@endif

		<!--begin::Wrapper-->
		<div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
			<!--begin::Navbar-->
			@if(theme()->getOption('layout', 'header/left') === 'menu')
				<div class="d-flex align-items-stretch" id="kt_header_nav">
                    {{ theme()->getView('layout/header/_menu') }}
				</div>
			@elseif(theme()->getOption('layout', 'header/left') === 'page-title')
				<div class="d-flex align-items-center" id="kt_header_nav">
					{{ theme()->getView('layout/page-title/_' . theme()->getOption('layout', 'page-title/layout')) }}
				</div>
			@endif
			<!--end::Navbar-->

			<!--begin::Topbar-->
	        <div class="d-flex align-items-stretch flex-shrink-0">
                {{ theme()->getView('layout/header/__topbar') }}
			</div>
			<!--end::Topbar-->
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Container-->
</div>
<!--end::Header-->
