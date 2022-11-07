$(document).ready(function() {

    $(document).on('click', '.applycourse', function(e) {

        $('#ExploreCourse').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#sub_id').val(data[1]);
        $('#sub_name').val(data[2]);
        $('#sub_code').val(data[3]);
        
    });
});


$(document).ready(function() {

    $(document).on('click', '.viewcourse', function(e) {

        $('#ViewExploreCourse').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#course_id1').val(data[1]);
        $('#vcname').val(data[8]);
        $('#vcprice').val(data[10]);
        $('#vcpd').val(data[13]);
        $('#vcdes').val(data[14]);
        $('#vcsdate').val(data[15]);
        $('#vcedate').val(data[16]);
        
    });
});