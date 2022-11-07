<?php
	
	include '../inc/connection.php';
	$response=array();
	
		$user_id=$_POST['user_id'];
		$sub_id=$_POST['sub_id'];
		$cid = $_POST['c_id'];
// 		$user_id="USER3";
//         $sub_id="COURSE1";
//         $cid ='KUL1';
		$sql1="Select * from wishlist where  c_id = '$cid' and sub_id='$sub_id' and user_id='$user_id'";
// 		echo $sql1;
		$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
// 		echo $count;
		if($count==0)
		{
			$sql ="INSERT INTO wishlist(c_id,user_id, sub_id, status) VALUES ('$cid','$user_id','$sub_id','0') ";
// 			echo $sql;
			$result=mysqli_query($conn,$sql) or die(mysqli_error($sql));
			if($result)
			{
				$response['message']="Added to wishlist";
			}
			else
			{
				$response['message']="Failed to Wishlist";
			}
		}
		else
		{
			$response['message']="Already In wishlist";
		}
	     echo json_encode($response);
    mysqli_close($conn);


?>