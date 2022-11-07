<?php

    include '../inc/connection.php';
    
    $u_id = mysqli_real_escape_string($conn,$_POST['user_id']);
    $u_id = htmlspecialchars ($u_id);
    
    $v_id = mysqli_real_escape_string($conn,$_POST['v_id']);
    $v_id = htmlspecialchars ($v_id);
    
    $comment = mysqli_real_escape_string($conn,$_POST['comment']);
    $comment = htmlspecialchars ($comment);
    /* {v_id=VID1, user_id=USER13, comment=hii how r u}*/
    /*$u_id = "USER13";
    $v_id = "VID1";
    $comment ="hii how r u";*/
    
    $date1=date("Y-m-d-h:i:s");
    $setdate=date("Y-m-d h:i:s");
    
	$response=array();


    $sql = "INSERT INTO comment_video (v_id,u_id,comment, comment_mentor, comment_publisher,date,status) 
    values ('$v_id','$u_id','$comment', 'Not Set', 'Not Set','$setdate','0')";
     //echo $sql;         
    $r = mysqli_query($conn,$sql); 
 
    if($r)
    {
    	$message="Posted..";
    }
    else
    {
    	$message="Not Posted";
    }

    array_push($response,array("message"=>$message));
    echo json_encode($response);


    mysqli_close($conn);
    
    ?>