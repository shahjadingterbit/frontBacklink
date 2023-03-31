<x-base-layout>
<div class="card card-custom">
    <div class="card-header">
    <h1 class="mt-4">Edit Value For {{ ucfirst($group->name) }} Group</h1>
        <!--begin::Card toolbar-->
        <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-customer-table-toolbar="base">
                    <!--begin::Add customer-->
                    <a type="button" class="btn btn-primary"  href="{{ route('groups.headings', ['group_id' => $group->id]) }}">List for  {{ $group->name }}</a>
                    <!--end::Add customer-->
                </div>
                <!--end::Toolbar-->
                
            </div>
            <!--end::Card toolbar-->
    </div>
    <!--begin::Form-->
    <form  action="{{ route('heading_records.update', $unique_row_num) }}" method="post" id="heading_details_form">
        @csrf
        @method('PUT')
        <input type="hidden" name="group_id" value="{{ $group->id }}">
        <input type="hidden" name="unique_row_num" value="{{ $unique_row_num}}">
        <div class="card-body">
            <div class="form-group row row mb-6">
                <label class="col-lg-3 col-form-label text-right">Group</label>
                <div class="col-lg-6 fv-row">
                    <input type="text"  class="form-control"  id="group" value="{{ $group->name }}" disabled />
                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                </div>
            </div>
            @foreach ($headings as $heading)
                <div class="form-group row row mb-6">
                    <label for="{{ $heading['id'] }}" class="col-lg-3 col-form-label text-right">{{ $heading['name'] }}</label>
                    <div class="col-lg-6 fv-row">
                        <input type="text" class="form-control" id="{{ $heading['id'] }}" value="{{ $headingList[$heading['id']] ?? ''}}"
                        name="records[{{ $heading['id'] }}]">
                    </div>
                </div>
            @endforeach
        </div>
        <div class="card-footer">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-6">
                    <button type="submit" class="btn font-weight-bold btn-primary mr-2" id="heading_details_submit">Submit</button>
                    <button type="reset" class="btn font-weight-bold btn-secondary">Cancel</button>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
</div>
</x-base-layout>