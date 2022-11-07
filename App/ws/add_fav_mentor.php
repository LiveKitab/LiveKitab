<?php 
	include '../inc/connection.php';

$status=0;
$user_id=$_POST['user_id'];
$sub_id = $_POST['sub_id'];
$c_id = $_POST['c_id'];

// $user_id='USER35';
// $sub_id ='SUB1';
// $c_id = 'KUL1';

 $sql = "INSERT INTO `wishlist` (`c_id`, `user_id`, `sub_id`, `status`) VALUES ('$c_id','$user_id','$sub_id','$status')";
 $result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
 if($result)
 {
   $response["message"] = "success";
 }
else
{
    $response["message"] = "Fail To add into favourite";
}
echo json_encode($response);
mysqli_close($conn);
?>