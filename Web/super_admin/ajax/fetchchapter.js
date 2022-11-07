$(document).ready(function() {

    $(document).on('click', '.editchapter', function(e) {

        $('#Chaptermodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#ch_no').val(data[2]);
        $('#ch_name').val(data[3]);
        
    });

});