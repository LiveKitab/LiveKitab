<?php 
    include '../inc/connection.php';
	$u_id = $_POST['u_id'];
// 	$u_id ="USER48";

		$response=array();
		$sql="SELECT  DISTINCT u.stream,u.program,u.department,u.term_id FROM user_data u,term_data t WHERE u_id='$u_id'";
 		//echo $sql;
		$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		While($row=mysqli_fetch_assoc($result))
		{
		    $temp=array();
		    $temp['stream']=$row['stream'];
		    $temp['program']=$row['program'];
		    $temp['department']=$row['department'];
		    $temp['term_id']=$row['term_id'];
		    $term_id=$row['term_id'];
		    
		    $sql1="Select med from term_data where term_id='$term_id'";
		    $result1=mysqli_query($conn,$sql1);
		    $row1=mysqli_fetch_assoc($result1);
		    $temp['med']=$row1['med'];
		    array_push($response,$temp);
		}
	echo json_encode($response);
	mysqli_close($conn);
?>