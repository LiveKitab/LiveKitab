$(document).ready(function() {

    $(document).on('click', '.apprcourse', function(e) {

        $('#ExploreCourse').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#id').val(data[0]);
        
    });
});