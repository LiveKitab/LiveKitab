function uploadexcel() {
    var form = $('#myform1')[0];
    var data = new FormData(form);
    var url = 'back/operation/excel.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#upload').hide();
            $('#reset').hide();
            $('.loading').show();
        },
        success: function(data) {
            // $("#file").val(null);
            // $('#return').fadeIn().html(data);
            // $('#upload').show();
            // $('#reset').show();
            // $('.loader').hide();
            // $('#exampleModalCenter').modal('toggle');
            // $('#tab-1').load(' #tab-1');
            // $('#load').load(' #load');
            // setTimeout(function() {
            // location.reload(true);
            // }, 5000);
            // return false;
            alert(data);
        }
    });
    return false;
}