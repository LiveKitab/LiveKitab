<?php
include '../inc/connection.php';

    $user_id=$_POST['user_id'];
   // $user_id="USER46";
	$response=array();
	
	$total=0;
    $totalcourse=0;

    $table = "purchased_courses";
    
        $sql5 = "SELECT DISTINCT c.sub_code,p.c_id,p.user_id, c.course_name,c.course_bg
        FROM purchased_courses p,course_data c
        WHERE p.user_id='$user_id' AND  p.c_id=c.course_id ";
    // echo $sql;
    
	$result5=mysqli_query($conn,$sql5) or die(mysqli_error($conn));
	
     while($row5=mysqli_fetch_assoc($result5)) {
         $totalcourse=0;
          $temp=array();
          $temp['course_id']=$row5['c_id'];
          $temp['sub_code']=$row5['sub_code'];
          $temp['user_id']=$row5['user_id'];
          $temp['course_name']=$row5['course_name'];
          $temp['course_bg']=$row5['course_bg'];
          $course_id=$row5['course_id'];
           $sql1="select avg(rating) 'rating' from course_feedback where course_id='$course_id' ";
        //echo $sql1;
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
        	$sql3="SELECT v_id FROM final_video WHERE  course_id='$course_id'";
            $result3=mysqli_query($conn,$sql3)or die(mysqli_error($conn));
            while($row3=mysqli_fetch_assoc($result3)) {
                $v_id=$row3['v_id'];
                $sql4= "SELECT t.test_id FROM video_test_data t,course_data c,final_video v WHERE t.v_id = '$v_id' and c.course_id=v.course_id and v.v_id=t.v_id";
                //echo $sql4;
            	$result4=mysqli_query($conn,$sql4) or die(mysqli_error($conn));
            	$count=mysqli_num_rows($result4);
            	while($row4=mysqli_fetch_assoc($result4)){
            		    $tst_id=$row4['test_id'];
            		    $totalcourse=$totalcourse+1;
            		    $cmd="select tst_id from video_result where tst_id='$tst_id' and user_id='$user_id'";
            		    $exe=mysqli_query($conn,$cmd) or die(mysqli_error($conn));
            		    $count1=mysqli_num_rows($exe);
            		    $total=$total+$count1;
            		    //echo $total;p.course_id
            		}
            		$temp['totaltest']=$totalcourse;
            		$temp['totalgiven']=$total;
        }
    		array_push($response, $temp);
     }
     
     echo json_encode($response);
     mysqli_close($conn);
    ?>