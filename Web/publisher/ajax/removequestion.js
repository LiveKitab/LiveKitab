function deletequestion(id) {

    if (confirm('Are You Sure to Want to Remove Question ?')) {
        
       

        $.ajax({
            url: "back/operation/deletequestion.php",
            type: "POST",
            data: { id: id },
            success: function(data) {
                setTimeout(function() {
                        location.reload(true);
                    }, 4000);
                $('#load').load(' #load');
                $('#return').fadeIn().html(data);
                $('#delete' + id).hide('slow');
                return false;
            }
        });
        return false;
    }
}