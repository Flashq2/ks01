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
                                        <form class="form-horizontal mt-4" action="{{route('doLogin')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" placeholder="Enter username" name="email">
                                            </div>
                                            <div class="mb-3">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                                            </div>
                                            <div class="mb-3 row mt-4">
                                                <div class="col-6">
                                                    {{-- <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                                        <label class="form-check-label" for="customControlInline">Remember me
                                                        </label>
                                                    </div> --}}
                                                </div>
                                                <div class="col-6 text-end">
                                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                </div>
                                            </div>
                                            <div class="form-group mb-0 row">
                                                <div class="col-12 mt-4">
                                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Forgot your password?</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
       

        <!-- JAVASCRIPT -->
        <script src="{{ asset('js/root/main.js') }}"></script>
        <script src="{{ asset('js/root/main_ui.js') }}"></script>
        <script src="{{ asset('js/addon/printThis.js') }}"></script>
        <script src="{{ asset('js/addon/ladda.js') }}"></script>
        <script src="{{ asset('js/addon/spin.js') }}"></script>   
        <script src="{{ asset('js/addon/table_fixer.js') }}"></script>    

        <script src="{{ asset('js/app.js') }}"></script>

    </body>

</html>