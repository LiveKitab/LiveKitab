<?php
session_start();
include '../../../db/mconnect.php';

    if((isset($_POST['reg_email'])))
    {
        $email  =  mysqli_real_escape_string($con,$_POST['reg_email']);
        
        $sel = "select * from creator_data where c_email='$email'";
        $run = mysqli_query($con,$sel);
        while($row=mysqli_fetch_array($run))
        {
            $email1=$row['c_email'];
        }
        
        if($email === $email1)
        {
            // generate OTP
            $otp1 = rand(100000,999999);
            require_once("../mailer/ForgotPasswordOtp.php");
            // Send OTP
            $mail_status1 = sendOTP($email,$otp1);
            
            if($mail_status1 == 1)
            {
            $result = mysqli_query($con,"INSERT INTO otp_expiry(otp,is_expired,create_at) VALUES ('" . $otp1 . "', 0, '" . date("Y-m-d H:i:s"). "')");
         
            if(!empty($result))
            {
                echo'1';
                $_SESSION['reg_email'] = base64_encode($email);
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
            "positionClass": "toast-bottom-center",
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
            toastr["warning"]("Cant Find Your Account...","Sorry")
        </script>';
        }
    }
    else if(isset($_POST['otpemail']))
    {
        $otpemail = mysqli_real_escape_string($con,$_POST['otpemail']);
        
        $result = mysqli_query($con,"SELECT * FROM otp_expiry WHERE otp='" . $_POST["otpemail"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
        $count  = mysqli_num_rows($result);
        if(!empty($count))
        {
        $result = mysqli_query($con,"UPDATE otp_expiry SET is_expired = 1 WHERE otp = '" . $_POST["otpemail"] . "'");
        if($result)
        {
        ?>
        <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-center",
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
            toastr["success"]("Your Account is Verified...","Success")
        </script>
            <script>
            setTimeout(function() {
                window.location='createnewpassword';
            }, 5000);
            </script>
            <?php
        }
        else
        {
            
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
            "positionClass": "toast-bottom-center",
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
            toastr["error"]("Your OTP is Invalid, Please Enter OTP Sent to Your E-mail...","Sorry")
        </script>';
        }	
    }
    else if(isset($_POST['useremail']) && isset($_POST['newpwd']) && isset($_POST['confirmpwd']))
    {
        $useremail = mysqli_real_escape_string($con,$_POST['useremail']);
        $newpwd = mysqli_real_escape_string($con,$_POST['newpwd']);
        $confirmpwd = mysqli_real_escape_string($con,$_POST['confirmpwd']);
        
        if($newpwd === $confirmpwd)
        {
            $newpwd = password_hash($newpwd, PASSWORD_DEFAULT);
            
            $upd = "update creator_data set c_pwd='$newpwd' where c_email='$useremail'";
            $q = mysqli_query($con,$upd);
            if($q)
            {
                echo'<script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-bottom-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "1500",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
          }
            toastr["success"]("Your Password Reset Success...!","Success")
        </script>';
        ?>
        <script>
                        setTimeout(function() {
                            window.location='index';
                        }, 1500);
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
            "positionClass": "toast-bottom-center",
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
            toastr["error"]("Please Try Again...!","Something Went Wrong")
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
            "positionClass": "toast-bottom-center",
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
            toastr["warning"]("Your Password & Confirm Password Not Match...!","Sorry")
        </script>';
        }
    }
    
?>