function finalvideo() {
    var form = $('#MyForm')[0];
    var data = new FormData(form);
    var url = 'back/operation/addfinalvideo.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#v_submit').hide();
            $('#cancel').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#MyForm').trigger("reset");
            $('#return').fadeIn().html(data);
            $('#v_submit').show();
            $('#cancel').show();
            $('.loader').hide();
            $('#load4').load(' #load4');
            return false;
        }
    });
    return false;
}