<?php
  include("../../../db/connect.php");

	    if(isset($_POST['index']) && isset($_POST['b_name']) && isset($_POST['b_cont']) && isset($_POST['b_email'])
	    && isset($_POST['b_addr']) && isset($_POST['b_price']) && isset($_POST['b_dis']) && isset($_POST['b_sdate'])
	     && isset($_POST['b_edate'])&& isset($_POST['b_des']))
	    {
            $id = mysqli_real_escape_string($con,$_POST['index']);
            $id = htmlspecialchars($id);
            $b_name = mysqli_real_escape_string($con,$_POST['b_name']);
            $b_name = htmlspecialchars($b_name);
            $b_cont = mysqli_real_escape_string($con,$_POST['b_cont']);
            $b_cont = htmlspecialchars($b_cont);
            $b_email = mysqli_real_escape_string($con,$_POST['b_email']);
            $b_email = htmlspecialchars($b_email);
            $b_addr = mysqli_real_escape_string($con,$_POST['b_addr']);
            $b_addr = htmlspecialchars($b_addr);
            $b_des = mysqli_real_escape_string($con,$_POST['b_des']);
            $b_des = htmlspecialchars($b_des);
            $b_price = mysqli_real_escape_string($con,$_POST['b_price']);
            $b_price = htmlspecialchars($b_price);
            $b_dis = mysqli_real_escape_string($con,$_POST['b_dis']);
            $b_dis = htmlspecialchars($b_dis);
            $b_sdate = mysqli_real_escape_string($con,$_POST['b_sdate']);
            $b_sdate = htmlspecialchars($b_sdate);
            $b_edate = mysqli_real_escape_string($con,$_POST['b_edate']);
            $b_edate = htmlspecialchars($b_edate);
            
            

            
            $sel = "update banners set party_name='$b_name', party_contact='$b_cont', party_email='$b_email', party_addr='$b_addr', banner_des='$b_des',price='$b_price',descount='$b_dis',s_date='$b_sdate',e_date='$b_edate' where id='$id'";
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
                    toastr["success"]("Banner Updated Named <?php echo $b_name; ?> Success...!","Banner")
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