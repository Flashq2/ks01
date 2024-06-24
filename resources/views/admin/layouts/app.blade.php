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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
  
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
    
    .swiper {
      width: 100%;
      height: 200px;
      margin-left: auto;
      margin-right: auto;
    }

    .swiper-slide {
      background-size: cover;
      background-position: center;
    }

    .mySwiper2 {
      height: 80%;
      width: 100%;
    }

    .mySwiper {
      height: 20%;
      box-sizing: border-box;
      padding: 10px 0;
    }

    .mySwiper .swiper-slide {
      width: 25%;
      height: 100%;
      opacity: 0.4;
    }

    .mySwiper .swiper-slide-thumb-active {
      opacity: 1;
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      object-fit: contain;
    }
</style>

<style>
    .left_side_img {
        width: 100%;
        height: 200px;
        border: 1px solid rgba(128, 128, 128, 0.237);
        border-style: dashed;
        margin-bottom: 5px;
        border-radius: 50% 50%;
        overflow: hidden;
    }

    .left_side_img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    h3 {
        margin: 10px 0;
    }

    h6 {
        margin: 5px 0;
        text-transform: uppercase;
    }

    p {
        font-size: 14px;
        line-height: 21px;
    }

    .card-container {
        background-color: #f5f5f5;
        border-radius: 5px;
        box-shadow: 0px 10px 20px -10px rgba(0, 0, 0, 0.75);
        color: #B3B8CD;
        padding-top: 30px;
        position: relative;
        width: 350px;
        max-width: 100%;
        text-align: center;
    }

    .card-container .pro {
        color: #f5f5f5;
        background-color: #FEBB0B;
        border-radius: 3px;
        font-size: 14px;
        font-weight: bold;
        padding: 3px 7px;
        position: absolute;
        top: 30px;
        left: 30px;
    }

    .card-container .round {
        width: 200px;
        height: 200px;
        border: 1px solid #03BFCB;
        border-radius: 50%;
        padding: 7px;
        object-fit: cover ;
    }

    button.primary {
        background-color: #03BFCB;
        border: 1px solid #03BFCB;
        border-radius: 3px;
        color: #f5f5f5;
        font-family: Montserrat, sans-serif;
        font-weight: 500;
        padding: 10px 25px;
    }

    button.primary.ghost {
        background-color: transparent;
        color: #02899C;
    }

    .skills {
        background-color: #f5f5f5;
        text-align: left;
        padding: 15px;
        margin-top: 30px;
    }

    .skills ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    .skills ul li {
        border: 1px solid #2D2747;
        border-radius: 2px;
        display: inline-block;
        font-size: 12px;
        margin: 0 7px 7px 0;
        padding: 7px;
    }

    footer {
        background-color: #222;
        color: #fff;
        font-size: 14px;
        bottom: 0;
        position: fixed;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 999;
    }

    footer p {
        margin: 10px 0;
    }

    footer i {
        color: red;
    }

    footer a {
        color: #3c97bf;
        text-decoration: none;
    }
    .drag-image {
            border: 1px dashed #91ace5;
            height: 250px;
            width: 100%;
            border-radius: 5px;
            font-weight: 400;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            margin-top: 20px;
        }

        .drag-image.active {
            border: 2px solid #91ace5;
        }

        .drag-image .icon {
            font-size: 30px;
            color: #91ace5;
        }

        .drag-image h6 {
            font-size: 20px;
            font-weight: 300;
            color: #91ace5;
        }

        .drag-image span {
            font-size: 14px;
            font-weight: 300;
            color: #91ace5;
            margin: 10px 0 15px 0;
        }

        .drag-image button {
            padding: 10px 25px;
            font-size: 14px;
            font-weight: 300;
            border: none;
            outline: none;
            background: transparent;
            color: #91ace5;
            border: 1px solid #91ace5;
            border-radius: 5px;
            cursor: pointer;
            transition: all 0.5s;
        }

        .drag-image button:hover {
            background-color: #256088;
            color: white;
        }

        .drag-image img {
            width: 100%;
            height: 70%;
            object-fit: contain;
        }

        .list-img {
            width: 100px !important;
            height: 100px !important;
            object-fit: contain !important;
        }

        .control-table {
            overflow: auto !important;
        }

        .table_list_imge {
            width: 50px;
            height: 50px;
            overflow: hidden;
            border-radius: 50%;

        }

        .table_list_imge img {
            width: 100%;
            height: 100%;
            object-fit: contain;

        }

        .delete_image {
            background: #853939;
        }
        .title_of_header{
        width: 100%;
        text-align: right;
        margin-bottom: 10px;
        font-size: 20px;
    }
    .main-title{
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
        margin-top: 20px;
        font-size: 30px;
        text-decoration: underline;
    }
    .title_img{
        width: 300px;
        height: 100px;

    }
    .title_img img{
        width: 100%;
        height: 100%;
        object-fit: contain ;
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
        <div class="modal fade" aria-labelledby="divDataUploadImage" aria-hidden="true" id="divDataUploadImage" role="dialog">
            {{-- Do not add any code here , it will overwrite when modal is load --}}
        </div>
        <div class="modal fade" aria-labelledby="divUpdloadImage" aria-hidden="true" id="divUpdloadImage" role="dialog">
             {{-- Do not add any code here , it will overwrite when modal is load --}}
        </div>
         {{-- Modal Delete Record in page Card --}}
        @include('admin.component.modal_confirm_delete')
        {{-- @include('admin.component.modal_upload_excel') --}}
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
    <script src="{{ asset('js/addon/printThis.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/addon/ladda.js') }}"></script>
    <script src="{{ asset('js/addon/spin.js') }}"></script>   
    <script src="{{ asset('js/addon/table_fixer.js') }}"></script>    
    <script src="{{ asset('libs/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('libs/tinymce/tinymce.min.js')}}"></script>
    <script src="{{ asset('js/root/main.js') }}"></script>
    <script src="{{ asset('js/root/main_ui.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/10.10.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.12.1/firebase-app-compat.js"></script>
    <script src="https://www.gstatic.com/firebasejs/9.12.1/firebase-auth-compat.js"></script>
    <script src="{{ asset('/js/addon/firebases.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    @yield('script')

</body>

</html>
