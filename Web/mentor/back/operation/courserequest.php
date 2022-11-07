<?php
        include("../../../db/mconnect.php");
        
	    if(isset($_POST['sub_id']) && isset($_POST['rmk']) && isset($_POST['sub_name']) && isset($_POST['sub_code']))
	    {
	        $sub_id = mysqli_real_escape_string($con,$_POST['sub_id']);
            $sub_id = htmlspecialchars($sub_id);
            $rmk = mysqli_real_escape_string($con,$_POST['rmk']);
            $rmk = htmlspecialchars($rmk);
            $sub_name = mysqli_real_escape_string($con,$_POST['sub_name']);
            $sub_name = htmlspecialchars($sub_name);
            $sub_code = mysqli_real_escape_string($con,$_POST['sub_code']);
            $sub_code = htmlspecialchars($sub_code);
            $t_name = mysqli_real_escape_string($con,$_POST['t_name']);
            $t_name = htmlspecialchars($t_name);
            $s_duration = mysqli_real_escape_string($con,$_POST['s_duration']);
            $s_duration = htmlspecialchars($s_duration);
            $v_limit = mysqli_real_escape_string($con,$_POST['v_limit']);
            $v_limit = htmlspecialchars($v_limit);
            $t_limit = mysqli_real_escape_string($con,$_POST['t_limit']);
            $t_limit = htmlspecialchars($t_limit);
              
              $cmd1="select * from creator_data where c_id='$c_id' LIMIT 1";
              $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
              while($row1=mysqli_fetch_array($result1))
              {     
                  $c_name=$row1['c_name'].' '.$row1['c_fname'].' '.$row1['c_lname'];
                  $c_cno=$row1['c_cno'];
                  $c_email=$row1['c_email'];
              }
              
            
        $receiving_email_address = 'contact@videobooks.zocarro.com';
        $headers="From: ".$c_email;
        $body='Hi... My Name is '.$c_name.' Contact: '.$c_cno.' & Email: '.$c_email.',   I am Intrested To add Videos on Subject: '.$sub_name.' Subject Code: '.$sub_code.' Remark: '.$rmk;
        if(mail($receiving_email_address,'New Subject Request',$body, $headers)){
            
            $cmd="INSERT INTO `apply_for_subject`(`id`, `c_id`, `sub_id`, `title`, `days`, `no_of_video`, `no_of_test`, `sub_name`, `sub_code`, `remarks`, `des`, `sub_duration`, `price`, `discount`, `status`, `admin_status`) values
	        (null,'$c_id','$sub_id','$t_name','0','$v_limit','$t_limit','$sub_name','$sub_code','$rmk','NA','$s_duration','0','NA','0','0')";
	        $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
            
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
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["success"]("We Will Notify You Shortly!","Request Sent Successfully!")
                </script>
			<?php
		}
		else{
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
            "timeOut": "2000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["warning"]("Please Try Again","Something went wrong!")
                </script>
			<?php
		}
            
	    }
?>