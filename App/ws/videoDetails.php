<?php
include '../inc/connection.php';

    $v_id=$_POST['v_id'];
    // $v_id="VID1";
	$response=array();

    $sql = "SELECT DISTINCT f.v_title, f.v_link, f.v_des, v.rating FROM final_video f, video_like_dislike v
    WHERE f.v_id='$v_id' AND v.v_id=f.v_id";
    // echo $sql;
    
	$result=mysqli_query($conn,$sql);
	
     while($row=mysqli_fetch_assoc($result)) {
		$response[]=$row;
     }
     
     echo json_encode($response);
    ?>