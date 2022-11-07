$(document).ready(function() {
    $("#update").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var s_name = $('#s_name').val();

        if (id === '' || s_name === '') {
            $('#data').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/editstruture.php",
                method: "POST",
                data: $('#updatescholar').serialize(),
                beforeSend: function() {
                $('#update').hide();
                $('#resetbtn').hide();
                $('.loader1').show();
                },
                success: function(data) {
                    $('#data').fadeIn().html(data);
                    $('#update').show();
                    $('#resetbtn').show();
                    $('.loader1').hide();
                    $('#editmodal17').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});