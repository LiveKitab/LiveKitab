<?php
	include("../../../db/connect.php");		
    if(isset($_POST['c_email']) && isset($_POST['c_pwd']))
	{
	
		$c_email=mysqli_real_escape_string($con,$_POST['c_email']);
		$c_pwd=mysqli_real_escape_string($con,$_POST['c_pwd']);
		
		
		$sel = "select * from creator_data where c_email='$c_email'";
		$ex = $con->query($sel) or die (mysqli_error($con));
		
		if($ex->num_rows>0)
		{
			while($row = mysqli_fetch_array($ex))
			{
				$c_email = $row['c_email'];
				$c_pwd1 = $row['c_pwd'];
				$c_con = $row['c_con'];
				$c_status = $row['c_status'];
				$c_block = $row['c_block'];
			}
			
		}
		if (password_verify($c_pwd,$c_pwd1))
			{
			    if($c_status == '1' && $c_block == '0')
			    {
			        $_SESSION['c_email'] = $c_email;
		
			        echo "<script>window.location='dash';</script>";
			    }
			    if($c_status == '2')
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
            toastr["error"]("Your Request Are Rejected...!","Registration Request")
        </script>
    <?php
			    }
			    if($c_status == '0')
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
            toastr["error"]("Your Request Are Pending...!","Registration Request")
        </script>
    <?php
			    }
			    if($c_block == '1')
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
            toastr["error"]("Your are Blocked, Please Contact Admin...!","Registration Request")
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
            toastr["error"]("Invalid Information... !","Login")
        </script>
<?php
	    }

    }
    else
    {   
        header('location:index');        
    }

	

?>