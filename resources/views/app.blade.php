<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="chrome=1">
    <title>SS5-Project</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png"><!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{asset("/css/toastr.min.css")}}">
    <link rel="stylesheet" href="{{asset("/css/style.css")}}">
    <script src="https://kit.fontawesome.com/bca9825c0c.js" crossorigin="anonymous"></script>
</head>
<script nonce="zQ9FkUTHFWktk7qOoZlz+A==">
    var calcHeight = function() {
        var headerDimensions = $('.preview__header').height();
        $('.full-screen-preview__frame').height($(window).height() - headerDimensions);
    }

    $(document).ready(function() {
        calcHeight();
    });

    $(window).resize(function() {
        calcHeight();
    }).load(function() {
        calcHeight();
    });

</script>
</head>
@yield('style')
<body class="full-screen-preview">
    <div id="main-wrapper">
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <nav class="navbar">
                            <div class="header-search d-flex align-items-center"><a class="brand-logo mr-3"
                                    href="index.html"><img src="{{asset("/img/logo.jpg")}}" alt="" width="30"></a>
                                <form action="#">
                                    <div class="input-group"><input type="text" class="form-control"
                                            placeholder="Search">
                                        <div class="input-group-append"><span class="input-group-text"
                                                id="basic-addon2"><i class="fa fa-search"></i></span></div>
                                    </div>
                                </form>
                            </div>
                            <div class="dashboard_log">
                                <div class="d-flex align-items-center">
                                    <div class="profile_log dropdown">
                                        <div class="user" data-toggle="dropdown"><span class="thumb"><i class="fa-regular fa-user"></i></span> <span class="name">Maria
                                                Pascle</span> <span class="arrow"><i class="fa-solid fa-chevron-down"></i></span></div>
                                        <div class="dropdown-menu dropdown-menu-right"><a href="accounts.html"
                                                class="dropdown-item"><i class="mdi mdi-account"></i> Account </a><a
                                                href="history.html" class="dropdown-item"><i class="la la-book"></i>
                                                History </a><a href="settings.html" class="dropdown-item"><i
                                                    class="la la-cog"></i> Setting </a><a href="lock.html"
                                                class="dropdown-item"><i class="la la-lock"></i> Lock </a><a
                                                href="signin.html" class="dropdown-item logout"><i
                                                    class="la la-sign-out"></i> Logout</a></div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="sidebar">
            <div class="brand-logo"><a href="index.html"><img src="{{asset("/img/logo.jpg")}}" alt=""></a></div>
            <div class="menu">
                <ul>
                    <li><a href="{{url('/dashboard/home')}}" data-toggle="tooltip" data-placement="right" title="Home"><span><i class="fa-solid fa-house"></i></span></a></li>
                    <li><a href="{{url('/sale/sale')}}" data-toggle="tooltip" data-placement="right" title="Buy Sale"><span><i class="fa-brands fa-buy-n-large"></i></span></a></li>
                    <li><a href="{{url('/setting/setting')}}" data-toggle="tooltip" data-placement="right" title="Accounts"><span><i class="fa-solid fa-file-invoice"></i></span></a></li>
                    <li><a href="{{url('/setting/setting')}}" data-toggle="tooltip" data-placement="right" title="Settings"><span><i class="fa-solid fa-gear"></i></span></a></li>
                    <li class="logout"><a href="signin.html" data-toggle="tooltip" data-placement="right"
                            title="Signout"><span><i class="fa-solid fa-gear"></i></span></a></li>
                </ul>
                <p class="copyright">&#169; <a href="#">Quixlab</a></p>
            </div>
        </div>
        <div class="page_title">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="page_title-content">
                            <p>Welcome Back, <span>Maria Pascle</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            @yield('content')
        </div>
    </div>
    <script src="{{asset("/js/jquery.min.js")}}"></script>
    <script src="{{asset("/js/bootstrap.bundle.min.js")}}"></script>
    <script src="{{asset("/js/toastr.min.js")}}"></script>
    <script src="{{asset("/js/toastr-init.js")}}"></script>
    <script src="{{asset("/js/circle-progress.min.js")}}"></script>
    <script src="{{asset("/js/circle-progress-init.js")}}"></script><!--  flot-chart js -->
    <script src="{{asset("/js/apexcharts.min.js")}}"></script>
    <script src="{{asset("/js/apexchart-init.js")}}"></script>
    <script src="{{asset("/js/apexchart2-init.js")}}"></script>
    <script src="{{asset("/js/scripts.js")}}"></script>
    <script src="{{asset("/js/raw_script.js")}}"></script>
    @yield('script')



</body>

</html>
