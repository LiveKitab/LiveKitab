function applycourse() {
    var form = $('#MyForm')[0];
    var data = new FormData(form);
    var url = 'back/operation/apprejvideoreq.php';

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                $('#submit').hide();
                $('#reset22').hide();
                $('.loader').show();
            },
                success: function(data) {
                        $('form').trigger("reset");
                        $('#return').fadeIn().html(data);
                        $('#ExploreCourse').modal('toggle');
                        $('#submit').show();
                        $('#reset22').show();
                        $('.loader').hide();
                        setTimeout(function() {
                        location.reload(true);
                        }, 2000);
                    }
            });
            return false;
}



function rejvdeo(id) {
    
        $.confirm({
    title: 'Reject Video Request',
    content: 'Are You Sure To Reject This Video Request ?',
    buttons: {
        confirm: function () {
            if(id === ''){
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": true,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["warning"]("Something Went Wrong To Send Request...")
        }
        else
        {
            $.ajax({
            url: "back/operation/apprejvideoreq.php",
            type: "POST",
            data: { id1: id },
            success: function(data) {
                $('#return').fadeIn().html(data);
                $('#load').load(' #load');
                return false;
            }
        });
        }
        },
        cancel: function () {
            $.alert('Canceled Operation !');
        }
    }
});

}