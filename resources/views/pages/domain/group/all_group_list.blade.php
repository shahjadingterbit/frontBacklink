<x-base-layout>
    {{ theme()->getView('layout/demo1/toolbars/_toolbar-1') }}
    <div class="col-xl-12 mb-5 mb-xl-10">
        <!--begin::Table Widget 4-->
        <div class="card card-flush h-xl-100">
            <!--begin::Card header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column" style="display:inline">
                    <a href="{{ route('domains.index') }}"> All Domain </a> >>
                    <a href="{{ route('domainGroupList',$domainId) }}"> Group of {{ $domainName }} </a> >> 
                    All Group List
                </h3>
                <!--end::Title-->
                <!--begin::Actions-->
                <div class="card-toolbar">
                    <!--begin::Filters-->
                    <div class="d-flex flex-stack flex-wrap gap-4">
                        <div class="d-flex align-items-center py-1">
                            <div>
                                @if(count($assignedGroupIds) > 0)
                                @php
                                $message = "Update Group";
                                $method = "PUT";
                                @endphp
                                @else
                                @php
                                $message = "Assign Group";
                                $method = "POST";
                                @endphp
                                @endif
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
            <form id="assign_domain_to_group_form" class="form" method="POST" action="{{ route('addAndUpdateGroup') }}" enctype="multipart/form-data">
                @csrf
                <!--begin::Card body-->
                <div class="col-xl-12">
                    <!--begin::List Widget 3-->
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body pt-2">
                            @forelse($allGroupList as $row)
                            <!--begin::Item-->
                            <div class="d-flex align-items-center mb-8">
                                <!--begin::Checkbox-->
                                <div class="form-check form-check-custom form-check-solid mx-5">
                                    <input class="form-check-input" type="checkbox" name="group[]" value="{{ $row['id'] }}" @if(in_array($row['id'],$assignedGroupIds)) checked @endif>
                                </div>
                                <!--end::Checkbox-->
                                <!--begin::Description-->
                                <div class="flex-grow-1">
                                    {{ $row['group_name'] }}
                                </div>
                                <!--end::Description-->
                                @if(in_array($row['id'],$assignedGroupIds))
                                <span class="badge badge-light-success fs-8 fw-bold">Assigned</span>
                                @else
                                <span class="badge badge-light-danger fs-8 fw-bold">Not Assigned</span>
                                @endif
                            </div>
                            <!--end:Item-->
                            @empty
                            <p>No Group</p>
                            @endforelse
                            <input class="form-check-input" type="hidden" name="domain_id" value="{{ $domainId }}">
                            <input class="form-check-input" type="hidden" name="method" value="{{ $method }}">
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end:List Widget 3-->
                </div>
                <!--end::Card body-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <button type="reset" class="btn btn-white btn-active-light-primary me-2">Discard</button>

                    <button type="submit" class="btn btn-primary" id="assign_domain_group">
                        <!--begin::Indicator-->
                        <span class="indicator-label">
                            {{$message}}
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

</x-base-layout>