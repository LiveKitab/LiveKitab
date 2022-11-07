<?php
	include '../inc/connection.php';
	$response=array();
	
	$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $user_id = htmlspecialchars ($user_id);
    
    $subject_id = mysqli_real_escape_string($conn,$_POST['course_id']);
    $subject_id = htmlspecialchars ($subject_id);

    $cid = mysqli_real_escape_string($conn,$_POST['c_id']);
    $cid = htmlspecialchars ($cid);
    // $user_id = "USER36";
    // $subject_id = "SUB1";
    // $cid = "KAU1";
		$sql1="Select * from purchased_courses where user_id='$user_id' and sub_id='$subject_id' and c_id = '$cid'";
// 		echo $sql1;
		//echo $sql1;
		$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
// 		echo $count;
		if($count==0)
		{
		    	$response['message']="Not Enrolled";
		}
			else
		{
			$response['message']="Already Enrolled";
		}
	 echo json_encode($response);
	 mysqli_close($conn);
?>