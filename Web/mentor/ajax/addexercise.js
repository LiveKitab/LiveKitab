function addexe() {
    var form = $('#myform6')[0];
    var data = new FormData(form);
    var url = 'back/operation/addexercise.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#s_submit').hide();
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform6').trigger("reset");
            $('#exercise1').fadeIn().html(data);
            $('#s_submit').show();
            $('#reset').show();
            $('.loader').hide();
            $('#load4').load(' #load4');
            //alert(data);
            return false;
        }
    });
    return false;
}