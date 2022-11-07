$(document).ready(function() {
    $("#editchapter").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var ch_no = $('#ch_no').val();
        var ch_name = $('#ch_name').val();
        
        if (id == '' || ch_no == '' || ch_name == '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/editchapter.php",
                method: "POST",
                data: $('#updatechapter').serialize(),
                beforeSend: function() {
                $('#editchapter').hide();
                $('#resetbtn').hide();
                $('.loader1').show();
                },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#updatechapter').show();
                    $('#resetbtn').show();
                    $('.loader1').hide();
                    $('#Chaptermodal').modal('toggle');
                    $('#load3').load(' #load3');
                    // alert(data);
                }
            });
        }
    });
});