<?php  
    include '../inc/connection.php';
    
        $pkg_id = $_POST['pkg_id'];
        //$pkg_id = "PACKAGE1";
        
        $response=array();
        
    	$sql="SELECT  c.c_id, c.course_id,c.course_name,c.course_bg,c.course_plan_duration,c.sub_code,
    	c.credit,c.course_des FROM package_product p, course_data c WHERE p.pkg_id='$pkg_id' AND c.course_id=p.course_id ";
     	//echo $sql;
    	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
     while($row=mysqli_fetch_assoc($result)) {
		$temp=array();
		 $temp['c_id']=$row['c_id'];
         $temp['course_id']=$row['course_id'];
         $temp['course_name']=$row['course_name'];
         $temp['course_des']=$row['course_des'];
         $temp['course_bg']=$row['course_bg'];
         
         $temp['course_plan_duration']=$row['course_plan_duration'];
         $temp['sub_code']=$row['sub_code'];
         $temp['credit']=$row['credit'];
         
		 $course_id=$row['course_id'];
		 
		 
		 
		 
		 $sql1="select avg(rating) 'rating' from course_feedback where course_id='$course_id' ";
    	$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    	$row1=mysqli_fetch_assoc($result1);
    	if($row1['rating']=="")
    	{
    	    $temp['rating']="0";
    	}
    	else
    	{
    	     $temp['rating']=$row1['rating'];
    	}
    	 $sql2="select user_id from purchased_courses where course_id='$course_id' ";
         $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
         $count=mysqli_num_rows($result2);
         $temp['enrolled']=$count;
         $cmd="SELECT user_id FROM purchased_courses WHERE user_id='$user_id' AND course_id='$course_id'";
         $result3=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
         $count1=mysqli_num_rows($result3);
         //echo $cmd;
         	if($count1==0)
    	{
    	    $temp['purschased']="false";
    	}
    	else
    	{
    	      $temp['purschased']="true";
    	}
         
        
		array_push($response, $temp);

     }
     echo json_encode($response);
     mysqli_close($conn);
    ?>