$(document).ready(function() {

    $(document).on('click', '.editbanner', function(e) {

        $('#editmodal16').modal('show');

        $tr = $(this).closest('tr');

        var data = $tr.children("td").map(function() {
            return $(this).text();
        }).get();

        $('#index').val(data[0]);
        $('#b_name').val(data[2]);
        $('#b_cont').val(data[3]);
        $('#b_email').val(data[4]);
        $('#b_addr').val(data[9]);
        $('#b_des').val(data[10]);
         $('#b_price').val(data[5]);
          $('#b_dis').val(data[6]);
           $('#b_sdate').val(data[7]);
           $('#b_edate').val(data[8]);
        
        
    });

});