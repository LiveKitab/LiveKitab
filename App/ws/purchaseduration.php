<?php
	
	include '../inc/connection.php';
	$response=array();
	$temp=array();
	
	
	$user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $user_id = htmlspecialchars ($user_id);
    
    $subject_id = mysqli_real_escape_string($conn,$_POST['course_id']);
    $subject_id = htmlspecialchars ($subject_id);

    $cid = mysqli_real_escape_string($conn,$_POST['c_id']);
    $cid = htmlspecialchars ($cid);
    
    // $user_id = "USER35";
    // $subject_id = "SUB12";
    // $cid = "KAU1";
    
    $date1=0;
    $date2=date_create(date('Y-m-d'));
    
	
	$sql="Select * from purchased_courses where user_id='$user_id' and sub_id='$subject_id' and c_id = '$cid'";

	$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	$count=mysqli_num_rows($result);
	while($row=mysqli_fetch_assoc($result))
	{
		    $date1 = date_create($row['date']);
		 	$sql1="Select * from apply_for_subject where sub_id='$subject_id' and c_id = '$cid'";
        	$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
        	$count=mysqli_num_rows($result1);
            while($row1=mysqli_fetch_assoc($result1))
        	{
        	    $days = $row1['days'];
        	}
            $diff=date_diff($date1,$date2);
            $diff->format("%a");
            if($diff->format("%a")> $days)
            {
                $response['message'] =  "expired purchased course";
            }
            else
            {
                $response['message'] =  "purchased course";
            }
      
	}

	 echo json_encode($response);
	 mysqli_close($conn);
?>
	
	
	
	
	
	