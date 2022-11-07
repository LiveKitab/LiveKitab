$(document).ready(function() {
    $("#update").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var u_name = $('#u_name').val();

        if (id === '' || u_name === '') {
            $('#data').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/edit_year_uni.php",
                method: "POST",
                data: $('#updateuniver').serialize(),
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
                    $('#unimodal').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});