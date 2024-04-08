<div class="modal fade" aria-labelledby="divUpdloadExcelLabel" aria-hidden="true" id="divUpdloadExcel" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background: #eef2ff;">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Upload {{createHeaderTitle($prefix ?? '')}} by Excel Template</h4>
                    <p class="card-title-desc text-danger">System will overwrite your data, if record is already exist in database !</p>

                    <form id="formExcel">
                        <div class="mb-3">
                            <label class="form-lable">Select your excel template </label>
                            <input type="file" class="filestyle" data-buttonname="btn-secondary" id="uploadExcel" name="uploadExcel" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);"><div class="bootstrap-filestyle input-group"><div name="filedrag" style="position: absolute; width: 100%; height: 33.1px; z-index: -1;"></div><input type="text" class="form-control " placeholder="" disabled="" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;"> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="filestyle-0" style="margin-bottom: 0;" class="btn btn-success btn-triggerExcel"><span class="buttonText">Choose file</span></label></span></div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="m-delete" class="btn btn-primary" data-prefix = "{{$prefix ?? ''}}" data-code = "" onclick="uploadExcell(this)">Upload</button>
          </div>
        </div>
      </div>

</div>