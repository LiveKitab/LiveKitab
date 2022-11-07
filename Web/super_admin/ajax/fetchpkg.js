$(document).ready(function() {

    $(document).on('click', '.editpkg', function(e) {

        $('#pkgmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#p_title').val(data[2]);
        $('#p_uni').val(data[3]);
        $('#p_str').val(data[4]);
        $('#p_pro').val(data[5]);
        $('#p_brn').val(data[6]);
        $('#p_sem').val(data[8]);
        $('#p_med').val(data[7]);
        $('#p_price').val(data[9]);
        $('#p_dis').val(data[10]);
        $('#p_des').val(data[11]);
    });

});