$(document).ready(function() {
    $("#t_submit").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var t_title = $('#t_title').val();
        var t_que = $('#t_que').val();
        var t_total = $('#t_total').val();
        var t_pos = $('#t_pos').val();
        var t_neg = $('#t_neg').val();
        


        if (id === '' || t_title === '' || t_que === '' || t_total === '' || t_pos === '' || t_neg === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/edittest.php",
                method: "POST",
                data: $('#MyForm').serialize(),
                beforeSend: function() {
                $('#t_submit').hide();
                $('#ret').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#t_submit').show();
                    $('#ret').show();
                    $('.loader').hide();
                    $('#testmodal').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});
