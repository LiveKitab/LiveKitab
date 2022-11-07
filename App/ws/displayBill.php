<?php

    include '../inc/connection.php';
    
    $course_id = $_POST['course_id'];
    $user_id = $_POST['user_id'];
    
    /*$course_id='COURSE1';
    $user_id='USER26';*/
    
    $stmt = "SELECT u.username,u.u_cno, c.course_id,p.transaction_id,c.sub_name,c.sub_code,
    s.uni,t.payment_mode,t.amount,t.discount,p.date,t.transaction_time
    FROM user_transaction t,purchased_courses p,
    apply_for_subject c,creator_video s, user_data u
    WHERE u.u_id= '$user_id' AND p.course_id='$course_id' and p.user_id='$user_id' and p.course_id=c.course_id and p.transaction_id=t.transaction_id and c.stream_id=s.stream_id";
    //echo $stmt;
    $result=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
    $response=array();
    while($row=mysqli_fetch_assoc($result)) 
    {
		$response[]=$row;
    }

     echo json_encode($response);
     mysqli_close($conn);
?>