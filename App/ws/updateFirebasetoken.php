<?php  


    include '../inc/connection.php';

$token =mysqli_real_escape_string($conn,$_POST['token']);
$user_id =mysqli_real_escape_string($conn,$_POST['user_id']);


// $token = "345678";
// $user_id = "USER35";

$response = array();

    $sql1 = "UPDATE user_data SET u_regid = '$token' WHERE u_id = '$user_id'";
    // echo $sql1;
    $result1 = mysqli_query($conn,$sql1) or die(mysqli_error($conn));
    if($result1)
    {
        $response["message"] = "success"; 
    }
    else
    {
        $response["message"] = "fail";
    }

      
echo json_encode($response);	
mysqli_close($conn);
?>
