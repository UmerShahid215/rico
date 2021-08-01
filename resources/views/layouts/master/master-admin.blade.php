@include('layouts.components.header')

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
@include('layouts.partials.navigation.mobile-header-admin')
<div class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        @include('layouts.partials.navigation.nav-admin')
        <!-- end:: Header -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
                    @include('layouts.partials.sidebar-admin')
                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
                        <!-- begin:: Content -->
                    @yield('content')
                    <!-- end:: Content -->
                </div>
            @include('layouts.partials.footer')
            </div>
    </div>
</div>

<!-- end:: Page -->
@include('layouts.components.end')
