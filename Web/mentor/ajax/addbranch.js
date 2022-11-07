function branch() {
    var form = $('#myform4')[0];
    var data = new FormData(form);
    var url = 'back/operation/addbranch.php';
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
            $('#myform4').trigger("reset");
            $('#branch').fadeIn().html(data);
            $('#submit').show();
            $('#cancel').show();
            $('.loader').hide();
            $('#load').load(' #load');
            return false;
        }
    });
    return false;
}