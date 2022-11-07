<?php
include '../inc/connection.php';

	$response=array();

    $sql = "SELECT DISTINCT b_name,b_id FROM branch_data";
    // echo $sql;
    
	$result=mysqli_query($conn,$sql);
	
     while($row=mysqli_fetch_assoc($result)) {
		$response[]=$row;
     }
     
     echo json_encode($response);
     mysqli_close($conn);
    ?>