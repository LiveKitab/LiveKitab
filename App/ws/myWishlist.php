<?php
include '../inc/connection.php';

    $user_id=$_POST['user_id'];
    
    // $user_id="USER45";
    
	$response=array();
	$temp = array();

    $sql = "SELECT id,c_id,sub_id FROM wishlist WHERE user_id = '$user_id'";
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	if(mysqli_num_rows($result)>0)
	{
     while($row=mysqli_fetch_assoc($result)) 
     {
        //  $temp['cid'] =$row['c_id'];
         $temp['sub_id'] = $row['sub_id'];
          $c_id=$row['c_id'];
          $sub_id=$row['sub_id'];
          $temp['id'] = $row['id'];
          
          
           $sql1 = "SELECT DISTINCT c_id,sub_name FROM apply_for_subject where sub_id = '$sub_id'";
        //   echo $sql1;
            $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
            $count1 = mysqli_num_rows($result1);
            
                while($row1 = mysqli_fetch_assoc($result1))
                {
                    // $temp['c_id'] = $row['c_id'];
                    // $cid =  $row['c_id'];
                    // $sub_name = $row1['sub_name'];
                    // $sub_id = $row1['sub_id'];
                    $temp['sub_name'] = $row1['sub_name'];
                    // $temp['sub_id'] = $row1['sub_id'];
                }
                
           $sql2 = "SELECT DISTINCT c_id,c_name,c_lname,c_cno,c_email,c_name,c_img FROM creator_data where c_id = '$c_id'";
            // echo $sql2;
            $result2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            $count1 = mysqli_num_rows($result2);
           
               while($row2 = mysqli_fetch_assoc($result2))
              {
                        $c_id = $row2['c_id'];
                        $c_name = $row2['c_name'];
                        $c_lname = $row2['c_lname'];
                        $cname = $c_name .' '. $c_lname;
                        $c_no = $row2['c_cno'];
                        $c_email = $row2['c_email'];
                        $c_img = $row2['c_img'];

                          $temp['c_id'] = $c_id;
                        $temp['c_name'] = $cname;
                        $temp['c_no'] = $c_no;
                        $temp['c_email'] = $c_email;
                        $temp['c_img'] = $c_img;
              }
            $sql3 = "SELECT DISTINCT c_id,rating,review FROM course_feedback where c_id='$c_id' and sub_id = '$sub_id'";
                        // echo $sql3;
            $result3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
            $count2 = mysqli_num_rows($result3); 
                        $r = 0;
            if($count2 == 0)
            {
                 $temp['rating'] = "0";
            }
            else
            {
                 while($row2 = mysqli_fetch_assoc($result3))
                {
                    $c_id= $row2['c_id'];
                    $rating = $row2['rating'];
                    $review = $row2['review'];
                    $r= $rating +$r;
                    $temp['rating'] = $r;
                }
            }
           
            
      array_push($response,$temp);
     }
        $message = "shop available";
    
	}
	else
	{
	   $message = "No favorite Shop found";
	}
          
            array_unshift($response,array("message"=>$message));

     echo json_encode($response);
     mysqli_close($conn);
    ?>