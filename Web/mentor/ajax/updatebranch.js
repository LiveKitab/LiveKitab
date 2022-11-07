function editbranch() {
    var form = $('#myform1')[0];
    var data = new FormData(form);
    var url = 'back/operation/editbranch.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#edit').hide();
            $('#cancel').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform1').trigger("reset");
            $('#editbranch').fadeIn().html(data);
            $('#edit').show();
            $('#cancel').show();
            $('.loader').hide();
            $('#load').load(' #load');
            $('#editmodal14').modal('toggle');
            return false;
        }
    });
    return false;
}
