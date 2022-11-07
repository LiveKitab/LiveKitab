<?php
include("../../../db/connect.php");

if(isset($_POST['index']) && isset($_POST['mentorid']) && isset($_POST['course_id']) && isset($_POST['per']))
{
    $c_id  =  mysqli_real_escape_string($con,$_POST['mentorid']);
    $c_id = htmlspecialchars($c_id);
    $course_id  =  mysqli_real_escape_string($con,$_POST['course_id']);
    $course_id = htmlspecialchars($course_id);
    $per  =  mysqli_real_escape_string($con,$_POST['per']);
    $per = htmlspecialchars($per);
    date_default_timezone_set("Asia/Kolkata");
    $stime = date('Y-m-d-H:i:s');
    $etime = date('Y-m-d-H:i:s');
    

    $sel="select * from account_admin where course_id='$course_id'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
    
    $cmd="insert into account_admin (id,c_id,course_id,c_per,status) values
	 (null,'$c_id','$course_id','$per','0')";
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
            toastr["success"]("Mentor Percentage Added","Success")
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
            toastr["error"]("Something Went Wrong","Error")
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
            toastr["warning"]("Percentage Already Added","Warning")
		</script>
		<?php
    }
  }
  else
  {
      header('location:../../404');
  }

?>