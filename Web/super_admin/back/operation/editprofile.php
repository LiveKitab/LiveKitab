<?php
  include("../../../db/connect.php");
	    if(isset($_POST['sa_name1']) && isset($_POST['sa_cno1']) && isset($_POST['sa_email1']) && isset($_POST['sa_addr1']) && isset($_POST['id']))
	    {
	        $id = mysqli_real_escape_string($con,$_POST['id']);
            $id = htmlspecialchars($id);
            $sa_name = mysqli_real_escape_string($con,$_POST['sa_name1']);
            $sa_name = htmlspecialchars($sa_name);
            $sa_cno = mysqli_real_escape_string($con,$_POST['sa_cno1']);
            $sa_cno = htmlspecialchars($sa_cno);
            $sa_email = mysqli_real_escape_string($con,$_POST['sa_email1']);
            $sa_email = htmlspecialchars($sa_email);
            $sa_addr = mysqli_real_escape_string($con,$_POST['sa_addr1']);
            $sa_addr = htmlspecialchars($sa_addr);
           

            
            $sel = "update super_admin set sa_name='$sa_name', sa_cno='$sa_cno', sa_email='$sa_email', sa_addr='$sa_addr' where id='$id'";
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
                    toastr["success"]("Profile Updated Named <?php echo $sa_name; ?> Success...!","Profile")
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