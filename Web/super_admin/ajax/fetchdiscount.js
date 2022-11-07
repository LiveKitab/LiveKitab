$(document).ready(function() {

    $('.adddiscount').on('click', function() {

        $('#FeeDiscountModal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#cid').val(data[12]);
       

    });

});