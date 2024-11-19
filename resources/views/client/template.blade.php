<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quickeat - index</title>
    <link rel="icon" href="assets/img/fav-icon.png">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('client/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/client/css/owl.theme.default.min.css') }}">
    <!-- nice-select -->
    <link rel="stylesheet" href="{{ asset('/client/css/nice-select.css') }}">
    <!-- aos -->
    <link rel="stylesheet" href="{{ asset('/client/css/aos.css') }}">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('/client/css/style.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('/client/css/responsive.css') }}">
    <!-- color -->
    <link rel="stylesheet" href="{{ asset('/client/css/color.css') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('libs/sweetalert2/sweetalert2.min.css')}}" /> 


    <!-- Font Awesome 5 -->
    <script src="https://kit.fontawesome.com/27a041baf1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">

    <style>
        /** CSS RESET **/

        html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        /* HTML5 display-role reset for older browsers */
        article,
        aside,
        details,
        figcaption,
        figure,
        footer,
        header,
        hgroup,
        menu,
        nav,
        section {
            display: block;
        }

        body {
            line-height: 1;
        }

        ol,
        ul {
            list-style: none;
        }

        blockquote,
        q {
            quotes: none;
        }

        blockquote:before,
        blockquote:after,
        q:before,
        q:after {
            content: '';
            content: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }
/* 
        body {
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", "Noto Sans", "Liberation Sans", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            background: #111216;
            font-size: 15px;
            font-weight: 400;
            line-height: 1.4285em;
        } */




        .custom-toast-container {
            position: fixed;
            right: 0;
            bottom: 0;
            z-index: 1050;
            margin-bottom: 1rem;
        }

        .custom-toast {
            opacity: 0;
            transform: translateY(100%);
            transition: opacity 0.3s, transform 0.3s;
            width: 330px;
            height: auto;
            padding: 10px 15px;
            background-color: #ffffff;
            border-radius: 140px;
            box-shadow: 0 9px 10px rgb(0 0 0 / 29%);
            margin-right: 1rem;
            align-items: center;
            display: flex;
            margin-bottom: 0.5rem;
        }

        .custom-toast.show {
            opacity: 1;
            transform: translateY(0);
        }

        .custom-toast .icon-container {
            display: flex;
            align-items: center;
            margin-right: 10px;
        }

        .custom-toast .icon-container>svg {
            height: 34px;
        }

        .custom-toast .content-container {
            display: flex;
            flex-direction: column;
            flex: 1;
        }

        .custom-toast .content-container .title {
            font-weight: 600;
            font-size: 15px;
        }

        .custom-toast .content-container .message {
            font-size: 14px;
            font-weight: 400;
            color: #111215;
        }

        .custom-toast>button {
            background-color: transparent;
            font-size: 25px;
            color: #9b9dab;
            cursor: pointer;
            border: 0;
            padding: 0;
            margin: 0;
            height: 34px;
            width: 34px;
        }

        .custom-toast.success .icon-container>svg {
            fill: #47D764;
        }

        .custom-toast.success .content-container .title {
            color: #47d764;
        }

        .custom-toast.error .icon-container>svg {
            fill: #ff355b;
        }

        .custom-toast.error .content-container .title {
            color: #ff355b;
        }

        .custom-toast.info .icon-container>svg {
            fill: #2F86EB;
        }

        .custom-toast.info .content-container .title {
            color: #2F86EB;
        }

        .custom-toast.warning .icon-container>svg {
            fill: #FFC021;
        }

        .custom-toast.warning .content-container .title {
            color: #FFC021;
        }

        .custom-toast-container .custom-toast:last-child {
            margin-bottom: 1rem;
        }

        @media (max-width: 568px) {
            .custom-toast {
                margin: auto 0.5rem;
                left: 0;
                right: 0;
                width: calc(100% - 1rem);
                margin-bottom: 0.5rem;
            }

            .custom-toast-container {
                margin: 0;
            }
        }
    </style>
</head>

<body class="menu-layer">


    <!-- loader start-->
    <div class="page-loader">
        <div class="wrapper">
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="circle"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <div class="shadow"></div>
            <span>Loading</span>
        </div>
    </div>
    <!-- loader end-->

    <!-- header -->
    <header>
        <div class="container">
            <div class="row align-items-center">
                @include('client.header')
                <div class="menu-wrap">
                    <div class="menu-inner ps ps--active-x ps--active-y">
                        <span class="menu-cls-btn"><i class="cls-leftright"></i><i class="cls-rightleft"></i></span>
                        <div class="checkout-order">
                            <div class="title-checkout">
                                <h2>My Orders</h2>
                            </div>
                            <div class="banner-wilmington">
                                <img alt="logo" src="https://via.placeholder.com/50x50">
                                <h6>Kennington Lane Cafe</h6>
                            </div>
                            <ul>
                                <li class="price-list">
                                    <i class="closeButton fa-solid fa-xmark"></i>
                                    <div class="counter-container">
                                        <div class="counter-food">
                                            <img alt="food" src="https://via.placeholder.com/100x67">
                                            <h4>Pasta, kiwi and sauce chilli</h4>
                                        </div>
                                        <h3>$39</h3>
                                    </div>
                                    <div class="price">
                                        <div>
                                            <h2>$39</h2>
                                            <span>Sum</span>
                                        </div>
                                        <div>
                                            <div class="qty-input">
                                                <button class="qty-count qty-count--minus" data-action="minus"
                                                    type="button">-</button>
                                                <input class="product-qty" type="number" name="product-qty"
                                                    min="0" value="1">
                                                <button class="qty-count qty-count--add" data-action="add"
                                                    type="button">+</button>
                                            </div>
                                            <span>Quantity</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="price-list">
                                    <i class="closeButton fa-solid fa-xmark"></i>
                                    <div class="counter-container">
                                        <div class="counter-food">
                                            <img alt="food" src="https://via.placeholder.com/100x67">
                                            <h4>Rice with shrimps and kiwi</h4>
                                        </div>
                                        <h3>$49</h3>
                                    </div>
                                    <div class="price">
                                        <div>
                                            <h2>$49</h2>
                                            <span>Sum</span>
                                        </div>
                                        <div>
                                            <div class="qty-input">
                                                <button class="qty-count qty-count--minus" data-action="minus"
                                                    type="button">-</button>
                                                <input class="product-qty" type="number" name="product-qty"
                                                    min="0" value="1">
                                                <button class="qty-count qty-count--add" data-action="add"
                                                    type="button">+</button>
                                            </div>
                                            <span>Quantity</span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <div class="totel-price">
                                <span>Total order:</span>
                                <h5>$137</h5>
                            </div>
                            <div class="totel-price">
                                <span>To pay:</span>
                                <h2>$137</h2>
                            </div>
                            <button class="button-price">Checkout</button>

                        </div>
                    </div>
                </div>
                <div class="mobile-nav hmburger-menu" id="mobile-nav" style="display:block;">


                    <div class="res-log">
                        <a href="index.html">
                            <svg xmlns="http://www.w3.org/2000/svg" width="163" height="38" viewBox="0 0 163 38">
                                <g id="Logo" transform="translate(-260 -51)">
                                    <g id="Logo-2" data-name="Logo" transform="translate(260 51)">
                                        <g id="Elements">
                                            <path id="Path_1429" data-name="Path 1429"
                                                d="M315.086,140.507H275.222v-.894c0-11.325,8.941-20.538,19.933-20.538s19.931,9.213,19.931,20.538Z"
                                                transform="translate(-270.155 -115.396)" fill="#f29f05" />
                                            <path id="Path_1430" data-name="Path 1430"
                                                d="M301.13,133.517a1.488,1.488,0,0,1-1.394-.994,11.361,11.361,0,0,0-10.583-7.54,1.528,1.528,0,0,1,0-3.055,14.353,14.353,0,0,1,13.37,9.527,1.541,1.541,0,0,1-.875,1.966A1.444,1.444,0,0,1,301.13,133.517Z"
                                                transform="translate(-264.176 -113.935)" fill="#fff" />
                                            <path id="Path_1431" data-name="Path 1431"
                                                d="M297.343,146.544a14.043,14.043,0,0,1-13.837-14.211h2.975a10.865,10.865,0,1,0,21.723,0h2.975A14.043,14.043,0,0,1,297.343,146.544Z"
                                                transform="translate(-266.247 -108.544)" fill="#363636" />
                                            <path id="Path_1432" data-name="Path 1432"
                                                d="M302.183,132.519a7.064,7.064,0,1,1-14.122,0Z"
                                                transform="translate(-264.027 -108.446)" fill="#363636" />
                                            <path id="Path_1433" data-name="Path 1433"
                                                d="M320.332,134.575H273.3a1.528,1.528,0,0,1,0-3.055h47.033a1.528,1.528,0,0,1,0,3.055Z"
                                                transform="translate(-271.815 -108.923)" fill="#f29f05" />
                                            <path id="Path_1434" data-name="Path 1434"
                                                d="M289.154,123.4a1.507,1.507,0,0,1-1.487-1.528v-3.678a1.488,1.488,0,1,1,2.975,0v3.678A1.508,1.508,0,0,1,289.154,123.4Z"
                                                transform="translate(-264.154 -116.667)" fill="#f29f05" />
                                            <path id="Path_1435" data-name="Path 1435"
                                                d="M284.777,138.133H275.3a1.528,1.528,0,0,1,0-3.055h9.474a1.528,1.528,0,0,1,0,3.055Z"
                                                transform="translate(-270.84 -107.068)" fill="#363636" />
                                            <path id="Path_1436" data-name="Path 1436"
                                                d="M284.8,141.691h-6.5a1.528,1.528,0,0,1,0-3.055h6.5a1.528,1.528,0,0,1,0,3.055Z"
                                                transform="translate(-269.379 -105.218)" fill="#363636" />
                                        </g>
                                    </g>
                                    <text id="Quickeat" transform="translate(320 77)" fill="#363636" font-size="20"
                                        font-family="Poppins" font-weight="700">
                                        <tspan x="0" y="0">QUICK</tspan>
                                        <tspan y="0" fill="#f29f05">EAT</tspan>
                                    </text>
                                </g>
                            </svg>
                        </a>
                    </div>
                    <ul>

                        <li><a href="index.html">Home</a>
                        </li>

                        <li><a href="about.html">About Us</a></li>

                        <li class="menu-item-has-children"><a href="JavaScript:void(0)">Restaurants</a>

                            <ul class="sub-menu">

                                <li><a href="restaurants.html">Restaurants</a></li>
                                <li><a href="restaurant-card.html">Restaurant Card</a></li>
                                <li><a href="checkout.html">Checkout</a></li>
                            </ul>

                        </li>
                        <li class="menu-item-has-children"><a href="JavaScript:void(0)">Pages</a>

                            <ul class="sub-menu">

                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="single-blog.html">Single Blog</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="pricing-table.html">Pricing Table</a></li>
                                <li><a href="become-partner.html">Become A Partner</a></li>
                                <li><a href="404.html">404</a></li>
                            </ul>

                        </li>

                        <li><a href="contact.html">contacts</a></li>

                    </ul>

                    <a href="JavaScript:void(0)" id="res-cross"></a>
                </div>
            </div>
        </div>
    </header>
    @yield('content')

    <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>


    <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    

    </script>
    <!-- jQuery -->
    <script src="{{ asset('client/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('client/js/jquery.nice-select.min.js') }}"></script>
    <!-- owl.carousel -->
    <script src="{{ asset('client/js/owl.carousel.min.js') }}"></script>
    <!-- aos -->
    <script src="{{ asset('client/js/aos.js') }}"></script>
    <!-- custom -->
    <script src="{{ asset('client/js/custom.js') }}"></script>
    <script src="{{ asset('client/js/toast-plugin.js') }}"></script>
    <script src="{{ asset('client/js/toast-plugin-min.js') }}"></script>

    <script src="{{ asset('libs/sweetalert2/sweetalert2.all.min.js')}}"></script>
    <script src="{{ asset('qrcode.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>
    @yield('script')
    <script>
        var notyf = new Notyf({
            duration: 3000,
        });
        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $(document).ready(function() {
           
        });

        function addItemToCard(ctrl) {
            let item_no = $(ctrl).attr("data-id");
            let qty = $(`#item-${item_no}`).val();

            $.ajax({
                type: "POST",
                url: "/add-to-card",
                data:{
                    qty,item_no
                },
                success: function(response) {
                    console.log(response)
                    notyf.success("Item Add to card");
                }
            });
        }
    </script>
</body>
