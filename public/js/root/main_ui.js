var initializingTL = {
    TLStoptloading : function(action){
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
    },
    TLStartloading : function(){
        $('#status').css({'display' : 'block'});
        $('#preloader').css({'display' : 'block'});
    },
    TLcreateIcon :function(){
        $(document).find('.i-edit').append(' <i class ="fas fa-edit"></i>')
        $(document).find('.i-design').append(' <i class ="fas fa-tasks"></i>')
        $(document).find('.i-add').append(' <i class ="fas fa-plus"></i>')
        $(document).find('.i-delete').append(' <i class ="fas fa-plus"></i>')
    }
}






//  Action on Document 

