<div class="modal fade" aria-labelledby="divConfigTelegramLabel" aria-hidden="true" id="divConfigTelegram" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="background: #eef2ff;">
            <h5 class="modal-title" id="exampleModalLabel">Provide Your Info</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <h5>Before you start please confirtm that :</h5>
                <ul>
                    <li>Please make sure you alreay connect with our bot ,<a href="https://t.me/setecs_bot">see more .</a></li>
                    <li>Go to bot and type /start</li>
                </ul>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" id="m-delete" class="btn btn-primary" data-prefix = "{{$prefix ?? ''}}" data-code = "" onclick="getId(this)">Get ID</button>
          </div>
        </div>
      </div>

</div>