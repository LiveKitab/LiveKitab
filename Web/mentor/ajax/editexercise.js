function editexe() {
    var url = 'back/operation/editexe.php';
    var id = $('#id').val();
    var title = $('#title').val();
    var exercise = CKEDITOR.instances['exercise'].getData();

    $.ajax({
        url: url,
        type: "POST",
        data: {
            exercise: exercise,
            id: id,
	        title: title
        },
        beforeSend: function() {
            $('#update').hide();
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#MyForm').trigger("reset");
            $('#exercise').fadeIn().html(data);
            $('#update').show();
            $('#reset').show();
            $('.loader').hide();
            setTimeout(function() {
                location.reload(true);
            }, 2500);
            $('#load').load(' #load');
            return false;
        }
    });
    return false;
}