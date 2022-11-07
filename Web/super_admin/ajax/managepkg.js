$(document).ready(function() {
    $("#psubmit").click(function(event) {
        event.preventDefault();
        var subject = $('#subject').val();
        var rmk = $('#rmk').val();
        var pkg_id = $('#pkg_id').val();
        
        

        
        if (subject == '' || pkg_id == '') {
            $('#pkg').html('<h4 style="color:red;">Required All Fields..</h4>');
        } 

        
        else {
            $.ajax({
                url: "back/operation/managepkg",
                method: "POST",
                data: $('#MYFORM').serialize(),
                beforeSend: function() {
                $('#psubmit').hide();
                $('#reset').hide();
                $('.loader').show();
        },
                success: function(data) {
                    $('form').trigger("reset");
                    $('#pkg').fadeIn().html(data);
                    $('#psubmit').show();
                    $('#reset').show();
                    $('.loader').hide();
                    $('#load').load(' #load');
                }
            });
        }
    });
});