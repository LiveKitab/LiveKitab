$(document).ready(function() {

    $(document).on('click', '.edittest', function(e) {

        $('#testmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#t_title').val(data[2]);
        $('#t_que').val(data[3]);
        $('#t_total').val(data[4]);
        $('#t_pos').val(data[5]);
        $('#t_neg').val(data[6]);
        
        
    });

});