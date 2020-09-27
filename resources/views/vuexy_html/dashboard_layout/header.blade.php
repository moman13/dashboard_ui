<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
<meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
<meta name="author" content="PIXINVENT">

<title> {{config('dashboard-setup.title')[app()->getLocale()]}} </title>
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<link rel="apple-touch-icon" href="{{asset(config('dashboard-setup.favicon'))}}">
<link rel="shortcut icon" type="image/x-icon" href="{{asset(config('dashboard-setup.favicon'))}}">

@if ( app()->getLocale()== 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/font-rtl.css')}}">
@else
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600" rel="stylesheet">
@endif

<!-- BEGIN: Vendor CSS-->
@if ( app()->getLocale()== 'ar')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/vendors-rtl.min.css')}}">
@endif
@if ( app()->getLocale()== 'en')
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/vendors/css/vendors.min.css')}}">
@endif
<!-- BEGIN: Theme CSS-->
@if ( app()->getLocale()== 'ar')
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/bootstrap.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/bootstrap-extended.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/colors.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/components.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/themes/dark-layout.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/themes/semi-dark-layout.css')}}">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/core/colors/palette-gradient.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/pages/dashboard-analytics.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/pages/card-analytics.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/plugins/tour/tour.css')}}">

<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css-rtl/custom-rtl.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin-layout/assets/css/style-rtl.css')}}">
@else
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/core/colors/palette-gradient.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/pages/dashboard-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/pages/card-analytics.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/app-assets/css/plugins/tour/tour.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-layout/assets/css/style.css')}}">
    <!-- END: Custom CSS-->
    @endif
<script  defer src="{{ url('js/app.js') }}"></script>
<!-- END: Custom CSS-->

