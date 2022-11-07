$(document).ready(function() {
    $("#p_submit").click(function(event) {
        event.preventDefault();
        var index = $('#index').val();
        var p_name = $('#p_name').val();
        var p_cont = $('#p_cont').val();
        var p_email = $('#p_email').val();
        var p_addr = $('#p_addr').val();
        var p_des = $('#p_des').val();


        if (index === '' ||p_name === '' || p_cont === '' || p_email === '' || p_addr === '' || p_des === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/editpublisher.php",
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
                    // setTimeout(function() {
                    //     location.reload(true);
                    // }, 5000);
                    $('#editmodal').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});
