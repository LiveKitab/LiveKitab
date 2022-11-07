$(document).ready(function() {
    $("#b_submit").click(function(event) {
        event.preventDefault();
        var index = $('#index').val();
        var b_name = $('#b_name').val();
        var b_cont = $('#b_cont').val();
        var b_email = $('#b_email').val();
        var b_addr = $('#b_addr').val();
        var b_des = $('#b_des').val();
        var b_price = $('#b_price').val();
        var b_dis = $('#b_dis').val();
        var b_sdate = $('#b_sdate').val();
        var b_edate = $('#b_edate').val();
       


        if (index === '' || b_name === '' || b_cont === '' || b_email === '' || b_addr === '' || b_des === ''|| b_price === ''
        || b_dis === ''|| b_sdate === ''|| b_edate === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/editbanner.php",
                method: "POST",
                data: $('#myform1').serialize(),
                beforeSend: function() {
                $('#b_submit').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#b_submit').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#editmodal16').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});
