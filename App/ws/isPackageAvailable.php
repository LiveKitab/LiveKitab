<?php
include '../inc/connection.php';

$stream_id = $_POST['stream_id'];
$pr_id = $_POST['pr_id'];
$b_id = $_POST['b_id'];
$term_id = $_POST['term_id'];

/*$stream_id = "STREAM2";
$pr_id = 'PROGRAM27';
$b_id = "BID1";
$term_id = "TERM2";
*/
$response=array();

  $cmd = "SELECT * FROM package where stream_id='$stream_id' AND pr_id='$pr_id' AND b_id='$b_id' AND term_id='$term_id' ";
    
    $result1=mysqli_query($conn,$cmd)or die(mysqli_error($conn));
		$count=mysqli_num_rows($result1);
		if($count>0)
		{
		        $response['message']="YES";
		} else {
		    	$response['message']="NO";
		}


echo json_encode($response);
mysqli_close($conn);

?>