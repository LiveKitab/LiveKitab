$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();
        var index = $('#index').val();
        var reply = $('#reply').val();
        


        if (index === '' || reply === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/replyvideo.php",
                method: "POST",
                data: $('#myform1').serialize(),
                beforeSend: function() {
                $('#submit').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#submit').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#replymodal').modal('toggle');
                    setTimeout(function() {
                        location.reload(true);
                    }, 5000);
                }
            });
        }
    });
});
