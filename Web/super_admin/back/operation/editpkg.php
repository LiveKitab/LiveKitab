<?php
  include("../../../db/connect.php");

	    if(isset($_POST['index']) && isset($_POST['p_price']) && isset($_POST['p_dis']) && isset($_POST['p_des']) && isset($_POST['p_title']))
	    {
            $id = mysqli_real_escape_string($con,$_POST['index']);
            $id = htmlspecialchars($id);
            $p_title = mysqli_real_escape_string($con,$_POST['p_title']);
            $p_title = htmlspecialchars($p_title);
            $p_price = mysqli_real_escape_string($con,$_POST['p_price']);
            $p_price = htmlspecialchars($p_price);
            $p_dis = mysqli_real_escape_string($con,$_POST['p_dis']);
            $p_dis = htmlspecialchars($p_dis);
            $p_des = mysqli_real_escape_string($con,$_POST['p_des']);
            $p_des = htmlspecialchars($p_des);

            
            $sel = "update package set price='$p_price', dis='$p_dis', descr='$p_des', pkg_title='$p_title' where id='$id'";
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
                    toastr["success"]("Package Updated Success...!","Package")
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