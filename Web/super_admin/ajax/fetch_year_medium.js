$(document).ready(function() {

    $(document).on('click', '.editterm', function(e) {

        $('#editmodal19').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#termname').val(data[3]);
        $('#med').val(data[2]);
        
    });

});