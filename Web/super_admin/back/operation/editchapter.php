<?php
  include("../../../db/connect.php");
 
       if(isset($_POST['id']) && isset($_POST['ch_no']) && isset($_POST['ch_name']))
      {
            $id = mysqli_real_escape_string($con,$_POST['id']);
            $id = htmlspecialchars($id);
            $ch_no = mysqli_real_escape_string($con,$_POST['ch_no']);
            $ch_no = htmlspecialchars($ch_no);
            $ch_name = mysqli_real_escape_string($con,$_POST['ch_name']);
            $ch_name = htmlspecialchars($ch_name);
            
            $sel = "update chapter_data set ch_no='$ch_no',ch_name='$ch_name' where id='$id'";
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
                    toastr["success"]("Chapter Updated Success...!","Success")
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