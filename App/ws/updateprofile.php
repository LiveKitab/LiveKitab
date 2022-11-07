<?php  

    include '../inc/connection.php';


    $u_id = mysqli_real_escape_string($conn,$_POST['u_id']);
    $u_id = htmlspecialchars ($u_id);

    $user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
    $user_name = htmlspecialchars ($user_name);
    
     $user_mail = mysqli_real_escape_string($conn,$_POST['user_mail']);
    $user_mail = htmlspecialchars ($user_mail);
    
    //  $u_id = "USER35";
    //  $user_name = "9662075644";
    //  $user_mail = "Kartik shah u";
     
     $response=array();
   $stmt = $conn->prepare("UPDATE user_data set u_email ='$user_mail',username ='$user_name'  where u_id = '$u_id'");
   if ($stmt->execute()) 
    {
        	$response["message"] = "success";
   }
echo json_encode($response);	
mysqli_close($conn);
?>