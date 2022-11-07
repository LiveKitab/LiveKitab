<?php 
	include '../inc/connection.php';

$status=0;
$user_id=$_POST['user_id'];
$v_id = $_POST['v_id'];
$link = $_POST['link'];

// $user_id='USER35';
// $v_id = 'VID1';
// $link ='https://youtube.com';
// $sub_id ='SUB1';
// $c_id = 'KUL1';

 $sql = "INSERT INTO `video_wishlist` (`user_id`, `vid`, `v_link`, `status`) VALUES ('$user_id','$v_id','$link','$status')";
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