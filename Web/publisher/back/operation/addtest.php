<?php
include("../../../db/pconnect.php");

if(isset($_POST['test_v_id']) && isset($_POST['title']) && isset($_POST['total']) && isset($_POST['no_que']) && isset($_POST['pos']) && isset($_POST['neg']))
{
    $title  =  mysqli_real_escape_string($con,$_POST['title']);
    $title = htmlspecialchars($title);
    $test_v_id  =  mysqli_real_escape_string($con,$_POST['test_v_id']);
    $test_v_id = htmlspecialchars($test_v_id);
    $total  =  mysqli_real_escape_string($con,$_POST['total']);
    $total = htmlspecialchars($total);
    $no_que  =  mysqli_real_escape_string($con,$_POST['no_que']);
    $pos  =  mysqli_real_escape_string($con,$_POST['pos']);
    $neg  =  mysqli_real_escape_string($con,$_POST['neg']);
    date_default_timezone_set("Asia/Kolkata");
    $tdate = date('Y-m-d-H:i:s');
	
	
    $sel="select id from video_test_data where v_id='$test_v_id'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        $cmd="select * from video_test_data ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from video_test_data ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'TEST';
        $testid = $prefix.$id;
    
    $cmd="INSERT INTO `video_test_data`(`id`, `v_id`, `test_id`, `title`, `total`, `no_que`, `pos`, `neg`, `date`, `status`) values
	 (null,'$test_v_id','$testid','$title','$total','$no_que','$pos','$neg','$tdate','0')";
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
            toastr["success"]("Test Created","Success")
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
            toastr["error"]("Test Creation Failed","Error")
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
            toastr["warning"]("Test Already Added","Warning")
		</script>
		<?php
    }
}
else
{
    header('location:../../404');
}
?>