<?php
    include '../inc/connection.php';

    $stream_id = mysqli_real_escape_string($conn,$_POST['stream_id']);
    $stream_id = htmlspecialchars ($stream_id);
    
    $pr_id = mysqli_real_escape_string($conn,$_POST['pr_id']);
    $pr_id = htmlspecialchars ($pr_id);
    
    $b_id = mysqli_real_escape_string($conn,$_POST['b_id']);
    $b_id = htmlspecialchars ($b_id);
    
    $term_id = mysqli_real_escape_string($conn,$_POST['term_id']);
    $term_id = htmlspecialchars ($term_id);

//   [{"stream":"STREAM2","program":"PROGRAM27","department":"BID1","term_id":"TERM2"}]
    // $stream_id="STREAM1";
    // $pr_id="PROGRAM1";
    // $b_id="BID4";
    // $term_id="TERM1";
    
    $sql = "SELECT DISTINCT c.c_id, c.course_id, c.course_name, c.course_bg FROM course_data c  where stream_id='$stream_id' and pr_id='$pr_id' and b_id='$b_id' and term_id='$term_id' and course_status='1'";
    //echo $sql;
     $response=array();
    
	$result=mysqli_query($conn,$sql);
	$count1=mysqli_num_rows($result);
	
     while($row=mysqli_fetch_assoc($result)) 
     {
         $temp=array();
         $temp['c_id']=$row['c_id'];
         $temp['course_id']=$row['course_id'];
         $temp['course_name']=$row['course_name'];
         $temp['course_bg']=$row['course_bg'];

		 $course_id=$row['course_id'];
		 //echo $c_id;
		 $sql1="select avg(rating) 'rating' from course_feedback where course_id='$course_id' ";
        //echo $sql1;
    	$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    	$row=mysqli_fetch_assoc($result1);
    	if($row['rating']=="")
    	{
    	    $temp['rating']="0";
    	}
    	else
    	{
    	     $temp['rating']=$row['rating'];
    	}
    	$sql2="select user_id from purchased_courses where course_id='$course_id' ";
        $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
        $count=mysqli_num_rows($result2);
        $temp['enrolled']=$count;
    	array_push($response, $temp);

     }
     
    array_unshift($response,array("total"=>$count1));
    echo json_encode($response);
    mysqli_close($conn);
?>