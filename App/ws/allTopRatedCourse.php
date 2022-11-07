<?php
    include '../inc/connection.php';

	$response=array();

    $sql = "SELECT DISTINCT c.c_id, c.course_id, c.course_name, c.course_bg FROM course_data c order by id";
     //echo $sql;
    
	$result=mysqli_query($conn,$sql);
	
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
    echo json_encode($response);
    mysqli_close($conn);
?>