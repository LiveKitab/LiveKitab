$(document).ready(function() {

    $(document).on('click', '.editmentor', function(e) {

        $('#editmodal12').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#m_name').val(data[2]);
        $('#m_fname').val(data[3]);
        $('#m_lname').val(data[4]);
        $('#m_cont').val(data[5]);
        $('#m_email').val(data[6]);
        $('#m_addr').val(data[7]);
        $('#discount').val(data[10]);
        
    });

});