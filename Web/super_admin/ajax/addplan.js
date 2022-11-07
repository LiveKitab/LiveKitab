$(document).ready(function() {
    $("#submit").click(function(event) {
        event.preventDefault();
        var pname = $('#pname').val();
         var price = $('#price').val();
        var title = $('#title').val();
        var p_des = $('#p_des').val();
        var tc_des = $('#tc_des').val();
        
        

        
        if (pname == '' || price == '' || title == '' || p_des == '' || tc_des == '') {
            $('#plan').html('<h4 style="color:red;">Required All Fields..</h4>');
        } 

        
        else {
            $.ajax({
                url: "back/operation/addplan",
                method: "POST",
                data: $('#myform').serialize(),
                beforeSend: function() {
                $('#submit').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('form').trigger("reset");
                    $('#plan').fadeIn().html(data);
                    $('#submit').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#load').load(' #load');
                }
            });
        }
    });
});