<?php  
//   include '../db_connect.php';
    include '../inc/connection.php';

    $u_id = mysqli_real_escape_string($conn,$_POST['u_id']);
    $u_id = htmlspecialchars ($u_id);

    $doc = mysqli_real_escape_string($conn,$_POST['image_data']);
    $doc = htmlspecialchars ($doc);

    $date1=date("Y-m-d-h:i:s");
	$setdate=date("Y-m-d h:i:s");
    /* $u_id = "USER26";
     $doc = "";*/
     $name = $date1."-".$u_id.".jpg";

	$imagePath ="../../Web/src/user/$name";
	$sql="Select u_img from user_data where u_id='$u_id' ";	
	//echo $sql;
	$result=mysqli_query($conn,$sql) or die(mysqli_close($conn));
	$count=mysqli_num_rows($result);
	//echo $count;
	$row=mysqli_fetch_assoc($result);
	 $u_img=$row['u_img'];
	if($u_img=="NOT SET")
	{
	    //echo $u_img;
	    $filepath="../../Web/src/user/$u_img";
	     $response=array();
       $stmt = $conn->prepare("UPDATE user_data set u_img ='$name' where u_id = '$u_id'");
       if ($stmt->execute()) 
       {
         	$response["message"] = "success";
    		file_put_contents($imagePath,base64_decode($doc));
    		unlink($filepath);
    	}
	}
	else
	{
	   $response=array();
       $stmt = $conn->prepare("UPDATE user_data set u_img ='$name' where u_id = '$u_id'");
       if ($stmt->execute()) 
       {
    	    $response["message"] = "success";
    		file_put_contents($imagePath,base64_decode($doc));
    	}
	}
echo json_encode($response);	
mysqli_close($conn);
?>