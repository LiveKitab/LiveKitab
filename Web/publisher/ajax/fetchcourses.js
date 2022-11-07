$(document).ready(function() {

    $(document).on('click', '.editcourses', function(e) {

        $('#editmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#e_name').val(data[2]);
        $('#c_name').val(data[3]);
        $('#c_price').val(data[4]);
        $('#p_duration').val(data[5]);
        $('#v_limit').val(data[7]);
        $('#c_des').val(data[6]);
        
    });

});