<?php 

    include '../inc/connection.php';

 //	$u_id = $_POST['u_id'];
 
    $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $user_id = htmlspecialchars ($user_id);
    
    $tst_id = mysqli_real_escape_string($conn,$_POST['tst_id']);
    $tst_id = htmlspecialchars ($tst_id);
    
    $percentage = mysqli_real_escape_string($conn,$_POST['percentage']);
    $percentage = htmlspecialchars ($percentage);
   
	$status = 0;

	$today=date('Y-m-d');
	
/*	$user_id = "USER1";
	$tst_id= "TST1";
	$percentage = "40%";*/
	
	$response = array();

	$sel = "select * from video_result where user_id='$user_id' ";
    $val = mysqli_query($conn,$sel) or die(mysqli_error($conn));
    $count=mysqli_num_rows($val);
    if($count==0)
    {
    // 	echo $user_id;
        
    
    	$stmt = "INSERT INTO video_result(user_id, tst_id, percentage, date, status) 
             VALUES ('$user_id','$tst_id','$percentage','$today','0')";
        // echo $stmt;
    	$result = mysqli_query($conn,$stmt) or die(mysqli_error($conn));
    	if($result){
    		$response['message'] = "Success";
    		/*$sel1 = "select * from video_result where user_id='$user_id'";
            $val1 = mysqli_query($conn,$sel1) or die(mysqli_error($conn));
            $row1=mysqli_fetch_assoc($val1);*/
            // $response['user_id']=$row1['user_id'];
    	}
    	else{
    		$response['message'] = "Failed";
    	}
    }
    else
    {
        	$sel1 = "UPDATE video_result SET percentage='$percentage',date='$today',status='0' WHERE user_id='$user_id' and tst_id='$tst_id'";
            $val1 = mysqli_query($conn,$sel1) or die(mysqli_error($conn));
        	$response['message'] = "Success";
        	$row1=mysqli_fetch_assoc($val1);
        // 	$response['user_id']=$row1['user_id'];
        
    
    }
    	echo json_encode($response);
    	mysqli_close($conn);
	
?>