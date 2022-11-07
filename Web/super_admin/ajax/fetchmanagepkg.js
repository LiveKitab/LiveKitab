$(document).ready(function() {

    $(document).on('click', '.editmngpkg', function(e) {

        $('#managepkgmodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        
        $('#p_rmk').val(data[4]);
        
    });

});