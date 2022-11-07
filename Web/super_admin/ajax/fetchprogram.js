$(document).ready(function() {

    $(document).on('click', '.editprogram', function(e) {

        $('#editmodal18').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#pname1').val(data[2]);
        
        
    });

});