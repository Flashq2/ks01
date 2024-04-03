const pusher_key = $(document).find('meta[name="push_key"]').attr("content");
const render_prefix = $(document).find('meta[name="render_prefix"]').attr("content");
var pusher = new Pusher(pusher_key, {
    cluster: "ap1",
});
var notyf = new Notyf({
    duration: 3000,
});

$(document).ready(function () {
    var channel = pusher.subscribe("init_realtime_data");
    channel.bind("realtime", (data) => {
            notififcation(data) ;
    });


    $('.btn-triggerExcel').on('click',function(e){
        $('#uploadExcel').trigger('click');
    })

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // For Show modal create data
    $(document).on("click", "#create-data", function () {
        try {
            let type = $(this).attr("data-type");
            let url = $(this).attr("data-url");
            let prefix = $(this).attr("data-prefix");
            let data = {
                type: type,
                url: url,
                prefix: prefix,
            };
            $.ajax({
                type: "POST",
                url: `${prefix}/create-data`,
                data: data,
                beforeSend: function () {
                    // initializingTL.TLStartloading()
                },
                success: function (response) {
                    // initializingTL.TLStoptloading()
                    if (response.status == "success") {
                        $("#divDataFlow").html(response.view);
                        $("#divDataFlow").modal("show");
                        // notyf.success(response.msg);
                        // initializingTL.TLSelect2('table_name')
                        initializingTL.TLSelect2LiveSearch(
                              "system/select2-live-search",
                              "table_name"
                        );
                        initializingTL.TLSelect2LiveSearch(
                              "system/select2-live-search",
                              "page_path"
                         );

                         initializingTL.TLSelect2LiveSearch(
                              "system/select2-live-search",
                              "modal_path"
                         );

                         initializingTL.TLSelect2LiveSearch(
                              "system/select2-live-search",
                              "controller_path"
                         );
     
                         initializingTL.TLSelect2LiveSearch(
                              "system/select2-live-search",
                              "routs_path"
                         );
                         initializingTL.TLinitSelect2('select2-custome');

                    } else {
                        notyf.error(response.msg);
                    }
                },
                error: function (error) {
                    initializingTL.TLStoptloading();
                    notyf.error(
                        `Error ${error} ,please contactt your service provider `
                    );
                },
            });
        } catch (error) {
            initializingTL.TLStoptloading();
            console.log(error);
        }
    });

    $(document).on('click','.pagination >.page-item a',function(e){
        e.preventDefault();
        let formdata = $('#formDataAdvance').serialize();
        let page = $(this).text();
        let href = $(this).attr('href')
        $.ajax({
            type: "GET",
            url: `${render_prefix}/ajax-paginate`,
            data: formdata+'&page='+page,
            success: function (response) {
                if(response.status == 'success'){
                    $('#dataTableRecord').html(response.view);
                    initializingTL.TLcreateIcon();
                    $(".table").tableFixer({"head" : false, "left" : 1}); 
                }
                
            },
            error: function (error) {
                initializingTL.TLStoptloading();
                notyf.error(
                    `Error ${error} ,please contactt your service provider `
                );
            }
        });
    })
    $('#firebases').on('change',function(){
        let code = $(this).val() 
        if($(this).val().length >= 6){
            window.confirmationResult.confirm(code).then(function () {
                console.log('OTP Verified');
            }).catch(function () {
                console.log('OTP Not correct');
            })
        }
    })
    // Read notification 
    $('#page-header-notifications-dropdown').on('click',function(e){
            $.ajax({
                type: "GET",
                url: "system/read-notification",
                success: function (response) {
                    if(response.status == 'success'){
                        $('#notificationToggle').html(response.view) ;
                        console.log('Do something') ;
                    }
                }
            });
    });

    initializingTL.TLcreateIcon();
});
function saveData(ctrl) {
    try {
        let formdata = $("#formData").serialize();
        let prefix = $(ctrl).attr("data-prefix");
        $.ajax({
            type: "POST",
            url: `${prefix}/submit-data`,
            data: formdata,
            beforeSend: function () {
            },
            success: function (response) {
                if (response.status == "success") {
                    $("#divDataFlow").modal("hide");
                    $('#tableRecord').append(response.view);
                    notyf.success(response.msg);
                } else {
                    notyf.error(response.msg);
                }
            },
            error: function (error) {
                initializingTL.TLStoptloading();
                notyf.error(
                    `Error ${error} ,please contactt your service provider `
                );
            },
        });
    } catch (error) {
        initializingTL.TLStoptloading();
        console.log(error);
    }
}
function getModalEditData(ctrl){
    try {
        let type = $(ctrl).attr("data-type");
        let url = $(ctrl).attr("data-url");
        if(url !=''){
            window.location = url ;
            return ;
        }
        let prefix = $(ctrl).attr("data-prefix");
        let id = $(ctrl).attr("data-id");
        let data = {
            type: type,
            url: url,
            prefix: prefix,
            id : id
        };
        $.ajax({
            type: "POST",
            url: `${prefix}/create-data`,
            data: data,
            beforeSend: function () {
                // initializingTL.TLStartloading()
            },
            success: function (response) {
                // initializingTL.TLStoptloading()
                if (response.status == "success") {
                    $("#divDataFlow").html(response.view);
                    $("#divDataFlow").modal("show");
                    // notyf.success(response.msg);
                    // initializingTL.TLSelect2('table_name')
                    initializingTL.TLSelect2LiveSearch(
                          "system/select2-live-search",
                          "table_name"
                    );
                    initializingTL.TLSelect2LiveSearch(
                          "system/select2-live-search",
                          "page_path"
                     );

                     initializingTL.TLSelect2LiveSearch(
                          "system/select2-live-search",
                          "modal_path"
                     );

                     initializingTL.TLSelect2LiveSearch(
                          "system/select2-live-search",
                          "controller_path"
                     );
 
                     initializingTL.TLSelect2LiveSearch(
                          "system/select2-live-search",
                          "routs_path"
                     );
                     initializingTL.TLinitSelect2('select2-custome');

                } else {
                    notyf.error(response.msg);
                }
            },
            error: function (error) {
                initializingTL.TLStoptloading();
                notyf.error(
                    `Error ${error} ,please contactt your service provider `
                );
            },
        });
    } catch (error) {
        initializingTL.TLStoptloading();
        console.log(error);
    }
}
function updateData(ctrl) {
    try {
        let formdata = $("#formData").serialize();
        let prefix = $(ctrl).attr("data-prefix");
        $.ajax({
            type: "POST",
            url: `${prefix}/edit-data`,
            data: formdata,
            beforeSend: function () {
            },
            success: function (response) {
                if (response.status == "success") {
                    $("#divDataFlow").modal("hide");
                    $('#tableRecord').append(response.view);
                    notyf.success(response.msg);
                } else {
                    notyf.error(response.msg);
                }
            },
            error: function (error) {
                initializingTL.TLStoptloading();
                notyf.error(
                    `Error ${error} ,please contactt your service provider `
                );
            },
        });
    } catch (error) {
        initializingTL.TLStoptloading();
        console.log(error);
    }
}
function prepareDelete(ctrl){
    let code = $(ctrl).attr('data-code');
    let prefix = $(ctrl).attr('data-prefix');
    $('#divDeleteRecord').modal('show') ;
    $('#m-delete').attr('data-perfix',prefix) 
    $('#m-delete').attr('data-code',code)   
}
function DeleteData(ctrl){
    try {
        let code = $(ctrl).attr('data-code');
        let prefix = $(ctrl).attr('data-prefix');
        let data = {
            code : code,
            prefix : prefix 
        } 
        $.ajax({
            type: "POST",
            url: `${prefix}/delete-data`,
            beforeSend: function () {

            },
            data: data,
            success: function (response) {
                if (response.status == "success") {
                    $("#divDeleteRecord").modal("hide");
                    $(`#id_${code}`).remove();
                    notyf.success(response.msg);
                } else {
                    notyf.error(response.msg);
                }
            },
            error: function (error) {
                initializingTL.TLStoptloading();
                notyf.error(
                    `Error ${error} ,please contactt your service provider `
                );
            }
        });
    } catch (error) {
        initializingTL.TLStoptloading();
        console.log(error);
    }

}
function searchData(ctrl){
    try{
        let formdata = $('#formDataAdvance').serialize();
        let prefix = $(ctrl).attr('data-prefix') ;
        $.ajax({
            type: "GET",
            url: `${prefix}/search`,
            data: formdata,
            success: function (response) {
                if(response.status == 'success'){
                    $('#dataTableRecord').html(response.view);
                }
                
            },
            error: function (error) {
                initializingTL.TLStoptloading();
                notyf.error(
                    `Error ${error} ,please contact your service provider `
                );
            }
        });
    }catch(error){
        initializingTL.TLStoptloading();
        notyf.error(
            `Error ${error} ,please contact your service provider `
        );
    }
}
function exportExcell(ctrl,event){
    event.preventDefault()
   
    let formdata = $('#formDataAdvance').serialize();
    let prefix = $(ctrl).attr('data-prefix');
    $.ajax({
        type: "GET",
        url: `${prefix}/export-excel/${prefix}`,
        data: formdata,
        success: function (response) {
            if(response.status == 'success'){
                location.href = response.path;
            }else{
                console.log(response.msg) 
            }
            
        }
    });
}
function printData(ctrl,event){
    event.preventDefault()
    let formdata = $('#formDataAdvance').serialize();
    let prefix = $(ctrl).attr('data-prefix');
    $.ajax({
        type: "GET",
        url: `${prefix}/print-pdf/${prefix}`,
        data: formdata,
        success: function (response) {
            $('.printThis').html(response.view);
            $('.printThis').printThis();
        }
    });
}
function prepareUpload(ctrl){
    $('#divUpdloadExcel').modal('show') ;
}
function uploadExcell (ctrl){
    let formData = new FormData(formExcel);
    let prefix = $(ctrl).attr('data-prefix')
    $.ajax({
        type: "POST",
        url: `${prefix}/upload-excel`,
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if(response.status == 'success'){
                    window.location = '' ;
            }
        }
    });
}
function notififcation(data){
    try {
        $('#totalNotifi').text(data.total_record);
    } catch (error) {
        console.log(error) ;
    }
    
}
function getCode(phone_number){
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container', {
      'size': 'invisible',
      'callback': (response) => {
         console.log("Call", response);
      }
   });
   var appVerifier = window.recaptchaVerifier;
   firebase.auth().signInWithPhoneNumber(phone_number, appVerifier).then(function (confirmationResult) {window.confirmationResult = confirmationResult;
        console.log('success'+confirmationResult)
   }).catch(function (error) {
        console.log(error.message);
   });
}
function prepareCreateSchedulder(table){
    $.ajax({
        type: "GET",
        url: `prepare-schedulder/${table}`,
        data: "data",
        success: function (response) {
            
        }
    });
}


