<?php
include("../../../db/connect.php");

if(isset($_POST['pname']) && isset($_POST['s_id']))
{
    $pname  =  mysqli_real_escape_string($con,$_POST['pname']);
    $pname = htmlspecialchars($pname);
    $s_id  =  mysqli_real_escape_string($con,$_POST['s_id']);
    $s_id = htmlspecialchars($s_id);
    $uni_id  =  mysqli_real_escape_string($con,$_POST['uni_id']);
    $uni_id = htmlspecialchars($uni_id);
    
    date_default_timezone_set("Asia/Kolkata");
    $stime = date('Y-m-d-H:i:s');
    $etime = date('Y-m-d-H:i:s');
    

    $sel="select * from program_data where program_name='$pname'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from program_data ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from program_data ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'PROGRAM';
        $prid = $prefix.$id;
    
    $cmd="insert into program_data (id,university_id,stream_id,pr_id,program_name,status) values
	 (null,'$uni_id','$s_id','$prid','$pname','0')";
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
            toastr["success"]("Program Added Named <?php echo $pname; ?> ","Success")
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
            toastr["error"]("Program Added Failed","Error")
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
            toastr["warning"]("Program Already Added with Named <?php echo $pname; ?>","Warning")
		</script>
		<?php
    }
  }
  else
  {
      header('location:../../404');
  }

?>