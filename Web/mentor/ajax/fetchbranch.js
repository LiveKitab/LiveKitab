$(document).ready(function() {

    $(document).on('click', '.editbranch', function(e) {

        $('#editmodal14').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#b_name').val(data[2]);
        //$('#ub_img').val(data[3]);
        
        
        
        
    });

});