$(document).ready(function() {

    $(document).on('click', '.editscholar', function(e) {

        $('#editmodal13').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#s_name').val(data[2]);
        $('#s_fname').val(data[3]);
        $('#s_lname').val(data[4]);
        $('#s_cont').val(data[5]);
        $('#s_email').val(data[6]);
        $('#s_addr').val(data[7]);
        $('#s_state').val(data[8]);
        $('#s_city').val(data[9]);
        
    });

});