$(document).ready(function() {

    $(document).on('click', '.editsub', function(e) {

        $('#submodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        $('#subcode').val(data[2]);
        $('#subname').val(data[3]);
        
    });

});