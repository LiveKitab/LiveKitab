<?php
include '../inc/connection.php';

    $user_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $user_id = htmlspecialchars ($user_id);
    // $user_id="USER35";
	$response=array();
	$temp = array();

    $table = "purchased_courses";
    // AVG(cf.rating) AS rating
//     $sql ="SELECT DISTINCT cd.c_img,cd.c_id,cd.c_name,cd.c_lname,c.sub_name,c.sub_id,c.c_id,cf.rating,c.no_of_video,c.no_of_test FROM $table p, apply_for_subject c,creator_data cd,course_feedback cf
//     WHERE p.user_id='$user_id' AND  p.sub_id=c.sub_id AND p.c_id=c.c_id AND cd.c_id =p.c_id AND p.sub_id = cf.sub_id AND p.c_id = cf.c_id";
// 	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
// 	 while($row=mysqli_fetch_assoc($result)) 
// 	 {
// 		$response[]=$row;
// 	 }
    $sql = "SELECT sub_id,c_id from $table where user_id='$user_id'";
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while($row=mysqli_fetch_assoc($result)) 
	{
	        $sub_id = $row['sub_id'];
	        $c_id = $row['c_id'];
	        $sql1 = "SELECT * from apply_for_subject where sub_id='$sub_id' AND c_id='$c_id'";
            $result1=mysqli_query($conn,$sql1) or die(mysqli_error($conn));
        	while($row1=mysqli_fetch_assoc($result1)) 
        	{
                $sub_name = $row1['sub_name'];
                $no_of_video = $row1['no_of_video'];
                $no_of_test = $row1['no_of_test'];
        	}
        	
        	$sql2 = "SELECT * from creator_data where c_id='$c_id'";
            $result2=mysqli_query($conn,$sql2) or die(mysqli_error($conn));
        	while($row2=mysqli_fetch_assoc($result2)) 
        	{                
        	    $c_img = $row2['c_img'];
                $c_name = $row2['c_name'];
                $c_lname = $row2['c_lname'];
                $cname = $c_name .' '. $c_lname;
        	 }
        	 
        	 $sql3 = "SELECT rating,review FROM course_feedback where c_id='$c_id' and sub_id = '$sub_id' ";
             $result3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
             $count2 = mysqli_num_rows($result3);
             $r = "";
             if($count2 == '0')
             {
                 $rating = 0;
                //  echo $rating;
             }
             else
             {
                 while($row2 = mysqli_fetch_assoc($result3))
                 {
                    $rating = $row2['rating'];
                    $review = $row2['review'];
                    $r= $rating +$r;
                  }
                  $rating = $r/$count2;
             }
             
             
             $temp['sub_name'] =$sub_name;
             $temp['sub_id']  =$sub_id;
                	   $temp['c_id']  =$c_id;
                	   $temp['no_of_video']  =$no_of_video;
                	   $temp['no_of_test']  =$no_of_test ;
                	   $temp['c_img']  =$c_img;
                	   $temp['c_name']  = $cname;
                	   $temp['c_lname']  =$c_lname ;
                	   $temp['rating']  = $rating;
                	   array_push($response,$temp); 
	 }      
	 
    echo json_encode($response);
    mysqli_close($conn);
?>