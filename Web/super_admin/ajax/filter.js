$(document).ready(function() {
    $("#srd").click(function(event) {
        event.preventDefault();
        var sd = $('#sd').val();
        var ed = $('#ed').val();

        if (sd === "" || ed === "") {
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
              toastr["warning"]("Please Select Proper Start Date And End Date Of Filters...!")
        } 
        else 
        {
            if(sd <= ed)
            {
                    $.ajax({
                    url: "back/display/filtercourses.php",
                    method: "POST",
                    data: $('#filterdate').serialize(),
                        success: function(data) {
                            $('#filterdatediv').html(data);
                            $('#filtermodal').modal('toggle');
                    }
                });
            }
            else
            {
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
                  toastr["warning"]("Please Select Proper Start Date And End Date Of Filters...!")
            }
        }
    });
});


$(document).ready(function() {
        $("#srp").click(function(event) {
        event.preventDefault();
        var sp = $('#sp').val();
        var ep = $('#ep').val();

        if (sp === "" || ep === "") {
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
              toastr["warning"]("Please Select Proper Start Price And End Price Of Filters ...!")
        } 
        else 
        {
                    $.ajax({
                    url: "back/display/filtercourses.php",
                    method: "POST",
                    data: $('#filterprice').serialize(),
                        success: function(data) {
                            $('#filterdatediv').html(data);
                            $('#filtermodal').modal('toggle');
                    }
                });
        }
    }); 
});



$(document).ready(function() {
        $("#srdi").click(function(event) {
        event.preventDefault();
        var sdi = $('#sdi').val();
        var edi = $('#edi').val();

        if (sdi === "" || edi === "") {
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
              toastr["warning"]("Please Select Proper Start Discount And End Discount Of Filters ...!")
        } 
        else 
        {
                    $.ajax({
                    url: "back/display/filtercourses.php",
                    method: "POST",
                    data: $('#filterdis').serialize(),
                        success: function(data) {
                            $('#filterdatediv').html(data);
                            $('#filtermodal').modal('toggle');
                    }
                });
        }
    }); 
});




$(document).ready(function() {
        $("#srfuni").click(function(event) {
        event.preventDefault();
        var funi = $('#funi').val();

        if (funi === "") {
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
              toastr["warning"]("Please Select Proper University Of Filters ...!")
        } 
        else 
        {
                    $.ajax({
                    url: "back/display/filtercourses.php",
                    method: "POST",
                    data: $('#filteruni').serialize(),
                        success: function(data) {
                            $('#filterdatediv').html(data);
                            $('#filtermodal').modal('toggle');
                    }
                });
        }
    }); 
});



$(document).ready(function() {
        $("#fsst").click(function(event) {
        event.preventDefault();
        var sst = $('#sst').val();

        if (sst === "") {
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
              toastr["warning"]("Please Select Proper Stream Of Filters ...!")
        } 
        else 
        {
                    $.ajax({
                    url: "back/display/filtercourses.php",
                    method: "POST",
                    data: $('#filterstr').serialize(),
                        success: function(data) {
                            $('#filterdatediv').html(data);
                            $('#filtermodal').modal('toggle');
                    }
                });
        }
    }); 
});


$(document).ready(function() {
        $("#fspr").click(function(event) {
        event.preventDefault();
        var spr = $('#spr').val();

        if (spr === "") {
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
              toastr["warning"]("Please Select Proper Program Of Filters ...!")
        } 
        else 
        {
                    $.ajax({
                    url: "back/display/filtercourses.php",
                    method: "POST",
                    data: $('#filterprog').serialize(),
                        success: function(data) {
                            $('#filterdatediv').html(data);
                            $('#filtermodal').modal('toggle');
                    }
                });
        }
    }); 
});

$(document).ready(function() {
        $("#fssm").click(function(event) {
        event.preventDefault();
        var ssm = $('#ssm').val();

        if (ssm === "") {
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
              toastr["warning"]("Please Select Proper Semester Of Filters ...!")
        } 
        else 
        {
                    $.ajax({
                    url: "back/display/filtercourses.php",
                    method: "POST",
                    data: $('#filtersm').serialize(),
                        success: function(data) {
                            $('#filterdatediv').html(data);
                            $('#filtermodal').modal('toggle');
                    }
                });
        }
    }); 
});

$(document).ready(function() {
        $("#fsmd").click(function(event) {
        event.preventDefault();
        var smd = $('#smd').val();

        if (smd === "") {
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
              toastr["warning"]("Please Select Proper Medium Of Filters ...!")
        } 
        else 
        {
                    $.ajax({
                    url: "back/display/filtercourses.php",
                    method: "POST",
                    data: $('#filtermd').serialize(),
                        success: function(data) {
                            $('#filterdatediv').html(data);
                            $('#filtermodal').modal('toggle');
                    }
                });
        }
    }); 
});