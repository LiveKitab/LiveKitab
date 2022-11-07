<?php
  include("../../../db/connect.php");

	    if(isset($_POST['index']) && isset($_POST['p_name']) && isset($_POST['p_cont']) && isset($_POST['p_email']) && isset($_POST['p_addr']) && isset($_POST['p_des']))
	    {
            $id = mysqli_real_escape_string($con,$_POST['index']);
            $id = htmlspecialchars($id);
            $p_name = mysqli_real_escape_string($con,$_POST['p_name']);
            $p_name = htmlspecialchars($p_name);
            $p_cont = mysqli_real_escape_string($con,$_POST['p_cont']);
            $p_cont = htmlspecialchars($p_cont);
            $p_email = mysqli_real_escape_string($con,$_POST['p_email']);
            $p_email = htmlspecialchars($p_email);
            $p_addr = mysqli_real_escape_string($con,$_POST['p_addr']);
            $p_addr = htmlspecialchars($p_addr);
            $p_des = mysqli_real_escape_string($con,$_POST['p_des']);
            $p_des = htmlspecialchars($p_des);

            
            $sel = "update editor_data set e_name='$p_name', e_cno='$p_cont', e_email='$p_email', e_addr='$p_addr', e_des='$p_des' where id='$id'";
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
                    toastr["success"]("Publisher Updated Named <?php echo $p_name; ?> Success...!","Publisher")
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