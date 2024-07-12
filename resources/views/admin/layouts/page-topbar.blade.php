<style>
    #notificationToggle{
        overflow: scroll;
    }
</style>

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <button type="button" class="btn btn-sm px-3 font-size-24 header-item vertical-menu-btn">
                <i class="mdi mdi-menu"></i>
            </button>
        </div>

        <div class="d-flex">
            @include('admin.component.input.search_page')
            @include('admin.component.element.expend')
            @include('admin.component.action.message')
            @include('admin.component.template.user_path')
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect" onclick="showRightbar(this)">
                    <i class="mdi mdi-spin mdi-cog"></i>
                </button>
            </div>
        </div>
    </div>
</header>