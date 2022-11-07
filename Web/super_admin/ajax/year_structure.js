function uni() {
    var form = $('#myform4')[0];
    var data = new FormData(form);
    var url = 'back/operation/add_year_uni.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#submit').hide();
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform4').trigger("reset");
            $('#return').fadeIn().html(data);
            $('#submit').show();
            $('#reset').show();
            $('.loader').hide();
            $('#load').load(' #load');
            return false;
        }
    });
    return false;
}


function stream() {
    var form = $('#myform')[0];
    var data = new FormData(form);
    var url = 'back/operation/addstream.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#submit').hide();
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform').trigger("reset");
            $('#return').fadeIn().html(data);
            $('#submit').show();
            $('#reset').show();
            $('.loader').hide();
            $('#load').load(' #load');
            return false;
        }
    });
    return false;
}


function program() {
    var form = $('#myform1')[0];
    var data = new FormData(form);
    var url = 'back/operation/addprogram.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#p_submit').hide();
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform1').trigger("reset");
            $('#return1').fadeIn().html(data);
            $('#p_submit').show();
            $('#reset').show();
            $('.loader').hide();
            $('#load1').load(' #load1');
            return false;
        }
    });
    return false;
}


function branch() {
    var form = $('#myform2')[0];
    var data = new FormData(form);
    var url = 'back/operation/addbranch.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#b_submit').hide();
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform2').trigger("reset");
            $('#branch').fadeIn().html(data);
            $('#b_submit').show();
            $('#reset').show();
            $('.loader').hide();
            $('#load2').load(' #load2');
            return false;
        }
    });
    return false;
}


function term() {
    var form = $('#myform3')[0];
    var data = new FormData(form);
    var url = 'back/operation/addterm.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#t_submit').hide();
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform3').trigger("reset");
            $('#term').fadeIn().html(data);
            $('#t_submit').show();
            $('#reset').show();
            $('.loader').hide();
            $('#load3').load(' #load3');
            return false;
        }
    });
    return false;
}


function subject() {
    var form = $('#myform6')[0];
    var data = new FormData(form);
    var url = 'back/operation/addsubject.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#s_submit').hide();
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#myform6').trigger("reset");
            $('#sub').fadeIn().html(data);
            $('#s_submit').show();
            $('#reset').show();
            $('.loader').hide();
            $('#load4').load(' #load4');
            return false;
        }
    });
    return false;
}