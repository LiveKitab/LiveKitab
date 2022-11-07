<?php
  include("../../../db/connect.php");

	    if(isset($_POST['index']) && isset($_POST['p_name']) && isset($_POST['p_price']) && isset($_POST['p_title']) && isset($_POST['plan_des']) && isset($_POST['plan_tc']))
	    {
            $id = mysqli_real_escape_string($con,$_POST['index']);
            $id = htmlspecialchars($id);
            $p_name = mysqli_real_escape_string($con,$_POST['p_name']);
            $p_name = htmlspecialchars($p_name);
            $p_price = mysqli_real_escape_string($con,$_POST['p_price']);
            $p_price = htmlspecialchars($p_price);
            $p_title = mysqli_real_escape_string($con,$_POST['p_title']);
            $p_title = htmlspecialchars($p_title);
            $plan_des1 = mysqli_real_escape_string($con,$_POST['plan_des']);
            $plan_des1 = htmlspecialchars($plan_des1);
            $plan_tc1 = mysqli_real_escape_string($con,$_POST['plan_tc']);
            $plan_tc1 = htmlspecialchars($plan_tc1);
            

            
            $sel = "update plan_details set plan_name='$p_name', plan_price='$p_price', plan_title='$p_title', plan_des='$plan_des1', plan_tc='$plan_tc1' where id='$id'";
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
                    toastr["success"]("Plan Updated Named <?php echo $p_name; ?> Success...!","Plan")
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