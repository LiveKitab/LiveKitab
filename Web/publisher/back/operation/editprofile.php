<?php
  include("../../../db/pconnect.php");
	    if(isset($_POST['name']) && isset($_POST['cno']) && isset($_POST['email'])
	     && isset($_POST['addr']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['id']))
	    {
	        $id = mysqli_real_escape_string($con,$_POST['id']);
            $id = htmlspecialchars($id);
            $name = mysqli_real_escape_string($con,$_POST['name']);
            $name = htmlspecialchars($name);
            $cno = mysqli_real_escape_string($con,$_POST['cno']);
            $cno = htmlspecialchars($cno);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $email = htmlspecialchars($email);
            $addr = mysqli_real_escape_string($con,$_POST['addr']);
            $addr = htmlspecialchars($addr);
            $state = mysqli_real_escape_string($con,$_POST['state']);
            $state = htmlspecialchars($state);
            $city = mysqli_real_escape_string($con,$_POST['city']);
            $city = htmlspecialchars($city);
            
            
           

            
            $sel = "update editor_data set e_name='$name', e_cno='$cno',e_email='$email',e_addr='$addr',e_state='$state',e_city='$city' where id='$id'";
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
                    toastr["success"]("Profile Updated Named <?php echo $name; ?> Success...!","Profile")
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