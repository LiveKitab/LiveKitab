function contact_us() {
    var form = $('#MyForm')[0];
    var data = new FormData(form);
    var url = 'assets/php/mail.php';
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
                alert(data);
            }
    });
    return false;
}