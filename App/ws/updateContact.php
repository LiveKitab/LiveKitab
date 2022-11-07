<?php  

    include '../inc/connection.php';


    $u_id = mysqli_real_escape_string($conn,$_POST['u_id']);
    $u_id = htmlspecialchars ($u_id);

    $contact = mysqli_real_escape_string($conn,$_POST['u_cno']);
    $contact = htmlspecialchars ($contact);

    
    /* $u_id = "USER5";
     $contact = "9898989898";*/
     
     $response=array();
   $stmt = $conn->prepare("UPDATE user_data set u_cno ='$contact' where u_id = '$u_id'");
   if ($stmt->execute()) {
	$response["message"] = "success";
	}
echo json_encode($response);	
mysqli_close($conn);
?>