function apprmentor(id) {
    $.confirm({
    title: 'Approve Mentor',
    content: 'Are You Sure To Approve This Mentor ?',
    buttons: {
        confirm: function () {
            if(id == ''){
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
                "timeOut": "2000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["warning"]("Something Wants Wrong To Send Request...")
        }
        else
        {
            $.ajax({
            url: "back/operation/apprejmentor.php",
            type: "POST",
            data: { id: id },
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




function rejmentor(id) {
    
        $.confirm({
    title: 'Reject Mentor',
    content: 'Are You Sure To Reject This Mentor ?',
    buttons: {
        confirm: function () {
            if(id == ''){
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
            toastr["warning"]("Something Wants Wrong To Send Request...")
        }
        else
        {
            $.ajax({
            url: "back/operation/apprejmentor.php",
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

