<?php
   	include '../../../inc/connection.php';          
                $customercontact=$_POST['customercontact'];
                // $customercontact = '9662075648';

                	$response1 = array();
					$response = array();

                $otp = rand(11111,99999);
                // $otp = 12345;
	            // SMS To Student Username Password
				// $username1 = urlencode('gmitbvn');
    //             $password = urlencode('Gmit@123');
    //             // Message details
    //             $numbers = urlencode($customercontact);
    //             $message = rawurlencode('Your account Verification Code is '.$otp.', Please do not share this message with anyone. Thank You.');
    //             $gsmid = urlencode('GMITCE');
    //             // Prepare data for POST request
    //             $data = 'UserId=' . $username1 . '&UserPass=' . $password . "&Message=" . $message . "&MobileNo=" . $numbers . "&GSMID=" . $gsmid;
                
    //             // Send the GET request with cURL
    //             $ch = curl_init('http://mobi1.blogdns.com/httpmsgid/SMSSenders.aspx?' . $data);
    //             curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //             $response = curl_exec($ch);
    //             curl_close($ch);
                    
                    $username1 = urlencode('ENCENDERBHVNGR');
                    $password = urlencode('Enc@659');
                    $numbers = urlencode($customercontact);
                    $messagesms = rawurlencode('Your account Verification Code is '.$otp.', Please do not share this message with anyone. Thank You. Team Zocarro');
                    // $gsmid = urlencode('GMITCE');
                    $gsmid = urlencode('ZOCARO');
                    $data = 'UserID=' . $username1 . '&UserPass=' . $password . "&Message=" . $messagesms . "&MobileNo=" . $numbers . "&GSMID=" . $gsmid;
                    $ch = curl_init('https://onlysms.co.in/api/sms.aspx?' . $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response1 = curl_exec($ch);
                    curl_close($ch);
                
                
                array_unshift($response,array("otp" => $otp));
                echo json_encode($response);
                mysqli_close($conn);
?>