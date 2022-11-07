$(document).ready(function() {

    $(document).on('click', '.editex', function(e) {

        $('#exmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#title').val(data[2]);
        $('#descr').val(data[3]);
        
        
    });

});