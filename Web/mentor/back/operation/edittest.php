<?php
  include("../../../db/mconnect.php");

	    if(isset($_POST['id']) && isset($_POST['t_title']) && isset($_POST['t_que']) && isset($_POST['t_total']) && isset($_POST['t_pos']) && isset($_POST['t_neg']))
	    {
            $id = mysqli_real_escape_string($con,$_POST['id']);
            $id = htmlspecialchars($id);
            $t_title = mysqli_real_escape_string($con,$_POST['t_title']);
            $t_title = htmlspecialchars($t_title);
            $t_que = mysqli_real_escape_string($con,$_POST['t_que']);
            $t_que = htmlspecialchars($t_que);
            $t_total = mysqli_real_escape_string($con,$_POST['t_total']);
            $t_total = htmlspecialchars($t_total);
            $t_pos = mysqli_real_escape_string($con,$_POST['t_pos']);
            $t_pos = htmlspecialchars($t_pos);
            $t_neg = mysqli_real_escape_string($con,$_POST['t_neg']);
            $t_neg = htmlspecialchars($t_neg);
           

            
            $sel = "update video_test_data set title='$t_title', total='$t_total', no_que='$t_que', pos='$t_pos', neg='$t_neg' where id='$id'";
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
                    toastr["success"]("Test Updated Title <?php echo $t_title; ?> Success...!","Test")
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