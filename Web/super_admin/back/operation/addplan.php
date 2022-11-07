<?php
session_start();
include("../../../db/connect.php");

if(isset($_POST['pname']) && isset($_POST['price']) && isset($_POST['title']) && isset($_POST['p_des']) && isset($_POST['tc_des']))
{
    $pname  =  mysqli_real_escape_string($con,$_POST['pname']);
    $pname = htmlspecialchars($pname);
    $price  =  mysqli_real_escape_string($con,$_POST['price']);
    $price = htmlspecialchars($price);
    $title  =  mysqli_real_escape_string($con,$_POST['title']);
    $title = htmlspecialchars($title);
    $p_des  =  mysqli_real_escape_string($con,$_POST['p_des']);
    $p_des = htmlspecialchars($p_des);
    $tc_des  =  mysqli_real_escape_string($con,$_POST['tc_des']);
    $tc_des = htmlspecialchars($tc_des);
    date_default_timezone_set("Asia/Kolkata");
    $date = date('Y-m-d-H:i:s');

    $sel="select * from plan_details where plan_name='$pname'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from plan_details ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from plan_details ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'PLAN';
        $planid = $prefix.$id;
    
    $cmd="insert into plan_details (id,plan_id,plan_name,plan_price,plan_cre_date,plan_title,plan_des,plan_tc,status) values
	 (null,'$planid','$pname','$price','$date','$title','$p_des','$tc_des','0')";
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
            toastr["success"]("You added Plan Named <?php echo $pname; ?> successfully...","Plan")
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
            toastr["error"]("Something Went Wrong Please Try Again","Publisher")
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
            toastr["warning"]("This Plan Named <?php echo $pname; ?> Already Exists","Plan")
		</script>
		<?php
    }
  }

?>