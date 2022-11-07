<?php
    include '../inc/connection.php';

	$response=array();

    $sql = "SELECT DISTINCT c_id,course_id,course_name FROM course_data  ";
    $total=0;
      $temp1=array();
     //echo $sql;
    
	$result=mysqli_query($conn,$sql);
	
     while($row=mysqli_fetch_assoc($result)) 
     {
		 $course_id=$row['course_id'];
		 //echo $c_id;
    		 $sql1="select user_id from purchased_courses where course_id='$course_id' ";
        	$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        	$count=mysqli_num_rows($result1);
        	$temp1['c_id']=$count;

     }
    
  
      $sql2 = "SELECT DISTINCT c_id,course_id,course_name FROM course_data  ";
      $total=0;
     //echo $sql;
    
	$result2=mysqli_query($conn,$sql2);
	
     while($row2=mysqli_fetch_assoc($result2)) {
         $temp=array();
         $temp['c_id']=$row2['c_id'];
         $temp['course_id']=$row2['course_id'];
         $temp['course_name']=$row2['course_name'];
		 $course_id=$row2['course_id'];
		 //echo $c_id;
    		 $sql1="select user_id from purchased_courses where course_id='$course_id' ";
        	$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        	$count=mysqli_num_rows($result1);
        	$temp['enrolled']=$count;
        	array_push($response, $temp);

     }
     
  
    echo json_encode($response);
    mysqli_close($conn);
?>