<x-base-layout>
    {{ theme()->getView('layout/demo1/toolbars/_toolbar-1') }}
    <div class="col-xl-12 mb-5 mb-xl-10">
        <!--begin::Table Widget 4-->
        <div class="card card-flush h-xl-100">
            <!--begin::Card header-->
            <div class="card-header pt-7">
                <!--begin::Title-->
                <h3 class="card-title align-items-start flex-column" style="display:inline">
                    @if(!empty($userName))
                    Domain List of <a href="{{ route('users.index') }}"> {{ $userName }} </a>
                    @endif
                </h3>
                <!--end::Title-->
                <!--begin::Actions-->
                <div class="card-toolbar">
                    <!--begin::Filters-->
                    <div class="d-flex flex-stack flex-wrap gap-4">
                        <div class="d-flex align-items-center py-1">
                            <div>
                                @if(count($userDomainList) > 0)
                                @php $message = "Add Domain"; @endphp
                                @else
                                @php $message = "Assign Domain"; @endphp
                                @endif
                                <a href="{{ route('assignDomain', $userId) }}" class="btn btn-sm btn-primary fw-bolder">{{$message}}
                                </a>
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
                                    <th class="min-w-100px sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">#</th>
                                    <th class="text-end min-w-100px sorting_disabled" rowspan="1" colspan="1" style="width: 100px;">Domain</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="fw-bold text-gray-600">
                                @php $i = 0; @endphp
                                @forelse($userDomainList as $row)
                                @php $i++; @endphp
                                <tr class="odd">
                                    <td>
                                        <a href="/metronic8/demo8/../demo8/apps/ecommerce/catalog/edit-product.html" class="text-gray-800 text-hover-primary">{{ $i }}</a>
                                    </td>
                                    <td class="text-end">{{ $row['domain'] }} </td>
                                </tr>
                                @empty
                                <p>No Domain</p>
                                @endforelse
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

</x-base-layout>