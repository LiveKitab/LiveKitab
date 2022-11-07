<?php 
	include '../inc/connection.php';


$status=0;
$user_id=$_POST['user_id'];
$sub_id = $_POST['sub_id'];
$c_id = $_POST['c_id'];

// $user_id= 'USER35';
// $sub_id = 'SUB1';
// $c_id = 'KAU1';

 $sql = "DELETE FROM wishlist WHERE user_id = '$user_id' AND sub_id = '$sub_id' AND c_id ='$c_id'";
//  echo $sql;

        $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
        if($result)
        {
        $response["message"] = "success";
        }
        else
        {
            $response["message"] = "Fail To remove from favourite";
        }
echo json_encode($response);
mysqli_close($conn);
?>