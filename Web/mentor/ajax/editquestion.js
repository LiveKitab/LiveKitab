// function editquestion() {
//     var url = 'back/operation/editques.php';

//     var que_id = $('#que_id').val();
//     var ans = $('#ans').val();

//     var qs = CKEDITOR.instances['qs'].getData();
//     var a = CKEDITOR.instances['a'].getData();
//     var b = CKEDITOR.instances['b'].getData();
//     var c = CKEDITOR.instances['c'].getData();
//     var d = CKEDITOR.instances['d'].getData();
//     var sol = CKEDITOR.instances['sol'].getData();

//     $.ajax({
//         url: url,
//         type: "POST",
//         data: {
//             qs: qs,
//             a: a,
//             b: b,
//             c: c,
//             d: d,
//             que_id: que_id,
//             ans: ans,
// 	    sol: sol,
//         },
//         beforeSend: function() {
//             $('#update').hide();
//             $('#reset').hide();
//             $('.loader').show();
//         },
//         success: function(data) {
//             $('#updateform').trigger("reset");
//             $('#done').fadeIn().html(data);
//             $('#update').show();
//             $('#reset').show();
//             $('.loader').hide();
//             return false;
//         }
//     });
//     return false;
// }


function editquestion() {
    var form = $('#updateform')[0];
    var data = new FormData(form);
    var url = 'back/operation/editques.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#update').hide();
            $('#reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            $('#updateform').trigger("reset");
            $('#done').fadeIn().html(data);
            $('#update').show();
            $('#reset').show();
            $('.loader').hide();
            $('#load4').load(' #load4');
           // alert(data);
            return false;
        }
    });
    return false;
}