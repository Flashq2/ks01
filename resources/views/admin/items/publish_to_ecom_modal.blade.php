<style>
    .custome-bg-info{
        background: rgb(172 225 240) !important;
        padding: 10px;
        border-left-color: #eef2ff ;
        border-left: 5px solid #125deb ;
        font-size: 16px;
    }
</style>
<div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header" style="background: #eef2ff;">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="custome-bg-info">
                        Do you want to update this record ?
                    </div>
                </div>
            </div>
          
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="m-delete" class="btn btn-primary"
                data-prefix = "{{ $prefix ?? '' }}">Yes</button>
        </div>
    </div>
</div>
