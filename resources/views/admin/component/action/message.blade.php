<div class="dropdown d-inline-block ms-1">
    <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown"
        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="ti-bell"></i>
        <span class="badge text-bg-danger rounded-pill" id="totalNotifi">
            <?php $count = CountNotifi() ;?>
            {{$count}}
        </span>
    </button>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
        aria-labelledby="page-header-notifications-dropdown">
        <div class="p-3">
            <div class="row align-items-center">
                <div class="col">
                    <h5 class="m-0"> Notifications</h5>
                </div>
            </div>
        </div>
        <div data-simplebar style="max-height: 230px;" id="notificationToggle">
        </div>
        <div class="p-2 border-top">
            <a class="btn btn-sm btn-link font-size-14 w-100 text-center" href="javascript:void(0)">
                View all
            </a>
        </div>
    </div>
</div>