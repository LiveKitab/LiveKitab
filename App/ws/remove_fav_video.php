<?php 
	include '../inc/connection.php';


$status=0;
$user_id=$_POST['user_id'];
$v_id = $_POST['v_id'];

// $user_id= 'USER35';
// $v_id = 'VID1';
// $sub_id = 'SUB1';
// $c_id = 'KAU1';

 $sql = "DELETE FROM video_wishlist WHERE user_id = '$user_id' AND vid ='$v_id'";
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