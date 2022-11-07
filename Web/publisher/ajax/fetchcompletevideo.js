$(document).ready(function() {

    $(document).on('click', '.completevideo', function(e) {

        $('#complete').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        
        
    });

});