<?php
include '../inc/connection.php';

$stream_id = $_POST['stream_id'];
$branch_id = $_POST['branch_id'];
$pr_id = $_POST['pr_id'];
$term_id = $_POST['term_id'];
$user_id = $_POST['user_id'];

// $stream_id = 'STREAM1';
// $branch_id = 'BID4';
// $pr_id = 'PROGRAM1';
// $term_id = 'TERM1';
// $user_id = 'USER35';

$response = array();
$temp = array();

         $sql1 = "select DISTINCT sub_id,c_id from purchased_courses where user_id ='$user_id'";//
         $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
         $count = mysqli_num_rows($result1);
         if($count == 0)
         {
               $sql = "SELECT DISTINCT sub_id,sub_name,sub_bg,sub_code FROM subject_data where stream_id = '$stream_id' AND  pr_id = '$pr_id' AND b_id ='$branch_id' AND term_id = '$term_id'";
                      $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                      $count1 = mysqli_num_rows($result);
                      if($count1 > 0)
                      {
                    
                            while($row = mysqli_fetch_assoc($result))
                            {
                                        $temp['sub_id'] = $row['sub_id'];
                                        $temp['sub_name'] = $row['sub_name'];    
                                        $temp['sub_bg'] = $row['sub_bg'];    
                                        $temp['sub_code'] = $row['sub_code']; 
                                        array_push($response,$temp);

                            }

                     }
         }
         else
         {
              
                     $sql2 = "SELECT DISTINCT sub_id,sub_name,sub_bg,sub_code FROM subject_data  where stream_id = '$stream_id' AND  pr_id = '$pr_id' AND b_id ='$branch_id' AND term_id = '$term_id' 
                                 AND sub_id NOT IN (SELECT DISTINCT sub_id from purchased_courses  where user_id ='$user_id')";
                   
                      $result2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
                      $count2 = mysqli_num_rows($result2);
                      if($count2 > 0)
                      {
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                                        $temp['sub_id'] = $row2['sub_id'];
                                        $temp['sub_name'] = $row2['sub_name'];    
                                        $temp['sub_bg'] = $row2['sub_bg'];    
                                        $temp['sub_code'] = $row2['sub_code']; 
                                        array_push($response,$temp);

                            }

         }
       
                     
    }

     array_unshift($response);
     echo json_encode($response);
	 mysqli_close($conn);
?>
