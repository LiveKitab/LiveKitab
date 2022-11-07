<?php
include("../../../db/pconnect.php");

if(isset($_POST['id']) && isset($_POST['vtitle']) && isset($_POST['vlink']) && isset($_POST['v_des']) && isset($_POST['ch_name']))
{
    $id  =  mysqli_real_escape_string($con,$_POST['id']);
    $id = htmlspecialchars($id);
    $vtitle  =  mysqli_real_escape_string($con,$_POST['vtitle']);
    $vtitle = htmlspecialchars($vtitle);
    $vlink  =  mysqli_real_escape_string($con,$_POST['vlink']);
    $v_des  =  mysqli_real_escape_string($con,$_POST['v_des']);
    $v_des = htmlspecialchars($v_des);
    $ch_name  =  mysqli_real_escape_string($con,$_POST['ch_name']);
    $ch_name = htmlspecialchars($ch_name);
    date_default_timezone_set("Asia/Kolkata");
    $vdate = date('Y-m-d-H:i:s');
    
    $sel1="select * from creator_video where id='$id'";
	$run1=mysqli_query($con,$sel1) or die(mysqli_error($con));
	while($rows=mysqli_fetch_array($run1))
	{
	    $c_id=$rows['c_id'];
	    $course_id=$rows['course_id'];
	    $v_id=$rows['v_id'];
	    $sequence=$rows['sequence'];
	}

        /* First Image*/
	
	$doc = $_FILES['thm_img'];
	$imgname = $_FILES['thm_img']['name'];
	$imgtmpname = $_FILES['thm_img']['tmp_name'];
	$imgsize = $_FILES['thm_img']['size'];
	$imgerror = $_FILES['thm_img']['error'];
	$imgtype = $_FILES['thm_img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 4000000)
			{
				$imgnamenew1 = 'thumbnail'.$v_id.".".$fileact;
				$filedes1 = '../../../src/editor/video/'.$imgnamenew1;
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
	
	
	/* Second Image */
	
	
	$doc = $_FILES['att_img'];
	$imgname = $_FILES['att_img']['name'];
	$imgtmpname = $_FILES['att_img']['tmp_name'];
	$imgsize = $_FILES['att_img']['size'];
	$imgerror = $_FILES['att_img']['error'];
	$imgtype = $_FILES['att_img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 4000000)
			{
				$imgnamenew2 = 'attechment'.$v_id.".".$fileact;
				$filedes2 = '../../../src/editor/video/'.$imgnamenew2;
				move_uploaded_file($imgtmpname,$filedes2);
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
	
	
    $sel="select id from final_video where v_id='$v_id'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
    
    $cmd="insert into final_video (id,c_id,e_id,course_id,v_id,ch_name,sequence,v_preview,v_title,v_link,v_attach,v_des,v_date,v_status) values
	 (null,'$c_id','$e_id','$course_id','$v_id','$ch_name','$sequence','$imgnamenew1','$vtitle','$vlink','$imgnamenew2','$v_des','$vdate','0')";
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
            toastr["success"]("Video Added","Success")
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
            toastr["error"]("Video Added Failed","Error")
		</script>
		<?php
    }
    }
    else
    {
        
        
    $id  =  mysqli_real_escape_string($con,$_POST['id']);
    $id = htmlspecialchars($id);
    $vtitle  =  mysqli_real_escape_string($con,$_POST['vtitle']);
    $vtitle = htmlspecialchars($vtitle);
    $vlink  =  mysqli_real_escape_string($con,$_POST['vlink']);
    $v_des  =  mysqli_real_escape_string($con,$_POST['v_des']);
    $v_des = htmlspecialchars($v_des);
    $ch_name  =  mysqli_real_escape_string($con,$_POST['ch_name']);
    $ch_name = htmlspecialchars($ch_name);
    date_default_timezone_set("Asia/Kolkata");
    $vdate = date('Y-m-d-H:i:s');
    
    $sel1="select * from creator_video where id='$id'";
	$run1=mysqli_query($con,$sel1) or die(mysqli_error($con));
	while($rows=mysqli_fetch_array($run1))
	{
	    $c_id=$rows['c_id'];
	    $course_id=$rows['course_id'];
	    $v_id=$rows['v_id'];
	    $sequence=$rows['sequence'];
	}

        /* First Image*/
	
	$doc = $_FILES['thm_img'];
	$imgname = $_FILES['thm_img']['name'];
	$imgtmpname = $_FILES['thm_img']['tmp_name'];
	$imgsize = $_FILES['thm_img']['size'];
	$imgerror = $_FILES['thm_img']['error'];
	$imgtype = $_FILES['thm_img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 4000000)
			{
				$imgnamenew1 = 'thumbnail'.$v_id.".".$fileact;
				$filedes1 = '../../../src/editor/video/'.$imgnamenew1;
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
	
	
	/* Second Image */
	
	
	$doc = $_FILES['att_img'];
	$imgname = $_FILES['att_img']['name'];
	$imgtmpname = $_FILES['att_img']['tmp_name'];
	$imgsize = $_FILES['att_img']['size'];
	$imgerror = $_FILES['att_img']['error'];
	$imgtype = $_FILES['att_img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 4000000)
			{
				$imgnamenew2 = 'attechment'.$v_id.".".$fileact;
				$filedes2 = '../../../src/editor/video/'.$imgnamenew2;
				move_uploaded_file($imgtmpname,$filedes2);
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
        
        $data = "update final_video set v_title='$vtitle', ch_name='$ch_name',sequence='$sequence', v_link='$vlink', v_preview='$imgnamenew1', v_attach='$imgnamenew2', v_des='$v_des' where v_id='$v_id'";
        $result = mysqli_query($con,$data) or die(mysqli_error($con));
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
            toastr["success"]("Video Updated","Success")
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
            toastr["error"]("Something Went Wrong","Error")
		</script>
		<?php
        }
  }
}
else
{
    header('location:../../../404');
}
  

?>