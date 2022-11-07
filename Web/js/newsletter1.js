function newsletter() {
    var newsemail = $('#newsemail').val();
    var form = $('#newsletter')[0];
    var data = new FormData(form);
    var url = 'php/newsletter1.php';
    var error = '<div class="alert alert-danger" role="alert">Email Can Not Be Empty ! </div>';
    if(newsemail === '')
    {
        $('#return').fadeIn().html(error);
        return false;
    }
    else
    {
            $.ajax({
                url: url,
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                        $('form').trigger("reset");
                        $('#return').fadeIn().html(data);
                       
                    }
               
            });
            return false;
    }

}