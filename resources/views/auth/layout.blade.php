@extends('base.base')

@section('content')
    <div class="d-flex flex-column flex-root">
        <!--begin::Authentication-->
        <div
            class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed">

            <!--begin::Content-->
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <!--begin::Logo-->
                <a href="{{ $theme->getPageUrl('') }}" class="mb-12">
                    <!-- <img alt="Logo" src="{{ asset(theme()->getMediaUrlPath() . 'logos/default.svg') }}" class="h-45px"/> -->
                </a>
                <!--end::Logo-->
                <!--begin::Wrapper-->
                    {{ $slot }}
                <!--end::Wrapper-->
            </div>
            <!--end::Content-->

            <!--begin::Footer-->
           <div class="d-flex flex-center flex-column-auto p-10">
                <!--begin::Links-->
                <div class="d-flex align-items-center fw-bold fs-6">
                    <a href="{{ $theme->getOption("general", "about") }}" class="text-muted text-hover-primary px-2">{{ __('About') }}</a>

                    <a href="{{ $theme->getOption('general', 'contact') }}" class="text-muted text-hover-primary px-2">{{ __('Contact Us') }}</a>

                    <a href="{{ $theme->getOption('product', 'purchase') }}" class="text-muted text-hover-primary px-2">{{ __('Purchase') }}</a>
                </div>
                <!--end::Links-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Authentication-->
    </div>
@endsection
