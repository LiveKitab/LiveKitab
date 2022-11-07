<?php
	include("../../../db/connect.php");		
    if(isset($_POST['e_email']) && isset($_POST['e_pwd']))
	{
	
		$e_email=mysqli_real_escape_string($con,$_POST['e_email']);
		$e_pwd=mysqli_real_escape_string($con,$_POST['e_pwd']);
		
		
		$sel = "select * from editor_data where e_email='$e_email'";
		$ex = $con->query($sel) or die (mysqli_error($con));
		
		if($ex->num_rows>0)
		{
			while($row = mysqli_fetch_array($ex))
			{
				$e_email = $row['e_email'];
				$e_pwd1 = $row['e_pwd'];
				$e_con = $row['e_con'];
				$e_status = $row['e_status'];
				
			}
			
		}
		if (password_verify($e_pwd,$e_pwd1))
			{
			    if($e_status == '1')
			    {
			        $_SESSION['e_email'] = $e_email;
		
			        echo "<script>window.location='dash';</script>";
			    }
			    if($e_status == '2')
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
			    if($e_status == '0')
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