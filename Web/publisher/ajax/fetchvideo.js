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