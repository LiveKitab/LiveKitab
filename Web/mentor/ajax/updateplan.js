$(document).ready(function() {
    $("#p_submit").click(function(event) {
        event.preventDefault();
        var index = $('#index').val();
        var p_name = $('#p_name').val();
        var p_price = $('#p_price').val();
        var p_title = $('#p_title').val();
        var plan_des = $('#plan_des').val();
        var plan_tc = $('#plan_tc').val();
       


        if (index === '' || p_name === '' || p_price === '' || p_title === '' || plan_des === '' || plan_tc === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/editplan.php",
                method: "POST",
                data: $('#myform1').serialize(),
                beforeSend: function() {
                $('#p_submit').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#p_submit').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#editmodal15').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});
