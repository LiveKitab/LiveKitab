$(document).ready(function() {
    $("#signin").click(function(event) {
        event.preventDefault();
        var c_email = $('#c_email').val();
        var c_pwd = $('#c_pwd').val();
        
        if (c_email === '' || c_pwd === '') {
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


/* Registration */

/* Registration */


$(document).ready(function() {
    $("#signup").click(function(event) {
        event.preventDefault();
        var m_email1 = $('#m_email1').val();
        var m_cont = $('#m_cont').val();
        var m_pass1 = $('#m_pass1').val();
        var m_pass2 = $('#m_pass2').val();
        var f_name = $('#f_name').val();
        var m_name = $('#m_name').val();
        var l_name = $('#l_name').val();

        if (f_name === '' || m_name === '' || l_name === '' || m_email1 === '' || m_cont === '' || m_pass1 === '' || m_pass2 === '') {
            $('#reg').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/signup.php",
                method: "POST",
                data: $('#myform').serialize(),
                beforeSend: function() {
                    $('#signup').hide();
                    $('.loader').show();
                },
                success: function(data) {
                    $('#signup').show();
                    $('.loader').hide();
                    if(data == 1)
                    {
                        window.location='registerotp';
                    }
                    else
                    {
                    $('form').trigger("reset");
                    $('#reg').fadeIn().html(data);
                    $('#reg').fadeOut("slow");
                    }
                }
            });
        }
    });
});



/* Forgot Password */

$(document).ready(function() {
    $("#e_submit").click(function(event) {
        event.preventDefault();
        var reg_email = $('#reg_email').val();
        if (reg_email === '') {
            $('#op').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Please Enter Your Registered Email<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $.ajax({
                url: "back/operation/forgotpwd.php",
                method: "POST",
                data: $('#reg_email_form').serialize(),
                beforeSend: function() {
                    $('#e_submit').hide();
                    $('.preloading').show();
                },
                success: function(data) {
                    $('#e_submit').show();
                    $('.preloading').hide();
                    if(data == 1)
                    {
                        window.location='forgotpasswordotp';
                    }
                    else
                    {
                    $('form').trigger("reset");
                    $('#op').fadeIn().html(data);
                    }
                    //alert(data);
                }
            });
        }
    });
});


/* Forgot Password OTP */


$(document).ready(function() {
    $("#submit_otp").click(function(event) {
        event.preventDefault();
        var otpemail = $('#otpemail').val();
        if (otpemail === '') {
            $('#done').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Please Enter OTP Sent to Your Registered Email<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $.ajax({
                url: "back/operation/forgotpwd.php",
                method: "POST",
                data: $('#MyForm').serialize(),
                beforeSend: function() {
                    $('#submit_otp').hide();
                    $('.preloader').show();
                },
                success: function(data) {
                    $('form').trigger("reset");
                    $('#done').fadeIn().html(data);
                    $('#submit_otp').show();
                    $('.preloader').hide();
                    
                }
            });
        }
    });
});


/* Reset Password */


$(document).ready(function() {
    $("#create").click(function(event) {
        event.preventDefault();
        var useremail = $('#useremail').val();
        var newpwd = $('#newpwd').val();
        var confirmpwd = $('#confirmpwd').val();
        if (useremail === '' || newpwd === '' || confirmpwd === '') {
            $('#set').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Please Enter OTO Sent to Your Registered Email<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $.ajax({
                url: "back/operation/forgotpwd.php",
                method: "POST",
                data: $('#ResetPwdForm').serialize(),
                beforeSend: function() {
                    $('#create').hide();
                    $('.load').show();
                },
                success: function(data) {
                    // $('form').trigger("reset");
                    // $('#set').fadeIn().html(data);
                    // $('#create').show();
                    // $('.load').hide();
                    alert(data);
                }
            });
        }
    });
});







/* Login with OTP */


$(document).ready(function() {
    $("#sendotppass").click(function(event) {
        event.preventDefault();
        var c_email = $('#c_email').val();
        if (c_email == '') {
            $('#return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Please Enter Email or Contact Number<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $.ajax({
                url: "back/operation/generateotppass.php",
                method: "POST",
                data: { 
			            c_email: c_email,
            	},
                success: function(data) {
                    $("#logintype").val("OTP");
                    $('#return').fadeIn().html(data);
                }
            });
        }
    });
});



