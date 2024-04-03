<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{asset('css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
    <link href="{{asset('css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
    <link href="{{asset('css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
    @yield('specail_link')
</head>
@yield('style')
<body data-sidebar="dark">
    <div id="layout-wrapper">
        @include('admin.layouts.page-sidebar')
        @include('admin.layouts.page-topbar')
        @yield('content')
    </div>

    @include('admin.layouts.right_sidebar')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>


    <script src="{{asset('/libs/jquery/jquery.min.js')}}"></script>
        
    <script src="{{asset('/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/libs/metismenu/metisMenu.min.js')}}"></script>
    <script src="{{asset('/libs/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('/libs/node-waves/waves.min.js')}}"></script>
    <script src="{{asset('/libs/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <!--Morris Chart-->
    <script src="{{asset('/libs/morris.js/morris.min.js')}}"></script>
    <script src="{{asset('/libs/raphael/raphael.min.js')}}"></script>

    <script src="{{asset('/js/pages/dashboard.init.js')}}"></script>

    <script src="{{asset('/js/app.js')}}"></script>

    @yield('script')

</body>
</html>