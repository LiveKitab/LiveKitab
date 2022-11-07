<?php
include '../inc/connection.php';

$sub_id = $_POST['sub_id'];
$c_id = $_POST['c_id'];


$sub_id ='SUB1';
$c_id ='KAU1';

$i =0;
 $response = array();
 $temp = array();
 $sql  = "select DISTINCT subject_id,c_id,ch_id,ch_name from creator_video where subject_id = '$sub_id' and c_id ='$c_id'"; 
//  echo $sql;
 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
 	$count1=mysqli_num_rows($result);
 	if($count1 >0)
 	{
        while($row = mysqli_fetch_assoc($result))
        {
             ++$i;
            $temp['ch_id'] = $row['ch_id'];
            $temp['ch_name'] = $row['ch_name'];
            $temp['subject_id'] = $row['ch_name'];
            $temp['c_id'] = $row['c_id'];
            $temp['number'] = $i;
          
        }
         $sql1 = "SELECT DISTINCT no_of_video,no_of_test,c_id,sub_name,sub_code FROM apply_for_subject where sub_id = '$sub_id'";
    // echo $sql;
    $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    $count2 = mysqli_num_rows($result1);
        while($row1 = mysqli_fetch_assoc($result1))
        {
            // $temp['c_id'] = $row['c_id'];
            $cid =  $row1['c_id'];
            $sub_name = $row1['sub_name'];
            $sub_id = $row1['sub_id'];
            $no_of_video = $row1['no_of_video'];
            $no_of_test = $row1['no_of_test'];
            $sub_code = $row1['sub_code'];
              array_push($response,$temp);
        }
 	}
 	
     array_unshift($response,array("total"=>$count1 ." Chapter" ));
     echo json_encode($response);
	 mysqli_close($conn);

?>

 
 