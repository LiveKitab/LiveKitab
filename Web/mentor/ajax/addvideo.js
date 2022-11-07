function video() {
    var form = $('#myform')[0];
    var data = new FormData(form);
    var url = 'back/operation/addvideo.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#video_submit').hide();
            $('#reset1').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform').trigger("reset");
            $('#video').fadeIn().html(data);
            $('#video_submit').show();
            $('#reset1').show();
            $('.loader').hide();
            $('#load').load(' #load');
            setTimeout(function() {
                location.reload(true);
            }, 2500);
            // alert(data);
            return false;
        }
    });
    return false;
}