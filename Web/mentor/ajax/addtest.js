function createtest() {
    var form = $('#myform')[0];
    var data = new FormData(form);
    var url = 'back/operation/addtest.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#submit').hide();
            $('#cancel').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform').trigger("reset");
            $('#test').fadeIn().html(data);
            $('#submit').show();
            $('#cancel').show();
            $('.loader').hide();
            $('#load').load(' #load');
            return false;
        }
    });
    return false;
}