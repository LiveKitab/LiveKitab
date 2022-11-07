<?php
    include '../inc/connection.php';

	$response=array();

// 		 echo $c_id;
		 $sql1="select DISTINCT c_id from course_feedback WHERE rating>=4 order by id desc";
        // echo $sql1;
    	$result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        $count1 = mysqli_num_rows($result1);
         if($count1 > 0)
        {
            $message = "Mentor Available";
        	 while($row=mysqli_fetch_assoc($result1)) 
             {
                    	     $temp['c_id'] = $row['c_id'];
                    	   //  $user_id = $row['user_id'];
                    	   //  $course_id=$row['sub_id'];
                    	     $c_id=$row['c_id'];
                        	   //$sql2 = "SELECT DISTINCT c.c_id, c.sub_id,c.no_of_video,c.no_of_test,c.sub_name,c.des,c.sub_code FROM apply_for_subject c WHERE c.sub_id ='$course_id' AND c.c_id ='$c_id'";
                        	   ////echo $sql2;
                            //   $result2=mysqli_query($conn,$sql2);
                            //   while($row2=mysqli_fetch_assoc($result2)) 
                            //   {
                            //              $temp=array();
                            //              $temp['c_id']=$row2['c_id'];
                            //              $temp['sub_code'] =$row2['sub_code'];
                            //              $temp['sub_id']=$row2['sub_id'];
                            //              $temp['sub_name']=$row2['sub_name'];
                            //              $temp['sub_des']=$row2['des'];
                            //             $videos=$row2['no_of_video'];
                            //              $temp['no_of_video'] = $videos. ' '."Videos";
                            //             $test=$row2['no_of_test'];
                            //           	$temp['no_of_test']  = $test. ' '."Test";
                            //     		 $sub_id=$row2['sub_id'];
                            //   }
                        	 $sql2="select user_id from purchased_courses where c_id ='$c_id' ";
                            	$result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                            	$count=mysqli_num_rows($result2);
                            	$temp['enrolled']=$count;
                            	 $sql3="select * from creator_data where c_id ='$c_id' ";
                            	$result3=mysqli_query($conn,$sql3) or die(mysqli_error($conn));
                            	 while($row3=mysqli_fetch_assoc($result3)) 
                                {
                                         $c_name = $row3['c_name'];
                                         $c_lname = $row3['c_lname'];
                                         $cname = $c_name .' '. $c_lname; 
                                         $temp['m_name'] = $cname;
                                         $temp['c_img'] = $row3['c_img'];
                                }
                                 $sql4="select AVG(rating) AS 'rating' from course_feedback WHERE c_id ='$c_id'";
                            // 	echo $sql4;
                            	$result4=mysqli_query($conn,$sql4) or die(mysqli_error($conn));
                            	while($row4=mysqli_fetch_assoc($result4)) 
                                {
                                    $rating = $row4['rating'];
                                }
                            	$temp['rating']=$rating;
                        		array_push($response, $temp);
             }
        }
        else
        {
            $message = "No mentor available";
        }
     array_unshift($response,array("message"=>$message));
    echo json_encode($response);
    mysqli_close($conn);
?>