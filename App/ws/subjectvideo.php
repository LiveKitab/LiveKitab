<?php

    include '../inc/connection.php';
    $course_id=$_POST['subject_id'];
    $c_id = $_POST['c_id'];
    // $course_id="SUB1";
    // $c_id = 'KAU1';
    
	$response=array();
	$temp = array();
	
    $sql="SELECT v_id,ch_id,v_title,v_des,v_link FROM creator_video WHERE subject_id='$course_id' and c_id ='$c_id' ";
    // echo $sql;
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count=mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result))
    {
       $temp['v_id'] = $row['v_id'];
       $temp['ch_name'] = $row['ch_id'];
       $temp['v_title'] = $row['v_title'];
       $temp['v_des'] = $row['v_des'];
    //   $temp['v_link'] = $row['v_link'];
       $link  = $row['v_link'];
	   $linkfront = substr($link,0,30);
	   $linkback = substr($link,30);
	   $checkfront = "https://www.youtube.com/embed/";
	   if($checkfront == $linkfront)
	   {
			$temp['player']='1';
		    $temp['link'] = $linkback;
	   }
       else
	   {
			 $temp['player']='0';
			$temp['link'] = $link;
       }
       array_push($response,$temp);
    }
    array_unshift($response,array("total"=>$count));
    echo json_encode($response);
    mysqli_close($conn);
    

?>