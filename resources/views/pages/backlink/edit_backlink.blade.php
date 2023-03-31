<x-base-layout>
    {{ theme()->getView('layout/demo1/toolbars/_toolbar-1') }}
    <!--begin::Basic info-->
    <div class="card mb-5 mb-xl-10">
        <!--begin::Card header-->
        <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#backlink_details" aria-expanded="true" aria-controls="backlink_details">
            <!--begin::Card title-->
            <div class="card-title m-0">
                <h3 class="fw-bolder m-0">{{ __('Edit') }} {{ $backlinkData['backlink_domain']  }}</h3>
            </div>
            <!--end::Card title-->
        </div>
        <!--begin::Card header-->
        <!--begin::Content-->
        <div id="backlink_details" class="collapse show">
            <!--begin::Form-->
            <form id="backlink_details_form" class="form" method="POST" action="{{ route('backlinks.update', $backlinkData['id']) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Input backlink-->
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('Backlink domain') }}</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row">
                                    <input type="text" name="backlink_domain" id="backlink_domain" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Backlink domain" value="{{ old('backlink_domain', $backlinkData['backlink_domain'] ?? '') }}" />
                                    <input type="hidden" name="backlink_id" id="backlink_id" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" value="{{ old('id', $backlinkData['id'] ?? '') }}" />
                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label required fw-bold fs-6">{{ __('Backlink type') }}</label>
                        <!--end::Label-->

                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-12 fv-row">
                                    <input type="text" name="type" id="type" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Backlink type" value="{{ old('backlink_domain', $backlinkData['type'] ?? '') }}" />

                                </div>
                                <!--end::Col-->
                            </div>
                            <!--end::Row-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Input backlink-->
                </div>
                <!--end::Card body-->
                <!--begin::Actions-->
                <div class="card-footer d-flex justify-content-end py-6 px-9">
                    <a type="reset" class="btn btn-white btn-active-light-primary me-2">{{ __('Discard') }}</a>
                    <button type="submit" class="btn btn-primary" id="backlink_details_submit">
                        @include('partials.general._button-indicator', ['label' => __('Save Changes')])
                    </button>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Basic info-->
</x-base-layout>