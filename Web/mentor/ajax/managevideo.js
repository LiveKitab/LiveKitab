/* Publish  1 */
function blockvideo(id) {

    $.confirm({
    title: 'Publish Video',
    content: 'Are You Sure To Publish This Video ?',
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
                url: "back/operation/publishvideo.php",
                type: "POST",
                data: { id: id },
                success: function(data) {
                    $('#load1').load(' #load1');
                    $('#return').fadeIn().html(data);
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






/* Unpublish  1 */


function unblockvideo(id) {

    $.confirm({
    title: 'Unpublish Video',
    content: 'Are You Sure To Unpublish This Video ?',
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
                url: "back/operation/unpublishvideo.php",
                type: "POST",
                data: { id: id },
                success: function(data) {
                    $('#load1').load(' #load1');
                    $('#return').fadeIn().html(data);
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


