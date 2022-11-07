<?php
  include("../../../db/mconnect.php");

	    if(isset($_POST['index']) && isset($_POST['v_sequence']) && isset($_POST['v_title']) && isset($_POST['v_ch_name']) && isset($_POST['v_link']) && isset($_POST['v_des']) && isset($_POST['v_remk']))
	    {
            $id = mysqli_real_escape_string($con,$_POST['index']);
            $id = htmlspecialchars($id);
            $v_title = mysqli_real_escape_string($con,$_POST['v_title']);
            $v_title = htmlspecialchars($v_title);
            $v_link = mysqli_real_escape_string($con,$_POST['v_link']);
            $v_link = htmlspecialchars($v_link);
            $v_des = mysqli_real_escape_string($con,$_POST['v_des']);
            $v_des = htmlspecialchars($v_des);
            $v_remk = mysqli_real_escape_string($con,$_POST['v_remk']);
            $v_remk = htmlspecialchars($v_remk);
            $v_ch_name = mysqli_real_escape_string($con,$_POST['v_ch_name']);
            $v_ch_name = htmlspecialchars($v_ch_name);
            $v_sequence = mysqli_real_escape_string($con,$_POST['v_sequence']);
            $v_sequence = htmlspecialchars($v_sequence);
            

            
            $sel = "update creator_video set v_title='$v_title', sequence='$v_sequence', ch_name='$v_ch_name', v_link='$v_link', v_des='$v_des', v_rmk='$v_remk' where id='$id'";
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
                    toastr["success"]("Video Updated Title <?php echo $v_title; ?> Success...!","Video")
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