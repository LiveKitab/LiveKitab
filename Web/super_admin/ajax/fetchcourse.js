$(document).ready(function() {

    $(document).on('click', '.apprcourse', function(e) {

        $('#editcoursemodal').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#courseid').val(data[10]);

    });
});


$(document).ready(function() {

    $(document).on('click', '.rejcourse', function(e) {

        $('#editcoursemodal1').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index1').val(data[0]);

    });
});