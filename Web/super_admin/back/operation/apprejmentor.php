<?php
include("../../../db/connect.php");
if(isset($_POST['id']))
{
                $id=mysqli_real_escape_string($con,$_POST['id']);

                $sel = "update creator_data set c_status='1' where id='$id'";
                $result=mysqli_query($con,$sel) or die(mysqli_error($con));
                if($result) 
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
            toastr["success"]("Approve Mentor..!","Approved")
		</script>
		<?php
                }
                else
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
            toastr["warning"]("Error in Unblock Mentor..!","Mentor")
		</script>
		<?php
                    
                }
}
elseif(isset($_POST['id1']))
{
                $id1=mysqli_real_escape_string($con,$_POST['id1']);

                $sel = "update creator_data set c_status='2' where id='$id1'";
                $result=mysqli_query($con,$sel) or die(mysqli_error($con));
                if($result) 
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
                    toastr["error"]("Mentor Reject..!","Rejected")
                </script>
                <?php
                    
                }
                else
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
                    toastr["warning"]("Error in Unblock Mentor..!","")
                </script>
                <?php
                    
                }
}
?>