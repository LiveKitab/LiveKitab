<?php
  include("../../../db/connect.php");

	    if(isset($_POST['index']) && isset($_POST['e_name']) && isset($_POST['c_name']) && isset($_POST['c_price']) && isset($_POST['p_duration']) && isset($_POST['v_limit']) && isset($_POST['c_des']))
	    {
            $id = mysqli_real_escape_string($con,$_POST['index']);
            $id = htmlspecialchars($id);
            $e_name = mysqli_real_escape_string($con,$_POST['e_name']);
            $e_name = htmlspecialchars($e_name);
            $c_name = mysqli_real_escape_string($con,$_POST['c_name']);
            $c_name = htmlspecialchars($c_name);
            $c_price = mysqli_real_escape_string($con,$_POST['c_price']);
            $c_price = htmlspecialchars($c_price);
            $p_duration = mysqli_real_escape_string($con,$_POST['p_duration']);
            $p_duration = htmlspecialchars($p_duration);
            $v_limit = mysqli_real_escape_string($con,$_POST['v_limit']);
            $v_limit = htmlspecialchars($v_limit);
            $c_des = mysqli_real_escape_string($con,$_POST['c_des']);
            $c_des = htmlspecialchars($c_des);

            
            $sel = "update course_data set e_id='$e_name', course_name='$c_name', course_price='$c_price', course_plan_duration='$p_duration', course_video_limit='$v_limit',course_des='$c_des' where id='$id'";
            $sql=mysqli_query($con,$sel) or die(mysqli_error($con));
            if($sql) 
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
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                  }
                    toastr["success"]("Courses Updated Named <?php echo $c_name; ?> Success...!","Courses")
                </script>
                <?php
            }
            else
            {
                echo'<script>
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
                    toastr["error"]("Something Went Wrong...!","Failed")
                </script>';           
            }
                
        }
        else
        {
           header('location:../../../404.php');   
        }
     

?>