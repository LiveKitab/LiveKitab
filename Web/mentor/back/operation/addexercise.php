<?php
include("../../../db/mconnect.php");

if(isset($_POST['v_id']) && isset($_POST['ch_id']) && isset($_POST['subject_id']) && isset($_POST['title']) && isset($_POST['descr']))
{
    $v_id  =  mysqli_real_escape_string($con,$_POST['v_id']);
    $v_id = htmlspecialchars($v_id);
    $ch_id  =  mysqli_real_escape_string($con,$_POST['ch_id']);
    $ch_id = htmlspecialchars($ch_id);
    $subject_id  =  mysqli_real_escape_string($con,$_POST['subject_id']);
    $subject_id = htmlspecialchars($subject_id);
    $title  =  mysqli_real_escape_string($con,$_POST['title']);
    $title = htmlspecialchars($title);
   
    $exercise  =  mysqli_real_escape_string($con,$_POST['descr']);
    $exercise = htmlspecialchars($exercise);
    date_default_timezone_set("Asia/Kolkata");
    $tdate = date('Y-m-d-H:i:s');
    

    $sel="select id from exercise_data where title='$title'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        $cmd="select * from exercise_data ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from exercise_data ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
       
         /* First Image*/
	$random = uniqid();
	$doc = $_FILES['pdffile'];
	$imgname = $_FILES['pdffile']['name'];
	if($imgname === '')
	{
	    $imgnamenew1='noimg.jpg';
	}
	else
	{
	$imgtmpname = $_FILES['pdffile']['tmp_name'];
	$imgsize = $_FILES['pdffile']['size'];
	$imgerror = $_FILES['pdffile']['error'];
	$imgtype = $_FILES['pdffile']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 4000000)
			{
				$imgnamenew1 = $random.".".$fileact;
				$filedes1 = '../../pdf/'.$imgnamenew1;
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
        
    
     $cmd="INSERT INTO `exercise_data`(`id`, `c_id`, `subject_id`, `v_id`,`ch_id`, `title`, `des`,`excercise_file`, `date`, `status`) values
	 (null,'$c_id','$subject_id','$v_id','$ch_id','$title','$exercise','$imgnamenew1','$tdate','0')";
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
            toastr["success"]("Exercise Created","Success")
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
             toastr["error"]("Exercise Creation Failed","Error")
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
            toastr["warning"]("Exercise Already Added","Warning")
		</script>
		<?php
    }
  }
  else
  {
      echo 'data not post';
  }

?>