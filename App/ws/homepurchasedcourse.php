<?php
include '../inc/connection.php';

$user_id = $_POST['user_id'];
// $user_id = 'USER35';
$temp = array();
$response = array();

$date2=date_create(date('Y-m-d'));

$sql = "SELECT DISTINCT sub_id,c_id,date FROM purchased_courses where user_id ='$user_id'";

    $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count = mysqli_num_rows($result);
    if($count == 0)
    {
        $message = "Not Enrolled";
    }
    else
    {
          $message = "Enrolled";
         while($row = mysqli_fetch_assoc($result))
        {
           $sub_id = $row['sub_id'];
           $cid = $row['c_id'];
           $date1 = date_create($row['date']);
                        $sql12 = "SELECT DISTINCT days FROM apply_for_subject where sub_id = '$sub_id' and c_id = '$cid'";
                        $result12 = mysqli_query($conn,$sql12) or die(mysqli_error($conn));
                        $count12 = mysqli_num_rows($result12);
                        while($row12 = mysqli_fetch_assoc($result12))
                        {
                                $days = $row12['days'];
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
                        $temp['durability']  = $durability;
           $sql2 = "SELECT DISTINCT c_name,c_lname FROM creator_data where c_id = '$cid'";
            // echo $sql2;
            $result2 = mysqli_query($conn,$sql2) or die(mysqli_error($conn));
            $count1 = mysqli_num_rows($result2);
           
               while($row1 = mysqli_fetch_assoc($result2))
              {
                        $c_name = $row1['c_name'];
                        $c_lname = $row1['c_lname'];
                        $cname = $c_name .' '. $c_lname;

              }
              
                $sql1 = "SELECT DISTINCT sub_id,sub_name,sub_bg,sub_code FROM subject_data where sub_id = '$sub_id'";
                // echo $sql1;
                $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
                while($row1 = mysqli_fetch_assoc($result1))
                {
                    $temp['sub_id'] = $row1['sub_id'];
                   $sub_name = $row1['sub_name'];    
                    $temp['sub_bg']= $row1['sub_bg'];    
                    $sub_code = $row1['sub_code']; 
                    $temp['sub_name'] = $sub_name." (" .$sub_code.")";
                     $temp['cid'] = $row['c_id'];
                     $temp['c_name'] = $cname;
                    
                array_push($response,$temp);
                }
        }
    }
     array_unshift($response,array("message"=>$message));
     echo json_encode($response);
	 mysqli_close($conn);
?>