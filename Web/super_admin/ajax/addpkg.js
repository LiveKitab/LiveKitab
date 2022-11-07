function pkg() {
    var form = $('#myform')[0];
    var data = new FormData(form);
    var url = 'back/operation/addpkg.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#submit').hide();
            $('#res').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform').trigger("reset");
            $('#pkg').fadeIn().html(data);
            $('#submit').show();
            $('#res').show();
            $('.loader').hide();
            $('#load').load(' #load');
            return false;
        }
    });
    return false;
}