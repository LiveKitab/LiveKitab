$(document).ready(function() {
    $("#submit-form").click(function(event) {
        event.preventDefault();
        var username = $('#username').val();
        var phone = $('#phone').val();
        var email = $('#email').val();
        var message = $('#message').val();
        
        if (username === '' || phone === '' || email === '' || message === '') {
            $('#return').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>All Fileds are Required<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
        } else {
            $.ajax({
                url: "backend/contact-us.php",
                method: "POST",
                data: $('#contact-form').serialize(),
                success: function(data) {
                    $('#return').fadeIn().html(data);
                }
            });
        }
    });
});