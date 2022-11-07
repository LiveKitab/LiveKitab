<?php  
//   include '../db_connect.php';
    include '../inc/connection.php';


    $u_id = mysqli_real_escape_string($conn,$_POST['u_id']);
    $u_id = htmlspecialchars ($u_id);

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $email = htmlspecialchars ($email);

    
     /*$u_id = "USER5";
     $email = "xyz@gmail.com";*/
     
     $response=array();
   $stmt = $conn->prepare("UPDATE user_data set u_email ='$email' where u_id = '$u_id'");
   if ($stmt->execute()) {
	$response["message"] = "success";
	}
echo json_encode($response);	
mysqli_close($conn);
?>