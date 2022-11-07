$(document).ready(function() {

    $(document).on('click', '.editvideo', function(e) {

        $('#editmodal16').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#v_sequence').val(data[2]);
        $('#v_title').val(data[3]);
        $('#v_ch_name').val(data[4]);
        $('#v_link').val(data[6]);
        $('#v_des').val(data[7]);
        $('#v_remk').val(data[8]);
        
        
    });

});



/* Reply Video*/

$(document).ready(function() {

    $(document).on('click', '.reply', function(e) {

        $('#replymodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        
        
        
        
        
    });

});