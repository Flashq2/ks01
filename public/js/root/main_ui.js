var initializingTL = {
    TLStoptloading : function(action){
        $('#status').fadeOut();
        $('#preloader').delay(350).fadeOut('slow');
    },
    TLStartloading : function(){
        $('#status').css({'display' : 'block'});
        $('#preloader').css({'display' : 'block'});
    },
    TLSelect2 : function($id){
        $(`#${$id}`).select2({
            theme: "bootstrap-5",
            dropdownParent: $(`#${$id}`).parent(),  
            width : '100%'
        })
    },
    TLSelect2LiveSearch: function(url, element) {
        let table = $(`#${element}`).attr('data-table') ;
        let primary_field =  $(`#${element}`).attr('data-primary_field') ;
        let description_field =  $(`#${element}`).attr('data-description_field') ;
        let value = $(`#${element}`).val() ;
        let data = {
            table : table ,
            primary_field : primary_field ,
            description_field : description_field,
            value : value
        } ;
        $(`#${element}`).select2({
            dropdownParent: $(`#${element}`).parent(),
            width : '100%',
            theme: "bootstrap-5",
            ajax: {
                url: url,
                dataType: 'json',
                delay: 300,
                data : data,
                processResults: function(data) {
                    return {
                        results: $.map(data, function(item) {
                            return {
                                text: `${item.description ? item.description : item.no}`,
                                id: item.no
                            }
                        })
                    };
                },
                cache: true,
            },
            minimumInputLength: 0,
        });

    },
    TLcreateIcon :function(){
            $(document).find('.i-edit').prepend(' <i class ="fas fa-edit"></i> ')
            $(document).find('.i-design').prepend(' <i class ="fas fa-tasks"></i> ')
            $(document).find('.i-add').prepend(' <i class ="fas fa-plus"></i> ')
            $(document).find('.i-delete').prepend(' <i class="fa fa-trash"></i> ')
    },
    TLinitSelect2: function(element){
        $(`.${element}`).select2({
            dropdownParent: $(`.${element}`).parent(),
            width : '100%',
            theme: "bootstrap-5",
            minimumInputLength: 0,
            allowClear: true,
        })
    },
}
