// function AddQuestion() {
//     var url = 'back/operation/addquestion.php';
//     var testid = $('#testid').val();
//     var no_que = $('#no_que').val();
//     var answer = $('#answer').val();
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
//             testid: testid,
//             answer: answer,
// 	        sol: sol,
// 	        no_que: no_que
//         },
//         beforeSend: function() {
//             $('#q_submit').hide();
//             $('#q_reset').hide();
//             $('.loader').show();
//         },
//         success: function(data) {
//             $('#MyForm').trigger("reset");
//             $('#que').fadeIn().html(data);
//             $('#q_submit').show();
//             $('#q_reset').show();
//             $('.loader').hide();
//             setTimeout(function() {
//                         location.reload(true);
//                     }, 4000);
//             $('#load').load(' #load');
//             alert(data);
//             return false;
//         }
//     });
//     return false;
// }



function AddQuestion() {
    var form = $('#MyForm')[0];
    var data = new FormData(form);
    var url = 'back/operation/addquestion.php';
    $.ajax({
        url: url,
        type: "POST",
        data: data,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
            $('#q_submit').hide();
            $('#q_reset').hide();
            $('.loader').show();
        },
        success: function(data) {
            // $('#MyForm').trigger("reset");
            // $('#que').fadeIn().html(data);
            // $('#q_submit').show();
            // $('#q_reset').show();
            // $('.loader').hide();
            // $('#load4').load(' #load4');
            alert(data);
            return false;
        }
    });
    return false;
}