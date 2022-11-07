<?php
include("../../../db/connect.php");

if(isset($_POST['sname']) && isset($_POST['scode']))
{
    $sname  =  mysqli_real_escape_string($con,$_POST['sname']);
    $sname = htmlspecialchars($sname);
    $scode  =  mysqli_real_escape_string($con,$_POST['scode']);
    $scode = htmlspecialchars($scode);
    $stream_id  =  mysqli_real_escape_string($con,$_POST['stream_id']);
    $stream_id = htmlspecialchars($stream_id);
    $pr_id  =  mysqli_real_escape_string($con,$_POST['pr_id']);
    $pr_id = htmlspecialchars($pr_id);
    $b_id  =  mysqli_real_escape_string($con,$_POST['b_id']);
    $b_id = htmlspecialchars($b_id);
    $uni_id  =  mysqli_real_escape_string($con,$_POST['university_id']);
    $uni_id = htmlspecialchars($uni_id);
    $tid  =  mysqli_real_escape_string($con,$_POST['term_id']);
    $tid = htmlspecialchars($tid);

    $sel="select * from subject_data where sub_name='$sname' and sub_code='$sname' and university_id='$uni_id' and stream_id='$stream_id' and pr_id='$pr_id' and b_id='$b_id' and term_id='$tid'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from subject_data ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from subject_data ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'SUB';
        $sub_id = $prefix.$id;
        
         /* First Image*/
	
	$doc = $_FILES['s_img'];
	$imgname = $_FILES['s_img']['name'];
	if($imgname === '')
	{
	    $imgnamenew1='noimg.jpg';
	}
	else
	{
	$imgtmpname = $_FILES['s_img']['tmp_name'];
	$imgsize = $_FILES['s_img']['size'];
	$imgerror = $_FILES['s_img']['error'];
	$imgtype = $_FILES['s_img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 4000000)
			{
				$imgnamenew1 = $sub_id.".".$fileact;
				$filedes1 = '../../../src/subject/'.$imgnamenew1;
				move_uploaded_file($imgtmpname,$filedes1);
			}
			else
			{
				echo'large file';
			}
		}
		else
		{
			echo'Error';
		}
	}
	else
	{
		echo'Invalid Ext.';
	}
	}
        
    
    $cmd="insert into subject_data (`id`, `university_id`, `stream_id`, `pr_id`, `b_id`, `term_id`, `sub_id`, `sub_code`, `sub_name`, `sub_bg`, `sub_status`) values
	 (null,'$uni_id','$stream_id','$pr_id','$b_id','$tid','$sub_id','$scode','$sname','$imgnamenew1','0')";
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
            toastr["success"]("Subject Added With Named <?php echo $sname; ?>","Success")
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
            toastr["warning"]("Subject Already Added with Named <?php echo $sname; ?>","Warning")
		</script>
		<?php
    }
  }
  else
  {
      header('location:../../404');
  }

?>