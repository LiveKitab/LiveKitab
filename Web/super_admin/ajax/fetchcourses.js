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
        $('#c_price').val(data[10]);
        $('#c_dis').val(data[11]);
        $('#p_duration').val(data[12]);
        $('#v_limit').val(data[14]);
        $('#c_des').val(data[13]);
        $('#c_code').val(data[18]);
        $('#c_credit').val(data[19]);
        
    });

});