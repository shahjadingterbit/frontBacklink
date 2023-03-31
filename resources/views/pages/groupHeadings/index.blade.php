<x-base-layout>
<div id="kt_app_content" class="app-content flex-column-fluid">
<!--begin::Content container-->
<div id="kt_app_content_container" class="app-container container-xxl">
    <!--begin::Card-->
    <div class="card">
    <!--begin::Card header-->
    <div class="card-header border-0 pt-6">
        <!--begin::Card title-->
        <div class="card-title">
        <!--begin::Search-->
        <div class="d-flex align-items-center position-relative my-1">
        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
            <!--begin::Add customer-->
            <h1 class="mt-4">List Of {{ ucfirst($group->name) }} Group</h1>
            <!--end::Add customer-->
        </div>
        </div>
        <!--end::Search-->
        </div>
        <!--begin::Card title-->
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
        <!--begin::Toolbar-->
        <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
            <!--begin::Add customer-->
            <a type="button" class="btn btn-primary"  href="{{ route('groups.heading_records.create', ['group_id' => $group->id]) }}">Add Record</a>
            <!--end::Add customer-->
        </div>
        <!--end::Toolbar-->
        <!--begin::Group actions-->
        <div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
            <div class="fw-bold me-5">
            <span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
            </div>
            <button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">
            Delete Selected
            </button>
        </div>
        <!--end::Group actions-->
        </div>
        <!--end::Card toolbar-->
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_heading_table">
        <!--begin::Table head-->
        <thead>
            <!--begin::Table row-->
            <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
            <th class="min-w-125px">
                S. No
            </th>
            @foreach ($headings as $heading)
                <th class="min-w-125px">{{ $heading['name'] }}</th>
            @endforeach
            @can('edit_' . $permission_for, 'delete_' . $permission_for)
                <th class="text-end min-w-70px">Actions</th></tr>
            @endcan
            
            </tr>
            <!--end::Table row-->
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="fw-semibold text-gray-600">
            @foreach ($records as $unique_row_num => $record)
            <tr>
                <td>{{ $loop->iteration }}</td>
                @foreach ($headings as $heading)
                    <td>{{ $record[$heading['id']] ?? '' }}</td>
                @endforeach
            @can('edit_' . $permission_for, 'delete_' . $permission_for)
            <!--begin::Action=-->
            <td class="text-center">
                @can('edit_' . $permission_for)
                <a href="{{ route('groups.heading_records.edit', ['unique_row_num' => $unique_row_num]) }}" class="btn btn-sm btn-light btn-active-light-primary">
                    Edit
                </a>
                @endcan
                @can('delete_' . $permission_for)
                <form class="d-inline" action="{{ route('heading_records.destroy', $unique_row_num) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-light btn-active-light-primary" onclick="return confirm('Are you sure you want to delete this item')">Delete</button>
                </form>
                @endcan
            </td>
            <!--end::Action=-->
            @endcan
            </tr>
            @endforeach
            
        </tbody>
        <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>
<!--end::Content container-->
</div>
</x-base-layout>
