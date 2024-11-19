const pusher_key = $(document).find('meta[name="push_key"]').attr("content");
const render_prefix = $(document)
    .find('meta[name="render_prefix"]')
    .attr("content");
const page_id = $(document).find('meta[name="page_id"]')
.attr("content");
var pusher = new Pusher(pusher_key, {
    cluster: "ap1",
});
var notyf = new Notyf({
    duration: 3000,
});

$(document).ready(function () {
    initializingTL.TLinitSelect2("select3");
    var channel = pusher.subscribe("init_realtime_data");
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

    initializingTL.TLinitSelect2("select2-custome");
    initializingTL.TLinitSelect2("page_path");
    channel.bind("realtime", (data) => {
        notififcation(data);
    });

    $(".btn-triggerExcel").on("click", function (e) {
        $("#uploadExcel").trigger("click");
    });

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
                },
                success: function (response) {
                    if (response.status == "success") {
                        $("#divDataFlow").html(response.view);
                        $("#divDataFlow").modal("show");
                       
                        initializingTL.TLSelect2LiveSearch(
                            "system/select2-live-search",
                            "email"
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
                        initializingTL.TLSelect2LiveSearch(
                            "system/select2-live-search",
                            "table_name"
                        );
                       
                        initializingTL.TLinitSelect2("select2-custome");
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

    $(document).on("click", ".pagination >.page-item a", function (e) {
        e.preventDefault();
        let formdata = $("#formDataAdvance").serialize();
        let page = $(this).text();
        let href = $(this).attr("href");
        $.ajax({
            type: "GET",
            url: `${render_prefix}/ajax-paginate`,
            data: formdata + "&page=" + page,
            success: function (response) {
                if (response.status == "success") {
                    $("#dataTableRecord").html(response.view);
                    initializingTL.TLcreateIcon();
                    $(".table").tableFixer({ head: false, left: 1 });
                }
            },
            error: function (error) {
                initializingTL.TLStoptloading();
                notyf.error(
                    `Error ${error} ,please contactt your service provider `
                );
            },
        });
    });
    $("#firebases").on("change", function () {
        let code = $(this).val();
        if ($(this).val().length >= 6) {
            window.confirmationResult
                .confirm(code)
                .then(function () {
                    console.log("OTP Verified");
                })
                .catch(function () {
                    console.log("OTP Not correct");
                });
        }
    });
    // Read notification
    $("#page-header-notifications-dropdown").on("click", function (e) {
        $.ajax({
            type: "GET",
            url: "system/read-notification",
            success: function (response) {
                if (response.status == "success") {
                    $("#notificationToggle").html(response.view);
                    console.log("Do something");
                }
            },
        });
    });
    $(document).on('change','#fileimage',function(){
       
        let code = $(this).attr('data-code');
        let page = $(this).attr('data-page');
        let file = $('#file').val();
        let data = new FormData(formimg);
        $.ajax({
            type: "POST",
            url: `/system/UploadImage/${page}/${code}`,
            data: data,
            processData: false,
            contentType: false,
            success: function(response) {
                $('.append_file').append(`
                    <div class="col-2 row_${response.id}">
                        <div class="drag-image ">
                        <img src="${response.path}" alt="">
                        <div class="btn delete_image" data-id="${response.id}">Remove</div>
                        </div>
                    </div>
                
                `)
                notyf.success(response.msg);
            }
        });
    });

    initializingTL.TLcreateIcon();
    initializingTL.TLTextEditor('remark')
    $(document).on('click', '.btn-browse', function() {
        $('.upload-item').trigger('click');
    });

    // Call Nave bar
});
function saveData(ctrl) {
    try {
        let formdata = $("#formData").serialize();
        let prefix = $(ctrl).attr("data-prefix");
        $.ajax({
            type: "POST",
            url: `${prefix}/submit-data`,
            data: formdata,
            beforeSend: function () {},
            success: function (response) {
                if (response.status == "success") {
                    $("#divDataFlow").modal("hide");
                    $("#tableRecord").append(response.view);
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
function getModalEditData(ctrl) {
    try {
        let type = $(ctrl).attr("data-type");
        let url = $(ctrl).attr("data-url");
        if (url != "") {
            window.location = url;
            return;
        }
        let prefix = $(ctrl).attr("data-prefix");
        let id = $(ctrl).attr("data-id");
        let data = {
            type: type,
            url: url,
            prefix: prefix,
            id: id,
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

                    initializingTL.TLinitSelect2("select2-custome");
                    initializingTL.TLinitSelect2("page_path");
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
            beforeSend: function () {},
            success: function (response) {
                if (response.status == "success") {
                    $("#divDataFlow").modal("hide");
                    $("#tableRecord").append(response.view);
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
function prepareDelete(ctrl) {
    let code = $(ctrl).attr("data-code");
    let prefix = $(ctrl).attr("data-prefix");
    $("#divDeleteRecord").modal("show");
    $("#m-delete").attr("data-perfix", prefix);
    $("#m-delete").attr("data-code", code);
}
function DeleteData(ctrl) {
    try {
        let code = $(ctrl).attr("data-code");
        let prefix = $(ctrl).attr("data-prefix");
        let data = {
            code: code,
            prefix: prefix,
        };
        $.ajax({
            type: "POST",
            url: `${prefix}/delete-data`,
            beforeSend: function () {},
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
            },
        });
    } catch (error) {
        initializingTL.TLStoptloading();
        console.log(error);
    }
}
function searchData(ctrl) {
    try {
        let formdata = $("#formDataAdvance").serialize();
        let prefix = $(ctrl).attr("data-prefix");
        $.ajax({
            type: "GET",
            url: `${prefix}/search`,
            data: formdata,
            success: function (response) {
                if (response.status == "success") {
                    $("#dataTableRecord").html(response.view);
                }
            },
            error: function (error) {
                initializingTL.TLStoptloading();
                notyf.error(
                    `Error ${error} ,please contact your service provider `
                );
            },
        });
    } catch (error) {
        initializingTL.TLStoptloading();
        notyf.error(`Error ${error} ,please contact your service provider `);
    }
}
function exportExcell(ctrl, event) {
    event.preventDefault();

    let formdata = $("#formDataAdvance").serialize();
    let prefix = $(ctrl).attr("data-prefix");
    $.ajax({
        type: "GET",
        url: `${prefix}/export-excel/${prefix}`,
        data: formdata,
        success: function (response) {
            if (response.status == "success") {
                location.href = response.path;
            } else {
                console.log(response.msg);
            }
        },
    });
}
function printData(ctrl, event) {
    event.preventDefault();
    let formdata = $("#formDataAdvance").serialize();
    let prefix = $(ctrl).attr("data-prefix");
    $.ajax({
        type: "GET",
        url: `${prefix}/print-pdf/${prefix}`,
        data: formdata,
        success: function (response) {
            $(".printThis").html(response.view);
            $(".printThis").printThis();
        },
    });
}
function prepareUpload(ctrl) {
    $("#divUpdloadExcel").modal("show");
}
function uploadExcell(ctrl) {
    let formData = new FormData(formExcel);
    let prefix = $(ctrl).attr("data-prefix");
    $.ajax({
        type: "POST",
        url: `${prefix}/upload-excel`,
        data: formData,
        processData: false,
        contentType: false,
        success: function (response) {
            if (response.status == "success") {
                window.location = "";
            }
        },
    });
}
function notififcation(data) {
    try {
        $("#totalNotifi").text(data.total_record);
    } catch (error) {
        console.log(error);
    }
}
// function getCode(phone_number) {
//     window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier(
//         "recaptcha-container",
//         {
//             size: "invisible",
//             callback: (response) => {
//                 console.log("Call", response);
//             },
//         }
//     );
//     var appVerifier = window.recaptchaVerifier;
//     firebase
//         .auth()
//         .signInWithPhoneNumber(phone_number, appVerifier)
//         .then(function (confirmationResult) {
//             window.confirmationResult = confirmationResult;
//             console.log("success" + confirmationResult);
//         })
//         .catch(function (error) {
//             console.log(error.message);
//         });
// }
function prepareCreateSchedulder(table) {
    $.ajax({
        type: "GET",
        url: `prepare-schedulder/${table}`,
        data: "data",
        success: function (response) {},
    });
}
function configTelegramId(ctrl) {
    $("#divConfigTelegram").modal("show");
}
// Get Telegram ID
function getId(ctrl) {
    $.ajax({
        type: "GET",
        url: "/system/get-telegram-id",
        success: function (response) {
            $("#divConfigTelegram").modal("hide");
            if (response.status == "success") {
                initializingTL.TLAlert(
                    "success",
                    "Here is your telegram chat id " + response.telegratem
                );
            } else {
                initializingTL.TLAlert("warning", response.msg);
            }
        },
    });
}

function update2FA(ctrl) {
    let type = $(ctrl).attr("data-type");
    $.ajax({
        type: "POST",
        url: "/system/up-2fa-status",
        data: {
            type: type,
        },
        success: function (response) {
            if (response.status == "success") {
                if (type == "no") {
                    $(ctrl).attr("data-type", "yes");
                    $("#update-2fa")
                        .removeClass("btn-warning")
                        .addClass("btn-danger");
                    $("#update-2fa .lable-text").text(
                        "Disabled 2 Factor Authentication"
                    );
                } else {
                    $(ctrl).attr("data-type", "no");
                    $("#update-2fa")
                        .removeClass("btn-danger")
                        .addClass("btn-warning");
                    $("#update-2fa .lable-text").text(
                        "Enabled 2 Factor Authentication"
                    );
                }
            }
        },
    });
}
function preUploadImage(ctrl){
    let code = $(ctrl).attr('data-code');
    let page = $(ctrl).attr('data-page');
    let data ={
        code : code,
        page:page
    }
    $.ajax({
        type: "GET",
        url: `/system/pre-upload-image`,
        data: data,
        success: function(response) {
            if(response.status == 'success'){
                $('#divUpdloadImage').html(response.view);
                $('#divUpdloadImage').modal('show');
            }else{
                notyf.error(response.msg);
            }
        }
    });
}
function doLiveSearchPage(ctrl){
    let value = $(ctrl).val() ;
    let data = {
        value : value   
    }
    $.ajax({
        type: "GET",
        url: `/system/search-page`,
        data: data,
        success: function(response) {
            if(response.status == 'success'){
                $('#resultSearchPage').html(response.view)  ;
            }else{
                notyf.error(response.msg);
            }
        }
    });
}
function preChangeImage(ctrl){
    let page = $(ctrl).attr('data-page');
    let code = $(ctrl).attr('data-code');
    let data ={
        page : page,
        code : code,
    };
    $.ajax({
        type: "GET",
        url: `/system/pre-upload-image`,
        data: data,
        success: function(response) {
            if(response.status == 'success'){
              
            }else{
                notyf.error(response.msg);
            }
        }
    });
}
function showRightbar(ctrl){
    let tab_id = $(ctrl).attr('data-tab_id');
    initializingTL.TLCallNavBar(render_prefix,tab_id)
}
function settingTableList(ctrl){
    let page_id = $(ctrl).attr('data-table_id');
    let field_id = $(ctrl).attr('data-field_id');
    let field_name = $(ctrl).attr('data-list_name');
    let value = $(ctrl).val() ;
    let data ={
        page_id : page_id,
        field_id : field_id,
        field_name : field_name,
        value : value
    }
    $.ajax({
        type: "POST",
        url: "/system/update-table-list",
        data: data,
        success: function (response) {
            if(response.status == 'success'){
                notyf.success(response.msg);
            }else{
                notyf.error(response.msg);
            }
        }
    });
}
 