<?php
    include '../inc/connection.php';

    $pkg_id = $_POST['pkg_id'];
    $user_id = $_POST['u_id'];
    /*$pkg_id="PACKAGE1";
	$user_id="USER46";*/
    $response=array();
    
    $sql="SELECT course_id FROM purchased_courses WHERE pkg_id='$pkg_id' and user_id='$user_id' ";
    //echo $sql;
    $result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
    $count=mysqli_num_rows($result);
    if($count > 0)
    {
        $response['message']="YES";
    }
    else
    {
        $response['message']="No";
    }
    
    
    echo json_encode($response);
    mysqli_close($conn);


?>