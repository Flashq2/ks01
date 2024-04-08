<div class="modal fade" aria-labelledby="divDeleteRecordLabel" aria-hidden="true" id="divDeleteRecord" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background: #eef2ff;">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5>Do you want to delete this record ? </h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="m-delete" class="btn btn-primary" data-prefix = "{{$prefix ?? ''}}" data-code = "" onclick="DeleteData(this)">Yes</button>
          </div>
        </div>
      </div>

</div>