$('body').on('beforeSubmit', 'form#create-form', function() {
        var form = $(this);
        var formData = new FormData($('form#create-form')[0]);
        $.ajax({
            
            url: form.attr('action'),
            data: formData,
            type: 'post',
            async:false,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {

                  // console.log(response);
                if (response == '1') {
                    $('#create-modal').modal('hide');
                    $.pjax.reload({ container: '#formPjax'});
                    $('#completed-message').show();
                }
                else{
                    $form.trigger("reset");
                    console.log("Server error");
                }
            }
        });
        return false;
});

function fill_data(){
    var zip_code = $('#select-zip-code').val();
        $.ajax({
            type: "POST",
            url:  "customer/location-details",
            data: {zip_code: zip_code},
            success: function(res)
            {
                var data = jQuery.parseJSON(res);
                $('#city').val(data[0]);
                $('#province').val(data[1]);
            }
        });
}
