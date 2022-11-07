/* Publish  1 */
function blockbranch(id) {

    $.confirm({
    title: 'Block Branch',
    content: 'Are You Sure To Block This Branch ?',
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
                url: "back/operation/publishbranch.php",
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






/* Unpublish  1 */


function unblockbranch(id) {

    $.confirm({
    title: 'Unblock Branch',
    content: 'Are You Sure To Unblock This Branch ?',
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
                url: "back/operation/unpublishbranch.php",
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


