$(document).ready(function() {
    $('#m_pass1').keyup(function() {
        $('#result').html(checkStrength($('#m_pass1').val()))
    })

    function checkStrength(password) {
        var strength = 0
        if (password.length < 6) {
            $('#result').removeClass()
            $('#result').addClass('short')
            return '<b style="color:red;">Too Short</b>'
        }
        if (password.length > 7) strength += 1
            // If password contains both lower and uppercase characters, increase strength value.
        if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
            // If it has numbers and characters, increase strength value.
        if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
            // If it has one special character, increase strength value.
        if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
            // If it has two special characters, increase strength value.
        if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
            // Calculated strength value, we can return messages
            // If value is less than 2
        if (strength < 2) {
            $('#result').removeClass()
            $('#result').addClass('weak')
            return '<b style="color:purple;">Weak</b>'
        } else if (strength == 2) {
            $('#result').removeClass()
            $('#result').addClass('good')
            return '<b style="color:green;">Good</b>'
        } else {
            $('#result').removeClass()
            $('#result').addClass('strong')
            return '<b style="color:green;">Strong</b>'
        }
    }
});


$(document).ready(function() {
    $('#m_pass2').keyup(function() {
        var m_pass1 = $('#m_pass1').val();
        var m_pass2 = $('#m_pass2').val();

        if (m_pass1 === m_pass2) {
            $('#confirm').fadeIn().html('<b style="color:green;">Match</b>');
        } else {
            $('#confirm').fadeIn().html('<b style="color:red;">Not Match</b>');
        }

    });
});


/* Show Register Password */

// $(".toggle-password1").click(function() {

//     $(this).toggleClass("fa-eye fa-eye-slash");
//     var x = document.getElementById("regpass");
//     var y = document.getElementById("regpass1");
//     if (x.type === "password" && y.type === "password") {
//         x.type = "text";
//         y.type = "text";
//     } else {
//         x.type = "password";
//         y.type = "password";
//     }
// });


/* Show OTP */

$(".otp").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var x = document.getElementById("reg_otp");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
});

/* Login Password */


$(".toggle-password2").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var x = document.getElementById("loginpass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
});


/* Show Forgot Password OTP */

$(".forgotpwdotp").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var x = document.getElementById("otp");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
});


/* Reset Password */

$(".resetpwd").click(function() {

    $(this).toggleClass("fa-eye fa-eye-slash");
    var x = document.getElementById("newpwd");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
});