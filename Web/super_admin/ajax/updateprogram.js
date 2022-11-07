$(document).ready(function() {
    $("#update").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var pname1 = $('#pname1').val();
        

        if (id === '' || pname1 === '') {
            $('#data').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/editprogram.php",
                method: "POST",
                data: $('#updateprogram').serialize(),
                beforeSend: function() {
                $('#update').hide();
                $('#resetbtn').hide();
                $('.loader').show();
                },
                success: function(data) {
                    $('#data').fadeIn().html(data);
                    $('#update').show();
                $('#resetbtn').show();
                $('.loader').hide();
                    $('#editmodal18').modal('toggle');
                    $('#load1').load(' #load1');
                }
            });
        }
    });
});