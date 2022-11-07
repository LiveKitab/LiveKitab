$(document).ready(function() {
    $("#updatesub").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var subcode = $('#subcode').val();
        var subname = $('#subname').val();
        
        if (id === '' || subcode === '' || subname === '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/edit_year_subject.php",
                method: "POST",
                data: $('#updatesubject').serialize(),
                beforeSend: function() {
                $('#updatesub').hide();
                $('#resetbtn').hide();
                $('.loader1').show();
                },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#updatesub').show();
                    $('#resetbtn').show();
                    $('.loader1').hide();
                    $('#submodal').modal('toggle');
                    $('#load3').load(' #load3');
                }
            });
        }
    });
});