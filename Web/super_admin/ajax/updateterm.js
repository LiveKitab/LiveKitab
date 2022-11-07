$(document).ready(function() {
    $("#updateterm").click(function(event) {
        event.preventDefault();
        var index = $('#index').val();
        var termname = $('#termname').val();
        var med = $('#med').val();
        
        if (index === '' || termname === '' || med === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/editterm.php",
                method: "POST",
                data: $('#updatetermform').serialize(),
                beforeSend: function() {
                $('#updateterm').hide();
                $('#resetbtn').hide();
                $('.loader1').show();
                },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#updateterm').show();
                    $('#resetbtn').show();
                    $('.loader1').hide();
                    $('#editmodal19').modal('toggle');
                    $('#load3').load(' #load3');
                }
            });
        }
    });
});