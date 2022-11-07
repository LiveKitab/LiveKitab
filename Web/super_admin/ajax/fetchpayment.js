$(document).ready(function() {

    $(document).on('click', '.editpayment', function(e) {

        $('#Paymentmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#transaction_id').val(data[2]);
        $('#bill_id').val(data[3]);
        $('#order_id').val(data[4]);
        $('#payment_mode').val(data[6]);
        $('#amount').val(data[7]);
       });

});