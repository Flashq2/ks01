jQuery(window).on("load", function() {
    $("#preloader").fadeOut(500), $("#main-wrapper").addClass("show")
}),
function(a) {
    "use strict";
    a(".duration-option a").on("click", function() {
        a(".duration-option a.active").removeClass("active"), a(this).addClass("active")
    }), a(".file-upload-wrapper").on("change", ".file-upload-field", function() {
        a(this).parent(".file-upload-wrapper").attr("data-text", a(this).val().replace(/.*(\/|\\)/, ""))
    }), a(function() {
        for (var t = window.location, i = a(".menu a").filter(function() {
                return this.href == t
            }).addClass("active").parent().addClass("active"); i.is("li");) i = i.parent().addClass("show").parent().addClass("active")
    }), a('[data-toggle="tooltip"]').tooltip(), a(".sidebar-right-trigger").on("click", function() {
        a(".sidebar-right").toggleClass("show")
    })
}(jQuery);