<?php  
    include '../inc/connection.php';
	$v_id = $_POST['vid'];
// 	$v_id = "VID1";
// VID1
	
    $response=array();
     
	$sql="SELECT DISTINCT q.question, q.que_id, q.a, q.b, q.c, q.d, q.sol, q.correct,q.test_id
	FROM video_test_data v, video_question_data q
	WHERE q.test_id= v.test_id AND v.v_id='$v_id'";
// 	echo $sql;
	$result=mysqli_query($conn,$sql) or die(mysqli_error($conn));
	$count=mysqli_num_rows($result);
	while($row=mysqli_fetch_assoc($result))
	{
		$response[]=$row;
	}
	array_unshift($response,array("total"=>$count));
	echo json_encode($response);	
	mysqli_close($conn);
?>