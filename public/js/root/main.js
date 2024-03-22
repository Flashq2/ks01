const pusher_key = $(document).find('meta[name="push_key"]').attr('content');
var pusher = new Pusher(pusher_key, {
     cluster: "ap1",
});

var notyf = new Notyf({
     duration: 3000,
 });


$(document).ready(function () {

     // For Show modal create data 
    $(document).on('click','#create-data',function(){
           try {
                let type = $(this).attr('data-type');
                let url = $(this).attr('data-url');
                let prefix = $(this).attr('data-prefix');
                $.ajax({
                    type: "POST",
                    url: `${prefix}/create-data`,
                    data: "data",
                    dataType: "dataType",
                    success: function (response) {
                         if(response.status == 'success'){
                              notyf.success(response.msg);
                         }
                         else{
                              notyf.success(response.msg);
                         }
                    }
                });
                initializingTL.TLStartloading()
           } catch (error) {
                initializingTL.TLStoptloading() 
           }
    })


    
    // Start Append Icon 
    initializingTL.TLcreateIcon()
    initializingTL.TLloading()
});