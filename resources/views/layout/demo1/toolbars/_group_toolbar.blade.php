<!--begin::Toolbar-->
@if(theme()->getOption('page', 'domainUrl'))
<div class="toolbar" id="kt_toolbar">
    <!--begin::Container-->
    <div id="kt_toolbar_container" class="{{ theme()->printHtmlClasses('toolbar-container', false) }} d-flex flex-stack">
        @if (theme()->getOption('layout', 'page-title/display') && theme()->getOption('layout', 'header/left') !== 'page-title')
            @if(!empty($domainName))
                {{ theme()->getView('layout/page-title/_default', array('domainName' => $domainName,'searchMainTypeID' => $searchMainTypeID,'searchInputID' => $searchInputID,'searchPlaceholder' => $searchPlaceholder)) }}
            @endif
        @endif
		<!--begin::Actions-->
        @if(theme()->getOption('page', 'buttonName'))
            <div class="d-flex align-items-center py-1">
                <!--begin::Wrapper-->
                <div>
                    @if(theme()->getOption('page', 'buttonName') == 'Create Domain')
                        <a href="{{ route('domains.index') }}" class="btn btn-sm btn-primary fw-bolder">
                                All Domains
                        </a>
                        <a href="{{ route('exportAllDomains') }}" class="btn btn-sm btn-primary fw-bolder">
                                Export All Domains
                        </a>
                    @endif
                    <a href="{{ URL::to('/').theme()->getOption('page', 'path') }}" class="btn btn-sm btn-primary fw-bolder">
                        {{ theme()->getOption('page', 'buttonName') }}
                    </a>
                </div>
                <!--end::Wrapper-->
            </div>
        @endif
		<!--end::Actions-->
    </div>
    <!--end::Container-->
</div>
@endif
<!--end::Toolbar-->
