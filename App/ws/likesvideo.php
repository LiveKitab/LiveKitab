<?php
	
	include '../inc/connection.php';
	$response=array();
	$temp=array();
// 	if(isset($_POST['user_id'])|| isset($_POST['course_id']) || isset($_POST['v_id']))
// 	{
		$user_id=$_POST['user_id'];
		$sub_id=$_POST['course_id'];
		$v_id=$_POST['v_id'];
		$c_id = $_POST['c_id'];
		/*{course_id=COURSE1, v_id=VID1, user_id=USER26}*/
// 		$user_id="USER35";
// 		$sub_id="SUB1";
// 		$v_id="VID1";
// 		$c_id = 'KAU1';
		//echo $user_id;
		
    	$sql1="Select * from purchased_courses where user_id='$user_id' and sub_id='$sub_id' and c_id='$c_id'";
    // 	echo $sql1;
		$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
		if($count==0)
		{
			$temp['message']="Not Enrolled";
			array_push($response,$temp);
		}
		else
		{
			$temp['message']="Enrolled";
			$sql="SELECT  v_id  FROM video_like_dislike WHERE ld_status='1' and v_id='$v_id'";
			//echo $sql;
			$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
			$count=mysqli_num_rows($result);
			$temp['likes']=$count;
			$sql1="SELECT  v_id  FROM video_like_dislike WHERE ld_status='2' and v_id='$v_id'";
			//echo $sql;
			$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
			$count1=mysqli_num_rows($result1);
			$temp['dislikes']=$count1;
			$sql2="SELECT v_id FROM comment_video WHERE v_id='$v_id'";
			//echo $sql;
			$result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
			$count2=mysqli_num_rows($result2);
			$temp['comment']=$count2;
// 			echo $comment;
		
			$sql3="SELECT  v_id  FROM video_like_dislike WHERE ld_status='1' and v_id='$v_id' and u_id='$user_id'";
			//echo $sql;
			$result3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
			$count3=mysqli_num_rows($result3);
			$temp['isLiked']=$count3;
			
			$sql4="SELECT  v_id  FROM video_like_dislike WHERE ld_status='2' and v_id='$v_id' and u_id='$user_id'";
			//echo $sql;
			$result4=mysqli_query($conn,$sql4) or die(mysqli_error($conn));
			$count4=mysqli_num_rows($result4);
			$temp['isDisliked']=$count4;
			
			array_push($response,$temp);

		}
    echo json_encode($response);
	 mysqli_close($conn);
?>