$(document).ready(function() {

    $(document).on('click', '.editplan', function(e) {

        $('#editmodal15').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#p_name').val(data[2]);
        $('#p_price').val(data[3]);
        $('#p_title').val(data[5]);
        $('#plan_des').val(data[6]);
        $('#plan_tc').val(data[7]);
    });
});