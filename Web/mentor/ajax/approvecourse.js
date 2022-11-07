$(document).ready(function() {
    $("#appr").click(function(event) {
        event.preventDefault();
        var index = $('#index').val();
        var pub = $('#pub').val();


        if (index === '' || pub === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/approvecourse.php",
                method: "POST",
                data: $('#myform1').serialize(),
                beforeSend: function() {
                $('#appr').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#appr').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#abc').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});
