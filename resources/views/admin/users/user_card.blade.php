@extends('admin.layouts.app')
@section('title')
    systemPageTitle
@endsection
@section('content')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-sm-6">
                    <div class="page-title-box">
                        <h4>Email Compose</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Email</a></li>
                                <li class="breadcrumb-item active">Email Compose</li>
                            </ol>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="state-information d-none d-sm-block">
                        <div class="state-graph">
                            <div id="header-chart-1" data-colors='["--bs-primary"]'></div>
                            <div class="info">Balance $ 2,317</div>
                        </div>
                        <div class="state-graph">
                            <div id="header-chart-2" data-colors='["--bs-info"]'></div>
                            <div class="info">Item Sold 1230</div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <!-- Left sidebar -->
                    <div class="email-leftbar card">
                        <div class="d-grid">
                            <a href="email-compose.html" class="btn btn-danger rounded btn-custom waves-effect waves-light">Compose</a>
                        </div>
                        <h5 class="mt-4">Labels</h5>
 
                    </div>
                    <!-- End Left sidebar -->

                    <!-- Right Sidebar -->
                    <div class="email-rightbar mb-3">

                        <div class="card">
                            <div class="card-body">
 
                            </div>

                        </div>

                    </div>
                    <!-- end Col-9 -->

                </div>

            </div>
            <!-- End row -->

        </div> <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    © <script>document.write(new Date().getFullYear())</script> Lexa <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                </div>
            </div>
        </div>
    </footer>
</div>
@endsection
@section('script')
     
@endsection