<?php
include("../../../db/connect.php");

            if(isset($_POST['id']))
            {
                $id=mysqli_real_escape_string($con,$_POST['id']);
                $days=mysqli_real_escape_string($con,$_POST['days']);
                $price=mysqli_real_escape_string($con,$_POST['price']);
                $dis=mysqli_real_escape_string($con,$_POST['dis']);
                $des=mysqli_real_escape_string($con,$_POST['des']);

                $sel = "update apply_for_subject set admin_status='1',des='$des',price='$price',discount='$dis',days='$days' where id='$id'";
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
                        toastr["success"]("Video Request Approved..!","Success")
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
                    toastr["warning"]("Error in Approve Video Request..!","Sorry")
        		</script>
        		<?php
                }
}
elseif(isset($_POST['id1']))
{
                $id1=mysqli_real_escape_string($con,$_POST['id1']);

                $sel = "update apply_for_subject set admin_status='2' where id='$id1'";
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
                    toastr["error"]("Video Request Rejected..!","Success")
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
                    toastr["warning"]("Error in Reject Video Request..!","")
                </script>
                <?php
                    
                }
}
?>