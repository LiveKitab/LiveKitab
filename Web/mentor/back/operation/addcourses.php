<?php
include("../../../db/mconnect.php");



if(isset($_POST['cname']) && isset($_POST['cprice']) && isset($_POST['c_duration']) && isset($_POST['c_des'])
&& isset($_POST['limit']) && isset($_POST['b_id']))
{
	$cname  =  mysqli_real_escape_string($con,$_POST['cname']);
	$cname = htmlspecialchars($cname);
	$cprice  =  mysqli_real_escape_string($con,$_POST['cprice']);
	$cprice = htmlspecialchars($cprice);
	$c_duration  =  mysqli_real_escape_string($con,$_POST['c_duration']);
	$c_duration = htmlspecialchars($c_duration);
	$c_des  =  mysqli_real_escape_string($con,$_POST['c_des']);
	$c_des = htmlspecialchars($c_des);
	$limit  =  mysqli_real_escape_string($con,$_POST['limit']);
	$limit = htmlspecialchars($limit);
	$b_id  =  mysqli_real_escape_string($con,$_POST['b_id']);
	$b_id = htmlspecialchars($b_id);
	date_default_timezone_set("Asia/Kolkata");
    $checkdate = date("Y-m-d-h:i:s");
	
	$sel="select * from course_data where course_name='$cname'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
	$cmd2="select * from course_data ORDER BY id DESC LIMIT 1";
    $result2=mysqli_query($con,$cmd2) or die(mysqli_error($con));
    if(mysqli_fetch_row($result2)<1)
    {
                $id = 0;
    }
    else
    {
        $cmd1="select * from course_data ORDER BY id DESC LIMIT 1";
        $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result1))
        {
            $id=$row['id'];
        }
    }
    $id = $id + 1;
    $prefix = 'COURSE';
    $courses_id = $prefix.$id;	
    
    /* First Image*/
	
	$doc = $_FILES['bg_img'];
	$imgname = $_FILES['bg_img']['name'];
	if($imgname === '')
	{
	    $imgnamenew1='noimage.jpg';
	}
	else
	{
	$imgtmpname = $_FILES['bg_img']['tmp_name'];
	$imgsize = $_FILES['bg_img']['size'];
	$imgerror = $_FILES['bg_img']['error'];
	$imgtype = $_FILES['bg_img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 900000000)
			{
				$imgnamenew1 = $courses_id."Background".".".$fileact;
				$filedes1 = '../../../src/course/'.$imgnamenew1;
                move_uploaded_file($imgtmpname,$filedes1);
			}
			else
		    {
				echo 'Large File';
		    }
		}
		else
	    {
			echo 'Document Corrupted';
	    }
	}
	else
	{
		echo 'Invalid File Extension';
	}
	}
        
        
        /* Secend Image*/
	
	$doc = $_FILES['bk_img'];
	$imgname = $_FILES['bk_img']['name'];
	if($imgname === '')
	{
	    $imgnamenew1='noimage.jpg';
	}
	else
	{
	$imgtmpname = $_FILES['bk_img']['tmp_name'];
	$imgsize = $_FILES['bk_img']['size'];
	$imgerror = $_FILES['bk_img']['error'];
	$imgtype = $_FILES['bk_img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 900000000)
			{
				$imgnamenew2 = $courses_id."booklet".".".$fileact;
				$filedes2 = '../../../src/course/'.$imgnamenew2;
                move_uploaded_file($imgtmpname,$filedes2);
			}
			else
			{
			    echo 'Large File';
			}
		}
		else
		{
		    echo 'Document is Currepted';
		}
	}
	else
	{
	    echo 'Invalid File Ext 2...';
	}
	}
				
		$cmd="insert into course_data (id,c_id,b_id,e_id,course_id,course_name,course_bg,course_price,course_plan_duration,course_des,course_booklet,course_sdate,course_edate,course_video_limit,upvote,downvote,course_status,course_apprrej,rej_reason)
     values (null,'$c_id','$b_id','Not Set','$courses_id','$cname','$imgnamenew1','$cprice','$c_duration','$c_des','$imgnamenew2','$checkdate','Not Set','$limit','Not Set','Not Set','0','0','Not Set')";
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
            toastr["success"]("You added Courses Named <?php echo $cname; ?> successfully...","Courses")
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
            toastr["success"]("Something Went Wrong Please Try Again","Courses")
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
            toastr["warning"]("Courses Already Added with Named <?php echo $cname; ?>","Warning")
        </script>
		<?php		
    }
}


?>
