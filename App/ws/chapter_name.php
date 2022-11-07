<?php
include '../inc/connection.php';

$sub_id = $_POST['sub_id'];
$c_id = $_POST['c_id'];
$user_id = $_POST['user_id'];

// $sub_id ='SUB3';
// $c_id ='AAY2';
// $user_id ='USER45';

$i =0;
 $response = array();
 $temp = array();
 
 	 $videocount1="Select * from creator_video where subject_id='$sub_id' and c_id = '$c_id'";
// 		echo $videocount1;
		//echo $sql1;
		$videoresult1=mysqli_query($conn,$videocount1)or die(mysqli_error($conn));
		$count6=mysqli_num_rows($videoresult1);
// 		echo $count6;
		if($count6==0)
		{
		       $temp['countvideonumber'] = $count6; 
		}
		else
		{
		    $temp['countvideonumber'] = $count6; 
		}
		 $testcount1="Select * from video_test_data where sub_id='$sub_id' and c_id = '$c_id'";
// 		echo $videocount;
		//echo $sql1;
		$testresult1=mysqli_query($conn,$testcount1)or die(mysqli_error($conn));
		$count5=mysqli_num_rows($testresult1);
// 		echo $count;
		if($count5==0)
		{
		     $temp['counttestnumber'] = $count5; 
		}
		else
		{
	       	$temp['counttestnumber'] = $count5; 

		} 
	$checkuser="Select * from purchased_courses where user_id='$user_id' and sub_id='$sub_id' and c_id = '$c_id'";
// 		echo $sql1;
		//echo $sql1;
		$result1=mysqli_query($conn,$checkuser)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
// 		echo $count;
		if($count==0)
		{
		    	$message="Not Enrolled";
		}
		else
		{
			$message="Already Enrolled";
		}
		
		
		$materialcount1="Select * from exercise_data where subject_id='$sub_id' and c_id = '$c_id'";
// 		echo $videocount;
		//echo $sql1;
		$materialresult1=mysqli_query($conn,$materialcount1)or die(mysqli_error($conn));
		$count4=mysqli_num_rows($materialresult1);
// 		echo $count;
		if($count4==0)
		{
		    $temp['countmaterialnumber'] = $count4; 

		}
		else
		{
	       	$temp['countmaterialnumber'] = $count4; 

		} 
		
 $sql  = "select DISTINCT sub_id,ch_id,ch_name,ch_no from chapter_data where sub_id = '$sub_id' order by ch_no"; 
//  echo $sql;
 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
 	$count3=mysqli_num_rows($result);
//  	echo $count3;
 	if($count3 >0)
 	{
        while($row = mysqli_fetch_assoc($result))
        {
             ++$i;
             $ch_id =  $row['ch_id'];
            $temp['ch_id'] = $row['ch_id'];
              $temp['sub_id'] = $row['sub_id'];
            $temp['ch_name'] = $row['ch_name'];
            $temp['ch_no'] = $row['ch_no'];
            $temp['number'] = $i;
            
        $videocount="Select * from creator_video where subject_id='$sub_id' and c_id = '$c_id' and ch_id='$ch_id' ";
// 		echo $videocount;
		//echo $sql1;
		$videoresult=mysqli_query($conn,$videocount)or die(mysqli_error($conn));
		$count=mysqli_num_rows($videoresult);
// 		echo $count;
		if($count==0)
		{
		    $temp['countvideo'] = $count. " Video";
		}
		else
		{
		$temp['countvideo'] = $count . " Video"; 
		} 
		
		 $testcount="Select * from video_test_data where sub_id='$sub_id' and c_id = '$c_id' and ch_id='$ch_id'";
// 		echo $testcount;
		//echo $sql1;
		$testresult=mysqli_query($conn,$testcount)or die(mysqli_error($conn));
		$count1=mysqli_num_rows($testresult);
// 		echo $count1;
		if($count1==0)
		{
		    $temp['counttest'] = $count1. " Test";
		}
		else
		{
	       	$temp['counttest'] = $count1. " Test"; 

		} 
	    $materialcount="Select * from exercise_data where subject_id='$sub_id' and c_id = '$c_id' and ch_id='$ch_id'";
// 		echo $videocount;
		//echo $sql1;
		$materialresult=mysqli_query($conn,$materialcount)or die(mysqli_error($conn));
		$count2=mysqli_num_rows($materialresult);
// 		echo $count;
		if($count2==0)
		{
		    $temp['countmaterial'] = $count2. " Material"; 

		}
		else
		{
	       	$temp['countmaterial'] = $count2. " Material"; 

		} 
             $sql1 = "SELECT DISTINCT no_of_video,no_of_test,c_id,sub_name,sub_code FROM apply_for_subject where sub_id = '$sub_id' and c_id = '$c_id' ";
            // echo $sql;
            $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
            $count2 = mysqli_num_rows($result1);
            while($row1 = mysqli_fetch_assoc($result1))
            {
                // $temp['c_id'] = $row['c_id'];
                $temp['c_id'] =  $row1['c_id'];
                $temp['sub_name'] = $row1['sub_name'];
                $temp['no_of_video'] = $row1['no_of_video'];
                $temp['no_of_test'] = $row1['no_of_test'];
                $temp['sub_code'] = $row1['sub_code'];
                array_push($response,$temp);      
            }
       
        }
        
 	}
 	
 	
     array_unshift($response,array("total"=>$count3 ." Chapter" ),array("Message" =>$message));
     echo json_encode($response);
	 mysqli_close($conn);

?>

 
 