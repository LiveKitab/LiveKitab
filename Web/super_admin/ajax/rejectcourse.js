$(document).ready(function() {
    $("#rej").click(function(event) {
        event.preventDefault();
        var index1 = $('#index1').val();
        var reason = $('#reason').val();


        if (index1 === '' || reason === '') {
            $('#return1').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/rejectcourse.php",
                method: "POST",
                data: $('#myform2').serialize(),
                beforeSend: function() {
                $('#rej').hide();
                $('#cancel').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#rej').show();
                    $('#cancel').show();
                    $('.loader').hide();
                    $('#editcoursemodal1').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});
