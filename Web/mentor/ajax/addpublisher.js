$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();
        var name = $('#name').val();
         var contact = $('#contact').val();
        var email = $('#email').val();
        var addr = $('#addr').val();
        var state = $('#state').val();
        var city = $('#city').val();
        var des = $('#des').val();
        var pass = $('#pass').val();
        var pass1 = $('#pass1').val();
        

        
        if (name == '' || contact == '' || email == '' || addr == '' || state == '' || city == '' || des == '' || pass == '' || pass1 == '') {
            $('#editor').html('<h4 style="color:red;">Required All Fields..</h4>');
        } 

        
        else {
            $.ajax({
                url: "back/operation/addpublisher",
                method: "POST",
                data: $('#myform').serialize(),
                beforeSend: function() {
                $('#submit').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('form').trigger("reset");
                    $('#editor').fadeIn().html(data);
                    $('#submit').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#load').load(' #load');
                }
            });
        }
    });
});