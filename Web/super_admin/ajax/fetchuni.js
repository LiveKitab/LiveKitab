$(document).ready(function() {

    $(document).on('click', '.edituni', function(e) {

        $('#unimodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#u_name').val(data[2]);
        
    });

});