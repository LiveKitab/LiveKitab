$(document).ready(function() {
    $("#pay").click(function(event) {
        event.preventDefault();
        var month = $('#month').val();
         var pm = $('#pm').val();
        var amt = $('#amt').val();
        var rmk = $('#rmk').val();
        var year = $('#year').val();
        var course_id1 = $('#course_id1').val();
        var index1 = $('#index1').val();
        var c_id1 = $('#c_id1').val();

        
        if (month == '' || year == '' || pm == '' || amt == '' || rmk == '' || course_id1 == '' || index1 == '' || c_id1 == '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } 

        
        else {
            $.ajax({
                url: "back/operation/payment",
                method: "POST",
                data: $('#MyForm1').serialize(),
                beforeSend: function() {
                $('#pay').hide();
                $('#cancelpayment').hide();
                $('.loader1').show();
        },
                success: function(data) {
                    $('form').trigger("reset");
                    $('#return').fadeIn().html(data);
                    $('#pay').show();
                    $('#cancelpayment').show();
                    $('.loader1').hide();
                    $('#EditModal1').modal('toggle');
                }
            });
        }
    });
});