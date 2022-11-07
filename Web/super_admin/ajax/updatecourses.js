$(document).ready(function() {
    $("#c_submit").click(function(event) {
        event.preventDefault();
        var index = $('#index').val();
        var e_name = $('#e_name').val();
        var c_name = $('#c_name').val();
        var c_price = $('#c_price').val();
        var p_duration = $('#p_duration').val();
        var v_limit = $('#v_limit').val();
        var c_des = $('#c_des').val();
        var c_dis = $('#c_dis').val();
        var c_code = $('#c_code').val();
        var c_credit = $('#c_credit').val();


        if (index === '' || e_name === '' || c_name === '' || c_price === '' || p_duration === '' || c_dis === '' || v_limit === '' || c_des === '' || c_code === '' || c_credit === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/editcourses.php",
                method: "POST",
                data: $('#myform1').serialize(),
                beforeSend: function() {
                $('#c_submit').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#c_submit').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#editmodal').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});
