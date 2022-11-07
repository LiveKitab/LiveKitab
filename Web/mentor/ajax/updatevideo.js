$(document).ready(function() {
    $("#v_submit").click(function(event) {
        event.preventDefault();
        var index = $('#index').val();
        var v_title = $('#v_title').val();
        var v_link = $('#v_link').val();
        var v_des = $('#v_des').val();
        var v_remk = $('#v_remk').val();
        


        if (index === '' || v_title === '' || v_link === '' || v_des === '' || v_remk === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/editvideo.php",
                method: "POST",
                data: $('#myform1').serialize(),
                beforeSend: function() {
                $('#v_submit').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#v_submit').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#editmodal16').modal('toggle');
                    setTimeout(function() {
            location.reload(true);
            }, 5000);
                }
            });
        }
    });
});
