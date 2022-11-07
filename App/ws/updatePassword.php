  <?php 
  
    include '../inc/connection.php';

$stu_id = $_POST['stu_id'];
$old_pass = $_POST['opass'];
$new_pass = $_POST['npass'];

// $stu_id = "USER35";
// $old_pass = "sejal@123";
// $new_pass = "abc@123";

$new_pass1 = password_hash($new_pass,PASSWORD_DEFAULT);

$response = array();

$stmt = "SELECT u_id,u_pwd from user_data where u_id ='$stu_id'";
// echo $stmt;

$result = mysqli_query($conn,$stmt) or die(mysqli_error($conn));

while ($row = mysqli_fetch_assoc($result)) 
{
    $p_pass=$row['u_pwd'] ;

    if (password_verify($old_pass,$p_pass)) 
    {
    	$update="UPDATE user_data set u_pwd='$new_pass1' where u_id ='$stu_id'";
    	$result1 = mysqli_query($conn,$update) or die(mysqli_error($conn));
    	if ($result1) 
    	{
    	   $response['message'] = "Password Changed Sucessfully";
    	}
    	else
    	{
    	     $response['message'] = "Fail";
    	}
    }
    else
    {
         $response['message'] = "Password not match";
    }
}
echo json_encode($response);
mysqli_close($conn);

?>