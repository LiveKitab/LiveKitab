<?php
include '../inc/connection.php';

    $user_id=$_POST['user_id'];
    $sub_id=$_POST['sub_id'];
    $c_id = $_POST['mentor_id'];
    // $user_id="USER1";
    // $sub_id="SUB1";
    // $c_id = "KAU1";
	$response=array();
       $sql1="Select * from course_feedback where user_id='$user_id' and sub_id='$sub_id' and c_id ='$c_id'";
      // echo $sql1;
		$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
		if($count==0)
		{
			$response['message']="Not Submitted";
		}
		else
		{
			$response['message']="Already Submitted";
		}
    echo json_encode($response);
    mysqli_close($conn);
?>