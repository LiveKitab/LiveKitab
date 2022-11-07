<?php
include("../../../db/mconnect.php");

if(isset($_POST['id']) && isset($_POST['title']) && isset($_POST['exercise']))
{
    $id  =  mysqli_real_escape_string($con,$_POST['id']);
    $id = htmlspecialchars($id);
    $title  =  mysqli_real_escape_string($con,$_POST['title']);
    $title = htmlspecialchars($title);
    $exercise  =  mysqli_real_escape_string($con,$_POST['exercise']);
    date_default_timezone_set("Asia/Kolkata");
    $tdate = date('Y-m-d-H:i:s');
    
    $cmd="UPDATE `exercise_data` SET `title`='$title',`des`='$exercise',`date`='$tdate' WHERE id='$id'";
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
            "timeOut": "2500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["success"]("Exercise Updated","Success")
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
            "timeOut": "2500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["error"]("Exercise Creation Failed","Error")
		</script>
		<?php
    }
}
else
{
    header('location:../../404');
}
?>