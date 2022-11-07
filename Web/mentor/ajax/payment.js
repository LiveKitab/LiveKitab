$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();
        var month = $('#month').val();
         var pm = $('#pm').val();
        var amt = $('#amt').val();
        var rmk = $('#rmk').val();
        var course_id = $('#course_id').val();
        
        
        

        
        if (month == '' || pm == '' || amt == '' || rmk == '' || course_id == '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } 

        
        else {
            $.ajax({
                url: "back/operation/payment",
                method: "POST",
                data: $('#MyForm').serialize(),
                beforeSend: function() {
                $('#submit').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('form').trigger("reset");
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