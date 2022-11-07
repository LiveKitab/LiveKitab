<?php
	
	include '../inc/connection.php';
	$response = array();
	
    $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $user_id = htmlspecialchars ($user_id);
    
    $total=0;
    $count=0;
    
	
// 	$user_id = "USER26";
	
	
    $sql2="Select course_id from purchased_courses where user_id='$user_id'";
    $result2=mysqli_query($conn,$sql2)or die(mysqli_error($conn));
    while($row2=mysqli_fetch_assoc($result2))
    {
        $course_id=$row2['course_id'];
        //echo $course_id;
        $sql3="SELECT v_id FROM final_video WHERE  course_id='$course_id'";
        $result3=mysqli_query($conn,$sql3)or die(mysqli_error($conn));
        while($row3=mysqli_fetch_assoc($result3))
        {
        
            $v_id=$row3['v_id'];
            //echo $v_id;
            $sql = "SELECT test_id FROM video_test_data WHERE v_id = '$v_id'";
        	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
                $result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
        		//$count=mysqli_num_rows($result);
        		while($row=mysqli_fetch_assoc($result))
        		{
        		    $tst_id=$row['test_id'];
        		    $count++;
        		    //echo $tst_id;
        		    $cmd="select tst_id from video_result where tst_id='$tst_id' and user_id='$user_id'";
        		    $exe=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
        		    $count1=mysqli_num_rows($exe);
        		    $total=$total+$count1;
        		    
        		}
        }
      
    }
     $response['total']=$total;
     $response['count']=$count;
     
    echo json_encode($response);
	mysqli_close($conn);	
?>