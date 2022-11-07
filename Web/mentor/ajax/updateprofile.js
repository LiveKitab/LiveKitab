// $(document).ready(function() {
//     $("#update").click(function(event) {
//         event.preventDefault();
//         var name = $('#name').val();
//         var fname = $('#fname').val();
//         var lname = $('#lname').val();
//         var cno = $('#cno').val();
//         var email = $('#email').val();
//         var addr = $('#addr').val();
//         var state = $('#state').val();
//         var city = $('#city').val();
//         var edu = $('#edu').val();
//         var spec = $('#spec').val();
        


//         if (name === '' || fname === '' || lname === '' || cno === ''|| email === ''|| addr === ''|| state === ''|| city === ''|| edu === ''|| spec === '') {
//             $('#data').html('<h4 style="color:red;">Required All Fields..</h4>');
//         } else {

//             $.ajax({
//                 url: "back/operation/editprofile.php",
//                 method: "POST",
//                 data: $('#updateprofile').serialize(),
//                 success: function(data) {
//                     $('#data').fadeIn().html(data);
//                     $('#modelId1').modal('toggle');
//                     $('#load').load(' #load');
//                 }
//             });
//         }
//     });
// });




function updateprofile() {
    var form = $('#up')[0];
    var data = new FormData(form);
    var url = 'back/operation/editprofile.php';
    $.ajax({
        url: url,
        type: "POST",
        data: {
            id:id,
            name:name,
            fname:fname,
            lname:lname,
            cno:cno,
            email:email,
            addr:addr,
            state:state,
            city:city,
            edu:edu,
            spec:spec,
            acc_holder:acc_holder,
            ac_type:ac_type,
            ac_no:ac_no,
            ifsc_no:ifsc_no,
            m_id:m_id,
            m_key:m_key,
            m_photo:m_photo
        },
        contentType: false,
        cache: false,
        processData: false,
        success: function(data) {
            // alert(id);
            // alert(name);
            // alert(fname);
            // alert(lname);
            // alert(cno);
            // alert(email);
            // alert(addr);
            // alert(state);
            // alert(city);
            // alert(edu);
            // alert(spec);
            // alert(acc_holder);
            // alert(ac_type);
            
            // $('#data').fadeIn().html(data);
            // $('#modelId1').modal('toggle');
            // $('#update').show();
            //   $('#close').show();
            // $('.loader').hide();
            // setTimeout(function() {
            // location.reload(true);
            // }, 1500);
            alert(data);
            return false;
        }
    });
    return false;
}