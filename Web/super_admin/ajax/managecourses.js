/* Publish  1 */
function deleteAjax(id) {

    $.confirm({
    title: 'Publish Courses',
    content: 'Are You Sure To Publish This Courses ?',
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
                url: "back/operation/publishcourses.php",
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


function deleteAjax1(id) {

    $.confirm({
    title: 'Unpublish Courses',
    content: 'Are You Sure To Unpublish This Courses ?',
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
                url: "back/operation/unpublishcourses.php",
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


