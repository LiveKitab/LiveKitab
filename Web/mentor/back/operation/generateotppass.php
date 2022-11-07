<?php
    include("../../../db/mconnect.php");
    if(isset($_POST['c_email']))
    {
        $loginemail = mysqli_real_escape_string($con,$_POST['c_email']);
        
        $sel = "select * from creator_data where '$loginemail' IN (c_email,c_cno,c_name)";
		$ex = $con->query($sel) or die (mysqli_error($con));
		if($ex->num_rows>0)
		{
		    while($temp = mysqli_fetch_array($ex))
		    {
		        $mobileno = $temp['c_cno'];
		    }
		    // generate OTP
            $otp = rand(100000,999999);
            
            $cmd = "UPDATE creator_data SET otp='$otp' where '$loginemail' IN (c_email,c_cno,c_name)";
            $run = $con->query($cmd) or die (mysqli_error($con));
            if($run)
            {
                    // Send OTP SMS
            
                    $username1 = urlencode('ENCENDERBHVNGR');
                    $password = urlencode('Enc@659');
                    // Message details
                    $numbers = urlencode($mobileno);
                    $messagesms = rawurlencode('Your account Verification Code is '.$otp.', Please do not share this message with anyone. Thank You. Team Zocarro');
                    $gsmid = urlencode('ZOCARO');
                     
                    // Prepare data for POST request
                    $data = 'UserId=' . $username1 . '&UserPass=' . $password . "&Message=" . $messagesms . "&MobileNo=" . $numbers . "&GSMID=" . $gsmid;
                    // Send the GET request with cURL
                    $ch = curl_init('https://onlysms.co.in/api/sms.aspx?' . $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response1 = curl_exec($ch);
                    curl_close($ch);
                    
                    // End OTP SMS
            }
            else
            {
                ?>
		            <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Fail To Send OTP Please Try again !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
		        <?php
            }
		    ?>
		        <div class="alert alert-success alert-dismissible fade show" role="alert"><strong>OTP Sent on your register Contact Number<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
		    <?php
		}
		else
		{
		    ?>
		        <div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Please Enter valid Email or Contact Number, Account Not Found !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>
		    <?php
		}
    }
?>