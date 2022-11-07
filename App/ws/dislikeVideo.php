<?php
include '../inc/connection.php';

$response=array();

$u_id = mysqli_real_escape_string($conn,$_POST['u_id']);
$u_id = htmlspecialchars ($u_id);

$sub_id = mysqli_real_escape_string($conn,$_POST['sub_id']);
$sub_id = htmlspecialchars ($sub_id);

$v_id = mysqli_real_escape_string($conn,$_POST['v_id']);
$v_id = htmlspecialchars ($v_id);

$mentorid = mysqli_real_escape_string($conn,$_POST['mentorid']);
$mentorid = htmlspecialchars ($mentorid);

/*$u_id="USER26";
$v_id="VID1";
$course_id="COURSE1";*/

 $date1=date("Y-m-d");
 $setdate=date("Y-m-d h:i:s");
 
   $cmd = "SELECT * FROM video_like_dislike WHERE u_id='$u_id' AND sub_id='$sub_id' AND v_id='$v_id' AND c_id ='$mentorid'";

    $result1=mysqli_query($conn,$cmd)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
		if($count==0)
		{
		 $sql="INSERT INTO video_like_dislike  (sub_id,c_id,v_id,u_id,rating,date,timestamp,ld_status,status) 
               values ('$sub_id','$mentorid','$v_id','$u_id','1','$date1','$setdate','2','0')";
		} 
		else 
		{
		    while($row = mysqli_fetch_assoc($result1)){
		        $ld_status = $row['ld_status'];
		    }
		    if ($ld_status == 1) 
		    {
		        $sql="UPDATE video_like_dislike SET ld_status ='2',rating='5' WHERE u_id='$u_id' AND sub_id='$sub_id' AND c_id ='$mentorid' AND v_id='$v_id'";
		    }
		    else
		    {
		        $sql = "DELETE from video_like_dislike WHERE  u_id='$u_id' AND sub_id='$sub_id' AND v_id='$v_id' AND c_id ='$mentorid'";
		    }
		  //  $sql="UPDATE video_like_dislike SET ld_status ='2' WHERE u_id='$u_id' AND course_id='$course_id' AND v_id='$v_id'";

		}

 $result =mysqli_query($conn,$sql) or die("error"); 
 
 
if($result)
{
	$message="Data updated";
}
else
{
	$message="Data not updated";
}

array_push($response,array("message"=>$message));
    echo json_encode($response);
    mysqli_close($conn);

?>