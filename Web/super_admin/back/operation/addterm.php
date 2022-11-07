<?php
include("../../../db/connect.php");

if(isset($_POST['tname']) && isset($_POST['medium']))
{
    $tname  =  mysqli_real_escape_string($con,$_POST['tname']);
    $tname = htmlspecialchars($tname);
    $medium  =  mysqli_real_escape_string($con,$_POST['medium']);
    $medium = htmlspecialchars($medium);
    $stream_id  =  mysqli_real_escape_string($con,$_POST['stream_id']);
    $stream_id = htmlspecialchars($stream_id);
    $pr_id  =  mysqli_real_escape_string($con,$_POST['pr_id']);
    $pr_id = htmlspecialchars($pr_id);
    $b_id  =  mysqli_real_escape_string($con,$_POST['b_id']);
    $b_id = htmlspecialchars($b_id);
    $uni_id  =  mysqli_real_escape_string($con,$_POST['uni_id']);
    $uni_id = htmlspecialchars($uni_id);
    
    date_default_timezone_set("Asia/Kolkata");
    $stime = date('Y-m-d-H:i:s');
    $etime = date('Y-m-d-H:i:s');
    

    $sel="select * from term_data where term_name='$tname' and b_id='$b_id'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from term_data ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from term_data ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'TERM';
        $tid = $prefix.$id;
        
    
    $cmd="insert into term_data (id,university_id,stream_id,pr_id,b_id,term_id,med,term_name,status) values
	 (null,'$uni_id','$stream_id','$pr_id','$b_id','$tid','$medium','$tname','0')";
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
            toastr["success"]("Term Added With Named <?php echo $tname; ?>","Success")
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
            toastr["error"]("Term Added Failed","Error")
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
            toastr["warning"]("Term Already Added with Named <?php echo $tname; ?>","Warning")
		</script>
		<?php
    }
  }
  else
  {
      header('location:../../404');
  }

?>