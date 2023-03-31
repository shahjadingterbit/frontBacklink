<!--begin::Heading-->
<div class="mb-13 text-center">
    <!--begin::Title-->
    <h1 class="mb-3" id="formTitleOfGroup">Create {{ strtolower($group->name) }}</h1>
    <!--end::Title-->
</div>
<!--end::Heading-->
<!--begin::Input group-->
<input type="hidden" name="group_id" value="{{ $group->id }}">
@foreach ($headings as $heading)
    <div class="d-flex flex-column mb-8 fv-row">
        <!--begin::Label-->
        <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
            <span id="titleOfFieldGroup">{{ $heading->name }}</span>
        </label>
        <!--end::Label-->
        <input type="text" class="form-control form-control-solid" placeholder="Enter {{ strtolower($heading->name) }}" id="{{ $heading->id }}" name="records[{{ $heading->id }}]" />
    </div>
@endforeach
<!--end::Input group-->
