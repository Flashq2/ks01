<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico"> 
        
        <link href="{{ asset('css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
        <script src="https://js.pusher.com/8.0.1/pusher.min.js"></script>

    </head>
    <style>
        .background{
            background-color: #93DDFF;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='100%25' height='100%25' viewBox='0 0 1200 800'%3E%3Cdefs%3E%3CradialGradient id='a' cx='0' cy='800' r='800' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23d0e6fc'/%3E%3Cstop offset='1' stop-color='%23d0e6fc' stop-opacity='0'/%3E%3C/radialGradient%3E%3CradialGradient id='b' cx='1200' cy='800' r='800' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23d0dafd'/%3E%3Cstop offset='1' stop-color='%23d0dafd' stop-opacity='0'/%3E%3C/radialGradient%3E%3CradialGradient id='c' cx='600' cy='0' r='600' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23ffe3fa'/%3E%3Cstop offset='1' stop-color='%23ffe3fa' stop-opacity='0'/%3E%3C/radialGradient%3E%3CradialGradient id='d' cx='600' cy='800' r='600' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%2393DDFF'/%3E%3Cstop offset='1' stop-color='%2393DDFF' stop-opacity='0'/%3E%3C/radialGradient%3E%3CradialGradient id='e' cx='0' cy='0' r='800' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23FFEFF8'/%3E%3Cstop offset='1' stop-color='%23FFEFF8' stop-opacity='0'/%3E%3C/radialGradient%3E%3CradialGradient id='f' cx='1200' cy='0' r='800' gradientUnits='userSpaceOnUse'%3E%3Cstop offset='0' stop-color='%23FFD6FB'/%3E%3Cstop offset='1' stop-color='%23FFD6FB' stop-opacity='0'/%3E%3C/radialGradient%3E%3C/defs%3E%3Crect fill='url(%23a)' width='1200' height='800'/%3E%3Crect fill='url(%23b)' width='1200' height='800'/%3E%3Crect fill='url(%23c)' width='1200' height='800'/%3E%3Crect fill='url(%23d)' width='1200' height='800'/%3E%3Crect fill='url(%23e)' width='1200' height='800'/%3E%3Crect fill='url(%23f)' width='1200' height='800'/%3E%3C/svg%3E");
            background-attachment: fixed;
            background-size: cover;
            height: 100vh;
        }
      
    </style>

    <body>
        <div class="background">
            <div class="account-pages ">
                <div class="container ">
                    <div class="row justify-content-center">
                        <div class="col-md-8 col-lg-6 col-xl-5">
                            <div class="card overflow-hidden my-5 pt-sm-5">
                                <div class="card-body pt-0">
    
                                    <h3 class="text-center mt-5 mb-4">
                                        <a href="index.html" class="d-block auth-logo">
                                            <img src="assets/images/logo-dark.png" alt="" height="30" class="auth-logo-dark">
                                            <img src="assets/images/logo-light.png" alt="" height="30" class="auth-logo-light">
                                        </a>
                                    </h3>
    
                                    <div class="p-3">
                                        <h4 class="text-muted font-size-18 mb-1 text-center">Welcome Back !</h4>
                                        <p class="text-muted text-center">Sign in to continue to system</p>
                                        @if (session('error'))
                                            <div class="alert alert-danger" role="alert">
                                               Incorrect email or password!, Please try again.
                                            </div>
                                         @endif
                                         <div class="card mt-5 p-3">
                                            <div id="otp_target"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        <!-- JAVASCRIPT -->
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
        <script src="https://cdn.jsdelivr.net/gh/HichemTab-tech/OTP-designer-jquery@2.3.0/dist/otpdesigner.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#otp_target').otpdesigner({
                    typingDone: function (code) {
                        console.log('Entered OTP code: ' + code);
                    },
                });

                function submitOtpCode(code){
                    
                }

                // $('#ok').on('click', function () {
                //     let result = $('#otp_target').otpdesigner('code');
                //     if (result.done) {
                //         alert('Entered OTP code: ' + result.code);
                //     } else {
                //         alert('Typing incomplete!');
                //     }
                // });
            });
        </script>

    </body>

</html>