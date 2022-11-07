<?php  

    include '../inc/connection.php';

    $response = array();
    
	$user_id =$_POST['user_id'];

// 	$user_id = 'USER35';
	
    $sel = "UPDATE user_data SET u_regid = 'NOT SET' WHERE u_id = '$user_id'";
    $result = mysqli_query($conn, $sel) or die(mysqli_error($conn));
    if($result){
        $response['message'] ="success";
    } else {
        $response['message'] ="Fail to logout";
    }
    mysqli_close($conn);

 echo json_encode($response);
?>