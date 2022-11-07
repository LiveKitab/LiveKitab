function deletenotice(id) {

    if (confirm('Are You Sure To Delete This Notice ?')) {
        
    
        $.ajax({
            url: "back/operation/deletenotice.php",
            type: "POST",
            data: { id: id },
            success: function(data) {
                $('#return').fadeIn().html(data);
                $('#delete' + id).hide('slow');
                $('#load').load(' #load');
                setTimeout(function() {
                        location.reload(true);
                    }, 1500);
                return false;
            }
        });
        return false;
    }
}