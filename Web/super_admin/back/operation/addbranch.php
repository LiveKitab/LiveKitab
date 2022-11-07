<?php
include("../../../db/connect.php");

if(isset($_POST['bname']))
{
    $bname  =  mysqli_real_escape_string($con,$_POST['bname']);
    $bname = htmlspecialchars($bname);
    $uni_id  =  mysqli_real_escape_string($con,$_POST['uni_id']);
    $uni_id = htmlspecialchars($uni_id);
    $stream_id  =  mysqli_real_escape_string($con,$_POST['stream_id']);
    $stream_id = htmlspecialchars($stream_id);
    $pr_id  =  mysqli_real_escape_string($con,$_POST['pr_id']);
    $pr_id = htmlspecialchars($pr_id);

    $sel="select * from branch_data where b_name='$bname'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from branch_data ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from branch_data ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'BID';
        $bid = $prefix.$id;
        
            /* First Image*/
	
	$doc = $_FILES['b_img'];
	$imgname = $_FILES['b_img']['name'];
	if($imgname === '')
	{
	    $imgnamenew1='noimg.jpg';
	}
	else
	{
	$imgtmpname = $_FILES['b_img']['tmp_name'];
	$imgsize = $_FILES['b_img']['size'];
	$imgerror = $_FILES['b_img']['error'];
	$imgtype = $_FILES['b_img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 4000000)
			{
				$imgnamenew1 = $bid.".".$fileact;
				$filedes1 = '../../../src/branch/'.$imgnamenew1;
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
    
    $cmd="insert into branch_data (id,university_id,stream_id,pr_id,b_id,b_name,b_bg,b_status) values
	 (null,'$uni_id','$stream_id','$pr_id','$bid','$bname','$imgnamenew1','0')";
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
            toastr["success"]("Branch Added With Named <?php echo $bname; ?>","Success")
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
            toastr["error"]("Branch Added Failed","Error")
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
            toastr["warning"]("Branch Already Added with Named <?php echo $bname; ?>","Warning")
		</script>
		<?php
    }
  }
  else
  {
      header('location:../../404');
  }

?>