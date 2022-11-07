<?php  
    include '../inc/connection.php';

    $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $user_id = htmlspecialchars ($user_id);

    $sub_id = mysqli_real_escape_string($conn,$_POST['sub_id']);
    $sub_id = htmlspecialchars ($sub_id);

    $c_id = mysqli_real_escape_string($conn,$_POST['c_id']);
    $c_id = htmlspecialchars ($c_id);
    
    $review = mysqli_real_escape_string($conn,$_POST['review']);
    $review = htmlspecialchars ($review);

    $rating = mysqli_real_escape_string($conn,$_POST['rating']);
    $rating = htmlspecialchars ($rating);

    $status = "0";
    
     
    
    // $sub_id = "COURSE1";
    // $user_id = "USER26";
    // $c_id = 'KUL';
    // $review = "good";
    // $rating = "4.0";
    
    
    $response=array();
    
    
    $sql1="Select * from course_feedback where user_id='$user_id' and sub_id='$sub_id' and c_id ='$c_id' ";
    // echo $sql1;
		$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
		if($count==0)
		{
            $sql = "INSERT INTO course_feedback(user_id,c_id,sub_id,review,rating,status) VALUES ('$user_id','$c_id','$sub_id','$review','$rating','$status')";
            // echo $sql;
            
			$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
			if($result)
			{
				$response['message']="Feedback added";
			}
			else{
				$response['message']="Failed";
			}
		}
		else
		{
			$response['message']="Already submitted";
		}

    echo json_encode($response);	
    mysqli_close($conn);
?>