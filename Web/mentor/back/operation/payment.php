<?php
include("../../../db/mconnect.php");

if(isset($_POST['month']) && isset($_POST['pm']) && isset($_POST['amt']) && isset($_POST['rmk']) && isset($_POST['course_id']))
{
    $month  =  mysqli_real_escape_string($con,$_POST['month']);
    $month = htmlspecialchars($month);
    $course_id  =  mysqli_real_escape_string($con,$_POST['course_id']);
    $course_id = htmlspecialchars($course_id);
    $pm  =  mysqli_real_escape_string($con,$_POST['pm']);
    $pm = htmlspecialchars($pm);
    $amt  =  mysqli_real_escape_string($con,$_POST['amt']);
    $amt = htmlspecialchars($amt);
    $rmk  =  mysqli_real_escape_string($con,$_POST['rmk']);
    $rmk = htmlspecialchars($rmk);

    $sel="select * from creator_payment where course_id='$course_id'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from creator_payment ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from creator_payment ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'PAYMENT';
        $payid = $prefix.$id;
    
    $cmd="insert into creator_payment (id,c_id,course_id,payment_id,payment_month,payment_method,payment_amount,remark,status) values
	 (null,'$c_id','$course_id','$payid','$month','$pm','$amt','$rmk','0')";
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
            toastr["success"]("You added Payment Successfully...","Payment")
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
            toastr["error"]("Something Went Wrong Please Try Again","Courses")
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
            toastr["warning"]("Payment Already Added","Warning")
		</script>
		<?php
    }
  }

?>