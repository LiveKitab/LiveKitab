$(document).ready(function() {
    $("#e_submit").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var title = $('#title').val();
        var descr = $('#descr').val();

        if (id === '' || title === '' || descr === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/editex.php",
                method: "POST",
                data: $('#MyForm').serialize(),
                beforeSend: function() {
                $('#e_submit').hide();
                $('#ret').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#e_submit').show();
                    $('#ret').show();
                    $('.loader').hide();
                    $('#exmodal').modal('toggle');
                    $('#load').load(' #load');
                    // alert(data);
                }
            });
        }
    });
});
