<?php
include("../../../db/connect.php");

if(isset($_POST['index']) && isset($_POST['pub']) && isset($_POST['plan']) && isset($_POST['courseid']))
{
        $id = mysqli_real_escape_string($con,$_POST['index']);
        $id = htmlspecialchars($id);
        $courseid = mysqli_real_escape_string($con,$_POST['courseid']);
        $courseid = htmlspecialchars($courseid);
        $pub = mysqli_real_escape_string($con,$_POST['pub']);
        $pub = htmlspecialchars($pub);
        $plan = mysqli_real_escape_string($con,$_POST['plan']);
        $plan = htmlspecialchars($plan);
        
        $data = "update course_data set e_id='$pub', course_apprrej='1' where id='$id'";
        $result = mysqli_query($con,$data) or die(mysqli_error($con));
        if($result)
        {
            $ins = "INSERT INTO `course_plan`(`id`, `course_id`, `plan_id`, `status`) VALUES (null,'$courseid','$plan','0')";
            $run = mysqli_query($con,$ins) or die(mysqli_error($con));
            if($run)
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
            toastr["success"]("Courses Approved...!","Approved")
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