<?php

    include '../inc/connection.php';
    $stmt = "SELECT c.course_id,c.course_name,f.v_title,f.v_link FROM course_data c,final_video f WHERE 
            c.course_id = f.course_id";
    
    $result=mysqli_query($conn,$stmt) or die(mysqli_error($conn));
    $response=array();
    while($row=mysqli_fetch_assoc($result)) {
		$response[]=$row;
     }
     
     echo json_encode($response);
     mysqli_close($conn);
?>