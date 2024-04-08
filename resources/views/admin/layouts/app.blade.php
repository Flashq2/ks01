<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="push_key" content="{{ env('PUSHER_APP_KEY') }}" />
    <meta name="render_prefix" content="{{ $prefix ?? '' }}" />
    <title>@yield('title')</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/datetime_picker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/addon/ladda.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/main/main.css') }}" rel="stylesheet" type="text/css" />
    <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
    <link href="{{ asset('/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
    <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css')}}" /> 
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('specail_link')
</head>
<style>
 
    .bootstrap-select .form-control:focus {
        outline: 0px none #fff !important;
    }

    .bootstrap-select .form-control>div.filter-option:focus {
        outline: 0px none #fff !important;
    }

    .bootstrap-select .form-control>div.filter-option>div.filter-option-inner:focus {
        outline: 0px none #fff !important;
    }

    .bootstrap-select .form-control>div.filter-option>div.filter-option-inner>div.filter-option-inner-inner:focus {
        outline: 0px none #fff !important;
    }

    .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered .select2-selection__placeholder {
        font-weight: 100;
        line-height: -9.5;
        color: #393c3d;
        font-size: 12px;
    }

    .form-control:focus {
        border-color: #87bff7;
        box-shadow: inset 0 1px 1px #ffff, 0 0 8px rgba(255, 255, 255, 0.6) !important;
    }

    .select2-search__field:focus {
        border-color: #87bff7 !important;
        box-shadow: inset 0 1px 1px #ffffff, 0 0 8px rgba(255, 255, 255, 0.6) !important;
    }

    .padding_form {
        padding: 8px;
    }

    .select2-container--bootstrap-5 .select2-dropdown .select2-results__options .select2-results__option.select2-results__message {
        color: #a2aab1;
        font-size: 10px;
    }

    .select2-container--bootstrap-5 .select2-dropdown .select2-search .select2-search__field {
        display: block;
        width: 100%;
        padding: .375rem .75rem;
        font-family: inherit;
        font-size: 1rem;
        font-weight: 400;
        line-height: 1.5;
        color: #6b6e70;
        background-color: #fff;
        background-clip: padding-box;
        border: 1px solid #ced4da;
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        border-radius: .25rem;
        transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        font-size: 12px;
    }
    .select2-container--bootstrap-5 .select2-dropdown .select2-results__options .select2-results__option {
        padding: .375rem .75rem;
        font-size: 12px;
        font-weight: 400;
        line-height: 1.5;
    }
    .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
        padding: 0;
        font-weight: 400;
        line-height: 2.5;
        color: #1f2431;
        font-size: 11px;
    }
    .app-search .form-control{
        background: #ffff;
    }
    .app-search i {
        position: absolute;
        z-index: 10;
        font-size: 13px;
        line-height: 38px;
        right: 16px;
        top: 0;
        color: var(--bs-header-item-color);
    }
    .app-search span{
        right: 50px;
    }
    
    .mdi-spin:before {
        -webkit-animation: mdi-spin 0s infinite linear;
        animation: mdi-spin 0s infinite linear;
    }
    .table{
        table-layout: fixed !important;
        width: 1800px;
   
    }
</style>
@yield('style')
@include('admin.layouts.page-topbar')

<body data-sidebar="dark">
    <div id="recaptcha-container"></div>
    <div id="preloader">
        <div id="status">
            <div class="spinner-chase">
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
                <div class="chase-dot"></div>
            </div>
        </div>
    </div>
    <div id="layout-wrapper">
        @include('admin.layouts.page-sidebar')
        @yield('content')
        {{-- Modal Create Or Update Data in page Card --}}
        <div class="modal fade" aria-labelledby="divDataFlowLabel" aria-hidden="true" id="divDataFlow" role="dialog">
            {{-- Do not add any code here , it will overwrite when modal is load --}}
        </div>
         {{-- Modal Delete Record in page Card --}}
        @include('admin.component.modal_confirm_delete')
        @include('admin.component.modal_upload_excel')
        @include('admin.component.modal_config_telegram')
        {{-- Print This for print table layout --}}
        <div class="print" style="display: none">
            <div class="printThis">

            </div>
        </div>
    </div>


    <!-- /Right-bar -->
    @include('admin.layouts.right_sidebar')
    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>
   

    <script src="{{ asset('libs/jquery/jquery.min.js') }}"></script>

    <script src="{{ asset('libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js">
    </script>
    <!--Morris Chart-->
    <script src="{{ asset('libs/morris.js/morris.min.js') }}"></script>
    <script src="{{ asset('libs/raphael/raphael.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    <script src="{{ asset('js/pages/dashboard.init.js') }}"></script>

    <script src="{{ asset('js/pages/select2.js') }}"></script>
    <script src="{{ asset('js/pages/datetime_picker.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- <script src="https://www.gstatic.com/firebasejs/4.3.0/firebase.js"></script> --}}
    <script src="https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js"></script>
    {{-- <script src="https://www.gstatic.com/firebasejs/10.10.0/firebase-analytics.js"></script> --}}
    <script src="https://www.gstatic.com/firebasejs/9.12.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.12.1/firebase-auth-compat.js"></script>

    <script src="{{ asset('/js/addon/firebases.js') }}"></script>
    {{-- https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js --}}
    <script src="{{ asset('js/root/main.js') }}"></script>
    <script src="{{ asset('js/root/main_ui.js') }}"></script>
    <script src="{{ asset('js/addon/printThis.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/addon/ladda.js') }}"></script>
    <script src="{{ asset('js/addon/spin.js') }}"></script>   
    <script src="{{ asset('js/addon/table_fixer.js') }}"></script>    
    <script src="{{ asset('libs/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('libs/tinymce/tinymce.min.js')}}"></script>
    @yield('script')

</body>

</html>
