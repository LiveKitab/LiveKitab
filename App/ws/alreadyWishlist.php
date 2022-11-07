<?php
	
	include '../inc/connection.php';
	$response = array();
	
    $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $user_id = htmlspecialchars ($user_id);
    
    $course_id = mysqli_real_escape_string($conn,$_POST['course_id']);
    $course_id = htmlspecialchars ($course_id);
    $cid = $_POST['c_id'];

   /* {course_id=COURSE2, user_id=USER46}*/
// 	$user_id = "USER3";
// 	$course_id = "COURSE1";
// 	$cid = "KUL1";

	$sql = "SELECT user_id,sub_id,c_id FROM wishlist WHERE user_id='$user_id' and sub_id='$course_id' and c_id='$cid'";
// 	echo $sql;
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$count=mysqli_num_rows($result);
    if($count>0)
    {
        $response['message']="In";
    }
    else
    {
        $response['message']="Not in";
    }
    echo json_encode($response);
	mysqli_close($conn);	
	?>