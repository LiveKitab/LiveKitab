<?php
    // include '../../../db/connect.php';
    
    include '../../inc/connection.php';
    $response = array();
    $tempar = array();
    
    $contact = mysqli_real_escape_string($conn,$_POST['contact']);
    $new_password = mysqli_real_escape_string($conn,$_POST['new_password']);
    //  $contact = '820097897';
    //  $new_password  = "admin";
    $sel = "SELECT id  FROM  user_data  WHERE '$contact' IN (u_email,u_cno) LIMIT 1";
	$ex = mysqli_query($conn,$sel) or die (mysqli_error($conn));
	$count = mysqli_num_rows($ex);
		if($count > 0) 
		{
		    $newpass=password_hash($new_password, PASSWORD_DEFAULT);
		    $update = "UPDATE user_data SET u_pwd = '$newpass' WHERE '$contact' IN (u_email,u_cno)";
		    $u_result = mysqli_query($conn, $update);
		    if($u_result) 
		    {
		        $message = 'success';
		    } else 
		    {
		        $message = 'Failed to update password please try again.';
		    }
		} else {
		    $message = 'No User found!';
		}
    array_unshift($response, array("message" => $message));
    echo json_encode($response);
    mysqli_close($conn);
?>