function banner() {
    var form = $('#myform4')[0];
    var data = new FormData(form);
    var url = 'back/operation/addbanner.php';
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
            $('#myform4').trigger("reset");
            $('#banner').fadeIn().html(data);
            $('#submit').show();
            $('#reset').show();
            $('.loader').hide();
            $('#load').load(' #load');
            return false;
        }
    });
    return false;
}