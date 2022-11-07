<?php
    include '../inc/connection.php';
    $course_id=$_POST['sub_id'];
    $c_id = $_POST['c_id'];
    // $course_id="SUB1";
    //   $c_id ='KAU1';
	$response=array();
    $sql="SELECT c.user_id,c.c_id,c.sub_id,c.rating,c.review,u.username,u.u_img FROM course_feedback c,user_data u WHERE c.sub_id='$course_id' and c.c_id ='$c_id' and c.user_id=u.u_id";
    // echo $sql;
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count=mysqli_num_rows($result);
    while($row=mysqli_fetch_assoc($result))
    {
        $response[]=$row;
    }
    array_unshift($response,array("total"=>$count));
    echo json_encode($response);
    mysqli_close($conn);

?>