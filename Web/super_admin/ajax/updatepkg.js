$(document).ready(function() {
    $("#p_submit").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        
        var p_price = $('#p_price').val();
        var p_dis = $('#p_dis').val();
        var p_des = $('#p_des').val();


        if (id === '' || p_price === ''  || p_dis === '' || p_des === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/editpkg.php",
                method: "POST",
                data: $('#MyForm').serialize(),
                beforeSend: function() {
                $('#p_submit').hide();
                $('#ret').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#p_submit').show();
                $('#ret').show();
                $('.loader').hide();
                    // setTimeout(function() {
                    //     location.reload(true);
                    // }, 5000);
                    $('#pkgmodal').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});
