<?php

	include '../inc/connection.php';
	
	$stmt = "SELECT banner_id,party_name,party_contact,party_email,banner_img FROM banners ORDER By id DESC LIMIT 3";
	$result = mysqli_query($conn,$stmt) or die(mysqli_error($conn));
	$response = array();
	
	while($row = mysqli_fetch_assoc($result))
	{
	    $response[] = $row;
	}
	echo json_encode($response);
	mysqli_close($conn);
	

?>