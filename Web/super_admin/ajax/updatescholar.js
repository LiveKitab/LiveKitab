$(document).ready(function() {
    $("#update").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var s_name = $('#s_name').val();
        var s_fname = $('#s_fname').val();
        var s_lname = $('#s_lname').val();
         var s_cont = $('#s_cont').val();
          var s_email = $('#sm_email').val();
           var s_addr = $('#s_addr').val();
           var s_state = $('#s_state').val();
           var s_city = $('#s_city').val();

        if (id === '' || s_name === '' || s_fname === '' || s_lname === ''|| s_cont === ''|| s_email === ''|| s_addr === ''|| s_state === ''|| s_city === '') {
            $('#data').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/editscholar.php",
                method: "POST",
                data: $('#updatescholar').serialize(),
                beforeSend: function() {
                $('#update').hide();
                $('#cancel').hide();
                $('.loader').show();
                },
                success: function(data) {
                    $('#data').fadeIn().html(data);
                    $('#update').show();
                $('#cancel').show();
                $('.loader').hide();
                    $('#editmodal13').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});