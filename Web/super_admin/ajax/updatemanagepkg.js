$(document).ready(function() {
    $("#p_submit").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var c_name = $('#c_name').val();
        var p_rmk = $('#p_rmk').val();
        


        if (id === '' || c_name === '' || p_rmk === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/editmanagepkg.php",
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
                    $('#managepkgmodal').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});
