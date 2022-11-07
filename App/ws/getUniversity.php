<?php  

    include '../inc/connection.php';
	
   
    
    /* $u_id = "USER5";
     $contact = "9898989898";*/
     
     $response=array();
	$sql="SELECT DISTINCT university_id,uni_name FROM university_data";
	//echo $sql;
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	while($row=mysqli_fetch_assoc($result))
	{
		$response[]=$row;
	}
	
	echo json_encode($response);	
	mysqli_close($conn);
	
?>