<?php
include("../../../db/connect.php");

if(isset($_POST['ch_no']) && isset($_POST['ch_name']))
{
    $ch_no  =  mysqli_real_escape_string($con,$_POST['ch_no']);
    $ch_no = htmlspecialchars($ch_no);
    $ch_name  =  mysqli_real_escape_string($con,$_POST['ch_name']);
    $ch_name = htmlspecialchars($ch_name);
    $str_id  =  mysqli_real_escape_string($con,$_POST['stream_id']);
    $str_id = htmlspecialchars($str_id);
    $pro_id  =  mysqli_real_escape_string($con,$_POST['pr_id']);
    $pro_id = htmlspecialchars($pro_id);
    $brn_id  =  mysqli_real_escape_string($con,$_POST['b_id']);
    $brn_id = htmlspecialchars($brn_id);
    $uni_id  =  mysqli_real_escape_string($con,$_POST['university_id']);
    $uni_id = htmlspecialchars($uni_id);
    $tem_id  =  mysqli_real_escape_string($con,$_POST['term_id']);
    $tem_id = htmlspecialchars($tem_id);
    $sub_id  =  mysqli_real_escape_string($con,$_POST['sub_id']);
    $sub_id = htmlspecialchars($sub_id);

    $sel="select * from chapter_data where ch_no='$ch_no' and ch_name='$ch_name' and university_id='$uni_id' and stream_id='$str_id' and pr_id='$pro_id' and b_id='$brn_id' and term_id='$tem_id'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from chapter_data ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from chapter_data ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'CHP';
        $ch_id = $prefix.$id;
        
        
    
    $cmd="insert into chapter_data (`id`, `university_id`, `stream_id`, `pr_id`, `b_id`, `term_id`,`sub_id`, `ch_id`, `ch_no`, `ch_name`, `status`) values
	 (null,'$uni_id','$str_id','$pro_id','$brn_id','$tem_id','$sub_id','$ch_id','$ch_no','$ch_name','0')";
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
            toastr["success"]("Chapter Added","Success")
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
            toastr["warning"]("Chapter Already Added with Named","Warning")
		</script>
		<?php
    }
  }
  else
  {
      header('location:../../404');
  }

?>