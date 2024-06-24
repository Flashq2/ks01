<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header" style="background: #eef2ff;">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="drag-image">
                        <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <h6>Add new Image</h6>
                        <button class="btn-browse">Browse File</button>
                        <form action="" id="formimg" enctype="multipart/form-data">
                            <input type="file" hidden class="upload-item" name="fileimage" id="fileimage" data-code= "{{$code}}" data-page ="{{$page}}" >
                            <input type="text" hidden name="code" id="code" value="{{$page}}">
                        </form>

                    </div>
                </div>
                @if (isset($record))
                    <div class="col-12 row_{{ $record->$primary_key }}">
                        
                        <div class="drag-image ">
                            <p for="">Current Image</p>
                            <img src="{{ $record->picture_ori }}" alt="">
                            
                          
                        </div>
                    </div>
                @endif

            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
</div>
