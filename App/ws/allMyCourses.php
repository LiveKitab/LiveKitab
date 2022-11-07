<?php
include '../inc/connection.php';

    $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $user_id = htmlspecialchars ($user_id);
    
    // $user_id="USER4";
       $response=array();

       $table = "purchased_courses";
    
        $sql = "SELECT DISTINCT p.course_id,p.user_id, c.course_name,c.course_bg
        FROM $table p,course_data c
        WHERE p.user_id='$user_id' AND  p.course_id=c.course_id";
    // echo $sql;
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
     while($row=mysqli_fetch_assoc($result)) 
     {
          $temp=array();
          $temp['course_id']=$row['course_id'];
          $temp['user_id']=$row['user_id'];
          $temp['course_name']=$row['course_name'];
          $temp['course_bg']=$row['course_bg'];
          $course_id=$row['course_id'];
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
     
     echo json_encode($response);
     mysqli_close($conn);
    ?>