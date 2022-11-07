<?php
  include("../../../db/connect.php");
 
       if(isset($_POST['id']) && isset($_POST['s_name']) && isset($_POST['s_fname']) && isset($_POST['s_lname'])
       && isset($_POST['s_cont']) && isset($_POST['s_email']) && isset($_POST['s_addr']) && isset($_POST['s_state']) && isset($_POST['s_city']))
      {
            $id = mysqli_real_escape_string($con,$_POST['id']);
            $id = htmlspecialchars($id);
            $s_name = mysqli_real_escape_string($con,$_POST['s_name']);
            $s_name = htmlspecialchars($s_name);
            $s_fname = mysqli_real_escape_string($con,$_POST['s_fname']);
            $s_fname = htmlspecialchars($s_fname);
            $s_lname = mysqli_real_escape_string($con,$_POST['s_lname']);
            $s_lname = htmlspecialchars($s_lname);
            $s_cont = mysqli_real_escape_string($con,$_POST['s_cont']);
            $s_cont = htmlspecialchars($s_cont);
            $s_email = mysqli_real_escape_string($con,$_POST['s_email']);
            $s_email = htmlspecialchars($s_email);
            $s_addr = mysqli_real_escape_string($con,$_POST['s_addr']);
            $s_addr = htmlspecialchars($s_addr);
            $s_state = mysqli_real_escape_string($con,$_POST['s_state']);
            $s_state = htmlspecialchars($s_state);
            $s_city = mysqli_real_escape_string($con,$_POST['s_city']);
            $s_city = htmlspecialchars($s_city);
            

            
            $sel = "update user_data set username='$s_name',u_fname='$s_fname',u_lname='$s_lname',u_cno='$s_cont',u_email='$s_email',u_addr='$s_addr',u_state='$s_state',u_city='$s_city' where id='$id'";
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
                    toastr["success"]("Scholar Updated Named <?php echo $s_name; ?> Success...!","Scholar")
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