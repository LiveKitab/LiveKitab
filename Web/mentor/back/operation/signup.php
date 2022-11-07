<?php
include '../../../db/connect.php';

    if((isset($_POST['m_email1'])) && (isset($_POST['m_cont'])) && (isset($_POST['m_pass1'])) && (isset($_POST['m_pass2'])))
    {
        $f_name  =  mysqli_real_escape_string($con,$_POST['f_name']);
        $m_name  =  mysqli_real_escape_string($con,$_POST['m_name']);
        $l_name  =  mysqli_real_escape_string($con,$_POST['l_name']);
        $m_email1  =  mysqli_real_escape_string($con,$_POST['m_email1']);
        $m_cont  =  mysqli_real_escape_string($con,$_POST['m_cont']);
        $m_pass1  =  mysqli_real_escape_string($con,$_POST['m_pass1']);
        $m_pass2  =  mysqli_real_escape_string($con,$_POST['m_pass2']);
    
    $cmd="select * from creator_data ORDER BY id DESC LIMIT 1";
    $result=mysqli_query($con,$cmd) or die(mysqli_error($con));
    if(mysqli_fetch_row($result)<1)
    {
                $id = 0;
    }
    
    else
    {
        $cmd1="select * from creator_data ORDER BY id DESC LIMIT 1";
        $result1=mysqli_query($con,$cmd1) or die(mysqli_error($con));
        while($row=mysqli_fetch_array($result1))
        {
            $id=$row['id'];
        }
    }
    $id = $id + 1;
    $prefix = 'CRT';
    $c_id = $prefix.$id;
    
    $c_ext = substr($f_name, 0, 3);
    $c_ext = strtoupper($c_ext);
    $finalid = $c_ext.$id;
   

    if($m_pass1 === $m_pass2)
    {
      $m_pass1 = password_hash($m_pass1, PASSWORD_DEFAULT);


      $val = "select * from creator_data where c_email= '$m_email1'";
      $cmd = mysqli_query($con,$val) or die(mysqli_error($con));
      
      if(mysqli_fetch_row($cmd)<1)
      {
          // generate OTP
        $otp = rand(100000,999999);
        require_once("../mailer/sendEmailreg.php");
        // Send OTP
        $mail_status = sendOTP($m_email1,$otp);
        
        if($mail_status == 1)
        {
            $result = mysqli_query($con,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
            if(!empty($result))
            {
                echo'1';
                $_SESSION['m_email1'] = base64_encode($m_email1);
                $_SESSION['c_id'] = base64_encode($c_id);
                $_SESSION['m_cont'] = base64_encode($m_cont);
                $_SESSION['m_pass1'] = base64_encode($m_pass1);
                $_SESSION['m_pass2'] = base64_encode($m_pass2);
                $_SESSION['f_name'] = base64_encode($f_name);
                $_SESSION['m_name'] = base64_encode($m_name);
                $_SESSION['l_name'] = base64_encode($l_name);
                $_SESSION['finalid'] = base64_encode($finalid);
            }
        }
        else
        {
            echo"2";
        }
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
            toastr["warning"]("Account Already Exists","Warning")
        </script>';
       }
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
            toastr["success"]("Password and Confirm Password not Match","Please Try Again")
        </script>';
	 }
}
else if(isset($_POST['reg_otp']))
{
    $c_id = base64_decode($_SESSION['c_id']);
    $m_cont = base64_decode($_SESSION['m_cont']);
    $m_email1 = base64_decode($_SESSION['m_email1']);
    $m_pass1 = base64_decode($_SESSION['m_pass1']);
    $m_pass2 = base64_decode($_SESSION['m_pass2']);
    $f_name = base64_decode($_SESSION['f_name']);
    $m_name = base64_decode($_SESSION['m_name']);
    $l_name = base64_decode($_SESSION['l_name']);
    $finalid = base64_decode($_SESSION['finalid']);

    $reg_otp = mysqli_real_escape_string($con,$_POST['reg_otp']);
    

    $result = mysqli_query($con,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["reg_otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
    $count  = mysqli_num_rows($result);
    if(!empty($count))
    {
        $result = mysqli_query($con,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["reg_otp"] . "'");
	    $data = "insert into creator_data (id,c_id,c_name,c_fname,c_lname,c_cno,c_email,c_addr,c_state,c_city,c_img,c_edu,c_spec,acc_holder_name,acc_type,acc_no,ifsc,mid,m_key,c_pwd,c_joindate,c_status,c_block,discount) values(null,'$finalid','$f_name','$m_name','$l_name','$m_cont','$m_email1','Not Set','Not Set','Not Set','noimg.jpg','Not Set','Not Set','Not Set','Not Set','Not Set','Not Set','Not Set','Not Set','$m_pass1','$query_date','0','0','0')";
        $result = mysqli_query($con,$data) or die(mysqli_error($con));
        
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
                toastr["success"]("Mentor Registration Success...!","Mentor")
            </script>
            <script>
            setTimeout(function() {
                window.location='index';
            }, 5000);
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
                toastr["error"]("Please Try Again","Error")
            </script>';
        }
        session_destroy();
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
                toastr["error"]("Invalid OTP","Try Again")
            </script>';
        }	
}
else
{
    header('location:../../../404.php');
}

?>