<!--begin:Menu item-->
@php 
    $customGroup = getCustomGroup();
@endphp
@if(!empty($customGroup['sub']['items']))
<div data-kt-menu-trigger="click"  data-kt-menu-placement="bottom-start" class="menu-item" >
   <!--begin:Menu link-->
   <span class="menu-link mainGroup">
        <span class="menu-title">Groups</span>
        <span class="menu-arrow d-lg-none"></span>
   </span>
   <!--end:Menu link-->
   <!--begin:Menu sub-->
   <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-1000px">
      <!--begin:Dashboards menu-->
      <div class="menu-active-bg pt-1 pb-3 px-3 py-lg-12 px-lg-12" data-kt-menu-dismiss="true">
         <!--begin:Row-->
         <div class="row">
            <!--begin:Col-->
            <div class="col-lg-12">
               <!--begin:Row-->
               <div class="row">
                  <!--begin:Col-->
                    @foreach($customGroup['sub']['items'] as $result)
                        <div class="col-lg-3 mb-3">
                            <!--begin:Menu item-->
                                <div class="menu-item p-0 m-0">
                                    <!--begin:Menu link-->
                                        <a href="{{ URL::to('/').'/'.$result['path'] }}" class="menu-link subGroup">
                                            <span class="menu-bullet">
                                            <span class="bullet bullet-dot bg-gray-300i h-6px w-6px"></span></span>
                                            <span class="menu-title">{{ $result['title'] }}</span>
                                        </a>
                                    <!--end:Menu link-->
                                </div>
                            <!--end:Menu item-->
                        </div>
                    @endforeach
                  <!--end:Col-->
               </div>
               <!--end:Row-->
            </div>
            <!--end:Col-->
         </div>
         <!--end:Row-->
      </div>
      <!--end:Dashboards menu-->
   </div>
   <!--end:Menu sub-->
</div>
@endif
<!--end:Menu item-->