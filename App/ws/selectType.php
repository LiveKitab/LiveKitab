<?php 
    include '../inc/connection.php';
	$u_id = $_POST['u_id'];

 	//$u_id ="USER36";

		$response=array();
		$sql="SELECT DISTINCT u.stream,u.program,u.department,u.term_id FROM user_data u,term_data t WHERE u_id='$u_id'";
//  		echo $sql; 
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		While($row=mysqli_fetch_assoc($result))
		{
			$response[]=$row;	
		}
	echo json_encode($response);
	mysqli_close($conn);
?>