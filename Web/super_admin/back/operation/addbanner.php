<?php
include("../../../db/connect.php");

if(isset($_POST['bname']) && isset($_POST['cont']) && isset($_POST['email']) && isset($_POST['des']) && isset($_POST['price'])
&& isset($_POST['dis']) && isset($_POST['sdate']) && isset($_POST['edate']) && isset($_POST['addr']))
{
    $bname  =  mysqli_real_escape_string($con,$_POST['bname']);
    $bname = htmlspecialchars($bname);
    $cont  =  mysqli_real_escape_string($con,$_POST['cont']);
    $cont = htmlspecialchars($cont);
    $email  =  mysqli_real_escape_string($con,$_POST['email']);
    $email = htmlspecialchars($email);
    $addr  =  mysqli_real_escape_string($con,$_POST['addr']);
    $addr = htmlspecialchars($addr);
    $des  =  mysqli_real_escape_string($con,$_POST['des']);
    $des = htmlspecialchars($des);
    $price  =  mysqli_real_escape_string($con,$_POST['price']);
    $price = htmlspecialchars($price);
    $dis  =  mysqli_real_escape_string($con,$_POST['dis']);
    $dis = htmlspecialchars($dis);
    $sdate  =  mysqli_real_escape_string($con,$_POST['sdate']);
    $sdate = htmlspecialchars($sdate);
    $edate  =  mysqli_real_escape_string($con,$_POST['edate']);
    $edate = htmlspecialchars($edate);
    
    

    $sel="select * from banners where party_name='$bname' and party_contact='$cont' and party_email='$email'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from banners ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from banners ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'BANID';
        $bnid = $prefix.$id;
        
            /* First Image*/
	
	$doc = $_FILES['b_img'];
	$imgname = $_FILES['b_img']['name'];
	if($imgname === '')
	{
	    $imgnamenew1='noimage.jpg';
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
				$imgnamenew1 = $bnid.".".$fileact;
				$filedes1 = '../../../src/banner/'.$imgnamenew1;
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
    
    $cmd="insert into banners (id,banner_id,party_name,party_contact,party_email,party_addr,banner_img,banner_des,price,descount,s_date,e_date,status) values
	 (null,'$bnid','$bname','$cont','$email','$addr','$imgnamenew1','$des','$price','$dis','$sdate','$edate','0')";
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
            toastr["success"]("You added Banner Named <?php echo $bname; ?> successfully...","Success")
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
            toastr["warning"]("Banner Already Added with Named <?php echo $bname; ?>","Warning")
		</script>
		<?php
    }
  }
  else
  {
      header('location:../../404');
  }

?>