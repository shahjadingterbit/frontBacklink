<!--begin::Modal - New Target-->
<div class="modal fade" id="kt_modal_new_target" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content rounded">
            <!--begin::Modal header-->
            <div class="modal-header pb-5 justify-content-space-between gap-5">
                <!--begin::Close-->
                <div class="header-content">
                    <!--begin::Title-->
                    <h6 class="mb-0">Select Value</h6>
                    <a  class="btn btn-sm fw-bold btn-primary" id="custom_group_modal">Add new value</a>
                    <!--end::Title-->
                </div>
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                <!--begin:Form-->
                <form id="kt_modal_new_target_form" class="form mt-5" action="{{ route('project_logs.addAndUpdate') }}" method="post">
                    @csrf
                    <!--begin::Heading-->
                    
                    <!--end::Heading-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-stack mb-8 radio-btns-group">
                        <!--begin::Switch-->

                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input filterButtonValue showAll" type="checkbox" id="showAllGropupValue" value="1" checked="checked" />
                            <span class="form-check-label fw-semibold text-white">Show All</span>
                        </label>

                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input filterButtonValue usedAll" id="usedAllGropupValue" type="checkbox" value="1" checked="checked" disabled />
                            <span class="form-check-label fw-semibold text-white">Used</span>
                        </label>

                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <input class="form-check-input filterButtonValue notUsedAll" id="notUsedAllGropupValue" type="checkbox" value="1" checked="checked" disabled/>
                            <span class="form-check-label fw-semibold text-white">Not Used</span>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--end::Input group-->
                    
                    <!--begin::Input group-->
                    <div class="row g-9 mb-8">
                        <!--begin::Col-->
                        <div class="col-md-12 fv-row" id="keywordListing">
                            
                        </div>
                        <!--end::Col-->
                        <input type="hidden" name="projectLogId" value="0" id="projectLogId">
                        <input type="hidden" value="0" id="groupIDValue">
                    </div>
                    <!--end::Input group-->
                     <!--begin::Actions-->
                     <div class="text-center">
                        <button  class="btn btn-primary" id="kt_modal_group_value">
                            <span class="indicator-label">update</span>
                        </button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end:Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - New Target-->
