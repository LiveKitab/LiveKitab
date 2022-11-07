<?php
include("../../../db/mconnect.php");

if(isset($_POST['test_v_id']) && isset($_POST['ch_id'])&& isset($_POST['c_id'])&& isset($_POST['sub_id']) && isset($_POST['title']) && isset($_POST['total']) && isset($_POST['no_que']) && isset($_POST['pos']) && isset($_POST['neg']))
{
    $title  =  mysqli_real_escape_string($con,$_POST['title']);
    $title = htmlspecialchars($title);
    $ch_id  =  mysqli_real_escape_string($con,$_POST['ch_id']);
    $ch_id = htmlspecialchars($ch_id);
    $sub_id  =  mysqli_real_escape_string($con,$_POST['sub_id']);
    $sub_id = htmlspecialchars($sub_id);
    $c_id  =  mysqli_real_escape_string($con,$_POST['c_id']);
    $c_id = htmlspecialchars($c_id);
    $test_v_id  =  mysqli_real_escape_string($con,$_POST['test_v_id']);
    $test_v_id = htmlspecialchars($test_v_id);
    $total  =  mysqli_real_escape_string($con,$_POST['total']);
    $total = htmlspecialchars($total);
    $no_que  =  mysqli_real_escape_string($con,$_POST['no_que']);
    $pos  =  mysqli_real_escape_string($con,$_POST['pos']);
    $neg  =  mysqli_real_escape_string($con,$_POST['neg']);
    date_default_timezone_set("Asia/Kolkata");
    $tdate = date('Y-m-d-H:i:s');
	
	
    
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
    
    $cmd="INSERT INTO `video_test_data`(`id`,`sub_id`,`c_id`, `v_id`,`ch_id`, `test_id`, `title`, `total`, `no_que`, `pos`, `neg`, `date`, `status`) values
	 (null,'$sub_id','$c_id','$test_v_id','$ch_id','$testid','$title','$total','$no_que','$pos','$neg','$tdate','0')";
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
    header('location:../../404');
}
?>