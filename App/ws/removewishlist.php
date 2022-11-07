<?php

    include '../inc/connection.php';
	/*$id=mysqli_real_escape_string($con,$_POST['id']);
	$id = htmlspecialchars($id);*/
	$id = $_POST['id'];
// 	$id = '5';
	
	$sql = "DELETE FROM wishlist WHERE id = '$id'";
	$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	 $response = array();
	if($result)
	{
        $response['message']="Deleted";
    }
    else
    {
         $response['message']="Fail To Delete Address";
    }
    //  array_unshift($response,array("message"=>$message));
    echo json_encode($response);
    mysqli_close($conn);
	?>