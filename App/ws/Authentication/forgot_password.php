<?php
   	include '../../inc/connection.php';          
    
      $response = array();
    $tempar = array();
    // if(isset($_POST['contact'])) 
    // {
        $contact = mysqli_real_escape_string($conn,$_POST['contact']);
        // $contact = '8200978917';
    $sel = "SELECT id FROM user_data WHERE u_cno = '$contact' LIMIT 1";
    // echo $sel;
    $ex = mysqli_query($conn,$sel) or die (mysqli_error($conn));
		if(mysqli_num_rows($ex) > 0) 
		{
		    // generate OTP
            // $otp = rand(100000,999999);
            $otp = rand(9999,99999);        
                // $cmd = "UPDATE shop_login SET sh_status1='$otp' where '$loginemail' IN (sh_email,sh_cno)";
            // $run = mysqli_query($conn,$cmd) or die (mysqli_error($conn));
            // if($run)
            // {
                    // Send OTP SMS
                    // $username1 = urlencode('gmitbvn');
                    // $password = urlencode('Gmit@123');
                    // // Message details
                    // $numbers = urlencode($contact);

                    $username1 = urlencode('ENCENDERBHVNGR');
                    $password = urlencode('Enc@659');
                    $numbers = urlencode($contact);
                    $messagesms = rawurlencode('Your account Verification Code is '.$otp.', Please do not share this message with anyone. Thank You. Team Zocarro');
                    // $gsmid = urlencode('GMITCE');
                    $gsmid = urlencode('ZOCARO');

                    $data = 'UserID=' . $username1 . '&UserPass=' . $password . "&Message=" . $messagesms . "&MobileNo=" . $numbers . "&GSMID=" . $gsmid;
                  
                    $ch = curl_init('https://onlysms.co.in/api/sms.aspx?' . $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response1 = curl_exec($ch);
                    curl_close($ch);
                    // Prepare data for POST request
                    // $data = 'UserId=' . $username1 . '&UserPass=' . $password . "&Message=" . $messagesms . "&MobileNo=" . $numbers . "&GSMID=" . $gsmid;
                    // Send the GET request with cURL
                    // $ch = curl_init('http://mobi1.blogdns.com/httpmsgid/SMSSenders.aspx?' . $data);
                    // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    // $response1 = curl_exec($ch);
                    // curl_close($ch);
                    // End OTP SMS
                    // $response['message'] = 'OTP Sent on your registered Contact Number';
                    $message = 'success';
            // }
            // else
            // {
            //     $message = 'Fail To Send OTP Please Try again !';
            // }
		}
		else
		{
		  
		    $message = 'Please Enter valid Email or Contact Number, Account Not Found !';
		}
    // } else {
	// 	    $message = 'Invalid Input';
    // }
    array_unshift($response,array("otp" => $otp),array("message" => $message));
    echo json_encode($response);
    mysqli_close($conn);
?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
?>