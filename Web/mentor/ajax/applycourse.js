function applycourse() {
    var form = $('#MyForm')[0];
    var data = new FormData(form);
    var url = 'back/operation/courserequest.php';

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                $('#submit').hide();
                $('#reset22').hide();
                $('.loader').show();
            },
                success: function(data) {
                        $('form').trigger("reset");
                        $('#return').fadeIn().html(data);
                        $('#ExploreCourse').modal('toggle');
                        $('#submit').show();
                        $('#reset22').show();
                        $('.loader').hide();
                        setTimeout(function() {
                        location.reload(true);
                        }, 2000);
                    }
            });
            return false;
}