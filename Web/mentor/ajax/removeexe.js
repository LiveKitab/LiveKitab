function deleteexe(id) {

    if (confirm('Are You Sure To Delete This Exercise ?')) {

        $.ajax({
            url: "back/operation/deleteexe.php",
            type: "POST",
            data: { id: id },
            success: function(data) {
                $('#exercise').fadeIn().html(data);
                $('#delete' + id).hide('slow');
                $('#load').load(' #load');
                return false;
            }
        });
        return false;
    }
}