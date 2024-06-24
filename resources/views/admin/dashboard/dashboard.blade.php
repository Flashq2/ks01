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
                        <h4>Dashboard</h4>
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Lexa</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
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
                <div class="col-xl-3 col-sm-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-cube-outline float-end"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Total Customer</h6>
                                <h2 class="mb-4 text-white">{{$total_customer}}</h2>
                                <span class="badge bg-info"> 0% </span> <span class="ms-2">Since Last week</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-buffer float-end"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Total Vendor</h6>
                                <h2 class="mb-4 text-white">{{$total_vendor}}</h2>
                                <span class="badge bg-danger"> 0% </span> <span class="ms-2">From previous period</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-tag-text-outline float-end"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Total User</h6>
                                <h2 class="mb-4 text-white">{{$total_user}}</h2>
                                <span class="badge bg-warning"> 0% </span> <span class="ms-2">From previous period</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6">
                    <div class="card mini-stat bg-primary">
                        <div class="card-body mini-stat-img">
                            <div class="mini-stat-icon">
                                <i class="mdi mdi-briefcase-check float-end"></i>
                            </div>
                            <div class="text-white">
                                <h6 class="text-uppercase mb-3 font-size-16 text-white">Total Employee</h6>
                                <h2 class="mb-4 text-white">{{$total_employee}}</h2>
                                <span class="badge bg-info"> +89% </span> <span class="ms-2">From previous period</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Monthly Earnings</h4>

                            <div class="row text-center mt-4">
                                <div class="col-6">
                                    <h5 class="font-size-20">$56241</h5>
                                    <p class="text-muted">Marketplace</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-20">$23651</h5>
                                    <p class="text-muted">Total Income</p>
                                </div>
                            </div>

                            <div id="morris-donut-example" data-colors='["#f0f1f4","--bs-primary","--bs-info"]' class="morris-charts morris-charts-height" dir="ltr"></div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body" style="height:450px">
                            <h4 class="card-title mb-4">Slide Show</h4>
                            <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff" class="swiper mySwiper2">
                                <div class="swiper-wrapper">
                                   @foreach ($slide_show as $slide)
                                    <div class="swiper-slide">
                                        <img src="{{$slide->picture_ori}}" />
                                    </div>
                                   @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                              </div>
                              <div thumbsSlider="" class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @foreach ($slide_show as $slide)
                                    <div class="swiper-slide">
                                        <img src="{{$slide->picture_ori}}" />
                                    </div>
                                   @endforeach
                                </div>
                              </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Monthly Earnings</h4>

                            <div class="row text-center mt-4">
                                <div class="col-6">
                                    <h5 class="font-size-20">$ 2548</h5>
                                    <p class="text-muted">Marketplace</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-size-20">$ 6985</h5>
                                    <p class="text-muted">Total Income</p>
                                </div>
                            </div>

                            <div id="morris-bar-stacked" data-colors='["--bs-info","#f0f1f4"]' class="morris-charts morris-charts-height" dir="ltr"></div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-3">Inbox</h4>
                            <div class="inbox-wid">
                                @foreach ($r_customer as $customer)
                                    <a href="#" class="text-dark">
                                        <div class="inbox-item">
                                            <div class="inbox-item-img float-start me-3"><img src="{{$customer->picture_ori}}" class="avatar-sm rounded-circle" alt=""></div>
                                            <h6 class="inbox-item-author mb-1 font-size-16">{{$customer->name}}</h6>
                                            <p class="inbox-item-text text-muted mb-0">{{$customer->address}}.</p>
                                            <p class="inbox-item-date text-muted">{{$customer->created_at}}</p>
                                        </div>
                                    </a>
                                @endforeach
                              

                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Undread Chat</h4>

                            <ol class="activity-feed mb-0">
                                @foreach ($un_reads as $un_read)
                                <li class="feed-item">
                                    <div class="feed-item-list">
                                        <span class="date">From : {{$un_read->from_user}}</span>
                                        <span class="activity-text">{{$un_read->message_data}}</span>
                                    </div>
                                </li>
                                @endforeach
                                
                                 
                            </ol>

                            <div class="text-center">
                                <a href="#" class="btn btn-sm btn-primary">Load More</a>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-xl-4">
                    <div class="card widget-user">
                        <div class="widget-user-desc p-4 text-center bg-primary position-relative">
                            <i class="fas fa-quote-left h2 text-white-50"></i>
                            <p class="text-white mb-0">The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe the same vocabulary. The languages only in their grammar.</p>
                        </div>
                        <div class="p-4">
                            <div class="float-start mt-2 me-3">
                                <img src="assets/images/users/user-2.jpg" alt="" class="rounded-circle avatar-sm">
                            </div>
                            <h6 class="mb-1 font-size-16 mt-2">Marie Minnick</h6>
                            <p class="text-muted mb-0">Marketing Manager</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Yearly Sales</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div>
                                        <h3>52,345</h3>
                                        <p class="text-muted">The languages only differ grammar</p>
                                        <a href="#" class="text-primary">Learn more <i class="mdi mdi-chevron-double-right"></i></a>
                                    </div>
                                </div>
                                <div class="col-md-8 text-end">
                                    <div id="sparkline" data-colors='["--bs-primary"]'></div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->
            
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Transactions</h4>

                            <div class="table-responsive">
                                <table class="table align-middle table-centered table-vertical table-nowrap">

                                    <tbody>
                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-2.jpg" alt="user-image" class="avatar-xs rounded-circle me-2" /> Herbert C. Patton
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                            <td>
                                                $14,584
                                                <p class="m-0 text-muted font-size-14">Amount</p>
                                            </td>
                                            <td>
                                                5/12/2016
                                                <p class="m-0 text-muted font-size-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-3.jpg" alt="user-image" class="avatar-xs rounded-circle me-2" /> Mathias N. Klausen
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-warning"></i> Waiting payment</td>
                                            <td>
                                                $8,541
                                                <p class="m-0 text-muted font-size-14">Amount</p>
                                            </td>
                                            <td>
                                                10/11/2016
                                                <p class="m-0 text-muted font-size-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-4.jpg" alt="user-image" class="avatar-xs rounded-circle me-2" /> Nikolaj S. Henriksen
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                            <td>
                                                $954
                                                <p class="m-0 text-muted font-size-14">Amount</p>
                                            </td>
                                            <td>
                                                8/11/2016
                                                <p class="m-0 text-muted font-size-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-5.jpg" alt="user-image" class="avatar-xs rounded-circle me-2" /> Lasse C. Overgaard
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-danger"></i> Payment expired</td>
                                            <td>
                                                $44,584
                                                <p class="m-0 text-muted font-size-14">Amount</p>
                                            </td>
                                            <td>
                                                7/11/2016
                                                <p class="m-0 text-muted font-size-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <img src="assets/images/users/user-6.jpg" alt="user-image" class="avatar-xs rounded-circle me-2" /> Kasper S. Jessen
                                            </td>
                                            <td><i class="mdi mdi-checkbox-blank-circle text-success"></i> Confirm</td>
                                            <td>
                                                $8,844
                                                <p class="m-0 text-muted font-size-14">Amount</p>
                                            </td>
                                            <td>
                                                1/11/2016
                                                <p class="m-0 text-muted font-size-14">Date</p>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Latest Orders</h4>

                            <div class="table-responsive">
                                <table class="table align-middle table-centered table-vertical table-nowrap mb-1">

                                    <tbody>
                                        <tr>
                                            <td>#12354781</td>
                                            <td>
                                                <img src="assets/images/users/user-1.jpg" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Riverston Glass Chair
                                            </td>
                                            <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                            <td>
                                                $185
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>#52140300</td>
                                            <td>
                                                <img src="assets/images/users/user-2.jpg" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Shine Company Catalina
                                            </td>
                                            <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                            <td>
                                                $1,024
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>#96254137</td>
                                            <td>
                                                <img src="assets/images/users/user-3.jpg" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Trex Outdoor Furniture Cape
                                            </td>
                                            <td><span class="badge rounded-pill bg-danger">Cancel</span></td>
                                            <td>
                                                $657
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>#12365474</td>
                                            <td>
                                                <img src="assets/images/users/user-4.jpg" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Oasis Bathroom Teak Corner
                                            </td>
                                            <td><span class="badge rounded-pill bg-warning">Shipped</span></td>
                                            <td>
                                                $8451
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>#85214796</td>
                                            <td>
                                                <img src="assets/images/users/user-5.jpg" alt="user-image" class="avatar-xs me-2 rounded-circle" /> BeoPlay Speaker
                                            </td>
                                            <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                            <td>
                                                $584
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>#12354781</td>
                                            <td>
                                                <img src="assets/images/users/user-6.jpg" alt="user-image" class="avatar-xs me-2 rounded-circle" /> Riverston Glass Chair
                                            </td>
                                            <td><span class="badge rounded-pill bg-success">Delivered</span></td>
                                            <td>
                                                $185
                                            </td>
                                            <td>
                                                5/12/2016
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Edit</button>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->


        </div>
        <!-- container-fluid -->
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
    <script>
        var swiper = new Swiper(".mySwiper", {
        loop: true,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
        });
        var swiper2 = new Swiper(".mySwiper2", {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        thumbs: {
            swiper: swiper,
        },
        });
    </script>
    <script>
        const prefix = "{{ $prefix }}";
        $(document).ready(function() {
            $(".table").tableFixer({"head" : false, "left" : 1}); 
            initializingTL.TLSelect2('inactived');
            $(document).on('click', '.m-confirm-submit', function(e) {
                let code = $(this).data('code');
            })
        });
    </script>
@endsection