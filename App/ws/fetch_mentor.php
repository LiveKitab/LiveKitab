<?php
include '../inc/connection.php';

$subject_id = $_POST['sub_id'];
$user_id = $_POST['user_id'];


// $subject_id = 'SUB12';
// $user_id = 'USER35';

 $response = array();
 $temp = array();
 
    $sql = "SELECT DISTINCT no_of_video,no_of_test,c_id,sub_name,sub_code FROM apply_for_subject where sub_id = '$subject_id'  AND admin_status = '1'";
    // echo $sql;
    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    if($count > 0)
    {   
        while($row = mysqli_fetch_assoc($result))
        {
            // $temp['c_id'] = $row['c_id'];
            $cid =  $row['c_id'];
            // echo $cid;
            $sub_name = $row['sub_name'];
            $sub_id = $row['sub_id'];
            $no_of_video = $row['no_of_video'];
            $no_of_test = $row['no_of_test'];
            $sub_code = $row['sub_code'];
            
            $sql2 = "SELECT DISTINCT c_id,c_name,c_lname,c_cno,c_email,c_name,c_img FROM creator_data where c_id = '$cid'";
            // echo $sql2;
            $result2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            $count1 = mysqli_num_rows($result2);
           
               while($row1 = mysqli_fetch_assoc($result2))
              {
                        $c_id = $row1['c_id'];
                        $c_name = $row1['c_name'];
                        $c_lname = $row1['c_lname'];
                        $cname = $c_name .' '. $c_lname;
                        $c_no = $row1['c_cno'];
                        $c_email = $row1['c_email'];
                        $c_img = $row1['c_img'];
              }
            $sql3 = "SELECT DISTINCT c_id,rating,review FROM course_feedback where c_id='$cid' and sub_id = '$subject_id' ";
            // echo $sql3;
            $result3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
            $count2 = mysqli_num_rows($result3);
                $r = 0;
            // echo $count2;
            if($count2 == 0)
            {
                $rating1 = '0';
            }
            else
            {
                while($row2 = mysqli_fetch_assoc($result3))
                 {
                       $c_id= $row2['c_id'];
                       $rating = $row2['rating'];
                       $review = $row2['review'];
                       $r= $rating +$r;
                 }
                $rating1 = $r/$count2;
            }
             $cmd5 = "SELECT id FROM wishlist WHERE user_id = '$user_id' AND sub_id ='$subject_id' AND c_id = '$cid'";
        // 	echo $cmd5;
            $run5 = mysqli_query($conn,$cmd5) or die(mysqli_error($conn));
                    
            if(mysqli_num_rows($run5)>0) 
            {
                while($row5=mysqli_fetch_assoc($run5))
                {
                            $temp['favid']=$row5['id'];
                            $temp['isInFav']="true";
                } 
            }
            else 
            {
                $temp['favid']="Not Set";
                $temp['isInFav']="false";
           }
                        $temp['c_id'] = $c_id;
                        $temp['c_name'] = $cname;
                        $temp['c_no'] = $c_no;
                        $temp['c_email'] = $c_email;
                        $temp['c_img'] = $c_img;
                        $temp['c_id'] = $c_id;
                        $temp['rating'] = $rating1;
                        $temp['review'] = $review;
                        $temp['subject_name'] = $sub_name;
                        $temp['sub_id'] = $sub_id;
                        $temp['sub_code'] = $sub_code;
                        $temp['no_of_video'] = $no_of_video.' '."Videos";
                        $temp['no_of_test'] = $no_of_test.' '."Test";
                        $message= "malyu";
                        
                        
            
            array_push($response,$temp);
        }
    }
    else
    {
        $message= "No malyu";
    }
     array_unshift($response,array("message"=>$message));
     echo json_encode($response);
	 mysqli_close($conn);
?>
