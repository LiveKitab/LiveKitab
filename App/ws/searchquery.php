<?php 
	include '../inc/connection.php';
//  	$search="physics";
	if(isset($_REQUEST['search'])==false && isset($_REQUEST['user_id'])==false)
	{
		//ReturnError("Input is missing");
	}
	else
	{
		extract($_REQUEST);
		$response=array();
		
		
// 			$sqldata="SELECT DISTINCT university,stream,program,department,term_id FROM user_data WHERE u_id='$user_id'";
// 	   // echo $sql;
// 		$resultdata=mysqli_query($conn,$sqldata) or die(mysqli_error($conn));
// 		$countdata=mysqli_num_rows($resultdata);
// 		while($rowdata= mysqli_fetch_assoc($resultdata))
// 		{
// 		    $uni_id =$rowdata['university'];
// 		    $stream =$rowdata['stream'];
// 		    $program =$rowdata['program'];
// 		    $uni_id =$rowdata['university'];
		    
// 			$sql="SELECT DISTINCT c.c_id, c.sub_id, c.sub_name FROM course_data c,final_video f, stream_data s WHERE f.c_id = c.c_id and c.course_name LIKE '%$search%' AND c.stream_id = s.stream_id  
// 		or c.course_name LIKE '%$search' AND c.stream_id = s.stream_id 
// 		or c.course_name LIKE '$search%' AND c.stream_id = s.stream_id  or  c.course_name = '$search' AND c.stream_id = s.stream_id ";
		
		$sql="SELECT DISTINCT c.sub_id, c.sub_name,c.sub_code,c.sub_bg FROM subject_data c WHERE c.sub_name LIKE '%$search%' OR c.sub_code LIKE '%$search%'";
	   // echo $sql;
		$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$count1=mysqli_num_rows($result);
		while($row= mysqli_fetch_assoc($result))
		{
			 $temp=array();
             $temp['sub_id']=$row['sub_id'];
             $temp['sub_name']=$row['sub_name'];
             $temp['sub_code']=$row['sub_code'];
               $temp['sub_bg'] = $row['sub_bg'];
             
             
            //  $temp['v_id']=$row['v_id'];
            //  $temp['v_link']=$row['v_link'];
            //  $temp['v_attach']=$row['v_attach'];
            //  $temp['course_des']=$row['course_des'];
            //  $temp['sub_code']=$row['sub_code'];
            //  $temp['uni']=$row['uni'];
    
    		 $sub_id=$row['sub_id'];
    		 //echo $c_id;
    // 		 $sql1="select avg(rating) 'rating' from course_feedback where c_id='$c_id' ";
    //         //echo $sql1;
    //     	$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    //     	$row1=mysqli_fetch_assoc($result1);
    //     	if($row1['rating']=="")
    //     	{
    //     	    $temp['rating']="0";
    //     	}
    //     	else
    //     	{
    //     	     $temp['rating']=$row1['rating'];
    //     	}
        // 	 $sql2="select user_id from purchased_courses where c_id='$c_id' ";
        //     	$result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
        //     	$count=mysqli_num_rows($result2);
        //     	$temp['enrolled']=$count;
        		array_push($response, $temp);
		}
		
		
	}
	array_unshift($response,array("total"=>$count1));
	array_unshift($response,array("error"=>"no error"));
	echo json_encode($response);
	mysqli_close($conn);
?>