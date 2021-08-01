<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

    <!-- begin:: Aside -->
    <div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
        <div class="kt-aside__brand-logo">
            <a href="{{url('/')}}">
                RICO
{{--                <img alt="Logo" src="assets/media/logos/logo-12.png">--}}
            </a>
        </div>
        <div class="kt-aside__brand-tools">
            <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
        </div>
    </div>

    <!-- end:: Aside -->

    <!-- begin:: Aside Menu -->
    <div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">
            <ul class="kt-menu__nav ">
                <li class="kt-menu__item  {{ request()->routeIs('supervisor.dashboard') ? ' kt-menu__item--active' : '' }}" aria-haspopup="true"><a href="{{ route('supervisor.dashboard') }}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-architecture-and-city"></i><span class="kt-menu__link-text">Dashboard</span></a></li>

                <li class="kt-menu__item {{ request()->routeIs('supervisor.employee.*') ? ' kt-menu__item--active' : '' }}" aria-haspopup="true"><a href="{{route('supervisor.employee.index')}}" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-users"></i><span class="kt-menu__link-text">Employees</span></a></li>

                <li class="kt-menu__item  {{ request()->routeIs('supervisor.forms.*') || request()->routeIs('supervisor.form.*') ? ' kt-menu__item--active' : '' }}" aria-haspopup="true"><a href="{{route('supervisor.forms.index')}}" class="kt-menu__link "><i class="kt-menu__link-icon fas fa-users"></i><span class="kt-menu__link-text">Show Forms</span></a></li>
            </ul>
        </div>
    </div>

    <!-- end:: Aside Menu -->
</div>
