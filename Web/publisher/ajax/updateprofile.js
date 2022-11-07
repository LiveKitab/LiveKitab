$(document).ready(function() {
    $("#update").click(function(event) {
        event.preventDefault();
        var sa_name1 = $('#sa_name1').val();
        var sa_cno1 = $('#sa_cno1').val();
        var sa_email1 = $('#sa_email1').val();
        var sa_addr1 = $('#sa_addr1').val();
        


        if (sa_name1 === '' || sa_cno1 === '' || sa_email1 === '' || sa_addr1 === '') {
            $('#data').html('<h4 style="color:red;">Required All Fields..</h4>');
        } else {

            $.ajax({
                url: "back/operation/editprofile.php",
                method: "POST",
                data: $('#updateprofile').serialize(),
                success: function(data) {
                    $('#data').fadeIn().html(data);
                    $('#modelId1').modal('toggle');
                    $('#load').load(' #load');
                }
            });
        }
    });
});