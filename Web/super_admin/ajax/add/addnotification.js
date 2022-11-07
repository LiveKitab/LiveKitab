function sendsms() {
    var form = $('#myform')[0];
    var data = new FormData(form);
    var url = 'back/operation/addnotification.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#submit').hide();   
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('form').trigger("reset");
            $('#data').fadeIn().html(data);
            $('#load').load(' #load');
            $('#submit').show();
            $('#reset').show();
            $('.loader').hide();
            //alert(data);
            return false;
        }
    });
    return false;
}