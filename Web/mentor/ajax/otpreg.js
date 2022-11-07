$(document).ready(function() {
    $("#reg_ver").click(function(event) {
        event.preventDefault();
        var reg_otp = $('#reg_otp').val();
        if (reg_otp === '') {
            $('#reg').html('<h4 style="color:red;">Enter OTP</h4>');
        } else {
            $.ajax({
                url: "back/operation/signup.php",
                method: "POST",
                data: $('#reg_otp_form').serialize(),
                beforeSend: function() {
                    $('#reg_ver').hide();
                    $('.loading').show();
                },
                success: function(data) {
                    $('form').trigger("reset");
                    $('#return').fadeIn().html(data);
                    $('#reg_ver').show();
                    $('.loading').hide();
                }
            });
        }
    });
});