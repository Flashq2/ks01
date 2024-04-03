@forelse ($records as $record)
    <a href="javascript:void(0);" class="text-reset notification-item">
        <div class="d-flex">
            <div class="flex-shrink-0 me-3">
                <div class="avatar-xs">
                <span class="avatar-title border-success rounded-circle ">
                    <i class="mdi mdi-cart-outline"></i>
                </span>
            </div>
            </div>
            <div class="flex-grow-1">
                <h6 class="mb-1">Your order is placed</h6>
                <div class="text-muted">
                    <p class="mb-1">If several languages coalesce the grammar</p>
                </div>
            </div>
        </div>
    </a>
@empty
        <h1>Record not found</h1>
@endforelse


