<?php
  include("../../../db/connect.php");
 
            

      if(isset($_POST['id']) && isset($_POST['m_name']) && isset($_POST['m_fname']) && isset($_POST['m_lname'])
       && isset($_POST['m_cont']) && isset($_POST['m_email']) && isset($_POST['m_addr']))
      {
            $id = mysqli_real_escape_string($con,$_POST['id']);
            $id = htmlspecialchars($id);
            $m_name = mysqli_real_escape_string($con,$_POST['m_name']);
            $m_name = htmlspecialchars($m_name);
            $m_fname = mysqli_real_escape_string($con,$_POST['m_fname']);
            $m_fname = htmlspecialchars($m_fname);
            $m_lname = mysqli_real_escape_string($con,$_POST['m_lname']);
            $m_lname = htmlspecialchars($m_lname);
            $m_cont = mysqli_real_escape_string($con,$_POST['m_cont']);
            $m_cont = htmlspecialchars($m_cont);
            $m_email = mysqli_real_escape_string($con,$_POST['m_email']);
            $m_email = htmlspecialchars($m_email);
            $m_addr = mysqli_real_escape_string($con,$_POST['m_addr']);
            $m_addr = htmlspecialchars($m_addr);
            

            
            $sel = "update creator_data set c_name='$m_name',c_fname='$m_fname',c_lname='$m_lname',c_cno='$m_cont',c_email='$m_email',c_addr='$m_addr' where id='$id'";
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
                    toastr["success"]("Mentor Updated Named <?php echo $m_name; ?> Success...!","Mentor")
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