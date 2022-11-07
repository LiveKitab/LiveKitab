$(document).ready(function() {

    $(document).on('click', '.editstream', function(e) {

        $('#editmodal17').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#s_name').val(data[2]);
    });

});