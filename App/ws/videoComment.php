<?php
    include '../inc/connection.php';
    $v_id=$_POST['v_id'];
    //  $v_id="VID2";
    $response = array();
    $stmt = "SELECT c.comment, c.date, c.id, c.status, c.comment_mentor, u.username, ct.c_name, ct.c_lname 
    FROM comment_video c, user_data u,creator_video f,creator_data ct
    WHERE c.v_id='$v_id' AND c.u_id=u.u_id and c.v_id=f.v_id and f.c_id=ct.c_id order by id desc ";
    $result=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
    while($row = mysqli_fetch_assoc($result)) 
    {
		$response[]=$row;
    }
     echo json_encode($response);
     mysqli_close($conn);
?>