<?php
include("../../../db/connect.php");

if(isset($_POST['subject']) && isset($_POST['rmk'])
&& isset($_POST['pkg_id']))
{
    
    $subject  =  mysqli_real_escape_string($con,$_POST['subject']);
    $subject = htmlspecialchars($subject);
    $rmk  =  mysqli_real_escape_string($con,$_POST['rmk']);
    $rmk = htmlspecialchars($rmk);
    $pkg_id  =  mysqli_real_escape_string($con,$_POST['pkg_id']);
    $pkg_id = htmlspecialchars($pkg_id);
    date_default_timezone_set("Asia/Kolkata");
    $date = date('Y-m-d-H:i:s');
    

    $sel="select * from package_product where course_id='$subject'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
    
    $cmd="insert into package_product (id,pkg_id,course_id,remark,date) values
	 (null,'$pkg_id','$subject','$rmk','$date')";
	$result=mysqli_query($con,$cmd) or die(mysqli_error($con));
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
          
            toastr["success"]("Package Course Added Successfully...","Package")
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
            toastr["error"]("Something Went Wrong Please Try Again","Package")
		</script>
		<?php
    }
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
            toastr["warning"]("This Package Already Exists","Package")
		</script>
		<?php
    }
    }
    
  else
  {
      header('location:../../../404');
  }

?>