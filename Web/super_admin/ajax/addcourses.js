function courses() {
    var form = $('#myform')[0];
    var data = new FormData(form);
    var url = 'back/operation/addcourses.php';
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
            $('#courses').fadeIn().html(data);
            $('#tab-1').load(' #tab-1');
            $('#submit').show();
            $('#cancel').show();
            $('.loader').hide();
            $('#load').load(' #load');
            return false;
        }
    });
    return false;
}