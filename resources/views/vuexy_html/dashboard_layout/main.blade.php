<!DOCTYPE html>
@if ( app()->getLocale()== 'ar')
<html class="loading" lang="ar" data-textdirection="rtl">
@else
    <html class="loading" lang="en" data-textdirection="ltr">
    @endif
<!-- BEGIN: Head-->

<head>
    @include('layouts.header')
    @stack('style')
    <style>
        table.data-list-view.dataTable thead th:first-child, table.data-thumb-view.dataTable thead th:first-child {
            padding-left: 25px !important;
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->
<body class="vertical-layout vertical-menu-modern 2-columns  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

<!-- BEGIN: Header - horizontal-header -->
@include('layouts.horizontal-menu')
<!-- END: Header  - horizontal-header -->


<!-- BEGIN: Main Menu- sidebar-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    @include('layouts.sidebar')
</div>
<!-- END: Main Menu-->

<!-- BEGIN: Content-->
<div id="app">
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">

                @yield('content')


        </div>
    </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>

<!-- BEGIN: Footer-->
<footer class="footer footer-static footer-light">
    @include('layouts.footer')
</footer>
<!-- END: Footer-->
</div>
<script  src="{{asset('admin-layout/app-assets/vendors/js/vendors.min.js')}}"></script>

<script src="{{asset('admin-layout/app-assets/js/core/app-menu.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/js/core/app.js')}}"></script>
<script src="{{asset('admin-layout/app-assets/js/scripts/components.js')}}"></script>
@stack('script')

</body>
<!-- END: Body-->

</html>