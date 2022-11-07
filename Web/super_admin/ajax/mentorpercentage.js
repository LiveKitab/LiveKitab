$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();
        var index = $('#index').val();
        var mentorid = $('#mentorid').val();
        var course_id = $('#course_id').val();
        var per = $('#per').val();

        if (index === '' || mentorid === '' || course_id === '' || per === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/addmentorpercentage.php",
                method: "POST",
                data: $('#MyForm').serialize(),
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
                $('#EditModal').modal('toggle');
                $('#load').load(' #load');
                }
            });
        }
    });
});