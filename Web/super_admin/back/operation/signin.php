<?php
	include("../../../db/connect.php");		
    if(isset($_POST['sa_email']) && isset($_POST['sa_pwd']))
	{
	
		$sa_email=mysqli_real_escape_string($con,$_POST['sa_email']);
		$sa_pwd=mysqli_real_escape_string($con,$_POST['sa_pwd']);
		
		
		$sel = "select * from super_admin where sa_email='$sa_email' and sa_pwd='$sa_pwd'";
		$ex = $con->query($sel) or die (mysqli_error($con));
		
		if($ex->num_rows>0)
		{
			while($row = mysqli_fetch_array($ex))
			{
				$sa_email = $row['sa_email'];
				$sa_pwd = $row['sa_pwd'];
				$sa_con = $row['sa_con'];
			}
			$_SESSION['sa_email'] = $sa_email;
		
			echo "<script>window.location='dash';</script>";
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
        header('location:../../404');        
    }

?>