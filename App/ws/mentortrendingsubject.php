<?php
include '../inc/connection.php';

$stream_id = $_POST['stream_id'];
$branch_id = $_POST['branch_id'];
$pr_id = $_POST['pr_id'];
$term_id = $_POST['term_id'];
$user_id = $_POST['user_id'];
$c_id  = $_POST['c_id'];

// $stream_id = 'STREAM1';
// $branch_id = 'BID1'; 
// $pr_id = 'PROGRAM1';
// $term_id = 'TERM1';
// $c_id = 'KAU1';


 $response = array();
 $temp = array();
 
  $sql1 = "SELECT DISTINCT sub_id FROM apply_for_subject where c_id ='$c_id' ";
    // echo $sql;
    $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    $count1 = mysqli_num_rows($result1);
    if($count1 > 0)
    {
        while($row1 = mysqli_fetch_assoc($result1))
        {
                    $sub_id= $row1['sub_id'];
                    // $temp['sub_id'] = $row1['sub_id'];

                   

                      $sql = "SELECT DISTINCT sub_id,sub_name,sub_bg,sub_code FROM subject_data where stream_id = '$stream_id' AND  pr_id = '$pr_id' AND b_id ='$branch_id' AND term_id = '$term_id' AND sub_id = '$sub_id'";
                    // echo $sql;
                    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    $count = mysqli_num_rows($result);
                    if($count > 0)
                    {
                                            $message= "subject available";

                        while($row = mysqli_fetch_assoc($result))
                        {
                                    $temp['sub_id'] = $row['sub_id'];
                                    $temp['sub_name'] = $row['sub_name'];    
                                    $temp['sub_bg'] = $row['sub_bg'];    
                                    $temp['sub_code'] = $row['sub_code']; 
                                    array_push($response,$temp);
                        }
                    } 
                    else
                    {
                        $message = "no subject available";
                    }
                                
        }

       
    } 
    
  
     array_unshift($response,array("message"=>$message));
     echo json_encode($response);
	 mysqli_close($conn);
?>