$(document).on('pjax:complete', function() {
       lateBinding();
   });

var deleteData = function(e){
     e.preventDefault();
        var el = jQuery(this);
        bootbox.confirm({
            message: "Are you sure you want to delete this item?",
            buttons: {
                confirm: {
                    label: 'Yes',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'No',
                    className: 'btn-danger'
                }
            },
            callback: function(result) {
                if (result == true) {
                    $.post(el.attr('href'), {}, function(response) {
                        if (response.status == true) {
                            bootbox.alert({
                                message: 'Deleted Successfully',
                                className: 'bootbox-success',
                                backdrop: true
                            });
                            
                            $( "div#main-content" ).load("#table-index");
                            
                            // pjax_container = jQuery('div[data-pjax-container]').attr('id');
                            // jQuery.pjax.reload({ container: '#' + pjax_container });
                            lateBinding();                         
                        }
                    });
                }
            }
        });
         
}
var handleViewLoad = function(e) {
        e.preventDefault();
        var el = jQuery(this);
        
        jQuery.get(el.attr('href'), {}, function(response) {
            jQuery('div#main-content').html(response);
            lateBinding();
        });
    }

 var lateBinding = function() {
 	jQuery('a.delete-request').on('click',deleteData);
	jQuery('a.back_to_index').on('click',handleViewLoad);
	jQuery('a.update-request').on('click',handleViewLoad);
    jQuery('a.view-request').on('click',handleViewLoad);
	jQuery('table').on('click', 'a[title]', handleViewLoad);
    $('#create-request').click(function(){
        $('#create-modal').modal('show').find('#modalContent').load($(this).attr('value'));
    });

    }

//jQuery('table').on('click', 'a[title]', handleViewLoad);
lateBinding();