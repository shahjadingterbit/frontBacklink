<x-auth-layout>
<div class="main_login_d mx-auto">
   <div class="row">
      <div class="w-lg-500px h-600px shadow-sm p-10 p-lg-15" style="            ">
         <a href="https://seobookers.com">
         <img
            alt="Logo"
            src="https://seobookers.com/demo1/media/logos/logo-1-dark.svg"
            class="h-65px logo"
            />
         </a>
      </div>
      <div
         class="w-lg-500px h-600px p-10 p-lg-15"
         style="
         background: #f5f5f5;
         box-shadow: 0px 4px 25px 0px #00000005;
         box-shadow: -1px 0px 20px 0px #00000040 inset;
         "
         >
           <!--begin::Title-->
           <h1 class="text-dark mb-3 mt-15 fw-b-bold fs-2x text-center">
                {{ __('Sign In to SEO Bookers') }}
            </h1>
            <!--end::Title-->
            <form method="POST" action="{{ theme()->getPageUrl('login') }}" class="form w-100" novalidate="novalidate" id="kt_sign_in_form">
            @csrf
            <!--begin::Heading-->
            <div class="text-center mb-10">
               <!--begin::Title-->
               <!--end::Title-->
               <!--begin::Link-->
               <!--end::Link-->
            </div>
            <!--begin::Heading-->
            <!-- <div class="mb-10 bg-light-info p-8 rounded"><div class="text-info"> Use account <mailto:strong>admin@demo.com</strong> and password <strong>demo</strong> to continue. </div></div> -->
            <!--begin::Input group-->
            <div class="fv-row mb-5 fv-plugins-icon-container">
               <!--begin::Label-->
               <label class="form-label fs-3 text-dark-600 fw-normal mb-4">{{ __('Email') }}</label>
               <!--end::Label-->
               <!--begin::Input-->
               <input  class="form-control rounded-0 pt-4 pl-r-5 pb-4 fs-2 fw-light" placeholder="Enter Email Id" type="email" name="email" autocomplete="off" value="{{ old('email', 'demo@demo.com') }}" required autofocus />
               <!--end::Input-->
               <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-5 fv-plugins-icon-container">
               <!--begin::Wrapper-->
               <div class="d-flex flex-stack">
                  <!--begin::Label-->
                    <label class="form-label fs-2 text-dark-600 fw-normal mb-4">Password</label>
                  <!--end::Label-->
               </div>
               <!--end::Wrapper-->
               <!--begin::Input-->
               <input class="form-control rounded-0 pt-4 pl-r-5 pb-4 fs-3 fw-light" placeholder="Password" type="password" name="password" autocomplete="off" value="demo" required />
               <!--end::Input-->
               <div class="fv-plugins-message-container invalid-feedback"></div>
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-10">
               <label class="form-check form-check-custom form-check-solid">
                    <input class="form-check-input" type="checkbox" name="remember"/>
                    <span  class="form-check-label fw-normal text-gray-700 fs-6" >{{ __('Remember me') }}</span>
               </label>
            </div>
            <!--end::Input group-->
            <!--begin::Actions-->
            <div class="text-center">
               <!--begin::Submit button-->
                  <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5 rounded-0 pb-4 pt-4 fs-2"  style="background-color: #fbb03b">
                  <!--begin::Indicator-->
                  <span class="indicator-label"> Sign In </span>
                  <span class="indicator-progress"> Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2" ></span>
                  </span>
                  <!--end::Indicator-->
               </button>
            </div>
            <!--end::Actions-->
            <div></div>
         </form>
         <!--end::Signin Form-->
      </div>
   </div>
</div>
</x-auth-layout>
<style>
    .fw-b-bold {
        font-weight: 800;
    }
    .main_login_d .w-lg-500px:first-child {
        background-color: #1d1f38;
        background-image: url({{ asset(theme()->getMediaUrlPath() . 'custom/bg-login.png') }});
        display: flex;
        justify-content: center;
        background-position: -815px;
        background-size: cover;
        align-items: center;
        background-repeat: inherit;
    }

    .main_login_d input[type="text"] {
        border: 1px solid #e1e1e1;
        border-radius: 0px;
    }
    .main_login_d input:focus {
    border: 1px solid #fbb03b;
    }
</style>