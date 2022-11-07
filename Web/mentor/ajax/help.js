function courses() {
    var form = $('#MyForm')[0];
    var data = new FormData(form);
    var url = 'back/operation/help.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#submit').hide();
            $('#reset22').hide();
            $('.loader').show();
        },
        success: function(data) {
            // $('#myform').trigger("reset");
            // $('#return').fadeIn().html(data);
            // $('#tab-1').load(' #tab-1');
            // $('#submit').show();
            // $('#reset22').show();
            // $('.loader').hide();
            // $('#load').load(' #load');
            alert(data);
            return false;
        }
    });
    return false;
}