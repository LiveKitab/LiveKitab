<?php
	
	include '../inc/connection.php';
	$response=array();
	$temp=array();

		$user_id=$_POST['user_id'];
// 		$user_id="USER35";
		    $date2=date_create(date('Y-m-d'));
		$sql1="Select * from purchased_courses where user_id='$user_id' and type='Student' order by id desc ";
// 		echo $sql1;
		$result1=mysqli_query($conn,$sql1)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
// 		echo $count;
		  if($count > 0)
          {
            		while($row=mysqli_fetch_assoc($result1))
            		{
            		    $sub_id=$row['sub_id'];
            		  //  echo $sub_id;
            		    $c_id = $row['c_id'];
            		  //  echo $c_id;
            		    $bill_id =$row['bill_id'];
            		   	$date1 = date_create($row['date']);
            		   	
                        $sql4 = "SELECT DISTINCT sub_bg FROM subject_data where sub_id = '$sub_id'";
                        $result4 = mysqli_query($conn,$sql4) or die(mysqli_error($conn));
                        while($row4 = mysqli_fetch_assoc($result4))
                            {
                                // $temp['c_id'] = $row['c_id'];
                                $sub_bg =  $row4['sub_bg'];
                            }
            		     $sql = "SELECT DISTINCT days,sub_code,discount,price,no_of_video,no_of_test,c_id,sub_name FROM apply_for_subject where sub_id = '$sub_id' and c_id = '$c_id'";
                // echo $sql;
                        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                        $count = mysqli_num_rows($result);
               
                            while($row2 = mysqli_fetch_assoc($result))
                            {
                                // $temp['c_id'] = $row['c_id'];
                                $cid =  $row2['c_id'];
                                $sub_name = $row2['sub_name'];
                                $no_of_video = $row2['no_of_video'];
                                $no_of_test = $row2['no_of_test'];
                                $price = $row2['price'];
                                $sub_code = $row2['sub_code'];
                                $discount =$row2['discount'];
                                 $days = $row2['days'];
                                 
                                $sql2 = "SELECT DISTINCT c_id,c_name,c_lname,c_cno,c_email,c_name,c_img FROM creator_data where c_id = '$c_id'";
                                // echo $sql2;
                                $result2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                                $count1 = mysqli_num_rows($result2);
                                   while($row1 = mysqli_fetch_assoc($result2))
                                   {
                                            $c_id1 = $row1['c_id'];
                                            $c_name = $row1['c_name'];
                                            $c_lname = $row1['c_lname'];
                                            $cname = $c_name .' '. $c_lname;
                                            $c_no = $row1['c_cno'];
                                            $c_email = $row1['c_email'];
                                            $c_img = $row1['c_img'];
                                  }
                                $sql3 = "SELECT DISTINCT c_id,rating,review FROM course_feedback where c_id='$c_id' and sub_id ='$sub_id'";
                                            // echo $sql3;
                                $result3 = mysqli_query($conn,$sql3) or die(mysqli_error($conn));
                                $count2 = mysqli_num_rows($result3); 
                                 $r = 0;
                                if($count2 == 0)
                                {
                                    $rating1 = 0;
                                }
                                else
                                {
                                     while($row2 = mysqli_fetch_assoc($result3))
                                    {
                                           $c_id= $row2['c_id'];
                                           $rating = $row2['rating'];
                                           $review = $row2['review'];
                                           $r= $rating +$r;
                                           $rating1 = $r/$count2;
                                    }
                                    
                                }
                               
                            }
                            $diff=date_diff($date1,$date2);
                            $diff->format("%a");
                            if($diff->format("%a")> $days)
                            {
                                $durability =  "expired purchased course";
                            }
                            else
                            {
                                $durability =  "purchased course";
                            }
            		                $message = "Purchased course";
            		                $temp['sub_id'] = $sub_id;
                                    $temp['c_id'] = $c_id;
                                    $temp['c_name'] = $cname;
                                    $temp['c_no'] = $c_no;
                                    $temp['c_email'] = $c_email;
                                    $temp['c_img'] = $c_img;
                                    $temp['c_id'] = $c_id;
                                    $temp['rating'] = $rating1;
                                    $temp['review'] = $review;
                                    $temp['sub_code'] = $sub_code;
                                    $temp['subject_name'] = $sub_name;
                                    $temp['no_of_video'] = $no_of_video.' '."Videos";
                                    $temp['no_of_test'] = $no_of_test.' '."Test";
                                    $temp['price'] = $price;
                                    $temp['discount'] =  $discount;
                                    $temp['bill_id'] = $bill_id;
                                    $temp['durability']  = $durability;
                                    $temp['sub_bg'] =$sub_bg;
            	                    array_push($response,$temp);
            		}
          }
          else
          {
              $message = "Not yet Purchased course";
          }
	 array_unshift($response,array("message"=>$message));
	 echo json_encode($response);
	 mysqli_close($conn);

?>