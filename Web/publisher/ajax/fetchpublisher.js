$(document).ready(function() {

    $(document).on('click', '.editeditor', function(e) {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#p_name').val(data[2]);
        $('#p_cont').val(data[3]);
        $('#p_email').val(data[4]);
        $('#p_addr').val(data[5]);
        $('#p_des').val(data[6]);
    });

});