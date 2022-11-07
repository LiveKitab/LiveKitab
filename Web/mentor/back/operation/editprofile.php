<?php
  include("../../../db/mconnect.php");
	    if(isset($_POST['name']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['cno']) && isset($_POST['email'])
	     && isset($_POST['addr']))
	    {
	        $id = mysqli_real_escape_string($con,$_POST['id']);
            $id = htmlspecialchars($id);
            $name = mysqli_real_escape_string($con,$_POST['name']);
            $name = htmlspecialchars($name);
            $fname = mysqli_real_escape_string($con,$_POST['fname']);
            $fname = htmlspecialchars($fname);
            $lname = mysqli_real_escape_string($con,$_POST['lname']);
            $lname = htmlspecialchars($lname);
            $cno = mysqli_real_escape_string($con,$_POST['cno']);
            $cno = htmlspecialchars($cno);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            $email = htmlspecialchars($email);
            $addr = mysqli_real_escape_string($con,$_POST['addr']);
            $addr = htmlspecialchars($addr);
            $state = mysqli_real_escape_string($con,$_POST['state']);
            $state = htmlspecialchars($state);
            $city = mysqli_real_escape_string($con,$_POST['city']);
            $city = htmlspecialchars($city);
            $edu = mysqli_real_escape_string($con,$_POST['edu']);
            $edu = htmlspecialchars($edu);
            $spec = mysqli_real_escape_string($con,$_POST['spec']);
            $spec = htmlspecialchars($spec);
            $acc_holder = mysqli_real_escape_string($con,$_POST['acc_holder']);
            $acc_holder = htmlspecialchars($acc_holder);
            $ac_type = mysqli_real_escape_string($con,$_POST['ac_type']);
            $ac_type = htmlspecialchars($ac_type);
            $ac_no = mysqli_real_escape_string($con,$_POST['ac_no']);
            $ac_no = htmlspecialchars($ac_no);
            $ifsc_no = mysqli_real_escape_string($con,$_POST['ifsc_no']);
            $ifsc_no = htmlspecialchars($ifsc_no);
            $m_id = mysqli_real_escape_string($con,$_POST['m_id']);
            $m_id = htmlspecialchars($m_id);
            $m_key = mysqli_real_escape_string($con,$_POST['m_key']);
            $m_key = htmlspecialchars($m_key);
            
            $random=rand(1000,9999);
            $imgtmpname = $_FILES['m_photo']['tmp_name'];
        	$imgsize = $_FILES['m_photo']['size'];
        	$imgerror = $_FILES['m_photo']['error'];
        	$imgtype = $_FILES['m_photo']['type'];
        
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
        				$filedes1 = '../../mentor_photo/'.$imgnamenew1;
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
	
        
            
            $sel0123 = "update creator_data set c_name='$name', c_fname='$fname', c_lname='$lname', c_cno='$cno',c_email='$email',c_addr='$addr',c_state='$state',c_city='$city',c_img='$imgnamenew1',c_edu='$edu',c_spec='$spec',acc_holder_name='$acc_holder',acc_type='$ac_type',acc_no='$ac_no',ifsc='$ifsc_no',mid='$m_id',m_key='$m_key' where id='$id'";
            $sql0123=mysqli_query($con,$sel0123) or die(mysqli_error($con));
            if($sql0123) 
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
                    toastr["success"]("Profile Updated Named <?php echo $name; ?> Success...!","Profile")
                </script>
                <?php
            }
            else
            {
                echo'<script>
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
                    toastr["error"]("Something Went Wrong...!","Failed")
                </script>';           
            }
                
        }
        else
        {
           echo $sel0123;
        }
     

?>