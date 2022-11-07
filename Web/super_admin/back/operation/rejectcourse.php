<?php
include("../../../db/connect.php");

if(isset($_POST['index1']) && isset($_POST['reason']))
{
        $id = mysqli_real_escape_string($con,$_POST['index1']);
        $id = htmlspecialchars($id);
        $reason = mysqli_real_escape_string($con,$_POST['reason']);
        $reason = htmlspecialchars($reason);

        $data = "update course_data set rej_reason='$reason', course_apprrej='2' where id='$id'";
        $result = mysqli_query($con,$data) or die(mysqli_error($con));
        if($result)
        {
            ?>
			<script>
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
            toastr["success"]("Courses Rejected...!","Rejected")
		</script>
		<?php
        }
        else
        {
            ?>
            <script>
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
                  toastr["error"]("Something Went Wrong...!","Error")
          </script>
          <?php	
        }
    }
    
?>