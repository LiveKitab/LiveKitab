function addblog() {
    var form = $('#myform')[0];
    var data = new FormData(form);
    var url = 'back/operation/addblog.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#submit').hide();
            $('#resetbtn').hide();
            $('.loader').show();
        },
        success: function(data) {
           alert(data);
            // $('#myform').trigger("reset");
            // $('#data').fadeIn().html(data);
            // $('#tab-1').load(' #tab-1');
            // $('#submit').show();
            // $('#resetbtn').show();
            // $('.loader').hide();
            // setTimeout(function() {
            // location.reload(true);
            // }, 1500);
            return false;
        }
    });
    return false;
}