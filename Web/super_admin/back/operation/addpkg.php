<?php
include("../../../db/connect.php");

if(isset($_POST['uni_str']) && isset($_POST['program']) && isset($_POST['branch']) && isset($_POST['sem_med'])
&& isset($_POST['price']) && isset($_POST['dis']) && isset($_POST['des']) && isset($_POST['ptitle']))
{
    $ptitle  =  mysqli_real_escape_string($con,$_POST['ptitle']);
    $ptitle = htmlspecialchars($ptitle);
    $uni_str  =  mysqli_real_escape_string($con,$_POST['uni_str']);
    $uni_str = htmlspecialchars($uni_str);
    $program  =  mysqli_real_escape_string($con,$_POST['program']);
    $program = htmlspecialchars($program);
    $branch  =  mysqli_real_escape_string($con,$_POST['branch']);
    $branch = htmlspecialchars($branch);
    $sem_med  =  mysqli_real_escape_string($con,$_POST['sem_med']);
    $sem_med = htmlspecialchars($sem_med);
    $price  =  mysqli_real_escape_string($con,$_POST['price']);
    $price = htmlspecialchars($price);
    $dis  =  mysqli_real_escape_string($con,$_POST['dis']);
    $dis = htmlspecialchars($dis);
    $des  =  mysqli_real_escape_string($con,$_POST['des']);
    $des = htmlspecialchars($des);
    date_default_timezone_set("Asia/Kolkata");
    $date = date('Y-m-d-H:i:s');
    
    

    $sel="select * from package where stream_id='$uni_str' and pr_id='$program' and b_id='$branch' and term_id='$sem_med'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from package ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from package ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'PACKAGE';
        $pkg_id = $prefix.$id;
        
        /* First Image*/
	
	$doc = $_FILES['p_img'];
	$imgname = $_FILES['p_img']['name'];
	if($imgname === '')
	{
	    $imgnamenew1='noimg.jpg';
	}
	else
	{
	$imgtmpname = $_FILES['p_img']['tmp_name'];
	$imgsize = $_FILES['p_img']['size'];
	$imgerror = $_FILES['p_img']['error'];
	$imgtype = $_FILES['p_img']['type'];

	$fileext = explode('.',$imgname);
	$fileact = strtolower(end($fileext));

	$allowed = array('jpg','jpeg','png','pdf','JPG','JPEG','PNG','PDF');

	if(in_array($fileact,$allowed))
	{
		if($imgerror === 0)
		{
			if($imgsize < 4000000)
			{
				$imgnamenew1 = $pkg_id.".".$fileact;
				$filedes1 = '../../../src/package/'.$imgnamenew1;
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
        
        
        
        
      
    
    $cmd="insert into package (id,pkg_id,stream_id,pr_id,b_id,term_id,pkg_title,pkg_img,price,dis,descr,date,status) values
	 (null,'$pkg_id','$uni_str','$program','$branch','$sem_med','$ptitle','$imgnamenew1','$price','$dis','$des','$date','0')";
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
          
            toastr["success"]("You added Package Successfully...","Package")
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
            toastr["error"]("Something Went Wrong Please Try Again","Package")
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
            toastr["warning"]("This Package Already Exists","Package")
		</script>
		<?php
    }
    }
    
  else
  {
      header('location:../../../404');
  }

?>