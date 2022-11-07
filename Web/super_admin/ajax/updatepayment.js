$(document).ready(function() {
    $("#editpayment").click(function(event) {
        event.preventDefault();
        var id = $('#id').val();
        var transaction_id = $('#transaction_id').val();
        var bill_id = $('#bill_id').val();
        var order_id = $('#order_id').val();
        var payment_mode = $('#payment_mode').val();
        var amount = $('#amount').val();
        
        if (id == '' || transaction_id == '' || bill_id == ''|| order_id == ''|| payment_mode == ''|| amount == '') {
            $('#return').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {
            $.ajax({
                url: "back/operation/editpayment.php",
                method: "POST",
                data: $('#updatepayment').serialize(),
                beforeSend: function() {
                $('#editpayment').hide();
                $('#resetbtn').hide();
                // $('.loader1').hide();
                },
                success: function(data) {
                    $('#return').fadeIn().html(data);
                    $('#updatepayment').show();
                    $('#resetbtn').show();
                    // $('.loader1').show();
                    $('#Paymentmodal').modal('toggle');
                    $('#load3').load(' #load3');
                   //alert(data);
                }
            });
        }
    });
});