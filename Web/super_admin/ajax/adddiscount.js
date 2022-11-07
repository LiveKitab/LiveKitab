$(document).ready(function() {
    $("#adddis").click(function(event) {
        event.preventDefault();
        var cid = $('#cid').val();
        var discount = $('#discount').val();
        var remark = $('#remark').val();
        
        var dis = $("input[name='distype']:checked").val();
        
        
        if ( discount === '' || cid === '' || remark === '') {
            $('#data').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/discount.php",
                method: "POST",
                data: {
                    discount: discount,
                    cid: cid,
                    remark: remark,
                },
                success: function(data) {
                    // $('#data').fadeIn().html(data);
                    // $('#FeeDiscountModal').modal('toggle');
                    // $('#load').load(' #load');
                    // setTimeout(function() {
                    //     location.reload(true);
                    // }, 4500);
                    alert(data);
                }
            });
        }
    });
});