$(document).ready(function() {
    $("#update").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var m_name = $('#m_name').val();
        var m_fname = $('#m_fname').val();
        var m_lname = $('#m_lname').val();
         var m_cont = $('#m_cont').val();
          var m_email = $('#m_email').val();
           var m_addr = $('#m_addr').val();

        if (id === '' || m_name === '' || m_fname === '' || m_lname === ''|| m_cont === ''|| m_email === ''|| m_addr === '') {
            $('#data').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/editmentor.php",
                method: "POST",
                data: $('#updatementor').serialize(),
                beforeSend: function() {
                $('#update').hide();
                $('#reset').hide();
                $('.loader').show();
                },
                success: function(data) {
                    $('#data').fadeIn().html(data);
                    $('#update').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#editmodal12').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});