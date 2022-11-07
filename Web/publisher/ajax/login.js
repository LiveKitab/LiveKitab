$(document).ready(function() {
    $("#signin").click(function(event) {
        event.preventDefault();
        var e_email = $('#e_email').val();
        var e_pwd = $('#e_pwd').val();
        if (e_email == '' || e_pwd == '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/signin.php",
                method: "POST",
                data: $('#myform').serialize(),
                beforeSend: function() {
                    $('#signin').hide();
                    $('.loader').show();
                },
                success: function(data) {
                    $('form').trigger("reset");
                    $('#return').fadeIn().html(data);
                    $('#signin').show();
                    $('.loader').hide();
                    setTimeout(function() {
                                location.reload(true);
                    }, 4000);
                }
            });
        }
    });
});