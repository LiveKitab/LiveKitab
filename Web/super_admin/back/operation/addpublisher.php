<?php
include("../../../db/connect.php");

if(isset($_POST['name']) && isset($_POST['contact']) && isset($_POST['email']) && isset($_POST['addr'])
&& isset($_POST['state']) && isset($_POST['city']) && isset($_POST['des']) && isset($_POST['pass'])
&& isset($_POST['pass1']))
{
    $name  =  mysqli_real_escape_string($con,$_POST['name']);
    $name = htmlspecialchars($name);
    $contact  =  mysqli_real_escape_string($con,$_POST['contact']);
    $contact = htmlspecialchars($contact);
    $email  =  mysqli_real_escape_string($con,$_POST['email']);
    $email = htmlspecialchars($email);
    $addr  =  mysqli_real_escape_string($con,$_POST['addr']);
    $addr = htmlspecialchars($addr);
    $state  =  mysqli_real_escape_string($con,$_POST['state']);
    $state = htmlspecialchars($state);
    $city  =  mysqli_real_escape_string($con,$_POST['city']);
    $city = htmlspecialchars($city);
    $des  =  mysqli_real_escape_string($con,$_POST['des']);
    $des = htmlspecialchars($des);
    $pass  =  mysqli_real_escape_string($con,$_POST['pass']);
    $pass = htmlspecialchars($pass);
    $pass1  =  mysqli_real_escape_string($con,$_POST['pass1']);
    $pass1 = htmlspecialchars($pass1);
    
    $alpha = "";
	$word = explode(" ",$name);
	foreach($word as $w)
	{
		$alpha .= $w[0];
	}
	$alpha = strtoupper($alpha);
	$alpha = $alpha.'.png';
    
    if($pass === $pass1)
    {
        
	$pass = password_hash($pass, PASSWORD_DEFAULT);

    $sel="select * from editor_data where e_email='$email'";
	$run=mysqli_query($con,$sel) or die(mysqli_error($con));
    if(mysqli_num_rows($run)<1)
    {
        
        $cmd="select * from editor_data ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
        if(mysqli_fetch_row($result)<1)
        {
                    $id = 0;
        }
        else
        {
            $cmd1="select * from editor_data ORDER BY id DESC LIMIT 1";
            $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
            while($row=mysqli_fetch_array($result1))
            {
                $id=$row['id'];
            }
        }
        $id = $id + 1;
        $prefix = 'EDITID';
        $edtid = $prefix.$id;
        
        $ename_ext = substr($name, 0, 3);
        $ename_ext = strtoupper($ename_ext);
        $finalid = $ename_ext.$id;
      
    
    $cmd="insert into editor_data (id,e_id,e_name,e_cno,e_email,e_addr,e_state,e_city,e_img,e_des,e_pwd,e_status) values
	 (null,'$finalid','$name','$contact','$email','$addr','$state','$city','$alpha','$des','$pass','0')";
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
          
            toastr["success"]("You added Publisher Named <?php echo $name; ?> successfully...","Publisher")
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
            toastr["error"]("Something Went Wrong Please Try Again","Publisher")
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
            toastr["warning"]("This Publisher Named <?php echo $name; ?> Already Exists","Publisher")
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
            toastr["error"]("Password & Confirm Password Not Match","Publisher")
		</script>
		<?php
    }
  }
  else
  {
      header('location:../../../404');
  }

?>