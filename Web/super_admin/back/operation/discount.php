  <?php
  session_start();
  include("../../../db/mconnect.php");
 
  
	    if(isset($_POST['remark']) && isset($_POST['discount']) && isset($_POST['cid']))
	    {
			$discount = mysqli_real_escape_string($con,$_POST['discount']);
			$discount = htmlspecialchars($discount);
			$cid = mysqli_real_escape_string($con,$_POST['cid']);
			$cid = htmlspecialchars($cid);
			$remark = mysqli_real_escape_string($con,$_POST['remark']);
			$remark = htmlspecialchars($remark);
			
			$payfeesdate = date('Y-m-d-h:i:s');
			
            
    	
    		
    		$cmd="insert into discount(id,c_id,discount,remarks) values
    		 (null,'$cid','$discount','$remark')";
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
    			"timeOut": "2500",
    			"extendedTimeOut": "1000",
    			"showEasing": "swing",
    			"hideEasing": "linear",
    			"showMethod": "fadeIn",
    			"hideMethod": "fadeOut"
    		  }
    			toastr["success"](" Discount Added Successfully..!","Done")
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
    			"timeOut": "2500",
    			"extendedTimeOut": "1000",
    			"showEasing": "swing",
    			"hideEasing": "linear",
    			"showMethod": "fadeIn",
    			"hideMethod": "fadeOut"
    		  }
    			toastr["error"]("Something Went Wrong")
    		</script>
    		<?php
    			}

        }
      
$con -> close();
?>